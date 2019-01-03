<html>
<head>
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
            background: url(https://static-cdn.sr.se/sida/images/3117/787c33ac-5689-4e1c-aaf3-7db96093015a.jpg) no-repeat center center; 
            background-size: cover;
            height: 125%;
            }

            .row{
                margin-right: 0%;
                margin-left: 0%;
            }

            #accordion {
            background-color: black;
            border: 1px solid black;
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
            


            .ui-accordion-content {
            font-family: Roboto, sans-serif;
            font-size: 14px;
            padding: 0px 20px;
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
        @-webkit-keyframes spinner {
    from { -webkit-transform: rotateY(-180deg);    }
    to   { -webkit-transform: rotateY(0deg); }
  }
  @-webkit-keyframes spinner back {
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
          @keyframes spinner back {
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
          }
        .back{
            background-color: whitesmoke;
            opacity: 0.9;
            margin-left: -15px;
/*            margin-right: -15px;*/
            width: 100%;
            height: 80% ;
            
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
            background-color: white;
            padding: 8px 12px;
            border-radius: 8px;
        }
        .caption a{
            color: black;
            text-decoration: none;
        }
        .caption a:hover{
            color: rgba(255,255,255,0.8);
        }
    </style>
</head>
<body>

    <div class="header">
      <div class="container">
            <p>Back to Home Page</p>
      </div>
    </div>
  
    <div class="main">
      
        <div class="row">
            <div class="col-md-3">
                <div id="accordion">
                    <h3>TECHNICAL EVENTS</h3>
                        <div>
                            <ul>
                            <li>aaaaa</li>
                            <li>aaaaaa</li>
                            <li>aaaaaaa</li>
                            <li>aaaaaaaa</li>
                            </ul>
                        </div>
                    <h3>CULTURAL EVENTS</h3>
                        <div>
                            <ul>
                            <li>aaaaa</li>
                            <li>aaaaaa</li>
                            <li>aaaaaaa</li>
                            <li>aaaaaaaa</li>
                            </ul>
                        </div>
                    <h3>ARTS & WELFARE EVENTS</h3>
                        <div>
                            <ul>
                            <li>aaaaa</li>
                            <li>aaaaaa</li>
                            <li>aaaaaaa</li>
                            <li>aaaaaaaa</li>
                            </ul>
                        </div>
                </div>
            </div>
            <div class="col-md-9" style="opacity: 0.9">
<!--                <div class="tech_content">
                    <div id="mainarea" style="color: white; padding: 2em;">
                    <center>
                        <div id="">
                            <span id="headwrap" style="">
                                <span id="headwr" style="display: inline">
                                     <img src="http://via.placeholder.com/100x100" style="height: 50px;display: inline;" placeholder="Icon" id='eve_icon'>&nbsp;&nbsp;&nbsp;&nbsp; 
                                    <h1 id="eve_name" style="font-size: 3em;">Static Rush</h1>
                                </span>
                                <br>
                                <span id="eve_tagline" style="font-size: 1.5em;margin-bottom: 30px;font-style: italic;text-shadow: #000000 0px 0px 20px;"></span>
                            </span>
                        </div>
                        <br>
                         <div id="dummyspace" style="width:100%;height:300px"></div> 
                        <a target="_blank" id="coveranc" src="#">
                            <img src="" alt="" id="eve_cover" style="max-width: 80%; max-height: 50%; display: none;">
                        </a>
                        <br><br>

                        <span id="eve_short_desc" style="font-size: 1.5em;">Remember snakes and ladders? Wanna live through it in the real world? Then Static Rush is your ultimate platform with a twist of electronics. With unlimited adventure and enthralling fun packed in every step you take, this one game will make you remember your childhood and with electronics embedded this one event is surely gonna be in your good books. </span>
                        <br>
                        <span id="eve_long_desc" style="font-family: 'Roboto', sans-serif;font-size: 1.5em;text-align:justify;text-justify: inter-word;"></span>
                        <br>

                        <span style="font-size: 1.8em">Date:</span>
                        <span id="eve_date" style="font-size: 1.8em;">2nd Feb</span>
                        <br>
                        <br>
                        <span style="font-size: 1.8em">Time:</span>
                        <span id="eve_time" style="font-size: 1.8em;">1pm</span>
                        <br>
                        <br>
                        <span style="font-size: 1.8em">Venue:</span>
                        <span id="eve_venue" style="font-size: 1.8em;">Boys Hostel,IIT Patna</span>
                        <br>
                        <br>
                        <div id="eve_organisers_head">
                            <span style="font-size: 1.8em">Organisers :</span>
                            <div id="eve_organisers" style="">Harpreet  91 9041083838
                            <br>Gaurav Kataria  9479965760</div>
                        </div>
                        <h3 id="regmsg"></h3>
                        <br>
                       
                        <a href="https://docs.google.com/document/d/144GNxbiGseMmnSxlZEH3WQaZzyFQ7YI0WaW9Y2edmfk/edit?usp=sharing" id="RuleBtn" target="_blank" style="display: inline-block;">Rulebook</a>
                        <a id="RegBtn" data-eveid="10">Register</a>
                        <br>

                        <a href="" id="img_anchor" target="_blank">
                            <img src="" style="display: none" height="200px">
                        </a>
                    </center>
                </div>
                </div>-->
                 <div class="tech_event">
                    <div class="event_container">
                        <img src="https://static-cdn.sr.se/sida/images/3117/787c33ac-5689-4e1c-aaf3-7db96093015a.jpg" alt="cover"   width="220" class="event_bg" />
                        <div class="event_info">
                            <div class="headwrap">
                            <div class="title1" id="event_name">Event Title</div>
                            <div class="title2" id="event_tagline">Event tagline</div>    
                            </div> <!-- end details -->
                        </div> <!-- end hero -->
                        <div class="event_description">
                            <div class="event_timing">
                                <span class="tag" id="event_date">Date</span>
                                <span class="tag" id="event_time">Time</span>
                                <span class="tag" id="event_venue">venue </span>
                            </div> 
                            <div class="event_details">
                                <div id="event_short_desc">
                                    <p style="color:#1c1c1c">Here will be event short description <a href="#" id="ReadMore">read more</a></p>

                                </div>
                            <div id="event_long_desc">
                                <p style="color:#1c1c1c">Remember snakes and ladders? Wanna live through it in the real world? Then Static Rush is your ultimate platform with a twist of electronics. With unlimited adventure and enthralling fun packed in every step you take, this one game will make you remember your childhood and with electronics embedded this one event is surely gonna be in your good books. <a href="#" id="ShowLess">show less</a></p>
                            </div>
                            <div id="event_organisers">
                                <h3 style="color:#1c1c1c">Organisers:</h3>
                                <ul style="list-style-type:none;color: #1c1c1c">
                                <li>Harpreet singh 9198495152</li>
                                <li>Gaurav Kataria 9198495152</li>
                                </ul>
                            </div style="background-color:#1c1c1c"> 
                                <a href="https://docs.google.com/document/d/144GNxbiGseMmnSxlZEH3WQaZzyFQ7YI0WaW9Y2edmfk/edit?usp=sharing" id="RuleBtn">Rulebook</a>
                                <a id="RegBtn" data-eveid="10">Register</a>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="back" style="display: none;">
                    <iframe src="https://docs.google.com/document/d/144GNxbiGseMmnSxlZEH3WQaZzyFQ7YI0WaW9Y2edmfk/preview" ></iframe>
                    <div class="caption"><a href="#" id="toEvent">BACK</a></div>
                </div>

            </div>
        </div>
  
    </div>

    <script>
  
        $(document).ready(function(){
            $("#event_long_desc").css({"display":"none"});
            $("#accordion").accordion({
            collapsible: true
            });
            $("#RuleBtn").click(function(){
                $(".tech_event").fadeOut(800,function(){
                    $(".back").fadeIn(800);
                });

                
                $(".caption").fadeIn(1000);
            return false;
            })
            $("#toEvent").click(function(){
                $(".tech_event").fadeIn(1000);
                $(".back").fadeOut(100);
                return false;
            })
            $("#ReadMore").click(function(){
                $(".event_container").css({"height":"750px"});
//                $(".event_container").slideDown(1000);
                $("#event_long_desc").slideDown(1000);
                $(this).css({"display":"none"});
                return false;
            })
            $("#ShowLess").click(function(){
                $(".event_container").css({"height":"640px"});
                $("#event_long_desc").slideUp(800);
                $("#ReadMore").css({"display":"block"});
                return false;
            })

    }) 
    </script>
</body>

</html>