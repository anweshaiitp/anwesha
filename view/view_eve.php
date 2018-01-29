<?php
require('model/model.php');
require('dbConnection.php');
function norm($str){
    $str = strtolower(str_replace(array('  ', ' '), '-', preg_replace('/[^-a-zA-Z0-9 s]/', '', trim($str))));
    return $str;
}

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$eveName = norm($match[1]);
$eveName = mysqli_real_escape_string($conn,$eveName );

$sql = "SELECT * FROM `Events` WHERE (( LOWER(urlname) = '".$eveName."' OR (LOWER(eveName) LIKE '%".$eveName."%' OR LOWER(replace(eveName, ' ','-')) LIKE '%$eveName%' OR LOWER(replace(eveName, '  ','-')) LIKE '%$eveName%' OR LOWER(replace(eveName, '   ','-')) LIKE '%$eveName%' OR LOWER(replace(eveName, '!','')) LIKE '%$eveName%' OR LOWER(replace(eveName, '-','-')) LIKE '%$eveName%' OR LOWER(replace(eveName, '.','')) LIKE '%$eveName%')) AND eveId >=10) LIMIT 1";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    echo mysqli_error($conn);
    var_dump($row);
    echo $sql;
if(!$result ||  $row== null){
    echo "wrng ";
    header('Location: ../events/');
    // echo "events/";
}else
header('Location: ../event/'.$row['code'].'/'.$row['eveId']);
// echo $row['code'].'/'.$row['eveId'];
