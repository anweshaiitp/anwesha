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
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['userID']) && isset($_POST['authKey']) && isset($_POST['userID']) && !empty($_POST['userID']) && !empty($_POST['authKey'])) {
    $userID = mysqli_real_escape_string($conn, $_POST['userID']);
	if(preg_match('/^[0-9]{4}$/', $userID)){
	} else {
		session_destroy();
		http_response_code(403);
		die();
	}

    $privKey =  Auth::getUserPrivateKey($userID,$conn);
    if($privKey["key"] != $_POST["authKey"]){
        $retArr = [
            "status"=>-1,
            "http"=>403,
			"message"=>"Invalid authKey",
            "msg"=>"Invalid authKey"
			
        ];

    echo json_encode($retArr);
    exit();
    }
    
	
	$_SESSION['userID'] = $userID;
}else{
	$retArr = [
            "status"=>-1,
            "http"=>403,
            "message"=>"Please Log-In",
            "msg"=>"Please Log-In"
        ];

    echo json_encode($retArr);
    exit();
}
?>