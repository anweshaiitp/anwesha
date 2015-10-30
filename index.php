<?php
/**
* New request lands in this class. Sfter that it is routed accordingly to the respective controller.
* Also provides basic functions for loading models.
* Also provides basic methods for HTTP responses nad redirects.
*/
class Routing
{

	function __construct()
	{
		return null;
	}

	public function Redirect($url)
	{
		return null;
	}

}
// set this to path where the project is located
$url = $_SERVER['REQUEST_URI'];
preg_match('@(.*)index.php(.*)$@', $_SERVER['PHP_SELF'], $mat );
$base = '@^'. $mat[1] ;
if ( preg_match($base .'events/?$@', $url, $match ) ) {
	require ('controller/events.php');
} elseif (preg_match($base . 'events/([A-Za-z]+)/?$@', $url, $match)) {
	require ('controller/getSubEvents.php');
} elseif (preg_match($base . 'events/([A-Za-z]+)/([A-Za-z0-9])/?$@', $url, $match)) {
	require ('controller/eventDetail.php');
} elseif (preg_match($base . '$@', $url)) {
	require ('view/index.html');
} else {
	die('invalid url ' . $url);
}


?>
