'use strict';

var app = angular.module('ApplicationApp');

app.controller('LoginController', function($scope, $http, $location, $window, toastr, $facebook, $auth, soapService) {
	$scope.status = false;
	$scope.userpicture = '';
	$scope.resultmsg = '';
	$scope.isLoggedIn = false;
	
	$scope.userdata = {};
	$scope.activeusers = 1; //GetActiveUsers();
	
	
  $scope.login = function() {
    $facebook.login().then(function() {
      refresh();
    });
}
   $scope.logoff = function() {
	   $facebook.logout().then(function() {
		   refresh();
		   $location.path( "/personal" );
		   toastr.info('Du hast dich bei Facebook abgemeldet');
	   })
   }
	
$scope.authenticate = function(provider) {
      $auth.authenticate(provider);
  };
  
  
  function loginwithfacebook(facebookid) {
	  soapService.LoginUser(facebookid).then(function(response){
		return response.Result;	
	  }); 
  }
  
  function IsRegistered(facebookid) {
	  soapService.IsRegistered(facebookid).then(function(response){
		return response.Result;	
	}); 
  }

  function registerwithfacebook(user) {
	soapService.AddUser(user.firstname, user.lastname, user.email).then(function(response){
		return response.Result;
	});  
  }
  
  function GetActiveUsers() {
	  	soapService.CountActiveUsers().then(function(response) {
		return response.Result;	
	});
  }
 
  function refresh() {
    $facebook.api("/me").then( 
      function(response) {
        $scope.userimgsrc = "https://graph.facebook.com/" + response.id + "/picture?type=square"
        $scope.resultmsg = "Willkommen " + response.name;
        $scope.isLoggedIn = true;
	var userdata = {};
	userdata.id		= response.id;
  	userdata.email 	= response.email;
	userdata.firstname 	= response.first_name;
	userdata.lastname	= response.last_name;
	userdata.gender	= response.gender;
	userdata.birthday	= response.birthday;
	userdata.city		= response.hometown;
	$scope.userdata = userdata;
	
	
	soapService.CountActiveUsers().then(function(response) {
		$scope.activeusers = response.Result;
	})
	/*
	soapService.IsRegisteredUser(userdata.id).then(function(response){
		if (response.Result == true) {
		loginwithfacebook(userdata.id);
		} else {
			registerwithfacebook(userdata);
		}	
	}); */ 
	
      },
      function(err) {
        $scope.resultmsg = "Please log in";
        $scope.isLoggedIn = false;
		
      });
  }
  
  refresh();
 });