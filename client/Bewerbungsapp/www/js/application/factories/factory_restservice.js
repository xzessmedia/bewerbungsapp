/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-27 19:10:24 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-01 08:05:45
 */

'use strict';

var app = angular.module('ApplicationApp');



/*************************************************************************
 * Description:
 * ------------------------------------------------------------------------
 * This Factory is for interacting between the rest server 
 * and the client data
 * ***********************************************************************
 */
app.factory('RestService', function($log,toastr, $window, $http,AppSettings) {
var serveradress = 'http://localhost:8000';

    return {
        sendPing: function(ip) {
               $http.get(serveradress + '/ping/?ip='+ip).then(function(response){
               $log.log('Ping wurde gesendet: '+response.data);
               return response.data;
           });
        },
        addApplication: function(userid,jsondata) {
            var params =  {};
            params.userid = userid;
            params.json = jsondata;
                return $http.post(serveradress + '/application/',JSON.stringify(params));
        },
        submitBugreport: function(email,description) {
                return $http.post(serveradress + '/bugreport/?description='+description+'&email='+email);
        },
        submitIdea: function(email,description) {
                return $http.post(serveradress + '/idea/?description='+description+'&email='+email);
        },
        getApplications: function(userid) {
                return $http.get(serveradress + '/applications/?userid='+userid);
                
        },
        loginUser: function(email,password) {
                return $http.post(serveradress + '/login/?email='+email+'&password='+password);
        },
        countClients: function() {
            var promise = $http.get(serveradress+'/countclients/').then(function(response){
                $log.log('Client Count: '+JSON.stringify(response.data.response));
                return response.data;
            });
            return promise;
        },
        createUser: function(firstname,lastname,email,password) {
            
            var promise = $http.post(serveradress + '/createaccount/?firstname='+firstname+'&lastname='+lastname+'&email='+email+'&password='+password).then(function(response){
                $log.log('Account wurde auf Server erstellt: '+response.data);
                return response.data;
                });
                return promise;
        }
    }
});