<?php 
require('model/model.php');
require('dbConnection.php');

$filename = 'cache/' .sha1('anwesha/events/' . $match[1]) . '.html';
$cache_time = 60;
if(file_exists($filename) && filemtime($filename) + $cache_time > time()){
	ob_start('ob_gzhandler');
	header('Content-type: application/json');
	readfile($filename);
	ob_end_flush();
	exit();
}

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$subEvents = Events::getSubEvent($match[1],$conn);
mysqli_close($conn);

header('Content-type: application/json');
ob_start('ob_gzhandler');

$res = json_encode($subEvents, JSON_UNESCAPED_SLASHES);
// $res = preg_replace("/\\\\\"/",'"',$res);
$res = preg_replace("/\\\\r/","",$res);
$res = preg_replace("/\\\\n/","",$res);
$res = preg_replace("/\\\\t/","",$res);
echo $res;

$file = fopen($filename,'w');
fwrite($file,ob_get_contents());
fclose($file);
ob_end_flush();
?>
