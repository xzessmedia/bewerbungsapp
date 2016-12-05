/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-29 19:50:18 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-11-29 19:50:40
 */
'use strict';

var app = angular.module('ApplicationApp');
    app.value('GoogleApp', {
        apiKey: 'AIzaSyBXeoGygZRUifCUu_85PC9qCy7nqfCFiBc',
        clientId: '922222873086-7unc2nqjor0s27pesplm22ih1ngiq792.apps.googleusercontent.com',
        scopes: [
            // whatever scopes you need for your app, for example:
            'https://www.googleapis.com/auth/drive',
            'https://www.googleapis.com/auth/userinfo.profile'
            // ...
        ]
    });