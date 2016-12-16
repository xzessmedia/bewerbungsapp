'use strict';

var app = angular.module('ApplicationApp');

app.config(['$compileProvider', function ($compileProvider) {
    $compileProvider.aHrefSanitizationWhitelist(/^\s*(|blob|):/);
	}]);