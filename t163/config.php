<?php


session_start();
include_once('oauthinfo.php');
include_once('api/tblog.class.php');
if (empty($_SESSION['access_token']) || empty($_SESSION['access_token']['oauth_token']) || empty($_SESSION['access_token']['oauth_token_secret'])) {
	header('Location: ./connect.php');
}
$tblog = new TBlog(CONSUMER_KEY, CONSUMER_SECRET,$_SESSION['access_token']['oauth_token'],$_SESSION['access_token']['oauth_token_secret']);
$me = $tblog->verify_credentials();

?>