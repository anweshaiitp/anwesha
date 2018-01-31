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
	
	
	//auth
	//  post: orgID
    // post: authKey
    // if(!isset($_POST["authKey"]) || !isset($_POST["orgID"])){
    //      $retArr = [
    //         "status"=>-1,
    //         "http"=>403,
    //         "message"=>"orgID or authKey not supplied"
    //     ];

    // echo json_encode($retArr);
    // exit();
    // }
	//authend
	$uID = $_POST['userID'];//tempstore
	$orgID = $_POST['orgID'];
	$_POST['userID'] = $orgID;
	require('middleware/authMiddleware.php');
	$pastpay = [];
	$sql = " SELECT * FROM payments WHERE pId = $pId ";
	$result = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($result)){
		$pastpay[] = $row;
	}    

    // $userID = mysqli_real_escape_string($conn, $_POST['orgID']);
    // $privKey =  Auth::getUserPrivateKey($userID,$conn);
    // if($privKey["key"] != $_POST["authKey"]){
    //     $retArr = [
    //         "status"=>-1,
    //         "http"=>403,
    //         "message"=>"Invalid authKey"
    //     ];

    // echo json_encode($retArr);
    // exit();
    // }

	if($match[1] == $pId.sha1($pId.$AESKey)){
		if(isset($orgID) && isset($_POST['eveID'])){
			// if($organiser = Events::isValidOrg($_POST['orgID'],$_POST['eveID'],$conn)){
				$call = Events::regUser($orgID,$_POST['eveID'],$pId,$conn);
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
			$message["payments"] = $pastpay;
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
