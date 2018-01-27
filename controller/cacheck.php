<?php
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$reg = [];
if(isset($match[1])){
	$reg = People::checkReg($match[1],$conn);
}else{
	$reg[] = -1;
	$reg[] = "Parameter not passed.";
}
header('Content-type: application/json');
echo json_encode($reg);
