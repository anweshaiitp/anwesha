<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

$eid = $match[1];
$result = Auth::forgetPassword($eid,$conn);
mysqli_close($conn);
echo json_encode($result);
?>