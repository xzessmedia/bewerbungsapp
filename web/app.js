/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 20:22:39 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-05 16:14:22
 */
'use strict';

const appversion = "0.46";

angular.module('ApplicationApp', ['ngLocalize', 'ngSanitize', 'ngCsv','ngLocalize.InstalledLanguages', 'ngAnimate', 'ngCordova', 'lvl.directives.fileupload', 'toastr', 'ui.tree', 'ngRoute', 'ngDialog', 'ngStorage', 'gapi', 'angular-loading-bar', 'angularModalService', 'naif.base64', 'ngCookies', 'ngFacebook', 'summernote', 'satellizer', 'angularSoap']);