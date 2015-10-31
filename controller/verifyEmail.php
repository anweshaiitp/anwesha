<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

$id = $group[1];
$token = $group[2];
$verification = People::verifyEmail($id,$token);
mysqli_close($conn);
header('Content-type: appication/json');
echo json_encode($result);
?>