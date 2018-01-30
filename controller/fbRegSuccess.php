

<?php
session_start();
// ini_set('display_errors', '1'); 
require('model/model.php');
require('dbConnection.php');
require('defines.php');
$conn = mysqli_connect(SERVER_ADDRESS,USER_NAME,PASSWORD,DATABASE);
// Initialize variables
 // 'v1.1' for example

// Method to send Get request to url
function doCurl($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = json_decode(curl_exec($ch), true);
  curl_close($ch);
  return $data;
}
$csrfval =0;
$status =400;
$err = 0;
$msg = "";
$login = 0;
if(hash("sha256",session_id().$AESKey)==$_POST['csrf']){
    $csrfval = 1;
}
// Exchange authorization code for access token
$token_exchange_url = 'https://graph.accountkit.com/'.$version.'/access_token?'.
  'grant_type=authorization_code'.
  '&code='.$_POST['code'].
  "&access_token=AA|$fbAppID|$fbAppSecretAccountKit";
$data = doCurl($token_exchange_url);
// var_dump($data);
if(isset($data["error"])){
    $err = 1;
    
    $status =400;
    $msg = "Error in verifying account. Reference #".alog(json_encode($data["error"]));
}
$user_id = $data['id'];
$user_access_token = $data['access_token'];
$refresh_interval = $data['token_refresh_interval_sec'];
if(isset($data['access_token'])){
    $status =200;
}
// Get Account Kit information
$me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.
    'access_token='.$user_access_token;
$data = doCurl($me_endpoint_url);
$phone = isset($data['phone']) ? $data['phone']['number'] : '';
$email = isset($data['email']) ? $data['email']['address'] : '';
file_put_contents('./logs/mob.txt',"".((isset($data['phone']))?$data['phone']:"NOT")."\n");
if(isset($data["error"])){
    $err = 1;
    $status =400;
    $msg = "Error in verifying account. Reference #".alog("fbcurl err".json_encode($data["error"]));
}
//verify with anwesha ID
if(isset($_SESSION['fbSMSanwID']) && isset($_SESSION['fbSMSsessID']) && isset($_SESSION['fbSMSmob']) && isset($phone) && isset($user_access_token) && $csrfval==1 && $err==0 ){
    if($_SESSION['fbSMSsessID']==session_id()){
        // if(substr($phone,-10) == $_SESSION['fbSMSmob']){ //only for signed in :(
            $phVer = People::verifyMobile($_SESSION['fbSMSanwID'],$_SESSION['fbSMSmob'],$user_access_token,$conn);
            if($phVer[0]==1){
                $err = 0;
                $status =200;
                $msg = "Successfully Verified Account.";
                if(isset($_SESSION['userID'])){
                    $login = 1;
                    $msg = "Successfully Verified Account and Logged In.";
                }
            }else{
                $err = 1;
                $status =403;
                $msg = $phVer[1];
            }
        // }else{
        //     $err = 1;
        //     $status =403;
        //     $msg = "Error in verifying account. Mobile Numbers don\'t match. Reference #".alog("mobno no match ".json_encode([$_SESSION['fbSMSsessID'],session_id()]));
        // }
    }else{
        $err = 1;
        $status =403;
        $msg = "Error in verifying account. Reference #".alog("sessionID no match ".json_encode([$_SESSION['fbSMSsessID'],session_id()]));
    }
}else{
        $err = 1;
        $status =400;
        $msg = "Error in verifying account. Reference #".alog("Incomplete session vars ".json_encode($_SESSION));
    }
if($csrfval!=1){
    $err = 1;
    $status =400;
    $msg = "Error in verifying account. Reference #".alog("Invalid CSRF".json_encode($_POST['csrf']));
}
header('Content-Type: application/json');
echo json_encode([
    "status"=>$status,
    "message"=>$msg,
    "login"=>$login,
    "fbUid"=>$user_id,
    "phone"=>$phone,
    "email"=>$email,
    "csrf"=>$_POST['csrf'],
    "accesstoken"=>$user_access_token,
    ]);

?>


    