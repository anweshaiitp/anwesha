<html>
<body>

<?php
require('../dbConnection.php');
if(isset($_POST['Id']) && !empty($_POST['Id']) && isset($_POST['Feet']) && !empty($_POST['Feet']) && isset($_POST['Inches']) && !empty($_POST['Inches']) && isset($_POST['bust']) && !empty($_POST['bust']) && isset($_POST['waist']) && !empty($_POST['waist']) && isset($_POST['hips']) && !empty($_POST['hips']) && isset($_POST['weight']) && !empty($_POST['weight']) && isset($_POST['status']) && !empty($_POST['status']) && isset($_FILES['pic1']) && isset($_FILES['pic2']) && isset($_FILES['pic3'])){

} else {
	die('Submitted form was incomplete. Abort.');
}
 $mysqli = new mysqli(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
// $name = $_POST['fname']." ".$_POST['mname']." ".$_POST['lname'];
// $dob = $_POST['Day']."/".$_POST['Month']."/".$_POST['Year'];
$id = $_POST['Id'];
$height = $_POST['Feet']." Feet ".$_POST['Inches']." Inches ";
$vital = $_POST['bust'].", ".$_POST['waist'].", ".$_POST['hips'].", ";
// $age = $_POST['age'];
// $college = $_POST['college'];
// $currentcity = $_POST['currentcity'];
// $birthcity = $_POST['birthcity'];
$weight = $_POST['weight'];
// $mobile = $_POST['mobile'];
// $email = $_POST['email'];
$status = $_POST['status'];

$target = "pic/".$id."/";
mkdir($target,0777);
$target1 = $target . basename( $_FILES['pic1']['name']);
$target2 = $target . basename( $_FILES['pic2']['name']);
$target3 = $target . basename( $_FILES['pic3']['name']);

$pic1=basename( $_FILES['pic1']['name']);
$pic2=basename( $_FILES['pic2']['name']);
$pic3=basename( $_FILES['pic3']['name']);

move_uploaded_file($_FILES['pic1']['tmp_name'], $target1);
move_uploaded_file($_FILES['pic2']['tmp_name'], $target2);
move_uploaded_file($_FILES['pic3']['tmp_name'], $target3);

// $con = mysqli_connect("localhost","root","");
$con = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
 
$sql=$mysqli->prepare("INSERT INTO `fmi` (id,height,weight,vital,status) VALUES (:id,:height,:weight,:vital,:status)");
$sql->bindValue(':id',$id);
$sql->bindValue(':height',$height);
$sql->bindValue(':weight',$weight);
$sql->bindValue(':vital',$vital);
$sql->bindValue(':status',$status);

if (!$sql->execute())
  {
  	mysqli_close($con);
  die('Error: Anwesha ID does not exist.');
  }
echo "Your information has been submitted. Redirecting you to http://www.anwesha.info/ 
<!-- meta http-equiv='refresh' content='3;url=http://www.anwesha.info/' -->";

mysqli_close($con);

?>

</body>
</html>
