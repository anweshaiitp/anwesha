
<?php
echo "email test";
 // ini_set( "display_errors", 1); 
 error_reporting(E_ALL); // Error engine
ini_set('display_errors', TRUE); // Error display

ini_set('log_errors', TRUE); // Error logging

ini_set('error_log', 'errors.log'); // Logging file
require('model/model.php');
require('dbConnection.php');
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
$result = People::sendVerificationMailToAll($conn);
echo $result;
mysqli_close($conn);
// $sender_email = "devteam@anwesha.info";
//      $sender_name = "Celesta IIT Patna";
//      $headers = "From: $sender_name <$sender_email>"."\r\n".'X-Mailer: PHP/' . phpversion()."\r\n";
//      $headers .= 'Content-type: text/html;charset=ISO-8859-1'."\r\n";
//      $headers .= 'MIME-Version: 1.0'."\r\n\r\n";
//      echo mail("tameeshbiswas1998@gmail.com","Subj","HIi",$headers);
        // if($isSuccess)
        //  echo 1;
//email & emailwithtext & passEmail
    //sendEventRegistrationEmail?
    // function HTTPPost($url, array $params) {
    //     $query = http_build_query($params);
    //     $ch    = curl_init();
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HEADER, false);
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_POST, true);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
    //     $response = curl_exec($ch);
    //     curl_close($ch);
    //     return $response;
    // }
    // echo HTTPPost("https://anwesha2018.herokuapp.com/",["emailTo"=>"tameeshbiswas1998@gmail.com","emailSub"=>"Test2","body"=>"ABCD"]);
    
            ?>