
<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );


$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );

$uid_get = $c->get_uid();
$uid = $uid_get['uid'];
$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息

?>
		<h2 align="left">删除关注</h2>
	<form action="" >
		<input type="text" name="gz" style="width:300px" />

		<input type="submit" />
	</form>
<?php
if( isset($_REQUEST['gz']) ) {
	$ret = $c->unfollow_by_id( $_REQUEST['gz'] );	//发送微博
	if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
		echo "<p>取消失败，错误：{$ret['error_code']}:{$ret['error']}</p>";
	} else {
		echo "<p>取消成功</p>";
	}
}
?>