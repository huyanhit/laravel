<?php 
session_start();

//login facebook 
require_once 'app/Library/Facebook/autoload.php';
use Facebook\Facebook;

$config = array('app_id' => '1442315149208991','app_secret' => '5cc26a2224f06eeecfcca0b000a23b6f','default_graph_version' => 'v2.2');
$fb = new Facebook($config);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://'.$_SERVER['HTTP_HOST'].'/laravel/login-facebook', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
?>