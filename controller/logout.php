<?php 
require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);

require('middleware/authMiddleware.php');



session_destroy();

echo json_encode(array("status" => true, "msg" => "Successfully Logged Out"));

?>

