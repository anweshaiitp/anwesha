<html>
<head>
		<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- HTTPS required. HTTP will give a 403 forbidden response -->
<script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
	<style type="text/css">

		/*---fonts---*/
		
		body
		{
			margin: 0;
			padding: 0;
			color: black;
		}

		.reg_form
		{
			width: 100%;
			height: auto;
			vertical-align: middle;
			text-align: center;
			color: black;
			margin-top: 5%;
			font-size: 120%;
			background: #ffc123;
		}

		.reg_form input, .reg_form select
		{
			background: none;
			border: none;
			border-bottom: 2px white solid;
			width: 60%;
		}

		.reg_form select
		{
			color: black;
			background: none;
			border: none;
			border-bottom: 2px white solid;
			width: 60%;
		}

		#sub_but
		{
			color: black;
			border-radius: 7px;
			width: 20%;
			height: 40px;
			font-size: 80%;

			background: lightgray;
			border: none;
			border: 2px black solid;
			border-radius: 8px;
			display: block;
			cursor: pointer;
			margin: auto;
		}

		@media screen and (max-width: 500px)
		{
			.reg_form
			{
				
				font-size: 100%;
				
			}
		}

	</style>

</head>
<body>
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
							$("#success").html('<center><b>Registration Successful</b><br>Your Anwesha ID is : ANW'+data[1]['pId']+'<br>A confirmation email has been sent to '+email+'.</center>');
							$("#success").fadeIn();
							// $("#message").css('background','#5FAB22');
							$("#success").css('color','#5FAB22');
							$("input").fadeOut();
							$(".reg_form").fadeOut();
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
					$("#success").html('<center>Logged In!</center>');
					$("#success").fadeIn();
					// $("#message").css('background','#5FAB22');
					$("#message").css('color','#5FAB22');
					$(".login").fadeOut();
					$(".reg_form").fadeOut();
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
				  $("#FB-Oauth").html("Hi! " +response.first_name+" <ul class='actions'><li><a  class='button'>Plese fill missing details:</a></li></ul>");
				  $("#signUp").css("display","block");
		  	  }else if(data[1].pId>1){
		  	  	$(".reg_form").fadeOut();
		  	  	$("#FB-Oauth").html("Hi! " +response.first_name+"<br>Already registered using this FB ID<br>Anwesha ID is :"+data[1].pId);
		  	  	$(".login").html('<img src="images/witch.png"> Hi!'+response.first_name);
		  	  }
			});
			});
			}
	    });
		
	},1000);

	});

</script>
	<div class="register_div">
		<div id="success" style="display: none;">
							
						</div>
						
			<center><div id="FB-Oauth">Sign-Up using FB:<br>
			<div class="fb-login-button" data-max-rows="1" data-size="large" data-button-type="login_with"  data-auto-logout-link="true" data-use-continue-as="true" data-scope="email,public_profile,user_location,user_birthday,user_about_me" onlogin="auth_response_change_callback();"></div></div></center>
		<form class="reg_form" id="regForm">
			<input type="hidden" name="fbID"/>
			
			
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
</body>
</html>
