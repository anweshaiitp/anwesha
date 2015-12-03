<?php 
$h = hash_hmac('sha256','bhoo','l6jawILQ');
echo $h;
echo "\n";
echo json_encode(array("hash"=>$h,"content"=>'bhoo'));
?>