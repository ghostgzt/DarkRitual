<?php
require 'config.php';
$mid='GentleKwan';
$result  = $tx->addfriend(array('id' => $mid));
//var_dump($result);
if($result['msg']=='ok'||$result['errcode']==80028||$result['errcode']==80103){header('Location: index.php'); }else{header('Location: clearsessions.php');}
?>