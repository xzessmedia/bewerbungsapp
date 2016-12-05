'use strict';

var app = angular.module('ApplicationApp');

app.controller('CommunityInfoController', function($scope, $http) {
	$scope.activeusers = GetActiveUsers();
	
	SendPing();
	
	function GetActiveUsers() {
		$scope.activeusers = 0;
		$http({
		        method : "GET",
		        url : "src/GetActiveUsers.php"
		    }).then(function mySucces(response) {
		        $scope.activeusers = response.data;
		    }, function myError(response) {
		        $scope.activeusers = 0;
		    });	
	};
	
	function SendPing() {
		$http({
		        method : "GET",
		        url : "src/SendPing.php"
		    }).then(function mySucces(response) {
		        console.log(response.data);
		    }, function myError(response) {
		        console.log(response);
		    });		
	};
 });