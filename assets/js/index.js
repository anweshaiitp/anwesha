(function() {
	'use strict';
	
	var isOpen	= true;
	var button	= document.querySelector('#expand-navigation');
	var wrapper = document.querySelector('.wrapper');
	var overlay = document.querySelector('.overlay');
	
	button.addEventListener('click', navigationHandler);
	document.addEventListener('click', closeNavigation);
	
	function navigationHandler(event) {
		if (event == null) {
			event = window.event;
		}
		
		event.stopPropagation();
		
		!isOpen ? openNavigation() : closeNavigation();
	}
	
	function openNavigation() {
		isOpen = true;
		
		button.innerHTML	= '-';
		wrapper.className = 'wrapper opened';
		overlay.className = 'overlay on-overlay';
	}

	function closeNavigation() {
		isOpen = false;
		
		button.innerHTML = '+';
		wrapper.className = 'wrapper';
		overlay.className = 'overlay';
	}
	document.onload=closeNavigation();
})();


jQuery(window).load(function() {
	jQuery("#preloader .circle").delay(1000).fadeOut(100);
	jQuery("#preloader .tagline").delay(1000).fadeOut(100);
	jQuery("#preloader .bg").delay(1000).fadeOut(100).transition({ x: '-100%' });
	jQuery(".anwlogo").delay(1000).animate({height:150,width:150},200);
	$("#preloader").delay(5000).css("z-index","300");
	$("#medal,#wheel").fadeIn(2000);
	if($(window).width()>960){
		// $('.logo').delay(1000).transition({ x: '-30%', y: '90%' });
		// $('.logo').delay(1000).css('text-align','left');
		$('.logo').delay(1000).animate({"right":"10px","bottom":"70px",y:'0%',x:'0%'});
		// setTimeout(function(){
		// 	$('.logo').css({"width":"50%"});
		// },1000)
		
	} else {
		$('.logo').delay(1000).animate({"left":"10px","bottom":"10px",y:'0%',x:'0%'});
		// var logo=$(window).height()-$("#");
		$(".anwlogo").animate({height:100,width:100},200);
		$(".titlespons").delay(500).animate({height:40,width:160},200);

		// $(".titlespons").css("bottom","0");
		// $(".titlespons").css("left","0");
		// $(".parallelogram").delay(1000).css("z-index","5");
		// $(".medal").delay(1000).css("z-index","3");
		// $(".wheel").delay(1000).css("z-index","3");
		// $(".sponsimg").delay(1000).css("z-index","2");

	}

	var Today 	= new Date();
	var z1 = DayDiff(Today);

	if(z1>1)
		$('.hidden-count').html(z1+" days to go...");
	else if(z1==1)
		$('.hidden-count').html(z1+" day to go...");
	else if(z1>-3)
		$('.hidden-count').html("The game is on!");
	else
		$('.hidden-count').html("Hope to see you next year!");
	 
})


function gallery(){
$('#galleryload').load('gallery.html');
}


function DayDiff(CurrentDate){
	var TYear=CurrentDate.getFullYear();
    var TDay=new Date("January, 28, 2017");
    TDay.getFullYear(TYear);
    var DayCount=(TDay-CurrentDate)/(1000*60*60*24);
    DayCount=Math.round(DayCount); 
    return(DayCount);
}
