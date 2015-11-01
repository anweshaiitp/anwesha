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
/**
 * Information if user was created or not. As false is passed, it will create user not CampusAmbassador.
 * @var array;
 */
$result = People::createUser($name,$college,$sex,$mobile,$email,$dob,$city,false,$conn);
mysqli_close($conn);
header('Content-type: application/json');
echo json_encode($result);
?>