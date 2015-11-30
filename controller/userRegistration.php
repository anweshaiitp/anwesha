<?php
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$name = null;
$college = null;
$sex = null;
$mobile = null;
$email = null;
$dob = null;
$city = null;
if(!(isset($_POST['name']) && !empty($_POST['name']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,array('Name not given.')));
	die();
}
if(!(isset($_POST['college']) && !empty($_POST['college']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,array('College not given.')));
	die();
}
if(!(isset($_POST['sex']) && !empty($_POST['sex']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,array('Sex not given.')));
	die();
}
if(!(isset($_POST['mobile']) && !empty($_POST['mobile']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,array('Mobile not given.')));
	die();
}
if(!(isset($_POST['email']) && !empty($_POST['email']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,array('Email-id not given.')));
	die();
}
if(!(isset($_POST['dob']) && !empty($_POST['dob']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,array('Date of Birth not given.')));
	die();
}
if(!(isset($_POST['city']) && !empty($_POST['city']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,array('City not given.')));
	die();
}
$name = $_POST['name'];
$college = $_POST['college'];
$sex = $_POST['sex'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$city = $_POST['city'];
/**
 * Information if user was created or not. As false is passed, it will create user not CampusAmbassador.
 * @var array;
 */
$result = People::createUser($name,$college,$sex,$mobile,$email,$dob,$city,false,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>
