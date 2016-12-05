/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-29 21:14:38 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-05 16:47:40
 */


'use strict';

var app = angular.module('ApplicationApp');



/*************************************************************************
 * Description:
 * ------------------------------------------------------------------------
 * This Factory is for permanent storage of app settings
 * ***********************************************************************
 */
app.factory('AppSettings', function(toastr, $location, $window, $http,locale, localeSupported,localeEvents,$localStorage, $sessionStorage) {
var version = "0.47";
var appsettings = {};
var storage = $localStorage.$default({
    locale: "de-DE",
    userdata: {},
    sessiondata: {
        PersonalCollectionData: {},
        DesignConfigurationData: {},
        CollectionContentData: {
            Contact: {}
        }
    }
})
appsettings.locale = storage.locale;
locale.setLocale(appsettings.locale);

    return {
        initSettings: function() {

        },
        setLocale: function(loc) {
            appsettings.locale = loc;
            locale.setLocale(loc);
            storage.locale = loc;
            locale.ready('general').then(function () {
            var successmsg = locale.getString('general.LanguageChangeMessage');
            toastr.success(successmsg);
            });
        },
        setSession: function(sessiondata) {
            storage.sessiondata = sessiondata;
        },
        getSession: function() {
            return storage.sessiondata;
        },
        isLoggedIn: function() {
            if(!storage.userdata.id) {
                return false;
            }  else {
                return true;
            }
        },
        logoutAccount: function() {
            storage.userdata = {};
        },
        getUserID: function() {
            return storage.userdata.id;
        },
        setUserdata: function(userdata) {
            storage.userdata = userdata;
        },
        getUserdata: function() {
            return storage.userdata;
        },
        getLocale: function() {
            return appsettings.locale;
        },
        getVersion: function() {
            return version;
        },
        getSettings: function() {
            return appsettings;
        }
    }
});