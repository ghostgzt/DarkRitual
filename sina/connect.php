<?php

require_once('oauthinfo.php');


/* 开始申请access token */
$content = '<a href="./redirect.php" target="_top">授权使用</a>&nbsp;&nbsp;<a href="clearsessions.php" target="_top" >清除记录</a>&nbsp;&nbsp;<a href="../" target="_top" >重选平台</a>';
 
/* Include HTML to display on the page. */
include('html.inc');
?>