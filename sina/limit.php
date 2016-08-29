<style>
body {
	color: #333;
	font: normal 62.5% "Lucida Sans Unicode",sans-serif;
}
</style>
<?php
require 'config.php';
$result  = $sina->rate_limit_status();
echo 'user_limit:'.$result['user_limit'].' remaining_user_hits:'.$result['remaining_user_hits'].' reset_time_in_seconds:'.$result['reset_time_in_seconds'].'<br/>reset_time:'.$result['reset_time'];
if ($result['remaining_user_hits']==0){
echo '<script>alert(\'达到小时请求上限!\n请在'.$result['reset_time'].'后重试\');</script>';
}
?>