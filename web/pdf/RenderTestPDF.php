<?php

ini_set('upload_max_filesize', '500M');
ini_set('post_max_size', '500M');
ini_set('max_input_time', 1800);
ini_set('max_execution_time', 1800);


$extension = strtolower(pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION));
				//Überprüfung der Dateiendung
				$allowed_extensions = array('json');
				if(!in_array($extension, $allowed_extensions)) {
					echo('<h1>Falsche Dateiendung. </h1><p>Nur json-Dateien sind erlaubt!</p> <a class="btn btn-primary" role="button" href="javascript: history.back()">Andere Datei hochladen</a>');
				}
				

$jsonfile = $_FILES['filename']['name'];
$jsoncodedstring = file_get_contents($jsonfile);
echo $jsoncodedstring;
?>
?>