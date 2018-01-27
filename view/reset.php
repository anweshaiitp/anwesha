<?php 
require('model/model.php');
require('dbConnection.php');

$url = "now/";

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

$id = $match[1];
$token = $match[2];
$status = 0;
if (isset($_POST['newPassword']) && !empty($_POST['newPassword']) ) {
	$status = -1;
	$password = $_POST['newPassword'];

	if (!preg_match('/^[a-zA-Z0-9]{6,30}$/', $password)) {
	    mysqli_close($conn);
		$message = "Password should be alpha numeric only.";
		die();
	}
	$resp = People::changePasswordResetToken($id,$token,$password,$conn);
	$status = $resp[0];
	$message = $resp[1];
	mysqli_close($conn);
} else {
	mysqli_close($conn);
	// header('Content-type: application/json');	
	$status = 0;
	$message = "Incomplete Request";
	
}


// header('Content-type: application/json');
// echo json_encode($status);
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
	<?php 
	if($status == 0){
		echo "<h2>Enter new password</h2><br>
	<form action='' method='post'>
		<input type='text' name='newPassword' placeholder='New Password' pattern='[a-zA-Z0-9]{6,30}' title='Password should consist only alphabets and numbers. Minimum 6 characters, maximum 30 characters'><br><h4>Password should consist only alphabets and numbers. Minimum 6 characters, maximum 30 characters</h4>
		<input type='submit' value='Change Password'>
	</form>";
	} else {
		echo "<h2>$message</h2><br><br>";
		if($status == -1){
			echo "<h3>Try again</h3><br><br><form action='' method='post'>
		<input type='text' name='newPassword' placeholder='New Password' pattern='[a-zA-Z0-9]{6,30}' title='Password should consist only alphabets and numbers. Minimum 6 characters, maximum 30 characters'><br><h4>Password should consist only alphabets and numbers. Minimum 6 characters, maximum 30 characters</h4>
		<input type='submit' value='Change Password'>
	</form>";
		}else{
			$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
			echo "<a href='$actual_link'><h3>Go home (anwesha.info)</h3></a>";
		}
	}
	?>
</body>
</html>