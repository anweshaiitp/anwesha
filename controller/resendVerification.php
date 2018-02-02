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
$user = $user[1];
$pId=  $user['pId'];
$loginInfo = People::getUserLoginInfo($pId,$conn);
if ($loginInfo[0] != 1) {
	mysqli_close($conn);
	header('Content-type: application/json');
	echo json_encode(array(-1, "Error! Contact Registration Desk Immediately.",$pId));
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
People::Email($emailID, $user['name'], $loginInfo['csrfToken'], $pId, ($type==1)?0:1);
header('Content-type: application/json');
echo json_encode(array(1,  "Verification link sent to registered email."));
die();
?>
