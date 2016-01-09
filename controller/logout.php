<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

require('middleware/authMiddleware.php');

echo json_encode(array("status" => true, "msg" => "Successfully Log Out"));

session_destroy();

?>

