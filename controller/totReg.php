<?php
require('model/model.php');
require('dbConnection.php');


$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$sql = "SELECT count(*) as num FROM `People` WHERE DATE(`time`) = CURDATE()";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo json_encode($row["num"]);

?>