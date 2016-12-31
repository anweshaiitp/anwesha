<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

$id = $match[1];
$token = $match[2];
if (isset($_POST['newPassword']) && !empty($_POST['newPassword']) ) {
	$password = $_POST['newPassword'];
} else {
	mysqli_close($conn);
	header('Content-type: application/json');	
	echo json_encode(array("status"=>false, "msg"=>"Incomplete Request"));
	die();
}
if (!preg_match('/^[a-zA-Z0-9]{6,30}$/', $password)) {
    mysqli_close($conn);
	header('Content-type: application/json');	
	echo json_encode(array("status"=>false, "msg"=>"Password should be alpha numeric only."));
	die();
}

$status = People::changePasswordResetToken($id,$token,$password,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($status);

?>