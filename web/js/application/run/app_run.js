'use strict';

var app = angular.module('ApplicationApp');
app.run(['$rootScope', '$window',
  function($rootScope, $window,toastr) {
	  //toastr.info('Diese App ist 100% kostenlos! Deine Daten werden nicht auf dem Server gespeichert! Bitte beachte dass bei einer eBewerbung deine Daten auf dem Server gespeichert werden.  Alle Daten werden nur zum offensichtlichen Zwecke genutzt!');
}]);