<?php
// require $_SERVER['DOCUMENT_ROOT'] . '/inc/load.php';
require 'includes/header.php';

// check login before start
if (checkLogin()) {
    // loged in, redirect to home page!
    Redirect('/', false);
} else {
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
        // var_dump($google_account_info);
        
        if (!checkUserExistByEmail($email)) {
            Redirect('/auth_error');
        } else {
            $hash = getInfoUserByEmail($email)['hash'];
           //  echo 'Email hợp lệ, hash: ' . $hash;
            Redirect('/login' . '/' . $hash); // redirect to old login method (use hash)
        }

    } else {
        $login_url = $client->createAuthUrl();
        Redirect($login_url);
    }
}


?>