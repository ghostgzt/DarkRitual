<style>
body {
	color: #333;
	font: normal 62.5% "Lucida Sans Unicode",sans-serif;
	margin: 3% 0;
}
</style>
<?php
	function base64decode($str) {
		return base64_decode(strtr($str.str_repeat('=', (4 - strlen($str) % 4)), '-_', '+/'));
	}
if (isset($_GET['nr'])){
require 'config.php';
$result  = $sina->update(base64decode($_GET['nr']));
if($result['id']){echo '发送成功';}else{echo '发送失败';}
}
?>