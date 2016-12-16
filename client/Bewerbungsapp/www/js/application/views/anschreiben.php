<div ng-controller="ContentController">
<h1 i18n="content.ApplicationContent">Bewerbungs-Inhalt</h1>
	<form>
		
	<ul class="nav nav-pills nav-justified">
		<li><a href="#/company" i18n="content.Receiver">Empfänger</a></li>
		<li class="active"><a href="#/introtxt" i18n="content.Letter">Anschreiben</a></li>
		  <li><a href="#/cvdata" i18n="content.CV">Lebenslauf</a></li>
		  <li><a href="#/ref" i18n="content.References">Referenzen</a></li>
		  <li><a href="#/abouttxt" i18n="content.Personal">Persönlicher Text</a></li>
	</ul>


	<div class="jumbotron">
		
		<h3 i18n="content.IntroText">Anschreiben</h3>
		<div class="form-group">
		<label for="betreff" i18n="content.Subject">Betreff:</label>
		    <input type="text"  ng-model="subject" name="betreff"  class="form-control" placeholder="{{ 'content.SubjectPlaceholder' | i18n }}">
		</div>
		<p i18n="content.InfoText">Benutze keine Anrede, diese wird automatisch für dich generiert!</p>
		   <summernote ng-model="introtext" id="summernote"><p>Dein persönliches Anschreiben ohne Anrede (Sehr geehrte..), diese wird später hinzugefügt!</p></summernote>
		   
		  <script>
			$(document).ready(function() {
				$('#summernote').summernote();
			});
		  </script>
		<p></p>
		
	</div>
	  <div class="jumbotron">
		  <p i18n="content.SaveModification"> Bitte denk daran deine Änderungen auch zu speichern!</p>
	   <button ng-click="setIntroText(subject,introtext)" class="btn btn-default" i18n="general.SaveChanges">Änderungen speichern</button>
   	</div>

	  </form>
	
</div>
