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
$result  = $sohu->deletefriend(array('id' => $_GET['id']));
if(!$result['following']){echo '清除成功<script>var xd=parent.document.getElementById(\'xd\');var sum=parent.document.getElementById(\'sum\');xd.innerHTML=parseInt(xd.innerHTML)+1;if(parseInt(xd.innerHTML)==parseInt(sum.innerHTML)){
parent.document.getElementById(\'xk\').innerHTML=\'清除成功\';
if(confirm(\'已经全部清除!\n是否重新加载?\')){parent.xload(xurl);}
}</script>';}else{echo '清除失败';}
}
?>
