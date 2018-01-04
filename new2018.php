<html>
<head>
	<title>Anwesha 2018</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="images/logo_favi.png" rel="icon" >
		
	<meta name="viewport" content="width=device-width, initial-scale= 1">
	<script type="text/javascript" src="js/jquery.js"></script>
	
</head>
<body>
<!-----preloader-->

	<div class="preloader_div">
	</div>

	<script type="text/javascript">
		$('.preloader_div').load("/preloader/");
	</script>


<!---------header-----bar-->
<div class="header_div">
	 <div class="menu_toggle">
		<img src="images/skull_menu.png">
		<span> MENU </span>
	</div>
</div>

<!--------login------>
	<div class="login_backgrnd"></div>
		
<!-----menu----bar------>
	<div class="menu_bar">
		<ul>
			<li><a href="/">Home</a></li>
			<!-- <li><a href="events/">Events</a></li> -->
			<!-- <li class="sch_div">Schedule</li> -->
			<a href="/gallery/"><li>Gallery</li></a>
			<a href="/team/"><li>Team</li></a>
			<!-- <li class="spons_div">Sponsors</li> -->
			<li class="acco_load">Accomodation</li>
			<!-- <a href="/register/" target="_blank"> -->
			<li class="register">Register</li>
			<li class="ca"><a href="/ca/" target="_blank">Campus Ambassador</a></li>
		</ul>
	</div>

<!-----doors---->
	<div class="menu_backgrnd">
		<div class="overlay"></div>
		<img class="creep" src="images/creep.png">
		<br>
		<img class="boundary" src="images/bound.png">
	</div>

<!-----fest date---------->
	<div class="date">
		<img src="images/date.png">
		<div class="date_text">
			2 - 4
			<br>
			FEB
		</div>
	</div>
	
<!-----moving ----witch------>
	<img class="moving_witch" id="moving_witch" src="images/witch_right_1.png">

<!-----fixed ----cloud------>
	<div class="cloud_div"></div>

<!-----moving ----cloud------>
	<div class="moving_cloud_div">
		<img src="images/moving_cloud.png">
	</div>

<!-----moving ----floor------>
	<div class="moving_floor_div">
		<img src="images/floor_back.png">
	</div>

<!--horizontal scrolling div-------->
	<div class="horizontal">
		<div class="anwesha_logo">
			<img src="images/logo_favi.png">
		</div>

		<div class="blank_div_thr">
		</div>

		<div class="about_anwesha">
			<p> About Anwesha</p>
			Anwesha is a quest. The annual Techno-Cultural Festival of Indian Institute of Technology Patna hosts Technical, Cultural, Literary, Eco and Management events. Since its genesis in 2010, Anwesha has gained great importance at an exponential rate and enjoys a cult status among the youths of Bihar. Eminent personalities such as chief minister Nitish Kumar, Padma Vibhushan, G. Madhavan Nair, R.K. Sihna (Dolphin Man of India), have been part of Anwesha's extravaganza in the past.
		</div>


		<div class="blank_div_fiv">
		</div>

		<div class="anwesha_theme">
			<p>Themed on WitchCraft</p>
			<img src="images/anw_theme.jpg">

		</div>

		<div class="blank_div_fiv">
		</div>

		<div class="anwesha_theme">
			<p>Media Outreach</p>
			<img src="images/media.jpg">
		</div>

		<div class="blank_div_thr">
		</div>
	</div>

<!---viewing div on mobile phone-->
	<div class="mob_div">
		<div class="anwesha_logo">
			<img src="images/logo_favi.png">
		</div>

		<div class="blank_div_thr">
		</div>

		<div class="about_anwesha">
			<p> About Anwesha</p>
			Anwesha is a quest. The annual Techno-Cultural Festival of Indian Institute of Technology Patna hosts Technical, Cultural, Literary, Eco and Management events. Since its genesis in 2010, Anwesha has gained great importance at an exponential rate and enjoys a cult status among the youths of Bihar. Eminent personalities such as chief minister Nitish Kumar, Padma Vibhushan, G. Madhavan Nair, R.K. Sihna (Dolphin Man of India), have been part of Anwesha's extravaganza in the past.
		</div>


		<div class="blank_div_fiv">
		</div>

		<div class="anwesha_theme">
			<p>Themed on WitchCraft</p>
			<img src="images/anw_theme.jpg">

		</div>

		<div class="blank_div_fiv">
		</div>

		<div class="anwesha_theme">
			<p>Media Outreach</p>
			<img src="images/media.jpg">
		</div>

		<div class="blank_div_fiv">
		</div>

	</div>

<!---ajax loader-->

	<div class="ajax_loading_bckgrnd">
		<div class="ajax_back"></div>
	</div>

	<div class="ajax_loading_div ajax_loading_entry">
		<img class="ajax_pin" src="images/dragon.png"/>
		<img class="close_icon" src="images/close.png"/>
		<img class="ajax_div_back" src="images/ajax_div_back.png" style="z-index: -100" />
		<div class="ajax_content"></div>
	</div>

<!---footer-->
	<div class="footer_div">
		
		<a target="_blank" href="https://www.facebook.com/anwesha.iitpatna/"><img src="images/social/fb.png"></a>
		<a target="_blank" href="https://www.instagram.com/anwesha.iitp/"><img src="images/social/insta.png"></a>
		<a target="_blank" href="https://www.youtube.com/user/AnweshaIITP"><img src="images/social/youtube.png"></a>

		<div class="copyright">
			&copy; 2018 Anwesha, IIT Patna
		</div>
	</div>

<!--scripts-->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery.mousewheel.js"></script>

<!--scripts for index-->
	<script type="text/javascript">

//disapiaring of preloader
	$(window).on('load',function()
	{
		$('.preloader_div').addClass('preloader_div_anim').delay(3000).fadeOut(10);
	});

//--horizontal----------- scrolling-->
		$(document).ready(function() {
		    $('body, html, *').mousewheel(function(e, delta) {
		        // multiplying by 40 is the sensitivity, 
		        // increase to scroll faster.
		        this.scrollLeft -= (delta * 40);
		        e.preventDefault();
		    });

		});

//-----menu toggle
		$('.menu_toggle img').on("click",function()
		{
			span_text=$('.menu_toggle span').text();
			if(span_text == "EXIT")
			{
				$('.menu_toggle span').text('MENU');
				$('.menu_toggle img').attr('src', 'images/skull_menu.png');
				$('.menu_backgrnd').fadeOut(800);
				$('.menu_bar').slideUp(800);
			}
			else
			{
				$('.menu_toggle span').text('EXIT').fadeIn(800);
				$('.menu_toggle img').attr('src', 'images/skull_exit.png');
				$('.menu_backgrnd').fadeIn(800);
				$('.menu_bar').slideDown(800);
			}
		});

		$('.menu_backgrnd').click(function()
		{
			$('.menu_toggle span').text('MENU');
			$('.menu_toggle img').attr('src', 'images/skull_menu.png');
			$('.menu_backgrnd').fadeOut(800);
			$('.menu_bar').slideUp(800);
		});

//menu bar item css
		var new_li= $('.menu_bar li').first();
		new_li.addClass('first_rot');
		var new_li= new_li.next().next();
		new_li.addClass('first_rot');
		var new_li= new_li.next().next();
		new_li.addClass('secnd_rot');
		var new_li= new_li.next().next().next();
		new_li.addClass('secnd_rot');

//witch direction on moving mouse
		$(document).ready( function ()
		{

		// track and save the position of the mouse
			$(document).mousemove( function(e) 
			{
				mouseX = e.pageX;
				mouseY = e.pageY; 
	  		 	
	  		 	witchX = parseInt($('#moving_witch').css("left"));
	  		 	witchY = parseInt($('#moving_witch').css("top"));

				$('#moving_witch').css('top',mouseY);
	  		 	$('#moving_witch').css('left',mouseX);

	  		 	
	  		 	if(witchX < mouseX)
	  		 	{
	  		 		$('#moving_witch').css('transform', 'rotateY(360deg)');
	  		 	}
	  		 	else
	  		 	{
	  		 		$('#moving_witch').css('transform', 'rotateY(180deg)');

	  		 	}
			});

		});

//cloud motion
		$(document).scroll(function()
		{
			var window_pos = $(this).scrollLeft();
			//alert(window_pos);
			$('.moving_cloud_div img').css('left', -(window_pos * .05) + 'px');
		});

//floor motion
		$(document).scroll(function()
		{
			var window_pos = $(this).scrollLeft();
			//alert(window_pos);
			$('.moving_floor_div img').css('left', -(window_pos * .4) + 'px');
		});

//mob scroll
		mob_scroll_posn = $('.mob_div').scrollTop();

		$('.mob_div').scroll(function()
		{
			var mob_pos = $(this).scrollTop();

		//cloud motion and floor motion
			$('.moving_cloud_div img').css('left', -(mob_pos * .05) + 'px');
			$('.moving_floor_div img').css('left', -(mob_pos * .4) + 'px');
		});

//ajax on menu items
		$('.close_icon').click(function()
		{
			$('.ajax_loading_bckgrnd').fadeOut(800);
			$('.ajax_loading_div').addClass('ajax_loading_entry');
		});


		$('.spons_div').click(function()
		{
			$('.ajax_loading_bckgrnd').fadeIn(800);
			$('.ajax_loading_div').removeClass('ajax_loading_entry');
		});

		$('.sch_div').click(function()
		{
			$('.ajax_loading_bckgrnd').fadeIn(800);
			$('.ajax_loading_div').removeClass('ajax_loading_entry');
		});

		$('.acco_load').click(function()
		{
			$('.ajax_loading_bckgrnd').fadeIn(800);
			$('.ajax_loading_div').removeClass('ajax_loading_entry');
		});
		
		$('.register').click(function()
		{
			$('.ajax_loading_bckgrnd').fadeIn(800);
			$('.ajax_loading_div').removeClass('ajax_loading_entry');

		});
	</script>

<!---------stars in background---------->
	<script src="js/jquery-stars.js"></script>
	<script>
		$(document).jstars({
			image_path: 'images',
			style: 'yellow',
			frequency: 20,
			delay: 400
		});
		
	</script>

	<script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>
