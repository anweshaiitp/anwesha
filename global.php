<?php
function alog($details) {
	date_default_timezone_set('Asia/Calcutta');
	$errc = file_get_contents('./logs/errc.txt');
	$log = $errc . " | " . date('h:i:s a', time()) . " > " . $details . "\n";
	file_put_contents('./logs/auth_errors_'.date("j.n.Y").'.txt', $log, FILE_APPEND);
	file_put_contents('./logs/errc.txt',"".(string)($errc+1));
	return $errc;
}
?>
