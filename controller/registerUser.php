<?php 
require('model/model.php');
require('dbConnection.php');
$eventID = $match[1];

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$result = Auth::registerEventUserSingle(5553,17,$conn);
mysqli_close($conn);
return json_encode($result);
?>