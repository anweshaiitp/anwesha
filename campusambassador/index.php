<?php

/* INCLUSION OF LIBRARY FILEs*/
	require_once( 'lib/Facebook/FacebookSession.php');
	require_once( 'lib/Facebook/FacebookRequest.php' );
	require_once( 'lib/Facebook/FacebookResponse.php' );
	require_once( 'lib/Facebook/FacebookSDKException.php' );
	require_once( 'lib/Facebook/FacebookRequestException.php' );
	require_once( 'lib/Facebook/FacebookRedirectLoginHelper.php');
	require_once( 'lib/Facebook/FacebookAuthorizationException.php' );
	require_once( 'lib/Facebook/GraphObject.php' );
	require_once( 'lib/Facebook/GraphUser.php' );
	require_once( 'lib/Facebook/GraphLocation.php' );
	require_once( 'lib/Facebook/GraphSessionInfo.php' );
	require_once( 'lib/Facebook/Entities/AccessToken.php');
	require_once( 'lib/Facebook/HttpClients/FacebookCurl.php' );
	require_once( 'lib/Facebook/HttpClients/FacebookHttpable.php');
	require_once( 'lib/Facebook/HttpClients/FacebookCurlHttpClient.php');
/* USE NAMESPACES */
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\GraphUser;
	use Facebook\GraphSessionInfo;
	use Facebook\FacebookHttpable;
	use Facebook\FacebookCurlHttpClient;
	use Facebook\FacebookCurl;
/*PROCESS*/
	
	//1.Stat Session
	 session_start();
	//2.Use app id,secret and redirect url
	 $app_id = '461444480729268';
	 $app_secret = '02b42f9b52e285b1f8ac64b7d865f551';
	 $redirect_url='http://2016.anwesha.info/campusambassador';
	 
	 //3.Initialize application, create helper object and get fb sess
	 FacebookSession::setDefaultApplication($app_id,$app_secret);
	 $helper = new FacebookRedirectLoginHelper($redirect_url);



ini_set('display_errors',1);
ini_set('display_startup_errors',1);

$nameErr=$collegeErr=$cityErr=$degreeErr=$graduationErr=$addressErr=$emailErr=$phoneErr=$threethingsErr=$leaderErr="";
$name="Full Name";
$college="University/College/Institution";
$city="City";
$degree="Degree/Branch";
$graduation="Graduation Year";
$address="Address";
$email="Email ID";
$phone="Mobile Number";
$threethings="Tell us 3 things you would do as a Campus Ambassador of Anwesha 2015";
$leader="Have you held any position of responsibility in your college? If yes, explain";
$invol="Have you been a part of one or more previous editions of Anwesha? If yes, explain";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name=$_POST["name"];
    $college=$_POST["college"];
    $city=$_POST["city"];
    $degree=$_POST["degree"];
    $graduation=$_POST["graduation"];
    $address=$_POST["address"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $threethings=$_POST["threethings"];
    $leader=$_POST["leader"];
    $invol=$_POST["invol"];
    $referalcode=$_POST["referalcode"];

    if (empty($_POST["name"]) || $_POST["name"]=="Full Name") {
        $nameErr = "<p style='text-align:center;color:#ff0000;'>Missing</p><br><br>";
    }
    else if (!filter_var($_POST["name"], FILTER_VALIDATE_REGEXP, array("options" => array('regexp' => '/^[\sa-z]+$/i')))) {
	$nameErr = "<p style='text-align:center;color:#ff0000;'>Name should contain only alphabetic characters</p><br><br>";
	$name="Full Name";
    }
    else if (empty($_POST["college"]) || $_POST["college"]=="College") {
        $collegeErr = "<p style='text-align:center;color:#ff0000;'>Missing</p><br><br>";
    }
    else if (!filter_var($_POST["college"], FILTER_VALIDATE_REGEXP, array("options" => array('regexp' => '/^[\sa-z]+$/i')))) {
        $collegeErr = "<p style='text-align:center;color:#ff0000;'>College name should contain only alphabetic characters.</p><br><br>";
	$college="University/College/Institution";
    }
    else if (empty($_POST["city"]) || $_POST["city"]=="City") {
        $cityErr = "<p style='text-align:center;color:#ff0000;'>Missing</p><br><br>";
    }
    else if (!filter_var($_POST["city"], FILTER_VALIDATE_REGEXP, array("options" => array('regexp' => '/^[\sa-z]+$/i')))) {
	$cityErr = "<p style='text-align:center;color:#ff0000;'>City name should contain only alphabetic characters.</p><br><br>";
	$city="City";
    }
    else if (empty($_POST["degree"]) || $_POST["degree"]=="Degree/Branch") {
        $degreeErr = "<p style='text-align:center;color:#ff0000;'>Missing</p><br><br>";
    }
    else if (!filter_var($_POST["degree"], FILTER_VALIDATE_REGEXP, array("options" => array('regexp' => '/^[\.\sa-z]+$/i')))) {
        $degreeErr = "<p style='text-align:center;color:#ff0000;'>Degree should contain only alphabetic characters.</p><br><br>";
        $degree="Degree/Branch";
    }
    else if (empty($_POST["graduation"]) || $_POST["graduation"]=="Graduation Year") {
        $graduationErr = "<p style='text-align:center;color:#ff0000;'>Missing</p><br><br>";
    }
    else if (!filter_var($_POST["graduation"], FILTER_VALIDATE_REGEXP, array("options" => array('regexp' => '/^\d{4}$/')))) {
        $graduationErr = "<p style='text-align:center;color:#ff0000;'>Graduation Year must be a 4 digit number.</p><br><br>";
        $graduation="Graduation Year"; 
    }
    else if (empty($_POST["address"]) || $_POST["address"]=="Address") {
        $addressErr = "<p style='text-align:center;color:#ff0000;'>Missing</p><br><br>";
    }
    else if (empty($_POST["email"]) || $_POST["email"]=="Email ID") {
        $emailErr = "<p style='text-align:center;color:#ff0000;'>Missing</p><br><br>";
    }
    else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "<p style='text-align:center;color:#ff0000;'>Please enter a valid email-id.</p><br><br>";
        $email="Email ID";
    }
    else if (empty($_POST["phone"]) || $_POST["phone"]=="phone") {
        $phoneErr = "<p style='text-align:center;color:#ff0000;'>Missing</p><br><br>";
    }
    else if (!filter_var($_POST["phone"], FILTER_VALIDATE_REGEXP, array("options" => array('regexp' => '/^\d{10}$/')))) {
        $phoneErr = "<p style='text-align:center;color:#ff0000;'>Contact must be a 10 digit number.</p><br><br>";
        $phone="Mobile Number";
    }
    else if (empty($_POST["threethings"]) || $_POST["threethings"]=="Tell us 3 things you would do as a Campus Ambassador of Anwesha 2015") {
        $threethingsErr = "<p style='text-align:center;color:#ff0000;'>Missing</p><br><br>";
    }
    else if (empty($_POST["leader"]) || $_POST["leader"]=="Have you held any position of responsibility in your college? If yes, explain") {
        $leaderErr = "<p style='text-align:center;color:#ff0000;'>Missing</p><br><br>";
    }
    else if (empty($_POST["invol"]) || $_POST["invol"]=="Have you been a part of one or more previous editions of Anwesha? If yes, explain") {
        $involErr = "<p style='text-align:center;color:#ff0000;'>Missing</p><br><br>";
    }
    else{


	if (empty($_POST["referalcode"]) || $_POST["referalcode"]=="Referral Code") {
		$referalcode="NA";
	}


	$con = mysqli_connect("localhost", "anwesha_2016", ")z%1ZM3R68Os", "anwesha_2016");
	if (!$con) {
		die('Could not connect: ' . mysqli_error());
  	}

  	$sql = 'SELECT `email` FROM campusambreg WHERE `email` = "'.$email.'" ';
  	$select = mysqli_query($con, $sql);

  	if(mysqli_num_rows($select) > 0){
  		$emailErr = "<p style='text-align:center;color:#ff0000;'>Email already exist.</p><br><br>";
  	}
  	else{
	  	$address     = mysqli_real_escape_string($con, $address);
	  	$threethings = mysqli_real_escape_string($con, $threethings);
	  	$leader      = mysqli_real_escape_string($con, $leader);
	 	$invol       = mysqli_real_escape_string($con, $invol);
	  	
		$sql="INSERT INTO campusambreg (name, college, city, address, degree, graduation, email, phone, threethings, leader, invol, referedby) VALUES ".
			"('$name', '$college', '$city', '$address', '$degree','$graduation','$email','$phone', '$threethings', '$leader', '$invol', '$referalcode');";
	
		if (!mysqli_query($con, $sql)) {
			printf("Error(%d): %s\n", mysqli_errno($con), mysqli_error($con));

	  	}



		$confirmation = "http://2016.anwesha.info/campusambassador/confirmation.php?c=".md5($email.$phone)."&e=".$email;

		$message = "Click on the link to confirm your email - ".$confirmation;

		$headers .= 'From: Anwesha 2016 <info@anwesha.info>'."\r\n";
		$subject = "Email conformation - Campus Ambassador - Anwesha 2016";
		mail($email,$subject,$message,$header, "-f info@anwesha.info");
  	}

	mysqli_close($con);
    }
}

?>
                                                                                                                                                                            
<!DOCTYPE HTML>
<html>
<head>
<title>Campus Ambassador Registration Form</title>

	<link rel="stylesheet" href="../assets/css/all.css">
	<link rel="stylesheet" href="../assets/css/campusambassador.css">

<script>
function check(iden,deft){
	if (document.getElementById(iden).value == '') {document.getElementById(iden).style.color='#548acd';document.getElementById(iden).value = deft;}
	if (document.getElementById(iden).value != deft){document.getElementById(iden).style.color='#000';}
}
</script>
</head>
<body>

<?php

	 $sess = $helper->getSessionFromRedirect();
	//4. if fb sess exists echo name 
	 	if(isset($sess)){
	 		//create request object,execute and capture response
		$request = new FacebookRequest($sess, 'GET', '/me');
		// from response get graph object
		$response = $request->execute();
		$graph = $response->getGraphObject(GraphUser::className());
		// use graph object methods to get user details
		$name= $graph->getName();
		if(!is_null($graph->getLocation())){
			$city=$graph->getLocation();
		}
	}else{
		//else echo login

$required_scope='public_profile,email,user_location,user_birthday';
?>

		<!-- script>document.body.style.overflow = 'hidden';</script>
		<div class="facebook-login">
<?php
			echo '<a href='.$helper->getLoginUrl(array( 'scope' => $required_scope )).'><img src="../images/facebook-login.png"></a>';
?>
		</div -->
<?php
	}

?>

<div class="box">
<h1>Campus Ambassador</h1>
<h2>Registration form</h2>

<?php
if(!isset($message)){
?>

<hr>
All Fields must be filled.
<br>
<form name="det" action="index.php" method="post">
<input class="inp" name="name" type="text" id="name" value="<?php echo $name ?>" onblur="check('name','Full Name');" onfocus="if (this.value == 'Full Name') {this.value = '';}"><?php echo $nameErr ?>
<input class="inp" name="college" type="text" id="college" value="<?php echo $college ?>" onblur="check('college','University/College/Institution');" onfocus="if (this.value == 'University/College/Institution') {this.value = '';}"><?php echo $collegeErr ?>
<input class="inp" name="city" type="text" id="city" value="<?php echo $city ?>" onblur="check('city','City');" onfocus="if (this.value == 'City') {this.value = '';}"><?php echo $cityErr ?>
<input class="inp" name="degree" type="text" id="degree" value="<?php echo $degree ?>" onblur="check('degree','Degree/Branch')" onfocus="if (this.value == 'Degree/Branch') {this.value = '';}"><?php echo $degreeErr ?>
<input class="inp" name="graduation" type="text" id="graduation" value="<?php echo $graduation ?>" onblur="check('graduation','Graduation Year')" onfocus="if (this.value == 'Graduation Year') {this.value = '';}"><?php echo $graduationErr ?>
<textarea class="inp" name="address" type="text" id="address" onblur="check('address','Address')" onfocus="if (this.value == 'Address') {this.value = '';}" rows="10"><?php echo(htmlspecialchars($address)); ?></textarea><?php echo $addressErr ?>
<input class="inp" name="email" type="text" id="email" value="<?php echo $email ?>" onblur="check('email','Email ID')" onfocus="if (this.value == 'Email ID') {this.value = '';}"><?php echo $emailErr ?>
<input class="inp" name="phone" type="text" id="phone" value="<?php echo $phone ?>" onblur="check('phone','Mobile Number')" onfocus="if (this.value == 'Mobile Number') {this.value = '';}"><?php echo $phoneErr ?>
<textarea class="inp" name="threethings" type="text" id="threethings" onblur="check('threethings','Tell us 3 things you would do as a Campus Ambassador of Anwesha 2015')" onfocus="if (this.value == 'Tell us 3 things you would do as a Campus Ambassador of Anwesha 2015') {this.value = '';}" rows="10"><?php echo(htmlspecialchars($threethings)); ?></textarea><?php echo $threethingsErr ?>
<textarea class="inp" name="leader" type="text" id="leader" onblur="check('leader','Have you held any position of responsibility in your college? If yes, explain')" onfocus="if (this.value == 'Have you held any position of responsibility in your college? If yes, explain') {this.value = '';}" rows="10"><?php echo(htmlspecialchars($leader)); ?></textarea><?php echo $leaderErr ?>
<textarea class="inp" name="invol" type="text" id="invol" onblur="check('invol','Have you held any position of responsibility in your college? If yes, explain')" onfocus="if (this.value == 'Have you been a part of one or more previous editions of Anwesha? If yes, explain') {this.value = '';}" rows="10"><?php echo(htmlspecialchars($invol)); ?></textarea><?php echo $involErr ?>
<input class="inp" name="referalcode" type="text" id="referalcode" value="Referral Code" onblur="check('referalcode','Referral Code');" onfocus="if (this.value == 'Referral Code') {this.value = '';}">
<br>
<input class="but" name="add" type="submit" id="add" value="Submit">
</form>

<?php
}

else{
?>
Your response has been added to our database. An email has been sent to you along with confirmation link.
<?php
}
?>

</div>

<div id="bottom">
	In case of any issue contact: <br />
	<div id="contact">
		Mayank Garg +91 8292340330
	</div>
</div>	

</body>
</html>
                            