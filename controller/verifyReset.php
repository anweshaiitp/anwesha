<?php 
require('model/model.php');
require('dbConnection.php');
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$id = $match[1];
if(!(isset($_POST['resetPswd']) && !empty($_POST['resetPswd']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,array('Reset Password not given.')));
	die();
}
$resetPswd=mysql_prep($_POST['resetPswd']);
$verification = People::checkResetPassword($id,$resetPswd,$conn);
mysqli_close($conn);
include('controller/reset.html');
?>