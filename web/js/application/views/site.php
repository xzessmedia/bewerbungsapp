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
*/
?>

<h1>Bewerbungsmappe als Website exportieren</h1>
<p>Um deine Bewerbung als Website zu exportieren, lade im nächsten Schritt deine Mappe (.json) hoch</p>
<div ng-controller="SaveApplicationController">
<iframe frameborder="0" width="100%" height="600px" src="libs/applicationsite/index.php?action=upload">
	
	<hr>
		
	
</div>

	

