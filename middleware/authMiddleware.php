<?php 
session_start();

$userID = $match[1];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hash']) && isset($_POST['content']) && !empty($_POST['hash']) && !empty($_POST['content'])){
	$hash = $_POST['hash'];
	$content = $_POST['content'];
	Auth::getUserPrivateKey($userID,$conn);
	$res = Auth::getUserPrivateKey($userID,$conn);
	if(!$res["status"]){
		mysqli_close($conn);
		header('Content-type: application/json');
		echo json_encode($res);
		die();
	}
	$privateKey = $res["key"];

	$auth = Auth::authenticateRequest($privateKey,$hash,$content);

	if(!$auth){
		http_response_code(403);
		die();
	}
} else{
	http_response_code(400);
	die();
}
?>