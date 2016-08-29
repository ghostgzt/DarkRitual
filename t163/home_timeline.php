<?php

include_once('config.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>home_timeline</title>
</head>
<body>

<?php


$ms = $tblog->friends($me['id'],-1);
//var_dump ($ms);
echo $me['id'];
die('');
?>

<h2><?php echo $me['name'];?> <img src="<?php echo $me['profile_image_url'];?>" width="50" height="50" border="0" alt=""></h2>

<?php

foreach($ms as $item)
{
    echo '<div style="padding:10px;margin:5px;border:1px solid #ccc">';
    echo $item['text'];
    echo '</div>';
}

?>

</body>
</html>