<?php
session_start();
require_once('oauth/SohuOAuth.php');
require_once('oauthinfo.php');


/* 如果access token不存在，则重定向到connect.php去申请access token*/
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
	header('Location: ./clearsessions.php');
}
/*从 session 中获取access token*/
$access_token = $_SESSION['access_token'];

/* 使用token创建SohuOauth对象*/
$sohu = new SohuOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);

?>