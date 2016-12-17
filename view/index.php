<?php
	$referalcode = null;
	//Works to be done by frontend after loading
	$todo  = null;
	$todo_args  = array();
	if(isset($match[1]) && $match[1]=="register") {
		$todo = 'register';
		if(isset($match[2]))
			$referalcode = $match[2];
	}
	else if(isset($match[1]) && $match[1]=="ca") {
		$todo = 'register_ca';
		if(isset($match[2]))
			$referalcode = $match[2];
	}
	else if(isset($match[1]) && $match[1]=="leaderboard")
		$todo = 'leaderboard';

?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>


  <meta charset="UTF-8" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <script src="assets/js/modernizr.custom.js"></script>
		<title>Anwesha '17</title>
		<link rel="stylesheet" href="assets/css/style.css">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
<!-- <?php echo $match[2] ;?> -->

+		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<script src='assets/js/jquery.min.js'></script>
		<script src='assets/js/jquery.transit.min.js'></script>	
		<script src="//code.jquery.com/jquery-1.12.4.js"></script>
		<script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		
      <script type = "text/javascript" 
         src = "https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
		
  <script src="//code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
		<script src='assets/js/jquery.min.js'></script>
		<script src='assets/js/jquery.transit.min.js'></script>
		<style type="text/css">
		
		html, body { height: 100%; width: 100%; margin: 0; }
			.window {
				/*pointer-events: none;*/
				position: absolute;
				left:0;
				width:100% !important;
				height:100% !important;
				top:0;
				z-index:0 !important;
				background:url("images/test/window.png") no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			.window2 {
				pointer-events: none;
				position: absolute;
				left:0;
				width:100% !important;
				height:100% !important;
				top:0;
				display: none;
				z-index:4 !important;

				background:url("images/test/window.png") no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
			}
			.blankbg{
				position: absolute;
				left:0;
				top:0;
				width:100% !important;
				height:100% !important;
				display: none;
				z-index:5!important; 
			}
			#bgofblankbg{
				position: fixed;
				left:0;
				top:0;
				width:100% !important;
				height:100% !important;
				background: -webkit-radial-gradient(#2f3030 0%,#000000 40%);
			    background: -o-radial-gradient(#2f3030 0%,#000000 40%);
			    background: radial-gradient(#2f3030 0%,#000000 40%);
				
			}
			
			.sea{
				background:url("images/sea.gif") no-repeat center center fixed; 
				-webkit-background-size: cover;
				-moz-background-size: cover;
				-o-background-size: cover;
				background-size: cover;
				z-index: -2;
				position: absolute;
				top:0;
				left: 0;
				width:100%;
				height:100%;
				background-size: cover;
			}
			.clwrap{
				display: none;
				width: 100%;
				height: 100%;
				position: relative;
			}
			.clubs{
				position: absolute;
  				top: 0;
  				bottom: 0;
  				left:0;
  				right:0;
  				margin: auto;
  				width:600px;
  				height:250px;
				/*background-color: #000000;*/
				display: none;
			    margin: auto;
				z-index: 3 !important;

			}

			.backbtn,.backbtn2,.mainevent{
   				 margin: 0.5em;
    			 background: rgba(255, 255, 255, 0.6);
   				 font-family: bebas;
   				 padding: 20px;
   				 /* width: 75%; */
   				 font-size: 2em;
   				 border-radius: 40px;
   				 cursor: pointer;
  				 transition: background .5s;
  				 box-shadow: 0 -10px 0 rgba(0, 0, 0, 0.1) inset;
			}
			.backbtn:hover,.backbtn2:hover,.mainevent:hover{
				background:rgba(88, 214, 103, 0.6);
			}

			#leftlist{
				display: none;
				text-align: right;	
				left:0;
				position: absolute;

			}
			#rightlist{
				display: none;
				right:0;
				position: absolute;
			}
			.backbtn{
   				 padding: 10px !important;
				font-size: 1.25em !important;
				top:20px;
				left:20px;
				display: none;
				z-index:6;
				height: 50px !important;
  				 position: fixed;
				width:150px !important;
			}
			.backbtn2{
				font-size: 1.25em !important;
   				 padding: 10px !important;
				top:80px;
				left:20px;
				display: none;
				z-index:6;
				height: 50px !important;
  				 position: fixed;
				width:150px !important;
				
			}
			#mainarea{
				font-family: bebas;

			}
			#navbar{
				/*margin: auto;*/
  				/*display: inline;*/
  				 display: table;
    			margin: 0 auto;
  				/*position: absolute;
  				top:0;*/
			}
			#sidebar{
				position: fixed; 
				top:170px;
				left:10px;
				/*background-color: #FFFFFF;*/
				width:250px;
				height:500px;
			}
			#mainarea{
				position: absolute;
    			top: 170px;
    			left: 250px;
    			/* float: right; */
    			/*background-color: #FFFFFF;*/
    			z-index: 6;
    			/*height: 10000px;*/
    			width: 300px;
			}
			.ph-button {
				border-style: solid;
				margin:20px;
    			border-width: 0px 0px 3px;
    			box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
    			color: #FFFFFF;	   
    			border-radius: 6px;
    			cursor: pointer;
    			display: inline-block;
    			font-style: normal;
    			overflow: hidden;
    			text-align: center;
    			text-decoration: none;
    			text-overflow: ellipsis;
    			transition: all 200ms ease-in-out 0s;
    			white-space: nowrap;	
    			font-family: "Gotham Rounded A","Gotham Rounded B",Helvetica,Arial,sans-serif;
    			font-weight: 700;	
    			padding: 19px 39px 18px;
    			font-size: 18px;
    			opacity: 1;
  				transition: opacity .3s,box-shadow .3s;
			}
			.ph-button:hover{
				opacity: 0.7;
    			box-shadow: 0 0px 50px rgba(255, 255, 255, 0.7);
			}
			
			.ph-btn-blue {
		 		border-color: #326E99;
    			background-color: #3F8ABF;
				margin-top: 50px !important;
			}
			.ph-btn-green {
				margin-top:5px !important;
				margin-bottom:5px !important;
				border-color: #3AC162;
				background-color: #5FCF80;
			}
			#eve_cover{
				box-shadow: 0 0 30px #FFFFFF;
				/*display: table;*/
				vertical-align: middle;
				width:100%;
				height:300px;
				background-size: cover;
				/*position: absolute;*/
				/*opacity: 0.8;*/
				/*background-color: #FFFFFF;*/
			}
			#headwrap{
				vertical-align: middle;
			}
		</style>

		 <script type = "text/javascript" language = "javascript">
   			var ev=0;
   			var cl=0;
   			var TEC_CODE = 0;
   			var events_data;
         $(document).ready(function() {
         	var imgurl;
         	function eve_coverswitch(imgurl){
         		
         		if(imgurl!=""){
         			var ppurl="url(";
         			ppurl +=imgurl;
         			ppurl +=")";
         			$("#eve_cover").css("background-image",ppurl);
         			// alert(imgurl);
         			// alert(ppurl);	
         			// $("#eve_cover").animate({opacity:'0.8'});

         		}
         	}
         	function emptyresp(){
         		
				$('#eve_name').text("");
				$('#eve_tagline').text("");
				$('#eve_date').text("");
				$('#eve_time').text("");
				$('#eve_venue').text("");
				$('#eve_organisers').text("");
				$('#eve_short_desc').text("");
				$('#eve_long_desc').text("");
				$('#eve_icon').attr("src","");
				eve_coverswitch("");
				// $('#eve_cover').css("src","");
         	}
         	$.get( "allEvents/", function(data, status){
							console.log("Event Status : "+data[0]);

        					if(status=='success'){
    							events_data = data[1];
    							console.log("Events Data Updated");



    							//Addition Init
    							$( "#navbar" ).empty();
    							for (var i = 0; i < events_data.length; i++) {
    								if(events_data[i]['code']==TEC_CODE) {
    									//Technical Added
    									console.log("Tech :"+events_data[i]['eveName']);
    									$( "#navbar" ).append( "	<a href='#' data='"+events_data[i]['eveId']+"' class=' navbtn ph-button ph-btn-blue'>"+events_data[i]['eveName']+"</a>" );
									}
    							};

    							$(".navbtn").click(function(){
									var cat=$(this).attr('data');
									console.log("Event Code :"+cat);
									view_sbar(cat);
								});
    							
    						}
    						else
    							console.log("Unable to get Events Data");
			},"json");
			
         	var wwidth=$(window).width();
         	$("#mainarea").width(wwidth-270);
         	var category;
         	var last_sbar_cat=-1;
			function view_sbar(category){ //alert(cl);
				if(last_sbar_cat==category)
					return;
				last_sbar_cat = category;
				if(category == -1) {
					$("#sbl").fadeOut("fadeOut");
					return;
				}
				$("#sbl").fadeOut("fadeOut",function(){
					
					$( "#sbl" ).empty();
					console.log("Event Cleared");
					emptyresp();
					//$( "#sbl" ).append( "<a href='#' class='ph-button ph-btn-green'>Test</a>" );
					
					for (var i = 0; i < events_data.length; i++) {
						if(events_data[i]['code']==category) {
							var e_name = events_data[i]['eveName'];
							var ev_id = events_data[i]['eveId'];

							$( "#sbl" ).append( "<a href='#' data-evid='"+ev_id+"' class='sbl-item ph-button ph-btn-green'>"+e_name+"</a>" );
							console.log("Event Added "+ev_id);
						}
					};

					$("#sbl").fadeIn("slow");


					$(".sbl-item").click(function(){
						var cat=$(this).attr('data-evid');
						console.log("Event to Display :"+cat);
						//alert("Open "+cat);
						var eve;
						for (var i = 0; i < events_data.length; i++)
						if(events_data[i]['eveId']==cat) {
							console.log("Found");
							eve = events_data[i];
							break;
						}
						//Update Event in Frontend

						//Need to Hide if Don't Exists 
						
						$('#eve_name').text(eve['eveName']);
						$('#eve_tagline').text(eve['tagline']);
						$('#eve_date').text(eve['date']);
						$('#eve_time').text(eve['time']);
						$('#eve_venue').text(eve['venue']);
						$('#eve_organisers').text(eve['organisers']);
						$('#eve_short_desc').text(eve['short_desc']);
						$('#eve_long_desc').text(eve['long_desc']);
						$('#eve_icon').attr("src",eve['icon_url']);
						// $('#eve_cover').attr("src",eve['cover_url']);
						eve_coverswitch(eve['cover_url']);

					});
					
				
				});
			}
         	$.fn.slideFadeToggle  = function(speed, easing, callback) {
        return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
			}; 
         	function toggleli(){
         		$("#leftlist").toggle( "slide");
               $("#rightlist").toggle( "slide");
         	}
            $("#eventsbtn").click(function(){
            	$(".clwrap").fadeIn();
            	$(".clubs").fadeIn();
            	$("#intro").hide();
            	$(".window2").fadeIn("slow",toggleli());
            	$(".backbtn").fadeIn().delay(1000);
              
            });
			$(".backbtn").click(function(){
				$("#intro").show();
				$(".backbtn").fadeOut();
				$(".clwrap").fadeOut();
            	$(".clubs").fadeOut();
				
            	if(ev==1){
            		// $(".blankbg ").fadeOut();
            		$(".blankbg ").slideFadeToggle();
            		$(".backbtn2").fadeOut();
            		$(".window2").fadeOut("fast");
					// toggleli();

            	}else{
            		$(".window2").fadeOut("slow",toggleli());
            	}

			});
			$(".mainevent").click(function(){
				// $(".blankbg ").fadeIn("fast");
				$(".blankbg ").slideFadeToggle();
				$(".backbtn2").fadeIn().delay(1000);
				if(cl==0) {
					//For For TECHNICAL
					$("#navbar").css("display","table");
					view_sbar(-1);
				} else {
					$("#navbar").hide();
					view_sbar(cl);
				}
				ev=1;
				toggleli();

			});
			$(".backbtn2").click(function(){
				ev=0;
				emptyresp();
				$(".backbtn2").fadeOut();
				// $(".blankbg ").fadeOut();
				 $(".blankbg ").slideFadeToggle();
				toggleli();

			});
			
			// $(".sidebtn").click(function(){
			// 	$("#mainarea").html($(this).attr("placeholder"));
			// });
         });
			
      </script>
 
		<script type="text/javascript">
			$(document).ready(function(){
				
				<?php 
					if(isset($todo)){
						echo "window.location='#$todo';";
					}
				?>
				$.post("leaderboard/api/",
    						{	},
    						function(data, status){
							var AJAXresponse = data;
        					if(status=='success'){
        						for (i = 0;i<AJAXresponse.length; i++) {
    									$("tbody").append("<tr><td>"+AJAXresponse[i]['name']+"</td><td>"+AJAXresponse[i]['score']+"</td></tr>");
								}

        					}else{

        						}
    			},"json");

    			//ajax for ca
    			$("#submitca").click(function(){ 
				var name=$("#caname").val();
		var email=$("#caemail").val();
		var college=$("#cacollege").val();
		var degree=$("#cadegree").val();
		var city=$("#cacity").val();
		var graduation=$("#cagraduation").val();
		var address=$("#caaddress").val();
		var dob=$("#cadob").val();
		var mobile=$("#camobile").val();
		var sex=$("#casex").val();
		var responsibility=$("#caresponsibility").val();
		var involvement=$("#cainvolvement").val();
		var threethings=$("#cathreethings").val();
		var referalcode=$("#careferalcode").val();
		console.log("Request Send");
		$.post("user/register/CampusAmbassador/",
    						{        						
       						name: name,
        					email: email,
        					college: college,
        					degree: degree,
        					city:city,
        					graduation:graduation,
        					address:address,
        					dob:dob,
        					mobile:mobile,
        					sex:sex,
        					responsibility:responsibility,
        					involvement:involvement,
        					threethings:threethings,
        					referalcode:referalcode
    						},
    						function(data, status){
        					console.log("Response");
        					console.log("Data: " + data + "\nStatus: " + status);
        					if(status=='success'){//$("#myloader").fadeOut();
        						console.log(data);

        						if(data[0]==1){
        							$("#form_fill").html('<div style="width:500px;"><center></br>Registration Successful</br>===================</br></br>An activation link has been sent to your email.<br>'+email+'</center></div></br></br>');
        							//$("#messagew").fadeIn();
        							$("#form_fill").css('background','#5FAB22');
        							//$("#form_fill").fadeOut();

        						}else{
        							$("#messagew").fadeIn();
        							$("#messagew").html('<center>'+data[1]+'</center>');
								}
								$('html, body').animate({
								        scrollTop: $("#header").offset().top
								    }, 500);
     
        					}else{//$("#myloader").fadeOut();
        							$("#messagew").fadeIn();
        							$("#messagew").html('An error occured.<br> Please try again.');
        							$('html, body').animate({
								        scrollTop: $("#header").offset().top
								    }, 500);
								    console.log("Failed "+data);

        						}
    			},"json");

			});
			});

		
		</script>
		<meta property="og:image" content="images/preview.png" />
		<link rel="shortcut icon" href="favicon.ico">
		<style type="text/css">
			#datagrida,.box{
				overflow-y: scroll;
				height:300px;
			}
		</style>
	</head>

	<body>
		<div class="blankbg">
			<div id="bgofblankbg"></div>
			<div id="navbar">
        			<a href='#' data="1" class=' navbtn ph-button ph-btn-blue'>Cat1</a>
        			<a href='#' data=2 class=' navbtn ph-button ph-btn-blue'>Cat2</a>
        			<a href='#' data=3 class=' navbtn ph-button ph-btn-blue'>Cat3</a>
        			<a href='#' data=4 class=' navbtn ph-button ph-btn-blue'>Cat4</a>
			</div>
			<div id="sidebar">
				<div class="sblist" id="sbl" style="display:none">
					<a href='#' class='ph-button ph-btn-green'>Event1</a>
        			<a href='#' class='ph-button ph-btn-green'>Event2</a>
        			<a href='#' class='ph-button ph-btn-green'>Event3</a>
        			<a href='#' class='ph-button ph-btn-green'>Event4</a>
				</div>
			</div>
			<div id="mainarea" style='color:white'>
				<center>
			<div id="eve_cover">
				<span id="headwrap" style=""><br><br><br><br>
				<span id="headwr" style="display: inline">
				<img src="" style="height: 50px;display: inline;" placeholder="Icon" id='eve_icon'>&nbsp;&nbsp;&nbsp;&nbsp;
				<h1 id='eve_name' style="font-size: 5em;display: inline;margin-bottom: 10px;text-shadow: 0 0 10px #29d816">
					Event Name
				</h1></span><br>
				<span id='eve_tagline' style="font-size: 1.5em;margin-bottom: 30px;font-style: italic;">
					Event TagLine
				</span>
				</span>
				</div>
				<!-- <div id="dummyspace" style="width:100%;height:300px"></div> -->
				<br><br><br><br>Date:
				<span id='eve_date' style="font-size: 2em;">
					DATE
				</span><br><br><br>Time:
				<span id='eve_time' style="font-size: 2em;">
					TIME
				</span><br><br><br>Venue:
				<span id='eve_venue' style="font-size: 2em;">
					VENUE
				</span><br><br><br>
				<div id='eve_organisers_head'>
					Organisers :
					<ol id='eve_organisers' style="font-size: 2em;">
						<li>Organiser 1 (9741852963)</li>
						<li>Organiser 2 (9852451262)</li>
						<li>Organiser 3 (9965235245)</li>
					</ol>
				</div><br><br><br>


				


				<span id='eve_short_desc' style="font-size: 2em;">
					Event Short Desc
				</span><br><br><br>
				<span id='eve_long_desc' style="font-size: 2em;">
					Event Long Desc
				</span>
				<br><br><br><br><br><br>


			</center>
			</div>
		</div>
		<div class="window2"></div>
		<div class="window"></div>
		<button class="backbtn">< Back to home</button>
		<button class="backbtn2">< Events home</button>
		<div class="sea"></div>
		<div class="clwrap">
			<div class="clubs">
				<ul id="leftlist">
				<a href="#"><li class="mainevent" onclick="cl=1">Cultural</li></a>
				<a href="#"><li class="mainevent" onclick="cl=2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arts & Welfare</li></a>
				<!-- <a href="#"><li class="mainevent" onclick="cl=3">NJACK2</li></a> -->

				</ul>
				<ul id="rightlist">
				<a href="#"><li class="mainevent" onclick="cl=0">Technical</li></a>
				<a href="#"><li class="mainevent" onclick="cl=4">None&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li></a>
				<!-- <a href="#"><li class="mainevent" onclick="cl=6">NJACK4</li></a> -->

				</ul>

			</div>
		</div>
		<div id="intro">
			<ul class="links">
				<a id='bregister' href="#register"><li>Registration</li></a>
				<a id='bregister_ca' href="#register_ca"><li>Campus Ambassador</li></a>
                <a id='bleaderboard' href="#leaderboard"><li>Campus Ambassador Leaderboard</li></a>
				<a href="#" id="eventsbtn"><li>Events</li></a>
				<br>
			    <a href="auditions/"><li>MultiCity</li></a>

			</ul>

            
           
			<div id="date">
				<div id="glass">
					<div id="top"></div>
					<div id="bottom"></div>
					<div id="line"></div>
				</div>
				<div class="text">
					Jan 27 28 29
				</div>
			</div>
		</div>

		<div class="parallelogram">
			<div class="content">

				<h1>ABOUT ANWESHA</h1>
				 ANWESHA is the annual social and cultural festival of IIT Patna. It marks days of absolute ecstasy,
             providing the budding artists a competing platform in diverse fields such as music, dance, theater, 
            photography, literature, fine arts, quizzing and debating. Anwesha is an avenue to be comforted from the
             routine life and to embrace the fun and frolic embedded with tantalizing professional performances from India
             along with an addressal to the social responsibility with its underlying social theme.
				<br><br><br>
			</div>
		
		</div>
        
		<button id="expand-navigation" style='visibility:hidden'>-</button>
		<section class="wrapper opened">
		<!--
			<ul>
				<li><a href="#galleryload" onclick="gallery();">Pics</a></li>
				<li><a href="#">Spons</a></li>
				<li><a href="#">Event</a></li>
				<li><a href="#">Social</a></li>
				<li><a href="#">Team</a></li>
			</ul>
		-->
		</section>


		<div class="overlay on-overlay"></div>
		
		<div id="preloader">
			<div class="bg"></div>
			<div class="logo">
				<img src="images/logo.png">
			</div>
			<div class="circle"></div>
			<div class="tagline">
				Think.Dream.Live
			</div>
		</div>

		<div id="register" class="lightbox logreg">
			<div class="close"><a href="#" onclick="document.body.style.overflow='visible';">X</a></div>
			<h2>Register</h2>
	
			
		<div id="boxreg" class="box" style="overflow-y:scroll; overflow-x:hidden; height:400px; width:800px; padding:10px;">
				<!--input class="inp"  name="username" type="text" placeholder="Username" onblur="if(this.value == ''){this.value = 'Username';}" onfocus="if (this.value == 'Username') {this.value = '';}"-->
				<!--input class="inp" id="" name="password" type="password" placeholder="Password" onblur="if(this.value == ''){this.value = 'Password';}" onfocus="if (this.value == 'Password') {this.value = '';}"-->		
				 <div id="rForm">
                
                    <!-- Top Navigation -->

                    <section>
                        <form id="theForm" class="simform" autocomplete="off">
                            <div class="simform-inner">
                                <ol class="questions">
                                  <li>
                                        <span><label for="q1">Fullname</label></span>
                                   
										<input name="q1" id="q1" type="text" placeholder="Full name" pattern="[a-zA-Z0-9.\s]{4,40}" title='Alpha Numberic Character of 4 to 40 length'>
                                    </li>
                                    <li>
                                        <span><label for="q2">Phone</label></span>
                                    
										<input  name="q2" type="text" placeholder="Phone" id="q2" pattern="[789][0-9]{9}" title='Valid 10 Digits Mobile Number' >
                                    </li>
                                    <li>
                                        <span><label for="q3">E-mail</label></span>
                                        
										 <input  name="q3" type="email" placeholder="Email" id="q3" title="Invalid Email">
                                    </li>
									     <li>
                                        <span><label for="q4">College</label></span>
                                        
										  <input  name="q4" type="text" placeholder="College" id="q4" pattern="[a-zA-Z0-9.\s]*" title='Invalid College Name'>
                                    </li>
                                    <li>
                                        <span><label for="q5">DOB</label></span>
                                       
										  <input  id="q5" name="q5" type="text" placeholder="DOB (yyyy-mm-dd)"  pattern="\d{4}-\d{2}-\d{2}" class="datepicker" class="inp"  title="Invalid Date Format(yyyy-mm-dd)"  >
                                    </li>
                                    <li>
                                        <span><label for="q6">Gender(M/L)</label></span>
                                       
										<input id="q6" placeholder="Sex(M/F)"   name="q6" type="text" pattern="[MFmf]" value="" >
                                    </li>
                                    <li>
                                        <span><label for="q7">City</label></span>
                                        
											<input id="q7" name="q7" type="text" placeholder="City" patten='^[a-zA-Z0-9.@]*' title="Invalid City" >
                                    </li>
                                    <li>
                                        <span><label for="q8">Reference Number</label></span>
                                       
										<input id="q8"  name="q8" type="text" placeholder="Reference Code" pattern='([0-9]{4})|()' title="Invalid Ref Number" value="<?php if(isset($referalcode)) echo $referalcode; ?>" <?php if(!empty($referalcode)) echo "disabled"; ?>>
                                    </li>
                                
                                </ol><!-- /questions -->
                              
								<input class="button submit" type="submit" id="submitreg" value="Submit">
                                <div class="controls">
                                  	<input class="button submit" type="submit" id="submitreg" value="Submit">
                                    <div class="progress"></div><button class="next">next</button>
                                    <span class="number">
                                        <span class="number-current"></span>
                                        <span class="number-total"></span>
                                    </span>
                                    <span class="error-message"></span>
                                </div><!-- / controls -->
                            </div><!-- /simform-inner -->
                            <span class="final-message"></span>
                        </form><!-- /simform -->
                    </section>

                </div>
                <script src="assets/js/classie.js"></script>
                <script src="assets/js/stepsForm.js"></script>
                <script>
			var theForm = document.getElementById( 'theForm' );

			new stepsForm( theForm, {
				onSubmit : function( form ) {
					// hide form
					classie.addClass( theForm.querySelector( '.simform-inner' ), 'hide' );

					/*
					form.submit()
					or
					AJAX request (maybe show loading indicator while we don't have an answer..)
					*/
					//regular reg

    			$("#submitreg").click(function(){	
				var name=$("#q1").val();
				var email=$("#q2").val();				
				var college=$("#q3").val();
				var mobile=$("#q4").val();
				var dob=$("#q5").val();
				var sex=$("#q6").val();
				var city=$("#q7").val();
				var refid=$("#q8").val();
				
				//ajax send
				$.post("user/register/User/",
    						{        						
       						name: name,
        					email: email,
        					college: college,
        					sex:sex,
        					mobile:mobile,
        					email:email,
        					dob:dob,
        					city:city,
        					refcode:refid
    						},
    						function(data, status){
							var AJAXresponse = data;
        					if(status=='success'){
        						if(AJAXresponse[0]==1){
        							$("#boxreg").html('<div style="width:500px"><h1>Registered!<br>==============<br></h1><br>An activation link has been sent to<br>'+ email+'<br><div>');
        							//$("#error").html('<h1>Registered!</h1>An activation link has been sent to '+ email+'<br>');
        							$("#boxreg").css('background','#5FAB22');
    								document.getElementById('boxreg').scrollIntoView();
								
        							// $("#error").fadeOut();
        						}else{
        							$("#error").fadeIn();
        							$("#error").html(''+AJAXresponse[1]+'');
        							document.getElementById('error').scrollIntoView();
								}
     
        					}else{
        							$("#error").fadeIn();
        							$("#error").html('An error occured.<br> Please try again.');
    								document.getElementById('error').scrollIntoView();
								

        						}
    			},"json");
				
			});
				
				}
			} );
                </script>			
                <div id="error" style="width:auto;display:none;box-radius:5px;box-shadow:#000000 0 0 10px;background:#6fce2d;padding:20px;font-size:20px;margin:10px">An error occured</div>
			
			</div>
		</div>

		<div id="register_ca" class="lightbox logreg">
			<div class="close"><a href="#" onclick="document.body.style.overflow='visible';">X</a></div>
			<h2>Campus Ambassador<br> Registrations</h2>

			<div class="box" id="box"><center>
				<div id="message" style="color: red !important;"></div></center>

			<form action="javascript:" method="post" id="form_fill" accept-charset="UTF-8">
				<input placeholder="Full Name" id="caname" class="inp"  name="name" type="text" value="" pattern="[a-zA-Z0-9.\s]{4,40}" title='Alpha Numberic Character of 4 to 40 length'>
				<input placeholder="College" class="inp" id="cacollege" name="college" type="text" value="" pattern="[a-zA-Z0-9.\s]*" title='Invalid College Name'>
				<input placeholder="City" class="inp" id="cacity" name="city" type="text" value="" patten='^[a-zA-Z0-9.@]*' title="Invalid City" >
				<input placeholder="Degree" class="inp" id="cadegree" name="degree" type="text" value="">
				<input placeholder="Year of Graduation" class="inp" id="cagraduation" name="graduation" type="text" value="">
				<textarea placeholder="Address" class="inp" id="caaddress" name="address" rows="10"></textarea>
				<input placeholder="Email" class="inp" id="caemail" name="email" type="email" value="" title="Invalid Email ID">
				<input placeholder="Mobile" class="inp" id="camobile" name="mobile" pattern="[789]\d{9}" title="Invalid Mobile Number" type="text" value="">
				<input placeholder="DOB (yyyy-mm-dd)" class="inp" id="cadob" name="dob" pattern="\d{4}-\d{2}-\d{2}" class="datepicker" class="inp"  title="Invalid Date Format(yyyy-mm-dd)" value="">
				<input placeholder="Sex(M/F)" class="inp" id="casex" name="sex" type="text" pattern="[MFmf]" value="">
				<textarea placeholder="Tell us 3 things you would do as a Campus Ambassador of Anwesha &lsquo;17." class="inp" id="cathreethings" name="threethings" rows="10"></textarea>
				<textarea placeholder="Have you held any position of responsibility in your college? If yes, please explain." class="inp" id="caresponsibility" name="responsibility" rows="10"></textarea>
				<textarea placeholder="Have you been a part of one or more previous editions of Anwesha? If yes, please explain." class="inp" id="cainvolvement" name="involvement" rows="10"></textarea>
				<input placeholder="Refered by someone?" id="careferalcode" name="referalcode" class="inp"  type="text" pattern='([0-9]{4})|()' title="Invalid Ref Number" value="<?php if(isset($referalcode)) echo $referalcode; ?>" <?php if(!empty($referalcode)) echo "disabled"; ?> ><br>
				<center><div id="messagew" style="width:auto;display:none;box-radius:5px;box-shadow:#000000 0 0 10px;background:#6fce2d;padding:20px;font-size:20px;margin:10px"></div></center>
				<input id="submitca" class="inp" type="submit" value="Submit">
				
			</form>
			</div>
		</div>

		<div id="login" class="lightbox logreg">
			<div class="close"><a href="#" onclick="document.body.style.overflow='visible';">X</a></div>
			<h2>Login</h2>
			<div class="box">
				<input class="inp" name="username" type="text" value="Username" >
				<input class="inp" name="password" type="password" value="Password" >
				<input class="button" type="submit" value="login">
			</div>
		</div>

        <div id="leaderboard" class="lightbox logreg">
            <div class="close"><a href="#" onclick="document.body.style.overflow='visible';">X</a></div>
            <h2>LEADERBOARD</h2>
            <center>
                <div style="width:50%; align-content:center;">
                    <div class="datagrid">
                        <div class="datagrid" id="datagrida">

                            <table>
                                <thead><tr><th>Name</th><th>Score</th></tr></thead>
                                <tbody>
                                    

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </center>
        </div>

		<div id="galleryload" class="lightbox">
		</div>

       


		<script src="assets/js/index.js"></script>	
		

	</body>
</html>
