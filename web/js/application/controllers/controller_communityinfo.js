/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:38:03 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-05 05:38:18
 */
'use strict';

var app = angular.module('ApplicationApp');

app.controller('CommunityInfoController', function($scope, toastr,$timeout, $http,locale, localeSupported,localeEvents,RestService,AppSettings) {
    $scope.activeusers = RestService.countClients();
    $scope.clock = "loading clock..."; // initialise the time variable
    $scope.tickInterval = 1000 //ms

    var tick = function() {
        $scope.clock = Date.now() // get the current time
        $timeout(tick, $scope.tickInterval); // reset the timer
    }

    // Start the timer
    $timeout(tick, $scope.tickInterval);
    SendPing();
    GetActiveUsers();

    function GetRemoteIP() {
        $http({
            method: "GET",
            url: "src/GetIP.php"
        }).then(function mySucces(response) {
            return response.data;
        }, function myError(response) {
            return response.data;
        });
    }

    function GetActiveUsers() {
        RestService.countClients().then(function(response) {
            $scope.activeusers = response.response;
        });
    }

    function SendPing() {
        $http({
            method: "GET",
            url: "src/GetIP.php"
        }).then(function mySucces(response) {
            return RestService.sendPing(response.data);
        }, function myError(response) {
            return response.data;
        });
       
    };

            $scope.SetLanguage = function (loc) {
                AppSettings.setLocale(loc);
            };


            $scope.$on(localeEvents.localeChanges, function (event, data) {
                $scope.flagClass = $scope.localeData[data].flagClass;
                $scope.langDisplayText = $scope.localeData[data].langDisplayText;
            });
   
});