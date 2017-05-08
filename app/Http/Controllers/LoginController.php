<?php

namespace App\Http\Controllers;
require_once 'app/Library/Facebook/autoload.php';
require_once 'app/Library/Google/Google_Client.php';
require_once 'app/Library/Google/contrib/Google_Oauth2Service.php';
use Session;
use App\Http\Requests;
use Illuminate\Http\Request;
use Facebook\Facebook;
use Google_Client; 
use Google_Oauth2Service;


class LoginController extends Controller
{
  public function loginFacebook(){ 
    session_start();
    $config = array('app_id' => '780665195420181','app_secret' => '80d7bb98871f8df63cf2acb4653f3a1e','default_graph_version' => 'v2.2');
    $fb = new Facebook($config);
    $helper = $fb->getRedirectLoginHelper();

    try {
      $accessToken = $helper->getAccessToken();
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
      echo 'Graph returned an error: ' . $e->getMessage();
      exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
      echo 'Facebook SDK returned an error: ' . $e->getMessage();
      exit;
    }

    if (! isset($accessToken)) {
      if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
      } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
      }
      exit;
    }

    $oAuth2Client = $fb->getOAuth2Client();

    $tokenMetadata = $oAuth2Client->debugToken($accessToken);

    $tokenMetadata->validateAppId($config['app_id']); 
    $tokenMetadata->validateExpiration();

    if (! $accessToken->isLongLived()) {
      try {
        $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
      } catch (Facebook\Exceptions\FacebookSDKException $e) {
        echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
        exit;
      }
    }

    //Session::put('fb_access_token', (string) $accessToken);  
    //$fb->setDefaultAccessToken(Session::get('fb_access_token'));

    $_SESSION['fb_access_token'] = (string) $accessToken;
    $fb->setDefaultAccessToken($_SESSION['fb_access_token']);

    $response = $fb->get('/me?locale=en_US&fields=id,last_name,first_name,email,birthday');
    $userData = $response->getDecodedBody();
    echo('<pre>');
    print_r($userData);
      
  }
  public function loginGoogle(){ 
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
  }
}
