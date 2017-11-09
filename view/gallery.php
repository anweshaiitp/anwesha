<?php
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
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gallery</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=550, initial-scale=1">

    <link rel="stylesheet" href="demo.css">
    <link rel="stylesheet" href="/assets/jquery.flipster.min.css">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    
    <script src="/assets/jquery.flipster.min.js"></script>

    <style>
        /*
        * Base Template
        * Combines HTML5 Boilerplate & Boostrap. Includes some basic templating.
        * Authored by Stephen Shaw (shshaw@gmail.com)
        */

        /* @group Basics */

        *,
        *:before,
        *:after {
          box-sizing: border-box;
        }

        html,
        body {
          margin: 0;
          padding: 0;
          height: 100%;
          background-image: url('https://i.ytimg.com/vi/t0kGRcd-IFY/maxresdefault.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }

        body {
          color: #333333;
          font-weight: 400;
          font-size: 15px;
          font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
          line-height: 20px;
          margin: 0;
          /*padding: 4em 0 4em 20%;*/
        }

        a {
          color: #da0d25;
          text-decoration: none;
        }
        a:hover,
        a:focus {
          color: #f22840;
          text-decoration: none;
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

        .main-header {
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
        }
        .flipster__nav{
            display: none !important;
        }
        .main-header__nav a {
          display: block;
          padding: 0.5em 1em;
          border-bottom: solid 1px #ddd;
        }

        .main-header__nav a:hover,
        .main-header__nav a:focus {
          color: #eee;
          background: #da0d25;
        }
        .flipser
        @media (max-width: 800px) {
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
        }
    @import url('https://fonts.googleapis.com/css?family=Lobster');
    </style>

</head>
<body>
<br><br><br><br>
    <center><h1 style="color:#ffffff;font-size: 70px;font-family: 'Lobster', cursive;" >Gallery</h1></center>
<!-- <article id="demo-default" class="demo">

    <h2></h2>

    <div id="coverflow">
        <ul class="flip-items">
            <?php
                // foreach ($images as $imageURI) {
                //  echo "<li data-flip-title=\"\">
                   //          <img src=\"".$imageURI."\" height='500'>
                   //      </li>";
                // }
            ?>
            
        </ul>
    </div>

<script>
    var coverflow = $("#coverflow").flipster();
</script>

</article> -->
<!-- 
<article id="demo-carousel" class="demo">

    <h2></h2>

    <div id="carousel">
        <ul class="flip-items">
            <?php
                // foreach ($images as $imageURI) {
                //  echo "<li data-flip-title=\"\">
                   //          <img src=\"".$imageURI."\" height='300'>
                   //      </li>";
                // }
            ?>
            
        </ul>
    </div>

<script>
    var carousel = $("#carousel").flipster({
        style: 'carousel',
        spacing: 0,
    });
</script>

</article> -->
<!-- 

<article id="demo-wheel" class="demo">

    <h2></h2>

    <div id="wheel">
        <ul>
            <?php/**
                foreach ($images as $imageURI) {
                    echo "<li data-flip-title=\"\">
                            <img src=\"".$imageURI."\" height='300'>
                        </li>";
                }**/
            ?>
            
        </ul>
    </div>

<script>
    var wheel = $("#wheel").flipster({
        style: 'wheel',
        spacing: 0
    });
</script>


</article>
 -->

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



</body>
</html>
