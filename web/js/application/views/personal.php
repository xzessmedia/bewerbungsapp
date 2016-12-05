


<div ng-controller="PersonalController">
<h1>{{ 'general.PersonalData' | i18n }}:</h1>
<ul class="nav nav-pills nav-justified">
  <li class="active"><a i18n="general.Person" href="#/personal">Person</a></li>
  <li><a i18n="general.Work" href="#/beruf">Beruf</a></li>
  <li><a i18n="general.Knowledge" href="#/kenntnisse">Kenntnisse</a></li>
  <li><a i18n="general.SocialMedia" href="#/sozialemedien">Soziale Medien</a></li>
</ul>
		  <div class="form-group">
		<label for="vorname">{{ 'personal.FirstName' | i18n }}:</label>
		    <input type="text"  ng-model="PersonalData.firstname" name="vorname"  class="form-control" placeholder="{{ 'personal.FirstName' | i18n }}">
		</div>
		<div class="form-group">
		<label for="nachname">{{ 'personal.LastName' | i18n }}:</label>
		   <input type="text" ng-model="PersonalData.lastname" name="nachname" class="form-control" placeholder="{{ 'personal.LastName' | i18n }}">
		  </div>
		  <div class="form-group">
		    <label for="email">{{ 'personal.EMailAdress' | i18n }}:</label>
		    <input type="email" ng-model="PersonalData.email" name="email" class="form-control"  placeholder="name@mail.com">
		</div>
		<div class="form-group">
		   <label for="phone">{{ 'personal.Phone' | i18n }}/{{ 'personal.Mobile' | i18n }}:</label>
		<span>{{PersonalData.phonenumber  | tel}}</span><br/>
		   <input type='text' phone-input"  numbers-only ng-model="PersonalData.phonenumber" name="phone" class="form-control" placeholder="0228362149">
	  	 </div>
		 <div class="form-group">
		    <label for="street">{{ 'personal.Street' | i18n }}:</label>
		    <input type="text" ng-model="PersonalData.street" name="street" class="form-control"  placeholder="Rudolfsallee">
		</div>
		 <div class="form-group">
		   <label for="streetnum">{{ 'personal.Housenumber' | i18n }}:</label>
		   <input type="text" ng-model="PersonalData.streetnumber" name="streetnum"  class="form-control" placeholder="12">
		   </div>
		    <div class="form-group">
		   <label for="plz">{{ 'personal.ZipCode' | i18n }}:</label>
		    <input type="number" ng-model="PersonalData.zipcode" name="plz"  class="form-control">
		   </div>
		    <div class="form-group">
		   <label for="city">{{ 'personal.City' | i18n }}:</label>
		   <input type="text" ng-model="PersonalData.city" name="city" class="form-control"  placeholder="Bonn">
	   	</div>
		<div class="form-group">
		    <label for="birthdate">{{ 'personal.Birthday' | i18n }}:</label>
		    <input type="date" id="datepicker" ng-model="PersonalData.birthdate" name="birthdate" class="form-control">
		</div>
		<div class="form-group">
		    <label for="geburtsort">{{ 'personal.Birthplace' | i18n }}:</label>
		    <input type="text" id="geburtsort" ng-model="PersonalData.geburtsort" name="geburtsort" class="form-control">
		</div>
		<div class="form-group">
		    <label for="familienstand">Familienstand:</label>
		</br>
		<select class="form-control" ng-options="obj.name for obj in familienstandliste" ng-model="PersonalData.familienstand" name="font">
				<option value="">-- Familienstand angeben --</option>
		</select>
		</div>
		<div class="form-group">
		    <label for="kinder">{{ 'personal.Children' | i18n }}:</label>
		    <input type="text" numbers-only id="kinder" ng-model="PersonalData.kinder" name="website" class="form-control">
		</div>
		<img class="img-responsive" style="width: 25%; height: 25%;" src="{{PersonalData.picture}}">
		<div class="form-group">
		    <label for="file">{{ 'personal.Picture' | i18n }}:</label>
		<form name="form">
			<input type="file" ng-model="file" name="file" base-sixty-four-input required onload="onLoad" maxsize="500" accept="image/*">
		  </br>
		  </form>
			</div>	
		  <button ng-click="setPersonalData(PersonalData.firstname,PersonalData.lastname,PersonalData.email,PersonalData.phonenumber,PersonalData.street,PersonalData.streetnumber,PersonalData.zipcode,PersonalData.city,PersonalData.birthdate,PersonalData.birthplace, PersonalData.familystatus, PersonalData.children,file)" class="btn btn-default" i18n="general.SaveChanges"></button>
	</div>
	
	