<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$subEvents = Event::getSubEvent($match[1],$conn);
echo json_encode($subEvents);
mysqli_close($conn);
?>