<?php



session_start();

include_once( 'oauthinfo.php' );
include_once( 'saetv2.ex.class.php' );
//echo $_SESSION['token']['access_token'];
if($_SESSION['token']['access_token']){
$sina = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
}else{
header('Location: ./clearsessions.php');
}
/*$ms  = $sina->public_timeline(); // done
$uid_get = $sina->get_uid();
$uid = $uid_get['uid'];*/
//$user_message = $sina->show_user_by_id( $uid);//根据ID获取用户等基本信息