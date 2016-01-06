<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

require('middleware/authMiddleware.php');


$userID = $_SESSION['userID'];
$eveID = $match[1];

$size = Events::getEventSize($eveID,$conn);
if($size == -1){
	mysqli_close($conn);
	header('Content-type: application/json');	
	echo json_encode(array("status"=>false, "msg"=>"Event does not exist!"));
	die();
} elseif ($size != 1) {
	mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode(array("status"=>false,"msg"=>"Registration not allowed!"));
	die();
}


$result = People::registerEventUserSingle($userID,$eveID,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>
