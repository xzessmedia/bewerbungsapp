/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-15 04:55:58 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-11-15 05:04:26
 */
'use strict';

/*************************************************************************
 * Description:
 * ContentController handles all controllers 
 * ***********************************************************************
 */
var app = angular.module('ApplicationApp');
app.controller('ContentController', function($scope, toastr, $window, Data) {
    $scope.Data = Data;
    $scope.ContentData = Data.getContentData();
    $scope.introtext = Data.getIntroText();
    $scope.personaltext = Data.getPersonalText();
    $scope.refdata = Data.getRefData();
    $scope.CVItems = Data.getCVItems();
    $scope.CVAItems = Data.getCVAItems();
    $scope.ContactData = Data.getContact();
    $scope.anrede = "neutral";
    $scope.subject = Data.getIntroTextSubject();

    $scope.setContentData = function(theme, sitetemplate, mailtemplate, usecdn) {
        Data.setDesignData(theme, sitetemplate, mailtemplate, usecdn);
    }
    $scope.setIntroText = function(subject, text) {
        Data.setIntroText(subject, text);
        Data
        toastr.info('Änderungen wurden gespeichert');
    }
    $scope.setPersonalText = function(text) {
        Data.setPersonalText(text);
        toastr.info('Änderungen wurden gespeichert');
    }
    $scope.setReferences = function(text) {
        Data.setReferences(text);
        toastr.info('Änderungen wurden gespeichert');
    }
    $scope.addContact = function(gender, firstname, lastname, companyname, street, streetnumber, zipcode, city) {
        Data.addContact(gender, firstname, lastname, companyname, street, streetnumber, zipcode, city);
        toastr.info('Änderungen wurden gespeichert');
    }
    $scope.addCVItem = function(date1, date2, desc) {
        var item = {};
        item.StartDate = date1;
        item.EndDate = date2;
        item.EventDescription = desc;
        Data.addCVItem(item);
    }
    $scope.addCVAItem = function(date, desc) {
        var item = {};
        item.DatePoint = date;
        item.EventDescription = desc;
        Data.addCVAItem(item);
    }
    $scope.removeCVItem = function(index) {
        $scope.CVItems.splice(index, 1);
    }
    $scope.removeCVAItem = function(index) {
        $scope.CVAItems.splice(index, 1);
    }
    $scope.saveData = function() {
        Data.setCVItems();
        toastr.info('Änderungen wurden gespeichert');
    }


    window.onbeforeunload = function(event) {


        var message = 'If you leave this page you are going to lose all unsaved changes, are you sure you want to leave?';
        if (typeof event == 'undefined') {
            event = window.event;
        }
        if (event) {
            event.returnValue = message;
        }
        return message;
    }

    //This works only when user changes routes, not when user refreshes the browsers, goes to previous page or try to close the browser
    $scope.$on('$locationChangeStart', function(event) {
        if (!$scope.form.$dirty) return;
        var answer = confirm('If you leave this page you are going to lose all unsaved changes, are you sure you want to leave?')
        if (!answer) {
            event.preventDefault();
        }
    });


});