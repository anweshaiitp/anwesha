<?php 
require('model/model.php');
require('dbConnection.php');
/**
 * will store connection link
 */
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$events = Events::getMainEvents($conn);
mysqli_close($conn);
header('Content-type: appication/json');
echo json_encode($events);
?>
