<?php

ini_set('always_populate_raw_post_data', '-1');
$input_raw = file_get_contents("php://input");
$input = json_decode(file_get_contents("php://input"));



// Email senden
$empfaenger = "bugreports@bewerbungsapp.eu";
$betreff = "Bug Zusendung";
$from = 'From: '.$input['email'].' <'.$input['email'].'>';
$from .= 'Reply-To: '.$input['email'].'\n';
$from .= "Content-Type: text/html\n";
$text = $input->bugdescription;
 
mail($empfaenger, $betreff, $text, $from);


// Schreibt den Inhalt in die Datei zurück
$filename = time().'_bugreport.json';
file_put_contents($filename, $input_raw);

$file = fopen($filename,"w");
echo fwrite($file, $text);
fclose($file);

?>