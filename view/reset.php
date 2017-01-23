<?php 
$url = "now/";
?>
<html>
<head>
<title>Anwesha - Password Change</title>
</head>
<body>
	Enter 6 to 30 digits[alpha-numeric] password<br>
	<form action='<?php echo $url;?>' method="post">
		<input type='text' name='newPassword' placeholder="New Password" pattern="[a-zA-Z0-9]{6,30}" title="Password should be alpha number 6 to 30 digits">
		<input type='submit' value='Change Password'>
	</form>
</body>
</html>