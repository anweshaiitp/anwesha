<?php 
$passgiven = md5($match[1]);
if(strcmp($passgiven, "7bbf03bf27ed872a1fe74d0e9f1e6e41")==0) {
	header("Content-type: text/plain");
	header("Content-Disposition: attachment; filename=records.csv");
	echo shell_exec("sh export_data.sh");
}
else
	echo "Invalid Authentication!";
?>