<?php 
$passgiven = md5($match[1]);
if(strcmp($passgiven, "7128af58fc958f0cc27e8f98b5599bf1")==0) {
	header("Content-type: text/plain");
	header("Content-Disposition: attachment; filename=records.csv");
	echo shell_exec("sh Scripts/export_data.sh");
}
else
	echo "Invalid Authentication!";
?>