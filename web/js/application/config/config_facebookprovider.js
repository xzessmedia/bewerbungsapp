'use strict';

var app = angular.module('ApplicationApp');
app.config(['$facebookProvider', function($facebookProvider) {
    $facebookProvider.setAppId('525143354344103').setPermissions(['email','user_friends','publish_actions']);
    $facebookProvider.setVersion("v1.0");
}]);