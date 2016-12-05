<?php require_once("../appcore.php"); ?>

<h1>Bewerbungsmappe speichern</h1>
<div ng-controller="SaveApplicationController">
	<button ng-click="AddFileToGoogleDrive(appData)" class="btn btn-default" ><img src="/codeprojects/application/images/gdrive.png">In Google Drive speichern</button>
	<button ng-click="AddApplicationToDB()">Bewerbung in Datenbank speichern</button>
	<button ng-click="QueryTest()">QueryTest</button>
	<button ng-click="SendPing()">SendPing</button>
		<hr>
	 <input type="checkbox" name="awesome" ng-model="IsDebug">Debug
	<div ng-show="IsDebug">
		<strong>Debug Output: </strong>(Markieren und kopieren)   
		<div class="jumbotron">
		<p>{{appData}}</p>
		</div>
		</div>
</div>

	

