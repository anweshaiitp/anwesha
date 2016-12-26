<?php
$MAX = 1024*1024;
//Prevent Attack using logs
if(isset($_POST['payload']) && strlen($_POST['payload'])<$MAX) {
	$payload = json_decode($_POST['payload']);
	echo json_last_error();
	if (json_last_error() == JSON_ERROR_NONE) {
		file_put_contents('logs/github.txt',print_r($payload,TRUE));
		
	}
}
?>
