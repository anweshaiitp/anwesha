<?php 
require('model/model.php');
require('dbConnection.php');

$userID = $_POST['username'];
$password = $_POST['password'];

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

$result = Auth::loginUser($userID,$password,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>