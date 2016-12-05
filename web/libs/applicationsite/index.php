<?php
require_once 'bewerbung.php';
session_start();



if (!function_exists('base_url')) {
    function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
    }
}


$siteurl = 'https://app.bewerbungsapp.eu/libs/applicationsite';
$bewerbung = new Bewerbung();

// Action Handler ohne Token
$action = $_GET['action'];
if (isset($action)) {
	switch ($action) {
		case "contact":
		$name 		= $_POST['name'];
		$email	 	= $_POST['email'];
		$datum 		= $_POST['vorstellungsdatum'];
		$time	 	= $_POST['vorstellungszeit'];
		$infomsg 	= $_POST['message'];
		
		$result = $bewerbung->Sendmail($name,$email,$infomsg,$datum,$time,"tim.koepsel@me.com");
		
		if ($result == true) {
			$bewerbung->ShowInfoBox("Info","<p>Bewerber wurde kontaktiert und über den Termin informiert! Vielen Dank für das gegenseitige Interesse!</p>");
		}else {
			$bewerbung->ShowInfoBox("Achtung","<p>Nachricht konnte aus unbekannten Gründen nicht abgesendet werden!</p>");
		}
		
		break;
		case "generate":
		$filename 	= $_GET['filename'];
		
		if(!isset($filename))
		{
			echo "Specify filename in adressbar like this: index.php?action=generate&filename=MeineBewerbung";
		} else {
			
			$ddata = $bewerbung->GenerateTokenForData($filename);

			
			$edata = $bewerbung->decrypt($ddata);
			echo '<h1>Generated Token</h1><p>'.$ddata.'</p>';
			echo '<h2>Token Inhalt:</h2><p>'.$edata.'</p>';
		}
		
		break;	
		case "upload":
		$f 	= $_GET['file'];
		if(isset($f))
		{
			
			if($_POST['submit'])
			{
				$extension = strtolower(pathinfo($_FILES['bewerbungsmappe']['name'], PATHINFO_EXTENSION));
				//Überprüfung der Dateiendung
				$allowed_extensions = array('json');
				if(!in_array($extension, $allowed_extensions)) {
					die('<h1>Falsche Dateiendung. </h1><p>Nur json-Dateien sind erlaubt!</p> <a class="btn btn-primary" role="button" href="javascript: history.back()">Andere Datei hochladen</a>');
				}
				
				move_uploaded_file($_FILES['bewerbungsmappe']['tmp_name'], 'data/'.$_FILES['bewerbungsmappe']['name']);
				
			
			
			$filename = $_FILES['bewerbungsmappe']['name'];
		$html = '
			';
			$ddata = $bewerbung->GenerateTokenForData($filename);
			$edata = $bewerbung->decrypt($ddata);
			
			$shorturl = $siteurl.'/index.php?token='.$ddata;
			echo $homepage;
			
			$java = '<script type="text/javascript">
			var copyTextareaBtn = document.querySelector('."'.js-textareacopybtn'".');
				
				copyTextareaBtn.addEventListener('."'click'".', function(event) {
				  var copyTextarea = document.querySelector('."'.js-copytextarea'".');
				  copyTextarea.select();
				
				  try {
				    var successful = document.execCommand('."'copy');
				    var msg = successful ? 'successful' : 'unsuccessful';
				    alert('URL wurde in die Zwischenablage kopiert!');
				    console.log('Copying text command was ' + msg);
				  } catch (err) {
				    console.log('Oops, unable to copy');
				  }
				});
				</script>";
			$html.= '<h2>URL zur Website:</h2><span>Diese Adresse kannst du an den Empfänger senden</span></br><a href="'.$shorturl.'"><strong>'.$shorturl.'</strong></a><hr><p>
  <textarea class="js-copytextarea">'.$shorturl.'</textarea>
</p>

<p>
  <button class="js-textareacopybtn">In Zwischenablage kopieren</button>
</p>;'.$java;
			
			
			
		$bewerbung->ShowInfoBox("eBewerbung",$html);	}
			else {
				$bewerbung->ShowInfoBox("Error",'Da hat was nicht geklappt!');	
			}
		} else {
			
		
		$html = '
			<form action="index.php?action=upload&file=true" method="post" enctype="multipart/form-data">
		Bewerbungsmappe hochladen und als Website exportieren (eBewerbung):
			    <input type="file" name="bewerbungsmappe" id="fileToUpload">
			    <input type="submit" value="Bewerbungsmappe hochladen" name="submit">
			</form>';
			$bewerbung->ShowInfoBox("eBewerbung",$html);
			
		}
		break;
	}	
}


/* Token Verarbeitung  / Bewerbung nur verarbeiten bei Token*/
$token = $_GET['token'];
if (isset($token)) {

	$jsonfile = $bewerbung->decrypt($token);
		
		
		$url =  $siteurl.'/data/'.$jsonfile;
		if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
			die('Token is incorrect, no authorisation granted!');
		}

		$content = file_get_contents($url);
		$json = json_decode($content);
		$json_array = json_decode($content,true);
		$designarray = $json_array['DesignConfigurationData'];
		$contentarray = $json_array['CollectionContentData'];
		$personaldata = $json_array['PersonalCollectionData'];
		
		$firstname = $personaldata['firstname'];
		$lastname = $personaldata['lastname'];
		$jobtitle = $personaldata['jobtitle'];
		$email = $personaldata['email'];
		$phonedata = $personaldata['phonenumber'];
		$vorwahl = substr ($phonedata ,0,4 );
		$rufnummer = substr ($phonedata ,4,12 );
		$phonenumber = '('.$vorwahl.') '.$rufnummer;
		$street = $personaldata['street'];
		$streetnumber = $personaldata['streetnumber'];
		$zipcode = $personaldata['zipcode'];
		$city = $personaldata['city'];
		$birthdate = $personaldata['birthdate'];
		$picturedata = $personaldata['picturedata'];
		$picturetype = $personaldata['picturetype'];
		$finalpicture = 'data:'.$picturetype.';base64,'.$picturedata;
		$ausbildung = $personaldata['ausbildung'];
		
		$facebook = $personaldata['facebook'];
		$xing = $personaldata['xing'];
		$twitter = $personaldata['twitter'];
		$github = $personaldata['github'];
		
		
		
		/* Anschreiben */
		$introtext = $contentarray['introtext'];
		
		/*Lebenslauf */
		$cvdata = $contentarray['CVData'];
		$lebenslaufitems = $cvdata['LebenslaufItems'];
		$abschlussitems = $cvdata['AbschluesseItems'];
		
		/* Referenzen */
		$referencestext = $contentarray['refdata'];
		
		
		
		/* Personal */
		$personaltext = $contentarray['personaltext'];
		
		/* Kontaktdaten / Empfängerdaten */
		$contactdata = $contentarray['Contact'];
		
		$applicant_name 		= $firstname.' '.$lastname;
		$applicant_jobtitle 		= $jobtitle;
		$applicant_adress		= $street.' '.$streetnumber.', '.$zipcode.' '.$city;
		$applicant_birthdate 		= $birthdate;
		$applicant_phone 		= $phonenumber;
		$applicant_mailadress		= $email;
		$applicant_twitter		= $twitter;
		$applicant_facebook		= $facebook;
		$applicant_xing		= $xing;
		$applicant_github		= $github;
		$applicant_picture		= $personaldata['picture'];
		$contactname			= $contactdata['FirstName'].' '.$contactdata['LastName'];
		$contactgender			= $contactdata['Gender'];
		$portfoliodata			= str_replace("<img ",'<img style="max-width:80%; height: auto;" ',$referencestext);
		$aboutdata				= $personaltext;
		
		$cvdata_lebenslauf 		= $lebenslaufitems;
		$cvdata_abschluesse		= $abschlussitems;
		
		/*
		// Json Array durchparsen und lebenslauf und abschluesse arrays raussuchen
		foreach($json_array  as $row)
		{
			foreach($row as $key => $val)
			{
				
				if($key=='CVData')
				{
					$cvdata_lebenslauf = $val['LebenslaufItems'];	
					$cvdata_abschluesse = $val['AbschluesseItems'];
				}
				
				
				
			}
			
		}*/

		$bewerbung->GenerateApplication($url, $contactname, $contactgender, $applicant_picture, $applicant_name,$applicant_jobtitle,$applicant_birthdate,$applicant_adress, $applicant_phone,$applicant_mailadress,$applicant_twitter,$applicant_facebook,$applicant_github,$applicant_xing, $introtext,$cvdata_lebenslauf, $cvdata_abschluesse, $portfoliodata,$aboutdata); 
		
		
	
	
} else {
	if (isset($action)) {
		
	} else {
		$bewerbung->ShowInfoBox("Achtung", "Du hast leider keine Authorisation!");
	}
		
}




?>