<div ng-controller="SaveApplicationController">
<h1>Bewerbungsmappe als PDF exportieren</h1>

	<form action="https://app.bewerbungsapp.eu/pdf/RenderPDF.php" method="post" enctype="multipart/form-data">	
<div class="form-group">
	<label for="filename">Dateiname:</label>
	 <input type="text"  ng-model="filename" name="filename" id="filename" class="form-control" placeholder="Name der Bewerbungsmappendatei">
</div>
	</form>
<strong>Die Generierung dauert einen Moment. Der Fortschritt wird ganz oben angezeigt!</strong></br>
	<button class="btn btn-default" ng-click="sendApplicationToServer(appData,filename)">Export zu PDF</button>
<div ng-show="content">
<h1>PDF Vorschau:</h1>
<embed ng-src="{{content}}" style="width:100%;height:400px;"></embed>
</div>
</div>

	

