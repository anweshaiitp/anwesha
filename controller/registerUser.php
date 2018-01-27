<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

header('Content-type: application/json');	
require('middleware/authMiddleware.php');

if(!isset($_SESSION['userID'])) {
	mysqli_close($conn);
	
	echo json_encode(array("status"=>false, "msg"=>"Please Login First"));
	die();
}
$userID = $_SESSION['userID'];
$eveID = $match[1];

$size = Events::getEventSize($eveID,$conn);
if($size == -1){
	mysqli_close($conn);
	echo json_encode(array("status"=>false, "msg"=>"Event does not exist!"));
	die();
} elseif ($size == -10) {
	mysqli_close($conn);
	echo json_encode(array("status"=>false,"msg"=>"Registration not required!"));
	die();
} elseif ($size != 1) {
	mysqli_close($conn);
	echo json_encode(array("status"=>false,"msg"=>"Single User Registration not allowed!"));
	die();
}


$result = People::registerEventUserSingle($userID,$eveID,$conn);
mysqli_close($conn);
echo json_encode($result);
?>
