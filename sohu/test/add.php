<style>
body {
	color: #333;
	font: normal 62.5% "Lucida Sans Unicode",sans-serif;
	margin: 3% 0;
}
</style>
<?php
if (isset($_GET['id'])){
require 'config.php';
$result  = $sohu->addfriend(array('id' => $_GET['id']));
if($result['following']){echo '关注成功<script>var xd=parent.document.getElementById(\'kd\');var sum=parent.document.getElementById(\'sum\');xd.innerHTML=parseInt(xd.innerHTML)+1;if(parseInt(xd.innerHTML)==parseInt(sum.innerHTML
parent.document.getElementById(\'xk\').innerHTML=\'关注成功\';
if(confirm(\'已经全部关注!\n是否加载下一页?\')){setTimeout(parent.document.getElementById(\'xy\').onclick,1);}
}
</script>';}else{echo '关注失败';}
}
?>