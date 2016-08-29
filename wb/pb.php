<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );


$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );

$uid_get = $c->get_uid();
$uid = $uid_get['uid'];
$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
$p=0;
$n=50;
if(isset($_GET['p'])){$p=$_GET['p'];}
if(isset($_GET['n'])){$n=$_GET['n'];}
$ms  = $c->friends_by_id($uid,$p*$n,$n); // done
?>

<?php if( is_array( $ms['users']) ): ?>
<?php $i=0;?>
<?php foreach( $ms['users']  as $item ): ?>

<div style="padding:10px;margin:5px;border:1px solid #ccc">
<?php echo $i;?>
	<img src="<?=$ms['users'][$i]['profile_image_url']?>"/><br/><?='<a title="'.$ms['users'][$i]['id'].'" href="http://weibo.com/u/'.$ms['users'][$i]['id'].'" target="_blank">'.$ms['users'][$i]['name'].'</a>(关注:'.$ms['users'][$i]['friends_count'].' 粉丝:'.$ms['users'][$i]['followers_count'].' 小白指数:'.$ms['users'][$i]['friends_count']/$ms['users'][$i]['followers_count'].')'.'<br/>我的粉丝:'.$ms['users'][$i]['follow_me']?>
	
</div>
<?php $i=$i+1; ?>
<?php endforeach; ?>
<?php endif; ?>
<a  href="pb.php?p=<?php $p1=$p-1;if($p1>0){echo $p1;}else{echo 0;}?>">上一页</a>
<a  href="pb.php?p=<?php echo $p+1;?>">下一页</a>