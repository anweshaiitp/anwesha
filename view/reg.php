<html>
	<head>
		<!--SEO-->
		<meta name="Title" content="Anwesha 2019 IIT Patna">
		<meta name="Keywords" content="Anwesha, Anwesha, Anwesha, IIT, IIT Patna, IIT P , IITP, Anwesha Fest, fest, cult, cultural">
		<meta name="Description" content="ANWESHA is a quest. The annual Techno-Cultural Festival of Indian Institute of Technology Patna hosts Technical, Cultural, Management, Arts and Welfare ...">
		<meta name="Subject" content="Anwesha IITP">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="assets/css/mobile.css" media="only screen and (max-width: 960px)">
		<link rel="stylesheet" href="assets/css/desktop.css" media="only screen and (min-width: 960px)">
		<meta name="theme-color" content="#496495">
		<meta charset="UTF-8">
		<script src="assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="assets/js/particles_conf.js" type="text/javascript"></script>
		<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.js" rel="stylesheet">
		
		<title>Anwesha '19</title>
		<script>
			function preloadImage(imageurl)
			{
				var img=new Image();
				img.src=imageurl;
			}
		</script>
		<meta property="og:image" content="images/preview.png">
		<link rel="shortcut icon" href="favicon.ico">
		<style type="text/css">
			/* 3D Button */
			.btn-3d {
				position: fixed;
				/*top:30px;*/
				left:20px;
				display: inline-block;
				font-family: 'Ubuntu', sans-serif;
				font-size: 18px;
				text-decoration: none;
				padding: 10px 30px;
				color: white;
				/*margin: 10px 10px 10px;*/
				border-radius: 6px;
				text-align: center;
				transition: top .01s linear;
				text-shadow: 0 1px 0 rgba(0,0,0,0.15);
			}
			.btn-3d.red:hover    {background-color: #e74c3c;}
			.btn-3d.blue:hover   {background-color: #699DD1;}
			.btn-3d.green:hover  {background-color: #80C49D;}
			.btn-3d.purple:hover {background-color: #D19ECB;}
			.btn-3d.yellow:hover {background-color: #F0D264;}
			.btn-3d.cyan:hover   {background-color: #82D1E3;}

			.btn-3d:active {
				top: 20px;
			}

			/* 3D button colors */
			.btn-3d.red {
				background-color: #e74c3c;
				box-shadow: 0 0 0 1px #c63702 inset,
			        0 0 0 2px rgba(255,255,255,0.15) inset,
			        0 8px 0 0 #C24032,
			        0 8px 0 1px rgba(0,0,0,0.4),
							0 8px 8px 1px rgba(0,0,0,0.5);
			}
			.btn-3d.red:active {
				box-shadow: 0 0 0 1px #c63702 inset,
							0 0 0 2px rgba(255,255,255,0.15) inset,
							0 0 0 1px rgba(0,0,0,0.4);
			}

			.btn-3d.blue {
				background-color: #6DA2D9;
				box-shadow: 0 0 0 1px #6698cb inset,
							0 0 0 2px rgba(255,255,255,0.15) inset,
							0 8px 0 0 rgba(110, 164, 219, .7),
							0 8px 0 1px rgba(0,0,0,.4),
							0 8px 8px 1px rgba(0,0,0,0.5);
			}
			.btn-3d.blue:active {
				box-shadow: 0 0 0 1px #6191C2 inset,
							0 0 0 2px rgba(255,255,255,0.15) inset,
							0 0 0 1px rgba(0,0,0,0.4);
			}

			.btn-3d.green {
				background-color: #82c8a0;
				box-shadow: 0 0 0 1px #82c8a0 inset,
							0 0 0 2px rgba(255,255,255,0.15) inset,
							0 8px 0 0 rgba(126, 194, 155, .7),
							0 8px 0 1px rgba(0,0,0,.4),
							0 8px 8px 1px rgba(0,0,0,0.5);
			}
			.btn-3d.green:active {
				box-shadow: 0 0 0 1px #82c8a0 inset,
							0 0 0 2px rgba(255,255,255,0.15) inset,
							0 0 0 1px rgba(0,0,0,0.4);
			}

			.btn-3d.purple {
				background-color: #cb99c5;
				box-shadow: 0 0 0 1px #cb99c5 inset,
							0 0 0 2px rgba(255,255,255,0.15) inset,
							0 8px 0 0 rgba(189, 142, 183, .7),
							0 8px 0 1px rgba(0,0,0,.4),
							0 8px 8px 1px rgba(0,0,0,0.5);
			}
			.btn-3d.purple:active {
				box-shadow: 0 0 0 1px #cb99c5 inset,
							0 0 0 2px rgba(255,255,255,0.15) inset,
							0 0 0 1px rgba(0,0,0,0.4);
			}

			.btn-3d.cyan {
				background-color: #7fccde;
				box-shadow: 0 0 0 1px #7fccde inset,
							0 0 0 2px rgba(255,255,255,0.15) inset,
							0 8px 0 0 rgba(102, 164, 178, .6),
							0 8px 0 1px rgba(0,0,0,.4),
							0 8px 8px 1px rgba(0,0,0,0.5);
			}
			.btn-3d.cyan:active {
				box-shadow: 0 0 0 1px #7fccde inset,
							0 0 0 2px rgba(255,255,255,0.15) inset,
							0 0 0 1px rgba(0,0,0,0.4);
			}


			.bloc-logo {
			    position: relative;
			    width: 130px;
			    height: 49px;
			    float: left;
			}

			.bloc-logo canvas,
			.bloc-logo .logo-mask {
				height: 100%;
				width: 100%;
			    display: block;
			    width: 130px;
			    height: 49px;
			}

			.bloc-logo .logo-mask {
			    position: absolute;
			    top: 0;
			    left: 0;
			    background-size: 130px;
			    /*background-image: url("images/logo2.png");*/
			    text-indent: -9999px;
			}
			#logo-canvas{
				width: 100%;
				height: 100%;
				left: 0;
				top: 0;
				position: fixed;

			}
			.logo-mask{
				width: 100%;
				height: 100%;

			}

			#particles-js {
			  position: fixed;
			  width: 100%;
			  height: 100%;
			  top: 0;
			  left: 0;
			  background-image: url("");
			  background-repeat: no-repeat;
			  background-size: cover;
			  background-position: 50% 50%;
			}
			/*#granim-canvas{
				position: fixed;
				top: 0;
				left:0;
				width: 100%;
				height: 100%;
				
			    background-position-x: 50%;
			}*/
			/*REG PAGE*/
			#center-container{
				position: absolute;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				height: 700px;
				width: 500px;
			}
			#anwLogo{
					position: absolute;
			    background-image: url("images/logo2.png");
				top:0;
				height: 500px;
				width: 500px;
				background-size: contain;
			}
			/**/
			@import url('https://fonts.googleapis.com/css?family=Montserrat');

			.title {
				position: absolute;
				bottom: 0;
				z-index: 2;
				font-family: 'Ubuntu', sans-serif;
				text-align: center;
				color: #FFF;
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: center;
				/*height: 100vh;*/
				letter-spacing: 1px;
			}
		
			h1 {
				background-image: url(https://media.giphy.com/media/26BROrSHlmyzzHf3i/giphy.gif);
				background-size: cover;
				color: transparent;
				-moz-background-clip: text;
				-webkit-background-clip: text;
				text-transform: uppercase;
				font-size: 100px;
				line-height: .75;
				/*text-shadow: 2px 2px 2px #000000;*/
				margin: 10px 0;
			}
			#ca:target{
				display: block;
				opacity: 1;
		    background-color: rgba(0,0,0,0.9);
		    color: #FFFFFF;
		    font-size: 20px;
		    text-align: center;
		    font-family: bebas;
		    border-radius: 10px;
		    box-shadow: 0 0 30px black;
		    -webkit-animation: caEnter 1000ms cubic-bezier(0.815, 0.185, 0.215, 1); /* older webkit */
				-webkit-animation: caEnter 1000ms cubic-bezier(0.815, 0.185, 0.215, 1.400); 
				   -moz-animation: caEnter 1000ms cubic-bezier(0.815, 0.185, 0.215, 1.400); 
				     -o-animation: caEnter 1000ms cubic-bezier(0.815, 0.185, 0.215, 1.400); 
				        animation: caEnter 1000ms cubic-bezier(0.815, 0.185, 0.215, 1.400); /* custom */

				-webkit-animation-timing-function: cubic-bezier(0.815, 0.185, 0.215, 1); /* older webkit */
				-webkit-animation-timing-function: cubic-bezier(0.815, 0.185, 0.215, 1.400); 
				   -moz-animation-timing-function: cubic-bezier(0.815, 0.185, 0.215, 1.400); 
				     -o-animation-timing-function: cubic-bezier(0.815, 0.185, 0.215, 1.400); 
				        animation-timing-function: cubic-bezier(0.815, 0.185, 0.215, 1.400); /* custom */
			}
			@-webkit-keyframes caEnter {
			  0% {  opacity: 0;top:-20%; }
			  100% { opacity: 1;top:50%; }
			}
			@-moz-keyframes caEnter {
			  0% {  opacity: 0;top:-20%; }
			  100% {  opacity: 1;top:50%; }
			}
			@-o-keyframes caEnter {
			  0% {  opacity: 0;top:-20%; }
			  100% {  opacity: 1;top:50%; }
			}
			@-ms-keyframes caEnter {
			  0% {  opacity: 0;top:-20%; }
			  100% {  opacity: 1;top:50%; }
			}
			@keyframes caEnter {
			  0% {  opacity: 0;top:-20%; }
			  100% {  opacity: 1;top:50%; }
			}
			#ca{
				position: fixed;
				/*opacity: 0;*/
				display: none;
				top: 50%;
				left: 50%;
				transform: translate(-50%, -50%);
				width: 50%;
				height: 50%;
				background-color: rgba(0,0,0,0);
				border-radius: 30px;
			}
			#shadow{
				display: none;
				background-color: rgba(0,0,0,0);

			}
			.back{
		    -webkit-animation: backG 500ms cubic-bezier(0.815, 0.185, 0.215, 1); /* older webkit */
			-webkit-animation: backG 500ms cubic-bezier(0.815, 0.185, 0.215, 1.400); 
			   -moz-animation: backG 500ms cubic-bezier(0.815, 0.185, 0.215, 1.400); 
			     -o-animation: backG 500ms cubic-bezier(0.815, 0.185, 0.215, 1.400); 
			        animation: backG 500ms cubic-bezier(0.815, 0.185, 0.215, 1.400); /* custom */
				opacity: 0.5;
			}
			@-webkit-keyframes backG {
			  0% { opacity: 1;  }
			  100% { opacity: 0.5; }
			}
			@-moz-keyframes backG {
			  0% {  opacity: 1; }
			  100% {  opacity: 0.5; }
			}
			@-o-keyframes backG {
			  0% {  opacity: 1; }
			  100% {  opacity: 0.5; }
			}
			@-ms-keyframes backG {
			  0% {  opacity: 1; }
			  100% {  opacity: 0.5; }
			}
			@keyframes backG {
			  0% {  opacity: 1; }
			  100% {  opacity: 0.5; }
			}

			.btf{
		    -webkit-animation: RbackG 500ms cubic-bezier(0.815, 0.185, 0.215, 1); /* older webkit */
			-webkit-animation: RbackG 500ms cubic-bezier(0.815, 0.185, 0.215, 1.400); 
			   -moz-animation: RbackG 500ms cubic-bezier(0.815, 0.185, 0.215, 1.400); 
			     -o-animation: RbackG 500ms cubic-bezier(0.815, 0.185, 0.215, 1.400); 
			        animation: RbackG 500ms cubic-bezier(0.815, 0.185, 0.215, 1.400); /* custom */
				opacity: 1;
			}
			@-webkit-keyframes RbackG {
			  0% { opacity: 0.5;  }
			  100% { opacity: 1; }
			}
			@-moz-keyframes RbackG {
			  0% {  opacity: 0.5; }
			  100% {  opacity: 1; }
			}
			@-o-keyframes RbackG {
			  0% {  opacity: 0.5; }
			  100% {  opacity: 1; }
			}
			@-ms-keyframes RbackG {
			  0% {  opacity: 0.5; }
			  100% {  opacity: 1; }
			}
			@keyframes RbackG {
			  0% {  opacity: 0.5; }
			  100% {  opacity: 1; }
			}
			@media screen and (max-width: 600px) {
		    .title{
		    	width:100%;
		    }
		    h1{
		    	font-size: 50px !important;
		    	background-size: 80% !important;
		    	background-position: center;
		    	background-repeat: no-repeat;
		    }
			}
		</style>
		<script type="text/javascript" src="https://sarcadass.github.io/granim.js/assets/js/vendor/granim.min.js"></script>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
		<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="assets/js/cubeTransition.js"></script>
		<script>
		$(document).ready(function(){
			var lightbox=0;
			if(window.location.hash=="#ca"){
				lightbox=1;
				$(".bloc-logo,#logo-canvas,.logo-mask,#particles-js,#center-container").addClass("back");
			}
		  $("#particles-js,#anwLogo").click(function () {
		  	if(lightbox==1){
		  		lightbox=0;
		  		$(".bloc-logo,#logo-canvas,.logo-mask,#particles-js,#center-container").removeClass("back");
		  		$(".bloc-logo,#logo-canvas,.logo-mask,#particles-js,#center-container").removeClass("btf");
		  		$("#ca").fadeOut();
		  	}
		  })
		});
		</script>

		<!-- styling for the registration div -->
		<style type="text/css">
            body{
                    background: url(/assets/img/bgregister.jpg) no-repeat;
                    background-attachment: fixed;
                    background-size: 100% 100%;
                    background-position: top;
                }
            @font-face{
                font-family: regfont;
                src: url(/assets/fonts/LemonMilk.otf);
            }
            @media(max-width:532px){
                body{
                    background: url(https://images5.alphacoders.com/533/533971.jpg) no-repeat;
                    background-attachment: fixed;
                    background-size: auto 130%;
                    background-position: center;
                }
            }
            .logohome{
                position: fixed;
                z-index: 9999;
                top: 0;
                left: 0;
            }
			.reg_form_div
			{
                width: 80%;
                margin: auto;
				height: auto;
				z-index: 500;
				position: absolute;
				top:0;
				left: 0;
				right: 0;
				padding: 2%;	
                padding-top: 0;
				font-family: Ubuntu;
			}
			.reg_logo
			{
				max-width: 25%;
				display: block;
				margin: auto;
			}
            
			.reg_text
			{
				margin: 0 18%;
				text-align: center;
				font-size: 150%;
				background: rgba(255,255,255,.8);
				border-radius: 5px;
				padding: .6%;
				box-shadow: 3px 3px 20px black;
                font-family: regfont;
                color: #03a9f4;
			}
            @media(max-width:900px)
            {
                .reg_text
                {
                    margin: 0 11%;
                }
            }
            
            
			#FB-Oauth,#FB-Oauth2{
                padding: 10px;
                    background-color: rgba(98, 153, 193, 0.76);
                    margin: 10px 0;
                    border-radius: 10px;
            }
            #FB_Oauth{
                margin: 0;
            }
			


			.reg_form input, .reg_form select
			{
                outline: none;
				background: none;
				border: none;
				border-bottom: 2px black solid;
				width: 280px;
				height: 30px;
				vertical-align: middle;
			}

			#sub_but
			{
				background: lightgray;
				border: none;
				border: 2px black solid;
				border-radius: 8px;
				width: 100px;
				height: 35px;
				vertical-align: middle;
				margin: auto;
				display: block;
				box-shadow: 2px 2px 10px black;
				cursor: pointer;
                line-height: 10px;
			}
            #sub_but:hover
			{
				background: #03a9f4;
                color: #fff;
			}
            #home{
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0px;
                height: 50px;
            }
            #home h5{
                display: inline;
                text-align: center;
                font-size: 18px;
                background: rgba(255,255,255,.7);
                border-radius: 5px;
            }
            #home h5 a{ 
                text-decoration: none;
                color: #03a9f4;
                padding: 5px;
            }

		</style>

        
        <style>
            @font-face{
                font-family: regfont;
                src: url(/assets/fonts/LemonMilk.otf);
            }
            body{
                margin: 0;
                padding: 0;
                font-family: sans-serif;
            }
            .wrapper{
                box-sizing: border-box;
                max-width: 600px;
                margin: 20px auto;
            }
            @media(max-width: 450px){
                
            .wrapper{
                margin: 20px 0;
            }
            }
            .box{
                background: rgba(255,255,255,0.87);
                padding: 30px;
                box-sizing: border-box;
                box-shadow: 2px 2px 10px black;
                border-radius: 10px;
            }
            .box .inputbox{
                position: relative;
                margin: 20px 0;
            }
            .box .inputbox input{
                width: 100%;
                padding: 10px 0;
                margin-bottom: 10px;
                font-size: 16px;
                color: #03a9f4;
                background: transparent;
                border: none;
                outline: none;
                border-bottom: 2px solid #03a9f4;
                letter-spacing: 1px;
            }
            
            .box select{
                width: 100%;
                margin-bottom: 20px;
                font-size: 16px;
                color: #000;
                background: transparent;
                border: none;
                outline: none;
                border-bottom: 2px solid #03a9f4;
                letter-spacing: 1px;
            }
            .box .inputbox label{
                position: absolute;
                top: -24px;
                left: 0;
                padding: 10px 0;
                font-size: 16px;
                color: #000;
                pointer-events: none;
                transition: .5s;
            }
            .reset-password{
                text-align: center;
            }
            .reset-password a{
                text-decoration: none;
                color: #03a9f4;
            }
            .reset-password a:hover{
                text-decoration: underline;
            }
            .referral-code-span{
                font-size:.7em
            }
            @media(max-width:346px){
                .referral-code-span{
                    font-size:.5em;
                }
            }
            .form_div{
                background: rgba(255,255,255,.8);
                border-radius: 10px;
                color: #03a9f4;
            }
        </style>
	</head>
	<body>
        <div class="logohome"><a href="/"><img src="/assets/img/logo_favi.png" width="80px"></a></div>
			<div class="bloc-logo">
			    <canvas id="logo-canvas" width="730" height="675"></canvas>
			    <a href="index.html" class="logo-mask">Granim.js</a>
			</div>
			<canvas id="granim-canvas"></canvas>
			<div id="particles-js">
				<canvas class="particles-js-canvas-el" width="730" height="675" style="width: 100%; height: 100%;"></canvas>
			</div>
			
			<div class="reg_form_div">
                <div id="home"><h5><a href="https://www.anwesha.info/">Back To Home</a></h5></div>
				<div class="reg_text">
                    Registration
				</div>
				<br>
				<div id="fb-root"></div>
					<!-- FB Oauth -->
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=1088640574599664";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, 'script','email', 'facebook-jssdk'));

// 				function checkLoginState() {
// 				  FB.getLoginStatus(function(response) {
// 				    console.log(response);
// 				    return response;
// 				  });
				}
				</script>
		<script src="/assets/js/reg.js"></script>

				<div class="form_div">
					
						<div id="success" style="display: none">
                    </div>
                </div>
                    
            <div class="container wrapper">
                <div class="box">
					<form class="reg_form" action="javascript:" method="post">
						
						<h3 id="message"></h3>
						<input type="hidden" name="fbID" id="fbID">
                        
                                <div class="inputbox">
                                    <input type="text" name="name" required />
                                    <label>Name</label>
                                </div>
                                <div class="inputbox notrequired">
                                    <input type="date" name="DOB"/>
                                    <label>Date Of Birth</label>
                                </div>
                                <div class="inputbox">
                                    <select name="gender"> 
                                        <option value="choose">Gender</option>
                                        <option value="M">Male</option>
                                        <option value="F">Female</option> 
							         </select>
                                </div>
                                <div class="inputbox notrequired">
                                    <input type="text" name="college">
                                    <label>College</label>
                                </div>
                                <div class="inputbox notrequired">
                                    <input type="text" name="city">
                                    <label>City</label>
								</div>
								<div class="inputbox">
                                    <input type="number" name="mobile" min="7000000000" max="9999999999" required/>
                                    <label>Contact No</label>
                                </div>
                                <div class="inputbox">
                                    <input type="email" name="email"/>
                                    <label>Email</label>
                                </div>
								<div class="inputbox">
                                    <input minlength=6 type="password" name="password">
                                    <label>Password</label>
                                </div>
					           <div class="inputbox">
                                    <input type="text" pattern="\d{0,4}" placeholder="1234" name="refcode">
                                   <label>CA Referral Code <span class="referral-code-span">(Optional)</span></label>
                                </div>
                                <div class="inputbox">
                                    <input id="sub_but" type="button" name="register" value="Register"/>
                                </div>
                            </form>
                                <div class="reset-password">
                                <a style="" href="http://anwesha.info/reset_resend" target="_blank">Reset Password or Resend confirmation email</a>
                                </div>
                        </div>
                    </div>
				</div>
            


	<!-- Scripts -->
            <script src="/assets/js/particles_conf.js"></script>
			<script>
				var granimInstance = new Granim({
				    element: '#logo-canvas',
				    direction: 'left-right',
				    opacity: [1, 1],
				    states : {
				        "default-state": {
				            transitionSpeed: 2000
				        }
				    }
				});
			</script>

			
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
