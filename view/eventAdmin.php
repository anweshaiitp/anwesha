<?php
// ini_set('display_errors', '1');  

session_start();	
require('model/model.php');
require('dbConnection.php');
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

	$purp = 0;
	$arr = array();
	if(!isset($_SESSION['userID'])){
		$purp = -1;
		$title = "Login first";
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			if(strlen($username)==7){
				$username = substr($username, 3);
			}
			$result = Auth::loginUser($username,$_POST['password'],$conn);
			if($result['status']==200)
				$purp = 0;
			else{
				$purp = -1;
				$title = $result["msg"];
			}
		}

	}
if($purp!=-1){
	
	if($match[1]==''){
		$purp = 1;
		//$arr[];
		$arr = People::isSpecial($_SESSION['userID'],$conn)["eventOrganiser"];
		$title = "List of Events and Categories"; 
	}else if($match[1]== 'addEvent'){

	}
}
?>
<!DOCTYPE html>
<html>
<head>

	<title>Admin control panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body{
			background: #00d0b2;
		}
		.field{
			width:300px;
		}
	</style>
</head>
<body class="is-primary">
<center>
	<section class="hero is-primary" >
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
       	Event Admin control panel
      </h1>
      <h2 class="subtitle">
        <?php echo $title; ?>
      </h2>
    </div>
    <!-- login -->
    <?php
	if($purp == -1)
    	echo "<form action=\"\" method=\"POST\" >
		<div class=\"field\">
  			<label class=\"label\">AnweshaID</label>
			<div class=\"control\">
				<input class=\"input\" type=\"text\" name=\"username\" placeholder=\"ANWxxx\">
			</div>
		</div>
		<div class=\"field\">
  			<label class=\"label\">Password</label>
			<div class=\"control\">
				<input class=\"input\" type=\"password\" name=\"password\" placeholder=\"********\">
			</div>
		</div>
		
		    <button class=\"button is-link\">Login</button>
		  
  
	</form>";
    ?>
    
	<!-- login ends -->
	<?php
		$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
		if($purp==1)
		foreach ($arr as $eve) {
			$action = ($eve["id"]<10)? "Add New Event":"Edit Event";
			$color = ($eve["id"]<10)? "is-warning":"is-success";
			$action_ = ($eve["id"]<10)? "addEvent":"update";
			echo "<a href='$actual_link/eventAdmin/$action_/".$eve['id']."'><div class=\"tags has-addons\" style=\"width:500px\">
			      <span class=\"tag is-large is-dark\">".$eve['name']."</span>
			      <span class=\"tag is-large is-info\">".$eve['id']."</span>
			      <span class=\"tag is-large $color\">".$action."</span>
			    </div><br>
			    ".PHP_EOL;
		}
	?>
    
  </div>
</section>
	
</center>
</body>
</html>