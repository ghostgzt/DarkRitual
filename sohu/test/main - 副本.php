﻿
<h2>搜狐微博关系管理工具</h2>
<?php
/**
 * 搜狐API DEMO
 *
 * $Id$
 */
//define('SYSTEM_ROOT', dirname(__FILE__));
require 'config.php';
$lc=-1;
if(!isset($_GET['page'])){$p='1';}else{$p=$_GET['page'];}
if(!isset($_GET['count'])){$n='20';}else{$n=$_GET['count'];}
function randomcolor(){
$ac=mt_rand(1,4);
while($ac==$lc){
$ac=mt_rand(1,4);
}
$lc=$ac;

if($lc==1){return 'notice';}
if($lc==2){return 'error';}
if($lc==3){return 'none';}
if($lc==4){return 'success';}
}
//----- 获取用户的信息开始 -----//
//$result = $sohu->getUserInfo();
//print_r($result);
//----- 获取用户的信息结束 -----//

//----- 发布一条微博开始 -----//
//$result = $sohu->add(array('content' => '搜狐微博'));
//print_r($result);
//----- 发布一条微博结束 -----//

//----- 发布一条图片微博开始 -----//
//$picpath = 'http://www.bolvv.com/uploadfile/2011/09/02/565bbfe4d051cf1a6975b4f692391253120.jpg'; // 图片路径
//$result  = $sohu->addPic(array('content' => '成功了哇', 'pic' => $picpath));
//----- 发布一条图片微博结束 -----//
$id=$_GET['id'];
if(isset($_GET['mode'])){$m=$_GET['mode'];}else{$m='0';}
if ($m=='0'){
$result  = $sohu->friends(array('count' => $n, 'page' => $p));
}else{if ($m=='1'){
$result  = $sohu->xfriends(array('id'=>$id ,'count' => $n, 'page' => $p));

}else{
if ($m=='2'){
$result  = $sohu->xfollowers(array('id'=>$id ,'count' => $n, 'page' => $p));

}
}}

?>
<script>var psx=0;</script>
<div name="anchor">
<iframe id="tt" src='limit.php' width="100%" height="45px" frameborder="0" scrolling="no"></iframe><a href="javascript:;" onclick="tt()">刷新限制</a>&nbsp;<a href="javascript:;" onclick="window.location.reload();">刷新列表</a><?php if($m!='0'){echo '&nbsp;<a href="javascript:;" onclick="window.open(\'index.php\',\'_top\');">返回主页</a>';}?>
</div>
<?php if($m=='1'){
echo '<a title="'.$id.'" href="http://t.sohu.com/u/'.$id.'" target="_blank">'.$id.'</a> 的关注列表 ';
}if($m=='2'){
echo '<a title="'.$id.'" href="http://t.sohu.com/u/'.$id.'" target="_blank">'.$id.'</a> 的粉丝列表 ';
} ?>
共加载<span id="sum"><?php echo count($result);?></span>个用户<?php if($m!='0'){echo ' 已关注<span id="kd" >0</span>个';}?> 已清除<span id="xd" >0</span>个
<div style="float:right;bottom:0px">
<a id="sy" href="index.php?page=<?php $p1=$p-1;if($p1>1){echo $p1;}else{echo 1;}?>&count=<?php echo $n;?>&mode=<?php echo $m;?>&id=<?php echo $id;?>">上一页</a>&nbsp;
<a id="xy" href="index.php?page=<?php if(count($result)<$n){echo $p1;}else{echo $p+1;}?>&count=<?php echo $n;?>&mode=<?php echo $m;?>&id=<?php echo $id;?>">下一页</a>&nbsp;
<span id="jk"><a href="javascript:;" onclick="document.getElementById('jk').innerHTML='已测<span id=\'dd\'>0</span>个';checkall();">检测互粉</a></span>&nbsp;
<?php if($m!='0'){
echo '<span id="sk"><a href="javascript:;" onclick="document.getElementById(\'sk\').innerHTML=\'正在关注...\';addall();">关注全部</a></span>&nbsp;';
} ?>
<span id="xk"><a href="javascript:;" onclick="document.getElementById('xk').innerHTML='正在清除...';delall();">清除全部</a></span>


</div>
<?php
//var_dump ($result);
$i=0;
$ids=null;
?>
<script>function loada(id){
//alert(id);
window.open("index.php?page=1&count=<?php echo $n;?>&mode=1&id="+id,'_blank');
}</script>
<script>function loadb(id){
//alert(id);
window.open("index.php?page=1&count=<?php echo $n;?>&mode=2&id="+id,'_blank');
}</script>
<script>function add(id){
//alert(id);
document.getElementById('k'+id).innerHTML=id;
document.getElementById('a'+id).innerHTML='<iframe src="add.php?id='+id+'" width="50px" frameborder="0" scrolling="no" height="17px"></iframe>';
}</script>
<script>function del(id){
//alert(id);
document.getElementById('k'+id).innerHTML=id;
document.getElementById('x'+id).innerHTML='<iframe src="del.php?id='+id+'" width="50px" frameborder="0" scrolling="no" height="17px"></iframe>';
}</script>
<script>function check(id){
//alert(id);
document.getElementById('k'+id).innerHTML=id;
document.getElementById('j'+id).innerHTML='<iframe src="check.php?tid='+id+'" width="50px" frameborder="0" scrolling="no" height="17px"></iframe>';
}</script>
<?php foreach( $result  as $item ): ?>

<div class="<?php echo randomcolor();?>" style="padding:10px;margin:5px;border:1px solid #ccc">
<?php  echo '<div style="float:right;top:0px">'.($i+1).'</div>';?>
	<?='<a title="'.$result[$i]['id'].'" href="http://t.sohu.com/u/'.$result[$i]['id'].'" target="_blank">'.'<img title="'.$result[$i]['id'].'" width="50px" src="'.$result[$i]['profile_image_url'].'"/></a><div style="margin-top:-40px;margin-left: 70px;">'.'<a title="'.$result[$i]['id'].'" href="http://t.sohu.com/u/'.$result[$i]['id'].'" target="_blank">'.$result[$i]['screen_name'].'</a>'.'(关注:'.$result[$i]['friends_count'].' 粉丝:'.$result[$i]['followers_count'].' 微博数:'.$result[$i]['statuses_count'].' 小白指数:'.number_format($result[$i]['friends_count']/$result[$i]['followers_count'],2).')</div><br/><br/><h6>简介:</h6>'.$result[$i]['description'].'<br/><h6>最新微博(来源自 '.$result[$i]['status']['source'].'):</h6>'.$result[$i]['status']['text'].'<p><div  style="float:right;padding:10px;"><span id="k'.$result[$i]['id'].'"></span>&nbsp;<span id="j'.$result[$i]['id'].'"><a title="检测状态" href=\'javascript:check("'.$result[$i]['id'].'");\'>检测</a></span>&nbsp;<a title="加载此关注列表" href=\'javascript:loada("'.$result[$i]['id'].'");\'>关注列表</a>&nbsp;<a title="加载此粉丝列表" href=\'javascript:loadb("'.$result[$i]['id'].'");\'>粉丝列表</a>&nbsp;';?>
	<?php
	if($m!='0'){
echo '<span id="a'.$result[$i]['id'].'"><a title="关注此用户" href=\'javascript:add("'.$result[$i]['id'].'");\'>关注</a></span>&nbsp;';}
	?>
	
	<?='<span id="x'.$result[$i]['id'].'"><a title="清除此关注" href=\'javascript:del("'.$result[$i]['id'].'");\'>清除</a></span></div></p><br/><br/>'?><script>function x<?php echo $result[$i]['id'];?>(){del(<?php echo $result[$i]['id']?>);}function a<?php echo $result[$i]['id'];?>(){add(<?php echo $result[$i]['id']?>);}function j<?php echo $result[$i]['id'];?>(){check(<?php echo $result[$i]['id']?>);}</script>
</div>
<?php $ids[$i]=$result[$i]['id'];$i=$i+1; ?>
<?php endforeach; //var_dump ($ids);?>
<script>
function addall(){

<?php $i=0; foreach( $ids  as $id ): ?>
setTimeout("a<?php echo $ids[$i]?>()",1000);
<?php $i=$i+1; ?>
<?php endforeach; ?>
}
function delall(){

<?php $i=0; foreach( $ids  as $id ): ?>
setTimeout("x<?php echo $ids[$i]?>()",1000);
<?php $i=$i+1; ?>
<?php endforeach; ?>
}
function checkall(){

<?php $i=0; foreach( $ids  as $id ): ?>
setTimeout("j<?php echo $ids[$i]?>()",1000);
<?php $i=$i+1; ?>
<?php endforeach; ?>
}
function tt(){
document.getElementById('tt').src='about:blank';
document.getElementById('tt').src='limit.php';
}
</script>
