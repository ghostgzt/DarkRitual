<style>
body {
	color: #333;
	font: normal 62.5% "Lucida Sans Unicode",sans-serif;
	margin: 3% 0;
}
</style>
<?php
if (isset($_GET['tid'])){
require 'config.php';
$result  = $sohu->relation(array('tid' => $_GET['tid']));
//echo $result['following'];
//var_dump ($result);
if(($result["target"]['following'])&&($result["target"]['followed_by'])){
echo '互相关注';
}
if((!$result["target"]['following'])&&($result["target"]['followed_by'])){
echo '单向关注'.'<script>
if(!window.parent.psx){
var xda=prompt(\'发现单向关注('. $_GET['tid'].'),是否清除?\n0-否 1-是 2-全部是 3-全部否\',"2");
if (xda==0){
window.parent.psx=0;
}
if (xda==1){
window.parent.del("'. $_GET['tid'].'");
window.parent.psx=0;
}
if (xda==2){
window.parent.del("'. $_GET['tid'].'");
window.parent.psx=2;
}
if (xda==3){
window.parent.psx=3;
}
}
if(window.parent.psx==2){window.parent.del("'. $_GET['tid'].'");}
</script>';
}
if(($result["target"]['following'])&&(!$result["target"]['followed_by'])){
echo '单向粉丝';
}
if((!$result["target"]['following'])&&(!$result["target"]['followed_by'])){
echo '没有关系';
}
}
?>
<script>
var dd=parent.document.getElementById('dd');
var sum=parent.document.getElementById('sum');
dd.innerHTML=parseInt(dd.innerHTML)+1;
if(parseInt(dd.innerHTML)==parseInt(sum.innerHTML)){
parent.document.getElementById('jk').innerHTML='检测完成';
//if(confirm('已经检测全部!\n是否加载下一页?')){window.open(parent.document.getElementById('xy').href,'_top');}
alert('已经检测全部!');
}
</script>