<!DOCTYPE HTML>
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
				    
				    margin: 30px;
				    border-radius: 10px;
				    left: 50%;
				    /*position: absolute;*/
				    /*transform: translateX(-50%);*/
					/* width: 90% !important; */
					width: 300px;
			}
			/*@media screen and (max-width: 600px) {
			#FB-Oauth,#FB-Oauth2{
				width: 300px;
			} */
		</style>
		<script>
	$(document).ready(function(){
			$("#submit").click(function(event){
				$("#myloader").fadeIn();
			//function submitF(){
					// event.preventDefault();
					var name=$("[name='name']").val();
					var email=$("[name='email']").val();
					var college=$("[name='college']").val();
					var degree=$("[name='degree']").val();
					var fbID=$("[name='fbID']").val();
					var city=$("[name='city']").val();
					var graduation=$("[name='graduation']").val();
					var address=$("[name='address']").val();
					var dob=$("[name='DOB']").val();
					var mobile=$("[name='mobile']").val();
					var sex=$("[name='gender']:checked").val();
					var responsibility=$("[name='responsibility']").val();
					var involvement=$("[name='involvement']").val();
					var threethings=$("[name='threethings']").val();
					var referalcode=$("[name='referalcode']").val();
					console.log("Request Sent");
					$.post("../user/register/CampusAmbassador/",
						{        						
   						name: name,
   						fbID:fbID,
    					email: email,
    					college: college,
    					degree: degree,
    					city:city,
    					graduation:graduation,
    					address:address,
    					dob:dob,
    					mobile:mobile,
    					sex:sex,
    					responsibility:responsibility,
    					involvement:involvement,
    					threethings:threethings,
    					referalcode:referalcode
						},
						function(data, status){
    					console.log("Response");
    					console.log("Data: " + data + "\nStatus: " + status);
    					if(status=='success'){$("#myloader").fadeOut();
    						console.log(data);

    						if(data[0]==1){
    							$("#message").html('<center<b>Registration Successful</b>Your referal ID is : '+data[1]['pId']+'<br>A confirmation email has been sent to '+email+'.</center>');
    							$("#message").fadeIn();
    							$("#message").css('background','#5FAB22');
    							$("#signUp").fadeOut();
    						}else{
    							$("#message,#message2").fadeIn();
    							$("#message,#message2").html('<center>Error<br>'+data[1]+'</center>');
							}
//							$('html, body').animate({
//							        scrollTop: $("#header").offset().top
//							    }, 500);
 
    					}else{$("#myloader").fadeOut();
    							$("#message,#message2").fadeIn();
    							$("#message,#message2").html('An error occured.<br> Please try again.');
    							
							    console.log("Failed "+data);

    						}
			    			},"json");

			});
		});
		</script>
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
		var fbID;
		function auth_response_change_callback(){
			console.log("called");
		}
		var refreshIntervalId = setInterval(function(){
			FB.getLoginStatus(function(Lstatus) {
			    console.log(Lstatus);
			    fbID = Lstatus.authResponse['userID'];
			    console.log(fbID);
			    	console.log(Lstatus.status);
			    $("input[name='fbID']").val(fbID);
			    if(Lstatus.status == "connected"){
			    	console.log("in");
			    	clearInterval(refreshIntervalId);
			    	$.get( "../user/CAcheck/" + fbID + "/", function( data ) {
			    	  // var obj = JSON.parse(data);
			    	  console.log(data);
			    	  console.log(data[0]);

			    	// if(data[-1])
			    	//REST call with FB userID fetches if signedu or not.
			    	//If not, then post request to the same for registering and validation.
				FB.api('/me?fields=name,first_name,education,gender,birthday,email,picture.width(500).height(500)', function(response) {
					console.log(response);
			      console.log('Successful login for: ' + response.name);
			      name = response.name;
			      // gender = response.gender;
			      email = response.email;
			      DOB = response.birthday;
			      pic = response.picture;
			      //is signed up, display, your ref code is: and listing of users, leaderboard
			      if(name){
				      $("input[name='name']").val(name);
			      	  $("input[name='name']").attr('disabled','true');
			      }
			      // if(gender){
	      		// 	var $radios = $('input:radio[name=gender]');
		      	// 	if(gender=='male'){
		      	// 		$radios.filter('[value=M]').prop('checked', true);
		      	// 	} else if(gender=='female') {
		      	// 		$radios.filter('[value=F]').prop('checked', true);

		      	// 	}
			      // 	  $("input[name='gender']").attr('disabled','true');
			      // }
			  	  if(email){
				      $("input[name='email']").val(email);
				  	  $("input[name='email']").attr('disabled','true');
			  	  }
			  	  if(DOB){//dob format check
				      $("input[name='DOB']").val(DOB);
				      var dobArr = DOB.split("/");
				      var dobNo = dobArr.length - 1;
				      var dobStr = '';
				      if(dobNo==2){
				      	dobStr += dobArr[2] + '-';
				      	dobStr += dobArr[0] + '-';
				      	dobStr += dobArr[1];
				      	$("input[name='DOB']").val(dobStr);
				      }
			  	  // $("input[name='DOB']").attr('disabled','true');
			  	  }
			  	  if(data[0]<1){
					  $("#FB-Oauth").html("Hi! " +response.first_name+" <ul class='actions'><li><a href='#signUp' class='button'>Continue to step 2</a></li></ul>");
					  $("#FB-Oauth2").html("Hi! " +response.first_name+"<br> Complete signUp below");	
					  $("#signUp").css("display","block");
			  	  }else if(data[0]>=1){
			  	  	$("#FB-Oauth").html("Hi! " +response.first_name+"<br>Referal Code is :"+data[1].pId+" <br><ul class='actions'><li><a href='#leader' class='button'>Leaderboard</a></li></ul>");
			  	  	$("#FB-Oauth2").html("Sign-Up Complete <br>Referal Code is : " + data[1].pId);
			  	  }
				});
				});
				}
		    });
			
		},1000);
    	$.get( "../leaderboard/api/", function( leaderData ) {
    		if(leaderData.length>0){
    		leaderData.forEach(function(userData, index){
    			var index_ = parseInt(index);
    			index_++;
    			$("#leaderTable").append("<tr><td>"+ index_ +"</td><td>"+userData.name+"</td><td>"+userData.score+"</td></tr>");
    		});
    		}
    	},"json");

	});
	</script>

		<!-- Header -->
			<div id="header"> <!-- style=" background:url(../assets/img/ca_bg.jpeg);background-repeat: no-repeat;background-size: 100% 100%;" -->
				<!-- <span class="logo icon "></span>--><br><br><br><br><h6 style="color:red"><!-- IIT Patna's --></h6>
				<!--
				<h1 style="color:red">Anwesha</h1><br>
				<h1 style="color:red">Campus Ambassador Programme</h1><br>
				-->
				<br><br><br><br><br>
				<center>
					
				<div id="FB-Oauth">
					<div class="fb-text">Sign-Up with Facebook</div>
					<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with"  data-auto-logout-link="true" data-use-continue-as="true" data-scope="email,public_profile,user_location,user_birthday,user_about_me" onlogin="auth_response_change_callback();"></div>
					
					<!-- <br> <a id="test">This this</a> -->
				</div>
				</center>
			
			</div>

		<!-- Main -->
			<div id="main">

				<header class="major container 95%">
				<h1 style="font-size: 40px">About us</h1><br>
					<p>
						Anwesha is the annual techno-cultural extravaganza celebrated with utmost pomp and vigour, in spring. Since it's inception in 2010, it has grown into one of the most anticipated student organized youth festival. From NASA scientists to stupendous dancers, from ethical hackers to spellbinding singers, from game development to  gaming war, from robotics to dramatics, from Model United Nations to foreign exchange conferences, from Sufi to Death Metal, Anwesha, lives up to it's motto "Think. Dream. Live.", urging every individual to unleash their  inner passion to reach their ultimate dream. Student fraternity who work day in day out, pouring out all of their heart into promoting intellectualism and creativity, while also maintaing the brand value of one of the most prestigious institute of the nation, IIT. Anwesha, derived from the Sanskrit word meaning "quest" aims at unbridling the soul of every individual into the quest of finding one's self and reaching to his/her full potential. The latest edition of Anwesha saw a footfall of around ""the number"", of people belonging to a  plethora of sectos such as computer geeks, gaming freaks, technoholics, music maniacs, dance enthusiasts and rock bands hailing from well-known institutes across the country.
					</p>
					<!--
					<p>Tellus erat mauris ipsum fermentum<br />
					etiam vivamus nunc nibh morbi.</p>
					-->
				</header>

				<div class="box alt container">
					<section class="feature left">
						<a class="image icon  fa-retweet"><img src="../assets/images/pic07.jpg" alt="" height="700"/></a>
						<div class="content">
							<h3>What is Campus Ambassador?</h3>
							<p>The Campus Ambassador Program (CA) is one of the leading publicity programs of Anwesha. Campus Ambassadors serve as the face of the one of the biggest cultural festival in North-East India in their college and are expected to increase outreach of the fest through on ground and social media publicity. Exciting prizes up for grab apart from the coveted Certificate and goodies.</p>
						</div>
					</section>
					<section class="feature right">
						<a class="image icon fa-sitemap"><img src="../assets/images/pic07.jpg" alt="" height="700"/></a>
						<div class="content">
							<h3>Why CA?</h3>
							<p> This is an extremely edifying opportunity where one gets to improve their oratory skills and managerial skills by interacting with people and encouraging them to take part in a fest of such huge grandeur. Apart from  being advantageous on both personal and managerial grounds, working as a CA also comes with the additional perks of being conferred with a certificate from Anwesha, IIT Patna validating your work as a campus ambassador. Not to forget are the exhilaratinging prizes and goodies that a CA receives.
   							</p>
						</div>
					</section>
				</div>

				
				<div class="box container blahh">
				    <section>
						<header>
							<h3>CA's Experience</h3>
						</header>
						<blockquote> Anwesha .. whenever I think about it...the word comes in my mind is....#teamwork & path provider of talents..
						Before anwesha...I was just a boy in my college...but when I participated in 2k17 addition..i get a chance to work&perform with super talented guys..  now..it's just because of Anwesha..I am cultural Coordinator of my College..In short it brings ...a revolutionary changes in my life. ..
						Thanks team anwesha<br>-<b>Arya S Prince</b> </blockquote>
						<blockquote> 
						Hello IITP, 
						I remember I went Anwesha when I was in the first year of my college .I was scared but yeah that experience pulled me again and again and Anwesha 2K18 was my third year in a row.And this year was Damn amazing..The theme was magical ..The environment was spellbinding. And Yeah The thing you guys implemented this year this College ambassador thing was really great idea.. I really enjoyed working and sharing the notifications of Anwesha 2k18 In between of those times sometimes I started feeling like I am the part of the Team and yeah It was great being a part of such  great environment and such enthusiastic People.. Anwesha is not just a college fest it feels like it's a Festival that comes every year and we all celebrate it together.. 🖤 <br>-<b>Mridul Choudhary</b> </blockquote>
						<blockquote>As you mentioned Anwesha the biggest techno-cultural fest of north-east India being a campus ambassador for it was an amazing experience.You'll organised the whole function perfectly.I not only enjoyed being working as the campus ambassador but also enjoyed your fest.The participants from my college were also very happy  by your organisation.Hope so continue to work with you'll more as i gained a good experience. Thank you for selecting me as the campus ambassador of my college. <br>-<b>Kamal Kant</b> </blockquote>
					</section>
					<!--<header>
						<h2>Judging criteria:-</h2>
					</header>
					<section>
   
   <h3>Points Criteria: </h3>
   <ul class="default">
   	<li>Online registrations from your referral id - 80 snickles per registration</li>
   	<li>Upgrade profle photo / cover photo on facebook with Anwesha frame #Anwesha_2k18 in caption - 100 galleons per update</li>
   	<li>Sharing posts on facebook with #Anwesha_2k19 in caption - 60 snuckles per share</li>
   	<li>Offline registration from your referral id - 120 galleons per registration</li>
   	<li>Mailer's Forward Screenshot - 60pts per mail</li>
   	<li>Sharing Anwesha posts in Instagram Screenshot - 60pts per share</li>
   	<li>Whatsapp group share Screenshot - 60pts per share</li>
   	<li>Profile photo with Anwesha frame on instagram Screenshot - 100pts per update</li>
   	<li>Profile photo with Anwesha frame on whatsapp Screenshot - 100pts per update</li>
   	<li>Sharing contacts of Student body of your college - 10pts per contact</li>
   	<li>Sharing details of Anwesha in your college's facebook page (if any) and tagging Anwesha (not in a guest post) - 100pts per share</li>
   	<li>Sharing details of Anwesha in your college's whatsapp group (if any) Screenshot - 100pts per share</li>
   </ul>
<h3>Star CAs:</h3>   
     After anwesha is over, the top 10 campus ambassadors of Anwesha will be the 'Star' CAs who will be given various perks along with cerificate which include goodies like brand new earphones
     , anwesha t-shirts, coupons, etc. 
   
   <h3>Gold CAs:</h3>
     Other top 40 CAs will receive Certificate of Campus Ambassador authorised by Anwesha, IIT Patna. 
					-->
					<!-- <section>
						<header><br>
							<h2>Responsibilities of CA</h2>
						</header>
						<ul class="default">

						<li><b>Registration:</b><br>
						   When the registration for Anwesha starts, register yourself as CA and then make other participants from your college register through your referral ID.</li>

						   <li><b>Social Media:</b><br>
						   Share posts, events and updates related info in social media platforms like facebook, twitter, Instagram.</li>

						   <li><b>Participation:</b><br>
						   Ensure keen participation from your college in Anwesha and multi-city auditions.</li>
						</p>
							
						</ul>
					</section> -->
					<!-- <section>
						<header>
							<h2>Benefits of CA::</h2>
						</header>
						<p>
					   Get a certificate of campus ambassador program from Anwesha IIT Patna.<br>
					   Get a chance to click a selfie with the celebrities coming at pro nites.<br>
					   Recieve goodies like anwesha t-shirts, earphones(boat), (other stuff from our sponsors)..</p>
						<hr />
						
					</section> -->
					<section id="leader">
						<header>
							<h2>Leaderboard</h2>
						</header>
						<div class="table-wrapper">
							<table class="default">
								<thead>
									<tr>
										<th>Rank</th>
										<th>Name</th>
										<th>Score</th>
									</tr>
								</thead>
								<tbody id="leaderTable">
									
								</tbody>
							</table>
						</div>
					</section>
					
				</div>
			
<!-- 
				<footer class="major container 75%">
					<h3>Get shady with science</h3>
					<p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus.</p>
					<ul class="actions">
						<li><a href="#" class="button">Join our crew</a></li>
					</ul>
				</footer> -->

			</div>

		<!-- Footer -->
			<div id="footer">
				<div class="container 75%">

					<header class="major last">
						<h2>Sign-Up</h2>
						<center>
							<h2>Step 1</h2>
						<div id="FB-Oauth2">
							 <div class="fb-text">Sign-Up with Facebook</div>
							<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with"  data-auto-logout-link="true" data-use-continue-as="true" data-scope="email,public_profile,user_location,user_likes,user_posts,user_birthday,user_about_me" onlogin="auth_response_change_callback();"></div><!-- <br>
							<a id="test">This this</a> -->
						</div>
						</center>
					</header><div id="message"></div><br>
					<form id="signUp" style="display:none" action="javascript:" method="post" >
					<input type="hidden" name="fbID" />
						<h2>Step 2</h2><br>						
						<div class="row">
							<div class="6u 12u(mobilep)">
								<input type="text" name="name" placeholder="Name" required />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="email" name="email" placeholder="Email" required />
							</div>
						</div>
						<div class="row">
							<div class="6u 12u(mobilep)">
								<input type="text" name="college" placeholder="College"  required />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="text" name="degree" placeholder="Degree"  required  />
							</div>
						</div>
						<div class="row">
							<div class="6u 12u(mobilep)">
								<input type="text" name="graduation" pattern="20[0-9][0-9]" placeholder="Year of Graduation(20XX)" required />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="text" name="city" placeholder="City" required />
							</div>
						</div>
						<div class="row">
							<div class="6u 12u(mobilep)">
								<input type="text" name="mobile" placeholder="Mobile(10 digit)" pattern="(7|8|9)\d{9}" required />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="text" name="DOB" placeholder="Date of Birth(yyyy-mm-dd)"  required />
							</div>
						</div>
						<!-- gender -->
						<div class="12u">Gender:
								<input type="radio" name="gender" value="M">Male
								<input type="radio" name="gender" value="F">Female<br>
						</div>

						<div class="row">
							<div class="12u">
								<textarea name="address" placeholder="Address" required rows="3"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<textarea name="threethings" placeholder="Tell us 3 things you would do as a Campus Ambassador of Anwesha '19." rows="4" required></textarea>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<textarea name="responsibility" placeholder="Have you held any position of responsibility in your college? If yes, please explain." required rows="4"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<textarea name="involvement" placeholder="Have you been a part of one or more previous editions of Anwesha? If yes, please explain." required rows="4"></textarea>
							</div>
						</div>
						
						<!-- <div class="row">
							<div class="12u">
								<input type="text" name="referalcode" placeholder="Optional referal code" />
							</div>
						</div> -->
<div id="message2"></div>
						<div class="row">
							<div class="12u">
								<ul class="actions">
									<img src="/assets/src/loader.gif" alt="" id= "myloader" style="display:none"><br>
									<li><input type="submit" id="submit" value="Submit" /></li>
								</ul>
							</div>
						</div>
					</form>

					<ul class="icons">
						<li><a href="https://www.facebook.com/anwesha.iitpatna/" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://www.instagram.com/anwesha.iitp/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="https://www.youtube.com/user/AnweshaIITP" class="icon fa-youtube"><span class="label">Youtube</span></a></li>
						
						</ul>

					<ul class="copyright">
						<li>Anwesha IIT Patna</li>
					</ul>

				</div>
			</div>
		<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90791019-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-90791019-1');
	</script>
		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>

	</body>
</html>
