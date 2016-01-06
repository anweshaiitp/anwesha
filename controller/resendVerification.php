<?php 
require('model/model.php');
require('dbConnection.php');

$userID = $match[1];
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$user = People::getUser($userID,$conn);
if ($user[0] != 1) {
	mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode(array("status" => false, "msg" => $user[1]));
	die();
}
$user = $user[1];

$loginInfo = People::getUserLoginInfo($userID,$conn);
if ($loginInfo[0] != 1) {
	mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode(array("status" => false, "msg" => "Error! Contact Registration Desk Immediately."));
	die();
}
mysqli_close($conn);
$loginInfo = $loginInfo[1];
if(is_null($loginInfo['password'])){
	header('Content-type: application/json');
	echo json_encode(array("status" => false, "msg" => "Account already verified."));
	die();
}
People::Email($user['email'], $user['name'], $loginInfo['csrfToken'], $userID);
header('Content-type: application/json');
echo json_encode(array("status" => true, "msg" => "Verification link sent to registered email."));
die();
?>