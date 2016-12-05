'use strict';

var app = angular.module('ApplicationApp');
app.controller('BugreportController', function($scope, $http, $templateCache, toastr, Data) {
	
	
	
	
	$scope.bugdescription = "Gebe hier eine genaue Beschreibung an";
	$scope.email = Data.getPersonalMail();
	$scope.sendBugReport = function () {
	var bugdata = { };
	bugdata.bugdescription = $scope.bugdescription;
	
	        	// Post Bug to Server
		$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";
		var res = $http.post('src/SendBug.php', bugdata);
		res.success(function(data, status, headers, config) {
			$scope.serverresponse = data;
			toastr.success('Vielen Dank, dein Fehlerbericht wurde den Entwicklern zugesendet! ');
		});
		res.error(function(data, status, headers, config) {
			toastr.error( "failure message: " + JSON.stringify({data: data}));
		});
   	 };
});
