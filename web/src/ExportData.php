<?php
require_once("../appcore.php");



$file = $_POST['json'];
$uid = $_POST['uid'];
$filename = $_POST['filename'];


// Save to Database
if (isset($uid)) {
	$appcore->SaveApplicationtoDB($uid, $file);
}

// Return File
if (isset($file) && isset($filename)) {
	$filename = $filename.'.json';
//$file_name = basename($file);
header("Content-Type: application/json");
header("Content-Disposition: attachment; filename=" . $filename);
header("Content-Length: " .strlen($file));
echo $file;
exit;
} else {
	die("Keine Daten empfangen!");
}



?>