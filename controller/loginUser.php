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

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

$result = Auth::loginUser($userID,$password,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>