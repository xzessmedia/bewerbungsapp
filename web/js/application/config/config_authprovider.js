'use strict';

var app = angular.module('ApplicationApp');
app.config(function($authProvider) {
$authProvider.facebook({
      clientId: '525143354344103',
      responseType: 'token'
    });
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