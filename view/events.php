<html>
<head>
    <?php if(isset($match[2])){
        require('model/model.php');
        require('dbConnection.php');
        $conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

        $evedat = Events::getEventDetails($match[2],$conn);
        if($evedat[0]==1){
            $desc = ($evedat[1]['short_desc']==null || $evedat[1]['short_desc']=="")?$evedat[1]['short_desc']:$evedat[1]['long_desc'];
            ?>
            <link href="/images/logo_favi.png" rel="icon" >
            <title><?php echo $evedat[1]['eveName']; ?> | Events | Anwesha '18</title>
	  <meta name="description" content="<?php echo $desc; ?>" />
	  <META NAME="Keywords" CONTENT="Anwesha,IIT Patna,IITP,IIT,college,fest,<?php echo $evedat[1]['eveName']; ?>">
	  <meta name="theme-color" content="#2b2b2b">
	  <meta itemprop="name" content="<?php echo $evedat[1]['eveName']; ?> | Events | Anwesha '18">
	  <meta itemprop="description" content="<?php echo $desc; ?>">
	  <meta itemprop="image" content="//anwesha.info/images/anw_theme.jpg">
	  
	  <meta name="twitter:card" content="summary_large_image">
	  <meta name="twitter:site" content="@anweshaiitp">
	  <meta name="twitter:title" content="<?php echo $evedat[1]['eveName']; ?> | Events | Anwesha '18">
	  <meta name="twitter:description" content="<?php echo $desc; ?>">
	  <meta name="twitter:creator" content="@anweshaiitp">
	  
	  <meta name="twitter:image:src" content="//anwesha.info/images/anw_theme.jpg">
	  
	  <meta property="og:title" content="<?php echo $evedat[1]['eveName']; ?> | Events | Anwesha '18" />
	  <meta property="og:type" content="article" />
	  <meta property="og:url" content="//anwesha.info/" />
	  <meta property="og:image" content="//anwesha.info/images/anw_theme.jpg" />
	  <meta property="og:description" content="<?php echo $desc; ?>" />
	  <meta property="og:site_name" content="Anwesha2k18" />
	  <meta property="article:published_time" content="2017-10-11T05:59:00+01:00" />
	  <meta property="article:modified_time" content="2017-10-12T19:08:47+01:00" />
	  <meta property="article:section" content="<?php echo $desc; ?>" />
        <?php }
    }else if(isset($match[1])){
        if($match[1] == 1 ){
            echo "<title>Technical Events | Anwesha 2018</title>";
        }else if($match[1] == 2 ){
            echo "<title>Cultural Events | Anwesha 2018</title>";
        }else if($match[1] == 3 ){
            echo "<title>Arts and Welfare Events | Anwesha 2018</title>";
        }
    }else{
        echo "<title>Events | Anwesha 2018</title>";
    } ?>
    

    <meta name="viewport" content="width=device-width, initial-scale= 1">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/images/logo_favi.png" rel="icon">

    <!--------styling for events page---------->
    <style type="text/css">
        body
        {
            overflow-y: scroll;
        }
        #RegBtn{
            cursor:pointer;
        }
        @media screen and (max-width: 900px) {
           
        }
    </style>
</head>

<body>

<!---------header-----bar-->
    <div class="header_div">
        <div class="menu_toggle">
            <img src="/images/skull_menu.png">
            <span> MENU </span>
        </div>
    </div>

<!-----menu----bar------>
    <div class="menu_bar">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/events/">Events</a></li>
            <!-- <li class="sch_div">Schedule</li> -->
            <li><a href="https://www.facebook.com/pg/anwesha.iitpatna/photos/?ref=page_internal" target="_blank">Gallery</a></li>
            <li><a href="/team/">Team</a></li>
            <li class="spons_div">Sponsors</li>
            <li class="acco_load">Hospitality/Accomodation</li>
            <li class="register">Register</li>
            <li class="ca"><a href="/ca/" target="_blank">Campus Ambassador</a></li>
        </ul>
    </div>

<!-----doors---->
    <div class="menu_backgrnd">
        <div class="overlay"></div>
        <img class="creep" src="/images/creep.png">
        <br>
        <img class="boundary" src="/images/bound.png">
    </div>

<!-----moving ----witch------>
    <img id="moving_witch" class="moving_witch" src="/images/witch_right_1.png">

<!-----fixed ----cloud------>
    <div class="cloud_div"></div>

<!-----moving ----cloud------>
    <div class="moving_cloud_div">
        <img src="/images/moving_cloud.png">
    </div>

<!--events page content-------->
    <div class="events_div">

        <div class="events_tab">
            <button class="tech_button">Technical</button>
            <button class="cult_button">Cultural</button>
            <button class="arts_button">Arts & Welfare</button>
        </div>
        <?php if(isset($match[2])){?>
            <center> <img src="/images/load.gif" id="bodyajaxLoadWait" alt="" style="transform: scale(0.5);"> </center>
        <?php } ?>
        <div id="event_cat_div" class="tech_event">

            <p class="events_title">Technical Events</p>
            <div id="events" class="tech_eve">
            </div>

            <div class="tech_content">
                <center> <img src="/images/load.gif" id="ajaxLoadWait" alt="" style="transform: scale(0.5);"> </center>
                <div id="mainarea"  style='display:none;color:white;padding:2em'>
                    <center>
                        <div id="">
                            <span id="headwrap" style="">
                                <span id="headwr" style="display: inline">
                                    <!-- <img src="http://via.placeholder.com/100x100" style="height: 50px;display: inline;" placeholder="Icon" id='eve_icon'>&nbsp;&nbsp;&nbsp;&nbsp; -->
                                    <h1 id='eve_name'>
                                        Event Name
                                    </h1>
                                </span>
                                <br>
                                <span id='eve_tagline' style="font-size: 1.5em;margin-bottom: 30px;font-style: italic;text-shadow: #000000 0px 0px 20px;">
                                    Event TagLine
                                </span>
                            </span>
                        </div>
                        <br>
                        <!-- <div id="dummyspace" style="width:100%;height:300px"></div> -->
                        <a target="_blank" id="coveranc"><img src="" alt="" id="eve_cover" style="max-width:80%;max-height:50%"></a>
                        <br><br>

                        <span id='eve_short_desc' style="font-size: 1.5em;">
                            Event Short Desc
                        </span>
                        <br>
                        <span id='eve_long_desc' style="font-family: 'Roboto', sans-serif;font-size: 1.5em;text-align:justify;text-justify: inter-word;">
                            Event Long Desc
                        </span>
                        <br>

                        <span style="font-size: 1.8em">Date:</span>
                        <span id='eve_date' style="font-size: 1.8em;">
                            DATE
                        </span>
                        <br>
                        <br>
                        <span style="font-size: 1.8em">Time:</span>
                        <span id='eve_time' style="font-size: 1.8em;">
                            TIME
                        </span>
                        <br>
                        <br>
                        <span style="font-size: 1.8em">Venue:</span>
                        <span id='eve_venue' style="font-size: 1.8em;">
                            VENUE
                        </span>
                        <br>
                        <br>
                        <div id='eve_organisers_head'>
                            <span style="font-size: 1.8em">Organisers :</span>
                            <div id='eve_organisers' style="">
                                
                            </div>
                        </div>
                        <h3 id="regmsg"></h3>
                        <br>
                        <a href="" id="RuleBtn" target="_blank">Rulebook</a>
                        <a id="RegBtn" data-eveid="-1" >Register</a>
                        <br>

                        <a href="" id="img_anchor" target="_blank">
                            <img src="" style="display: none" height="200px" />
                        </a>
                    </center>
                </div>
            </div>
        </div>

        <div id="event_cat_div"  class="cult_event">
            <p class="events_title">Cultural Events</p>
            
            <div id="events" class="cult_eve">
            </div>

            <div class="cult_content">
                <center> <img src="/images/load.gif" id="ajaxLoadWait" alt="" style="transform: scale(0.5);"> </center>
                <div id="mainarea"  style='display:none;color:white;padding:2em'>
                    <center>
                        <div id="">
                            <span id="headwrap" style="">
                                <br>
                                <!-- <span id="extrabr"><br><br><br><br></span> -->
                                <span id="headwr" style="display: inline">
                                    <!-- <img src="http://via.placeholder.com/100x100" style="height: 50px;display: inline;" placeholder="Icon" id='eve_icon'>&nbsp;&nbsp;&nbsp;&nbsp; -->
                                    <h1 id='eve_name'>
                                        Event Name
                                    </h1>
                                </span>
                                <br>
                                <span id='eve_tagline' style="font-size: 1.5em;margin-bottom: 30px;font-style: italic;text-shadow: #000000 0px 0px 20px;">
                                    Event TagLine
                                </span>
                            </span>
                        </div>
                        <br>
                        <!-- <div id="dummyspace" style="width:100%;height:300px"></div> -->
                        <a target="_blank" id="coveranc"><img src="" alt="" id="eve_cover" style="max-width:80%;max-height:50%"></a>
                        <br><br>

                        <span id='eve_short_desc' style="font-size: 1.5em;">
                            Event Short Desc
                        </span>
                        <br>
                        <span id='eve_long_desc' style="font-family: 'Roboto', sans-serif;font-size: 1.5em;text-align:justify;text-justify: inter-word;">
                            Event Long Desc
                        </span>

                        <span style="font-size: 1.8em">Date:</span>
                        <span id='eve_date' style="font-size: 1.8em;">
                            DATE
                        </span>
                        <br>
                        
                        <span style="font-size: 1.8em">Time:</span>
                        <span id='eve_time' style="font-size: 1.8em;">
                            TIME
                        </span>
                        <br>
                        
                        <span style="font-size: 1.8em">Venue:</span>
                        <span id='eve_venue' style="font-size: 1.8em;">
                            VENUE
                        </span>
                        <br>
                        
                        <div id='eve_organisers_head'>
                            <span style="font-size: 1.8em">Organisers :</span>
                            <div id='eve_organisers' style="">
                                #Org1
                            </div>
                        </div>
                        <h3 id="regmsg"></h3>
                        <br>
                        <a href="" id="RuleBtn" target="_blank">Rulebook</a>
                        <a id="RegBtn" data-eveid="-1" >Register</a>
                        <br>

                        <a href="" id="img_anchor" target="_blank">
                            <img src="" style="display: none" height="200px" />
                        </a>
                    </center>
                </div>
            </div>
        </div>

        <div id="event_cat_div"  class="arts_event">
            <p class="events_title">Arts & Welfare Events</p>

            <div id="events" class="mgmt_eve">
            </div>

            <div class="mgmt_content">
                <center> <img src="/images/load.gif" id="ajaxLoadWait" alt="" style="transform: scale(0.5);"> </center>
                <div id="mainarea"  style='display:none;color:white;padding:2em'>
                    <center>
                        <div id="">
                            <span id="headwrap" style="">
                                <br>
                                <!-- <span id="extrabr"><br><br><br><br></span> -->
                                <span id="headwr" style="display: inline">
                                    <!-- <img src="http://via.placeholder.com/100x100" style="height: 50px;display: inline;" placeholder="Icon" id='eve_icon'>&nbsp;&nbsp;&nbsp;&nbsp; -->
                                    <h1 id='eve_name'>
                                        Event Name
                                    </h1>
                                </span>
                                <br>
                                <span id='eve_tagline' style="font-size: 1.5em;margin-bottom: 30px;font-style: italic;text-shadow: #000000 0px 0px 20px;">
                                    Event TagLine
                                </span>
                            </span>
                        </div>
                        <br>
                        <!-- <div id="dummyspace" style="width:100%;height:300px"></div> -->
                        <a target="_blank" id="coveranc">
                            <img src="" alt="" id="eve_cover" style="max-width:80%;max-height:50%">
                        </a>
                        <br><br>
                        
                        <span id='eve_short_desc' style="font-size: 1.5em;">
                            Event Short Desc
                        </span>
                        <br>
                        <span id='eve_long_desc' style="font-family: 'Roboto', sans-serif;font-size: 1.5em;text-align:justify;text-justify: inter-word;">
                            Event Long Desc
                        </span>
                        <br>

                        <span style="font-size: 1.8em">Date:</span>
                        <span id='eve_date' style="font-size: 1.8em;">
                            DATE
                        </span>
                        <br>
                        <span style="font-size: 1.8em">Time:</span>
                        <span id='eve_time' style="font-size: 1.8em;">
                            TIME
                        </span>
                        <br>
                        <span style="font-size: 1.8em">Venue:</span>
                        <span id='eve_venue' style="font-size: 1.8em;">
                            VENUE
                        </span>
                        <br>
                        <br>
                        <div id='eve_organisers_head'>
                            <span style="font-size: 1.8em">Organisers :</span>
                            <div id='eve_organisers'>
                                #Org1
                            </div>
                        </div>
                        <h3 id="regmsg"></h3>
                        <br>
                        <a href="" id="RuleBtn" target="_blank">Rulebook</a>
                        <a id="RegBtn" data-eveid="-1" >Register</a>
                        <br>

                        <a href="" id="img_anchor" target="_blank">
                            <img src="" style="display: none" height="200px" />
                        </a>
                    </center>
                </div>
            </div>
        </div>

        <br><br>
    </div>

<!---ajax loader-->

    <div class="ajax_loading_bckgrnd">
        <div class="ajax_back"></div>
    </div>

    <div class="ajax_loading_div">
        <img class="close_icon" src="/images/close2.png"/>
        <div class="ajax_content"></div>
    </div>

<!---footer-->
    <div class="footer_div">
        <a target="_blank" href="https://www.facebook.com/anwesha.iitpatna/"><img src="/images/social/fb.png"></a>
        <a target="_blank" href="https://www.instagram.com/anwesha.iitp/"><img src="/images/social/insta.png"></a>
        <a target="_blank" href="https://www.youtube.com/user/AnweshaIITP"><img src="/images/social/youtube.png"></a>
        
        <div class="copyright">
            &copy; 2018 Anwesha, IIT Patna
        </div>
    </div>


 <!--scripts-->
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript">
    var eveglid =-1;
    var currPar = "tech_content";
        $(document).ready(function() {

            var vscrollspace = 0;
            var tr =($(".tech_content").position().left + $(".tech_content").width()); 
            var tl = $(".tech_content").position().left; 
            var cr =($(".cult_content").position().left + $(".cult_content").width()); 
            var cl = $(".cult_content").position().left; 
            var mr =($(".mgmt_content").position().left + $(".mgmt_content").width()); 
            var ml = $(".mgmt_content").position().left; 
            var sh = $("#event_cat_div").position().top;

            $(document).on('click', '#RegBtn', function (e) {
                console.log('this is the click');
                // if($(this).attr("href")!="" && $(this).attr("href")!=null )
                // e.preventDefault();
                 console.log("/register/"+eveglid);
                $.get( "/register/"+eveglid, function( data ) {
                        console.log("dat",data);
                            var databkp = data;
                        try {
                            data = jQuery.parseJSON(data);
                        }
                        catch(error) {
                            data = databkp;
                        }

                        console.log("dat",data);
                        // alert(data.msg);
                        $(currPar + " #regmsg").text(data["msg"]);
                        if(data.http==200)
                            $("#regmsg").css("color","#00ff00");
                        else
                            $("#regmsg").css("color","#ff0000");
                        if(data.http == 403){
                            window.open('https://anwesha.info/login_bare/');
                            console.log("403");
                            $(currPar+ " #regmsg").html($(currPar + " #regmsg").text()+"<br> <a href='//anwesha.info/login_bare/' target='_blank'>Login here</a>");
                        }
                        if(data.status == true){
                            $(this).text('Registered!')
                        }
                    });
            });
            // $("#RegBtn").on('click',function(){
            //     // console.log("/register/"+eveglid);
            //     // $.get( "/register/"+eveglid, function( data ) {
            //     //         console.log("dat",data);
            //     //         alert(data.msg);
            //     //         if(data.status == true){
            //     //             $(this).text('Registered!')
            //     //         }
            //     //     });
            // });

        });

//for choosing events tabs
<?php 
    if(!isset($match[1]) && $match[1] != 1 ){
?>
    $('.tech_event').fadeIn(1000);
<?php 
    }
?>
    $('.tech_button').click(function()
    {
        $('.tech_event').fadeIn(1000);

        $('.cult_event').fadeOut(0);
        $('.arts_event').fadeOut(0);
    });

    $('.cult_button').click(function()
    {
        $('.cult_event').fadeIn(1000);
        $(".cult_eve span:first-child").click();
        $('.tech_event').fadeOut(0);
        $('.arts_event').fadeOut(0);
    });

    $('.arts_button').click(function()
    {
        $('.arts_event').fadeIn(1000);
        $(".mgmt_eve span:first-child").click();
        $('.tech_event').fadeOut(0);
        $('.cult_event').fadeOut(0);
    });

//-----menu toggle
      $('.menu_toggle img').on("click",function()
      {
        span_text=$('.menu_toggle span').text();
        if(span_text == "EXIT")
        {
          $('.menu_toggle span').text('MENU');
          $('.menu_toggle img').attr('src', '/images/skull_menu.png');
          $('.menu_backgrnd').fadeOut(800);
          $('.menu_bar').slideUp(800);
        }
        else
        {
          $('.menu_toggle span').text('EXIT').fadeIn(800);
          $('.menu_toggle img').attr('src', '/images/skull_exit.png');
          $('.menu_backgrnd').fadeIn(800);
          $('.menu_bar').slideDown(800);
        }
      });

      $('.menu_backgrnd').click(function()
      {
        $('.menu_toggle span').text('MENU');
        $('.menu_toggle img').attr('src', '/images/skull_menu.png');
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
        var new_li= new_li.next().next();
        new_li.addClass('first_rot');
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

                $('#moving_witch').css('top',mouseY + 50);
                $('#moving_witch').css('left',mouseX + 50);

                
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
        $(document).scroll(function () {
            var window_pos = $(this).scrollLeft();
            //alert(window_pos);
            $('.moving_cloud_div img').css('left', -(window_pos * .05) + 'px');
        });

//ajax on menu items
        $('.close_icon').click(function()
        {
            $('.ajax_loading_bckgrnd').fadeOut(800);
            $('.ajax_loading_div').fadeOut(800);
        });

        $('.spons_div').click(function()
        {
            $('.ajax_loading_bckgrnd').fadeIn(800);
            $('.ajax_loading_div').fadeIn(800);
        });

        $('.sch_div').click(function()
        {
            $('.ajax_loading_bckgrnd').fadeIn(800);
            $('.ajax_loading_div').fadeIn(800);
        });

        $('.acco_load').click(function()
        {
            $('.ajax_loading_bckgrnd').fadeIn(800);
            $('.ajax_loading_div').fadeIn(800);
        });
        
        $('.register').click(function()
        {
            $('.ajax_loading_bckgrnd').fadeIn(800);
            $('.ajax_loading_div').fadeIn(800);
        });

//for loading of events in event content page
        function preloadImage(imageurl) {
            var img = new Image();
            img.src = imageurl;
        }
        

        function eve_coverswitch(cat ,imgurl) {
            console.log("eve_coverswitch called with", imgurl);
            if (imgurl == "" || imgurl == null) {
                $(cat+" #eve_cover").attr("src", "");
                // $("#eve_cover").css("box-shadow","0 0 0 #FFFFFF");
                $(cat+" #eve_name").css("font-size", "3em");
                $(cat+' #eve_cover').hide();
                $(cat+" #extrabr").hide();
                $(cat + " #coveranc").attr("src","#");
            } else {
                $(cat+" #eve_cover").attr("src", imgurl);
                $(cat+' #eve_cover').show();
                $(cat + " #coveranc").attr("src", imgurl);
                if ($(window).width() > 960) {
                    $(cat + " #eve_name").css("font-size", "5em");
                }
                $("#extrabr").show();

            }
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

            $(cat+ ' #eve_name').text("");
            $(cat+ ' #eve_tagline').text("");
            $(cat+ ' #eve_date').text("");
            $(cat+ ' #eve_time').text("");
            $(cat+ ' #eve_venue').text("");
            $(cat+ ' #eve_organisers').text("");
            $(cat+ ' #eve_short_desc').text("");
            $(cat+ ' #eve_long_desc').text("");
            // $(cat+ ' regbtn').attr("placeholder", "");
            // $(cat+ ' alt_regbtn').attr("href", "");
            $(cat+ ' #RuleBtn').attr("href", "");
            $(cat+ ' #RegBtn').attr("data-eveid", "-1");
            $(cat+ ' #RegBtn').removeAttr("href");
            $(cat+ ' #RegBtn').removeAttr("target");
            $(cat+ ' #regmsg').text('');
            $(cat+ ' #RuleBtn').hide();
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
        $.get("/allEvents/", function (data, status) {
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

                        var widthYetT,widthYetC,widthYetM;
                            try{
                                widthYetT = $(".tech_eve span:last-child").position().left+$(".tech_eve span:last-child").width() - $(".tech_eve").position().left+ 100;
                                widthYetC = $(".cult_eve span:last-child").position().left+$(".cult_eve span:last-child").width() - $(".cult_eve").position().left+ 100;
                                widthYetM = $(".mgmt_eve span:last-child").position().left+$(".mgmt_eve span:last-child").width() - $(".mgmt_eve").position().left+ 100;
                            }catch(e){
                                widthYet =0;    
                           }
                        if(evntDat.code==1){
                            //tech
                            if(widthYet>$(".tech_eve").width()){
                                $(".tech_eve").append("<br>");
                            }
                            $(".tech_eve").append(" <span id='evetab"+evntDat.eveId+"' class='evetab' onclick='eveDisplay("+evntDat.eveId+")' event_id='"+evntDat.eveId+"'>"+evntDat.eveName+"</span>");
                        }else if(evntDat.code == 2){
                            //cult
                            if(widthYet>$(".cult_eve").width()){
                                $(".cult_eve").append("<br>");
                            }
                            $(".cult_eve").append(" <span id='evetab"+evntDat.eveId+"' class='evetab' onclick='eveDisplay("+evntDat.eveId+")' event_id='"+evntDat.eveId+"'>"+evntDat.eveName+"</span>");
                        }else if(evntDat.code == 3){
                            //mgmt
                            if(widthYet>$(".mgmt_eve").width()){
                                $(".mgmt_eve").append("<br>");
                            }
                            $(".mgmt_eve").append(" <span id='evetab"+evntDat.eveId+"' class='evetab' onclick='eveDisplay("+evntDat.eveId+")' event_id='"+evntDat.eveId+"'>"+evntDat.eveName+"</span>");
                        }
                });
               console.log("map",eventsmap);
               //init all;
               setTimeout(function(){
                   $(".tech_eve span:first-child").click();
                   <?php
                   $myvar = $match[2];
                   
                //    function getstr ($type,$myvar_){
                //        if(isset($myvar_)){
                //             return "$(\"evetab".$myvar_."\").click();";
                //         }else{
                //             return "$(\".{$type}_eve span:first-child\").click();";
                //         }
                //     }
                   if(isset($match[1])){
                    //    echo $match[1];
                    $cat = "tech";
                    echo "$('#bodyajaxLoadWait').fadeOut();";
                       if($match[1]==1){
                           $cat = "tech";
                           echo "
                            $('#tech_button').click();
                            $('.tech_event').fadeIn(1000);
                            $('.cult_event').fadeOut(0);
                            $('.arts_event').fadeOut(0);";
                       }else if($match[1]==2){
                           $cat = "cult";
                            echo "
                            $('#cult_button').click();
                            $('.cult_event').fadeIn(1000);
                            $('.tech_event').fadeOut(0);
                            $('.arts_event').fadeOut(0);";
                       }else if($match[1]==3){
                           $cat = "arts";
                           echo "
                            $('#arts_button').click();
                            $('.arts_event').fadeIn(1000);
                            $('.tech_event').fadeOut(0);
                            $('.cult_event').fadeOut(0);";
                       }
                       if(isset($match[2])&& $match[2] != ""){
                        echo "$('#evetab".$match[2]."').click();";
                       }else{
                           echo "$('.{$cat}_eve span:first-child').click();";
                       }
                    
                   }
                //    evetab42
                   ?>

                   // eve_coverswitch('.tech_content',eventsmap[$(".tech_eve span:first-child").attr('event_id')].cover_url);
                   // $(".cult_eve span:first-child").click();
                   // $(".mgmt_eve span:first-child").click();
                   // setTimeout(() => {
                   //      $(".tech_eve span:first-child").click();
                   // }, 1000);
                   $(".tech_content #ajaxLoadWait").hide();
                   $(".cult_content #ajaxLoadWait").hide();
                   $(".mgmt_content #ajaxLoadWait").hide();
                   $(".tech_content #mainarea").show();
                   $(".cult_content #mainarea").show();
                   $(".mgmt_content #mainarea").show();
                   // $("#mainarea").show();
               },1000);
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
            $(cat+ ' #eve_name').html(getHTMLText(dataToFill.eveName));
            $(cat+ ' #eve_tagline').html(getHTMLText(dataToFill.tagline));
            $(cat+ ' #eve_date').html(getHTMLText((dataToFill.date)?dataToFill.date:"To be announced"));
            $(cat+ ' #eve_time').html(getHTMLText((dataToFill.time)?dataToFill.time:"To be announced"));
            $(cat+ ' #eve_venue').html(getHTMLText((dataToFill.venue)?dataToFill.venue:"To be announced"));
            $(cat+ ' #eve_organisers').html(getHTMLText(dataToFill.organisers));
            $(cat+ ' #eve_short_desc').html(getHTMLText(dataToFill.short_desc));
            $(cat+ ' #eve_long_desc').html(getHTMLText(dataToFill.long_desc));
            // $(cat+ ' #regbtn').attr("placeholder", ""));
            // $(cat+ ' #alt_regbtn').attr("href", ""));
            $(cat+ ' #RuleBtn').attr("href", dataToFill.rules_url);
            if(dataToFill.rules_url==null || dataToFill.rules_url=="")
                $(cat+ ' #RuleBtn').hide();
            else
                $(cat+ ' #RuleBtn').show();
            // $(cat+ ' #RegBtn').attr("", dataToFill.reg_url);
            $(cat+ ' #RegBtn').attr("data-eveid", dataToFill.eveId);
            if(dataToFill.reg_url!=null && dataToFill.reg_url!=""){
                $(cat+ ' #RegBtn').attr("href", dataToFill.reg_url);
                $(cat+ ' #RegBtn').attr("target","_blank");
            }else{
                $(cat+ ' #RegBtn').removeAttr("href");
                $(cat+ ' #RegBtn').removeAttr("target");
            }
            $(cat+ ' #regmsg').text('');
            eveglid = dataToFill.eveId;
            console.log("eveglid",eveglid);
            // if(dataToFill.reg_url==null || dataToFill.reg_url=="")
            //     $(cat+ ' #RegBtn').hide();
            // else
            //     $(cat+ ' #RegBtn').show();
            eve_coverswitch(cat, dataToFill.cover_url);
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

        // $('#events li').click(function () {
        //     event_id = $(this).attr('event_id');

        //     if (event_id <= 4) {
        //         //alert('Technical');
        //         $('.tech_content').load('events/' + event_id + '.php');
        //     } else if (event_id <= 8 && event_id > 4) {
        //         //alert('cult');
        //         $('.cult_content').load('events/' + event_id + '.php');
        //     } else if (event_id <= 12 && event_id > 8) {
        //         //alert('mang');
        //         $('.mang_content').load('events/' + event_id + '.php');
        //     }
        // });
    </script>


    <script type="text/javascript" src="/js/ajax.js"></script>

</body>

</html>