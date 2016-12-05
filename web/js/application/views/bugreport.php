<h1>Fehler melden</h1>
<p>Wenn dir ein Fehler oder ein Problem aufgefallen ist, kannst du es uns hier melden! </p>
<div ng-controller="BugreportController">
  
  
    <div class="panel panel-primary">
      <div class="panel-heading">Fehlerbeschreibung</div>
      <div class="panel-body">
      <div class="form-group">
        <p>Mache bitte möglichst genaue und verständliche Angaben wie sich der Fehler oder das Problem darstellt oder erzeugen lässt</p>
        <input type="text" class="form-control" placeholder="Deine E-Mail Adresse" ng-model="email">
        <summernote ng-model="bugdescription" id="summernote"></summernote>
		  <script>
			$(document).ready(function() {
				$('#summernote').summernote();
			});
		  </script>
	<button ng-click="sendBugReport(email,bugdescription)" class="btn btn-default">Fehler melden</button>
      </div>
    </div>
 </div>