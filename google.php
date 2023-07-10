<?php
require $_SERVER['DOCUMENT_ROOT'] . '/inc/load.php';

$clientID = $config['google_client_id'];
$clientSecret = $config['google_client_secret'];
$redirectUri = $config['google_redirect_url'];

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");

// authenticate code from Google OAuth Flow 
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    
    // get profile info 
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;
    var_dump($google_account_info);
    // now you can use this profile info to create account in your website and make user logged in. 
  } else {
    echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
  }
?>