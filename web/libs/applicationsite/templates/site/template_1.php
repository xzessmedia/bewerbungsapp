		
<!DOCTYPE HTML>
<!--
	Bewerbungs-Site HTML5 responsive Design
    	<?php echo $applicant_name; ?> <<?php echo $applicant_mailadress; ?>>
-->
<html>
	<head>
		<title>Bewerbungs-Site von <?php echo $applicant_name; ?> im HTML5 Format</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="shortcut icon" href="/favicon.ico">
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
		
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/angular/angular.min.js"></script>
		
		
		<style type="text/css" media="screen">
		    #editor { 
		        position: relative;
		        top: 0;
		        right: 0;
		        bottom: 0;
		        left: 0;
		    }
			</style>

  		
			
  
  
  		<link rel="stylesheet" type="text/css" href="/css/result-light.css">
  
    
  
    
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		
		
		 
	</head>
	<body ng-app="BewerbungsApp">
		
		
		<!-- Header -->
			<div id="header" class="skel-panels-fixed">

				<div class="top">

					<!-- Logo -->
						<div id="logo">
							<span class="image avatar48"><img height="48px" width="48px" src="<?php echo $applicant_picture; ?>" alt="" /></span>
							<h1 id="title"><?php echo $applicant_name; ?></h1>
							<span class="byline"><?php echo $applicant_jobtitle; ?></span>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#top" id="top-link" class="skel-panels-ignoreHref"><span class="fa fa-home">Einleitung</span></a></li>
								<li><a href="#cv" id="cv-link" class="skel-panels-ignoreHref"><span class="fa fa-th">Lebenslauf</span></a></li>
								<li><a href="#portfolio" id="portfolio-link" class="skel-panels-ignoreHref"><span class="fa fa-th">Referenzen</span></a></li>
								<li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="fa fa-user">Über mich</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-panels-ignoreHref"><span class="fa fa-envelope">Kontakt</span></a></li>
							</ul>
						</nav>
						
				</div>
				
				<div class="bottom">

					<!-- Social Icons -->
						<ul class="icons">
							<li><a href="<?php echo $applicant_twitter; ?>" class="fa fa-twitter solo"><span>Twitter</span></a></li>
							<li><a href="<?php echo $applicant_facebook; ?>" class="fa fa-facebook solo"><span>Facebook</span></a></li>
							<li><a href="<?php echo $applicant_github; ?>" class="fa fa-github solo"><span>Github</span></a></li>
							<li><a href="<?php echo $applicant_xing; ?>" class="fa fa-dribbble solo"><span>Xing</span></a></li>
							<li><a href="mailto:<?php echo $applicant_mailadress;  ?>?subject=Ihre Bewerbung bei uns" class="fa fa-envelope solo"><span>Email</span></a></li>
						</ul>
				
				</div>
			
			</div>

		<!-- Main -->
			<div id="main">
			
				<!-- Einleitung -->
					<section id="top" class="one">
						<div class="container">


							<header>
								<h2 class="alt">Bewerbung</h2>
							</header>
							
							<p><?php echo $anrede; ?>,</p>
							<p>Herzlich willkommen auf meiner elektronischen Bewerbungswebsite. </p>
							<p><?php echo $introtext; ?></p>
							<footer>
								<a href="#portfolio" class="button scrolly">Meine Referenzen</a>
							</footer>

						</div>
					</section>
					<!-- Einleitung -->
					<section id="cv" class="five">
						<div class="container">

					

							<header>
								<h2 class="alt"><strong>curriculum vitae</strong></h2>
							</header>
							
							<div ng-controller="cvcontroller">
							
							
							<table>
							  <tr>
							    <th></th>
							    <th></th>
							  </tr>
							  <?php echo $lebenslaufcontent; ?>
							</table>
							
							<footer>
								<table>
								  <tr>
								    <th><strong>Abschlüsse</strong></th>
								    <th></th>
								  </tr>
								  <?php echo $abschlusscontent; ?>
								</table>
							</div>
							
						</div>
					</section>
					
				<!-- Portfolio -->
					<section id="portfolio" class="two">
						<div class="container">
							
							<header>
								<h2>Referenzen</h2>
							</header>
							
							<?php echo $portfoliodata; ?>
						</div>
					</section>

				<!-- About Me -->
					<section id="about" class="three">
						<div class="container">

							<header>
								<h2>Über mich</h2>
							</header>
							
							<?php echo $aboutdata ?>
						</div>
					</section>
			
				<!-- Contact -->
					<section id="contact" class="four">
						<div class="container">

							<header>
								<h2>Interesse? <strong><br> Nehmen Sie mit mir Kontakt auf!</strong></h2>
							</header>

							<p>Sollte ich Ihr Interesse geweckt haben, freue ich mich über einen Vorstellungstermin bei Ihnen! Nutzen Sie dazu ganz komfortabel das nachfolgende Formular oder rufen Sie mich an unter: <b><?php echo $applicant_phone; ?></b>. Postalisch erreichen Sie mich unter <b><?php echo $applicant_adress; ?></b></p>
							
							<form method="post" action="index.php?action=contact">
								<div class="row half">
									<div class="6u"><input type="text" class="text" name="name" placeholder="Name" /></div>
									<div class="6u"><input type="text" class="text" name="email" placeholder="Email" /></div>
									<div class="6u"><label for="vorstellungsdatum">Vorstellungstermin:</label><input type="date" name="vorstellungsdatum"><input type="time" name="vorstellungszeit"></div>
								</div>
								<div class="row half">
									<div class="12u">
										<textarea name="message" placeholder="Weitere Informationen"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="12u">
										<input class="btn btn-primary" type="submit" value="Bewerber kontaktieren">
									</div>
								</div>
							</form>

						</div>
					</section>
			
			</div>

		<!-- Footer -->
			<div id="footer">
				
				<!-- Copyright -->
					<div class="copyright">
						<p>&copy; 2016 <?php echo $applicant_name; ?></p>
					</div>
				
			</div>

			
	<script>
	var app = angular.module('BewerbungsApp', []);
	app.controller('cvcontroller', function($scope,$http) {
	$http.get('<?php echo $application_jsonfile; ?>').success(function (data){
		$scope.ApplicantData = data;
	});
		$scope.CVData = $scope.ApplicantData.CVData;
	});
	</script>		
	</body>
	</html>