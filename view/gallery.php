<?php
header("Location: https://www.facebook.com/pg/anwesha.iitpatna/photos/?ref=page_internal");
     require_once 'vendor/autoload.php';
     require 'defines.php';
     // require_once 'library/facebook.php';
      //try{
      $fbAlbums = array(
          1506508526048454
      );
      $images = array();
      $fb = new \Facebook\Facebook([
              'app_id' => $fbAppID,
              'app_secret' => $fbAppSecret,
                'default_graph_version' => 'v2.10',
      ]);
      foreach ($fbAlbums as $fbAlbum) {
          $GraphResponse = $fb->get("/$fbAlbum/photos?fields=images&limit=5","$fbAppID|$fbAppSecret");
          $graphEdge = $GraphResponse->getGraphEdge();
          //$photos2 = $photos->getField('images');
          foreach($graphEdge as $graphNode){
          //var_dump($photo->getField('images'))
              foreach($graphNode->getField('images') as $photo){
                      $images[] = $photo->getField('source');
                      break;
              }
              
          }
      }
  // var_dump($graphEdge);
?>

<html>
<head>
    <title>Gallery | Anwesha 2018</title>

    <meta name="viewport" content="width=device-width, initial-scale= 1">

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../images/logo_favi.png" rel="icon" >

    <link rel="stylesheet" href="demo.css">
    <link rel="stylesheet" href="../css/jquery.flipster.min.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    
    <script src="../js/jquery.flipster.min.js"></script>

    <style>
        body
        {
          background-image: url('/images/cloud.jpg');
          background-size: cover;
          background-repeat: no-repeat;
        }
/*
        *,
        *:before,
        *:after {
          box-sizing: border-box;
        }
  
        p { margin: 0 0 20px; }

        h1,
        h2,{
          margin: 10px 0;
          font-weight: 500;
          line-height: 40px;
          color: inherit;
          text-align: center;
        }
        h1 small,
        h2 small {
          font-weight: 400;
          line-height: 1;
          color: #8d8d8d;
        }
        h1 { font-size: 28px; }
        h2 { font-size: 22px; }

        /* @end */

        /*.main-header {
          position: fixed;
          top: 0;
          bottom: 0;
          left: 0;
          width: 20%;
          background: #eee;
          padding: 1em;
        }

        .main-header__nav {
          border-top: solid 1px #ccc;
          margin: 1em -1em;
        }*/
        .flipster__nav{
            display: none !important;
        }
        /*.main-header__nav a {
          display: block;
          padding: 0.5em 1em;
          border-bottom: solid 1px #ddd;
        }

        .main-header__nav a:hover,
        .main-header__nav a:focus {
          color: #eee;
          background: #da0d25;
        }*/

        .flipser
        @media (max-width: 800px)
        {
          body { padding: 0; }

          .main-header {
            position: relative;
            width: 100%;
          }

          .main-header__nav a { display: inline-block; border: none; }
        }

        .intro {
          padding: 4em 2em;
        }

        .demo {
          padding: 6em 2em;
        }

        .demo h2 {
          text-align: center;
          font-size: 22px;
          margin-bottom: 1em;
        }

        .demo .flipster {
          margin: 0 -2em;
        }

        .code {
          display: block;
          background: #eee;
          padding: 1em;
          border-radius: 1em;
          margin: 2em auto;
          max-width: 30em;
          font-size: 0.8em;
          width: fit-content;
          white-space: pre-wrap;
        }
/*
        .button {
          display: inline-block;
          padding: 5px 10px;
          margin: 0;
          background-color: #da0d25;
          background-position: center center;
          background-repeat: no-repeat;
          color: #FFF;
          text-shadow: none;
          vertical-align: middle;
          cursor: pointer;
          border: 0;
          transition: all 300ms ease;
        }

        .button:hover,
        .button:focus {
          color: #7a0715;
          background: #f22840;
        }*/
        
      @import url('https://fonts.googleapis.com/css?family=Lobster');
    </style>
  
  <link href="../css/style.css" rel="stylesheet">
    
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
        <li><a href="/gallery/">Gallery</a></li>
        <li><a href="/team/">Team</a></li>
        <li class="spons_div">Sponsors</li>
        <li class="acco_load">Hospitality</li>
        <li class="register">Register</li>
        <li class="ca"><a href="/ca/" target="_blank">Campus Ambassador</a></li>
      </ul>
    </div>

<!-----doors---->
  <div class="menu_backgrnd">
    <div class="overlay"></div>
    <img class="creep" src="../images/creep.png">
    <br>
    <img class="boundary" src="../images/bound.png">
  </div>
  

<!---ajax loader-->
 <div class="ajax_loading_bckgrnd">
    <div class="ajax_back"></div>
  </div>

  <div class="ajax_loading_div">
    <img class="close_icon" src="../images/close2.png"/>
    <div class="ajax_content"></div>
  </div>

<!<!---footer-->
  <div class="footer_div">
    <a target="_blank" href="https://www.facebook.com/anwesha.iitpatna/"><img src="../images/social/fb.png"></a>
    <a target="_blank" href="https://www.instagram.com/anwesha.iitp/"><img src="../images/social/insta.png"></a>
    <a target="_blank" href="https://www.youtube.com/user/AnweshaIITP"><img src="../images/social/youtube.png"></a>
    
    <div class="copyright">
      &copy; 2018 Anwesha, IIT Patna
    </div>
  </div>


<!--------gallery content------------>

<article id="demo-flat" class="demo">

    <h2></h2>

    <div id="flat">
        <ul>
            <?php
                foreach ($images as $imageURI) {
                    echo "<li data-flip-title=\"\">
                            <img src=\"".$imageURI."\" height='400'>
                        </li>";
                }
            ?>
            
        </ul>
    </div>

<script>
    var flat = $("#flat").flipster({
        style: 'flat',
        spacing: -0.25
    });
</script>
</article>

<!--scripts-------->
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript">
  
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

  </script>

<!---------stars in background---------->
    <script src="../js/jquery-stars.js"></script>
    <script>
        $(document).jstars({
            image_path: 'images',
            style: 'yellow',
            frequency: 20,
            delay: 400
        });
        
    </script>

    	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-90791019-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-90791019-1');
	</script>

  <script type="text/javascript" src="../js/ajax.js"></script>

</body>
</html>
