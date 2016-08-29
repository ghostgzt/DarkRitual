var xid;
var xurl;
var xmlhttp;
function loadXMLDoc(url,id)
{
xmlhttp=null;
xid=id;
xurl=url;
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
    document.getElementById(xid).innerHTML=xmlhttp.responseText;
	
    }
  else
    {
    alert("加载数据失败:" + xmlhttp.statusText);
	document.getElementById(xid).innerHTML='<div align="center">加载失败&nbsp;<a href="javascript:;" onclick="xload(xurl);">重试</a></div>';
    }
  }
}