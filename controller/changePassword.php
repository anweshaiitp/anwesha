<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

require('middleware/authMiddleware.php');

$userID = $_SESSION['userID'];

if (isset($_POST['oldPassword']) && isset($_POST['newPassword']) && !empty($_POST['newPassword']) && !empty($_POST['oldPassword'])) {
	# code...
} else {
	mysqli_close($conn);
	header('Content-type: application/json');	
	echo json_encode(array("status"=>false, "msg"=>"Incomplete Request"));
	die();
}

$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];

if (strlen($oldPassword) > 15 || strlen($oldPassword) < 4 || strlen($newPassword) > 15 || strlen($newPassword) < 4){
	mysqli_close($conn);
	header('Content-type: application/json');	
	echo json_encode(array("status"=>false, "msg"=>"Password length should be between 4 and 15"));
	die();
}

$stat = Auth::verifyPassword($userID,$oldPassword,$conn);

if (!$stat) {
	mysqli_close($conn);
	header('Content-type: application/json');	
	echo json_encode(array("status"=>false, "msg"=>"old Password did not match."));
	die();
}

$status = Auth::changePassword($userID,$newPassword,$conn);
mysqli_close($conn);
header('Content-type: application/json');
if($status){
	echo json_encode(array("status"=>true, "msg"=>"Password changed successfully."));
	die();
} else {
	echo json_encode(array("status"=>false, "msg"=>"Internal Error, please try later."));
	die();
}
?>