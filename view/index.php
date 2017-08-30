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
			z-index: 100;
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
	</style>
	<script type="text/javascript" src="https://sarcadass.github.io/granim.js/assets/js/vendor/granim.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
	<script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="assets/js/cubeTransition.js"></script>
	</head>
	<body bgcolor="#000000">
		
		<div class="bloc-logo">
		    <canvas id="logo-canvas"></canvas>
		    <a href="index.html" class="logo-mask">Granim.js</a>
		</div>
		<canvas id="granim-canvas"></canvas>
		<div id="particles-js"></div>
		<div id="center-container">
			<div id="anwLogo">
				
			</div>
			<div class="title">
			 <h1 style="font-style: ">Comming Soon</h1>
			</div>
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

<script>
		/* ---- particles.js config ---- */

particlesJS("particles-js", {
		  "particles": {
		    "number": {
		      "value": 300,
		      "density": {
		        "enable": true,
		        "value_area": 800
		      }
		    },
		    "color": {
		      "value": "#ffffff"
		    },
		    "shape": {
		      "type": "circle",
		      "stroke": {
		        "width": 0,
		        "color": "#000000"
		      },
		      "polygon": {
		        "nb_sides": 5
		      },
		      "image": {
		        "src": "img/github.svg",
		        "width": 100,
		        "height": 100
		      }
		    },
		    "opacity": {
		      "value": 1,
		      "random": true,
		      "anim": {
		        "enable": true,
		        "speed": 1,
		        "opacity_min": 0,
		        "sync": false
		      }
		    },
		    "size": {
		      "value": 3,
		      "random": true,
		      "anim": {
		        "enable": false,
		        "speed": 4,
		        "size_min": 0.3,
		        "sync": false
		      }
		    },
		    "line_linked": {
		      "enable": false,
		      "distance": 150,
		      "color": "#ffffff",
		      "opacity": 0.4,
		      "width": 1
		    },
		    "move": {
		      "enable": true,
		      "speed": 1,
		      "direction": "none",
		      "random": true,
		      "straight": false,
		      "out_mode": "out",
		      "bounce": false,
		      "attract": {
		        "enable": false,
		        "rotateX": 600,
		        "rotateY": 600
		      }
		    }
		  },
		  "interactivity": {
		    "detect_on": "canvas",
		    "events": {
		      "onhover": {
		        "enable": true,
		        "mode": "bubble"
		      },
		      "onclick": {
		        "enable": true,
		        "mode": "repulse"
		      },
		      "resize": true
		    },
		    "modes": {
		      "grab": {
		        "distance": 400,
		        "line_linked": {
		          "opacity": 1
		        }
		      },
		      "bubble": {
		        "distance": 250,
		        "size": 0,
		        "duration": 2,
		        "opacity": 0,
		        "speed": 3
		      },
		      "repulse": {
		        "distance": 400,
		        "duration": 0.4
		      },
		      "push": {
		        "particles_nb": 4
		      },
		      "remove": {
		        "particles_nb": 2
		      }
		    }
		  },
		  "retina_detect": true
		});


	</script>
	</body>
	</html>