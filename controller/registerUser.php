<?php 
require('model/model.php');
require('dbConnection.php');

// $arr = json_decode($_POST['req']);

$hashContent = $_POST["hash"];
$content = $_POST["content"];
$userID = $match[1];
$eveID = $match[2];

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
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

$res = Auth::getUserPrivateKey($userID,$conn);
if(!$res["status"]){
	mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode($res);
	die();
}
$privateKey = $res["key"];

$auth = Auth::authenticateRequest($privateKey,$hashContent,$content);
$result = Auth::registerEventUserSingle($userID,$eveID,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>