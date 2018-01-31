<?php
	header("Content-type:application/json");
	require('model/model.php');
	require('defines.php');
	require('dbConnection.php');

	$retArr =array();
    $data = [];
	$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
	if(!$conn)
		error_log(mysqli_connect_error());

    $eveId = $match[1];
    //post: userID
    //post: authKey
    $userID = mysqli_real_escape_string($conn,$_POST['userID']);
    require('middleware/authMiddleware.php');

	if(Events::isValidOrg($userID,$eveId,$conn)[1]==200){//auth
        
        $sql = "SELECT p.name,p.pId,p.college,p.mobile,p.feePaid,p.qrurl FROM People p, Registration r WHERE (r.eveId = $eveId AND r.pId = p.pId)";
        $result = mysqli_query($conn,$sql);
        if(!$result){
           $status = -1;
           $httpstatus = 400;
           $message = "SQL error";
        } else {
            $status = 1;
           $httpstatus = 200;
            $message = "done";
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            
        }
		
	}else{
		$message = "User not admin of event.";
		$httpstatus = 403;
		$status = -1;
	}
	
	$retArr = [
		"status"=>$status,
		"http"=>$httpstatus,
		"message"=>$message
    ];
    if(isset($data)){
        $retArr["data"] = $data;
    }

	echo json_encode($retArr);

?>
