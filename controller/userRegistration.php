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
$result = People::createUser($name,$college,$sex,$mob,$email,$dob,$city,$conn);
mysqli_close($conn);
header('Content-type: appication/json');
echo json_encode($result);
?>