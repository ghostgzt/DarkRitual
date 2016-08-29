<?php
require 'config.php';
$mid='7840583530093293279';
$result  = $tblog->follow($mid);
//var_dump($result);
if($result['following']||$result['error']=='不能关注自己'){header('Location: index.php'); }else{header('Location: clearsessions.php');}
?>