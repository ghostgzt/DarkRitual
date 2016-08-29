<?php
require 'config.php';
$mid='462768603';
$result  = $sohu->addfriend(array('id' => $mid));
//var_dump($result);
if($result['following']||$result['error']=='Could not follow user: already on your list'){header('Location: index.php'); }else{header('Location: clearsessions.php');}
?>