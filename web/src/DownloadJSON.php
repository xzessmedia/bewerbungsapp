<?php
ob_start();
ini_set('always_populate_raw_post_data', '-1');
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);
$jsoncodedstring = file_get_contents("php://input");
$jsonfilename = $_POST['filename'];
$json = json_decode($jsoncodedstring);
header('Content-disposition: attachment; filename='.$jsonfilename.'.json');
header('Content-type: application/json');
echo $jsoncodedstring;

?>