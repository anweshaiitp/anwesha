<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

$id = $match[1];
$result = People::forgetPassword($id,$conn);
mysqli_close($conn);
echo json_encode($result);
?>