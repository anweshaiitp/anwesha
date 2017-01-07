<?php 
require('model/model.php');
require('dbConnection.php');

$emailID = $match[1];
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$user = People::getUserByEmail($emailID,$conn);
if ($user[0] != 1) {
	mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode(array(-1,  $user[1]));
	die();
}
$pID= $user[1];
$user = $user[1];
$loginInfo = People::getUserLoginInfo($pID,$conn);
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
People::Email($emailID, $user['name'], $loginInfo['csrfToken'], $pID);
header('Content-type: application/json');
echo json_encode(array(1,  "Verification link sent to registered email."));
die();
?>