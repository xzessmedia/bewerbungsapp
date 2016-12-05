<div ng-controller="LoginController">

	<div align="center">
	<a href="#"><img src="images/logo.png"></a><br/>
	</div>
	
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Einloggen</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Passwort vergessen?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            <strong>Login:</strong></br>
                        <form id="loginform" class="form-horizontal" ng-submit="Login(email,password)">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" ng-model="email" class="form-control" name="username" value="" placeholder="E-Mail Adresse">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" ng-model="password" type="password" class="form-control" name="password" placeholder="Passwort">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Passwort speichern
                                        </label>
                                      </div>
                                    </div>
			<div class="col-sm-12 controls">
			<button id="btn-login" ng-click="Login(email,password)"  class="btn btn-primary">Login</button>
			<a onclick="$('#loginbox').hide(); $('#signupbox').show()"  class="btn btn-primary">Registrieren</a>
			</div>
			<hr>
                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
										
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                   
											
                                        <strong>or</strong></br>
                                        <p><button class="btn btn-block btn-social btn-facebook" ng-click="authenticate('facebook')"><span class="fa fa-facebook"></span>Sign in with Facebook</button></p>
                                        <p><button class="btn btn-block btn-social btn-google"ng-click="authenticate('google')"><span class="fa fa-google"></span>Sign in with Google</button></p>
                                        <p><button class="btn btn-block btn-social btn-github" ng-click="authenticate('github')"><span class="fa fa-github"></span>Sign in with GitHub</button></p>
                                        <p><button class="btn btn-block btn-social btn-linkedin" ng-click="authenticate('linkedin')"><span class="fa fa-linkedin"></span>Sign in with LinkedIn</button></p>
                                        <p><button class="btn btn-block btn-social btn-instagram" ng-click="authenticate('instagram')"><span class="fa fa-instagram"></span>Sign in with Instagram</button></p>
                                        <p><button class="btn btn-block btn-social btn-twitter" ng-click="authenticate('twitter')"><span class="fa fa-twitter"></span>Sign in with Twitter</button></p>
                                        <p><button class="btn btn-block btn-social btn-foursquare" ng-click="authenticate('foursquare')"><span class="fa fa-foursquare"></span>Sign in with Foursquare</button></p>
                                        <p><button class="btn btn-block btn-social btn-yahoo" ng-click="authenticate('yahoo')"><span class="fa fa-yahoo"></span>Sign in with Yahoo</button></p>
                                        <p><button class="btn btn-block btn-social btn-microsoft" ng-click="authenticate('live')"><span class="fa fa-microsoft"></span>Sign in with Windows Live</button></p>
                                        <p><button class="btn btn-block btn-social btn-twitch" ng-click="authenticate('twitch')"><span class="fa fa-twitch"></span>Sign in with Twitch</button></p>
                                        <p><button class="btn btn-block btn-social btn-bitbucket" ng-click="authenticate('bitbucket')"><span class="fa fa-bitbucket"></span>Sign in with Bitbucket</button></p>
                                        <p><button class="btn btn-block btn-social btn-spotify" ng-click="authenticate('spotify')"><span class="fa fa-spotify"></span>Sign in with Spotify</button></p>
                                        </div>
                                    </div>
                                </div>    
                            </form>     



                        </div>                     
                    </div>  
        </div>

	
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
			
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Account registrieren</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Einloggen</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                              
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" ng-model="EMail" class="form-control" name="email" placeholder="Email Addresse">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">Vorname</label>
                                    <div class="col-md-9">
                                        <input type="text" ng-model="FirstName" class="form-control" name="firstname" placeholder="Vorname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Nachname</label>
                                    <div class="col-md-9">
                                        <input type="text" ng-model="LastName" class="form-control" name="lastname" placeholder="Nachname">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Passwort</label>
                                    <div class="col-md-9">
                                        <input type="password" ng-model="Password" class="form-control" name="password" placeholder="Passwort">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="icode" class="col-md-3 control-label">Einladungs-Code</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="icode" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
										
                                        <button id="btn-signup" type="button" name="register"  ng-click="RegisterAccount(FirstName,LastName,EMail,Password)" class="btn btn-info"><i class="icon-hand-right"></i> &nbsp Registrieren</button>
				<a id="btn-fbsignup" type="button" class="btn btn-primary" onclick="$('#signupbox').hide(); $('#loginbox').show()"><i class="icon-facebook"></i>   Zurück</a>
                                        <span style="margin-left:8px;">oder:</span>  
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                       <p><button class="btn btn-block btn-social btn-facebook" ng-click="authenticate('facebook')"><span class="fa fa-facebook"></span>Sign in with Facebook</button></p>
                                        <p><button class="btn btn-block btn-social btn-google"ng-click="authenticate('google')"><span class="fa fa-google"></span>Sign in with Google</button></p>
                                        <p><button class="btn btn-block btn-social btn-github" ng-click="authenticate('github')"><span class="fa fa-github"></span>Sign in with GitHub</button></p>
                                        <p><button class="btn btn-block btn-social btn-linkedin" ng-click="authenticate('linkedin')"><span class="fa fa-linkedin"></span>Sign in with LinkedIn</button></p>
                                        <p><button class="btn btn-block btn-social btn-instagram" ng-click="authenticate('instagram')"><span class="fa fa-instagram"></span>Sign in with Instagram</button></p>
                                        <p><button class="btn btn-block btn-social btn-twitter" ng-click="authenticate('twitter')"><span class="fa fa-twitter"></span>Sign in with Twitter</button></p>
                                        <p><button class="btn btn-block btn-social btn-foursquare" ng-click="authenticate('foursquare')"><span class="fa fa-foursquare"></span>Sign in with Foursquare</button></p>
                                        <p><button class="btn btn-block btn-social btn-yahoo" ng-click="authenticate('yahoo')"><span class="fa fa-yahoo"></span>Sign in with Yahoo</button></p>
                                        <p><button class="btn btn-block btn-social btn-microsoft" ng-click="authenticate('live')"><span class="fa fa-microsoft"></span>Sign in with Windows Live</button></p>
                                        <p><button class="btn btn-block btn-social btn-twitch" ng-click="authenticate('twitch')"><span class="fa fa-twitch"></span>Sign in with Twitch</button></p>
                                        <p><button class="btn btn-block btn-social btn-bitbucket" ng-click="authenticate('bitbucket')"><span class="fa fa-bitbucket"></span>Sign in with Bitbucket</button></p>
                                        <p><button class="btn btn-block btn-social btn-spotify" ng-click="authenticate('spotify')"><span class="fa fa-spotify"></span>Sign in with Spotify</button></p>
                                    </div>                                           
                                        
                                </div>
                                </form>
                                
                                
                            
                         </div>
                    </div>

               </div>
               
                

					