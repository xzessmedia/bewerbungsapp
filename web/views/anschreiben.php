<h1>Bewerbungs-Inhalt</h1>
	<form>
		
	<ul class="nav nav-pills nav-justified">
		<li><a href="#/company">Empfänger</a></li>
		<li class="active"><a href="#/introtxt">Anschreiben</a></li>
		  <li><a href="#/cvdata">Lebenslauf</a></li>
		  <li><a href="#/ref">Referenzen</a></li>
		  <li><a href="#/abouttxt">Persönlicher Text</a></li>
	</ul>
<div ng-controller="ContentController">

	<div class="jumbotron">
		
		<h3>Anschreiben</h3>
		<p>Benutze keine Anrede, diese wird automatisch für dich generiert!</p>
		   <summernote ng-model="introtext" id="summernote"><p>Dein persönliches Anschreiben ohne Anrede (Sehr geehrte..), diese wird später hinzugefügt!</p></summernote>
		   
		  <script>
			$(document).ready(function() {
				$('#summernote').summernote();
			});
		  </script>
		<p></p>
		
	</div>
	  <div class="jumbotron">
		  <p> Bitte denk daran deine Änderungen auch zu speichern!</p>
	   <button ng-click="setIntroText(introtext)" class="btn btn-default">Änderungen speichern</button>
   	</div>
</div>
	  </form>
	

