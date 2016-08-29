<?php
error_reporting(0);
require_once './oauthinfo.php';
require_once './Tencent.php';

OAuth::init($client_id, $client_secret);
Tencent::$debug = $debug;

//打开session
session_start();
header('Content-Type: text/html; charset=utf-8');

if (!$_SESSION['t_openid'] || !$_SESSION['t_openkey']) {

 header('Location: connect.php' );
   
   
}






$tx = new tx();

?>