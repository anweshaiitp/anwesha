// Section Scroll 
var currState = "start-section"

var nextState = {
    "start-section":"After-Movie",
    "After-Movie":"About",
    "About":"Contact-Us",
    "Contact-Us":0
};

var prevState = {
    "start-section":0,
    "After-Movie":"start-section",
    "About":"After-Movie",
    "Contact-Us":"About"
};

var throttled = _.throttle(handleScroll, 1000,{trailing: false});

function debounce(method, delay, e) {
    clearTimeout(method._tId);
    method._tId= setTimeout(function(){
        method(e);
    }, delay);
}


function handleScroll(e) { 
    if(e.deltaY>0){
        if(nextState[currState]!=0){
            document.querySelector("#"+nextState[currState]).scrollIntoView({ 
            behavior: 'smooth', 
            block: 'start'
            });
            document.querySelector("#dot-"+currState).classList.remove('active')
            document.querySelector("#dot-"+nextState[currState]).classList.add('active')
            currState = nextState[currState];
        }
    }else{
        if(prevState[currState]!=0){
            document.querySelector("#"+prevState[currState]).scrollIntoView({ 
            behavior: 'smooth', 
            block: 'start'
            });
            document.querySelector("#dot-"+currState).classList.remove('active')
            document.querySelector("#dot-"+prevState[currState]).classList.add('active')
            currState = prevState[currState];
        }
    }
}

window.addEventListener("wheel", function(e){
    // debounce(handleScroll,100,e)
    throttled(e);
});
    
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

// Aftermovie Iframe sizes
$(function () {
    var afterMovieIframe =  $("#afterMovieVideo > iframe");
    afterMovieIframe.width($(window).width());   
    afterMovieIframe.height($(window).width()*(9/16));   
    afterMovieOffset = afterMovieIframe.offset();
    console.log(afterMovieOffset);
    if(!isMobile){
        $("#cover").css('top',afterMovieOffset.top);   
        $("#cover").height(afterMovieIframe.height());   

    }else{
        $("#cover").hide();
        // document.body.addEventListener('touchmove', function(e){ e.preventDefault(); });
    }

    // side section click navigation handler
    $(".dot").click(function () {
        if ($(this).hasClass('active')){}
        else{
            $("#dot-"+currState).removeClass('active');
            $(this).addClass('active');
            document.querySelector("#"+$(this).attr('id').substring(4)).scrollIntoView({ 
                behavior: 'smooth', 
                block: 'start'
            });
            currState = $(this).attr('id').substring(4);
        }
    })
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


AOS.init({
    duration: 1000
  });