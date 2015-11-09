<?php 
require('model/model.php');
require('dbConnection.php');

$filename = 'cache/' .sha1('anwesha/allEvents'). '.html';
$cache_time = 60;
if(file_exists($filename) && filemtime($filename) + $cache_time > time()){
	ob_start('ob_gzhandler');
	header('Content-type: application/json');
	readfile($filename);
	// echo filemtime($filename) + $cache_time - time();
	ob_end_flush();
	exit();
}

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$allEvents = Events::getAllEvents($conn);
mysqli_close($conn);

header('Content-type: application/json');
ob_start('ob_gzhandler');

echo json_encode($allEvents);

$file = fopen($filename,'w');
fwrite($file,ob_get_contents());
fclose($file);
ob_end_flush();
?>