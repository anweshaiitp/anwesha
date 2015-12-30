<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

require('middleware/authMiddleware.php');


$userIDs = $match[1];
$eveID = $match[2];

$size = Events::getEventSize($eveID,$conn);
if($size == -1){
	mysqli_close($conn);
	header('Content-type: application/json');	
	echo json_encode(array("status"=>false, "msg"=>"Event does not exist!"));
	die();
} elseif ($size == 1) {
	mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode(array("status"=>false,"msg"=>"This is a group Event."));
	die();
}


$result = People::registerGroupEvent($userIDs,$eveID,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>
