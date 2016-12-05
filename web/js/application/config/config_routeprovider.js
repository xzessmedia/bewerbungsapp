'use strict';

var app = angular.module('ApplicationApp');

app.config(function($routeProvider) {
    $routeProvider
      .when('/', { templateUrl: 'views/main.php' })
      .when('/login', { templateUrl: 'views/login.php' })
      .when('/personal', { templateUrl: 'views/personal.php' })
      .when('/sozialemedien', { templateUrl: 'views/sozialemedien.php' })
      .when('/familie', { templateUrl: 'views/familie.php' })
      .when('/kenntnisse', { templateUrl: 'views/kenntnisse.php' })
      .when('/bugreport', { templateUrl: 'views/bugreport.php' })
      .when('/ideas', { templateUrl: 'views/ideas.php' })
      .when('/community', { templateUrl: 'views/community.php' })
      .when('/dev', { templateUrl: 'views/aboutdev.php' })
      .when('/design', { templateUrl: 'views/design.php' })
      .when('/content', { templateUrl: 'views/content.php' })
      .when('/debug', { templateUrl: 'views/debugtest.php' })
      .when('/load', { templateUrl: 'views/loadapplication.php' }) 
      .when('/save', { templateUrl: 'views/saveapplication.php' })
       .when('/company', { templateUrl: 'views/company.php' }) 
      .when('/introtxt', { templateUrl: 'views/anschreiben.php' }) 
      .when('/cvdata', { templateUrl: 'views/cvdata.php' }) 
      .when('/ref', { templateUrl: 'views/references.php' }) 
      .when('/abouttxt', { templateUrl: 'views/personaltext.php' }) 
      .when('/account', { templateUrl: 'views/account.php' }) 
      .when('/editaccount', { templateUrl: 'views/editaccount.php' }) 
      .when('/export', { templateUrl: 'views/export.php' }) 
      .when('/import', { templateUrl: 'views/import.php' }) 
      .when('/exportsite', { templateUrl: 'views/site.php' }) 
      .when('/organiser', { templateUrl: 'views/organiser.php' }) 
      //.when('/weiter', { template: 'weitere seite' })
      .otherwise({ redirectTo: '/'});
});