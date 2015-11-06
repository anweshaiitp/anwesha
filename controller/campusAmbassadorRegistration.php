<?php 
require('model/model.php');
require('dbConnection.php');

$name = null;
if(isset($_POST['name']) && !empty($_POST['name'])){
	$name = $_POST['name'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : name';
	echo json_encode($arr);
	die();
}

$college = null;
if(isset($_POST['college']) && !empty($_POST['college'])){
	$college = $_POST['college'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : college';
	echo json_encode($arr);
	die();
}

$sex = null;
if(isset($_POST['sex']) && !empty($_POST['sex'])){
	$sex = $_POST['sex'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : sex';
	echo json_encode($arr);
	die();
}

$mobile = null;
if(isset($_POST['mobile']) && !empty($_POST['mobile'])){
	$mobile = $_POST['mobile'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : mobile';
	echo json_encode($arr);
	die();
}

$email = null;
if(isset($_POST['email']) && !empty($_POST['email'])){
	$email = $_POST['email'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : email';
	echo json_encode($arr);
	die();
}

$dob = null;
if(isset($_POST['dob']) && !empty($_POST['dob'])){
	$dob = $_POST['dob'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : dob';
	echo json_encode($arr);
	die();
}

$city = null;
if(isset($_POST['city']) && !empty($_POST['city'])){
	$city = $_POST['city'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : city';
	echo json_encode($arr);
	die();
}

$address = null;
if(isset($_POST['address']) && !empty($_POST['address'])){
	$address = $_POST['address'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : address';
	echo json_encode($arr);
	die();
}

$degree = null;
if(isset($_POST['degree']) && !empty($_POST['degree'])){
	$degree = $_POST['degree'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : degree';
	echo json_encode($arr);
	die();
}

$graduation = null;
if(isset($_POST['graduation']) && !empty($_POST['graduation'])){
	$graduation = $_POST['graduation'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : graduation';
	echo json_encode($arr);
	die();
}

$responsibility = null;
if(isset($_POST['responsibility']) && !empty($_POST['responsibility'])){
	$responsibility = $_POST['responsibility'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : responsibility';
	echo json_encode($arr);
	die();
}

$involvement = null;
if(isset($_POST['involvement']) && !empty($_POST['involvement'])){
	$involvement = $_POST['involvement'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : involvement';
	echo json_encode($arr);
	die();
}

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$result = People::createCampusAmbassador($name,$college,$sex,$mobile,$email,$dob,$city,$address,$degree,$graduation,$responsibility,$involvement,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>