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
$refcode = "";
if(!(isset($_POST['name']) && !empty($_POST['name']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,'Name not given.'));
	die();
}

if(!(isset($_POST['college']) && !empty($_POST['college']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,'College not given.'));
	die();
}
if(!(isset($_POST['sex']) && !empty($_POST['sex']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,'Sex not given.'));
	die();
}
if(!(isset($_POST['mobile']) && !empty($_POST['mobile']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,'Mobile not given.'));
	die();
}
if(!(isset($_POST['email']) && !empty($_POST['email']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,'Email-id not given.'));
	die();
}
if(!(isset($_POST['dob']) && !empty($_POST['dob']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,'Date of Birth not given.'));
	die();
}
if(!(isset($_POST['city']) && !empty($_POST['city']))){
	header('Content-type:application/json');
	echo json_encode(array(-1,'City not given.'));
	die();
}

$fbID = null;

if(isset($_POST['fbID']) && !empty($_POST['fbID'])){
	$fbID = $_POST['fbID'];	
}

$name = $_POST['name'];
$college = $_POST['college'];
$sex = $_POST['sex'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$dob = $_POST['dob'];
if(isset($_POST['password'])){
	$pass = $_POST['password'];
}else{
	$pass = null;
}

$city = $_POST['city'];
if(isset($_POST['refcode'])) {
	$refcode = $_POST['refcode'];
}
/**
 * Information if user was created or not. As false is passed, it will create user not CampusAmbassador.
 * @var array;
 */
$result = People::createUser($name,$fbID,$college,$sex,$mobile,$email,$pass,$dob,$city,false,$refcode,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
if($result[0]==1){
	session_start();
	$_SESSION['fbSMSanwID'] = $result[1]['pId'];
	$_SESSION['fbSMSmob'] = $result[1]['mobile'];
	$_SESSION['fbSMSsessID'] = session_id();
}
?>
