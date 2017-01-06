<?php 
$logf = $match[1];
$passgiven = md5($match[2]);
if(strcmp($passgiven, "1744450ee11503efbb826d411d2f7dc6")==0) {
	$fname = "logs/auth_errors_".$logf.".txt";
	if(file_exists($fname)){
		header("Content-type: text/plain");
		header("Content-Disposition: attachment; filename=log_".$logf.".txt");
		#Take caution here
		echo file_get_contents($fname);
	} else {
		echo "No Log File";
	}
}
else
	echo "Invalid Authentication!";
?>