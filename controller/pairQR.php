<?php
	header("Content-type:application/json");
	require('model/model.php');
	require('defines.php');
	require('dbConnection.php');

	$retArr =array();

	$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
	if(!$conn)
		error_log(mysqli_connect_error());

	$pId = $match[1];
	$hash = $match[2];
  $hashPre = substr($match[2],0,4);
  $hashPost = substr($match[2],4);
	
	
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


	if(isset($match[2]) && $hashPost == sha1($hashPre.$AESKey)){
		$call = User::pairQR($pId,$hashPre,$conn);
		$status = $call[0];
		$httpstatus = $call[1];
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
