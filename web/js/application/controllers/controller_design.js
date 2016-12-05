/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:38:14 
 * @Last Modified by:   Tim Koepsel 
 * @Last Modified time: 2016-11-16 02:38:14 
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('DesignController', function($scope, Data) {
    $scope.Data = Data;
    $scope.DesignData = Data.getDesignData();
    $scope.Themes = [
        { name: 'cosmo' },
        { name: 'flatly' },
        { name: 'sandstone' },
        { name: 'slate' },
        { name: 'spacelab' },
        { name: 'superhero' },
        { name: 'yeti' }
    ];

    $scope.Fonts = [
        { name: '' },
    ]
    $scope.Theme = $scope.Themes[1];

    $scope.setDesignData = function(theme, sitetemplate, mailtemplate, usecdn) {
        Data.setDesignData(theme, sitetemplate, mailtemplate, usecdn);
        $window.alert("Änderungen wurden gespeichert!");
    }
});