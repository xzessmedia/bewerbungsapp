

<div ng-controller="BerufController">
<h1>{{ 'general.PersonalData' | i18n }}:</h1>
<h2>{{ 'general.Work' | i18n }}</h2>	
<ul class="nav nav-pills nav-justified">
  <li><a i18n="general.Person" href="#/personal">Person</a></li>
  <li class="active"><a i18n="general.Work" href="#/beruf">Beruf</a></li>
  <li><a i18n="general.Knowledge" href="#/kenntnisse">Kenntnisse</a></li>
  <li><a i18n="general.SocialMedia" href="#/sozialemedien">Soziale Medien</a></li>
</ul>
		<form>
		<div class="form-group">
		    <label for="jobname" i18n="personal.JobTitle">Job Bezeichnung:</label>
		    <input type="text" ng-model="personaldata.jobtitle" name="jobname" class="form-control" placeholder="{{ 'personal.ie' | i18n }} {{ 'personal.Baker' | i18n }}">
		</div>
		<div class="form-group">
		    <label for="jobname" i18n="personal.ApplicationForApprenticeship">Bewerbung um eine Ausbildungsstelle:</label>
		    <input type="checkbox" ng-model="personaldata.ausbildung" name="ausbildung" class="form-control">
		</div>
		<div class="form-group">
		    <label for="showGehalt" i18n="personal.SpecifySalaryExpectations">Gehaltsvorstellung angeben</label>
		    <input type="checkbox" ng-model="personaldata.showMoney" name="showGehalt" class="form-control">
		</div>
		<div class="form-group" ng-show="personaldata.showMoney">
		    <label for="bruttogehaltprojahr">{{ 'personal.SalaryExpectations' | i18n }} ({{ 'personal.GrossSalaryYear' | i18n }}):</label>
			<h3>{{personaldata.bruttogehaltprojahr | currency}} {{ 'personal.gross' | i18n }} {{ 'personal.perYear' | i18n }}</h3>
			<h4>{{personaldata.bruttogehaltprojahr/12 | currency}} {{ 'personal.gross' | i18n }} {{ 'personal.perMonth' | i18n }}</h4>
		    <input type="text" ng-model="personaldata.bruttogehaltprojahr" name="bruttogehaltprojahr" class="form-control" placeholder="{{ 'personal.ie' | i18n }} 25000">
		</div>
			</form>
		  <button ng-click="setPersonalDataBeruf(personaldata.jobtitle,personaldata.ausbildung,personaldata.bruttogehaltprojahr,personaldata.showMoney)" class="btn btn-default" i18n="general.SaveChanges">Änderungen speichern</button>
	</div>
	
	