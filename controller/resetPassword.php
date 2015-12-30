<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

require('middleware/authMiddleware.php');

if (isset($_POST['oldPassword']) && !empty($_POST['oldPassword']) && isset($_POST['newPassword']) && !empty($_POST['newPassword'])) {
	# code...
} else {
	header('Content-type: application/json');
	echo json_encode(array("status" => false, "msg" => "Improper request"));
	die();
}

$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];

if(count($oldPassword) < 4 || count($oldPassword) > 15 || count($newPassword) < 4 || count($newPassword) > 15){
	header('Content-type: application/json');
	echo json_encode(array("status" => false, "msg" => "Password length must be between 4 to 15"));
	die();
}

$userID = $_SESSION['userID'];

if(!Auth::verifyPassword($userID,$oldPassword,$conn)){
	header('Content-type: application/json');
	echo json_encode(array("status" => false, "msg" => "Old password did not match"));
	die();
}

if (Auth::changePassword($userID,$newPassword,$conn)){
	header('Content-type: application/json');
	echo json_encode(array("status" => true, "msg" => "Your password has been changed."));
	die();
} else {
	header('Content-type: application/json');
	echo json_encode(array("status" => false, "msg" => "Password change failed. Contact web-development team."));
	die();
}
?>