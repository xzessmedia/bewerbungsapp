<div ng-controller="ContentController">
<h1 i18n="content.ApplicationContent">Bewerbungs-Inhalt</h1>
	<form>
		
	<ul class="nav nav-pills nav-justified">
		<li class="active"><a href="#/company" i18n="content.Receiver">Empfänger</a></li>
		<li><a href="#/introtxt" i18n="content.Letter">Anschreiben</a></li>
		  <li><a href="#/cvdata" i18n="content.CV">Lebenslauf</a></li>
		  <li><a href="#/ref" i18n="content.References">Referenzen</a></li>
		  <li ><a href="#/abouttxt" i18n="content.Personal">Persönlicher Text</a></li>
	</ul>

	<div class="jumbotron">
		<form class="form-horizontal">
		<div class="form-group">
		<label for="anrede" i18n="content.Greeting">Anrede:</label></br>
		   <select ng-model="ContactData.Gender" name="anrede" class="form-control">
			<option value="male" i18n="content.GreetingMale">Sehr geehrter Herr</option>
		  	<option value="female" i18n="content.GreetingFemale">Sehr geehrte Frau</option>
			<option value="neutral" i18n="content.GreetingNeutral">Sehr geehrte Damen und Herren</option>
			<option value="none"></option>
		  </select>
		  </div>
		  <div class="form-group">
		<label for="vorname" i18n="personal.FirstName">Vorname:</label>
		    <input type="text"  ng-model="ContactData.FirstName" name="vorname" class="form-control" placeholder="{{ 'personal.FirstName' | i18n }}">
		</div>
		<div class="form-group">
		<label for="nachname" i18n="personal.LastName">Nachname:</label>
		   <input type="text" ng-model="ContactData.LastName" name="nachname" class="form-control" placeholder="{{ 'personal.LastName' | i18n }}">
		</div>
		<div class="form-group">
		    <label for="jobname" i18n="content.CompanyName">Firmenname:</label>
		    <input type="text" ng-model="ContactData.CompanyName" name="jobname" class="form-control" placeholder="{{ 'content.CompanyDescription' | i18n }}">
		</div>
		 <div class="form-group">
		    <label for="street" i18n="personal.Street">Straße:</label>
		    <input type="text" ng-model="ContactData.Street" name="street" class="form-control" placeholder="Rudolfsallee">
		</div>
		 <div class="form-group">
		   <label for="streetnum" i18n="personal.Housenumber">Hausnummer:</label>
		   <input type="text" ng-model="ContactData.StreetNumber" name="streetnum" class="form-control" placeholder="12">
		   </div>
		    <div class="form-group">
		   <label for="plz" i18n="personal.ZipCode">Postleitzahl:</label>
		    <input type="number" ng-model="ContactData.ZipCode" name="plz" class="form-control">
		   </div>
		    <div class="form-group">
		   <label for="city" i18n="personal.City">Wohnort:</label>
		   <input type="text" ng-model="ContactData.City" name="city" class="form-control" placeholder="{{ 'personal.City' | i18n }}">
			   </div>
	  <div class="jumbotron">

		  <p i18n="content.SaveModification"> Bitte denk daran deine Änderungen auch zu speichern!</p>
	   <button ng-click="addContact(ContactData.Gender,ContactData.FirstName,ContactData.LastName,ContactData.CompanyName,ContactData.Street,ContactData.StreetNumber,ContactData.ZipCode,ContactData.City)" class="btn btn-default" i18n="general.SaveChanges">Änderungen speichern</button>
   	</div>

	  </form>
</div>

