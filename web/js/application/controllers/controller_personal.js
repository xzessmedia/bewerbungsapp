/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:38:34 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-11-29 16:05:49
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('PersonalController', function($scope,toastr, Data,ngDialog, locale, localeSupported,localeEvents){
	$scope.onlyNumbers = /^\d+$/;  
	$scope.firstname 	= "";
	$scope.lastname 	= "";
	$scope.jobtitle		= "";
	$scope.email		= "";
	$scope.phonenumber = "";
	$scope.street		= "";
	$scope.streetnumber	= "";
	$scope.zipcode	= 0;
	$scope.city		= "";
	$scope.birthdate	= "";
	$scope.photo		= "";
	$scope.Data = Data;
	$scope.data = Data.getSkills();
	$scope.PersonalData = Data.getPersonalData();
	$scope.file = Data.getPersonalImage();
	$scope.familienstandliste = [
		{name:'Ohne Angabe'},
		{name:'ledig'},
		{name:'verlobt'},
		{name:'verheiratet'},
		{name:'geschieden'},
		{name:'verwitwet'}
		];
	$scope.familienstand = Data.getPersonalFamilienstand();
	$scope.kinder = 0;
	
	  $scope.onChange = function (e, fileList) {
	    alert('this is on-change handler!');
	  };
	  
	  $scope.onLoad = function (e, reader, file, fileList, fileOjects, fileObj) {
	    Data.setPersonalPicture(fileObj);
	};

 	 $scope.setPersonalDataSocialMedia = function(facebook,xing,twitter,github,website) {
		Data.setPersonalDataSocialMedia(facebook,xing,twitter,github,website);
	}
	$scope.setPersonalDataKenntnisse = function() {
		Data.setPersonalDataKenntnisse(data);
	}
	
	
	$scope.setPersonalData = function(firstname,lastname,jobtitle,ausbildung,email,phonenumber,street, streetnumber, zipcode, city,birthdate,birthplace,familystatus,children,picture) {
		Data.setPersonalData(firstname,lastname,jobtitle,ausbildung,email,phonenumber,street, streetnumber, zipcode, city,birthdate,birthplace,familystatus,children,picture);
	}
	
	/*************************************************************************
	* Localisation
	* ***********************************************************************
	*/
	   $scope.supportedLang = localeSupported;
            $scope.localeData = {
                'en-US': {
                    flagClass: 'flag-us',
                    langDisplayText: 'English'
                },
                'de-DE': {
                    flagClass: 'flag-de',
                    langDisplayText: 'Deutsch'
                }
            };


            $scope.setLocale = function (loc) {
                locale.setLocale(loc);
            };

            locale.ready('common').then(function () {
                $scope.flagClass = $scope.localeData[locale.getLocale()].flagClass;
                $scope.langDisplayText = $scope.localeData[locale.getLocale()].langDisplayText;
            });

            $scope.$on(localeEvents.localeChanges, function (event, data) {
                $scope.flagClass = $scope.localeData[data].flagClass;
                $scope.langDisplayText = $scope.localeData[data].langDisplayText;
            });
});