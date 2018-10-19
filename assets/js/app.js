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
    }
  }
$(function () {
    var afterMovieIframe =  $("#afterMovieVideo > iframe");
    afterMovieIframe.width($(window).width());   
    afterMovieIframe.height($(window).width()*(9/16));   
    afterMovieOffset = afterMovieIframe.offset();
    console.log(afterMovieOffset);
    if(!isMobile){
        $("#cover").css('top',afterMovieOffset.top);   
        $("#cover").height(afterMovieIframes.height());   

    }
    // $("#cover").click(function () { 
    //     console.log('cl');
    //     callPlayer("amParent","playVideo");
        
    // });
});
var isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
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
var s = skrollr.init();

skrollr.menu.init(s, {
    animate: true,
    easing: 'sqrt',
    scale: 1,
    duration: function (currentTop, targetTop) {
        return 500;
    },
    complexLinks: false,
    change: function (newHash, newTopPosition) {},
    updateUrl: false
});
window.addEventListener("load", function () {
    setTimeout(function () {
        window.scrollTo(0, 1);
    }, 0);
});
