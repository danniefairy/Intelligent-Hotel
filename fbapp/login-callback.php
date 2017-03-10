<!DOCTYPE html>
<html>
<head>
  <title></title>
    
<meta charset="UTF-8">
</head>
<body>
<?php
header("Content-Type:text/html; charset=utf-8");

session_start();
require_once __DIR__ . '/src/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '1408239005916471',
  'app_secret' => 'cbe71da0c83039a18e2e67582ae41670',
  'default_graph_version' => 'v2.8'
]);

$helper = $fb->getJavaScriptHelper();

try {
  $accessToken = $helper->getAccessToken();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
} catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
}

if (isset($accessToken)) {
   $fb->setDefaultAccessToken($accessToken);

  try {
  
    $requestProfile = $fb->get("/me?fields=name,id,gender,email,friends");
    $profile = $requestProfile->getGraphNode()->asArray();
  } catch(Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
  } catch(Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
  }
  //friends endpoints 跟 permission request 用的不一樣
  /*
    $profile['friends'][0]['id']
    $profile['friends'][0]['name']
  */

  $_SESSION['fb_id']=$profile['id'];
  $_SESSION['name']=$profile['name'];
  $_SESSION['friends']=$profile['friends'];
  $name=$profile['name'];
  header('location: ../transfer.php?name='.$name."&fb_id=".$profile['id']."&gender=".$profile['gender']."&email=".$profile['email']);
  exit;
} else {
    echo "Unauthorized access!!!";
    exit;
}

</body>
</html>
