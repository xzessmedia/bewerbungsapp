/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:38:30 
 * @Last Modified by:   Tim Koepsel 
 * @Last Modified time: 2016-11-16 02:38:30 
 */
'use strict';

var app = angular.module('ApplicationApp');
app.controller('OrganiserController', function($scope, $localStorage,toastr, $sessionStorage) {
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

      $scope.newSubItem = function (scope) {
        var nodeData = scope.$modelValue;
        nodeData.nodes.push({
          id: nodeData.id * 10 + nodeData.nodes.length,
          title: nodeData.title + '.' + (nodeData.nodes.length + 1),
          nodes: []
        });
		toastr.success('Unterobjekt wurde erstellt');
      };
	  

      $scope.collapseAll = function () {
        $scope.$broadcast('angular-ui-tree:collapse-all');
      };

      $scope.expandAll = function () {
        $scope.$broadcast('angular-ui-tree:expand-all');
      };

	  
	  $scope.data = [
          {
            'id': 12,
            'title': 'Wurzelverzeichnis',
            'nodes': []
          }];
		 
	  
	
});
