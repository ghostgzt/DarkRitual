<?php
session_start();
include_once('oauthinfo.php');
include_once('api/tblog.class.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>授权完成</title>
</head>
<body>
<h1>授权完成</h1>
<?php
$oauth = new OAuth( CONSUMER_KEY, CONSUMER_SECRET , $_SESSION['request_token']['oauth_token'] , $_SESSION['request_token']['oauth_token_secret']  );



if ($access_token = $oauth->getAccessToken(  $_REQUEST['oauth_token'] ) )
{
unset($_SESSION['oauth_token']);
unset($_SESSION['oauth_token_secret']);
$_SESSION['access_token'] = $access_token;

/* Remove no longer needed request tokens */
  //$_SESSION['status'] = 'verified';
  header('Location: ./verify.php');
}
else
{
    header('Location: ./clearsessions.php');
}

?>
</body>
</html>