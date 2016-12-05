'use strict';

var app = angular.module('ApplicationApp');
app.controller('AboutController', function($scope, ngDialog) {
	$scope.clickToOpen = function () {
        ngDialog.open({ template: 'templateId', className: 'ngdialog-theme-default' });
    };
});