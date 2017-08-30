<!DOCTYPE html>
<html >
	<head>
	<!--SEO-->
	<META NAME="Title" CONTENT="Anwesha 2018 IIT Patna">
	<META NAME="Keywords" CONTENT="Anwesha, Anwesha, Anwesha, IIT, IIT Patna, IIT P , IITP, Anwesha Fest, fest, cult, cultural">
	<META NAME="Description" CONTENT="ANWESHA is a quest. The annual Techno-Cultural Festival of Indian Institute of Technology Patna hosts Technical, Cultural, Management, Arts and Welfare ...">
	<META NAME="Subject" CONTENT="Anwesha IITP">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="assets/css/mobile.css" media="only screen and (max-width: 960px)">
	<link rel="stylesheet" href="assets/css/desktop.css" media="only screen and (min-width: 960px)">
	<meta name="theme-color" content="#e0a772">
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
	<title>Anwesha '18</title>
	<script>
		function preloadImage(imageurl)
		{
			var img=new Image();
			img.src=imageurl;
		}
	</script>
	<meta property="og:image" content="images/preview.png" />
	<link rel="shortcut icon" href="favicon.ico">
	<style type="text/css">
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
	</head>
	<body bgcolor="#000000">
		
		<div class="bloc-logo">
		    <canvas id="logo-canvas"></canvas>
		    <a href="index.html" class="logo-mask">Granim.js</a>
		</div>
		<!-- <canvas id="granim-canvas"></canvas> -->
		<div id="particles-js"></div>
		<div id="center-container">
			<div id="anwLogo">
				
			</div>
			<div class="title">
			 <h1 style="font-style: ">Comming Soon</h1>
			</div>
		</div>
		
		<div id="ca">
			
		</div>
		
		
		<!-- <div id="cubeTransition">
			<div class="page1"><h2>cubeTransition</h2></div>
			<div class="page2"><h2>Page 2</h2></div>
			<div class="page3"><h2>Page 3</h2></div>
			<div class="page4"><h2>Page 4</h2></div>
		</div> -->
		

		   <!-- Scripts -->
		<script>
		var granimInstance = new Granim({
		    element: '#logo-canvas',
		    direction: 'left-right',
		    opacity: [1, 1],
		    states : {
		        "default-state": {
		            gradients: [
		                ['#337e87', '#326d5e'],
		                ['#37a4b2', '#48418e'],
		                ['#816287', '#492966']
		            ],
		            transitionSpeed: 1500
		        }
		    }
		});
		</script>

<script src="assets/js/particles_conf.js" type="text/javascript">
	</script>
	</body>
	</html>