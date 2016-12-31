<?php 
require('model/model.php');
require('dbConnection.php');

$userID = $match[1];
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$user = People::getUser($userID,$conn);
if ($user[0] != 1) {
	mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode(array(-1,  $user[1]));
	die();
}
$user = $user[1];

$loginInfo = People::getUserLoginInfo($userID,$conn);
if ($loginInfo[0] != 1) {
	mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode(array(-1, "Error! Contact Registration Desk Immediately."));
	die();
}
mysqli_close($conn);
$loginInfo = $loginInfo[1];
$type=$loginInfo['type'];
if(($type==0)) {
	header('Content-type: application/json');
	echo json_encode(array(-1, "Account already verified."));
	die();
}
People::Email($user['email'], $user['name'], $loginInfo['csrfToken'], $userID);
header('Content-type: application/json');
echo json_encode(array(1,  "Verification link sent to registered email."));
die();
?>