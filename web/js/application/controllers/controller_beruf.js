/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-27 23:15:12 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-11-29 22:29:10
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('BerufController', function($scope, toastr, Data,ngDialog,locale, localeSupported,localeEvents) {
    $scope.personaldata = Data.getPersonalData();
    $scope.setPersonalDataBeruf = function(jobtitle,ausbildung,bruttogehaltprojahr,showGehalt) {
        Data.setPersonalDataBeruf(jobtitle, ausbildung, bruttogehaltprojahr,showGehalt);
    }
});