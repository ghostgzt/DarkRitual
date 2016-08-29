<style>
body {
	color: #333;
	font: normal 62.5% "Lucida Sans Unicode",sans-serif;
}
</style>
<?php
require 'config.php';
$result  = $tblog->limit();
echo 'hourly_limit:'.$result['hourly_limit'].' remaining_hits:'.$result['remaining_hits'].' reset_time_in_seconds:'.$result['reset_time_in_seconds'].'<br/>reset_time:'.$result['reset_time'];
if ($result['remaining_hits']==0){
echo '<script>alert(\'达到小时请求上限!\n请在'.$result['reset_time'].'后重试\');</script>';
}
?>