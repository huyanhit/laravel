<?php 
require_once 'app/Library/Google/Google_Client.php';
require_once 'app/Library/Google/contrib/Google_Oauth2Service.php';

$clientId = '403419571002-8k79k4a49ucfgj4a3nqhou9rrf86v21a.apps.googleusercontent.com'; 
$clientSecret = 'ylyMrxbu9tsOz9iMdMLLqcy3';
$redirectURL = 'http://'.$_SERVER['HTTP_HOST'].'/login-google'; 

$gClient = new Google_Client();
$gClient->setApplicationName('Web client 1');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);

if(isset($_GET['code'])){
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
  $gClient->setAccessToken($_SESSION['token']);
}

if ($gClient->getAccessToken()) {
  //Get user profile data from google
  $gpUserProfile = $google_oauthV2->userinfo->get();
  
  $_SESSION['userData'] = $gpUserProfile;
  
  $output = '';
  if(!empty($_SESSION['userData'])){
      echo('<pre>');
      print_r($_SESSION['userData']);
  }
} 

$authUrl = $gClient->createAuthUrl();
echo '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><i class="fa fa-google-plus" aria-hidden="true"></i></a>';