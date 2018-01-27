<?php
session_start();
ini_set('display_errors', '1');  
	
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
    ///############# User not logged in
    $user = null;
    $uID = -1;
    $title = "";
    $conf = 0;
	if(!isset($_SESSION['userID'])){
        $nologin = 1;
        $title = "Login first<br><a class='button is-info is-outlined' href ='/eventAdmin/'>Login here</a>";
	}else{
        $uID = $_SESSION['userID'];
    }
    $resp = People::isSpecial($_SESSION['userID'],$conn);
	if((!isset($resp["isRegTeam"]) || $resp["isRegTeam"]<=0) && isset($_SESSION['userID'])){
		$nologin = 1;
        $title = "Not a registration team member.";
    }
     $sql = " SELECT * FROM payments WHERE payID = ".$match[1];
            // alog("pay: $sql");
    $result = mysqli_query($conn, $sql);
    $paymentdet = mysqli_fetch_assoc($result);
    $paystat=0;
    // echo json_encode($paymentdet);
    if(isset($_POST['delconf']) && isset($paymentdet)){
            $paystat = 1;
            $sql = " DELETE FROM payments WHERE payID = ".$match[1];
            // alog("pay: $sql");
            if(!$result = mysqli_query($conn, $sql))
                $paystat = 0;
            $sql = " UPDATE People SET feePaid= feePaid -".$paymentdet['amount'] ."  WHERE pId=".$paymentdet["pId"];
            // alog("pay: $sql");
            if(!$result = mysqli_query($conn, $sql))
                $paystat = 0;
            echo mysqli_error($conn);
    }else{
        // echo "notsetnotsetnotsetnotsetnotsetnotset";
    }
        // echo json_encode($user);
    
?>
<!DOCTYPE html>
<html>
<head>

	<title>Admin Payment control panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style>
	html {
    height: 100%;
    }
    body {
    min-height: 100%;
                background: #00d0b2;
    
    }
		
		.field{
			width:300px;
		}

	</style>
</head>
<body bgcolor="#00d0b2">
<center>

	<section class="hero is-primary" >
		<div class="tags has-addons" style="position: fixed;left: 0;top:0;cursor:pointer">
	      <span class="tag is-success is-large" onclick="window.location='/eventAdmin';">
			  <h1>Home</h1>
			  <!-- <button class="delete is-small"></button> -->
			</span>
			
	    </div>
        <?php
			if($nologin!=1)
				echo "<div class=\"tags has-addons\" style=\"position: fixed;right: 0;top:0 cursor:pointer\">
					<span class=\"tag is-danger is-large\" id=\"logout\" onclick=\"window.location='/eventAdmin/logout';\">
						  Logout
						  <button class=\"delete\"></button>
						</span>
				    </div>";
		?>
         <br><br>
  <div class="hero-body is-fullheight">
    <div class="container is-fullheight">
      <h1 class="title">
        <?php if($nologin==1){echo $title;die();} ?>
       	Payment control panel
      </h1>
      <h2 class="subtitle" id="subtitle">
        <span style="color:#ff0000 !important"><?php if($paymentdet && $paystat==1){echo"Deleted!";die();} else if(!$paymentdet){echo"No such entry!";die();}?></span>
      </h2>

        <article id="confdat" class="tile notification is-danger">
            <p class="title">Confirm Delete?</p>
            <p class="subtitle"> </p>
            <div class="content">
               Deleting payment for Anwesha ID: ANW<?php echo $paymentdet['pId'] ?><br>
               Amount: INR <?php echo $paymentdet['amount'] ?>/-<br>
               Comment: <?php echo $paymentdet['comments'] ?>/-<br>
               <form action="" method="post">
                <input type="hidden" value = "deleteconf" name="delconf">
                <button id= "confsend" class="button is-success is-outlined" >Confirm</button>
               </form>
                <a style="" href ='javascript:history.go(-1);' class="button is-warning is-outlined" >Cancel</a>
            <br>
           
            </div>
            
        </article>
        <div class="notification " id="postajax" style="display:none">
        
        </div>

        
    </div>
    <div style='position:absolute;bottom:10px;left:50%;transform:translateX(-50%)'>For issues with this application, contact: Tameesh Biswas(+91 9920126830)</div>

    </section>
</center>
</body>
</html>
