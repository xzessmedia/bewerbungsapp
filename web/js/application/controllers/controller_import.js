'use strict';

var app = angular.module('ApplicationApp');
app.controller('ImportController', function($scope, Data){
    	$scope.applicationdata = Data.getApplicationData();
	
	
	
	$scope.importApplicationData = function(data) {
		Data.importApplication(data);
	}
	$scope.updateData = function() {
		$scope.applicationdata = Data.getApplicationData();
	}
	
	$scope.exportApplicationData = function() {
		
	}
	
		
	
		
});