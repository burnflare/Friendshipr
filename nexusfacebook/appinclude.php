<?php
require_once '../nexusfacebook/facebook-platform/php/facebook.php';

$appapikey = '383f3b3f55edcc83423b2732c0014b1f';
$appsecret = '604c60ea5cbd9b32122d5cba19be1921';
$appcallbackurl =  	'http://www.friendshipr.com/nexusfacebook/';

$facebook = new Facebook($appapikey,$appsecret);
$user = $facebook->require_login();


?>