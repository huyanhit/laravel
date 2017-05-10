<?php 
session_start();

//login facebook 
require_once 'app/Library/Facebook/autoload.php';
use Facebook\Facebook;

$config = array('app_id' => '780665195420181','app_secret' => '80d7bb98871f8df63cf2acb4653f3a1e','default_graph_version' => 'v2.2');
$fb = new Facebook($config);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('http://'.$_SERVER['HTTP_HOST'].'/login-facebook', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
?>