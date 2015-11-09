<?php 
require('model/model.php');
require('dbConnection.php');

$filename = 'cache/' .sha1('anwesha/events/' . $match[1]) . '.html';
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
$subEvents = Events::getSubEvent($match[1],$conn);
mysqli_close($conn);

header('Content-type: application/json');
ob_start('ob_gzhandler');

echo json_encode($subEvents);
$file = fopen($filename,'w');
fwrite($file,ob_get_contents());
fclose($file);
ob_end_flush();
?>
