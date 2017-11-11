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
			  	  	$(".login").html('<img src="images/witch.png"> Hi!'+response.first_name);
			  	  }
				});
				});
				}
		    });
			
		},1000);
		</script>
	