<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );
echo $_SESSION['token']['access_token'];
$c = new SaeTClientV2( WB_AKEY , WB_SKEY , '2.00s2RlAC0CeIeYbe972a6feaVI8fAB' );
$ms  = $c->public_timeline(); // done
$uid_get = $c->get_uid();
$uid = $uid_get['uid'];
$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新浪微博V2接口演示程序-Powered by Sina App Engine</title>
</head>

<body>
	<?=$user_message['screen_name']?>,您好！ 
	<h2 align="left">发送新微博</h2>
	<form action="" >
		<input type="text" name="text" style="width:300px" />
		<input type="submit" />
	</form>
	
		<h2 align="left">发送新图片微博</h2>
	<form action="" >
		<input type="text" name="pt" style="width:300px" />
		<input type="text" name="pp" style="width:300px" />
		<input type="submit" />
	</form>
<?php
if( isset($_REQUEST['text']) ) {
	$ret = $c->update( $_REQUEST['text'] );	//发送微博
	if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
		echo "<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
	} else {
		echo "<p>发送成功</p>";
	}
}
if( isset($_REQUEST['pt']) && isset($_REQUEST['pp']) ) {
	$ret = $c->upload( $_REQUEST['pt'] ,$_REQUEST['pp'] );	//发送微博
	if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
		echo "<p>发送失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
	} else {
		echo "<p>发送成功</p>";
	}
}
?>

<?php if( is_array( $ms['statuses'] ) ): ?>
<?php foreach( $ms['statuses'] as $item ): ?>
<div style="padding:10px;margin:5px;border:1px solid #ccc">
	<img src="<?=$item['user']['profile_image_url']?>"/><br/><?='<a title="'.$item['user']['id'].'" href="http://weibo.com/u/'.$item['user']['id'].'" target="_blank">'.$item['user']['name'].'</a>(关注:'.$item['user']['friends_count'].' 粉丝:'.$item['user']['followers_count'].' 小白指数:'.$item['user']['friends_count']/$item['user']['followers_count'].')'.'<br/>此条微博ID:'.$item['idstr'].'<br/>'.$item['text']?>
	（发文时间： <?=$item['created_at'];?>）<br/>
	<?php if (isset($item['original_pic'])){$ori_img=$item['original_pic'];
	if($ori_img){
	//echo "<a href='".$ori_img."'><img src='".$item['thumbnail_pic']."'></a>";
	echo '<a target="_blank" href="'.$ori_img.'"><img src="'.$item['thumbnail_pic'].'" /></a>';
	}}?>
</div>
<?php endforeach; ?>
<?php endif; ?>

</body>
</html>
