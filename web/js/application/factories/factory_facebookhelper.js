'use strict';

var app = angular.module('ApplicationApp');
app.factory('FacebookHelper', function($http,$facebook) {
		
		
		return {
			postwall: function(userid,message) {
				$http.get('https://graph.facebook.com/' + userid +'/feed?message=' + message).success(function(data) {
				        // you can do some processing here
				        result = data;
						return result;
					}); 
				
			}
		}
});