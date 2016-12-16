'use strict';

var app = angular.module('ApplicationApp');

app.config(function($routeProvider) {
    $routeProvider
      .when('/', { templateUrl: 'js/application/views/main.php' })
      .when('/login', { templateUrl: 'js/application/views/login.php' })
      .when('/personal', { templateUrl: 'js/application/views/personal.php' })
      .when('/sozialemedien', { templateUrl: 'js/application/views/sozialemedien.php' })
      .when('/beruf', { templateUrl: 'js/application/views/beruf.php' })
      .when('/kenntnisse', { templateUrl: 'js/application/views/kenntnisse.php' })
      .when('/bugreport', { templateUrl: 'js/application/views/bugreport.php' })
      .when('/ideas', { templateUrl: 'js/application/views/ideas.php' })
      .when('/community', { templateUrl: 'js/application/views/community.php' })
      .when('/dev', { templateUrl: 'js/application/views/aboutdev.php' })
      .when('/design', { templateUrl: 'js/application/views/design.php' })
      .when('/content', { templateUrl: 'js/application/views/content.php' })
      .when('/debug', { templateUrl: 'js/application/views/debugtest.php' })
      .when('/load', { templateUrl: 'js/application/views/loadapplication.php' }) 
      .when('/save', { templateUrl: 'js/application/views/saveapplication.php' })
      .when('/company', { templateUrl: 'js/application/views/company.php' }) 
      .when('/introtxt', { templateUrl: 'js/application/views/anschreiben.php' }) 
      .when('/cvdata', { templateUrl: 'js/application/views/cvdata.php' }) 
      .when('/ref', { templateUrl: 'js/application/views/references.php' }) 
      .when('/abouttxt', { templateUrl: 'js/application/views/personaltext.php' }) 
      .when('/account', { templateUrl: 'js/application/views/account.php' }) 
      .when('/editaccount', { templateUrl: 'js/application/views/editaccount.php' }) 
      .when('/export', { templateUrl: 'js/application/views/export.php' }) 
      .when('/import', { templateUrl: 'js/application/views/import.php' }) 
      .when('/exportsite', { templateUrl: 'js/application/views/site.php' }) 
      .when('/organiser', { templateUrl: 'js/application/views/organiser.php' }) 
      .when('/settings', { templateUrl: 'js/application/views/settings.php' }) 
      .when('/bewerbungen', { templateUrl: 'js/application/views/bewerbungen.php' }) 
      .when('/new', { templateUrl: 'js/application/views/newsession.php' }) 
      //.when('/weiter', { template: 'weitere seite' })
      .otherwise({ redirectTo: '/'});
});