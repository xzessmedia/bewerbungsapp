/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:38:40 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-11-30 06:18:03
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('StartpageController', function($scope, toastr, $window, $log, JsonLocalDataProvider,AppSettings) {
    $scope.todolist = [];
    $scope.buglist = [];
    $scope.version = AppSettings.getVersion();

    $scope.todo = JsonLocalDataProvider.getTodo();
    $scope.bugs = JsonLocalDataProvider.getBugs();
    $scope.updates = JsonLocalDataProvider.getUpdates();



});