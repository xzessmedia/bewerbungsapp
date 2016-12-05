'use strict';

var app = angular.module('ApplicationApp');
app.controller('IdeasController', function($scope, $http, $templateCache, toastr, Data) {
	
	$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
	
	
	$scope.ideadescription = "Gebe hier eine genaue Beschreibung deiner Idee an";
	$scope.email = Data.getPersonalMail();
	$scope.sendIdea = function () {
	var ideadata = { };
	ideadata.ideadescription = $scope.ideadescription;
	
	        	// Post Bug to Server
				
		var res = $http.post('src/SendIdea.php', ideadata);
		res.success(function(data, status, headers, config) {
			$scope.serverresponse = data;
			toastr.success('Vielen Dank, deine Idee wurde den Entwicklern zugesendet! ');
		});
		res.error(function(data, status, headers, config) {
			toastr.error( "failure message: " + JSON.stringify({data: data}));
		});
   	 };
});
