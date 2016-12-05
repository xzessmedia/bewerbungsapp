<h1>Persönliche Daten:</h1>


<div ng-controller="PersonalController">
	
<ul class="nav nav-pills nav-justified">
  <li class="active"><a href="#/personal">Person</a></li>
  <li><a href="#/familie">Familienstand</a></li>
  <li><a href="#/kenntnisse">Kenntnisse</a></li>
  <li><a href="#/sozialemedien">Soziale Netzwerke</a></li>
</ul>

		  <div class="form-group">
		<label for="vorname">Vorname:</label>
		    <input type="text"  ng-model="PersonalData.firstname" name="vorname"  class="form-control" placeholder="Vorname">
		</div>
		<div class="form-group">
		<label for="nachname">Nachname:</label>
		   <input type="text" ng-model="PersonalData.lastname" name="nachname" class="form-control" placeholder="Nachname">
		  </div>
		  <div class="form-group">
		    <label for="email">E-Mail Adresse:</label>
		    <input type="email" ng-model="PersonalData.email" name="email" class="form-control"  placeholder="name@mail.com">
		</div>
		  <div class="form-group">
		    <label for="jobname">Job Bezeichnung:</label>
		    <input type="text" ng-model="PersonalData.jobtitle" name="jobname" class="form-control" placeholder="z.B. Bäcker">
		</div>
		<div class="form-group">
		    <label for="jobname">Bewerbung um eine Ausbildungsstelle:</label>
		    <input type="checkbox" ng-model="PersonalData.ausbildung" name="ausbildung" class="form-control">
		</div>
		<div class="form-group">
		   <label for="phone">Telefon/Handy:</label>
		<span>{{PersonalData.phonenumber  | tel}}</span><br/>
		   <input type='text' phone-input"  numbers-only ng-model="PersonalData.phonenumber" name="phone" class="form-control" placeholder="0228362149">
	  	 </div>
		 <div class="form-group">
		    <label for="street">Straße:</label>
		    <input type="text" ng-model="PersonalData.street" name="street" class="form-control"  placeholder="Rudolfsallee">
		</div>
		 <div class="form-group">
		   <label for="streetnum">Hausnummer:</label>
		   <input type="text" ng-model="PersonalData.streetnumber" name="streetnum"  class="form-control" placeholder="12">
		   </div>
		    <div class="form-group">
		   <label for="plz">Postleitzahl:</label>
		    <input type="number" ng-model="PersonalData.zipcode" name="plz"  class="form-control">
		   </div>
		    <div class="form-group">
		   <label for="city">Wohnort:</label>
		   <input type="text" ng-model="PersonalData.city" name="city" class="form-control"  placeholder="Bonn">
	   	</div>
		<div class="form-group">
		    <label for="birthdate">Geburtsdatum:</label>
		    <input type="date" id="datepicker" ng-model="PersonalData.birthdate" name="birthdate" class="form-control">
		</div>
		<img class="img-responsive" style="width: 25%; height: 25%;" src="{{PersonalData.picture}}">
		<div class="form-group">
		    <label for="street">Foto:</label>
		<form name="form">
			<input type="file" ng-model="file" name="file" base-sixty-four-input required onload="onLoad" maxsize="500" accept="image/*">
		  </br>
		  </form>
			</div>	
		  <button ng-click="setPersonalData(PersonalData.firstname,PersonalData.lastname,PersonalData.jobtitle,PersonalData.ausbildung,PersonalData.email,PersonalData.phonenumber,PersonalData.street,PersonalData.streetnumber,PersonalData.zipcode,PersonalData.city,PersonalData.birthdate,file,PersonalData.facebook,PersonalData.xing,PersonalData.twitter,PersonalData.github,PersonalData.website)" class="btn btn-default">Änderungen speichern</button>
	</div>
	
	