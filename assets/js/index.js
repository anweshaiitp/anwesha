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
	jQuery(".logo img").delay(1000).animate({height:128,width:150},200);
	$("#preloader").delay(2000).css("z-index","1");
	if($(window).width()>960){
		$('.logo').delay(1000).transition({ x: '-40%', y: '100%' });
	} else {
		$('.logo').delay(1000).transition({ x: '0%', y: '100%' });
		$(".parallelogram").delay(1000).css("z-index","2");
		$(".sponsimg").delay(1000).css("z-index","2");

	}

	var Today 	= new Date();
	var z1 = DayDiff(Today);

	if(z1>1)
		$('.hidden').html(z1+" days to go...");
	else if(z1==1)
		$('.hidden').html(z1+" day to go...");
	else if(z1>-3)
		$('.hidden').html("The game is on!");
	else
		$('.hidden').html("Hope to see you next year!");
	 
})


function gallery(){
$('#galleryload').load('gallery.html');
}


function DayDiff(CurrentDate){
	var TYear=CurrentDate.getFullYear();
    var TDay=new Date("January, 27, 2017");
    TDay.getFullYear(TYear);
    var DayCount=(TDay-CurrentDate)/(1000*60*60*24);
    DayCount=Math.round(DayCount); 
    return(DayCount);
}
