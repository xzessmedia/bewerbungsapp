<?php require_once("../appcore.php"); ?>

<h1>Bewerbungsmappe speichern</h1>
<div ng-controller="SaveApplicationController">
	<div class="form-group">
		<label for="filename">Name der Bewerbungsmappe:</label>
	<p>Einfach einen Dateinamen angeben und du erhälst eine .json Datei. Diese kannst du dir speichern um die Bewerbungsmappe jederzeit öffnen zu können.</p>
	<p>Bitte beachte dass die Verabeitung einen Moment dauert!</p>
		   <input type="text" ng-model="fname" name="filename" class="form-control" placeholder="Dateiname">
	 </div>
		   
	<input type="hidden" name="json" value="{{appData}}">
	<input type="hidden" name="uid" value="<?php echo $_SESSION['authenticated_userid']; ?>">
	<button ng-click="saveToPc(appData,fname)" class="btn btn-default" >Mappe speichern</button>
	
</div>

	

