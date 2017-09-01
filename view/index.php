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
	<meta name="theme-color" content="#496495">
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
			<!--we will rock this year--->
			 <h1 style="font-style: ">Coming Soon</h1>
			</div>
		</div>
		
		<div id="ca">
			
		</div>
		<div class="btn-container">
	<a href="ca/" class="btn-3d green">Campus Ambassador</a>
	<pre>&lt;<span class="anc">a</span> <span class="att">href</span>=<span class="val">"#"</span> <span class="att">class</span>=<span class="val">"btn-3d green"</span>>Button&lt;/<span class="anc">a</span>></pre>
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