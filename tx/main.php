
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
if(!isset($_GET['count'])){$n='30';}else{$n=$_GET['count'];}
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
//$result = getUserInfo();
//print_r($result);
//----- 获取用户的信息结束 -----//

//----- 发布一条微博开始 -----//
//$result = add(array('content' => '搜狐微博'));
//print_r($result);
//----- 发布一条微博结束 -----//

//----- 发布一条图片微博开始 -----//
//$picpath = 'http://www.bolvv.com/uploadfile/2011/09/02/565bbfe4d051cf1a6975b4f692391253120.jpg'; // 图片路径
//$result  = addPic(array('content' => '成功了哇', 'pic' => $picpath));
//----- 发布一条图片微博结束 -----//
$id=$_GET['id'];
if(isset($_GET['mode'])){$m=$_GET['mode'];}else{$m='0';}
if ($m=='0'){
$result  = $tx->friends(array('count' => $n, 'page' => $p));
//var_dump($result['info'][0]);
}else{if ($m=='1'){
$result  = $tx->xfriends(array('id'=>$id ,'count' => $n, 'page' => $p));
}else{
if ($m=='2'){
$result  = $tx->xfollowers(array('id'=>$id ,'count' => $n, 'page' => $p));
}
}}
if($_GET['pp']){echo '<div class="pcount" style="display:none;">'.count($result['info']).'</div>';echo '<!--';}
?>
<div>
<iframe id="tt" src='limit.php' width="100%" height="45px" frameborder="0" scrolling="no"></iframe><a href="javascript:;" onclick="tt()">刷新限制</a>&nbsp;<a href="javascript:;" onclick="xload(xurl);">刷新列表</a><?php if($m!='0'){echo '&nbsp;<a href="javascript:;" onclick=\'sethash("0","1","'.$n.'","'.$id.'");xload("main.php");\'>返回主页</a>';}?>
</div>
<?php if($m=='1'){
echo '<a title="'.$id.'" href="http://t.qq.com/'.$id.'" target="_blank">'.$id.'</a> 的关注列表 ';
}if($m=='2'){
echo '<a title="'.$id.'" href="http://t.qq.com/'.$id.'" target="_blank">'.$id.'</a> 的粉丝列表 ';
} ?>
共加载<span id="sum"><?php echo count($result['info']);?></span>个用户<?php if($m!='0'){echo ' 已关注<span id="kd" >0</span>个';}?> 已清除<span id="xd" >0</span>个
<div style="float:right;bottom:0px">
<a id="sy" href="javascript:;" onclick="sethash('<?php echo $m;?>','<?php $p1=$p-1;if($p1>1){echo $p1;}else{echo 1;}?>','<?php echo $n;?>','<?php echo $id;?>');xload('main.php?page=<?php $p1=$p-1;if($p1>1){echo $p1;}else{echo 1;}?>&count=<?php echo $n;?>&mode=<?php echo $m;?>&id=<?php echo $id;?>');" >上一页</a>&nbsp;
<a id="ty" href="javascript:;" onclick="var ksb=prompt('跳转第N页','<?php if($p>1){echo $p;}else{echo 1;}?>');if(ksb){sethash('<?php echo $m;?>',ksb,'<?php echo $n;?>','<?php echo $id;?>');xload('main.php?page='+ksb+'&count=<?php echo $n;?>&mode=<?php echo $m;?>&id=<?php echo $id;?>');}" >N页</a>&nbsp;
<a id="xy" href="javascript:;" onclick="sethash('<?php echo $m;?>','<?php if(count($result['info'])<$n){echo $p;}else{echo $p+1;}?>','<?php echo $n;?>','<?php echo $id;?>');xload('main.php?page=<?php if(count($result['info'])<$n){echo $p;}else{echo $p+1;}?>&count=<?php echo $n;?>&mode=<?php echo $m;?>&id=<?php echo $id;?>');" >下一页</a>&nbsp;
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
function getarray($arrayi){
$s=0;
$tt='';
foreach($arrayi as $ds)
{
$tt=$tt. ($arrayi[$s]['name']).' ';
$s=$s+1;
}
return $tt;
}
?>
<?php if(is_array($result['info'])): ?>
<?php foreach( $result['info']  as $item ): ?>
<div class="<?php echo randomcolor();?>" style="padding:10px;margin:5px;border:1px solid #ccc">
<?php 
if(!$result['info'][$i]['head']){$result['info'][$i]['head']='http://mat1.gtimg.com/www/mb/img/p1/head_normal_50.png';}
if ($result['info'][$i]['name']!='GentleKwan'){
 echo '<div style="float:right;top:0px">'.(($p-1)*$n+$i+1).'</div><a title="'.$result['info'][$i]['name'].'" href="http://t.qq.com/'.$result['info'][$i]['name'].'" target="_blank">'.'<img title="'.$result['info'][$i]['name'].'" width="50px" src="'.str_replace('.png/50','.png',str_replace('http://gentle.cdn.duapp.com/xshow.php?http://app.','http://t2.',$result['info'][$i]['head']).'/50').'"/></a><div style="margin-top:-40px;margin-left: 70px;">'.'<a title="'.$result['info'][$i]['name'].'" href="http://t.qq.com/'.$result['info'][$i]['name'].'" target="_blank">'.$result['info'][$i]['nick'].'</a>'.'(关注:'.$result['info'][$i]['idolnum'].' 粉丝:'.$result['info'][$i]['fansnum'].' 小白指数:'.number_format($result['info'][$i]['idolnum']/$result['info'][$i]['fansnum'],2).')</div><br/><br/><h6>标签:</h6>'.getarray($result['info'][$i]['tag']).'<br/><h6>最新微博(来源自 '.$result['info'][$i]['tweet'][0]['from'].'):</h6>'.$result['info'][$i]['tweet'][0]['text'].'<p><div  style="float:right;padding:10px;"><span id="k'.$result['info'][$i]['name'].'"></span>&nbsp;<span id="j'.$result['info'][$i]['name'].'"><a title="检测状态" href=\'javascript:check("'.$result['info'][$i]['name'].'");\'>检测</a></span>&nbsp;<a title="加载此关注列表" href=\'javascript:loada("'.$result['info'][$i]['name'].'",'.$n.');\'>关注列表</a>&nbsp;<a title="加载此粉丝列表" href=\'javascript:loadb("'.$result['info'][$i]['name'].'",'.$n.');\'>粉丝列表</a>&nbsp;';if($m!='0'){echo '<span id="a'.$result['info'][$i]['name'].'"><a title="关注此用户" href=\'javascript:add("'.$result['info'][$i]['name'].'");\'>关注</a></span>&nbsp;';}echo '<span id="x'.$result['info'][$i]['name'].'"><a title="清除此关注" href=\'javascript:del("'.$result['info'][$i]['name'].'");\'>清除</a></span></div></p><br/><br/>';
 }
 ?>
</div>
<?php $ids[$i]=$result['info'][$i]['name'];$i=$i+1; ?>
<?php endforeach;?>
<div style="display:none;" class='tts'>
<?php $i=0; foreach( $ids  as $id ): ?><?php if ($result['info'][$i]['name']!='GentleKwan'){echo $ids[$i].'|';}?><?php $i=$i+1; ?><?php endforeach; ?></div>
<?php endif;?>
<div class="pindex"><div style="padding:10px;margin:5px;border:1px solid #ccc" align="center"><a href="javascript:page=parseInt(page)+1;" onclick="pload('main.php?mode='+mode+'&page='+(parseInt(page)+1)+'&count='+count+'&id='+id);">加载更多</a></div></div>