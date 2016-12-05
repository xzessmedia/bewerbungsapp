<h1>Bewerbungs-Inhalt</h1>
	<form>
		
	<ul class="nav nav-pills nav-justified">
		<li><a href="#/company">Empfänger</a></li>
		<li><a href="#/introtxt">Anschreiben</a></li>
		  <li class="active"><a href="#/cvdata">Lebenslauf</a></li>
		  <li><a href="#/ref">Referenzen</a></li>
		  <li><a href="#/abouttxt">Persönlicher Text</a></li>
	</ul>
<div ng-controller="ContentController">
	<div class="jumbotron">
		
		
	
		<h3>Lebenslauf</h3>
		
			<div class="table-responsive">
				<table class="table">
				  <tr>
				    <th>Von-Bis</th>
				    <th>Was</th> 
					<th></th>
				  </tr>
				<tr ng-repeat="item in CVItems">
				    <td>{{item.StartDate | date : "MM/yyyy"}} - {{item.EndDate | date : "MM/yyyy" }}</td>
				    <td>{{item.EventDescription}}</td> 
				    <td><button type="button" ng-click="removeCVItem($index)" class="btn btn-xsmall btn-secondary">Löschen</button></td>
				</tr>
				<tr>
					<td><div class="row"><div class="col-lg-6"><input type="date" id="datepicker" ng-model="date1" name="date1" class="form-control" width="100%"></div>  <div class="col-lg-6"><input type="date"  id="datepicker" ng-model="date2" name="date2" class="form-control"></div></div></td>
				<td><input type="text" ng-model="cvitemdesc" name="email" class="form-control"></td> 
				<td></td>
				</tr>
				</table>
				
				
				<div>
					
					<button ng-click="addCVItem(date1,date2,cvitemdesc)" type="button" class="btn btn-primary">Neuer Eintrag</button>
					<button type="button" class="btn btn-secondary">Eintrag löschen</button>
				</div>
			</div>
		<p></p>
		<h3>Abschlüsse</h3>
		
			<div class="table-responsive">
				<table class="table">
				  <tr>
				    <th>Wann</th>
				    <th>Was</th> 
				<th></th>
				  </tr>
				  <tr ng-repeat="item in CVAItems">
				    <td>{{item.DatePoint | date : "MM/yyyy"}}</td>
				    <td>{{item.EventDescription}}</td> 
					<td><button type="button" ng-click="removeCVAItem($index)" class="btn btn-xsmall btn-secondary">Löschen</button></td>
				</tr>
				<tr>
					<td><input type="date" ng-model="datepoint"  id="datepicker"  name="date2" class="form-control"></td>
				<td><input type="text" ng-model="cvadesc" name="email" class="form-control"></td> 
				<td></td>
				</tr>
				</table>
				<div>
					<button ng-click="addCVAItem(datepoint,cvadesc)" type="button" class="btn btn-primary">Neuer Eintrag</button>
				</div>
			</div>
			<p></p>
		 
			
	</div>
	  <div class="jumbotron">
		  <p> Bitte denk daran deine Änderungen auch zu speichern!</p>
	   <button ng-click="saveData()" class="btn btn-default">Änderungen speichern</button>
   	</div>
</div>
	  </form>
	<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

    <script src="js/jquery/jquery-3.1.0.js"></script> 
	  