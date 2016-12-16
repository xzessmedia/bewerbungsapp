/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:37:56 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-11-30 06:18:11
 */

'use strict';

var app = angular.module('ApplicationApp');
app.controller('AboutController', function($scope, ngDialog,locale, localeSupported,localeEvents,AppSettings) {
    $scope.version = AppSettings.getVersion();
    $scope.clickToOpen = function() {
        ngDialog.open({ template: 'templateId', className: 'ngdialog-theme-default' });
    };
});