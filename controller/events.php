<?php 
require('model/model.php');
require('dbConnection.php');
/**
 * will store connection link
 */
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$events = Event::getAllEventCategory($conn);
mysqli_close($conn);
echo json_encode($events);
?>