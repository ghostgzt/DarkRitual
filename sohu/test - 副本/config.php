<?php
define('SYSTEM_ROOT', dirname(__FILE__));
//----- 配置开始 -----//
$appKey = '6Vf7MIwy6dtClViDsErE'; // 应用Key
$appSecret = 'FP79xn2xgx4gQz*^9iedo$as5=Pw5duZ0^6%qdUI'; // 应用Secret
$userKey = 'f7fc462e3ef03fa92cd8089f17744009'; // 用户授权Key
$userSecret = 'c136508d889c06ad1700d9e74e4ce1f8'; // 用户授权Secret
//----- 配置结束 -----//
require 'class/class_weibo_api_sohu.php';

$sohu = weibo_api_sohu::instance();
$sohu->init($appKey, $appSecret, $userKey, $userSecret);
?>