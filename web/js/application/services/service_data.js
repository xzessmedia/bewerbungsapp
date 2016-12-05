'use strict';

var app = angular.module('ApplicationApp');
app.service('dataService', function($http) {
    delete $http.defaults.headers.common['X-Requested-With'];
    this.getData = function(targeturl,parameters) {
        // $http() returns a $promise that we can add handlers with .then()
        return $http({
            method: 'GET',
            url: targeturl,
            params: parameters,
            headers: {}
         });
     }
});