<!--放在收藏夹
javascript:var oHead = document.getElementsByTagName('HEAD').item(0); var oScript= document.createElement("script"); oScript.type = "text/javascript"; oScript.src="http://127.0.0.1/wb/test.js"; oHead.appendChild( oScript);var oHead = document.getElementsByTagName('HEAD').item(0); var oScript= document.createElement("script"); oScript.type = "text/javascript"; oScript.src="http://127.0.0.1/wb/base64.js"; oHead.appendChild( oScript);var oHead = document.getElementsByTagName('HEAD').item(0); var oScript= document.createElement("script"); oScript.type = "text/javascript"; oScript.src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"; oHead.appendChild( oScript);

---------
javascript:void( function(){  var sx;try{sx=document.getElementsByClassName('user_entities_wrap clearfix')[0].innerHTML;}catch(e){alert('打开粉丝大师扫描');window.open('http://fansmaster.sinaapp.com/weibo/light_apps/z_friends_clear/index.php','_blank');}window.open('http://127.0.0.1/wb/get.php?'+encodeURIComponent(sx.replace(/[^0-9]/ig,"-").replace(/----------------------------------------------------------------------------/g,'-').replace(/-------------/g,'-').replace(/------/g,'-').replace(/------/g,'-').replace(/-----/g,'-')),'_blank');}());
-->
<?php
session_start();
include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );
$o = new SaeTOAuthV2( WB_AKEY , WB_SKEY );
$code_url = $o->getAuthorizeURL( WB_CALLBACK_URL );
?>
<title>Gentle 御用屏蔽关注清除工具</title>
<script>
var xmlhttp;
var xid;
var xul;
function loadXMLDoc(url,id)
{
	  xid=id;
xul=url;
	  //xmlhttp=null;
if (window.XMLHttpRequest)
  {// code for IE7, Firefox, Opera, etc.
  xmlhttp=new XMLHttpRequest();
  }
else if (window.ActiveXObject)
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
if (xmlhttp!=null)
  {
  xmlhttp.onreadystatechange=state_Change;
  xmlhttp.open("GET",url,true);
  xmlhttp.send(null);
sleep(1000);
state_Change;
	document.getElementById(xid).innerHTML=  '已处理';
document.getElementById('xx').innerHTML=parseInt(document.getElementById('xx').innerHTML)-1;
  }
else
  {
  alert("Your browser does not support XMLHTTP.");
  }
}

function dd(){
if((document.getElementById(xid).innerHTML!=  '检测中')){
document.getElementById(xid).innerHTML=  '预备';
setTimeout('if((document.getElementById(xid).innerHTML!=  "正常")||(document.getElementById(xid).innerHTML!=  "被屏蔽")){loadXMLDoc("header.php?'+xid+'",'+xid+')}',10);
document.getElementById(xid).innerHTML=  '检测中';
}
}
function   sleep(n) 
    { 
        var   start=new   Date().getTime(); 
        while(true)   if(new   Date().getTime()-start> n)   break; 
    } 
function state_Change()
{
if (xmlhttp.readyState==4)
  {// 4 = "loaded"
  if (xmlhttp.status==200)
    {// 200 = "OK"
	document.getElementById(xid).innerHTML=  xmlhttp.responseText;
    }
  else
    {
    alert("Problem retrieving XML data:" + xmlhttp.statusText);
    }
  }
}
</script>
<?php
$ss= $_SERVER['QUERY_STRING'];
$sd=base64_decode($ss);
$dd= json_decode($sd,true);
//var_dump($dd);
$mp=intval($dd['num']);
$dx=$dd['ids'];
if( is_array( $dx) ):
 $i=0;
 foreach( $dx  as $item ):
echo '<div id="x'.$item.'" style="padding:10px;margin:5px;border:1px solid #ccc;width:80px;float:left;"><a target="_blank" href="http://weibo.com/'.$item.'">'.$item.'</a> 检测结果:<div id="'.$item.'" ></div><script>
function x'.$item.'(){setTimeout(\'loadXMLDoc("xf.php?uid='.$item .'","'.$item.'")\',100);} </script><a href="javascript:;" onclick="document.getElementById(\''.$item.'\').innerHTML= null;x'.$item.'();">复查</a>&nbsp;<a href="javascript:;" onclick="window.open(\'uf.php?gz='.$item.'\',\'_blank\')">删除</a></div>';
 $i=$i+1; 
 endforeach; 
 echo '<script>function clear(){';
  foreach( $dx  as $item ):
echo 'x'.$item.'();';
 endforeach; 
 echo '}</script>';
 endif;
 ?>
<div style="padding:10px;margin:5px;border:1px solid #ccc;width:120px;position:fixed;right:0;bottom:0;">
<a  href="javascript:clear();" >一键清除</a>
  <p><a href="<?=$code_url?>" target="_blank"><img src="http://www.sinaimg.cn/blog/developer/wiki/240.png" title="点击进入授权页面" alt="点击进入授权页面" border="0" /></a></p>
<div>未处理:<div id="xx"><?php echo $mp;?></div></div>
</div>