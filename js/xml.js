var xid;
var xurl;
var xmlhttp;
var xxp;
function loadXMLDoc(url,id,tf,xp)
{
xmlhttp=null;
xid=id;
xxp=xp;
if(!tf){
xurl=url;
}
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
  }
else
  {
  alert("Your browser does not support XMLHTTP.");
  }
}

function state_Change()
{
if (xmlhttp.readyState==4)
  {// 4 = "loaded"
  if (xmlhttp.status==200)
    {// 200 = "OK"
  //  document.getElementById('A1').innerHTML=xmlhttp.status;
    //document.getElementById('A2').innerHTML=xmlhttp.statusText;
	if(xxp=='p'){
	    document.getElementsByClassName(xid)[0].innerHTML=xmlhttp.responseText;
		document.getElementsByClassName(xid)[0].className='x'+xid;
	}else{
    document.getElementById(xid).innerHTML=xmlhttp.responseText;
	}
	if (xxp=='x'||xxp=='p'){
	var oso=document.getElementById('ttsx').innerHTML;
		if(xxp=='p'){
	document.getElementById('sum').innerHTML=parseInt(document.getElementById('sum').innerHTML)+
	parseInt(document.getElementsByClassName('pcount')[0].innerHTML);
	document.getElementsByClassName('pcount')[0].className='xpcount';

	}
	if(xxp=='x'){
	oso='';

	}
	  document.getElementById('ttsx').innerHTML=oso+document.getElementsByClassName('tts')[0].innerHTML;
	  
  document.getElementsByClassName('tts')[0].className='ttx';
  
  }
    }
  else
    {
    alert("加载数据失败:" + xmlhttp.statusText);
	if (xxp=='x'||xxp=='p'){
	document.getElementById(xid).innerHTML='<div style="padding:10px;margin:5px;border:1px solid #ccc" align="center">加载失败&nbsp;<a href="javascript:;" onclick="'+xxp+'load(xurl);">重试</a></div>';
   }
   }
  }
}