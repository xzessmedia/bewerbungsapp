<?php
require_once('config.php');
require_once __DIR__ . '/libs/facebook/autoload.php';
require_once('src/AppData.php');
require_once('src/AppUser.php');
require_once('src/AppTemplate.php');

session_start();
$appcore = new AppCore($db_hostname,$db_username,$db_password,$db_name);

// Necessary for Facebook API for php serverside part
$facebook = new Facebook\Facebook([
  'app_id' => '{525143354344103}',
  'app_secret' => '{08f1a43f61fb0ba09ca3cafa4da6e021}',
  'default_graph_version' => 'v2.7',
  ]);
  
$version = "0.41.95";



class AppCore {
	private $autenticated_userid;	// Int / from mysql table
	private $current_user;		// AppUser Type
	private $app_database;	// AppData Type
	private $db_name;
	
	function __construct($hostname,$username,$password,$dbname) {
		$this->db_name = $dbname;
		$this->app_database = new AppData($hostname,$username,$password);
		
		
		if(isset($_SESSION['authenticated_userid'])) {
			//$appcore->PrepareUserDirectory($_SESSION['authenticated_userid']);
		}
		
	}
	
	/*
	* CheckLogin 
	* Checks the Login Status
	* @return	Bool - if user is authenticated
	*/
	public function CheckLogin() {
		if (!isset($_SESSION['authenticated_userid'])) {
			return false;
		} else {
			return true;
		}
	}
	
	public function SaveApplicationtoDB($userid, $json) {
		$this->app_database->ConnectDB($this->db_name);
		$createdate = time();
		$editdate = time();
		$sql = "INSERT INTO app_applications (userid, json, creationdate, lasteditdate)
				VALUES ('$userid','$json','$createdate','$editdate');";
		$this->app_database->Query($sql);
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		return $result;
	}
	
	public function GetApplicationsFromDB($userid) {
		
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query("SELECT * FROM app_applications WHERE userid='$userid'");
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		return $result->fetch_assoc();
		$result->free();
	}
	public function CountApplications($userid) {
		
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query("SELECT * FROM app_applications WHERE userid='$userid'");
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		return $result->num_rows;
		$result->free();
	}
	public function IsClientInDB($ip) {
		
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query("SELECT * FROM app_clients WHERE ip='$ip'");
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		if ($result->num_rows > 0) {
			return true;
		} else {
			return false;
		}
		$result->free();
	}
	public function GetActiveUsers() {
		$now = time();
		
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query("SELECT * FROM app_clients");
		$result = $this->app_database->GetResult();
		$result->fetch_assoc();
		$count = count($result);
		$this->app_database->Close();
		return $count;
		$result->free();
	}
	public function PrepareUserDirectory($userid) {
		
		$path = 'accounts/'.$userid.'/';
		if (!file_exists($path)){ 
		    return mkdir($path, 0777, true);
		}
	
	}
	public function MoveFileToUserDirectory($inputname,$userid) {
		$tmp_name = $_FILES[$inputname]["tmp_name"][$key];
		$name = $_FILES[$inputname]["name"][$key];
	        return move_uploaded_file($tmp_name, 'accounts/'.$userid.'/$name');
	}
	public function GetUserDirectory($userid) {
		return 'accounts/'.$userid.'/';
	}
	public function GetApplicationByAppID($appid) {
		
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query("SELECT * FROM app_applications WHERE appid='$appid'");
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		return $result->fetch_assoc();
		$result->free();
	}
	
	public function DBQuery($sql) {
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query("SELECT * FROM app_applications WHERE appid='$appid'");
		$result = $this->app_database->GetResult();
		return json_encode($result);
		$this->app_database->Close();
	}
	public function AuthUser($email,$password) {
		
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query("SELECT * FROM app_users WHERE email='$email'");
		$result = $this->app_database->GetResult();
		
		$db_pass = "";
		$userid = "";
		$email = "";
		while($row = $result->fetch_assoc()){
		    	$db_pass 	= $row['password'];
		 	$userid		= $row['id'];
			$email	= $row['email'];
			$this->authenticated_userid = $userid;
		}
		
		if ($password == $db_pass) {
			$_SESSION['authenticated_userid'] = $this->authenticated_userid;
			$_SESSION['email'] = $email;
			
			// Update Last Login Field
			$this->LoginUser($this->authenticated_userid);
			
			return true;
		} else {
			return false;
		}
	} 
	
	public function LoginUser($userid) {
		$time = time();
		$this->app_database->ConnectDB($this->db_name);
		$sql = "UPDATE app_users
			SET lastlogin='$time'
			WHERE id='$userid'";
		$this->app_database->Query($sql);
		$result = $this->app_database->GetResult();
		if ($result) {
			return true;
		} else {
			return false;
		}
		$this->app_database->Close();
		
		//$this->LoadUser($userid);
	}
	public function RegisterUser($firstname,$lastname,$email,$password) {
		$this->app_database->ConnectDB($this->db_name);
		$regdate = time();
		
		$sql = "INSERT INTO app_users (firstname, lastname, password, email, invitationcode,registrationdate)
				VALUES ('$firstname','$lastname','$password','$email',' ','$regdate');";
		$this->app_database->Query($sql);
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		return $result;
	}
	
	public function RegisterUserWithFacebook($firstname,$lastname,$email,$facebookID) {
		$this->app_database->ConnectDB($this->db_name);
		$regdate = time();
		
		$sql = "INSERT INTO app_users (firstname, lastname, password, email, invitationcode,registrationdate)
				VALUES ('$firstname','$lastname','NULL','$email','$facebookID','$regdate');";
		$this->app_database->Query($sql);
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		
		if ($result) {
			return 1;
		} else {
			return 0;
		}
	}
	
	public function CheckRegistrationByFacebookID($facebookID) {
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query("SELECT * FROM app_users WHERE invitationcode='$facebookID'");
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		$data = $result->fetch_assoc();
		$c = count($data);
		if ($c > 0) {
			return true;
		} else {
			return false;
		}
		
		$result->free();
	}
	
	public function GetUserIDFromFacebookID($facebookID) {
		
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query("SELECT * FROM app_users WHERE invitationcode='$facebookID'");
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		$data = $result->fetch_assoc();
		return $data['id'];
		$result->free();
	} 

	public function RemoveOldClients() {
		
		$time = time() - 600;
		$sql = "DELETE FROM app_clients WHERE lastping < (UNIX_TIMESTAMP() - 600)";
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query($sql);
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		return $result;
		$result->free();
	}
	
	public function RemoveClientsWithIP($ip) {
		$sql = "DELETE FROM app_clients WHERE ip='$ip'";
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query($sql);
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		return $result;
		$result->free();
	}
	
	public function SendPing() {
		$this->RemoveOldClients();
		
		$time = time();
		$this->app_database->ConnectDB($this->db_name);
		
		// First Find our IP
		$ip = $_SERVER['REMOTE_ADDR'];
		
		// Remove old Entries
		//$this->RemoveClientsWithIP($ip);
		
		// Search for IP in DB
		/*
		if ($this->IsClientInDB($ip) == true) {
			$sql = "UPDATE app_clients
			SET lastping='$time'
				WHERE ip='$ip'";
		} else {
			$sql = "INSERT INTO app_clients (userid, ip, lastping)
				VALUES ('0','$ip','$time');";
		} */
		$sql = "INSERT INTO app_clients (userid, ip, lastping)
			VALUES ('0','$ip','$time');";
		
		$this->app_database->Query($sql);
		$result = $this->app_database->GetResult();
		if ($result) {
			return 1;
		} else {
			return 0;
		}
		$this->app_database->Close();
	}
	
	public function GetUser($userid) {
		
		$this->app_database->ConnectDB($this->db_name);
		$this->app_database->Query("SELECT * FROM app_users WHERE id='$userid'");
		$result = $this->app_database->GetResult();
		$this->app_database->Close();
		return $result->fetch_assoc();
		$result->free();
	} 
	
	public function LoadUser($userid) {
		$data = $this->GetUser($userid);
		$_SESSION['firstname'] = $data['firstname'];
		$_SESSION['lastname'] = $data['lastname'];
		$_SESSION['street'] = $data['street'];
		$_SESSION['streetnumber'] = $data['streetnumber'];
		$_SESSION['phonenumber'] = $data['phonenumber'];
		$_SESSION['zipcode'] = $data['zipcode'];
		$_SESSION['city'] = $data['city'];
		$_SESSION['email'] = $data['email'];
		$_SESSION['lastlogin'] = $data['lastlogin'];
		$_SESSION['registrationdate'] = $data['registrationdate'];
		$_SESSION['lastping'] = $data['lastping'];
	}
	
	public function CalculateMinutesForLogin($timestamp) {
		$time = time() - $timestamp;
		$rest = $time % 60;
		
		$str =  round($time/60).' Minuten';
		return $str;
	}
	public function EditAccount($firstname,$lastname,$email) {
		$this->app_database->ConnectDB($this->db_name);
		$sql = "UPDATE app_users
			SET firstname='$firstname', lastname='$lastname', email='$email'
			WHERE id='$userid'";
		$this->app_database->Query($sql);
		$this->app_database->Close();
	}
	
	public function LoadPDFTemplate($templatename) {
		/* 
		* Site Template Konfiguration
		*/
		$template = new Template('templates/pdf/'.$templatename.'.php');
		$template->set('anrede', $anrede);
		$template->set('introtext', $introtext);
		$template->set('cvdata', $cvcontent);
		$template->set('portfoliodata', $portfoliodata);
		$template->set('aboutdata', $aboutdata);
		$template->set('applicant_name', $applicant_name);
		$template->set('applicant_jobtitle', $applicant_jobtitle);
		$template->set('applicant_birthdate', $applicant_birthdate);
		$template->set('applicant_adress', $applicant_adress);
		$template->set('applicant_phone', $applicant_phone);
		$template->set('applicant_mailadress', $applicant_mailadress);
		$template->set('applicant_twitter', $applicant_twitter);
		$template->set('applicant_facebook', $applicant_facebook);
		$template->set('applicant_github', $applicant_github);
		$template->set('applicant_xing', $applicant_xing);
		$template->set('applicant_picture', $applicant_picture);
		$template->set('application_jsonfile', $jsonfile);
		$template->set('lebenslaufcontent', $lebenslaufcontent);
		$template->set('abschlusscontent', $abschlusscontent);
		return $template->render();
	}
	
	public function SaveFile($filename, $mode, $content) {
		$myfile = fopen($filename, $mode) or die("Unable to open file!");
		fwrite($myfile, $content);
		fclose($myfile);
	}
	
	public function Export($jobtitle,$contactfirstname, $contactlastname, $contactgender, $firstname,$lastname,$birthdate,$phonenumber,$mailadress,$picture,$street,$housenumber,$zipcode,$city,$facebook,$github,$twitter,$xing,$theme,$sitetemplate,$mailtemplate,$usecdn,$contact_firstname,$contact_lastname,$contact_companyname,$contact_street,$contact_streetnumber, $contact_zipcode,$contact_city,$introtext,$cvdata,$refdata,$personaltext) {
		
		
		$data = '
		{"PersonalCollectionData":{"Applicant_JobTitle":"'.$jobtitle.'","Applicant_ContactFirstName":"'.$contactfirstname.'","Applicant_ContactLastName":"'.$contactlastname.'","Applicant_ContactGender":"'.$contactgender.'","Applicant_FirstName":"'.$firstname.'","Applicant_LastName":"'.$lastname.'","Applicant_BirthDate":"'.$birthdate.'","Applicant_PhoneNumber":"'.$phonenumber.'","Applicant_MailAdress":"'.$mailadress.'","Applicant_Picture":"'.$picture.'","Applicant_Street":"'.$street.'","Applicant_HouseNumber":"'.$housenumber.'","Applicant_ZipCode":'.$zipcode.',"Applicant_City":"'.$city.'","Applicant_Facebook":"'.$facebook.'","Applicant_Github":"'.$github.'","Applicant_Twitter":"'.$twitter.'","Applicant_Xing":"'.$xing.'"},"DesignConfigurationData":{"Design_Theme":"'.$theme.'","Design_SiteTemplate":"'.$sitetemplate.'","Design_MailTemplate":"'.$mailtemplate.'","bUseCDN":'.$usecdn.'},"CollectionContentData":{"ContactData":{"FirstName":"'.$contact_firstname.'","LastName":"'.$contact_lastname.'","Street":"'.$contact_street.'","StreetNumber":"'.$contact_streetnumber.'","ZipCode":"'.$contact_zipcode.'","City":"'.$contact_city.'"} "IntroText":"'.$introtext.'","CVData":{"LebenslaufItems":[],"AbschluesseItems":[]},"RefData":"'.$refdata.'","PersonalText":"'.$personaltext.'"}}
			';
			
			
			$this->SaveFile("data/test.json", "w", $data);
			
			echo '<script>
		window.location.replace("src/ExportData.php?filename=");
						</script>';
						exit();
	}
	
	
}


?>