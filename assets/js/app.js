var playerPlayingState = false;
function callPlayer(frame_id, args) {
    console.log("afterMovieVideo",playerPlayingState);
    var func = (playerPlayingState)? "pauseVideo":"playVideo";
    playerPlayingState = !playerPlayingState;
    if (window.jQuery && frame_id instanceof jQuery) frame_id = frame_id.get(0).id;
    var iframe = document.getElementById(frame_id);
    if (iframe && iframe.tagName.toUpperCase() != 'IFRAME') {
      iframe = iframe.getElementsByTagName('iframe')[0];
    }
    if (iframe) {
      // Frame exists,
      iframe.contentWindow.postMessage(JSON.stringify({
        "event": "command",
        "func": func,
        "args": args || [],
        "id": frame_id
      }), "*");
    // }
  }
}
var isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
$(function () {
    var afterMovieIframe =  $("#afterMovieVideo > iframe");
    var windowH = $(window).height();
    var windowW = $(window).width();
    var iframeH = 0;
    if (windowH < windowW*(9/16)){
        iframeH = $(window).height();
        afterMovieIframe.height(iframeH);
        afterMovieIframe.width(iframeH*(16/9));
    }else{
        afterMovieIframe.width($(window).width());   
        afterMovieIframe.height($(window).width()*(9/16));   
        iframeH = $(window).width()*(9/16);
    }
    afterMovieOffset = afterMovieIframe.offset();
    console.log(afterMovieOffset);
    if(!isMobile){
        // afterMovieIframe.css('top','0px');   
        // $("#cover").css('top',afterMovieOffset.top);   
        $(".cover").height(afterMovieIframe.height());   
        $(".cover").width(afterMovieIframe.width());   
        $("#afterMovieVideo").css('top',Math.max($(window).height() + ($(window).height()-iframeH)/2, $(window).height()));           
    }else{
        // $("#afterMovieVideo").css('transform','translateY('+ ($(window).height()-iframeH)/2 +')');
    }

    // $("#cover").click(function () { 
    //     console.log('cl');
    //     callPlayer("amParent","playVideo");
        
    // });
    // $("#map").width($(window).width());
});
if (isMobile) {
    $(".mobile-nav-btn").show();
    $("#cta, #menu").hide();
    $(".mobile-nav-btn").on("click", function () {
        $("#mobile-nav").show();
    });
    $("#mobile-nav").on("click", function () {
        $("#mobile-nav").hide();
    });
}else{
    
}
// var s = skrollr.init();

// skrollr.menu.init(s, {
//     animate: true,
//     easing: 'sqrt',
//     scale: 1,
//     duration: function (currentTop, targetTop) {
//         return 500;
//     },
//     complexLinks: false,
//     change: function (newHash, newTopPosition) {},
//     updateUrl: false
// });
// window.addEventListener("load", function () {
//     setTimeout(function () {
//         window.scrollTo(0, 1);
//     }, 0);
// });


AOS.init({
    duration: 1000
  });
$(window).bind("load", function() {
    $("#splash").addClass("bg2");
    $("#splash > #init").fadeOut("fast",function(){});
    $("#splash").delay(4000).fadeOut(1000);      
 });
