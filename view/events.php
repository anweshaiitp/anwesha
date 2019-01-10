<html>
<head>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <!-- Latest compiled and minified CSS -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <link href="/assets/css/styleevent.css" rel="stylesheet">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../assets/css/home2019.css">

    <style>
        *,
	*:before,
	*:after {
		box-sizing: border-box;
	}
            html,
            body {
            margin: 0;
            padding: 0;
            }
  
            body{
                background-color: black;
            }
            /* Header */
            .header {
            background-color: #1c1c1c;
            font-family: 'Oswald', sans-serif;
            }

            .header p {
            color: #fff;
            font-size: 16px;
            text-align: center;
            margin: 0;
            padding: 10px;
            text-transform: uppercase;
            cursor: pointer;
            }
  
            /* Main */
            .main {
            background: url(/assets/img/anw_bg.jpeg) no-repeat center center; 
            background-size: cover;
            height: 100%;
            }

            .row{
                /* margin-top:10px; */
                padding-top:40px;
                margin-right: 0%;
                margin-left: 0%;
            }

            #accordion {
            /*background-color: black;*/
            /*border: 1px solid black;*/
            margin-top: 20px;
            }

            .ui-accordion-header {
            background-color:black;
            border-bottom: 3px solid gray;
            color: #fff;
            cursor: pointer;
            font-family: 'Oswald', sans-serif;
            font-size: 30px;
            margin: 5px;
            outline: 0;
            padding: 8px 20px;
            text-transform: uppercase;
                background: linear-gradient(124deg, #ff2400, #e81d1d, #e8b71d, #e3e81d, #1de840, #1ddde8, #2b1de8, #dd00f3, #dd00f3);
                background-size: 1800% 1800%;

                -webkit-animation: rainbow 18s ease infinite;
                -z-animation: rainbow 18s ease infinite;
                -o-animation: rainbow 18s ease infinite;
                animation: rainbow 18s ease infinite;
            }

                @-webkit-keyframes rainbow {
                    0%{background-position:0% 82%}
                    50%{background-position:100% 19%}
                    100%{background-position:0% 82%}
                }
                @-moz-keyframes rainbow {
                    0%{background-position:0% 82%}
                    50%{background-position:100% 19%}
                    100%{background-position:0% 82%}
                }
                @-o-keyframes rainbow {
                    0%{background-position:0% 82%}
                    50%{background-position:100% 19%}
                    100%{background-position:0% 82%}
                }
                @keyframes rainbow { 
                    0%{background-position:0% 82%}
                    50%{background-position:100% 19%}
                    100%{background-position:0% 82%}
                }
            
	    #techEvents > li, #cultEvents > li, #artsEvents > li{
            cursor:pointer;
            display: inline-block;
            padding: 8px 12px;
            font-size:16px;
            /* border-radius:.5rem; */
            box-shadow: 0px 0px 6px 4px white;
            margin: 11px 5px 0px;
            background-color: black;
            font-family: 'Oswald', sans-serif;
            text-transform:uppercase;
}


	    
        #techEvents > li:hover, #cultEvents > li:hover, #artsEvents > li:hover{
            cursor:pointer;
            
        }

            .ui-accordion-content {
            font-family: Roboto, sans-serif;
            font-size: 14px;
            padding: 0px 20px;
            height: 420px;
            }

            .ui-accordion-content ul {
            list-style: none;
            padding: 0;
            }

            .ui-accordion-content li {
            padding: 1px 0;
            color: #fff;
            }

            .main .col-md-9{
                margin-top: 20px;
            }
#mainarea>center>div:nth-child(1)
	{
		padding: 10px;
		border-radius: 10px;
		background: #63262229;
		box-shadow: #48b3c7 0px 0px 10px;	   
	}
        #RuleBtn, #RegBtn
	{
		margin: 0;
		/*hi*/
		padding: 0;
		color: black;
		text-decoration: none;
		padding: 10px;
		border-radius: 3px;
		font-size: 125%;
		font-weight: bold;
		margin: 5px;
		background: white;
/*		display: inline-block;*/
		height: 35px;
		vertical-align: middle;
                box-sizing: inherit;
	}
/*        @-webkit-keyframes spinner {
    from { -webkit-transform: rotateY(-180deg);    }
    to   { -webkit-transform: rotateY(0deg); }
  }
  @-webkit-keyframes spinner-back {
    from { -webkit-transform: rotateY(0deg);    }
    to   { -webkit-transform: rotateY(180deg); }
  }

 
        @keyframes spinner {
            from {
              -moz-transform: rotateY(-180deg);
              -ms-transform: rotateY(-180deg);
              transform: rotateY(-180deg);
            }
            to {
              -moz-transform: rotateY(0deg);
              -ms-transform: rotateY(0deg);
              transform: rotateY(0deg);
            }
          }
          @keyframes spinner-back {
            from {
              -moz-transform: rotateY(0deg);
              -ms-transform: rotateY(0deg);
              transform: rotateY(0deg);
            }
            to {
              -moz-transform: rotateY(180deg);
              -ms-transform: rotateY(180deg);
              transform: rotateY(180deg);
            }
          }*/
        .back{
            background-color: whitesmoke;
            opacity: 0.9;
            margin-left: -15px;
/*            margin-right: -15px;*/
            width: 100%;
            /*height: 80% ;*/
            
        }
        .back iframe{
/*            position: absolute;*/
            height: 100%;
            width: 100%;
            border: none;
            /*backface-visibility:             hidden;
        -moz-backface-visibility:    hidden;
        -ms-backface-visibility:     hidden;
        -o-backface-visibility:      hidden;
        -webkit-backface-visibility: hidden;*/
        }
        .col-md-9 {
            margin: 1em auto;
            /*-webkit-perspective: 1200px;
            -moz-perspective: 1200px;
            -ms-perspective: 1200px;
            perspective: 1200px;*/
        }
        iframe{
            
            /*-webkit-animation-name: spinner;
    -webkit-animation-timing-function: ease-in-out;
    -webkit-animation-iteration-count: 1;
    -webkit-animation-duration: 1s;

    animation-name: spinner;
    animation-timing-function: ease-in-out;
    animation-iteration-count: 1;
    animation-duration: 1s;

    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transform-style: preserve-3d;*/
        }
        .caption{
            display: none;
            position: absolute;
            top: 10;
            left: 0;
            color: black;
            background-color: black;
            padding: 8px 12px;
            /*border-radius: 8px;*/
            box-shadow: 0px 0px 6px 4px white;
            
        }
        .caption a{
            color: white;
            font-family: 'Oswald', sans-serif;
            text-decoration: none;
        }
        .caption a:hover{
            color: rgba(254,254,254,0.8) ;
        }
        @media screen and (min-width:1500px){
            .back{
                margin: 0px auto;
                width: 80%;
                position: relative;
            }
        }
        @media screen and (max-width:810px){
            .event_container{
                width:500px;
            }
        }
        @media screen and (max-width:532px){
            .headwrap{
                padding: 140px 0px 0px 19px;
            }
            .event_container{
                width:100%;
                
            }
            .event_details{
                width: auto;
                padding-left: 0px;
            }
            /*new added*/
            .headwrap .title1{
                font-size: 28px;
            }
            .back{
                margin: 0px auto;
                position: relative;
            }
            .back iframe{
                height: 80%;
            }
            .event_timing{
                padding-left: 20px;
                text-align: left;
            }
		.bg-image{
                transform: skewY(0deg);
                -webkit-transform: skewY(0deg);
            }
        }
    </style>
    <title>Events | Anwesha '19 IITP</title>
</head>
<body>

<div id="menu">
    <ul data-start="color:rgb(0,0,0); border-color:rgb(0,0,0); background: rgba(255,255,255,0.9);     box-shadow: 0 0 0px rgba(255,255,255,1);"
      data-500="color:rgb(0,0,0); border-color:rgb(0,0,0); background: rgba(255,255,255,0.9);     box-shadow: 0 0 10px rgba(255,255,255,1);"
      class="skrollable skrollable-between" style="border-radius:20px;color: rgb(0,0,0); border-color: rgb(0,0,0); background: rgba(255,255,255,0.9); box-shadow: rgba(255,255,255,0, 1) 0px 0px 0px;">
      <!-- <li id="home-link"><a href="#start-section">HOME</a></li> -->
      <li><a href="/" id="">Back to Home Page</a></li>
      <!-- <li><a href="/view/index.html/#About" id="">About</a></li>
      <li><a href="/view/spons.html" id="">Sponsors</a></li>
      <li><a href="/view/index.html/#Contact-Us" id="">Contact Us</a></li>
      <li><a href="/view/index.html/#Audition" id="">Auditions</a></li>
      <li><a href="/view/ca.php" id="">Campus Ambassador</a></li> -->
      
    </ul>
  </div>
  <div id="mobile-nav-btn" class="mobile-nav-btn dark " data-100="opacity:1;" data-500="opacity:0; "
    style="opacity: 1;"></div>
  <div class="mobile-nav-btn white " data-100="opacity:0;" data-500="opacity:1; " style=""></div>
  <div id="mobile-nav" style="background-color:black">
    <img src="/assets/img/close.png" class="close" alt="close menu" width="30" height="30">
    <ul>
      <li><a href="/view/index.html" id="">Back to Home Page</a></li>
    
      
    </ul>
  </div>
  
    <div class="main">
      
        <div class="row">
            <div class="col-10 col-md-3">
                <div id="accordion">
                    <h3>TECHNICAL EVENTS</h3>
                        <div>
                            <ul id="techEvents">
                            
                            </ul>
                        </div>
                    <h3>CULTURAL EVENTS</h3>
                        <div>
                            <ul id="cultEvents">
                            </ul>
                        </div>
                    <h3>ARTS & WELFARE EVENTS</h3>
                        <div>
                            <ul id="artsEvents">
                            </ul>
                        </div>
                </div>
            </div>
    
            <div class="col-10 col-md-9" style="opacity: 0.9">              
                 <div class="tech_event">
                    <div class="event_container">
                    <!-- <img src="https://static-cdn.sr.se/sida/images/3117/787c33ac-5689-4e1c-aaf3-7db96093015a.jpg" alt="cover"   width="220" class="event_bg" /> -->
                        <div class="event_info">
                        <div class="bg-image"></div>
                            <div class="headwrap">
		    	<?php if(isset($match[1])) { ?>
				<div class="title1" id="eve_name"><?php echo ucwords(str_replace("-",' ',$match[1])); ?></div>
			<?php  } else {?>
                            <div class="title1" id="eve_name">Static Rush</div>
   			<?php  } ?>
                            </div> <!-- end details -->
                        </div> <!-- end hero -->
                        <div class="event_description">
                            <div class="event_timing">
                                <span class="tag" id="eve_date">2nd Feb</span><br>
                                <span class="tag" id="eve_time">1 pm</span>
                                <br>
                                <span class="tag" id="eve_venue">Boys Hostel, IITP </span>
                            </div> 
                            <div class="event_details">
                                <div id="event_short_desc">
                                    <p style="color:#1c1c1c" id="eve_short_desc">Remember snakes and ladders? Wanna live through it in the real world? Then Static Rush is your ultimate platform with a twist of electronics. With unlimited adventure and enthralling fun packed in every step you take, this one game will make you remember your childhood and with electronics embedded this one event is surely gonna be in your good books.</p>

                                </div>
                            <div id="event_long_desc">
                                <p style="color:#1c1c1c" id="eve_long_desc"></p>
                            </div>
                            <div id="event_organisers">
                                <h3 style="color:#1c1c1c">Organisers:</h3>
                                <ul style="list-style-type:none;color: #1c1c1c">
                                <li id="eve_organisers">Umang Jain (6394708415)
                                    <br>Rahul Anand (9430056694)</li>
                                </ul>
                                <div class="refrence">
                                    <a href="https://drive.google.com/open?id=1-OQFzE9tvPPAt-ulEFWf_hghgLRfV9wO" id="RuleBtn">Rulebook</a>
                                    <a id="RegBtn" data-eveid="10">Register</a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                 </div>
                <div class="back" style="display: none;">
                    <iframe src="#" ></iframe>
                    <div class="caption"><a href="#" id="toEvent">BACK</a></div>
                </div>

            
        </div>
  
    </div>

    <script>
  
        $(document).ready(function(){
            $("#event_long_desc").css({"display":"none"});
            $("#accordion").accordion({
            collapsible: true
            });
            $('.ui-accordion-content').css({"height":"auto"});
//                new added from here
                mq = window.matchMedia('(min-width:811px)');
                mq1 = window.matchMedia('(max-width:810px)');
                mq2 = window.matchMedia('(max-width:532px)');
                mq3 = window.matchMedia('(min-width:1500px)');
                wh = window.innerHeight;
//                console.log(wh);
                dh = document.documentElement.clientHeight;
//                console.log(dh);
                if(mq.matches){
                if(wh >= dh){
                    $('.main').css({"height":"100%"});
                }
                else{
                    $('.main').css({"height":"auto"});
                }}
            else{
                $('.main').css({"height":"auto"});
            }
            
            
            bg_naturalHeight =0;
            bg_naturalWidth =0;
            bg_url = $(".bg-image").css('background-image').replace('url(','').replace(')','').replace(/\"/gi, "");
//            console.log(bg_url);
            preloaderImage(bg_url);
            
            
    });
            $(".refrence").on('click','a#RuleBtn',function(){
                var rule_url = "";
                $('iframe').attr('src',rule_url);
//                $(".tech_event").fadeOut(100,function(){
//                    $(".back").fadeIn(800);
//                });
                   $(".tech_event").css({"display":"none"});
                   $(".back").fadeIn();
                    rule_url = $('#RuleBtn').attr('href');
                    rule_url = rule_url.substr(33);
                    $('iframe').attr("src","https://drive.google.com/file/d/" + rule_url + "/preview");
                    
//                    console.log(rule_url);
                
                $(".caption").fadeIn(1000);
                if(mq3.matches){
                var button_width = $('.caption').innerWidth();
                console.log("width is greater than 1500px");
                $('.caption').css({"left": - button_width});
                };
            return false;});
            $("#toEvent").click(function(){
                $('iframe').attr('src','');
                $(".tech_event").fadeIn(1000);
                $(".back").fadeOut(100);
                return false;
            });
    
    </script>
	<script>
            $(".event_details").on('click','a#ReadMore',function(){
                $('#event_long_desc').fadeIn(1000,function(){
                    $('#ReadMore').fadeOut(100);
//                    $(".event_description").slideDown()
                    eve_info__height = $(".event_info").height();
                    event_desc_height = $(".event_description").height();
                    if(mq.matches){
                    $(".event_container").css('height',eve_info__height + event_desc_height +'px');
                     console.log("width is greater than 811px")
                    
                    }
                    else{
                    if(mq1.matches){
                        if(mq2.matches){
                            $(".event_container").css('height', eve_info__height + event_desc_height +'px');
                            console.log("width is less than 532px")
                        }
                        else{
                            $(".event_container").css('height', eve_info__height + event_desc_height +'px');
                             console.log("width is less than 810px")
                        }
                    }
                    
                    }
                });
                
//                $(".event_container").css({"height":"750px"});
                
                
//                $(this).fadeOut(1000, function(){
//                    $("#event_long_desc").slideDown(1000);
//                    $(".event_container").slideDown(1000);
//                });
                return false;
            });
            $(".event_details").on('click','a#ShowLess',function(){
                eve_info__height = $(".event_info").height();
                event_desc_height = 0;
                $('#event_long_desc').fadeOut(500,function(){
                    $("#ReadMore").fadeIn(800);
                    event_desc_height = $(".event_description").height();
                    if(mq.matches){
                    $(".event_container").css('height',eve_info__height + event_desc_height + 'px');
//                     console.log("width is greater than 811px");
                    
                    
                    }
                    else{
                    if(mq1.matches){
                        if(mq2.matches){
                            $(".event_container").css('height', eve_info__height + event_desc_height +'px');
//                            console.log("width is less than 532px")
                        }
                        else{
                            $(".event_container").css('height', eve_info__height + event_desc_height +'px');
//                             console.log("width is less than 810px")
                            }
                        }
                    }
                });
                
//                content_height = $(".event_container").height();
//                event_long_desc_height = $("#event_long_desc").height();
                
//                $(".event_container").css({"height":"640px"});
                
//                $("#event_long_desc").slideUp(800,function(){
                    
//                });
                
                return false;
            }) ;
		//for loading of events in event content page
        function preloadImage(imageurl) {
            var img = new Image();
            img.src = imageurl;
        }
        function preloaderImage(imageurl) {
            var img = new Image();
            img.src = imageurl;
            img.onload = function(){
            bg_naturalHeight = img.naturalHeight;
            bg_naturalWidth = img.naturalWidth;
//            console.log("height " + bg_naturalHeight);
//            console.log("width " + bg_naturalWidth);
            bg_aspectRatio = bg_naturalHeight/bg_naturalWidth;
            event_info_height = bg_aspectRatio*$('.event_info').width();
            $('.event_info').css('height',event_info_height);
            }
            
            }
        function eve_coverswitch(cat ,imgurl) {
            console.log("eve_coverswitch called with", imgurl);
            if (imgurl == "" || imgurl == null) {
                $(".bg-image").css({"background-image":"url('https://www.iitp.ac.in/hostel/images/anwesha/img1.jpg')"});
                // $("#eve_cover").css("box-shadow","0 0 0 #FFFFFF");
//                $(".bg-image").css("font-size", "3em");
//                $('.bg-image').hide();
//                $(".bg-image").hide();
//                $(".bg-image").attr("src","#");
            } else {
                $(".bg-image").css({"background-image":"url(" + imgurl + ")"});
                $('.bg-image').show();
//                 $(cat + " #coveranc").attr("src", imgurl);
//                 if ($(window).width() > 960) {
//                     $(cat + " #eve_name").css("font-size", "5em");
//                 }
//                 $("#extrabr").show();
            }
            bg_url = $(".bg-image").css('background-image').replace('url(','').replace(')','').replace(/\"/gi, "");
            preloaderImage(bg_url);
        }
        function eve_imgswitch(imgurl) {
            if (imgurl == "" || imgurl == null) {
                $("#eve_img").attr("src", "");
                $("#eve_img").hide();
                $("#img_anchor").attr("href", "");
            } else {
                $("#eve_img").attr("src", imgurl);
                $("#img_anchor").attr("href", imgurl);
                $("#eve_img").show();
            }
        }
        function emptyresp(cat) {
            $('#eve_name').text("");
            $('#eve_tagline').text("");
            $('#eve_date').text("");
            $('#eve_time').text("");
            $('#eve_venue').text("");
            $('#eve_organisers').text("");
            $('#eve_short_desc').text("");
            $('#eve_long_desc').text("");
            // $(cat+ ' regbtn').attr("placeholder", "");
            // $(cat+ ' alt_regbtn').attr("href", "");
            $('#RuleBtn').attr("href", "");
            $('#RegBtn').attr("data-eveid", "-1");
            $('#RegBtn').removeAttr("href");
            $('#RegBtn').removeAttr("target");
            $('#regmsg').text('');
            $('#RuleBtn').hide();
            $('iframe').attr('src','');
            // $(cat+ ' #RegBtn').hide();
            // eve_imgswitch("");
            // eve_iconswitch("");
            eve_coverswitch(cat ,"");
            // $('#eve_cover').css("src","");
        }
        function getHTMLText(text) {
                if(text==null)
                    return "";
                text = text.replace(/[\u00A0-\u9999<>\&]/gim, function(i) {
                   return '&#'+i.charCodeAt(0)+';';
                });
                text = text.replace(/\n\n/g,"</br></p><p></br>").replace(/\n/g,"</br>").replace(/&quot;/g," ");
                return ""+text+"";
            }
        var events_data;
        var eventsmap = [];
        $.get("/allEvents", function (data, status) {
            console.log("Event Status : " + data[0]);
            if (status == 'success') {
                events_data = data[1];
                console.log("Events Data Updated");
                //try to preload coverpic and icon pic
                console.log("starting");
               events_data.forEach(function(evntDat){
                console.log(typeof(evntDat));
                    
                if(typeof(evntDat)=="Object" || evntDat.eveId>5)
                    eventsmap[evntDat.eveId] = evntDat;
                    console.log(typeof(evntDat));
                    console.log(evntDat);
                    preloadImage(evntDat['cover_url']);
                    preloadImage(evntDat['icon_url']);
                        //var widthYetT,widthYetC,widthYetM;
                        //    try{
                        //        widthYetT = $(".tech_eve span:last-child").position().left+$(".tech_eve span:last-child").width() - $(".tech_eve").position().left+ 100;
                         //       widthYetC = $(".cult_eve span:last-child").position().left+$(".cult_eve span:last-child").width() - $(".cult_eve").position().left+ 100;
                          //      widthYetM = $(".mgmt_eve span:last-child").position().left+$(".mgmt_eve span:last-child").width() - $(".mgmt_eve").position().left+ 100;
                          //  }catch(e){
                           //     widthYet =0;    
                          // }
                        if(evntDat.code==1){
                            //tech
                            //if(widthYet>$(".tech_eve").width()){
                            //    $(".tech_eve").append("<br>");
                            //}
                            $("#techEvents").append(" <li id='evetab"+evntDat.eveId+"' class='evetab' onclick='eveDisplay("+evntDat.eveId+")' eventUrl='"+evntDat.urlname+"' event_id='"+evntDat.eveId+"'>"+evntDat.eveName+"</li>");
                        }else if(evntDat.code == 2){
                            //cult
//                             if(widthYet>$(".cult_eve").width()){
//                                 $(".cult_eve").append("<br>");
//                             }
                            $("#cultEvents").append(" <li id='evetab"+evntDat.eveId+"' class='evetab' onclick='eveDisplay("+evntDat.eveId+")' eventUrl='"+evntDat.urlname+"' event_id='"+evntDat.eveId+"'>"+evntDat.eveName+"</li>");
                        }else if(evntDat.code == 3){
                            //mgmt
//                             if(widthYet>$(".mgmt_eve").width()){
//                                 $(".mgmt_eve").append("<br>");
//                             }
                            $("#artsEvents").append(" <li id='evetab"+evntDat.eveId+"' class='evetab' onclick='eveDisplay("+evntDat.eveId+")' eventUrl='"+evntDat.urlname+"' event_id='"+evntDat.eveId+"'>"+evntDat.eveName+"</li>");
                        }
                });
               console.log("map",eventsmap);
	<?php if(isset($match[1])) { ?>
		setTimeout(function(){ $("[eventUrl='<?php echo $match[1]; ?>']").click(); }, 1000);
	<?php  }?>
            } else
                console.log("Unable to get Events Data");
        }, "json");
        function formatData(data){
            if(data==null)
                return "";
        }
        function fillEve(cat, dataToFill){
            console.log("filling",dataToFill);
            emptyresp(cat);
            currPar = cat;
            if($('.tech_event').css('display') == "none"){
                $('.tech_event').css({"display":"block"});
                $('.back').css({"display":"none"});
            }
            $('#eve_name').html(getHTMLText(dataToFill.eveName));
            $('#eve_tagline').html(getHTMLText(dataToFill.tagline));
            $('#eve_date').html('Date:'+getHTMLText((dataToFill.date)?dataToFill.date:"To be announced"));
            $('#eve_time').html('Time:'+ getHTMLText((dataToFill.time)?dataToFill.time:"To be announced"));
            $('#eve_venue').html('Venue:' +getHTMLText((dataToFill.venue)?dataToFill.venue:"To be announced"));
            $('#eve_organisers').html(getHTMLText(dataToFill.organisers));
        if(getHTMLText(dataToFill.long_desc) =="" | getHTMLText(dataToFill.long_desc) == null){
            $('#eve_short_desc').html(getHTMLText(dataToFill.short_desc));
            $('#eve_short_desc').html(getHTMLText(dataToFill.long_desc));
            }
            else{
            $('#eve_short_desc').html(getHTMLText(dataToFill.short_desc)+ '<a href="#" id="ReadMore"> read more</a>');
            $('#eve_long_desc').html(getHTMLText(dataToFill.long_desc) + '<a href="#" id="ShowLess"> show less</a>');
            }
            // $(cat+ ' #regbtn').attr("placeholder", ""));
            // $(cat+ ' #alt_regbtn').attr("href", ""));
            $('#RuleBtn').attr("href", dataToFill.rules_url);
            if(dataToFill.rules_url==null || dataToFill.rules_url=="")
                $('#RuleBtn').hide();
            else
                $('#RuleBtn').show();
            // $(cat+ ' #RegBtn').attr("", dataToFill.reg_url);
            $('#RegBtn').attr("data-eveid", dataToFill.eveId);
            if(dataToFill.reg_url!=null && dataToFill.reg_url!=""){
                $('#RegBtn').attr("href", dataToFill.reg_url);
                $('#RegBtn').attr("target","_blank");
            }else{
                $('#RegBtn').removeAttr("href");
                $('#RegBtn').removeAttr("target");
            }
            $('#regmsg').text('');
            eveglid = dataToFill.eveId;
            console.log("eveglid",eveglid);
            $("#event_long_desc").css({"display":"none"});
            $(".event_container").css({"height":"auto"});
            // if(dataToFill.reg_url==null || dataToFill.reg_url=="")
            //     $(cat+ ' #RegBtn').hide();
            // else
            //     $(cat+ ' #RegBtn').show();
            eve_coverswitch(cat, dataToFill.icon_url);
       }
        // $("#events > span").click(function(){
        //  console.log("clicked")
        //  $('.tech_eve').children().not(this).removeClass('active-tab');
        //  $(this).addClass('active-tab');
        //  fillEve("tech_content",eventsmap[$(this).attr('event_id')]);
        // })
        function eveDisplay(eveId){
            var type = "tech";
            if(eventsmap[eveId].code==1)
                type = "tech";
            else  if(eventsmap[eveId].code==2)
                type = "cult";
            else  if(eventsmap[eveId].code==3)
                type = "mgmt";
            console.log("clicked22")
            $('.'+type+'_eve').children().not("#evetab"+eveId).removeClass('active-tab');
            $("#evetab"+eveId).addClass('active-tab');
            fillEve("."+type+"_content",eventsmap[eveId]);
        }
// 	
		</script>
</body>

</html>
