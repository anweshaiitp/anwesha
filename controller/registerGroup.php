<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

require('middleware/authMiddleware.php');


$userID = $_SESSION['userID'];
$userIDs;
if (isset($_POST['IDs']) && !empty($_POST['IDs']) && is_array($_POST['IDs'])) {
	$userIDs = $_POST['IDs'];
} else {
	header('Content-type: application/json');
	echo json_encode(array("status"=>false,"msg"=>"Incomplete request. IDs missing."));
	die();
}
if (isset($_POST['name']) && !empty($_POST['name'])) {
	$userIDs = $_POST['IDs'];
} else {
	header('Content-type: application/json');
	echo json_encode(array("status"=>false,"msg"=>"Incomplete request. Team name missing."));
	die();
}
$eveID = $match[1];

$size = Events::getEventSize($eveID,$conn);
if($size == -1){
	mysqli_close($conn);
	header('Content-type: application/json');	
	echo json_encode(array("status"=>false, "msg"=>"Event does not exist!"));
	die();
} elseif ($size == 1) {
	mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode(array("status"=>false,"msg"=>"This is not a group Event."));
	die();
}
for ($i=0; $i <count($userIDs) ; $i++) {
	if(Auth::sanitizeID($userIDs[$i])['status']){
		$userIDs[$i] = Auth::sanitizeID($userIDs[$i]);	
	} else {
		header('Content-type: application/json');
		echo json_encode(array("status"=>false,"msg"=>"ID is not valid " . $userIDs[$i]));
		die();
	}
}
array_push($userIDs,$userID);

$result = People::registerGroupEvent($userIDs,$size,$eveID,$name, $conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>
