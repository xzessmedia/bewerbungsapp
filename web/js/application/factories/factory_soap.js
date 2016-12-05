'use strict';

var app = angular.module('ApplicationApp');
app.factory("soapService", function($soap,$http){
//Communicates with appservice Webservice
var base_url = "https://app.bewerbungsapp.eu/appservice.php";
//var base_url = "https://www.xzessmedia.de/codeprojects/application/appservice.php";
var isEnabled = false;

return {
        AddUser: function(firstname,lastname,email){
		var params = { };
		params.firstname = firstname;
		params.lastname = lastname;
		params.email = email;
	
		if (isEnabled == true) {
		  return $soap.post(base_url,"AddUser", params);
		}
          
        },
	LoginUser: function(facebookID){
		
	if (isEnabled == true) {
		return $soap.post(base_url, "LoginUser", facebookID);
	}
            
        },
	IsRegisteredUser: function(facebookID){
           
	if (isEnabled == true) {
		 return $soap.post(base_url, "IsRegisteredUser", facebookID);
	}
        },
	SendPing: function(){
            
	if (isEnabled == true) {
		return $soap.post(base_url, "SendPing", facebookID);
	}
        },	
	AddApplication: function(facebookID, json){
		var params = { };
		params.facebookID = facebookID;
		params.data = json;
	if (isEnabled == true) {
		return $soap.post(base_url, "AddApplication", params);
	}
            
        },
	CountActiveUsers: function(){
		
	if (isEnabled == true) {
		return $soap.post(base_url, "CountActiveUsers", { });
	}
	
        }
    }

});