<?php 
require('model/model.php');
require('dbConnection.php');

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
	# code...
} else {
	http_response_code(400);
	die();
}

$userID = $_POST['username'];
$password = $_POST['password'];
if(preg_match('/^ANW([0-9]{4})$/', $userID, $matches)){
	$userID = $matches[1];
} else {
	// mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode(array("status" => false, "msg" => "Invalid username"));
	die();
}
echo count($password);
if(strlen($password) > 15 || strlen($password) < 4){
	// mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode(array("status" => false, "msg" => "Invalid password"));
	die();
}
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

$result = Auth::loginUser($userID,$password,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>