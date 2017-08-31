<!DOCTYPE HTML>
<!--
	Directive by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Campus Ambassador</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="../assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<!--[if lte IE 8]><link rel="stylesheet" href="../assets/css/ie8.css" /><![endif]-->
		<style>
			#FB-Oauth,#FB-Oauth2{
				padding: 10px;
				    background-color: rgba(98, 153, 193, 0.76);
				    width: 400px;
				    margin: 30px;
				    border-radius: 10px;
				    left: 50%;
				    /*position: absolute;*/
				    /*transform: translateX(-50%);*/
			}
		</style>
	</head>
	<body>
	<div id="fb-root"></div>
	<!-- FB Oauth -->
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1088640574599664";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script','email', 'facebook-jssdk'));
	function checkLoginState() {
	  FB.getLoginStatus(function(response) {
	    console.log(response);
	    return response;
	  });
	 // Here we run a very simple test of the Graph API after login is
	   // successful.  See statusChangeCallback() for when this call is made.
	   
	}
	</script>
	<script>
	$(document).ready(function(){
		var name,email,dob,pic;
		var stat=0;
		function auth_response_change_callback(){
			console.log("called");
		}
		var refreshIntervalId = setInterval(function(){
			FB.getLoginStatus(function(Lstatus) {
			    console.log(Lstatus);
			    if(Lstatus.status == "connected"){
			    	clearInterval(refreshIntervalId);
			    	//REST call with FB userID fetches if signedu or not.
			    	//If not, then post request to the same for registering and validation.
				FB.api('/me?fields=name,first_name,education,birthday,email,picture.width(500).height(500)', function(response) {
					console.log(response);
			      console.log('Successful login for: ' + response.name);
			      name = response.name;
			      email = response.email;
			      DOB = response.birthday;
			      pic = response.picture;
			      //is signed up, display, your ref code is: and listing of users, leaderboard
			      if(name){
				      $("input[name='name']").val(name);
			      	  $("input[name='name']").attr('disabled','true');
			      }
			  	  if(email){
			      $("input[name='email']").val(email);
			  	  $("input[name='email']").attr('disabled','true');
			  	  }
			  	   if(DOB){
			      $("input[name='DOB']").val(DOB);
			  	  $("input[name='DOB']").attr('disabled','true');
			  	  }
					$("#FB-Oauth").html("Hi! " +response.first_name+" <ul class='actions'><li><a href='#signUp' class='button'>Continue to step 2</a></li></ul>");
					$("#FB-Oauth2").html("Hi! " +response.first_name+" Complete signUp below");
				});

				}
		    });
			
		},1000);
	});
	</script>
		<!-- Header -->
			<div id="header" >
				<span class="logo icon "></span><h6>IIT Patna</h6>
				<h1>Anwesha</h1><br>
				<h1>Campus Ambassador Programme</h1><br>
				<center>
					
				<div id="FB-Oauth">
					Sign-Up with Facebook
					<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with"  data-auto-logout-link="true" data-use-continue-as="true" data-scope="email,public_profile,user_location,user_birthday,user_about_me" onlogin="auth_response_change_callback();"></div><!-- <br>
					<a id="test">This this</a> -->
				</div>
				</center>
			
			</div>

		<!-- Main -->
			<div id="main">

				<header class="major container 75%">
				<h1 style="font-size: 40px">About us</h1><br>
					<h2>We conduct experiments that
					<br />
					may or may not seriously
					<br />
					break the universe</h2>
					<!--
					<p>Tellus erat mauris ipsum fermentum<br />
					etiam vivamus nunc nibh morbi.</p>
					-->
				</header>

				<div class="box alt container">
					<section class="feature left">
						<a href="#" class="image icon fa-signal"><img src="../images/pic01.jpg" alt="" /></a>
						<div class="content">
							<h3>The First Thing</h3>
							<p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis fusce lacus.</p>
						</div>
					</section>
					<section class="feature right">
						<a href="#" class="image icon fa-code"><img src="../images/pic02.jpg" alt="" /></a>
						<div class="content">
							<h3>The Second Thing</h3>
							<p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis fusce lacus.</p>
						</div>
					</section>
					<section class="feature left">
						<a href="#" class="image icon fa-mobile"><img src="../images/pic03.jpg" alt="" /></a>
						<div class="content">
							<h3>The Third Thing</h3>
							<p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis fusce lacus.</p>
						</div>
					</section>
				</div>

				
				<div class="box container">
					<header>
						<h2>A lot of generic stuff</h2>
					</header>
					<section>
						<header>
							<h3>Paragraph</h3><br>
							<p>This is the subtitle for this particular heading</p>
						</header>
						<p>Phasellus nisl nisl, varius id <sup>porttitor sed pellentesque</sup> ac orci. Pellentesque
						habitant <strong>strong</strong> tristique <b>bold</b> et netus <i>italic</i> malesuada <em>emphasized</em> ac turpis egestas. Morbi
						leo suscipit ut. Praesent <sub>id turpis vitae</sub> turpis pretium ultricies. Vestibulum sit
						amet risus elit.</p>
					</section>
					<section>
						<header>
							<h3>Blockquote</h3>
						</header>
						<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget.
						tempus euismod. Vestibulum ante ipsum primis in faucibus.</blockquote>
					</section>
					<section>
						<header>
							<h3>Divider</h3>
						</header>
						<p>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra
						ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci
						facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam
						tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
						posuere cubilia.</p>
						<hr />
						
					</section>
					<section>
						<header>
							<h3>Unordered List</h3>
						</header>
						<ul class="default">
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						</ul>
					</section>
					
					<section>
						<header>
							<h3>Table</h3>
						</header>
						<div class="table-wrapper">
							<table class="default">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Description</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>45815</td>
										<td>Something</td>
										<td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
										<td>29.99</td>
									</tr>
									<tr>
										<td>24524</td>
										<td>Nothing</td>
										<td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
										<td>19.99</td>
									</tr>
									<tr>
										<td>45815</td>
										<td>Something</td>
										<td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
										<td>29.99</td>
									</tr>
									<tr>
										<td>24524</td>
										<td>Nothing</td>
										<td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
										<td>19.99</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="3"></td>
										<td>100.00</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</section>
					
				</div>
			

				<footer class="major container 75%">
					<h3>Get shady with science</h3>
					<p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus.</p>
					<ul class="actions">
						<li><a href="#" class="button">Join our crew</a></li>
					</ul>
				</footer>

			</div>

		<!-- Footer -->
			<div id="footer">
				<div class="container 75%">

					<header class="major last">
						<h2>Sign-Up</h2>
						<center>
							<h2>Step 1</h2>
						<div id="FB-Oauth2">
							 Facebook
							<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with"  data-auto-logout-link="true" data-use-continue-as="true" data-scope="email,public_profile,user_location,user_birthday,user_about_me" onlogin="auth_response_change_callback();"></div><!-- <br>
							<a id="test">This this</a> -->
						</div>
						</center>
					</header>
					<form method="post" action="#" id="signUp" style="display: block">
						<h2>Step 2</h2><br>
						<div class="row">
							<div class="6u 12u(mobilep)">
								<input type="text" name="name" placeholder="Name" />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="email" name="email" placeholder="Email" />
							</div>
						</div>
						<div class="row">
							<div class="6u 12u(mobilep)">
								<input type="text" name="college" placeholder="College"  />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="text" name="degree" placeholder="Degree"  />
							</div>
						</div>
						<div class="row">
							<div class="6u 12u(mobilep)">
								<input type="number" name="yearOfGraduation" placeholder="Year of Graduation" />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="text" name="city" placeholder="City" />
							</div>
						</div>
						<div class="row">
							<div class="6u 12u(mobilep)">
								<input type="number" name="mobile" placeholder="Mobile(10 digit)" />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="text" name="DOB" placeholder="Date of Birth" />
							</div>
						</div>
						<!-- gender -->
						<div class="row">
							<div class="12u">
								<textarea name="address" placeholder="Address" rows="3"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<textarea name="threethings" placeholder="Tell us 3 things you would do as a Campus Ambassador of Anwesha '18." rows="4"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<textarea name="responsibility" placeholder="Have you held any position of responsibility in your college? If yes, please explain." rows="4"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<textarea name="involvement" placeholder="Have you been a part of one or more previous editions of Anwesha? If yes, please explain." rows="4"></textarea>
							</div>
						</div>
						
						<div class="row">
							<div class="12u">
								<input type="text" name="referalcode" placeholder="Optional referal code" />
							</div>
						</div>

						<div class="row">
							<div class="12u">
								<ul class="actions">
									<li><input type="submit" value="Submit" /></li>
								</ul>
							</div>
						</div>
					</form>

					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						</ul>

					<ul class="copyright">
						<li>Anwesha IIT Patna</li>
					</ul>

				</div>
			</div>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>
