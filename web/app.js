'use strict';

	
angular.module('ApplicationApp', ['ngAnimate','ngCordova','lvl.directives.fileupload','toastr', 'ui.tree','ngRoute','ngDialog','ngStorage','gapi','angular-loading-bar','angularModalService','naif.base64','ngCookies','ngFacebook','summernote','satellizer','angularSoap'])
.value('GoogleApp', {
    apiKey: 'AIzaSyBXeoGygZRUifCUu_85PC9qCy7nqfCFiBc',
    clientId: '922222873086-7unc2nqjor0s27pesplm22ih1ngiq792.apps.googleusercontent.com',
    scopes: [
      // whatever scopes you need for your app, for example:
      'https://www.googleapis.com/auth/drive',
      'https://www.googleapis.com/auth/userinfo.profile'
      // ...
    ]
});