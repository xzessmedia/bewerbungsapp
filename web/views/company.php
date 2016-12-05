<h1>Bewerbungs-Inhalt</h1>
	<form>
		
	<ul class="nav nav-pills nav-justified">
		<li class="active"><a href="#/company">Empfänger</a></li>
		<li><a href="#/introtxt">Anschreiben</a></li>
		  <li><a href="#/cvdata">Lebenslauf</a></li>
		  <li><a href="#/ref">Referenzen</a></li>
		  <li ><a href="#/abouttxt">Persönlicher Text</a></li>
	</ul>
<div ng-controller="ContentController">
	<div class="jumbotron">
		<form class="form-horizontal">
		<div class="form-group">
		<label for="nachname">Anrede:</label></br>
		   <select ng-model="ContactData.Gender" name="anrede" class="form-control">
			<option value="male">Sehr geehrter Herr</option>
		  	<option value="female">Sehr geehrte Frau</option>
			<option value="neutral">Sehr geehrte Damen und Herren</option>
		  </select>
		  </div>
		  <div class="form-group">
		<label for="vorname">Vorname:</label>
		    <input type="text"  ng-model="ContactData.FirstName" name="vorname" class="form-control" placeholder="Vorname">
		</div>
		<div class="form-group">
		<label for="nachname">Nachname:</label>
		   <input type="text" ng-model="ContactData.LastName" name="nachname" class="form-control" placeholder="Nachname">
		</div>
		<div class="form-group">
		    <label for="jobname">Firmenname:</label>
		    <input type="text" ng-model="ContactData.CompanyName" name="jobname" class="form-control" placeholder="der Name der Firma">
		</div>
		 <div class="form-group">
		    <label for="street">Straße:</label>
		    <input type="text" ng-model="ContactData.Street" name="street" class="form-control" placeholder="Rudolfsallee">
		</div>
		 <div class="form-group">
		   <label for="streetnum">Hausnummer:</label>
		   <input type="text" ng-model="ContactData.StreetNumber" name="streetnum" class="form-control" placeholder="12">
		   </div>
		    <div class="form-group">
		   <label for="plz">Postleitzahl:</label>
		    <input type="number" ng-model="ContactData.ZipCode" name="plz" class="form-control">
		   </div>
		    <div class="form-group">
		   <label for="city">Wohnort:</label>
		   <input type="text" ng-model="ContactData.City" name="city" class="form-control" placeholder="Bonn">
			   </div>
	  <div class="jumbotron">

		  <p> Bitte denk daran deine Änderungen auch zu speichern!</p>
	   <button ng-click="addContact(ContactData.Gender,ContactData.FirstName,ContactData.LastName,ContactData.CompanyName,ContactData.Street,ContactData.StreetNumber,ContactData.ZipCode,ContactData.City)" class="btn btn-default">Änderungen speichern</button>
   	</div>
</div>
	  </form>
	

