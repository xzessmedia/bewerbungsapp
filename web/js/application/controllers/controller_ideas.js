/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:38:18 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-01 00:38:24
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('IdeasController', function($scope,$log,$location, $http, $templateCache, toastr, Data,RestService) {
    $scope.ideadescription = "Gebe hier eine genaue Beschreibung an";
    $scope.email = Data.getPersonalMail();
    $scope.sendIdea = function(email,description) {
        RestService.submitIdea(email,description).then(function(response){
                $log.log('Idee wurde auf Server gespeichert: '+response.data);
                toastr.success('Idee wurde eingesendet!');
                $location.path("/");
                });
    };
});