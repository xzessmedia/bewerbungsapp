/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:37:59 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-01 00:37:17
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('BugreportController', function($scope,$log,$location, $http, $templateCache, toastr, Data,RestService) {



    $scope.bugdescription = "Gebe hier eine genaue Beschreibung an";
    $scope.email = Data.getPersonalMail();
    $scope.sendBugReport = function(email,description) {
        RestService.submitBugreport(email,description).then(function(response){
                $log.log('Bugreport wurde auf Server gespeichert: '+response.data);
                toastr.success('Bugreport wurde eingesendet!');
                $location.path("/");
                });
    };
});