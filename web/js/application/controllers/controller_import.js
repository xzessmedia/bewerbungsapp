/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:38:21 
 * @Last Modified by:   Tim Koepsel 
 * @Last Modified time: 2016-11-16 02:38:21 
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('ImportController', function($scope, Data) {
    $scope.applicationdata = Data.getApplicationData();



    $scope.importApplicationData = function(data) {
        Data.importApplication(data);
    }
    $scope.updateData = function() {
        $scope.applicationdata = Data.getApplicationData();
    }

    $scope.exportApplicationData = function() {

    }




});