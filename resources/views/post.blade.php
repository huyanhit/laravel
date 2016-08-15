<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Post face</title>
  </head>
  <body>
      <?php 
      try {
        $ret = $fb->api('/me/feed', 'POST', $params);
        echo 'Successfully posted to Facebook';
      } catch(Exception $e) {
        echo $e->getMessage();
      }
    ?>
  </body>
</html>