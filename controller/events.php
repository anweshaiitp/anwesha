<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$events = Events::getMainEvents($conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($events);
?>
