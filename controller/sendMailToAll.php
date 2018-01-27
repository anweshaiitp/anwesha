<?php 
/**
 * In case of Emergency
 * Sends Verification mail to all those who have not confirmed
 * Need in case,after fixing mass bug on mail system 
 */

require('model/model.php');
require('dbConnection.php');

$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
People::sendVerificationMailToAll($conn);
mysqli_close($conn);
echo "Done!";
?>