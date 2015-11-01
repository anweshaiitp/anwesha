<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$name = $_POST['name'];
$college = $_POST['college'];
$sex = $_POST['sex'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$city = $_POST['city'];
$address = $_POST['address'];
$degree = $_POST['degree'];
$graduation = $_POST['graduation'];
$responsibility = $_POST['responsibility'];
$involvement = $_POST['involvement'];
$result = People::createCampusAmbassador($name,$college,$sex,$mobile,$email,$dob,$city,$address,$degree,$graduation,$responsibility,$involvement,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>