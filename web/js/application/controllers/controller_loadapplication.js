/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:38:24 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-01 07:27:57
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('LoadApplicationController', function($scope,$log, $window, toastr, $location, Data, fileReader,locale, localeSupported,localeEvents,AppSettings,RestService){
	        // you can do some processing here
	        $scope.IsDebug = false;
	        $scope.MappeName = "unnamed.json";
	        $scope.progress = 0;
			getApplications();

			function getApplications() {
				var userid = AppSettings.getUserID();
				RestService.getApplications(userid).then(function(response){
				
                $log.log('Bewerbungsmappen werden vom Server geholt: '+JSON.stringify(response.data));
                $scope.applications = response.data;
				});
			}
			
		$scope.loadApplicationFromCloud = function(index) {
			var userid = AppSettings.getUserID();
			var applications = [];
				RestService.getApplications(userid).then(function(response){
					applications = response.data;
					var appl = applications[index];
					var jsondata = JSON.parse(JSON.stringify(appl.json));
					$log.log('ACHTUNG: ' +jsondata);
					Data.importApplication(appl.json);
					toastr.success('Bewerbungsmappe wurde geladen');
					$location.path( "/introtxt" );
				});
		
		}
		
		$scope.getFile = function () {
		        $scope.progress = 0;
		        fileReader.readAsDataUrl($scope.file, $scope)
		                      .then(function(result) {
				
				Data.importApplication(result);
		                          $scope.JsonData = result;
				toastr.success('Bewerbungsmappe wurde geladen');
				$location.path( "/introtxt" );
		                      });
		    };
			$scope.loadApplication = function() {
				$scope.progress = 0;
		        fileReader.readAsDataUrl($scope.file, $scope)
		                      .then(function(result) {
				
				Data.importApplication(result);
		                          $scope.JsonData = result;
				toastr.success('Bewerbungsmappe wurde geladen');
				$location.path( "/introtxt" );
							  });
			};

			$scope.loadApplicationFromStorage = function() {
				var session = AppSettings.getSession();
				$scope.JsonData = session;
				Data.importApplication(session);
				toastr.success('Bewerbungsmappe wurde geladen');
				$location.path( "/introtxt" );
			}

		    $scope.$on("fileProgress", function(e, progress) {
		        $scope.progress = progress.loaded / progress.total;
		    });
		
	
		
});