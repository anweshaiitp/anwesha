<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

$id = $match[1];
$token = $match[2];
$verification = People::verifyEmail($id,$token,$conn);
mysqli_close($conn);
// header('Content-type: application/json');
// echo json_encode($verification);
include('controller/Verify.html');
?>