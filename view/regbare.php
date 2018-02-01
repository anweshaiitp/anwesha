<?php
session_start();
require('model/model.php');
require('dbConnection.php');
require('defines.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="theme-color" content="#2b2b2b">
	<title>Anwesha '18</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://dbushell.com/Pikaday/css/pikaday.css">
	<link rel='stylesheet prefetch' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,700'>
	<link rel="stylesheet" href="/css/form.css">
	<script src="https://sdk.accountkit.com/en_US/sdk.js"></script>
	<style>
		#postajax {
			/* opacity: 0; */
			transition: .8s ease-in-out;
		}
		.inputbox{
			background: #fff;
		/* position: relative; */
		width: 410px;
		padding: 2px 15px 20px 15px;
		box-shadow: 0px 14px 24px 17px rgba(0, 0, 0, 0.38), 0 6px 30px 5px rgba(0, 0, 0, 0.71), 0 8px 10px -5px rgb(0, 0, 0);
		background-color: #00000000;
		color: #ffffff;
		font-size: 20px;
		padding: 20px !important;
		border: solid 1px #FFFFFF;
		border-radius: 5px;
		margin-bottom: 10px;
		transition: .8s box-shadow;
		}
		button.inputbox{
		width: 410px;
			cursor:pointer;
			width: 90%;
    transform: translateX(3%);
		}
		button.inputbox:hover{
		width: 410px;
		box-shadow: 0px 14px 24px 17px rgba(0, 0, 0, 0.38), 0 2px 15px 5px rgba(187, 184, 184, 0.71), 0 8px 10px -5px rgb(0, 0, 0);
			cursor:pointer;
		}
		div.inputbox{
			width: 410px;
			border: none !important;
		}
	</style>
</head>

<body>
	<!-- <center>  <h1 style="opacity:1 !important">Register!</h1></center> -->
	<img src="/images/anwesha.png" style="
    width: 80%;
    position:  fixed;
    left: 50%;
    top: 20px;
    transform: translateX(-50%);
">
	<div id="progress"></div>
	<div id="centerLoader" style="z-index:100;position:absolute;top:60%;left:50%;transform:translateX(-50%);"></div>
	<div class="center">
		<div id="register">

			<i id="progressButton" class="ion-android-arrow-forward next"></i>

			<div id="inputContainer">
				<input id="inputField" required autofocus />
				<label id="inputLabel"></label>
				<div id="inputProgress"></div>
			</div>

		</div>
		
		<br>
		<a style="position:absolute;top:60%;left:50%;transform:translateX(-50%);color:white;" href="http://anwesha.info/reset_resend" target="_blank">Reset Password or Resend confirmation email</a>
	</div>
	<div id="verify" style="display:none;position:absolute;left:50%;top:50%;transform:translate(-50%,-50%)">
		<div id="postajaxmsg" class="inputbox">
		</div>
		<div id="hideOnerr">
		<div class="inputbox"><center> Verify your account:</center></div>
		<input type="hidden" id="phone_number">
		<button onclick="smsLogin();" class="inputbox" >Verify via SMS<br><small>(Recommended)</small></button>
		<div class="inputbox"><center>
		OR</center>
		</div>
		<div id="emailfill" class="inputbox" style="text-align: center;">
		</div>
		</div>


<script>
  // initialize Account Kit with CSRF protection
  AccountKit_OnInteractive = function(){
    AccountKit.init(
      {
        appId:"<?php echo $fbAppID;?>", 
        state:"<?php echo hash("sha256",session_id().$AESKey); ?>", 
        version:"v1.1",
        fbAppEventsEnabled:true,
        redirect:"https://anwesha.info/login/mobconfirm"
      }
    );
  };
function clog(data){
	console.log(data);
	if(typeof(data) == 'string')
		data = jQuery.parseJSON(data);
	if(data.status==200){
		$("#hideOnerr").fadeOut();
		$("#FBerr").fadeOut();
		$("#verify").append('<div class="inputbox" style="color: #19ce7d;text-shadow: #2f95ff 0px 0px 10px;"> '+data.message+'</div>');
	}else{
		$("#verify").append('<div class="inputbox FBerr"> '+data.message+'</div>');
	}
}
  // login callback
  function loginCallback(response) {
	  console.log(response);
    if (response.status === "PARTIALLY_AUTHENTICATED") {
      var code = response.code;
	  var csrf = response.state;
	  $.ajax({
		type: "POST",
		url: "/reg/mobconfirm",
		data: {code:response.code,csrf:response.state},
		success: clog
		});
      // Send code to server to exchange for access token
    }
    else if (response.status === "NOT_AUTHENTICATED") {
	  // handle authentication failure
	  $("#verify").append('<div class="inputbox FBerr"> Verification Interrupted. Please Try Again.</div>');
    }
    else if (response.status === "BAD_PARAMS") {
	  // handle bad parameters
	  $("#verify").append('<div class="inputbox FBerr"> Verification Interrupted. Please Try Again.</div>');
    }
  }

  // phone form submission handler
  function smsLogin() {
    var countryCode = "+91";
    var phoneNumber = document.getElementById("phone_number").value;
    AccountKit.login(
      'PHONE', 
      {countryCode: countryCode, phoneNumber: phoneNumber}, // will use default values if not specified
      loginCallback
    );
  }


  // email form submission handler
//   function emailLogin() {
//     var emailAddress = document.getElementById("email").value;
//     AccountKit.login(
//       'EMAIL',
//       {emailAddress: emailAddress},
//       loginCallback
//     );
//   }
</script>

    

	<script src="https://dbushell.com/Pikaday/pikaday.js"></script>
	<script src="/js/index.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90791019-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-90791019-1');
	</script>



</body>

</html>