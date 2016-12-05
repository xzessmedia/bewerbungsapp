<?php
require_once("../appcore.php");
?>
<h1>Bewerbungsmappe laden</h1>
<div ng-controller="LoadApplicationController">
	<div class="jumbotron">
		
		<h3>Bewerbungsmappe auswählen und öffnen</h3>
	<form>
	
		

	<?php
	
?>
		
	<h4>Von Datei</h4>
	<label for="mappe">
	<input type="file" accept=".json" ng-file-select="onFileSelect($files)" >
	</form>	
</div>
	

