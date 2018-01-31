<?php

	session_start();
	header("Content-type:application/json");
	require('model/model.php');
	require('defines.php');
	// require('global.php');
	require('dbConnection.php');

	$error = "";
	$message = "";
	$status = 0;
	$httpstat = 400;
	function exi($pval){
		return (isset($_POST[$pval]) && !empty($_POST[$pval]));
	}
	if (exi('uID') && exi('amt') && ( exi('authKey') || isset($_SESSION['userID']) )  ) {
		# code...
	} else {
		echo json_encode([
			"status" => -1,
			"httpstat" => 400,
			"message" => "Invalid arguments"
		]);
		http_response_code(400);
		die();
	}

	$_POST["userID"] = $_POST['uID'];
	$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
	if(!$conn)
		error_log(mysqli_connect_error());
	
	require('middleware/authMiddleware.php');

	$retArr =array();

	$registrar = mysqli_real_escape_string($conn,$_POST['uID']);
	$comments = (isset($_POST['comment']))?mysqli_real_escape_string($conn,$_POST['comment']):'';
	$amt = mysqli_real_escape_string($conn,$_POST['amt']);
	$val = mysqli_real_escape_string($conn,$_POST['val']);
	if(!isset($val) || $val == "")
		$val = -100;
	$sql = " SELECT ( count(*) ) as reg FROM People WHERE (pId = $registrar AND isRegTeam <> 0) ";
	alog("pay: $sql");
	$result = mysqli_query($conn, $sql);
	if(!$result || mysqli_num_rows($result)<1){

	    $error .= "Problem in displaying result #".alog(mysqli_error($conn));
	    error_log(mysqli_error($conn));
	    $status = -1;
	    $httpstat = 403;
	}

	$valID = 0;
	while($row = mysqli_fetch_assoc($result)){
        $valID = $row["reg"];
    }
	if($valID ==1 ){
		$status = 1;
		$httpstat = 200;
		$message = "Valid user";
	} else {
		$status = -1;
		$httpstat = 403;
	    $error .= "Invalid user #".alog("pay invalid: reg: $registrar , amt: $amt, val: $val, $pid= ".$match[1] );
	    error_log( $error );
	}

if($httpstat == 200){
	$trID = ($match[1]*1000000)+( time()%1000000 );
	
	$sql = " UPDATE `People` SET `feePaid` = `feePaid` + '$amt', `rcv` = '$registrar' WHERE `People`.`pId` = ".$match[1]."; ";
	if($result = mysqli_query($conn, $sql)){
		$status = 1;
		$httpstat = 200;
		$message = "Amount received from ANW".$match[1].".Transanction ID: ANWTR$trID. Reg team member: ANW$registrar .";
		$insquery = "INSERT INTO `payments`(`pId`, `trID`, `amount`, `comments`, `registrar`, `time`) VALUES ($match[1], $trID,$amt,'$comments',$registrar,NOW())";
		if(!mysqli_query($conn, $insquery)){
			$status = -1;
			$httpstat = 500;
			$message = "Error appending to table. #".alog(mysqli_error($conn));
		}else{
		$user = People::getUser($match[1],$conn)[1];
		$purp = ($comments!='' && $comments!=null)?" for ".$comments:"";
		$emailcontent = "Hi ".$user['name'].",<br>We have recieved an amount of <b>INR $amt/-</b> for your anwesha ID ANW".$user['pId']." $purp. <br>Transaction ID is: <b>ANWTR$trID</b><br>Please show your AnweshaQR code and valid identity proof during Anwesha'18 as a proof of payment.<br> Thank You for being a part of Anwesha'18! <br>In case you have any registration related queries feel free to contact $ANWESHA_REG_CONTACT or drop an email to <i>$ANWESHA_REG_EMAIL</i>.<br> You can also visit our website <i>$ANWESHA_URL</i> for more information.<br><br>Registration Desk<br>$ANWESHA_YEAR";
		 People::EmailWithText($user["email"],"Payment Recieved",$emailcontent,"https://anwesha.info/","Visit Website");
		}
	}else{
		$status = -1;
		$httpstat = 400;
		$error = "Error in updating fee #".alog(mysqli_error($conn));
		error_log(mysqli_error($conn));
	}
}

$message = ($status == 1)? $message:$error;
echo json_encode( [
	"status" => $status,
	"httpstat" => $httpstat,
	"message" => $message
]);



