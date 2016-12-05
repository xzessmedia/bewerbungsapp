/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-29 21:12:51 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-01 04:33:50
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('MenuController', function($scope, $location, toastr, Data,ngDialog, locale, localeSupported,localeEvents,AppSettings){

$scope.new = function() {
Data.newSession();
}

$scope.save = function() {
 $location.path('/save');
}
});