/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-29 15:53:07 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-11-29 15:54:29
 */
'use strict';

var app = angular.module('ApplicationApp');
app.value('localeSupported', [
    'de-DE',
    'en-US'
]);
app.value('localeFallbacks', {
    'de': 'de-DE',
    'en': 'en-US'
});