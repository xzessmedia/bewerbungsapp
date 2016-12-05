'use strict';

var app = angular.module('ApplicationApp');
app.controller('PersonalController', function($scope,toastr, Data,ngDialog){
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

	
	
	$scope.setPersonalDataFamilie = function(geburtsort, familienstand, kinder) {
		Data.setPersonalDataFamilie(geburtsort,familienstand,kinder);
	}
 	 $scope.setPersonalDataSocialMedia = function(facebook,xing,twitter,github,website) {
		Data.setPersonalDataSocialMedia(facebook,xing,twitter,github,website);
	}
	$scope.setPersonalDataKenntnisse = function() {
		Data.setPersonalDataKenntnisse(data);
	}
	
	
	$scope.setPersonalData = function(firstname,lastname,jobtitle,ausbildung,email,phonenumber,street, streetnumber, zipcode, city,birthdate,picture,facebook,xing,twitter,github,website) {
		Data.setPersonalData(firstname,lastname,jobtitle,ausbildung,email,phonenumber,street, streetnumber, zipcode, city,birthdate,picture);
	}
	
	 $scope.remove = function (scope) {
        scope.remove();
      };

      $scope.toggle = function (scope) {
        scope.toggle();
      };

      $scope.moveLastToTheBeginning = function () {
        var a = $scope.data.pop();
        $scope.data.splice(0, 0, a);
      };
	 
     $scope.newObject = function() {
		 ngDialog.open({
			 plain: true,
			 template: '<h2>Name der Fähigkeit oder Kenntnis</h2><p>Was für eine Kenntnis oder Fähigkeit soll hinzugefügt werden?</p><input type="text" placeholder="Fähigkeit bzw Kenntnis" ng-model="skill"></br></br><button ng-click="NewItem(skill)">Fähigkeit hinzufügen</button>',
			 scope: $scope,
			 controller: 'PersonalController'
		});
     };

	 
	  

      $scope.newObjectItem = function () {
		 ngDialog.open({
			 plain: true,
			 template: '<h2>Name der Fähigkeit oder Kenntnis</h2><p>Was für eine Kenntnis oder Fähigkeit soll hinzugefügt werden?</p><input type="text" placeholder="Fähigkeit bzw Kenntnis" ng-model="skill" class="form-control"></br></br><button class="btn btn-default" ng-click="NewItem(skill)">Fähigkeit hinzufügen</button>',
			 scope: $scope,
			 controller: 'PersonalController'
		 });
      };
       $scope.newObjectSubItem = function (scope) {
		   $scope.subitem = scope;
		 ngDialog.open({
			 plain: true,
			 template: '<h2>Name der Fähigkeit oder Kenntnis</h2><p>Was für eine Kenntnis oder Fähigkeit soll hinzugefügt werden?</p><input type="text" placeholder="Fähigkeit bzw Kenntnis" ng-model="skill" class="form-control"></br></br><button class="btn btn-default" ng-click="newSubItem(skill,subitem)">Unterfähigkeit hinzufügen</button>',
			 scope: $scope,
			 controller: 'PersonalController'
		 });
	 };
      $scope.NewItem = function (itemtitle) {
	ngDialog.close();
	Data.addSkill(itemtitle);
	$scope.data = Data.getSkills();
      };
      $scope.newSubItem = function (skill,scope) {
		toastr.success('Unterobjekt wurde erstellt');
		ngDialog.close();
		Data.addSubskill(skill,scope);
	};
      $scope.collapseAll = function () {
        $scope.$broadcast('angular-ui-tree:collapse-all');
      };

      $scope.expandAll = function () {
        $scope.$broadcast('angular-ui-tree:expand-all');
      };

	  
	  
  
});