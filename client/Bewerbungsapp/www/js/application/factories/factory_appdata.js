/*
 * @Author: Tim Koepsel 
 * @Date: 2016-11-16 02:49:21 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-05 05:43:43
 */
'use strict';

var app = angular.module('ApplicationApp');



/*************************************************************************
 * Description:
 * ------------------------------------------------------------------------
 * This Factory is holding all application Data and is used for sharing
 * Data between Views and for importing and exporting Data into the
 * active Session
 * ***********************************************************************
 */
app.factory('Data', function($cookies, toastr, $log,$window, soapService,AppSettings,$location) {
    var appdata = AppSettings.getSession();
    var personaldata = {};
    var designdata = {};
    var contentdata = {};
    var contactdata = {};

    var introtext = "<p>Dein persönliches Anschreiben ohne Anrede (Sehr geehrte..), diese wird später hinzugefügt!</p>";
    var cvdata = [];
    var cvadata = [];
    var skilldata = [];
    var refdata = "<p>Füge hier deine Referenzen ein, zB. eingescannte Dokumente etc.</p>";
    var personaltext = "<p>Schreibe etwas über dich</p>";

    // Default Values
    personaldata.bruttogehaltprojahr = 25000;
    personaldata.skilldata = [];
    return {

        //
        // ─── SOAP INTERACTION ────────────────────────────────────────────
        //

        addApplication: function() {

            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;

            var appjson = angular.toJson(appdata, true);


            soapService.AddApplication("Unknown", appjson).then(function(response) {
                toastr.info(response.Result);
            });


        },

        SQLQuery: function(sql) {
            soapService.SQLQuery(sql).then(function(response) {
                toastr.info(response.Result);
            });
        },

        SendPing: function(facebookID) {
            soapService.SendPing(facebookID).then(function(response) {
                return true;
            });
        },

        //
        // ─── SETTER PERSONAL DATA ────────────────────────────────────────
        //
        setPersonalData: function(firstname, lastname, email, phonenumber, street, streetnumber, zipcode, city, birthdate,geburtsort, familienstand, kinder, picture) {
            personaldata.firstname = firstname;
            personaldata.lastname = lastname;
            personaldata.email = email;
            personaldata.phonenumber = phonenumber;
            personaldata.street = street;
            personaldata.streetnumber = streetnumber;
            personaldata.zipcode = zipcode;
            personaldata.city = city;
            personaldata.birthdate = birthdate;
            personaldata.birthplace = geburtsort;
            personaldata.familystatus = familienstand;
            personaldata.children = kinder;
            personaldata.picture = "data:" + picture.filetype + ";base64," + picture.base64;
            personaldata.picturedata = picture.base64;
            personaldata.picturetype = picture.filetype;

            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            AppSettings.setSession(appdata);

            toastr.info('Änderungen wurden gespeichert');
        },
        setPersonalDataSocialMedia: function(facebook, xing, twitter, github, website) {
            personaldata.facebook = facebook;
            personaldata.xing = xing;
            personaldata.twitter = twitter;
            personaldata.github = github;
            personaldata.website = website;

            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            AppSettings.setSession(appdata);

            toastr.info('Änderungen wurden gespeichert');
        },
        setPersonalDataBeruf: function(jobtitle, ausbildung, bruttogehalt,showGehalt) {
            personaldata.jobtitle = jobtitle;
            personaldata.ausbildung = ausbildung;
            personaldata.bruttogehaltprojahr = bruttogehalt;
            personaldata.showMoney = showGehalt;

            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            AppSettings.setSession(appdata);
            toastr.info('Änderungen wurden gespeichert');
        },
        setPersonalDataKenntnisse: function(skilldata) {
            personaldata.skilldata = skilldata;

            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            AppSettings.setSession(appdata);
            toastr.info('Kenntnisse wurden gespeichert');
        },
        setPersonalPicture: function(picture) {
            personaldata.picture = "data:" + picture.filetype + ";base64," + picture.base64;
            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            AppSettings.setSession(appdata);
            toastr.success('Bild wurde der Mappe hinzugefügt!');
        },
        addSkill: function(skill) {
            var newid = personaldata.skilldata.length + 1;
            personaldata.skilldata.push({
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
        //
        // ─── SETTER DESIGN DATA ──────────────────────────────────────────
        //
        setDesignData: function(theme, sitetemplate, mailtemplate, usecdn) {
            designdata.theme = theme;
            designdata.sitetemplate = sitetemplate;
            designdata.mailtemplate = mailtemplate;
            designdata.usecdn = usecdn;

            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            AppSettings.setSession(appdata);
            toastr.info('Änderungen wurden gespeichert');
        },
        //
        // ─── SETTER CONTENT DATA ─────────────────────────────────────────
        //
        setIntroText: function(subject, text) {
            contentdata.introtext = text;
            contentdata.subject = subject;

            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            AppSettings.setSession(appdata);
        },
        setPersonalText: function(text) {
            contentdata.personaltext = text;

            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            AppSettings.setSession(appdata);
        },
        addContact: function(gender, firstname, lastname, companyname, street, streetnumber, zipcode, city) {
            contactdata.Gender = gender;
            contactdata.FirstName = firstname;
            contactdata.LastName = lastname;
            contactdata.Gender = gender;
            contactdata.CompanyName = companyname;
            contactdata.Street = street;
            contactdata.StreetNumber = streetnumber;
            contactdata.ZipCode = zipcode;
            contactdata.City = city;

            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            AppSettings.setSession(appdata);
            toastr.info('Empfänger wurden gespeichert');
        },
        setReferences: function(text) {
            contentdata.refdata = text;

            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            AppSettings.setSession(appdata);
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

        //
        // ─── GETTER ──────────────────────────────────────────────────────
        //


        getContact: function() {
            return contactdata;
        },
        getPersonalFamilienstand: function() {
            return personaldata.familienstand;
        },
        getPersonalText: function() {
            return contentdata.personaltext;
        },
        getIntroText: function() {
            return contentdata.introtext;
        },
        getIntroTextSubject: function() {
            return contentdata.subject;
        },
        getSkills: function() {
            return skilldata;
        },
        getSkilldata: function() {
            return skilldata;
        },
        getRefData: function() {
            return contentdata.refdata;
        },
        getCVItems: function() {
            return cvdata;
        },
        getCVAItems: function() {
            return cvadata;
        },
        getPersonalData: function() {
            return personaldata;
        },
        getPersonalMail: function() {
            return personaldata.email;
        },
        getPersonalImage: function() {
            var pic = personaldata.picture;
            return pic;
        },
        getDesignData: function() {
            return designdata;
        },
        getContentData: function() {
            return contentdata;
        },
        getAppData: function() {
            return appdata;
        },
        setAppData: function(data) {
            appdata = data;
        },

        //
        // ─── IO ──────────────────────────────────────────────────────────
        //

        /*************************************************************************
         * Creates a new Session and flushes all vars
         * ***********************************************************************
         */
        newSession: function() {


     appdata = AppSettings.getSession();
     personaldata = {};
     designdata = {};
     contentdata = {};
     contactdata = {};

     introtext = "<p>Dein persönliches Anschreiben ohne Anrede (Sehr geehrte..), diese wird später hinzugefügt!</p>";
     cvdata = [];
     cvadata = [];
     skilldata = [];
     refdata = "<p>Füge hier deine Referenzen ein, zB. eingescannte Dokumente etc.</p>";
     personaltext = "<p>Schreibe etwas über dich</p>";

    // Default Values
    personaldata.bruttogehaltprojahr = 25000;
    personaldata.skilldata = [];
            $location.path('/personal');
            toastr.info('Neuer Bewerbungsentwurf wurde gestartet');
        },
        /*************************************************************************
         * Save Session into coookie
         * ***********************************************************************
         */
        saveSession: function() {
            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            var appcook = JSON.stringigy(appdata);
            $cookies.data = appcook;
        },
        /*************************************************************************
         * Loads a session from cookie
         * ***********************************************************************
         */
        loadSession: function() {
            appdata = $cookies.data;

            personaldata = appdata.PersonalCollectionData;
            designdata = appdata.DesignConfigurationData;
            contentdata = appdata.CollectionContentData;
            contactdata = contentdata.Contact;

            // Zuletzt CV Data
            var CVData = contentdata.CVData;
            cvdata = CVData.LebenslaufItems;
            cvadata = CVData.AbschluesseItems;
        },
        /*************************************************************************
         * Imports an application from string into session
         * This is used by the LoadApplication
         * ***********************************************************************
         */
        importApplication: function(data) {
      
   
                appdata = angular.fromJson(data);
   
            

            personaldata = appdata.PersonalCollectionData;
            designdata = appdata.DesignConfigurationData;
            contentdata = appdata.CollectionContentData;


            contactdata = contentdata.Contact;
            
            

            // Zuletzt CV Data
            var CVData = contentdata.CVData;
            cvdata = CVData.LebenslaufItems;
            cvadata = CVData.AbschluesseItems;

            AppSettings.setSession(appdata);
        },
        /*************************************************************************
         * Imports an application from cloud into session
         * This is used by the LoadApplication
         * ***********************************************************************
         */
        importApplicationFromCloud: function(data) {
      
   
                appdata = JSON.parse(JSON.stringify(data));
                $log.log(appdata);
            

            personaldata = appdata.PersonalCollectionData;
            designdata = appdata.DesignConfigurationData;
            contentdata = appdata.CollectionContentData;
            contactdata = contentdata.Contact;
            
            

            // Zuletzt CV Data
            var CVData = contentdata.CVData;
            cvdata = CVData.LebenslaufItems;
            cvadata = CVData.AbschluesseItems;

            AppSettings.setSession(appdata);
        },
        getApplicationData: function() {
            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;
            return appdata;
        },
        
        /*************************************************************************
         * This is used to export the session to string
         * ***********************************************************************
         */
        getAppDataAsJSON: function() {
            appdata.PersonalCollectionData = personaldata;
            appdata.DesignConfigurationData = designdata;
            contentdata.Contact = contactdata;
            appdata.CollectionContentData = contentdata;

            var appjson = angular.toJson(appdata, true);
            return appjson;
        }




    }

});