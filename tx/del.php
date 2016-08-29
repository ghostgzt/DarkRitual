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
$result  = $tx->deletefriend(array('id' => $_GET['id']));
if($result['msg']=='ok'){echo '清除成功<script>var xd=parent.document.getElementById(\'xd\');xd.innerHTML=parseInt(xd.innerHTML)+1;</script>';}else{echo '清除失败';}
}
?>
<script>
var sum=parent.document.getElementById('sum');
if(parseInt(parent.cnum)+1==parseInt(sum.innerHTML)){
parent.document.getElementById('xk').innerHTML='清除完成';
if(confirm('已经全部清除!\n是否重新加载?')){parent.xload(parent.xurl);}
}else{parent.cnum=parseInt(parent.cnum)+1;}
</script>