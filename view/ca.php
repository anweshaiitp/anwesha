<?php
$error="";
$success="";
$referalcode="";
if(isset($_GET['rc']))
	$referalcode = htmlspecialchars($_GET['rc'], ENT_QUOTES);
?>                                                                                                                   
<!DOCTYPE HTML>
<html>
	<head>
		<title>Campus Ambassador Registration Form</title>
		<link rel="stylesheet" href="assets/css/campusambassador.css">
	</head>
	<body background="images/board.jpg">
		<center><h4>Campus Ambassador Registration Form</h4></center>
		<div class="container">

			<p style='text-align:center;color:#ff0000;'><?php echo $error; ?></p><br />
			<p style='text-align:center;color:#33ff33;'><?php echo $success; ?></p><br />
			<form action="user/register/CampusAmbassador/" method="post">
				<input placeholder="Full Name" name="name" type="text" value="">
				<input placeholder="College" name="college" type="text" value="">
				<input placeholder="City" name="city" type="text" value="">
				<input placeholder="Degree" name="degree" type="text" value="">
				<input placeholder="Year of Graduation" name="graduation" type="text" value="">
				<textarea placeholder="Address" name="address" rows="10"></textarea>
				<input placeholder="Email" name="email" type="text" value="">
				<input placeholder="Mobile" name="mobile" type="text" value="">
				<input placeholder="DOB (yyyy-mm-dd)" name="dob" type="date" value="">
				<input placeholder="Sex(M/F)" name="sex" type="text" pattern="[MF]" value="">
				<!--
				<textarea placeholder="Tell us 3 things you would do as a Campus Ambassador of Anwesha '17." name="threethings" rows="10"></textarea>
				-->
				<textarea placeholder="Have you held any position of responsibility in your college? If yes, please explain." name="responsibility" rows="10"></textarea>
				<textarea placeholder="Have you been a part of one or more previous editions of Anwesha? If yes, please explain." name="involvement" rows="10"></textarea>
				<input placeholder="Refered by someone?" name="referalcode" type="text" value="<?php echo $referalcode; ?>">
				<input id="submit" type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>

