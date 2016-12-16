<h1>Bewerbungsmappe speichern</h1>
<div ng-controller="SaveApplicationController">
	<div class="form-group">
	<form>
		<label for="filename">Name der Bewerbungsmappe:</label>
	<p>Einfach einen Dateinamen angeben und du erhälst eine .json Datei. Diese kannst du dir speichern um die Bewerbungsmappe jederzeit öffnen zu können.</p>
	<p>Bitte beachte dass die Verabeitung einen Moment dauert!</p>
		   <input type="text" ng-model="fname" name="filename" class="form-control" placeholder="Dateiname">
	 </div>
	<button ng-click="saveToPc(appData,fname)" class="btn btn-default" >Bewerbungsmappe herunterladen</button>
	<button ng-click="saveLocal(appData)" class="btn btn-default" >Bewerbungsmappe lokal speichern</button>
	<button ng-click="saveRemote(appData)" class="btn btn-default" >Bewerbungsmappe in Cloud speichern</button>
	</form>
</div>

	

