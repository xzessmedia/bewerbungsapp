<?php
ob_start();
require_once("appcore.php");
?>

<html ng-app="ApplicationApp">
<head>
  <meta charset="utf8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- You can use open graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
	<meta property="og:url"           content="https://www.bewerbungsapp.eu/bewerbungsapp.eu/xzessmedia/index.php" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Bewerbungsapp" />
	<meta property="og:description"   content="Professionell und effektiv Bewerbungen schreiben" />
	<meta property="og:image"         content="https://www.bewerbungsapp.eu/bewerbungsapp.eu/xzessmedia/images/logo72.png" />
	
  <title>Bewerbungs-Studio App</title>
  <script src="js/jquery/jquery-3.1.0.js"></script> 
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="js/bootstrap-3.3.7/js/bootstrap.js"></script> 
  <link rel="stylesheet" href="js/font-awesome-4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="js/bootstrap-3.3.7/css/bootstrap_flatly.css">
  <link rel="stylesheet" href="js/bootstrap-3.3.7/css/bootstrap-social.css">
  <link href="js/summernote-0.8.2/summernote.css" rel="stylesheet">
  <link rel="stylesheet" href="js/angular-1.5.8/modules/ngDialog/css/ngDialog.css">
  <link rel="stylesheet" href="js/angular-1.5.8/modules/ngDialog/css/ngDialog-theme-default.css">
  <link rel="stylesheet" href="js/angular-1.5.8/modules/ngDialog/css/ngDialog-custom-width.css">
  <link rel="stylesheet" href="js/angular-1.5.8/modules/angular-loading-bar/build/loading-bar.css">
  <link rel="stylesheet" href="js/angular-1.5.8/modules/angular-ui-tree/dist/angular-ui-tree.min.css">
  <link rel="stylesheet" type="text/css" href="js/angular-1.5.8/modules/angular-toastr/dist/angular-toastr.css" />
  
  <link rel="stylesheet" href="style.css">
<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
<link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
<link rel="manifest" href="icons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
 
  <script src="https://apis.google.com/js/client.js"></script>
  <script src="js/summernote-0.8.2/summernote.js"></script>
  <script src="js/angular-1.5.8/angular.js"></script>
  <script src="js/angular-1.5.8/angular-animate.js"></script>
  <script src="js/angular-1.5.8/angular-route.js"></script>
  <script src="js/angular-1.5.8/angular-cookies.js"></script>
  <script src="js/angular-1.5.8/angular-modal-service.js"></script>
  <script src="js/angular-1.5.8/angular-summernote.js"></script>
   <script src="js/angular-1.5.8/satellizer.js"></script>
   <script src="js/angular-1.5.8/modules/ngDialog/js/ngDialog.js"></script>
   <script src="js/angular-1.5.8/modules/ngStorage/ngStorage.js"></script>
   <script src="js/angular-1.5.8/modules/ngFacebook/ngFacebook.js"></script>
   <script src="js/angular-1.5.8/modules/soap/soapclient.js"></script>
   <script src="js/angular-1.5.8/modules/soap/angular.soap.js"></script>
   <script src="js/angular-1.5.8/modules/ngGapi/gapi.js"></script>
   <script src="js/angular-1.5.8/modules/ngBase64Upload/dist/angular-base64-upload.js"></script>
   <script src="js/angular-1.5.8/modules/angular-loading-bar/build/loading-bar.js"></script>
   <script src="js/angular-1.5.8/modules/angular-ui-tree/dist/angular-ui-tree.js"></script>
   <script src="js/angular-1.5.8/modules/angular-toastr/dist/angular-toastr.tpls.js"></script>
   <script src="js/angular-1.5.8/modules/fileupload/lvl-uuid.js"></script>
   <script src="js/angular-1.5.8/modules/fileupload/lvl-file-upload.js"></script>
   <script src="js/angular-1.5.8/modules/fileupload/lvl-xhr-post.js"></script>
   
   <script src="js/angular-1.5.8/modules/ngCordova/dist/ng-cordova.js"></script>
   <script src="js/cordova/cordova.js"></script>
   
  <script src="app.js"></script>
  <script src="js/application/config/config_compileprovider.js"></script>
  <script src="js/application/config/config_routeprovider.js"></script>
  <script src="js/application/config/config_authprovider.js"></script>
  <script src="js/application/config/config_facebookprovider.js"></script>
  <script src="js/application/run/app_run.js"></script>
  <script src="js/application/filters/filter_phone.js"></script>
  <script src="js/application/directives/directive_fileread.js"></script>
  <script src="js/application/directives/directive_phoneinput.js"></script>
  <script src="js/application/directives/directive_filemodel.js"></script>
  <script src="js/application/directives/directive_fileselect.js"></script>
  <script src="js/application/directives/directive_numbersonly.js"></script>
  <script src="js/application/services/service_fileupload.js"></script>
  <script src="js/application/services/service_data.js"></script>
  <script src="js/application/factories/factory_soap.js"></script>
  <script src="js/application/factories/factory_jsonlocaldataprovider.js"></script>
  <script src="js/application/factories/factory_facebookhelper.js"></script>
  <script src="js/application/factories/factory_appdata.js"></script>
  <script src="js/application/controllers/controller_communityinfo.js"></script>
  <script src="js/application/controllers/controller_ideas.js"></script>
  <script src="js/application/controllers/controller_personal.js"></script>
  <script src="js/application/controllers/controller_design.js"></script>
  <script src="js/application/controllers/controller_content.js"></script>
  <script src="js/application/controllers/controller_import.js"></script>
  <script src="js/application/controllers/controller_startpage.js"></script>
  <script src="js/application/controllers/controller_saveapplication.js"></script>
  <script src="js/application/controllers/controller_loadapplication.js"></script>
  <script src="js/application/controllers/controller_login.js"></script>
  <script src="js/application/controllers/controller_about.js"></script>
  <script src="js/application/controllers/controller_organiser.js"></script>
  <script src="js/application/controllers/controller_bugreport.js"></script>
  <script src="js/application/upload.js"></script>
  
  
  <script>
function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('clock').innerHTML =
    "<strong>Uhrzeit: </strong>" +h + ":" + m + ":" + s + " Uhr";
    var t = setTimeout(startTime, 500);
}
function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
</script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
</head>
<body onload="startTime()" style="font-size:14px">

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.8&appId=525143354344103";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>	

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="true">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  <a href="#/" class="navbar-left"><img src="images/logo48.png"></a>
	  <a class="navbar-brand" href="#/">Bewerbungsapp</a>
    </div>

    <!-- Collect the nav links, forms, a
	nd other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
		  
         <li class="dropdown">
          <a href="#/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-file"></span> Datei <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#/new"><span class="glyphicon glyphicon-file"></span> Neue Bewerbung</a></li>
            <li><a href="#/load"><span class="glyphicon glyphicon-floppy-open"></span> Mappe laden</a></li>
            <li><a href="#/save"><span class="glyphicon glyphicon-floppy-save"></span> Mappe speichern als</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#/export"><span class="glyphicon glyphicon-save-file"></span> Export zu PDF</a></li>
	<li><a href="#/exportsite"><span class="glyphicon glyphicon-cloud-upload"></span> Export als eBewerbung</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#/dev">Über den Entwickler</a></li>
          </ul>
	  </li>
        <li><a href="#/personal"><span class="glyphicon glyphicon-user"></span> Zur Person <span class="sr-only">(current)</span></a></li>
        <li><a href="#/design"><span class="glyphicon glyphicon-wrench"></span> Gestaltung</a></li>
        <li><a href="#/introtxt"><span class="glyphicon glyphicon-list-alt"></span> Inhalt</a></li>	
      </ul>
	  
	<ul class="nav navbar-nav navbar-right">

      <li><a href="#/bugreport"><span class="glyphicon glyphicon-fire"></span> Bug melden</a></li>
      <li><a href="#/ideas"><span class="glyphicon glyphicon-bell"></span> Wünsche</a></li>
      <li><a href="#/community"><span class="glyphicon glyphicon-comment"></span> Community</a></li>

		<div ng-controller="LoginController" class="nav navbar-nav navbar-right">
		<li ng-show="isLoggedIn==false">
			<a ng-click="login()" class="btn btn-block btn-social btn-md  btn-social btn-facebook">
		    <span class="fa fa-facebook"></span> Anmelden
		</a>
		</li>
		<li ng-show="isLoggedIn==true"><a ng-click="logout()"><img src="{{userimgsrc}}"></a>
		<button ng-click="logoff()">Abmelden</button>
			
		</li>
	</div>
	
	</ul>
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>



  <div class="container-fluid">
	
	<div class ="row" ng-controller="CommunityInfoController">
		<div class="col-lg-6">
		<div id="clock"></div>
  		Aktive Benutzer: {{activeusers}}
		</div>
		
	</div>
	
    <div ng-view></div>
	
  </div>
  
  <hr>
      <div align="center">
		   
	  <div class="row">
		  <div class="col-sm-4"><img src="https://app.bewerbungsapp.eu/images/logo48.png"><p><strong>Bewerbungsapp</strong></p><p>Version: <?php echo $version; ?></p><p>Copyright © 2016 by <a href="https://www.xzessmedia.de" target="_blank">xzessmedia</a></p></div>
	  <div class="col-sm-4"><div class="fb-like" data-href="https://www.facebook.com/bewerbungsapp/" data-layout="standard" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div></div>
	  <div class="col-sm-4"> <p><a href="https://www.facebook.com/bewerbungsapp/" target="_blank"><img height="48px" width="48px" src="https://app.bewerbungsapp.eu/images/fb_icon_325x325.png"></a></p></div>
	  </div>
	  
	  
	  
	<h2>Plattform Downloads:</h2></br><p><a href="https://www.bewerbungsapp.eu/download/bewerbungsapp-fuer-windows/" target="_blank"><img src="https://app.bewerbungsapp.eu/images/square_win10.png"></a><a href="https://www.bewerbungsapp.eu/download/bewerbungsapp-fuer-chrome-os/"><img src="https://app.bewerbungsapp.eu/images/square_chromeOS.png" target="_blank"></a><a href="https://www.bewerbungsapp.eu/download/bewerbungsapp-fuer-android/"><img src="https://app.bewerbungsapp.eu/images/square_android.png" target="_blank"></a></p><p>100% kostenlos! Deine Daten werden nicht auf dem Server gespeichert!</p><p> Bitte beachte dass bei einer eBewerbung deine Daten auf dem Server gespeichert werden.</p><p>Alle Daten werden nur zum offensichtlichen Zwecke genutzt!</p></div>

		
  
  
</body>
</html>