<?php
	header("Content-type:application/json");
	require('model/model.php');
	require('defines.php');
	require('dbConnection.php');

	$retArr =array();

	$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
	if(!$conn)
		error_log(mysqli_connect_error());

	$pId = substr($match[1],0,4);
	$hash = substr($match[1],3);
	
	if($match[1] == $pId.sha1($pId.$AESKey)){
		if(isset($_POST['orgID']) && isset($_POST['eveID'])){
			// if($organiser = Events::isValidOrg($_POST['orgID'],$_POST['eveID'],$conn)){
				$call = Events::regUser($_POST['orgID'],$_POST['eveID'],$pId,$conn);
				$status = $call[0];
				$httpstatus = $call[1];
				$message = $call[2];
			// } else {
			// 	$httpstatus = $organiser[1];
			// 	$status = $organiser[0];
			// 	$message = $organiser[2];
			// }
		} else {
			$httpstatus = 200;
			$status = 1;
			$call = People::getUser($pId,$conn);
			$message = $call[1];
			// $message = People::getUser($pId,$conn);
			if($call[0]!=1){
				$httpstatus = 400;
				$status = -1;
				$message = $call[1];
			}
		}
	}else{
		$message = "Invalid crypto Hash";
		$httpstatus = 400;
		$status = -1;
	}
	
	$retArr = [
		"status"=>$status,
		"http"=>$httpstatus,
		"message"=>$message
	];

	echo json_encode($retArr);

?>
