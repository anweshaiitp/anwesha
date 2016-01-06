<?php 
session_start();
if(isset($_SESSION['userID'])){

} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hash']) && isset($_POST['content']) && isset($_POST['userID']) && !empty($_POST['hash']) && !empty($_POST['content']) && !empty($_POST['userID'])){
	$hash = $_POST['hash'];
	$content = $_POST['content'];
	$userID = $_POST['userID'];
	if(preg_match('/^[0-9]{4}$/', $userID)){
	} else {
		session_destroy();
		http_response_code(403);
		die();
	}

	Auth::getUserPrivateKey($userID,$conn);
	$res = Auth::getUserPrivateKey($userID,$conn);
	if(!$res["status"]){
		session_destroy();
		mysqli_close($conn);
		header('Content-type: application/json');
		echo json_encode($res);
		die();
	}
	$privateKey = $res["key"];

	$auth = Auth::authenticateRequest($privateKey,$hash,$content);

	if(!$auth){
		session_destroy();
		http_response_code(403);
		die();
	}
	$_SESSION['userID'] = $userID;
} else{
	session_destroy();
	http_response_code(400);
	die();
}
?>