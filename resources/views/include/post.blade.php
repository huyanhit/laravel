<?php
// require Facebook PHP SDK
// see: https://developers.facebook.com/docs/php/gettingstarted/

require 'app/Library/facebook.php';
$config = array();
$config['appId'] = '210797859323246';
$config['secret'] = '4b553d7e0c497c6a84ade3e2eb0b939b';
$config['fileUpload'] = false; 
$fb = new Facebook($config);
?>
<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
      <title>php-sdk</title>
      <style>
        body {
          font-family: 'Lucida Grande', Verdana, Arial, sans-serif;
        }
        h1 a {
          text-decoration: none;
          color: #3b5998;
        }
        h1 a:hover {
          text-decoration: underline;
        }
      </style>
    </head>
    <body><?php 
		try {
		  $ret = $fb->api('/me/feed', 'POST', $params);
		  echo 'Successfully posted to Facebook';
		} catch(Exception $e) {
		  echo $e->getMessage();
		}
    ?>
  </body>
</html>
