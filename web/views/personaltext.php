<h1>Bewerbungs-Inhalt</h1>
	<form>
		
	<ul class="nav nav-pills nav-justified">
		<li><a href="#/company">Empfänger</a></li>
		<li><a href="#/introtxt">Anschreiben</a></li>
		  <li><a href="#/cvdata">Lebenslauf</a></li>
		  <li><a href="#/ref">Referenzen</a></li>
		  <li class="active"><a href="#/abouttxt">Persönlicher Text</a></li>
	</ul>
<div ng-controller="ContentController">
	<div class="jumbotron">
		
		<h3>Persönlicher Text:</h3>
		<p>Schreibe hier noch etwas über deine Person, deine Qualifikationen oder persönliche Einstellung</p>
		   <summernote ng-model="personaltext" id="summernote"><p>Schreibe etwas über dich</p></summernote>
		  <script>
			$(document).ready(function() {
				$('#summernote').summernote();
			});
		  </script>
		<p></p>
		
	</div>
	  <div class="jumbotron">
		  <p> Bitte denk daran deine Änderungen auch zu speichern!</p>
	   <button ng-click="setPersonalText(personaltext)" class="btn btn-default">Änderungen speichern</button>
   	</div>
</div>
	  </form>
	

