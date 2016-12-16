/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-29 21:12:51 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-11-30 23:52:58
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('SettingsController', function($scope, $location, toastr, Data,ngDialog, locale, localeSupported,localeEvents, AppSettings){


    $scope.userdata = AppSettings.getUserdata();
    $scope.loggedIn = AppSettings.isLoggedIn();
    /*************************************************************************
    * App Settings
    * ***********************************************************************
    */
    $scope.SetLanguage = function(lang) {
        AppSettings.setLocale(lang);
    }

    $scope.GetAccountData = function() {
        $scope.userdata = AppSettings.getUserdata();
    }

    $scope.Logout = function() {
        AppSettings.logoutAccount();
        $scope.userdata = AppSettings.getUserdata();
        $scope.loggedIn = AppSettings.isLoggedIn();
        $scope.$apply();
        $route.reload();
    }
    $scope.Login = function() {
        $location.path("/login");
    }
	/*************************************************************************
	* Localisation
	* ***********************************************************************
	*/
	   $scope.supportedLang = localeSupported;
            $scope.localeData = {
                'en-US': {
                    flagClass: 'flag-us',
                    langDisplayText: 'English'
                },
                'de-DE': {
                    flagClass: 'flag-de',
                    langDisplayText: 'Deutsch'
                }
            };


            $scope.setLocale = function (loc) {
                locale.setLocale(loc);
            };

            locale.ready('common').then(function () {
                $scope.flagClass = $scope.localeData[locale.getLocale()].flagClass;
                $scope.langDisplayText = $scope.localeData[locale.getLocale()].langDisplayText;
            });

            $scope.$on(localeEvents.localeChanges, function (event, data) {
                $scope.flagClass = $scope.localeData[data].flagClass;
                $scope.langDisplayText = $scope.localeData[data].langDisplayText;
            });
});