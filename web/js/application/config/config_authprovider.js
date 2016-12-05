/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-29 15:52:52 
 * @Last Modified by:   Tim Koepsel 
 * @Last Modified time: 2016-11-29 15:52:52 
 */

/*************************************************************************
* This Configuration is used by satellizer module
* ***********************************************************************
*/
'use strict';

var app = angular.module('ApplicationApp');
app.config(function($authProvider) {
$authProvider.facebook({
      clientId: '525143354344103',
      responseType: 'token'
    });

// Overriding default values
$authProvider.httpInterceptor = function() { return true; },
$authProvider.withCredentials = false;
$authProvider.tokenRoot = null;
$authProvider.baseUrl = '/';
$authProvider.loginUrl = '/auth/login';
$authProvider.signupUrl = '/auth/signup';
$authProvider.unlinkUrl = '/auth/unlink/';
$authProvider.tokenName = 'token';
$authProvider.tokenPrefix = 'satellizer';
$authProvider.tokenHeader = 'Authorization';
$authProvider.tokenType = 'Bearer';
$authProvider.storageType = 'localStorage';
/*
    $authProvider.google({
      clientId: 'Google Client ID'
  });
  $authProvider.live({
      clientId: 'Microsoft Client ID'
  });
  $authProvider.oauth2({
      name: 'foursquare',
      url: '/auth/foursquare',
      clientId: 'Foursquare Client ID',
      redirectUri: window.location.origin,
      authorizationEndpoint: 'https://foursquare.com/oauth2/authenticate',
  });*/
  });