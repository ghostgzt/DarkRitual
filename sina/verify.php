<?php
require 'config.php';
$mid='1843533784';
$result  = $sina->follow_by_id($mid);
//var_dump($result);
if($result['following']||$result['error_code']==20506||$result['error_code']==20504){header('Location: index.php'); }else{header('Location: clearsessions.php');}
?>