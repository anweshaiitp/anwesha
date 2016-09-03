<?php
ini_set( "display_errors", 0); 
/**
* New request lands in this class. After that it is routed accordingly to the respective controller.
* Also provides basic functions for loading models.
* Also provides basic methods for HTTP responses and redirects.
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

$url = $_SERVER['REQUEST_URI'];
preg_match('@(.*)index.php(.*)$@', $_SERVER['PHP_SELF'], $mat );
$base = '@^'. $mat[1] ;

if (preg_match($base . '$@', $url)) {
	require ('view/index.html');
} elseif (preg_match($base . 'landing$@', $url)) {
	require ('view/main.html');
} elseif (preg_match($base . 'register/([0-9]{4}|)$@', $url, $match)) {
	require ('view/userRegistration.php');
} elseif (preg_match($base . 'ca/([0-9]{4}|)$@', $url, $match)) {
	require ('view/ca.php');
} elseif ( preg_match($base .'cssLoader/home/?$@', $url, $match ) ) {
	require ('controller/cssLoader.php');
} elseif ( preg_match($base .'events/?$@', $url, $match ) ) {
	require ('controller/events.php');
} elseif (preg_match($base . 'allEvents/?$@', $url)) {
	require ('controller/allEvents.php');
} elseif (preg_match($base . 'events/([A-Za-z&-]+)/?$@', $url, $match)) {
	require ('controller/getSubEvents.php');
} elseif (preg_match($base . 'user/register/User/?$@', $url)) {
	require ('controller/userRegistration.php');
} elseif (preg_match($base . 'user/register/CampusAmbassador/?$@', $url)) {
	require ('controller/campusAmbassadorRegistration.php');
} elseif (preg_match($base . 'verifyEmail/CampusAmbassador/([0-9]{4})/([A-Za-z0-9]{40})/?$@', $url, $match)) {
	require ('controller/verifyEmail.php');
} elseif (preg_match($base . 'verifyEmail/User/([0-9]{4})/([A-Za-z0-9]{40})/?$@', $url, $match)) {
	require ('controller/verifyEmail.php');
} elseif (preg_match($base . 'register/([0-9]{1,2})/?$@', $url, $match)) {
	require ('controller/registerUser.php');
} elseif (preg_match($base . 'register/group/([0-9]{1,2})/?$@', $url, $match)) {
	require ('controller/registerGroup.php');
} elseif (preg_match($base . 'login/?$@', $url)) {
	require ('controller/loginUser.php');
} elseif (preg_match($base . 'changePassword/?$@', $url)) {
	require ('controller/changePassword.php');
} elseif (preg_match($base . 'resendEmail/([0-9]{4})/?$@', $url, $match)) {
	require ('controller/resendVerification.php');
} else {
	http_response_code(404);
	die('invalid url ' . $url);
}


?>
