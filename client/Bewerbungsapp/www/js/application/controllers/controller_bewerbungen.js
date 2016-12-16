/*
 * @Author: Tim Koepsel 
 * @Date: 2016-12-01 00:57:56 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-01 01:25:02
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('BewerbungenController', function($scope, toastr, Data,ngDialog,locale, localeSupported,localeEvents,RestService) {
    $scope.bewerbungen = [
        {
            "name": "Herr Sauermann",
            "company": "Test Firma",
            "bewerbungsdatum": "22.12.2015",
            "responsedatum": "01.02.2016",
            "status": 1
        },
        {
            "name": "Herr Muschmann",
            "company": "Firma Muschii",
            "bewerbungsdatum": "22.12.2016",
            "responsedatum": "01.02.2017",
            "status": 2
        }
    ];
});