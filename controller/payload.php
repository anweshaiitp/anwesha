<?php
/*
// Init Conf
$conf=array();
$conf['maxPayloadLength']=6291456;
$conf['allowedBranch']=array("master","beta");
file_put_contents('Payload/payload.conf',json_encode($conf,JSON_PRETTY_PRINT));
echo "Saved";
*/

$conf = json_decode(file_get_contents('Payload/payload.conf'),true);
$branchname = exec('git rev-parse --abbrev-ref HEAD');
$allowedBranch = $conf["allowedBranch"];
//print_r($conf);

if(!in_array($branchname, $allowedBranch) ) {
	echo "$branchname Branch is not Allowed";
	exit();
}
$MAX = $conf['maxPayloadLength'];
$header = getallheaders();
//Prevent Attack using logs
if(isset($_POST['payload']) &&  $header['Content-Length']<$MAX) {
	echo "Attemping Payload\n";
	$data = json_decode($_POST['payload']);
	if (json_last_error() == JSON_ERROR_NONE) {
		file_put_contents('logs/github.txt',print_r($data,TRUE));
		echo "Attempt Executing Script\n";
		echo shell_exec('./Payload/script.sh')."\n\n";			
		echo "Payload Exit";	
	} else "JSON Error : ".json_last_error();
}
else 
	echo "Invalid Payload";
?>
