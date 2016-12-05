<?php
ob_start();
ini_set('upload_max_filesize', '500M');
ini_set('post_max_size', '500M');
ini_set('max_input_time', 1800);
ini_set('max_execution_time', 1800);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/mpdf/mpdf/mpdf.php';

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


/* JSon Verarbeiten */
$postjson 	= $_POST['json'];
$getjson	= $_GET['json'];
/*
$extension = strtolower(pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION));
				//Überprüfung der Dateiendung
				$allowed_extensions = array('json');
				if(!in_array($extension, $allowed_extensions)) {
					echo('<h1>Falsche Dateiendung. </h1><p>Nur json-Dateien sind erlaubt!</p> <a class="btn btn-primary" role="button" href="javascript: history.back()">Andere Datei hochladen</a>');
				}
				

$jsonfile = $_FILES['filename']['name'];
*/
$jsoncodedstring = file_get_contents("php://input");

/* post & gets */
$jsonfilename = $_POST['filename'];
$rendertype = $_POST['pdftype'];

//$json = json_decode($postjson,true);
$json = json_decode($jsoncodedstring,true);
$designarray = $json['DesignConfigurationData'];
$contentarray = $json['CollectionContentData'];
$personaldata = $json['PersonalCollectionData'];

/* Persönliche Daten */
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
$picture = $personaldata['picture'];
$picturedata = $personaldata['picturedata'];
$picturetype = $personaldata['picturetype'];
$ausbildung = $personaldata['ausbildung'];

/* Anschreiben */
$introtext = $contentarray['introtext'];

/* Betreff */
$subject = $contentarray['subject'];

/*Lebenslauf */
$cvdata = $contentarray['CVData'];
$lebenslaufitems = $cvdata['LebenslaufItems'];
$abschlussitems = $cvdata['AbschluesseItems'];

/* Referenzen */
$referencestext = $contentarray['refdata'];


/* Personal */
$personaltext = $contentarray['personaltext'];

/* Gehaltsvorstellung */
$showmoney = $personaldata['showMoney'];
$bruttogehalt = $personaldata['bruttogehaltprojahr'];

if($showmoney == true) {
	$gehalt = '<h2>Gehalt</h2><p>Meine Gehaltsvorstellung liegt bei '.$bruttogehalt.' € brutto pro Jahr</p></br></br>';
}

/* Kontaktdaten / Empfängerdaten */
$contactdata = $contentarray['Contact'];
//die (var_dump($contactdata));


$gender = $contactdata['Gender'];
switch ($gender) {
	case "male":
	$panrede = 'Sehr geehrter Herr '.$contactdata['LastName'].',';
	break;
	case "female":
	$panrede = 'Sehr geehrte Frau '.$contactdata['LastName'].',';
	break;
	case "neutral":
	$panrede = 'Sehr geehrte Damen und Herren,';
	break;
}



$ausbildungscontent = "";
$datum = time();
$datumstr = date("d.m.Y",$datum);

if ($ausbildung == true) {
	$ausbildungscontent = "<h3><p>um einen Ausbildungsplatz</p></h3>";
} else {
	$ausbildungscontent = "";
}
$mpdf = new Mpdf();

$htmlstart = '
<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>
<body>';
	
$html_deckblatt = '
<table style="width: 100%">
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"><h1>Bewerbung</h1></td>
	</tr>
		<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;">'.$ausbildungscontent.'</td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"><img style="width: 25%; height: 25%;" src="'.$picture.'"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
		<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"><h3>als</h3></td>
	</tr>
	
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"><h3>'.$jobtitle.'</h3></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
	<tr>
		<td align="center" style=" font-size: 30pt; text-align: center;"></td>
	</tr>
</table>
<table style="width:100%;">
	<tr>
		<td width="40%"></td>
		<td width="30%" align="left">
					<div style="text-align: left">
					<h3>'.$firstname.' '.$lastname.'</h3><br />
					<br />
					'.$street.' '.$streetnumber.'<br /><br />
					'.$zipcode.' '.$city.'<br />
					<br />Telefon: '.$phonenumber.'<br />
					E-Mail: '.$email.'<br />
					</div>
					
					
		</td>
		<td width="30%"></td>
	</tr>
</table>
				<htmlpagefooter name="myfooter">
				<table width="100%">
					<tr>
						<td width="80%"></td>
						<td width="20%">
							<div style="text-align: right"><strong>Anlagen:</strong><ul><li>Anschreiben</li><li>Lebenslauf</li><li>Zeugnisse</li></ul></div>
						</td>
					</tr>
				</table>
				</htmlpagefooter>
<sethtmlpagefooter name="myfooter" value="on" show-this-page="1" />';

/*
$betreff = "";
if ($ausbildung== true) {
		$betreff = 'Bewerbung um einen Ausbildungsplatz als '.$jobtitle.'</br>'.$subject;
	}	else {
		$betreff = 'Bewerbung als '.$jobtitle.'</br>';
	}
	
*/
$betreff = $subject;

$html_anschreiben = '
	<!--mpdf
<htmlpageheader name="myheader">
<table width="100%"><tr>
<td width="50%"> </td>
<td width="50%" style="text-align: right;"><span style="font-weight: bold; font-size: 14pt;"></span>'.$firstname.' '.$lastname.'<br />'.$street.' '.$streetnumber.'<br />'.$zipcode.' '.$city.'<br />'.$phonenumber.'<br /><span style="font-family:dejavusanscondensed;"></span></td>
</tr></table>
</htmlpageheader>
<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
'.$firstname.' '.$lastname.' ◊ '.$street.' '.$streetnumber.' ◊ '.$zipcode.' '.$city.'
</div>
</htmlpagefooter>
<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->
	
	<table>
		<tr>
			<td>'.$contactdata['CompanyName'].'</td>
		</tr>
		<tr>	
			<td>'.$contactdata['Street'].' '.$contactdata['StreetNumber'].'</td>
		</tr>
		<tr>	
			<td>'.$contactdata['ZipCode'].' '.$contactdata['City'].'</td>
		</tr>
	</table>
	<br />
	<br />
	<div style="text-align: right">'.$city.', den '.$datumstr.'</div>
	<h2>'.$betreff.'</h2>
	<br />
	<br />
	<br />
	'.$panrede.'
	<br />
	'.$introtext;
	
	
$html_lebenslauf = '
	<!--mpdf
	<htmlpageheader name="myheader">
	<table width="100%"><tr>
	<td width="50%"> </td>
	<td width="50%" style="text-align: right;"><span style="font-weight: bold; font-size: 14pt;"></span>'.$firstname.' '.$lastname.'<br />'.$street.' '.$streetnumber.'<br />'.$zipcode.' '.$city.'<br />'.$phonenumber.'<br /><span style="font-family:dejavusanscondensed;"></span></td>
	</tr></table>
	</htmlpageheader>
	<htmlpagefooter name="myfooter">
	<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
	'.$city.', den '.$datumstr.'
	</div>
	</htmlpagefooter>
	<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
	<sethtmlpagefooter name="myfooter" value="on" />
	mpdf-->
		
	<h2>Lebenslauf</h2><br />
	
	';
	


$html_lebenslauf .= '
	<table>
		<tr>
			<td width="50%"><strong>Zeitraum</strong></td>
			<td width="50%"></td>
		</tr>
			';
			
if(count($lebenslaufitems) > 0){
	foreach ($lebenslaufitems as $key => $value) {
		
		$startdate = strtotime($value['StartDate']);
		$enddate = strtotime($value['EndDate']);
	
	 
	 
		$html_lebenslauf .= '
			<tr>
				<td width="50%"> '.date('m/Y', $startdate ).' -  '.date('m/Y', $enddate ).'</td>
				<td width="50%">'.$value['EventDescription'].'</td>
			</tr>
			';
	}
}
$html_lebenslauf .= '</table>

<h2>Abschlüsse</h2>
';

$html_lebenslauf .= '
	<table>
		<tr>
			<td width="50%"></td>
			<td width="50%"></td>
		</tr>
			';
if(count($abschlussitems) > 0){
	foreach ($abschlussitems as $key => $value) {
		$datepstr = strtotime($value['DatePoint']);
		$html_lebenslauf .= '
			<tr>
				<td width="50%"> '.date('m/Y', $datepstr ).'</td>
				<td width="50%">'.$value['EventDescription'].'</td>
			</tr>
			';
	}
}
$html_lebenslauf .= '</table>';

$html_referenzen = '
	<!--mpdf
	<htmlpageheader name="myheader">
	<table width="100%"><tr>
	<td width="50%"> </td>
	<td width="50%" style="text-align: right;"><span style="font-weight: bold; font-size: 14pt;"></span>'.$firstname.' '.$lastname.'<br />'.$street.' '.$streetnumber.'<br />'.$zipcode.' '.$city.'<br />'.$phonenumber.'<br /><span style="font-family:dejavusanscondensed;"></span></td>
	</tr></table>
	</htmlpageheader>
	<htmlpagefooter name="myfooter">
	<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
	'.$firstname.' '.$lastname.' ◊ '.$street.' '.$streetnumber.' ◊ '.$zipcode.' '.$city.'
			</div>
	</htmlpagefooter>
	<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
	<sethtmlpagefooter name="myfooter" value="on" />
	mpdf-->
		
	<h2>Referenzen</h2><br />
	
	'.$referencestext;
	
$html_personal = '
	<!--mpdf
	<htmlpageheader name="myheader">
	<table width="100%"><tr>
	<td width="50%"> </td>
	<td width="50%" style="text-align: right;"><span style="font-weight: bold; font-size: 14pt;"></span>'.$firstname.' '.$lastname.'<br />'.$street.' '.$streetnumber.'<br />'.$zipcode.' '.$city.'<br />'.$phonenumber.'<br /><span style="font-family:dejavusanscondensed;"></span></td>
	</tr></table>
	</htmlpageheader>
	<htmlpagefooter name="myfooter">
	<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
	'.$firstname.' '.$lastname.' ◊ '.$street.' '.$streetnumber.' ◊ '.$zipcode.' '.$city.'
			</div>
	</htmlpagefooter>
	<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
	<sethtmlpagefooter name="myfooter" value="on" />
	mpdf-->
	
	'.$gehalt.'
	<h2>Über mich</h2><br />
	'.$personaltext;
	
	
$htmlend = '				
</body>
</html>
	';
$mpdf = new mPDF('c','A4','','',20,15,48,25,10,10);
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle('Bewerbung '.$firstname.' '.$lastname.' bei '.$contactdata['CompanyName']);
$mpdf->SetAuthor($vorname.' '.$nachname);
$mpdf->SetWatermarkText("BewerbungsApp Vorschau");
$mpdf->showWatermarkText = false;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');


$mpdf->WriteHTML($htmlstart.$html_deckblatt.$htmlend);
$mpdf->AddPage();
$mpdf->WriteHTML($htmlstart.$html_anschreiben.$htmlend);
$mpdf->AddPage();
$mpdf->WriteHTML($htmlstart.$html_lebenslauf.$htmlend);
$mpdf->AddPage();
$mpdf->WriteHTML($htmlstart.$html_referenzen.$htmlend);
$mpdf->AddPage();
$mpdf->WriteHTML($htmlstart.$html_personal.$htmlend);
echo $mpdf->Output($jsonfilename,"S"); 
$mpdf->Output(time().'_'.$firstname.'_'.$lastname.'_'.$contactdata['CompanyName'].'.pdf',"F"); 
exit;
?>