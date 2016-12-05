'use strict';

var app = angular.module('ApplicationApp');
app.controller('StartpageController', function($scope,toastr, $window, $log,JsonLocalDataProvider){
	$scope.todolist = [];
	$scope.buglist = [];
	
	$scope.todo = JsonLocalDataProvider.getTodo();
	$scope.bugs = JsonLocalDataProvider.getBugs();
	$scope.updates = JsonLocalDataProvider.getUpdates();
	
	
		  
});