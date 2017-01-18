<?php 
$passgiven = md5($match[1]);
if(strcmp($passgiven, "96101236fc3f453ec3688eb48152df85")==0) {
	header("Content-type: text/plain");
	header("Content-Disposition: attachment; filename=events.csv");
	echo shell_exec("sh Scripts/export_events.sh");
}
else
	echo "Invalid Authentication!";
?>