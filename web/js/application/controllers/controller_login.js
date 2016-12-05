/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:38:27 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-11-30 23:13:40
 */
'use strict';

var app = angular.module('ApplicationApp');

app.controller('LoginController', function($scope, $log, $http, $location, $window, toastr, $facebook, $auth, RestService,AppSettings) {

$scope.Login = function(email,password) {
	RestService.loginUser(email,password).then(function(response){

                if(JSON.stringify(response.data.registrationdate)>0) {
                    AppSettings.setUserdata(response.data);
                    $log.log('Login erfolgreich: '+JSON.stringify(response.data));
                    toastr.success("Login erfolgreich...");
										$location.path( "/" );
                } else {
                    $log.log('Login nicht erfolgreich: '+JSON.stringify(response.data));
                    toastr.error("Login nicht erfolgreich...");
										$location.path( "/login" );
                }
                });
}

$scope.RegisterAccount = function(firstname,lastname,email,password) {
	var response = RestService.createUser(firstname,lastname,email,password);
	toastr.info(JSON.stringify(response));
	$log.log('Registration Response:' +response);
	$location.path( "/login" );
}

 });