<?php 
$url = "now/";
?>
<html>
<head>
<title>Anwesha - Password Change</title>
<style>
body{
	background: #000000;
	color:#ffffff;
}
	input{
		font-size: 30px;
	}
</style>
</head>
<body><center><h1>Anwesha - Password Change</h1>
	<h2>Enter new password</h2><br>
	<form action='<?php echo $url;?>' method="post">
		<input type='text' name='newPassword' placeholder="New Password" pattern="[a-zA-Z0-9]{6,30}" title="Password should be alpha number 6 to 30 digits"><h4>6 to 30 digits[alpha-numeric]</h4><br>
		<input type='submit' value='Change Password'>
	</form>
</body>
</html>