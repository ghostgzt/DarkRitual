<?php
session_start();
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );
$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
if(!isset($c)){
die('没有授权！');
}
//$uid_get = $c->get_uid();
//$uid = $uid_get['uid'];
//$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
?>
<?php
if( isset($_REQUEST['uid']) ) {
	$ret = $c->unfollow_by_id( $_REQUEST['uid'] );	//取消关注
	if ( isset($ret['error_code']) && $ret['error_code'] > 0 ) {
		echo "取消失败，错误：{$ret['error_code']}:{$ret['error']}";
	} else {
		echo "取消成功";
	}
}
?>