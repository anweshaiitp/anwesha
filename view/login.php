<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Anwesha Login</title>
	<style type="text/css">
		@font-face
		{
			font-family: main_font;
			src: url(../css/calibri.ttf);
		}
	
		body
		{	
			padding: 5px;
			font-family: main_font;
			text-align: center;
		}
		.login_div,.logout_div{
			display:none;
		}
		.login_div input
		{
			width: 250px;
			height: 35px;
			padding: 5px;
		}

		#logout2,.login_div button,.logout_div button
		{
			padding:0;
			margin: 0;
			border: none;
			padding: 10px;
			margin: 4px;
			background: #000000;
			box-shadow: #FFFFFF 0px 0px 10px inset;
			border: solid 2px #FFFFFF;
			border-radius: 10px;
			padding-left: 30px; 
			padding-right:  30px; 
			/*background-image: linear-gradient(to top, #23919275 0%, #33086763 100%);*/
			color: lightgrey;
			font-size: 110%;
			/*border-radius: 3px;*/
			/*box-shadow: 0px 0px 5px black;*/
			cursor: pointer;
			transition: box-shadow .2s;
		}
		.login_div button:hover
		{
			box-shadow: #FFFFFF 0px 0px 20px inset;
		}
		.inp{
			background-color: #00000000;
			color:#ffffff;
			font-size: 20px;
			padding: 20px !important;
			border: solid 1px #FFFFFF;
			border-radius: 5px;
			margin-bottom: 10px;
		}
		input:-webkit-autofill {
		    background: #000000 !important;
		    background-color: #000000 !important;
		}
		
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body >
	<br><br><br><br><br>

	<div class="login_div">
		<h1 style="color:#FFF">Login</h1>
		<div id="Lformarea">
		<input type="text" class="inp" name = "username" placeholder="Anwesha ID - ANW1234" autocomplete="off">
		<br><br>

		<input type="password"  class="inp" name = "password" placeholder="Password" autocomplete="off">
		<br>
		<button id="login">Login</button>
	</div>
	
	</div>
	<button id="logout2" style="display:none">LogOut</button>
	<div class="logout_div">
		<h1 style="color:#FFF">Already loggedIn</h1>
		<br>
		<button id="logout">LogOut</button>
		
	</div>
	<h1 style="color:#ff0000">
		<div id="err">
			
		</div></h1><h1 style="color:#00ff00">
		<div id="success">
			
		</div></h1>
		<a style="position:absolute;left:50%;transform:translateX(-50%);color:white;" href="http://anwesha.info/reset_resend" target="_blank">Reset Password or Resend confirmation email</a>
	<script>
			$("document").ready(function(){
				<?php session_start();
				 if (isset($_SESSION['userID'])){
					 echo "$('.logout_div').fadeIn();";
					 }else{
						echo "$('.login_div').fadeIn();";} 
				?>
				$("#login").click(function(){
					$("#err").hide();
					$("#success").hide();
					console.log('clicked');
				$.post("/login/",
					{        						
						password: $("[name='password']").val(),
						username:$("[name='username']").val()
					},
					function(data, status){
					console.log("Response");
					console.log("Data: " + data + "\nStatus: " + status);
					if(status=='success'){//$("#myloader").fadeOut();
						console.log(data);
						if(data["status"]==200){
							$("#success").html('Logged In!<br>');
							$("#success").fadeIn();
							// $("#message").css('background','#5FAB22');
							$(".Lformarea").fadeOut();
							$(".login_div").fadeOut();
							$("#logout2").fadeIn();
							// $(".login_div").fadeOut();
							$(".loader").fadeOut();
						}else{
							$("#err").fadeIn();
							$("#err").html('<center>Error<br>'+data["msg"]+'</center>');
						}
					}else{//$("#myloader").fadeOut();
							$("#err").fadeIn();
							$("#err").html('An error occured.<br> Please try again.');
						    console.log("Failed "+data);

						}
						});
				});
				$("#logout,#logout2").click(function(){
					console.log("clicked")
					$.get( "/logout/", function( data ) {
						console.log("dat",data.msg);
						$( "#success" ).fadeIn();
						$(".logout_div").fadeOut();
						$("#logout2").fadeOut();
						$(".login_div").fadeIn();
					$( "#success" ).html( jQuery.parseJSON( data ).msg );
					});
					
				})
			});
		</script>
</body>
</html>