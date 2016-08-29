<style>
body {
	color: #333;
	font: normal 62.5% "Lucida Sans Unicode",sans-serif;
}
</style>
<?php
require 'config.php';
$result  = $tx->limit();
echo 'hourly_limit:无限制 remaining_hits:无限制 reset_time_in_seconds:无限制<br/>reset_time:无限制';
/*if ($result['remaining_hits']==0){
echo '<script>alert(\'达到小时请求上限!\n请在'.$result['reset_time'].'后重试\');</script>';
}*/
?>