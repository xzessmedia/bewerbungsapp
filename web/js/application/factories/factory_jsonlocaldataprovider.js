'use strict';

var app = angular.module('ApplicationApp');
app.factory('JsonLocalDataProvider', function($http){
	  
	  var todo = [];
	  var bugs = {};
	  var updates = {};
	  var json = {};
	  $http.get('data/todo.json').success(function(data) {
	        // you can do some processing here
	        todo = data;
	    }); 
	$http.get('data/bugs.json').success(function(data) {
	        // you can do some processing here
	        bugs = data;
	    });
	$http.get('data/updates.json').success(function(data) {
	        // you can do some processing here
	        updates = data;
	    }); 	
	
	return {
		loadData: function(appid) {
		     	$http.get('index.php?a=load&appid=1').success(function(data) {
		        // you can do some processing here
		        json = data;
				return json;
	    }); 	
		  },
		getTodo: function() {
		      return todo;
		},
		getBugs: function() {
		      return bugs;
		  },
		  getUpdates: function() {
		      return updates;
		  }
	}
       
});