
<?php
require 'config.php';
$uid_get = $sina->get_uid();
$uid = $uid_get['uid'];
$lc=-1;
if(!isset($_GET['page'])){$p='1';}else{$p=$_GET['page'];}
if(!isset($_GET['count'])){$n='50';}else{$n=$_GET['count'];}
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
$id=$_GET['id'];
if(isset($_GET['mode'])){$m=$_GET['mode'];}else{$m='0';}
if ($m=='0'){
$result  = $sina->friends_by_id($uid,$p-1, $n);
//var_dump($sina->friends_by_id(1843533784,0,50));
}else{if ($m=='1'){
$result  = $sina->friends_by_id($id,  $p-1 , $n);
}else{
if ($m=='2'){
$result  = $sina->followers_by_id($id,  $p-1 ,$n);
}
}}
if($_GET['pp']){echo '<div class="pcount" style="display:none;">'.count($result['users']).'</div>';echo '<!--';}
?>
<div>
<iframe id="tt" src='limit.php' width="100%" height="45px" frameborder="0" scrolling="no"></iframe><a href="javascript:;" onclick="tt()">刷新限制</a>&nbsp;<a href="javascript:;" onclick="xload(xurl);">刷新列表</a><?php if($m!='0'){echo '&nbsp;<a href="javascript:;" onclick=\'sethash("0","1","'.$n.'","'.$id.'");xload("main.php");\'>返回主页</a>';}?>
</div>
<?php if($m=='1'){
echo '<a title="'.$id.'" href="http://weibo.com/'.$id.'" target="_blank">'.$id.'</a> 的关注列表 ';
}if($m=='2'){
echo '<a title="'.$id.'" href="http://weibo.com/'.$id.'" target="_blank">'.$id.'</a> 的粉丝列表 ';
} ?>
共加载<span id="sum"><?php echo count($result['users']);?></span>个用户<?php if($m!='0'){echo ' 已关注<span id="kd" >0</span>个';}?> 已清除<span id="xd" >0</span>个
<div style="float:right;bottom:0px">
<a id="sy" href="javascript:;" onclick="sethash('<?php echo $m;?>','<?php $p1=$p-1;if($p1>1){echo $p1;}else{echo 1;}?>','<?php echo $n;?>','<?php echo $id;?>');xload('main.php?page=<?php $p1=$p-1;if($p1>1){echo $p1;}else{echo 1;}?>&count=<?php echo $n;?>&mode=<?php echo $m;?>&id=<?php echo $id;?>');" >上一页</a>&nbsp;
<a id="ty" href="javascript:;" onclick="var ksb=prompt('跳转第N页','<?php if($p>1){echo $p;}else{echo 1;}?>');if(ksb){sethash('<?php echo $m;?>',ksb,'<?php echo $n;?>','<?php echo $id;?>');xload('main.php?page='+ksb+'&count=<?php echo $n;?>&mode=<?php echo $m;?>&id=<?php echo $id;?>');}" >N页</a>&nbsp;
<a id="xy" href="javascript:;" onclick="sethash('<?php echo $m;?>','<?php if(count($result['users'])<$n){echo $p;}else{echo $p+1;}?>','<?php echo $n;?>','<?php echo $id;?>');xload('main.php?page=<?php if(count($result['users'])<$n){echo $p;}else{echo $p+1;}?>&count=<?php echo $n;?>&mode=<?php echo $m;?>&id=<?php echo $id;?>');" >下一页</a>&nbsp;
<span id="jk"><a href="javascript:;" onclick="document.getElementById('jk').innerHTML='已测<span id=\'dd\'>0</span>个';checkall();">检测互粉</a></span>&nbsp;
<?php if($m!='0'){
echo '<span id="sk"><a href="javascript:;" onclick="document.getElementById(\'sk\').innerHTML=\'正在关注...\';addall();">关注全部</a></span>&nbsp;';
} ?>
<span id="xk"><a href="javascript:;" onclick="document.getElementById('xk').innerHTML='正在清除...';delall();">清除全部</a></span>
</div>


<?php
if($_GET['pp']){echo '-->';}
$i=0;
$ids=null;
?>
<?php if(is_array($result['users'])): ?>
<?php foreach( $result['users']  as $item ): ?>
<div class="<?php echo randomcolor();?>" style="padding:10px;margin:5px;border:1px solid #ccc">
<?php 
if ($result['users'][$i]['id']!='1843533784'){
 echo '<div style="float:right;top:0px">'.(($p-1)*$n+$i+1).'</div><a title="'.$result['users'][$i]['id'].'" href="http://weibo.com/'.$result['users'][$i]['id'].'" target="_blank">'.'<img title="'.$result['users'][$i]['id'].'" width="50px" src="'.$result['users'][$i]['profile_image_url'].'"/></a><div style="margin-top:-40px;margin-left: 70px;">'.'<a title="'.$result['users'][$i]['id'].'" href="http://weibo.com/'.$result['users'][$i]['id'].'" target="_blank">'.$result['users'][$i]['screen_name'].'</a>'.'(关注:'.$result['users'][$i]['friends_count'].' 粉丝:'.$result['users'][$i]['followers_count'].' 微博数:'.$result['users'][$i]['statuses_count'].' 小白指数:'.number_format($result['users'][$i]['friends_count']/$result['users'][$i]['followers_count'],2).')</div><br/><br/><h6>简介:</h6>'.$result['users'][$i]['description'].'<p><div  style="float:right;padding:10px;"><span id="k'.$result['users'][$i]['id'].'"></span>&nbsp;<span id="j'.$result['users'][$i]['id'].'"><a title="检测状态" href=\'javascript:check("'.$result['users'][$i]['id'].'");\'>检测</a></span>&nbsp;<a title="加载此关注列表" href=\'javascript:loada("'.$result['users'][$i]['id'].'",'.$n.');\'>关注列表</a>&nbsp;<a title="加载此粉丝列表" href=\'javascript:loadb("'.$result['users'][$i]['id'].'",'.$n.');\'>粉丝列表</a>&nbsp;';if($m!='0'){echo '<span id="a'.$result['users'][$i]['id'].'"><a title="关注此用户" href=\'javascript:add("'.$result['users'][$i]['id'].'");\'>关注</a></span>&nbsp;';}echo '<span id="x'.$result['users'][$i]['id'].'"><a title="清除此关注" href=\'javascript:del("'.$result['users'][$i]['id'].'");\'>清除</a></span></div></p><br/><br/>';
 }
 ?>
</div>
<?php $ids[$i]=$result['users'][$i]['id'];$i=$i+1; ?>
<?php endforeach;?>

<div style="display:none;" class='tts'>
<?php $i=0; foreach( $ids  as $id ): ?><?php if ($result['users'][$i]['id']!='1843533784'){echo $ids[$i].'|';}?><?php $i=$i+1; ?><?php endforeach; ?></div>

<?php endif;?>
<div class="pindex"><div style="padding:10px;margin:5px;border:1px solid #ccc" align="center"><a href="javascript:page=parseInt(page)+1;" onclick="pload('main.php?mode='+mode+'&page='+(parseInt(page)+1)+'&count='+count+'&id='+id);">加载更多</a></div></div>