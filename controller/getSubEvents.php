<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$subEvents = Events::getSubEvent($match[1],$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($subEvents);
?>
