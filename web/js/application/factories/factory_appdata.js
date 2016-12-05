'use strict';

var app = angular.module('ApplicationApp');

app.factory('Data', function($cookies,toastr, $window, soapService) {
	  var appdata		= {};
	  var personaldata 	= {};
	  var designdata 	= {};
	  var contentdata 	= {};
	  var contactdata	= {};
	  
	 var introtext 		= "<p>Dein persönliches Anschreiben ohne Anrede (Sehr geehrte..), diese wird später hinzugefügt!</p>";
	 var cvdata 		= [];
	 var cvadata 		= [];
	 var skilldata		= [];
	 var refdata		= "<p>Füge hier deine Referenzen ein, zB. eingescannte Dokumente etc.</p>";
	 var personaltext	= "<p>Schreibe etwas über dich</p>";
	  return {
		  
		  addApplication : function () {
			  
			  appdata.PersonalCollectionData = personaldata;
			  appdata.DesignConfigurationData = designdata;
			  contentdata.Contact = contactdata;
			  appdata.CollectionContentData = contentdata;
			  
			  var appjson = angular.toJson(appdata, true);
			  
			  
				soapService.AddApplication("Unknown",appjson).then(function(response){
				toastr.info(response.Result);	
				}); 	  
			  
			  
		  },
		  
		  SQLQuery: function (sql) {
			  soapService.SQLQuery(sql).then(function(response){
				toastr.info(response.Result);	
			}); 	  
		  },
		  
		  SendPing: function (facebookID) {
			  soapService.SendPing(facebookID).then(function(response){
				return true;
			}); 
		  },
		  
		  setPersonalData: function (firstname,lastname,jobtitle,ausbildung,email,phonenumber,street, streetnumber, zipcode, city,birthdate,picture) {
			personaldata.firstname = firstname;
			personaldata.lastname = lastname;
			personaldata.jobtitle = jobtitle;
			personaldata.ausbildung = ausbildung;
			personaldata.email = email;
			personaldata.phonenumber = phonenumber;
			personaldata.street = street;
			personaldata.streetnumber = streetnumber;
			personaldata.zipcode = zipcode;
			personaldata.city = city;
			personaldata.birthdate = birthdate;
			personaldata.picture = "data:" + picture.filetype + ";base64," + picture.base64;
			personaldata.picturedata = picture.base64;
			personaldata.picturetype = picture.filetype;
			
			toastr.info('Änderungen wurden gespeichert');
		  },
		  setPersonalDataSocialMedia: function (facebook,xing,twitter,github,website) {
			personaldata.facebook = facebook;
			personaldata.xing = xing;
			personaldata.twitter = twitter;
			personaldata.github = github;
			personaldata.website = website;
			toastr.info('Änderungen wurden gespeichert');
		},
		  setPersonalDataFamilie: function (geburtsort, familienstand, kinder) {
			personaldata.geburtsort 	= geburtsort;
			personaldata.familienstand 	= familienstand;
			personaldata.kinder		= kinder;
			toastr.info('Änderungen wurden gespeichert');
		  },
		  setPersonalDataKenntnisse: function (skilldata) {
			personaldata.skilldata = skilldata;
			toastr.info('Kenntnisse wurden gespeichert');
		},
		  setPersonalPicture: function (picture) {
			personaldata.picture = "data:" + picture.filetype + ";base64," + picture.base64;
			toastr.success('Bild wurde der Mappe hinzugefügt!');
		},
		  setDesignData: function(theme,sitetemplate,mailtemplate,usecdn) {
			  designdata.theme 		= theme;
			  designdata.sitetemplate 	= sitetemplate;
			  designdata.mailtemplate	= mailtemplate;
			  designdata.usecdn		= usecdn;
			  toastr.info('Änderungen wurden gespeichert');
		  },
		  setIntroText: function(text) {
			  contentdata.introtext 		= text;
		  },
		  setPersonalText: function(text) {
			  contentdata.personaltext	= text;
		  },
		    addContact: function(gender,firstname,lastname,companyname,street,streetnumber,zipcode,city) {
			  contactdata.Gender = gender;
			  contactdata.FirstName = firstname;
			  contactdata.LastName = lastname;
			  contactdata.Gender = gender;
			  contactdata.CompanyName = companyname;
		 	  contactdata.Street = street;
			  contactdata.StreetNumber = streetnumber;
			  contactdata.ZipCode = zipcode;
			  contactdata.City = city;
			  toastr.info('Empfänger wurden gespeichert');
		  },
		   getContact: function() {
			  return contactdata;
		  },
		  getPersonalFamilienstand: function () {
			return personaldata.familienstand;	  
		  },
		  getPersonalText: function() {
			  return contentdata.personaltext;
		  },
		  getIntroText: function() {
			  return contentdata.introtext;
		  },
		  getSkills: function(){
			  return skilldata;
		  },
		  getSkilldata: function(){
			  return skilldata;
		  },
		  addSkill: function(skill) {
			   var newid = skilldata.length+1;
			   skilldata.push( {
		            'id': newid,
		            'title': skill,
		            'nodes': []
				});
		  },
		  addSubskill: function(skill, scope) {
		     var nodeData = scope.$modelValue;
		        nodeData.nodes.push({
		          id: nodeData.id * 10 + nodeData.nodes.length,
		          title: skill,
		          nodes: []
			  });	  
		  },
		  getRefData: function() {
			  return contentdata.refdata;
		  },
		  setReferences: function(text) {
			  contentdata.refdata	= text;
		  },
		  addCVItem: function(item) {
			  cvdata.push(item);
		  },
		  addCVAItem: function(item) {
			  cvadata.push(item);
		  },
		  setCVItems: function() {
			  var CVData = {};
			  CVData.LebenslaufItems = cvdata;
			  CVData.AbschluesseItems = cvadata;
			  contentdata.CVData = CVData;
		  },
		  getCVItems: function () {
			  return cvdata;
		  },
		  getCVAItems: function () {
			  return cvadata;
		  },
		  getPersonalData: function () {
			  return personaldata;
		  },
		  getPersonalMail: function () {
			  return personaldata.email;
		  },
		  getPersonalImage: function() {
			var pic = personaldata.picture;
			return pic;			
		  },
		  getDesignData: function () {
			  return designdata;
		  },
		  getContentData: function () {
			  return contentdata;
		  },
		    getAppData: function () {
			  return appdata;
		  },
		  setAppData: function (data) {
			  appdata = data;
		  },
		  saveSession: function () {
			  appdata.PersonalCollectionData = personaldata;
			  appdata.DesignConfigurationData = designdata;
			  contentdata.Contact = contactdata;
			  appdata.CollectionContentData = contentdata;
			  var appcook = JSON.stringigy(appdata);
			  $cookies.data = appcook;
		  },
		  loadSession: function () {
			  appdata = $cookies.data;
		  },
		   importApplication: function (data) {
			   console.log("Wert pur: " + data);
			  appdata = angular.fromJson(data);
			  
			  console.log("Wert nach umwandlung: "+ appdata);
			  
			  personaldata = appdata.PersonalCollectionData;
			  designdata = appdata.DesignConfigurationData;
			  contentdata = appdata.CollectionContentData;
			  contactdata = contentdata.Contact;
			  
			  // Zuletzt CV Data
			  var CVData = contentdata.CVData;
			  cvdata = CVData.LebenslaufItems;
			  cvadata = CVData.AbschluesseItems;
		  },
		  getApplicationData: function () {
			  appdata.PersonalCollectionData = personaldata;
			  appdata.DesignConfigurationData = designdata;
			  contentdata.Contact = contactdata;
			  appdata.CollectionContentData = contentdata;
			  return appdata;
		  },
		  getAppDataAsJSON: function () {
			  appdata.PersonalCollectionData = personaldata;
			  appdata.DesignConfigurationData = designdata;
			  contentdata.Contact = contactdata;
			  appdata.CollectionContentData = contentdata;
			  
			  var appjson = angular.toJson(appdata, true);
			  return appjson;
		  }
		  
		  
		  
		  
	  }
	  
});