<?php
//die 0;
$url=$_SERVER['QUERY_STRING'];
try{
 $ch  = curl_init();
 curl_setopt($ch, CURLOPT_URL, 'http://weibo.com/'.$url);
 curl_setopt($ch, CURLOPT_HEADER, true);
 curl_setopt($ch, CURLOPT_NOBODY,true);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
 curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
 curl_setopt($ch, CURLOPT_REFERER, 'http://www.baidu.com');
 //curl_setopt($ch, CURLOPT_AUTOREFERER,true);
 curl_setopt($ch, CURLOPT_TIMEOUT,60); 
 curl_setopt($ch, CURLOPT_HTTPHEADER, array(
 'Accept: */*',
 'User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)',
 'Connection: Keep-Alive'));
 $header = curl_exec($ch);
 	}catch(Exception $e){die('<script>window.reload();</script>');}
 $text=$header;
preg_match_all('/Location\:(.*?)\n/is', $text, $match);
$txp=implode($match[1],"<br>\n");
if(strpos($txp,'http://weibo.com/sorry?usernotexists')){echo 1;}else{
echo 0;}

?>