	<div class="container-fluid" ng-controller="StartpageController">
		
		<div align="left">
			<img src="images/logo72.png"><br/>
		</div>
		</br>
		<h1>Übersicht</h1>
		</br>
		</br>
		
	

		    <div class="row">
			<div class="col-sm-4">
				<h3>Versionsübersicht:</h3>
				<p><strong>Aktuelle Version:</strong>  {{version}}</p>
				<hr>
				<div class="embed-responsive embed-responsive-16by9">
				<iframe width="460" height="215" src="https://www.youtube.com/embed/Wkv_HUbRlu4" frameborder="0" allowfullscreen></iframe>
				</div>
				<hr>
				<h4>Letzte Änderungen:</h4>
				 <div class="panel-group" ng-repeat="item in updates">
				    <div class="panel panel-default">
				      <div class="panel-heading"><strong>{{item.Title}}</strong></div>
				      <div class="panel-body">{{item.Text}}</div>
				  </div>
				  </div>
			</div>
			
			 <div class="col-sm-4">
			<h3>Todo Liste:</h3>
			 <hr>
			   <div class="panel-group" ng-repeat="item in todo">
				    <div class="panel panel-default">
				      <div class="panel-heading"><strong>{{item.Title}}</strong></div>
				      <div class="panel-body">{{item.Text}}</div>
			    </div>
			</div>  
			</br>
			<h3>Bug Liste:</h3>
			<hr>
				   <div class="panel-group" ng-repeat="item in bugs">
			    <div class="panel panel-default">
			      <div class="panel-heading"><strong>{{item.Title}}</strong></div>
			      <div class="panel-body">{{item.Text}}</div>
				  </div>
				  </div>
			</div>
			<div class="col-sm-4">
				<h3>Buschfunk</h3>
			<div class="fb-comments" data-href="https://www.facebook.com/bewerbungsapp/" data-width="300" data-numposts="5"></div>
	  		</div> 
		
			
	</div>
	
	
	
	