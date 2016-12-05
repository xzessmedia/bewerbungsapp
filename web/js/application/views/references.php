<h1>Bewerbungs-Inhalt</h1>
	<form>
		
	<ul class="nav nav-pills nav-justified">
		<li><a href="#/company">Empfänger</a></li>
		<li><a href="#/introtxt">Anschreiben</a></li>
		  <li><a href="#/cvdata">Lebenslauf</a></li>
		  <li class="active"><a href="#/ref">Referenzen</a></li>
		  <li><a href="#/abouttxt">Persönlicher Text</a></li>
	</ul>
<div ng-controller="ContentController">
	<div class="jumbotron">
		
			
	  <h3>Referenzen</h3>
	  <p>Füge hier alle deine Referenzen und eingescannten Dokumente ein. Benutze dazu die Funktion Bild hinzufügen</p>
		   <summernote ng-model="refdata" id="summernote"><p>Füge hier deine Referenzen ein, zB. eingescannte Dokumente etc.</p></summernote>
		  <script>
			$(document).ready(function() {
				$('#summernote').summernote();
			});
		  </script>
		<p></p>
		
	</div>
	  <div class="jumbotron">
		  <p> Bitte denk daran deine Änderungen auch zu speichern!</p>
	   <button ng-click="setReferences(refdata)" class="btn btn-default">Änderungen speichern</button>
   	</div>
</div>
	  </form>
	

