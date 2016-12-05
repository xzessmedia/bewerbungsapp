'use strict';

var app = angular.module('ApplicationApp');
app.controller('SaveApplicationController', function($scope, $log,$sce, toastr, $http, Data, Drive,$timeout, $cordovaFileTransfer){
    	$scope.appData = Data.getAppDataAsJSON();
	$scope.fname = "unnamed";
	$scope.filename = "bewerbungsmappe";
	$scope.formdata = {};
	$scope.IsDebug = false;
	
	
	
	$scope.AddApplicationDataToGoogleDrive = function() {
		Drive.files.insertWithContent(
		  {
		   title: fname+'.json',
		   mimeType: 'application/json'
		  },
		  { uploadType: 'resumable' },
		   appData,
		  undefined).promise
		    .then(function (resp) {
		       console.log('finished');
		    }, function (reason) {
		       console.warn('upload failed because '+reason);
		    }, function (position) {
		       console.log('Uploading...   Currently at ' + position);
		   });
	}
	
	$scope.AddApplicationToDB = function() {
		Data.addApplication();
		toastr.info("Bewerbung wurde gespeichert");
	}
	
	$scope.QueryTest  = function() {
		Data.SQLQuery("Select * from app_users");
	}
	
	$scope.SendPing = function() {
		var facebookID = "ad2dadd";
		var result = Data.SendPing(facebookID);
		if(result == true) {
			toastr.info("Ping gesendet");
		} else {
			toastr.error("Ping nicht gesendet");
		}
		
	}
	$scope.Test = function() {
		toastr.info("Test klappt");
	}

  $scope.progress = function(percentDone) {
            console.log("progress: " + percentDone + "%");
						$scope.fileprogress = percentDone + "%";
      };
 
      $scope.done = function(files, data) {
            console.log("upload complete");
            console.log("data: " + JSON.stringify(data));
            writeFiles(files);
      };
 
      $scope.getData = function(files) { 
            //this data will be sent to the server with the files
            return {msg: "from the client", date: new Date()};
      };
 
      $scope.error = function(files, type, msg) {
            console.log("Upload error: " + msg);
            console.log("Error type:" + type);
            writeFiles(files);
      }
 
      function writeFiles(files) 
      {
            console.log('Files')
            for (var i = 0; i < files.length; i++) {
                  console.log('\t' + files[i].name);
            }
      }

	function AddPDFToGoogleDrive() {
		$log.log("Test");
		
		var pdfdata = "";
		
		var request = $http({
		    method: "post",
		    url: "https://www.xzessmedia.de/codeprojects/application/lib/pdf/renderPDF.php",
		    data: {
		        filename: $scope.filename,
		        pdftype: "S",
		        json: $scope.appData
		    },
		    headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		});
		
		/* Check whether the HTTP Request is successful or not. */
		request.success(function (data) {
			$window.alert("Post ok");
			    DriveService.files.insertWithContent(
			  {
			   title: filename,
			   mimeType: 'application/pdf'
			  },
			  { uploadType: 'resumable' },
			  data,
			  undefined).promise
			    .then(function (resp) {
			       console.log('finished');
			    }, function (reason) {
			       console.warn('upload failed because '+reason);
			    }, function (position) {
			       console.log('Uploading...   Currently at ' + position);
			   });
		});
		
		
	   }
	
	$scope.pdftype = [
	{
		name:"PDF im Browser anzeigen",
		value:"l"
	},
	{
		name:"PDF herunterladen",
		value:"F"
	},
	{
		name:"PDF direkt ausgeben",
		value:"S"
	},
	{
		name:"PDF an Browser senden",
		value:"D"
	}
	];
	
	
	
	
	
	function CordovaDownload( url, filename ) {

	    document.addEventListener('deviceready', function () {

	    var targetPath = cordova.file.documentsDirectory + filename;
	    var trustHosts = true;
	    var options = {};
	
	    $cordovaFileTransfer.download(url, targetPath, options, trustHosts)
	      .then(function(result) {
	        // Success!
	      }, function(err) {
	        // Error
	      }, function (progress) {
	        $timeout(function () {
	          $scope.downloadProgress = (progress.loaded / progress.total) * 100;
	        });
	      });
	
		  }, false);
		  
		  
	};
	
		// Save JSON
		$scope.saveToPc = function (data, filename) {
		  if (!data) {
		    console.error('No data');
		    return;
		  } else {
			  console.error('Has data');
		  }
		
		  if (!filename) {
		    filename = 'download.json';
			console.error('No filename');
		  } else {
			  filename = filename + '.json';
			  console.error('Has Filename: '+filename);
		  }
		
		  if (typeof data === 'object') {
		    data = JSON.stringify(data, undefined, 2);
		  }
		
		  // Cordova
		  CordovaWriteFile(filename, data) 
		  
		  var blob = new Blob([data], {type: 'text/json'});
		  
		  
		
		  // FOR IE:
		
		  if (window.navigator && window.navigator.msSaveOrOpenBlob) {
		      window.navigator.msSaveOrOpenBlob(blob, filename);
		  }
		  else{
		      var e = document.createEvent('MouseEvents'),
		          a = document.createElement('a');
		
		      a.download = filename;
		      a.href = window.URL.createObjectURL(blob);
		      a.dataset.downloadurl = ['text/json', a.download, a.href].join(':');
		      e.initEvent('click', true, false, window,
		          0, 0, 0, 0, 0, false, false, false, false, 0, null);
		      a.dispatchEvent(e);
			  
			  
		  }
		};
		
		
		// process the form
		$scope.processForm = function(jsondata) {
			
		$scope.formdata.json = jsondata;
		  $http({
		  method  : 'POST',
		  url     : 'pdf/RenderPDF.php',
		  data    : $.param($scope.formdata),  // pass in data as strings
		  headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
		 })
		  .success(function(data) {
		    console.log(data);
		
		    if (!data.success) {
				console.log("not successful");
		    } else {
		      // if successful, bind success message to message
			  console.log("successful");
		      $scope.message = data.message;
		    }
		  });
		};
		
		function CordovaWriteFile(completefilename, filecontentdata) {
			document.addEventListener('deviceready', onDeviceReady, false);  
		function onDeviceReady() {  
		    function writeToFile(fileName, data) {
		        data = JSON.stringify(data, null, '\t');
		        window.resolveLocalFileSystemURL(cordova.file.dataDirectory, function (directoryEntry) {
		            directoryEntry.getFile(fileName, { create: true }, function (fileEntry) {
		                fileEntry.createWriter(function (fileWriter) {
		                    fileWriter.onwriteend = function (e) {
		                        // for real-world usage, you might consider passing a success callback
		                        console.log('Write of file "' + fileName + '"" completed.');
		                    };
		
		                    fileWriter.onerror = function (e) {
		                        // you could hook this up with our global error handler, or pass in an error callback
		                        console.log('Write failed: ' + e.toString());
		                    };
		
		                    var blob = new Blob([data], { type: 'text/plain' });
		                    fileWriter.write(blob);
		                }, errorHandler.bind(null, fileName));
		            }, errorHandler.bind(null, fileName));
		        }, errorHandler.bind(null, fileName));
		    }
		
		    writeToFile(completefilename, filecontentdata);
		}
		}
		
		function sendFileToServer(data,filename, url, datatype) {
			var res = $http.post(url, data,{responseType:'arraybuffer'});
			res.success(function(data, status, headers, config) {
				$scope.responsedata = data;
				var file = new Blob([data], {type: datatype});
	       		var fileURL = URL.createObjectURL(file);
				 $scope.content = $sce.trustAsResourceUrl(fileURL);
				  // FOR IE:
			
			  if (window.navigator && window.navigator.msSaveOrOpenBlob) {
			      window.navigator.msSaveOrOpenBlob(blob, filename);
			  }
			  else{
			      var e = document.createEvent('MouseEvents'),
			          a = document.createElement('a');
			
			      a.download = filename;
			      a.href = window.URL.createObjectURL(file);
			      a.dataset.downloadurl = [datatype, a.download, a.href].join(':');
			      e.initEvent('click', true, false, window,
			          0, 0, 0, 0, 0, false, false, false, false, 0, null);
			      a.dispatchEvent(e);
				  
				// Cordova
				CordovaDownload( a.href, filename );
			  }
				toastr.success("Deine Datei wurde generiert");
			});
			res.error(function(data, status, headers, config) {
				toastr.error( "failure message: " + JSON.stringify({data: data}));
			});
		};
		
		$scope.downloadJSON = function(data, filename) {
			filename = filename + '.json';
			sendFileToServer(data,filename, 'src/DownloadJSON.php', 'text/json');
			
		};
		
		$scope.downloadPDF = function(data, filename) {
			filename = filename + '.pdf';
			sendFileToServer(data,filename, 'pdf/RenderPDF.php', 'application/pdf');
		};
		

		$scope.sendApplicationToServer = function(data,filename) {
			var res = $http.post('pdf/RenderPDF.php', data,{responseType:'arraybuffer'});
		res.success(function(data, status, headers, config) {
			$scope.responsedata = data;
			var file = new Blob([data], {type: 'application/pdf'});
       var fileURL = URL.createObjectURL(file);
			 $scope.content = $sce.trustAsResourceUrl(fileURL);
			  // FOR IE:
		
		  if (window.navigator && window.navigator.msSaveOrOpenBlob) {
		      window.navigator.msSaveOrOpenBlob(blob, filename);
		  }
		  else{
		      var e = document.createEvent('MouseEvents'),
		          a = document.createElement('a');
		
		      a.download = filename;
		      a.href = window.URL.createObjectURL(file);
		      a.dataset.downloadurl = ['application/pdf', a.download, a.href].join(':');
		      e.initEvent('click', true, false, window,
		          0, 0, 0, 0, 0, false, false, false, false, 0, null);
		      a.dispatchEvent(e);
		  }
			toastr.success("Deine PDF wurde generiert");
		});
		res.error(function(data, status, headers, config) {
			toastr.error( "failure message: " + JSON.stringify({data: data}));
		});
		}
});