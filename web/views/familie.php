<h1>Persönliche Daten:</h1>
<h2>Herkunft und Familie</h2>

<div ng-controller="PersonalController">
	
<ul class="nav nav-pills nav-justified">
  <li><a href="#/personal">Person</a></li>
  <li class="active"><a href="#/familie">Familie</a></li>
  <li><a href="#/kenntnisse">Kenntnisse</a></li>
  <li><a href="#/sozialemedien">Soziale Netzwerke</a></li>
</ul>
		<div class="form-group">
		    <label for="geburtsort">Geburtsort:</label>
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
		    <label for="kinder">Kinder:</label>
		    <input type="text" numbers-only id="kinder" ng-model="PersonalData.kinder" name="website" class="form-control">
		</div>
			</form>
		  <button ng-click="setPersonalDataFamilie(PersonalData.geburtsort,PersonalData.familienstand,PersonalData.kinder)" class="btn btn-default">Änderungen speichern</button>
	</div>
	
	