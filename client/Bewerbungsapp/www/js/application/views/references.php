<div ng-controller="ContentController">
<h1 i18n="content.ApplicationContent">Bewerbungs-Inhalt</h1>
	<form>
		
	<ul class="nav nav-pills nav-justified">
		<li><a href="#/company" i18n="content.Receiver">Empfänger</a></li>
		<li><a href="#/introtxt" i18n="content.Letter">Anschreiben</a></li>
		  <li><a href="#/cvdata" i18n="content.CV">Lebenslauf</a></li>
		  <li class="active"><a href="#/ref" i18n="content.References">Referenzen</a></li>
		  <li><a href="#/abouttxt" i18n="content.Personal">Persönlicher Text</a></li>
	</ul>

	<div class="jumbotron">
		
			
	  <h3 i18n="content.References">Referenzen</h3>
	  <p i18n="content.ReferencesDescription">Füge hier alle deine Referenzen und eingescannten Dokumente ein. Benutze dazu die Funktion Bild hinzufügen</p>
		   <summernote ng-model="refdata" id="summernote"><p>Füge hier deine Referenzen ein, zB. eingescannte Dokumente etc.</p></summernote>
		  <script>
			$(document).ready(function() {
				$('#summernote').summernote();
			});
		  </script>
		<p></p>
		
	</div>
	  <div class="jumbotron">
		  <p i18n="content.SaveModification"> Bitte denk daran deine Änderungen auch zu speichern!</p>
	   <button ng-click="setReferences(refdata)" class="btn btn-default" i18n="general.SaveChanges">Änderungen speichern</button>
   	</div>

	  </form>
	</div>

