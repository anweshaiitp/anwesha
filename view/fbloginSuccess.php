

<?php
// Initialize variables
$app_id = '<facebook_app_id>';
$secret = '<account_kit_app_secret>';
$version = '<account_kit_api_version>'; // 'v1.1' for example

// Method to send Get request to url
function doCurl($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = json_decode(curl_exec($ch), true);
  curl_close($ch);
  return $data;
}

// Exchange authorization code for access token
$token_exchange_url = 'https://graph.accountkit.com/'.$version.'/access_token?'.
  'grant_type=authorization_code'.
  '&code='.$_POST['code'].
  "&access_token=AA|$app_id|$secret";
$data = doCurl($token_exchange_url);
$user_id = $data['id'];
$user_access_token = $data['access_token'];
$refresh_interval = $data['token_refresh_interval_sec'];

// Get Account Kit information
$me_endpoint_url = 'https://graph.accountkit.com/'.$version.'/me?'.
  'access_token='.$user_access_token;
$data = doCurl($me_endpoint_url);
$phone = isset($data['phone']) ? $data['phone']['number'] : '';
$email = isset($data['email']) ? $data['email']['address'] : '';
?>



<head>
  <title>Account Kit PHP App</title>
</head>
<body>
  <div>User ID: <?php echo $user_id; ?></div>
  <div>Phone Number: <?php echo $phone; ?></div>
  <div>Email: <?php echo $email; ?></div>
  <div>Access Token: <?php echo $user_access_token; ?></div>
  <div>Refresh Interval: <?php echo $refresh_interval; ?></div>
</body>

    