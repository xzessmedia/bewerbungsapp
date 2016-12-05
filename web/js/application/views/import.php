<?php
require_once("../appcore.php");
?>
<h1>Bewerbungsmappendaten importieren</h1>
<div ng-controller="ImportController">
		
	Hier einfach den JSON Inhalt reinkopieren (Strg+V) und auf Import klicken: <br/>
	 <textarea name="json" ng-model="applicationdata" cols="40" rows="10"></textarea>
	 <hr>
	 <button class="btn btn-default" ng-click="importApplicationData(applicationdata)">Importieren</button>	
	<hr>
	Debug: <br/>
	<p>Daten: {{applicationdata}}</p>	
	<hr>
</div>
	

