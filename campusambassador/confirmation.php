<?php

$email = $_GET["e"];
$nep = $_GET["c"];


$con = new mysqli("localhost", "anwesha_2016", ")z%1ZM3R68Os", "anwesha_2016");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

$sql = "SELECT name, email, phone FROM campusambreg";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $email = $row["email"]; 
        $phone = $row["phone"];

        if(md5($email.$phone)===$nep){


	do{
		$referalcode = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 3).substr(str_shuffle("0123456789"), 0, 4);
		$sql = 'SELECT `referalcode` FROM campusambreg WHERE `referalcode` = "'.$referalcode.'" ';
		$select = mysqli_query($con, $sql);
	}while(mysqli_num_rows($select)>0);


        	$sql = ' UPDATE campusambreg SET status=1, referalcode="'.$referalcode.'" WHERE `email` = "'.$email.'"';

        	if ($con->query($sql) === TRUE) {
        	    $message = "Your account has been validated.";
        	    
        	    $message .= " Your referral code is ".$referalcode.". Copy this for future reference.";

        	    $emailmessage = "Your email has been validated. Your referral code is - ".$referalcode;
        	    $headers .= 'From: Anwesha 2016 <info@anwesha.info>'."\r\n";
        	    $subject = "Account Validated - Your Referral Code";
        	    mail($email,$subject,$emailmessage,$header, "-f info@anwesha.info");
        	    
        	} else {
        	    echo "Error updating record: " . $con->error;
        	}

        }
        else{
        	$message = "Incorrect URL. If you think this is an error, please contact the admin.";
        }
    }
} else {
    $message = "Incorrect URL. If you think this is an error, please contact the admin.";
}
$con->close();


?>
<!DOCTYPE HTML>
<html>
<head>
<title>Campus Ambassador Registration Form</title>

	<link rel="stylesheet" href="../css/all.css">
	<link rel="stylesheet" href="../css/campusambassador.css">

<script>
function check(iden,deft){
	if (document.getElementById(iden).value == '') {document.getElementById(iden).style.color='#548acd';document.getElementById(iden).value = deft;}
	if (document.getElementById(iden).value != deft){document.getElementById(iden).style.color='#000';}
}
</script>
</head>
<body>

<div class="box">
<h1>Campus Ambassador</h1>
<h2>Registration</h2>
<br>
<?php echo $message;?><br>

</div>	

</body>
</html>