<?php
/*
*	Bewerbungssitegenerator
*	Copyright (c) 2016
*	Tim Koepsel <tim.koepsel@me.com>
*
*
*
* TO DO:
*  C# native  UI Token Generator
*  DateTime umwandeln in String
*  Export to PDF
*
* Known Bugs:
* 
*/

class Bewerbungsmappe
{
	public $PersonalCollectionData;
	public $DesignConfigurationData;
	public $CollectionContentData;
	
	/* Constructor der Klasse
	*/
	function __construct()
	{
		$this->PersonalCollectionData 	= new PersonalData();
		$this->DesignConfigurationData 	= new DesignConfiguration();
		$this->CollectionContentData 	= new ContentData();
	}
	

	
}

class PersonalData
{
	public $Applicant_FirstName;
	public $Applicant_LastName;
	public $Applicant_BirthDate;
	public $Applicant_PhoneNumber;
	public $Applicant_MailAdress;
	public $Applicant_Picture;
	public $Applicant_Street;
	public $Applicant_HouseNumber;
	public $Applicant_ZipCode;
	public $Applicant_City;
}

class DesignConfiguration
{
	public $Design_Theme;
	public $Design_SiteTemplate;
	public $Design_MailTemplate;
	public $bUseCDN;
}


class ContentData
{
	public $IntroText;
	public $CVData;
	public $RefData;
	public $PersonalText;
}


class Bewerbung 
{
	/* Private Variablen der Klasse */
	private $token;							// Das Token ist ein verschlüsselter String und trägt persönliche Daten des Empfängers
	private $activecollectiondata;
	private $receiver;						// Der Name des Empfängers / der Kontaktperson
	private $gender;						// Enthält das Geschlecht des Empfängers "male","female","neutral" und dient zur korrekten Anrede
	private $theme;							// String welches Angabe zum genutzten Theme der Bewerbung enthält
	private $s_template;					// HTML Template / Vorlage für Bewerbung (siehe /templates/ im Root)
	private $template;
	private $cv;
	private $portfolio;
	private $applicantname;
	private $applicantbirthdate;
	private $applicantadress;
	private $applicantphone;
	private $applicantmailadress;
	
	/* Constructor der Klasse
	*/
	function __construct()
	{
		$this->theme 		= "cosmo"; 		// Theme ist standardmässig auf "cosmo"
		$this->s_template 	= "template_1";	// Template ist standardmässig "template_1" aus dem /template/ Verzeichnis
	}
	
	/* SetToken
	* Diese Funktion setzt ein neues Token welches verschlüsselte persönliche Daten beinhaltet
	* Ein Token kann über den browser - adresszeile: index.php?action=generate&name=Max Mustermann&gender=male
	* generiert werden und dient zur korrekten Anrede und Individualisierung 
	* @newtoken		String		Enthält das Token
	*/
	public function SetToken($newtoken)
	{
		$this->token = $newtoken;
	}
		
	/* SetTheme
	* Diese Funktion setzt das Standard Theme welches das Farbskin steuert
	* Themes sind im css Format und liegen im Verzeichnis /js/bootstrap/css/ und haben das Format
	* bootstrap_$name.css
	* @newtheme		String		Enthält den Namen des gewünschten Themes zB. "cosmo" 
	*/
	public function SetTheme($newtheme)
	{
		$this->theme = $newtheme;
	}
	
	/* SetTemplate
	* Diese Funktion setzt das Standard Template welches das Aussehen steuert
	* Templates sind im html Format und liegen im Verzeichnis /templates/
	* @newtemplate	String		Enthält den Dateinamen des gewünschten Templates zB. "Template_1" 
	*/
	public function SetTemplate($newtemplate)
	{
		$this->s_template = $newtemplate;
	}
	
	/* GenerateApplication
	* Diese Funktion generiert die komplette Bewerbung anhand eines Templates und diversen Variablen
	* @applicant_name	String		Der Name des Bewerbers
	* @applicant_jobtitle	String		Der Beruf für welchen diese Bewerbung generiert wird
	* ....Dokumentation unvollständig
	*/
	
	public function GenerateApplication($jsonfile, $contactname, $contactgender, $applicant_picture, $applicant_name,$applicant_jobtitle,$applicant_birthdate,$applicant_adress, $applicant_phone,$applicant_mailadress,$applicant_twitter,$applicant_facebook,$applicant_github,$applicant_xing, $introtext,$cvdata_lebenslauf, $cvdata_abschluesse, $portfoliodata,$aboutdata) {
		
		
		
		/* Anrede für die Einleitung generieren  */
		$anrede = $this->GenerateGreeting($contactname, $contactgender);
		
		
		$lebenslaufcontent = "";
		$abschlusscontent = "";
		
		
		
		 
						

						foreach ($cvdata_lebenslauf as $cvdata)
						{
							
							$startdate = strtotime($cvdata['StartDate']);
							$enddate = strtotime($cvdata['EndDate']);
							 $year1 = date("Y", $startdate); 
						 	 $year2 = date("Y", $enddate); 
							 $month1 = date("m", $startdate); 
						 	 $month2 = date("m", $enddate);
						$lebenslaufcontent .= '
							<tr>
							    <td> '.$month1.'/'.$year1.' - '.$month2.'/'.$year2.'</td>
							    <td align="left">'.$cvdata['EventDescription'].'</td>
							</tr>';
						}
						
						foreach ($cvdata_abschluesse as $adata)
						{
							
						$datepstr = strtotime($adata['DatePoint']);	
								
						$abschlusscontent .= '
							<tr>
							    <td>'.date('m/Y', $datepstr ).'</td>
							    <td align="left">'.$adata['EventDescription'].'</td>
							</tr>';
						}
						
						
			
		
		$cvcontent = $lebenslaufcontent.$abschlusscontent;
		
		
		/* 
		* Site Template Konfiguration
		*/
		$template = new Template('templates/site/'.$this->s_template.'.php');
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
		echo $template->render();

	
	}
	
	/* GenerateTokenForData
	* Diese Funktion generiert ein Token welches als Träger für individuelle verschlüsselte Informationen dient
	* und gleichzeitig die Bewerbung etwas gegen unberechtigte User, welche kein Token besitzen, schützt.
	* @data	String		Enthält persönliche unverschlüsselte Informationen (Name) zB. "Max Mustermann,male" 
	*				oder "Tina Turner, female" oder "Empty,neutral"
	* @return	String		Enthält den Inhalt (Body) im HTML Format
	*/
	public function GenerateTokenForData($jsonfilename)
	{
	return $this->encrypt($jsonfilename);
	}
	
	/* ProcessToken
	* Diese Funktion verarbeitet das erhaltene Token und dient gleichzeitig zur Authorisierung
	* @data	String		Token welches verschlüsselte Daten beinhaltet
	* @return	Boolean	Status der Authorisierung
	*/
	public function ProcessToken($token) {
		$jsonfile = $this->decrypt($token);
		
		
		$url =  "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'].'data/'.$jsonfile.'json';
		$content = file_get_contents($url);
		$json = json_decode($content, true);

		return $json;
	}
	
	/* Sendmail
	* Diese Funktion sendet die Formular Daten an den Bewerber
	* @data	String		Token welches verschlüsselte Daten beinhaltet
	* @return	Boolean	Status der Authorisierung
	*/
	public function Sendmail($absender,$absenderadresse,$infomessage,$termindatum,$terminzeit,$receiveradress) {
	
		
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	$headers .= "From: <".$absenderadresse.">\n";
	$headers .= "X-Priority: 1\n";
			
		// HTML E-Mail Nachricht erzeugen
		$mailmessage = $this->GeneratePage("Antwort",'
			<h1>Antwort auf deine Bewerbung</h1><br />
			<p>Sehr geehrter Bewerber,</p>
			<p>Du scheinst Interesse geweckt zu haben!<br />
			'.$absender.' hat dir folgende Informationen hinterlassen:</p>
			<p>&nbsp;</p>
			<p><strong>Vorstellungstermin:</strong><br />
			 Am '.$termindatum.' um '.$terminzeit.'
			</p>
			<p><strong>Weitere Informationen:<br />
			</strong>'.$infomessage.'</p>
			<p><strong>Antwort Adresse:</strong><br />
			'.$absenderadresse.'
				</p>',$this->theme);
		
		// Versendet die E-Mail
		$result = mail($receiveradress, "Antwort von Bewerbung", $mailmessage, $headers);
		
		return $result;
	}
		
	/* GenerateGreeting
	* Diese Funktion erzeugt die passende Anrede anhand der per Token erhaltenen Daten
	* @return	String		Anrede zb. "Sehr geehrter Herr Max Mustermann"
	*/
	public function GenerateGreeting($name, $gender) {
		
		$returnstring = "";
			switch ($gender) {
				case "male":
				$returnstring = 'Sehr geehrter Herr '.$name;
				break;
				case "female":
				$returnstring = 'Sehr geehrte Frau '.$name;
				break;
				case "neutral":
				$returnstring = 'Sehr geehrte Damen und Herren';
			}
		return $returnstring;
	}
	
	public function ShowInfoBox($title,$text)
	{
		$info = '<div class="jumbotron"><h1>'.$title.'</h1><p>'.$text.'</p></div>';
				
		echo $this->GeneratePage($title,$info,$this->theme);
	}
	
	public function ShowPage($title,$content)
	{
		
				
		echo $this->GeneratePage($title,$content,$this->theme);
	}
	
	/* Generate Page
	* Diese Funktion ist eine Helper Funktion um schnell per Bootstrap
	* responsive Ausgaben zu erzeugen
	* @title		String		Entspricht dem Seiten Titel
	* @content	String		Enthält den Inhalt (Body) im HTML Format
	* @theme	String		Ist ein Bootstrap Theme (zB. u.a. "cosmo", "slate", "flatly", "sandstone","spacelab","superhero","yeti")
	* @return	String		Enthält die komplette generierte HTML Seite welche bereit zur Ausgabe ist
	*/
	public function GeneratePage($title,$content,$theme="cosmo") 
	{
		return('<!DOCTYPE html>
			<html lang="en">
			<head>
			  <title>'.$title.'</title>
			  <meta charset="utf-8">
			  <meta name="viewport" content="width=device-width, initial-scale=1">
			  <link rel="shortcut icon" href="/favicon.ico">
			  <link href="js/bootstrap/css/bootstrap_'.$theme.'.css" rel="stylesheet">
			</head>
			<body ng-app="ApplicationApp"><div class="container-fluid">'.$content.'</div><script src="js/angular/angular.min.js"></script><script src="js/bootstrap/js/bootstrap.min.js"></script><script src="js/jquery/jquery-3.1.0.js"></script></body></html>');
	}
			
	
	public function NETDateConverter($date)
	{
		preg_match('~(\d+)\d{3}((?:\+|-)\d+)~',  $date, $match);
		$dt = new DateTime('@' . $match[1]);
		$dt = new DateTime($dt->format('m/Y') . ' ' . $match[2]);
		$date =  strtotime($dt->format('r'));	
		return $date;
	}
	
	 public function encrypt($string) {
	  $result = '';
	  for($i=0; $i<strlen ($string); $i++) {
	    $char = substr($string, $i, 1);
	    $keychar = substr("timkoepsel1984", ($i % strlen("timkoepsel1984"))-1, 1);
	    $char = chr(ord($char)+ord($keychar));
	    $result.=$char;
	  }
	
	  return base64_encode($result);
	}
	
	 public function decrypt($string) {
	  $result = '';
	  $string = base64_decode($string);
	
	  for($i=0; $i<strlen($string); $i++) {
	    $char = substr($string, $i, 1);
	    $keychar = substr("timkoepsel1984", ($i % strlen("timkoepsel1984"))-1, 1);
	    $char = chr(ord($char)-ord($keychar));
	    $result.=$char;
	  }
	  return $result;
  	}
	
	
}

/* Custom Template Class
*
* Diese Klasse dient dazu HTML Templates zu laden und darzustellen bzw
*
* In einer HTML Seite Werte zu ersetzen
*
*/

class Template
{
    protected $_file;
    protected $_data = array();

    public function __construct($file = null)
    {
        $this->_file = $file;
    }

    public function set($key, $value)
    {
        $this->_data[$key] = $value;
        return $this;
    }

    public function render()
    {
        extract($this->_data);
        ob_start();
        include($this->_file);
        return ob_get_clean();
    }
}



?>