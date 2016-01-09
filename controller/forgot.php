<?php 
require('model/model.php');
require('dbConnection.php');
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$id = $match[1];
$verification = People::forgotPassword($id,$conn);
mysqli_close($conn);
include('controller/forgot.html');
?>