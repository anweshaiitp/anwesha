<?php

	header("Content-type:application/json");
	require('model/model.php');
	require('defines.php');
	require('dbConnection.php');

	$error = "";
	$message = "";
	$status = 0;
	$httpstat = 400;
	function exi($pval){
		return (isset($_POST[$pval]) && !empty($_POST[$pval]));
	}
	if (exi('uID') && exi('amt') && exi('val') ) {
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

	$retArr =array();

	$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
	if(!$conn)
		error_log(mysqli_connect_error());

	$registrar = mysqli_real_escape_string($_POST['uID']);
	$amt = mysqli_real_escape_string($_POST['amt']);
	$val = mysqli_real_escape_string($_POST['val']);
	if(!isset($val) || $val == "")
		$val = -100;
	$sql = " SELECT ( count(*) ) as reg FROM People WHERE (pId = $registrar AND isRegTeam = $val AND isRegTeam <> 0) ";
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
	$sql = " UPDATE `People` SET `feePaid` = '$amt', `rcv` = '$registrar' WHERE `People`.`pId` = ".$match[1]."; ";
	if($result = mysqli_query($conn, $sql)){
		$status = 1;
		$httpstat = 200;
		$message = "Amount received from ANW".$match[1].". Reg team member: ANW$registrar .";
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



