<h1>Wünsche und Anregungen</h1>
<p>Solltest du Ideen oder Anregungen haben, teile uns diese mit und wir werden diese bei hoher Nachfrage berücksichtigen! </p>
<div ng-controller="IdeasController">
  
  
    <div class="panel panel-primary">
      <div class="panel-heading">Wünsche und Anregungen</div>
      <div class="panel-body">
      <div class="form-group">
        <p>Teile uns deine Idee oder deine Anregungen mit</p>
        <input type="text" class="form-control" placeholder="Deine E-Mail Adresse" ng-model="email">
        <summernote ng-model="ideadescription" id="summernote"></summernote>
		  <script>
			$(document).ready(function() {
				$('#summernote').summernote();
			});
		  </script>
	<button ng-click="sendIdea()" class="btn btn-default">Idee einreichen</button>
      </div>
    </div>
 </div>