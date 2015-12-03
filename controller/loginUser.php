<?php 
require('model/model.php');
require('dbConnection.php');

// $arr = json_decode($_POST['req']);
$arr = $_POST['req'];
$userID = $arr['username'];
$password = $arr['password'];

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

$result = Auth::loginUser($userID,$password,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>