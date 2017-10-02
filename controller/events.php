<?php 
require('model/model.php');
require('dbConnection.php');

$filename = 'cache/' .sha1('anwesha/events'). '.html';
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
$events = Events::getMainEvents($conn);
mysqli_close($conn);

header('Content-type: application/json');
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache"); // HTTP/1.0
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
ob_start('ob_gzhandler');

echo json_encode($events);

$file = fopen($filename,'w');
fwrite($file,ob_get_contents());
fclose($file);
ob_end_flush();
?>
