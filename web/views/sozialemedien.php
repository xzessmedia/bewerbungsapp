<h1>Persönliche Daten:</h1>
<h2>Soziale Medien</h2>

<div ng-controller="PersonalController">
	
<ul class="nav nav-pills nav-justified">
  <li><a href="#/personal">Person</a></li>
  <li><a href="#/familie">Familie</a></li>
  <li><a href="#/kenntnisse">Kenntnisse</a></li>
  <li class="active"><a href="#/sozialemedien">Soziale Netzwerke</a></li>
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
		    <label for="website">Homepage:</label>
		    <input type="text" id="website" ng-model="PersonalData.website" name="website" class="form-control">
		</div>
		  <button ng-click="setPersonalDataSocialMedia(PersonalData.facebook,PersonalData.xing,PersonalData.twitter,PersonalData.github,PersonalData.website)" class="btn btn-default">Änderungen speichern</button>
		</form>
	</div>
	
	