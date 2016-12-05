
<div ng-controller="LoadApplicationController">
<h1>{{ 'general.LoadApplication' | i18n }}</h1>
	<div class="jumbotron">
		
		<h3>{{ 'general.LoadApplication_SelectOpen' | i18n }}</h3>
	<form>
	
		
	<h4>{{ 'general.FromFile' | i18n }}</h4>
	<label for="mappe">
	<input type="file" accept=".json" ng-file-select="onFileSelect($files)" >
	</br></br>
	<button ng-click="loadApplication(appData)" class="btn btn-default" >Bewerbungsmappe von Datei laden</button>
	<button ng-click="loadApplicationFromStorage()" class="btn btn-default" >Bewerbungsmappe lokal laden</button>
	</form>	
	</div>

	<hr>
	<div class="jumbotron">
	<h2>Bewerbungen in der Cloud:</h2>
	<ul>
		<li ng-repeat="item in applications"><button ng-click="loadApplicationFromCloud($index)" class="btn btn-primary btn-sm">Bewerbung {{$index}} laden</button></li>
	</ul>
	</div>

</div>

