<?php
/*
require_once('../mail/phpmailer/phpmailer/class.phpmailer.php');

$mail             = new PHPMailer(); // defaults to using php "mail()"

$body             = "<p>Bewerbung im Anhang!</p>";
$body             = eregi_replace("[\]",'',$body);

$mail->AddReplyTo("bewerbungsapp@xzessmedia.de","First Last");

$mail->SetFrom('bewerbungsapp@xzessmedia.de', 'First Last');

$mail->AddReplyTo("name@yourdomain.com","First Last");

$address = "whoto@otherdomain.com";
$mail->AddAddress($address, "John Doe");

$mail->Subject    = "Bewerbungsapp: PDF Export Mailversand";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

$mail->AddAttachment("images/phpmailer.gif");      // attachment
$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

https://www.xzessmedia.de/codeprojects/application/pdf/RenderPDF.php
https://app.bewerbungsapp.eu/pdf/RenderPDF.php
*/
?>

<h1>Bewerbungsmappe als PDF exportieren</h1>
<div ng-controller="SaveApplicationController">
	<form action="pdf/RenderPDF.php" method="post" enctype="multipart/form-data">	
<div class="form-group">
	<label for="filename">Dateiname:</label>
	 <input type="text"  ng-model="filename" name="filename" id="filename" class="form-control" placeholder="Name der Bewerbungsmappendatei">
</div>
	</form>
<strong>Die Generierung dauert einen Moment. Der Fortschritt wird ganz oben angezeigt!</strong></br>
	<button class="btn btn-default" ng-click="sendApplicationToServer(appData,filename)">Export zu PDF</button>
<div ng-show="content">
<h1>PDF Vorschau:</h1>
<embed ng-src="{{content}}" style="width:100%;height:400px;"></embed>
</div>
</div>

	

