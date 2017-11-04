<html>
	<head>
		<title>Anwesha 2018</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="images/logo_favi.png" rel="icon" >

		<meta name="viewport" content="width=device-width, initial-scale= 1">
		<script type="text/javascript" src="js/jquery.js"></script>
		<style>
			#FB-Oauth,#FB-Oauth2{
				padding: 10px;
				    background-color: rgba(98, 153, 193, 0.76);
				    
				    margin: 30px;
				    border-radius: 10px;
				    /*left: 50%;*/
				    /*position: absolute;*/
				    /*transform: translateX(-50%);*/
			}
			@media screen and (min-width: 600px) {
			#FB-Oauth,#FB-Oauth2{
				width: 400px;
			}
		</style>
		<script>
			$(document).ready(function(){
			$("#sub_but").click(function(event){
			//function submitF(){
					// event.preventDefault();
					var name=$("[name='name']").val();
					var email=$("[name='email']").val();
					var college=$("[name='college']").val();
					var fbID=$("[name='fbID']").val();
					var city=$("[name='city']").val();
					var dob=$("[name='DOB']").val();
					var mobile=$("[name='mobile']").val();
					var sex=$("[name='gender']").val();
					var referalcode=$("[name='referalcode']").val();
					console.log("Request Sent");
					$.post("user/register/User/",
						{        						
   						name: name,
   						fbID:fbID,
    					email: email,
    					college: college,
    					city:city,
    					dob:dob,
    					mobile:mobile,
    					sex:sex,
    					referalcode:referalcode
						},
						function(data, status){
    					console.log("Response");
    					console.log("Data: " + data + "\nStatus: " + status);
    					if(status=='success'){//$("#myloader").fadeOut();
    						console.log(data);

    						if(data[0]==1){
    							$("#message").html('<center><b>Registration Successful</b><br>Your Anwesha ID is : ANW'+data[1]['pId']+'<br>A confirmation email has been sent to '+email+'.</center>');
    							$("#message").fadeIn();
    							// $("#message").css('background','#5FAB22');
    							$("#message").css('color','#5FAB22');
    							$("#signUp").fadeOut();
    							$(".register").fadeOut();
    							$(".login").fadeOut();
    						}else{
    							$("#message,#message2").fadeIn();
    							$("#message,#message2").html('<center>Error<br>'+data[1]+'</center>');
							}
//							$('html, body').animate({
//							        scrollTop: $("#header").offset().top
//							    }, 500);
 
    					}else{//$("#myloader").fadeOut();
    							$("#message,#message2").fadeIn();
    							$("#message,#message2").html('An error occured.<br> Please try again.');
    							
							    console.log("Failed "+data);

    						}
			    			});

			});


			$("#login_but").click(function(event){
			//function submitF(){
					// event.preventDefault();
					var username=$("[name='username']").val();
					var password=$("[name='password']").val();
					console.log("Request Sent");
					$.post("user/register/User/",
						{        						
   						password: password,
   						username:username,
						},
						function(data, status){
    					console.log("Response");
    					console.log("Data: " + data + "\nStatus: " + status);
    					if(status=='success'){//$("#myloader").fadeOut();
    						console.log(data);
    						if(data["status"]==200){
    							$("#message").html('<center>Logged In!</center>');
    							$("#message").fadeIn();
    							// $("#message").css('background','#5FAB22');
    							$("#message").css('color','#5FAB22');
    							$(".login").fadeOut();
    							$(".register").fadeOut();
    							$(".login_form").fadeOut();
    						}else{
    							$("#message,#message2").fadeIn();
    							$("#message,#message2").html('<center>Error<br>'+data["msg"]+'</center>');
							}
//							$('html, body').animate({
//							        scrollTop: $("#header").offset().top
//							    }, 500);
 
    					}else{//$("#myloader").fadeOut();
    							$("#message,#message2").fadeIn();
    							$("#message,#message2").html('An error occured.<br> Please try again.');
    							
							    console.log("Failed "+data);

    						}
			    			});

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
	<!-----preloader---------------->
		
		
		<div class="preloader_div">
		</div>

		<script type="text/javascript">
			$('.preloader_div').load("/preloader/");
		</script>


	<!---------header-----bar-->
		<div class="header_div">
			<img id="header_div_bck" src="images/blood.jpg"/>
		
			 <div class="menu_toggle">
				<img src="images/menu_img.png">
				<span> MENU </span>
			</div>
		</div>

	<!--------reg & login------>
		<div class="login_backgrnd"></div>
<<<<<<< HEAD

		<!-- <div class="login">
			<a><img src="images/witch1.png"> Login</a>
		</div> -->

=======
<!-- 
		<div class="login">
			<a><img src="images/witch1.png"> Login</a>
		</div> -->
>>>>>>> 652bd8bb419a81147f214491489d6fe699a6806b

		<div class="register">
			<a><img src="images/witch1.png"> Register</a>
		</div>


		<div class="ca">
			<a href="ca/"><img src="/images/witch1.png"> Campus Ambassador</a>
		</div>


		<script>
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
			    	$.get( "user/CAcheck/" + fbID + "/", function( data ) {
			    	  // var obj = JSON.parse(data);
			    	  console.log(data);
			    	  console.log(data[1]);

			    	// if(data[-1])
			    	//REST call with FB userID fetches if signedu or not.
			    	//If not, then post request to the same for registering and validation.
				FB.api('/me?fields=name,first_name,education,gender,birthday,email,picture.width(500).height(500)', function(response) {
					console.log(response);
			      console.log('Successful login for: ' + response.name);
			      name = response.name;
			      gender = response.gender;
			      email = response.email;
			      DOB = response.birthday;
			      pic = response.picture;
			      //is signed up, display, your ref code is: and listing of users, leaderboard
			      if(name){
				      $("input[name='name']").val(name);
			      	  $("input[name='name']").attr('disabled','true');
			      }
			      if(gender){
	      			var $radios = $('input:radio[name=gender]');
		      		if(gender=='male'){
		      			$radios.filter('[value=M]').prop('checked', true);
		      		} else if(gender=='female') {
		      			$radios.filter('[value=F]').prop('checked', true);

		      		}
			      	  $("input[name='gender']").attr('disabled','true');
			      }
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
			  	  console.log("parse",data[1]);
			  	  console.log('fboatuth',data[1].pId);
			  	  if(data[1].pId<=1){
					  $("#FB-Oauth").html("Hi! " +response.first_name+" <ul class='actions'><li><a href='#signUp' class='button'>Continue to step 2</a></li></ul>");
					  
					  $("#signUp").css("display","block");
			  	  }else if(data[1].pId>1){
			  	  	$("#FB-Oauth").html("Hi! " +response.first_name+"<br>Anwesha ID is :"+data[1].pId);
			  	  	$(".login").html('<img src="images/witch1.png"> Hi!'+response.first_name);
			  	  }
				});
				});
				}
		    });
			
		},1000);
		</script>
		<!-- <div class="login_div">
			<img class="close_div" src="images/close.png"/>
			
			<form class="login_form">
				<img id="login_img" src="images/witch1.png" style="height: 100px" ><br><center>
				<div id="FB-Oauth">
					Login using FB:<br>
				
				<div style="z-index: 10;" class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with"  data-auto-logout-link="true" data-use-continue-as="true" data-scope="email,public_profile,user_location,user_birthday,user_about_me" onlogin="auth_response_change_callback();"></div></div></center>
				<h1>OR</h1>
				<div id="message" style="color:#FF0000"></div>
				<br>
				Anwesha ID
				<br>
				<input type="text" id="login_id" name = "username" placeholder="enter your anwesha id"/>
				<br>
				Password
				<br>
				<input type="password" id="login_pwd"  name = "password" placeholder="enter your password"/>
				<br><br>
				<input id="login_but" type="button" value="login"/>
			</form>
		</div> -->
		
		<div class="register_div">
			<img class="close_div" src="images/close.png"/>
			<form class="reg_form" id="regForm">
				<input type="hidden" name="fbID"/>
				<img id="login_img" src="images/witch1.png" style="height: 100px"><br><center><div id="FB-Oauth">Sign-Up using FB:<br>
				<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with"  data-auto-logout-link="true" data-use-continue-as="true" data-scope="email,public_profile,user_location,user_birthday,user_about_me" onlogin="auth_response_change_callback();"></div></div></center>
				<div id="message" style="color:#FF0000"></div>
				<br>
				Name
				<br>
				<input type="text" name="name" placeholder="Enter Name" />
				<br>
				Contact No
				<br>
				<input type="number" name="mobile" placeholder="Phone Number" />
				
				<br>
				Email
				<br>
				<input type="email" name="email" placeholder="something@else.com" />
				<br>
				Date Of Birth
				<br>
				<input type="date" name="DOB"/>
				<br>
				Sex
				<br>
				<select name="gender"> 
					<option value="choose"></option>
					<option value="M">Male</option>
					<option value="F">Female</option> 
				</select>
				<br>
				College
				<br><input type="text" name="college">
				<br>
				City
				<br>
				<input type="text" name="city">
				<br>Ref Code
				<br>
				<input type="number" name="referalcode">
				<br><br>
				<input id="sub_but" type="button" name="register" value="register"/>
			</form>

		</div>


	<!-----menu----bar------>
		<div class="menu_bar">
			<ul>
				<li><a href="/">Home</a></li>
				<!-- <li><a href="events/">Events</a></li> -->
				<!-- <li class="sch_div">Schedule</li> -->
				<li><a href="/gallery/">Gallery</a></li>
				<li><a href="/team/">Team</a></li>
				<!-- <li class="spons_div">Sponsors</li> -->
				<li class="acco_load">Accomodation</li>
			</ul>
		</div>


	<!-----doors---->

		<div class="menu_backgrnd"></div>
		<div class="door">
			<div class="left_door left_door_anim">
				<img src="images/door_left.png">
				
			</div>

			<div class="right_door right_door_anim">
				<img src="images/door_right.png">
			</div>

		</div>

	<!-----moving ----witch------>
		<img class="moving_witch" src="images/witch_right_1.png">

	<!-----fixed ----cloud------>
		<div class="cloud_div"></div>

	<!-----moving ----cloud------>
		<div class="moving_cloud_div">
			<img src="images/moving_cloud.png">
		</div>

	<!-----moving ----floor------>
		<div class="moving_floor_div">
			<img src="images/floor_back.png">
		</div>

	<!--horizontal---------scrolling div-->

		<div class="horizontal">
	<!----anwehsa--logo-->
			<div class="anwesha_logo">
				<img src="images/logo_favi.png">
			</div>

			<div class="blank_div_thr">
			</div>

			<div class="about_anwesha">
				<p> About Anwesha</p>
				Anwesha is the Annual Techno-Cultural Festival of Indian Institute of Technology Patna. It is a three-day-long event usually held towards the end of January every year. The fest hosts Technical, Cultural, Literary, Eco and Management events. The first edition of Anwesha took place in 2010. It draws a footfall of about 4,500 from more than 140 colleges across the country. Management events such as Stock Mart, B-quiz, Vendre and eco events like Eco-debate, Green quiz give participants ample scope to showcase their talents. Anwesha enjoys a cult status among the youths of Bihar.
			</div>


			<div class="blank_div_fiv">
			</div>

			<div class="anwesha_theme">
				<p>Themed on WitchCraft</p>
				<img src="images/anw_theme.jpg">

			</div>


			<div class="blank_div_fiv">
			</div>

			<div class="about_anwesha">
				<p>Anwesha</p>
				Anwesha is a quest. The annual Techno-Cultural Festival of Indian Institute of Technology Patna hosts Technical, Cultural, Literary, Eco and Management events. Since its genesis in 2010, Anwesha has gained great importance at an exponential rate and enjoys a cult status among the youths of Bihar. Eminent personalities such as chief minister Nitish Kumar, Padma Vibhushan, G. Madhavan Nair, R.K. Sihna (Dolphin Man of India), have been part of Anwesha\'s extravaganza in the past.
			</div>


			<div class="blank_div_fiv">
			</div>

			<div class="anwesha_theme">
				<p>Media Outreach</p>
				<img src="images/media.jpg">

			</div>


			<div class="blank_div_fiv">
			</div>

			<div class="anwesha_theme">
				<p>Social Outreach</p>
				<img src="images/social.jpg">

			</div>

		</div>

	<!---------viewing div on mobile phone---------->
		<div class="mob_div">
			<div class="anwesha_logo">
				<img src="images/logo_favi.png">
			</div>

			<div class="blank_div_thr">
			</div>

			<div class="about_anwesha">
				<p> About Anwesha</p>
				Anwesha is the Annual Techno-Cultural Festival of Indian Institute of Technology Patna. It is a three-day-long event usually held towards the end of January every year. The fest hosts Technical, Cultural, Literary, Eco and Management events. The first edition of Anwesha took place in 2010. It draws a footfall of about 4,500 from more than 140 colleges across the country. Management events such as Stock Mart, B-quiz, Vendre and eco events like Eco-debate, Green quiz give participants ample scope to showcase their talents. Anwesha enjoys a cult status among the youths of Bihar.
			</div>


			<div class="blank_div_fiv">
			</div>

			<div class="anwesha_theme">
				<p>Themed on WitchCraft</p>
				<img src="images/anw_theme.jpg">

			</div>

			<div class="blank_div_fiv">
			</div>

			<div class="about_anwesha">
				<p>Anwesha</p>
				Anwesha is a quest. The annual Techno-Cultural Festival of Indian Institute of Technology Patna hosts Technical, Cultural, Literary, Eco and Management events. Since its genesis in 2010, Anwesha has gained great importance at an exponential rate and enjoys a cult status among the youths of Bihar. Eminent personalities such as chief minister Nitish Kumar, Padma Vibhushan, G. Madhavan Nair, R.K. Sihna (Dolphin Man of India), have been part of Anwesha\'s extravaganza in the past.
			</div>

			<div class="blank_div_fiv">
			</div>

			<div class="anwesha_theme">
				<p>Media Outreach</p>
				<img src="images/media.jpg">

			</div>


			<div class="blank_div_fiv">
			</div>

			<div class="anwesha_theme">
				<p>Social Outreach</p>
				<img src="images/social.jpg">

			</div>


		</div>

	<!---ajax loader---->

		<div class="ajax_loading_bckgrnd">
			<div class="ajax_back"></div>
		</div>

		<div class="ajax_loading_div ajax_loading_entry">
			<img class="ajax_pin" src="images/dragon.png"/>
			<img class="close_icon" src="images/close.png"/>
			<img class="ajax_div_back" src="images/ajax_div_back.png"/>
			<div class="ajax_content"></div>
		</div>



	<!---footer---->
		<p id="copyright">&copy 2018 Anwesha, IIT Patna </p>


<!--scripts-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery.mousewheel.js"></script>

	<!--scripts for index---->
		<script type="text/javascript">

	//disapiaring of preloader
			$(window).on('load',function()
			{
				$('.preloader_div').addClass('preloader_div_anim').delay(3000).fadeOut(10);
			});


	//--horizontal----------- scrolling-->
			$(document).ready(function() {
			    $('body, html, *').mousewheel(function(e, delta) {
			        // multiplying by 40 is the sensitivity, 
			        // increase to scroll faster.
			        this.scrollLeft -= (delta * 80);
			        e.preventDefault();
			    });

			});

	//-----menu toggle
			$('.menu_toggle img').on("click",function()
			{
				span_text=$('.menu_toggle span').text();
				if(span_text == "EXIT")
				{
					$('.left_door').addClass('left_door_anim');
					$('.right_door').addClass('right_door_anim');
					$('.menu_toggle span').text('MENU');
					$('.menu_toggle img').attr('src', 'images/menu_img.png');
					$('.menu_backgrnd').fadeOut(800);
					$('.menu_bar').slideUp(800);
				}
				else
				{
					$('.left_door').removeClass('left_door_anim');
					$('.right_door').removeClass('right_door_anim');
					$('.menu_toggle span').text('EXIT').fadeIn(800);
					$('.menu_toggle img').attr('src', 'images/menu_img_close.png');
					$('.menu_backgrnd').fadeIn(800);
					$('.menu_bar').slideDown(800);
				}
			});

	//menu bar item css
			var new_li= $('.menu_bar li').first();
			new_li.addClass('first_rot');
			var new_li= new_li.next().next();
			new_li.addClass('first_rot');
			var new_li= new_li.next().next();
			new_li.addClass('secnd_rot');
			var new_li= new_li.next().next().next();
			new_li.addClass('secnd_rot');
			
	//witch resting
			witch_attr = $('.moving_witch').attr('src');

			$.fn.witch_motion_start = function()
				{ 
		       		witch_motion= setInterval(function()
						{ 
							if(witch_attr=="images/witch_right_1.png")
							{
								$('.moving_witch').attr('src', 'images/witch_right_2.png');
								witch_attr = "images/witch_right_2.png";
							}
							else if(witch_attr=="images/witch_right_2.png")
							{
								$('.moving_witch').attr('src', 'images/witch_right_1.png');
								witch_attr = "images/witch_right_1.png";
							}

						}, 800);
			    }

			$.fn.witch_motion_stop = function()
			{ 
				clearInterval(witch_motion);  
			}

			$.fn.witch_motion_start();

	//witch direction on scroll
 			scroll_posn = $(document).scrollLeft();

			$(document).on("scroll",function()
			{
				var scroll_posn_new = $(document).scrollLeft();
				if(scroll_posn_new >= scroll_posn )
				{

					$('.moving_witch').css('left', '45%');
					
					witch_dirc = $('.moving_witch').css('transform');
					//alert(witch_dirc);
					if(witch_dirc == "matrix3d(-1, 0, -1.22465e-16, 0, 0, 1, 0, 0, 1.22465e-16, 0, -1, 0, 0, 0, 0, 1)")
					{
						$('.moving_witch').css('transform', 'rotateY(360deg)');
					}

					scroll_posn =scroll_posn_new;
				}
				else if(scroll_posn_new < scroll_posn )
				{
					$('.moving_witch').css('left', '35%');
					//$.fn.witch_motion_stop();
					scroll_posn =scroll_posn_new;
					$('.moving_witch').css('transform', 'rotateY(180deg)');
				}
				else
				{
					$('.moving_witch').css('left', '40%');
				}
				
			});

	//cloud motion
			$(document).scroll(function()
			{
				var window_pos = $(this).scrollLeft();
				//alert(window_pos);
				$('.moving_cloud_div img').css('left', -(window_pos * .05) + 'px');
			});

	//floor motion
			$(document).scroll(function()
			{
				var window_pos = $(this).scrollLeft();
				//alert(window_pos);
				$('.moving_floor_div img').css('left', -(window_pos * .4) + 'px');
			});

	/*cloud background changing on scroll
			// $(document).scroll(function()
			// {
			// 	var pos = $('.anwesha_theme').offset().left;
			// 	console.log(pos);

			// 	if(scroll_posn >2054.4375)
			// 	{
			// 		$('.cloud_div').css('background-image', 'url(images/cloud2.jpg)');
			// 	}
			// 	else if(scroll_posn <2054.4375)
			// 	{
			// 		$('.cloud_div').css('background-image', 'url(images/cloud.jpg)');
			// 	}
			// });--*/

	//mob scroll
			mob_scroll_posn = $('.mob_div').scrollTop();

			$('.mob_div').scroll(function()
			{
				var mob_pos = $(this).scrollTop();

			//cloud motion and floor motion
				$('.moving_cloud_div img').css('left', -(mob_pos * .05) + 'px');
				$('.moving_floor_div img').css('left', -(mob_pos * .4) + 'px');


			//witch motion direction
				mob_scroll_posn_new = $('.mob_div').scrollTop();

				if(mob_scroll_posn_new >= mob_scroll_posn )
				{

					$('.moving_witch').css('left', '45%');
					
					witch_dirc = $('.moving_witch').css('transform');
					
					if(witch_dirc == "matrix3d(-1, 0, -1.22465e-16, 0, 0, 1, 0, 0, 1.22465e-16, 0, -1, 0, 0, 0, 0, 1)")
					{
						$('.moving_witch').css('transform', 'rotateY(360deg)');
					}

					mob_scroll_posn =mob_scroll_posn_new;
				}
				else if(mob_scroll_posn_new < mob_scroll_posn )
				{
					$('.moving_witch').css('left', '35%');

					$('.moving_witch').css('transform', 'rotateY(180deg)');

					mob_scroll_posn =mob_scroll_posn_new;
				}
				else
				{
					$('.moving_witch').css('left', '40%');
				}


			});

	//ajax on menu items
			$('.close_icon').click(function()
			{
				$('.ajax_loading_bckgrnd').fadeOut(800);
				$('.ajax_loading_div').addClass('ajax_loading_entry');
			});


			$('.spons_div').click(function()
			{
				$('.ajax_loading_bckgrnd').fadeIn(800);
				$('.ajax_loading_div').removeClass('ajax_loading_entry');
			});

			$('.sch_div').click(function()
			{
				$('.ajax_loading_bckgrnd').fadeIn(800);
				$('.ajax_loading_div').removeClass('ajax_loading_entry');
			});

			$('.acco_load').click(function()
			{
				$('.ajax_loading_bckgrnd').fadeIn(800);
				$('.ajax_loading_div').removeClass('ajax_loading_entry');
			});
			
		</script>
		
		<script type="text/javascript" src="js/ajax.js"></script>

	</body>
</html>
