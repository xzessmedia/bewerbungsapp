<?php
/* App Core Webservice
*
*
*/

$header = 'Access-Control-Allow-Origin: *
Access-Control-Allow-Methods: GET, POST
	Access-Control-Allow-Headers: X-Custom-Header';
echo header($header);
require_once('appcore.php');

function AddUser($firstname,$lastname,$email,$facebookID) {
	global $appcore;
	return $appcore->RegisterUserWithFacebook($firstname,$lastname,$email,$facebookID);
}

function LoginUser($facebookID) {
	global $appcore;
	$userid = $appcore->GetUserIDFromFacebookID($facebookID);
	return $appcore->LoginUser($userid);
}
function IsRegistered($facebookID) {
	global $appcore;
	return $appcore->CheckRegistrationByFacebookID($facebookID);
}

function SendPing($facebookID) {
	global $appcore;
	return $appcore->SendPing();
}
function AddApplication($facebookID,$data) {
	global $appcore;
	$userid = $appcore->GetUserIDFromFacebookID($facebookID);
	$appcore->SaveApplicationtoDB($userid, $data);
}

function CountActiveUsers() {
	global $appcore;
	return $appcore->GetActiveUsers();
}

function SQLQuery($sql) {
	global $appcore;
	return $appcore->DBQuery($sql);
}

function GetMinutesFromLogin($facebookID) {
	global $appcore;
	$userid = $appcore->GetUserIDFromFacebookID($facebookID);
	$userdata = $appcore->GetUser($userid);
	$timestamp = $userdata['lastlogin'];
	$minutes = $appcore->CalculateMinutesForLogin($timestamp);
	return $minutes;
}

$server = new SoapServer("appservice.wsdl");
$server->addFunction("AddUser");
$server->addFunction("LoginUser");
$server->addFunction("IsRegistered");
$server->addFunction("SendPing");
$server->addFunction("AddApplication");
$server->addFunction("CountActiveUsers");
$server->addFunction("GetMinutesFromLogin");
$server->addFunction("SQLQuery");
$server->handle();


?>