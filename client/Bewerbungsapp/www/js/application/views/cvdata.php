<div ng-controller="ContentController">
<h1 i18n="content.ApplicationContent">Bewerbungs-Inhalt</h1>
	<form>
		
	<ul class="nav nav-pills nav-justified">
		<li><a href="#/company" i18n="content.Receiver">Empfänger</a></li>
		<li><a href="#/introtxt" i18n="content.Letter">Anschreiben</a></li>
		  <li class="active"><a href="#/cvdata" i18n="content.CV">Lebenslauf</a></li>
		  <li><a href="#/ref" i18n="content.References">Referenzen</a></li>
		  <li><a href="#/abouttxt" i18n="content.Personal">Persönlicher Text</a></li>
	</ul>

	<div class="jumbotron">
		
		
	
		<h3 i18n="content.CV">Lebenslauf</h3>
		
			<div class="table-responsive">
				<table class="table">
				  <tr>
				    <th i18n="content.FromTo">Von-Bis</th>
				    <th i18n="content.What">Was</th> 
					<th></th>
				  </tr>
				<tr ng-repeat="item in CVItems">
				    <td>{{item.StartDate | date : "MM/yyyy"}} - {{item.EndDate | date : "MM/yyyy" }}</td>
				    <td>{{item.EventDescription}}</td> 
				    <td><button type="button" ng-click="removeCVItem($index)" class="btn btn-xsmall btn-secondary" i18n="content.Delete">Löschen</button></td>
				</tr>
				<tr>
					<td><div class="row"><div class="col-lg-6"><input type="date" id="datepicker" ng-model="date1" name="date1" class="form-control" width="100%"></div>  <div class="col-lg-6"><input type="date"  id="datepicker" ng-model="date2" name="date2" class="form-control"></div></div></td>
				<td><input type="text" ng-model="cvitemdesc" name="email" class="form-control"></td> 
				<td></td>
				</tr>
				</table>
				
				
				<div>
					
					<button ng-click="addCVItem(date1,date2,cvitemdesc)" type="button" class="btn btn-primary" i18n="content.NewItem">Neuer Eintrag</button>
					<button type="button" class="btn btn-secondary" i18n="content.DeleteItem">Eintrag löschen</button>
				</div>
			</div>
		<p></p>
		<h3 i18n="content.Rewards">Abschlüsse</h3>
		
			<div class="table-responsive">
				<table class="table">
				  <tr>
				    <th i18n="content.When">Wann</th>
				    <th i18n="content.What">Was</th> 
				<th></th>
				  </tr>
				  <tr ng-repeat="item in CVAItems">
				    <td>{{item.DatePoint | date : "MM/yyyy"}}</td>
				    <td>{{item.EventDescription}}</td> 
					<td><button type="button" ng-click="removeCVAItem($index)" class="btn btn-xsmall btn-secondary" i18n="content.Delete">Löschen</button></td>
				</tr>
				<tr>
					<td><input type="date" ng-model="datepoint"  id="datepicker"  name="date2" class="form-control"></td>
				<td><input type="text" ng-model="cvadesc" name="email" class="form-control"></td> 
				<td></td>
				</tr>
				</table>
				<div>
					<button ng-click="addCVAItem(datepoint,cvadesc)" type="button" class="btn btn-primary" i18n="content.NewItem">Neuer Eintrag</button>
				</div>
			</div>
			<p></p>
		 
			
	</div>
	  <div class="jumbotron">
		  <p i18n="content.SaveModification"> Bitte denk daran deine Änderungen auch zu speichern!</p>
	   <button ng-click="saveData()" class="btn btn-default" i18n="general.SaveChanges">Änderungen speichern</button>
   	</div>

	  </form>
</div>

	  