/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-28 02:48:19 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-11-29 23:02:04
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('KenntnisseController', function($scope, toastr, Data,ngDialog,locale, localeSupported,localeEvents) {
    $scope.personaldata = Data.getPersonalData();
    $scope.data = Data.getSkills();

    locale.ready('personal').then(function () {
    $scope.SkillTitle = locale.getString('personal.SkillTitle');
    $scope.SkillSubTitle = locale.getString('personal.SkillSubTitle');
    $scope.SkillOrKnowledge = locale.getString('personal.SkillOrKnowledge');
    $scope.AddSkill = locale.getString('personal.AddSkill');
    });
    
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
			 template: '<h2>' + $scope.SkillTitle + '</h2><p>' + $scope.SkillSubTitle + '</p><input type="text" placeholder="' + $scope.SkillOrKnowledge +'" ng-model="skill"></br></br><button ng-click="NewItem(skill)">' + $scope.AddSkill + '</button>',
			 scope: $scope,
			 controller: 'KenntnisseController'
		});
     };

	 
	  

      $scope.newObjectItem = function () {
		 ngDialog.open({
			 plain: true,
			 template: '<h2>Name der Fähigkeit oder Kenntnis</h2><p>Was für eine Kenntnis oder Fähigkeit soll hinzugefügt werden?</p><input type="text" placeholder="Fähigkeit bzw Kenntnis" ng-model="skill" class="form-control"></br></br><button class="btn btn-default" ng-click="NewItem(skill)">Fähigkeit hinzufügen</button>',
			 scope: $scope,
			 controller: 'KenntnisseController'
		 });
      };
       $scope.newObjectSubItem = function (scope) {
		   $scope.subitem = scope;
		 ngDialog.open({
			 plain: true,
			 template: '<h2>Name der Fähigkeit oder Kenntnis</h2><p>Was für eine Kenntnis oder Fähigkeit soll hinzugefügt werden?</p><input type="text" placeholder="Fähigkeit bzw Kenntnis" ng-model="skill" class="form-control"></br></br><button class="btn btn-default" ng-click="newSubItem(skill,subitem)">Unterfähigkeit hinzufügen</button>',
			 scope: $scope,
			 controller: 'KenntnisseController'
		 });
	 };
      $scope.NewItem = function (itemtitle) {
	ngDialog.close();
	Data.addSkill(itemtitle);
	$scope.personaldata = Data.getPersonalData();
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

	  

    $scope.setPersonalDataKenntnisse = function(skilldata) {
        Data.setPersonalDataKenntnisse(skilldata);
    }
});