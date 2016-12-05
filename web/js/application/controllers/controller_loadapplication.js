'use strict';

var app = angular.module('ApplicationApp');
app.controller('LoadApplicationController', function($scope, $window, toastr, $location, Data, fileReader){
	        // you can do some processing here
	        $scope.IsDebug = false;
	        $scope.MappeName = "unnamed.json";
	        $scope.progress = 0;
			
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
		 
		    $scope.$on("fileProgress", function(e, progress) {
		        $scope.progress = progress.loaded / progress.total;
		    });
		
	
		
});