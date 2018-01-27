<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Anwesha '18</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://dbushell.com/Pikaday/css/pikaday.css">
	<link rel='stylesheet prefetch' href='https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,700'>
	<!-- <link rel="stylesheet" href="/css/form.css"> -->
	<style>
		#postajax {
			/* opacity: 0; */
			transition: .8s ease-in-out;
		}
        *{
            font-family: 'Roboto', sans-serif;
        }
        body{
            margin: 0;
            background: #10131d;
        }
        .wh{
            color: #FFFFFF;
            background: #10131d;
        }
	</style>
</head>

<body>
	<!-- <center>  <h1 style="opacity:1 !important">Register!</h1></center> -->
	<div id="progress"></div>
	<div class="center">
		<div id="register" style="position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);">

			<!-- <i id="progressButton" class="ion-android-arrow-forward next"></i> -->
        <h1 class="wh">Reset password or resend confirmation email</h1>
			<div id="inputContainer">

                <h4 class="wh">Your emailID used for registration:</h4>
                <form id="actionform">
                <input class="wh" id="inputField" type="email" placeholder="email-ID" required autofocus style="font-size: 30px;" />
                
                </form>
                <h4 class="" id="err" style="color:#ff0000"></h4>
                <button class="wh sub" id="" onclick="subm('reset')" data-action="reset" style="font-size: 30px;"  >Reset</button>
                <button class="wh sub" onclick="subm('resend')" data-action="resend" style="font-size: 30px;"  >Resend email</button>
			</div>

		</div>
	</div>



    
    <script>
            function validateEmail(email) {
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
            }
            function subm(act){
// e.preventDefault();
// console.log()
                if(!validateEmail($("#inputField").val())){
                    $("#err").text("Invalid email.");
                }else{
                    $.get( "/"+act+"/"+$("#inputField").val(), function( data ) {
                    console.log(JSON.parse(data));
                    if(JSON.parse(data)[1].substring(0,6)=='Please'){
                        $("#err").css("color","#00ff00");
                    }
                    $("#err").text(JSON.parse(data)[1]);
                    // alert( "Data recieved." );
                    });
                }
            }
           
    </script>
	<!-- <script src="/js/resetresend.js"></script> -->
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