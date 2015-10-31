<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$subEvents = Events::getSubEvent($match[1],$conn);
echo json_encode($subEvents);
header('Content-type: appication/json');
mysqli_close($conn);
?>
