<script>
var xmlhttp;
var xid;
var xul;

function loadXMLDoc(url,id)
{
if((document.getElementById(id).innerHTML!=  '正常')&&(document.getElementById(id).innerHTML!=  '被屏蔽')){
	  xid=id;
xul=url;
	  xmlhttp=null;
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

  //alert(id);
if((document.getElementById(xid).innerHTML==  '')){
document.getElementById(xid).innerHTML=  '开始';
sleep(500);
state_Change;
if (xmlhttp.readyState!=4){
document.getElementById(xid).innerHTML=  '超时';
}

//alert(document.getElementById(xid).innerHTML);
}
//alert(document.getElementById(xid).innerHTML);

dd();

  }
else
  {
  alert("Your browser does not support XMLHTTP.");
  }
  }
  //alert(url);
}

function dd(){
//alert();
//if((document.getElementById(xid).innerHTML!=  '正常')||(document.getElementById(xid).innerHTML!=  '被屏蔽')){
//if(document.getElementById(xid).innerHTML==  '超时'){
document.getElementById(xid).innerHTML=  '预备';
setTimeout('if((document.getElementById(xid).innerHTML!=  "正常")||(document.getElementById(xid).innerHTML!=  "被屏蔽")){loadXMLDoc("header.php?'+xid+'",'+xid+')}',10);
document.getElementById(xid).innerHTML=  '检测中';

//}
//}

}
function   sleep(n) 
    { 
        var   start=new   Date().getTime(); 
        while(true)   if(new   Date().getTime()-start> n)   break; 
    } 
function state_Change()
{
//while(xmlhttp.readyState!=4){  sleep(500);}
if((document.getElementById(xid).innerHTML!=  '正常')&&(document.getElementById(xid).innerHTML!=  '被屏蔽')){
if (xmlhttp.readyState==4)
  {// 4 = "loaded"
  if (xmlhttp.status==200)
    {// 200 = "OK"
  //  document.getElementById('A1').innerHTML=xmlhttp.status;
    //document.getElementById('A2').innerHTML=xmlhttp.statusText;
   
	//alert(xmlhttp.responseText); 
	if (xmlhttp.responseText=='1'){
	document.getElementById(xid).innerHTML= '被屏蔽';
	return;
	//alert(xid+' 被屏蔽');
	
	}else{
	document.getElementById(xid).innerHTML=  '正常';
	document.getElementById('x'+xid).style.display='none';
	try{
	document.getElementById('xx').innerHTML=parseInt(document.getElementById('xx').innerHTML)-1;
	return;
	}catch(e){}
//clearTimeout();
	}

	//alert(xmlhttp.responseText);
    }
  else
    {
	//alert('123');
    alert("Problem retrieving XML data:" + xmlhttp.statusText);
    }
  }else{document.getElementById(xid).innerHTML==  '超时';}
  }
}
</script>

<?php
session_start();

include_once( 'config.php' );
include_once( 'saetv2.ex.class.php' );


$c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );

$uid_get = $c->get_uid();
$uid = $uid_get['uid'];
$user_message = $c->show_user_by_id( $uid);//根据ID获取用户等基本信息
$p=0;
$n=500;
if(isset($_GET['p'])){$p=$_GET['p'];}
if(isset($_GET['n'])){$n=$_GET['n'];}
$ms  = $c->friends_ids_by_id($uid,$p*$n,$n); // done
$mp=intval($ms['total_number']/$n);
$dx=$ms['ids'];


if( is_array( $dx) ):
 $i=0;
 foreach( $dx  as $item ):



echo '<div id="x'.$item.'" style="padding:10px;margin:5px;border:1px solid #ccc;width:80px;float:left;"><a target="_blank" href="http://weibo.com/'.$item.'">'.$item.'</a> 检测结果:<div id="'.$item.'" ></div><script>
function x'.$item.'(){setTimeout(\'loadXMLDoc("header.php?'.$item .'","'.$item.'")\',100);}x'.$item.'(); </script><a href="javascript:;" onclick="document.getElementById(\''.$item.'\').innerHTML= null;x'.$item.'();">复查</a>&nbsp;<a href="javascript:;" onclick="window.open(\'uf.php?gz='.$item.'\',\'_blank\')">删除</a></div>';


 $i=$i+1; 
 endforeach; 
 endif;

 ?>

<div style="padding:10px;margin:5px;border:1px solid #ccc;width:120px;position:fixed;right:0;bottom:0;">
<a  href="pbs.php?p=<?php $p1=$p-1;if($p1>0){echo $p1;}else{echo 0;}?>">上一页</a>
<a  href="pbs.php?p=<?php $p1=$p+1;if($p1<$mp){echo $p1;}else{echo $mp;}?>">下一页</a>
<div>剩余:<div id="xx"><?php echo $n;?></div></div>
</div>
