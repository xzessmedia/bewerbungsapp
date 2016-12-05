<div ng-controller="PersonalController">
<h1>{{ 'general.PersonalData' | i18n }}:</h1>
<h2>{{ 'general.SocialMedia' | i18n }}</h2>	
<ul class="nav nav-pills nav-justified">
  <li><a i18n="general.Person" href="#/personal">Person</a></li>
  <li><a i18n="general.Work" href="#/beruf">Beruf</a></li>
  <li><a i18n="general.Knowledge" href="#/kenntnisse">Kenntnisse</a></li>
  <li class="active"><a i18n="general.SocialMedia" href="#/sozialemedien">Soziale Medien</a></li>
</ul>
		<div class="form-group">
		    <label for="xing">Xing:</label>
		    <input type="text" id="xing" ng-model="PersonalData.xing" name="xing" class="form-control">
		</div>
		<div class="form-group">
		    <label for="facebook">Facebook:</label>
		    <input type="text" id="facebook" ng-model="PersonalData.facebook" name="facebook" class="form-control">
		</div>
		<div class="form-group">
		    <label for="twitter">Twitter:</label>
		    <input type="text" id="twitter" ng-model="PersonalData.twitter" name="twitter" class="form-control">
		</div>
		<div class="form-group">
		    <label for="github">Github:</label>
		    <input type="text" id="github" ng-model="PersonalData.github" name="github" class="form-control">
		</div>
		<div class="form-group">
		    <label for="website">{{ 'personal.Website' | i18n }}:</label>
		    <input type="text" id="website" ng-model="PersonalData.website" name="website" class="form-control">
		</div>
		  <button ng-click="setPersonalDataSocialMedia(PersonalData.facebook,PersonalData.xing,PersonalData.twitter,PersonalData.github,PersonalData.website)" class="btn btn-default" i18n="general.SaveChanges">Änderungen speichern</button>
		</form>
	</div>
	
	