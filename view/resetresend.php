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
            background: #252846;
        }
        .wh{
            color: #FFFFFF;
            /* background: #10131d; */
        }
        .inputbox{
			background: #fff;
		/* position: relative; */
		/* width: 410px; */
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
		/* width: 410px; */
			cursor:pointer;
		}
		button.inputbox:hover{
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
	<div id="progress"></div>
	<div class="center">
		<div id="register" style="position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);">

			<!-- <i id="progressButton" class="ion-android-arrow-forward next"></i> -->
            
        <h1 class="wh">Reset password or resend confirmation email</h1>
        <h2 class="wh">If you didn't get the email, check your spam folder first.</h2>
			<div id="inputContainer">

                <h4 class="wh">Your emailID used for registration:</h4>
                <form id="actionform">
                <input class="wh inputbox" id="inputField" type="email" placeholder="email-ID" required autofocus style="font-size: 30px;" />
                
                </form>
                <h4 class="inputbox" id="err" style="display:none;color:#ff0000"></h4>
                <button class="wh sub inputbox" id="" onclick="subm('reset')" data-action="reset" style="font-size: 30px;"  >Reset</button>
                <button class="wh sub inputbox" onclick="subm('resend')" data-action="resend" style="font-size: 30px;"  >Resend email</button>
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
                    $("#err").fadeIn();
                    $("#err").text("Invalid email.");
                }else{
                    $.get( "/"+act+"/"+$("#inputField").val(), function( data ) {
                        var tmpdat = data;
                        try {
                            data = JSON.parse(data);
                        } catch (e) {
                            data = tmpdat;
                        }
                    console.log(data);
                    if(data[1].substring(0,6)=='Please'){
                        $("#err").fadeIn();
                        $("#err").css("color","#00ff00");
                    }
                    $("#err").fadeIn();
                    $("#err").text(data[1]);
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