<?php
require_once '../facebook/facebook-platform/php/facebook.php';

// *** Add your Facebook API Key, Secret Key, and Callback URL here ***
$APP_API_KEY = 'a2c0936769d67dfafd873745239ce59d';
$appapikey = 'a2c0936769d67dfafd873745239ce59d';
$appsecret = '5fa43b9450b9835c3517a65a5f871634';
$appcallbackurl = 'http://friendshipr.com/facebook/';  


$con = mysql_connect("localhost","friendsh_IR","jpT725md3i");

// Connect to Facebook, retrieve user 
$facebook = new Facebook($appapikey, $appsecret);
// $user = $facebook->require_login(); OLD 
$user = $facebook->get_loggedin_user(); 
$is_logged_out = !$user; 

// Exception handler for invalid session_keys 
try {
  // If app is not added, then attempt to add 
  if (!$facebook->api_client->users_isAppAdded()) {
    $facebook->redirect($facebook->get_add_url());
  }
} catch (Exception $ex) {
  // Clear out cookies for app and redirect user to a login prompt
	$facebook->set_user(null, null);
	$facebook->redirect($appcallbackurl);
}
?>