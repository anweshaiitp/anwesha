<?php 
require('model/model.php');
require('dbConnection.php');

$anwid = null;

if(isset($_POST['anwid']) && !empty($_POST['anwid']) ) {
	if(!preg_match('@^[0-9]{4}$@',$_POST['anwid'])) {
		header('Content-type: application/json');
		$arr = array();
		$arr[] = -1;
		$arr[] = 'Invalid Anwesha ID. [4 digits only]';
		echo json_encode($arr);
		die();
	}
	$anwid = $_POST['anwid'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : ANWID';
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
$threethings = null;
if(isset($_POST['threethings']) && !empty($_POST['threethings'])){
	$threethings = $_POST['threethings'];	
} else {
	header('Content-type: application/json');
	$arr = array();
	$arr[] = -1;
	$arr[] = 'Missing parameter in the request : threethings';
	echo json_encode($arr);
	die();
}

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$result = People::switchCampusAmbassador($anwid,$email,$address,$degree,$graduation,$responsibility,$involvement,$threethings,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>