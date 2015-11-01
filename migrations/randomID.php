<?php 
$begin = 1000;
$end = 9999;
$diff = $end-$begin;
$arr = array();
for ($i=0; $i < $diff; $i++) { 
	$arr[] = $i + $begin;
}
$baseSQL = "Insert into Pids Values ";
echo $baseSQL;
for ($i=0; $i < $diff-1; $i++) { 
	$rand = rand($i,$diff -1);
	$tmp = $arr[$i];
	$arr[$i] = $arr[$rand];
	$arr[$rand] = $tmp;
	echo "($arr[$i]), ";
}

?>