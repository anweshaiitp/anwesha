<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

$id = $match[1];
$token = $match[2];
$verification = People::verifyEmail($id,$token,null,$conn);
$userObj = People::getUser($id,$conn)[1];
$userEmail = $userObj['email'];
mysqli_close($conn);
// header('Content-type: application/json');
// echo json_encode($verification);
include('view/Verify.html');
?>