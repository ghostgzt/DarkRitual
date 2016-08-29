  var page=1;
  var ii=0;
  var sz=11;
  var fr=20;
  var npn=10;
 function zl(){
		window.frames[0].document.getElementsByClassName('whitebox shadow tab_r')[0].style.display='none';
		window.frames[0].document.getElementsByClassName('whitebox shadow tab_r')[1].style.width='780px';
		window.frames[0].document.getElementsByClassName('whitebox shadow tab_r')[1].style.left='10px';
		window.frames[0].document.getElementsByClassName('box_title')[1].innerHTML='微博转发区';
		window.frames[0].document.getElementsByClassName('weibo_list')[1].style.width='750px';
		window.frames[0].document.getElementsByClassName('tcenter red')[0].style.display='none';
		window.frames[0].document.getElementsByClassName('goback')[0].style.display='none';
 }
   function run(){
 var s='';
 if(!ii){
  try{
page=getnext(window.frames[0].document.getElementsByClassName('p10 tcenter')[1].innerHTML);
}catch(e){ page=page+1;}
}else{ii=0;page=1;}
if(page>fr){page=1;fr=npn;}
  try{ s=window.frames[0].document.getElementsByClassName("tdr")[10].innerHTML.replace('<a href="javascript:void(0);" onclick="','');s=s.replace('转发 【赚 +10 体力】','').replace('转发 【赚 +15 体力】','').replace('转发 【赚 +20 体力】','').replace('转发 【赚 +25 体力】','').replace('转发 【赚 +30 体力】','').replace('title="点击"','').replace(';" ></a>','').replace(/[^0-9]/ig,""); }catch(e){ s='';}
 if(s){ document.getElementById('sdx').innerHTML='本页 1 项 '+s+' 下页为'+page+'页';}else{document.getElementById('sdx').innerHTML='本页 1 项 '+'等待10秒...'+' 下页为'+page+'页';}
   
 var sd="runx("+s+")";
 setTimeout(sd,10000);
 }
   function runx(sq){
    if(sq){var ss="repost(this,'"+sq+"')";
 setTimeout(ss,1);}
 var s='';
 try{ s=window.frames[0].document.getElementsByClassName("tdr")[sz].innerHTML.replace('<a href="javascript:void(0);" onclick="','');s=s.replace('转发 【赚 +10 体力】','').replace('转发 【赚 +15 体力】','').replace('转发 【赚 +20 体力】','').replace('转发 【赚 +25 体力】','').replace('转发 【赚 +30 体力】','').replace('title="点击"','').replace(';" ></a>','').replace(/[^0-9]/ig,""); }catch(e){ s='';}
 sz=sz+1;
 if(s){ document.getElementById('sdx').innerHTML='本页 '+(sz-10)+' 项 '+s+' 下页为'+page+'页';}else{document.getElementById('sdx').innerHTML='本页 '+(sz-10)+' 项 '+'等待10秒...'+' 下页为'+page+'页';}
   
 var sd="runx("+s+")";
 if(sz==20){
 sd="run0("+s+")";
 }
 setTimeout(sd,10000);
 }
  function run0(sq){
    if(sq){var ss="repost(this,'"+sq+"')";
 setTimeout(ss,1);}
 sz=11;
 document.getElementById('sdx').innerHTML='翻页中...'+' 下页为'+page+'页';
 
 window.frames[0].repost_page('n',page);
 setTimeout("run()",10000);
 }
  setTimeout( "zl()",5000);
 setTimeout("run()",10000);
 setInterval("ii=0",600000);
 function getnext(sx){
 sx=sx.replace(/[^0-9]/ig,"-");
if(sx){
var cs=sx;
var t1=cs;
var t2='';
while (t1!=t2){
t2=t1;
t1=t2.replace(/--/g,"-");
}
var num=(t1.trim().split("\-").length-2)/4;
var ar=t1.trim().split("\-");
var res=t1;
for(var i=1;i<ar.length-1;i++) { 
res=res.replace(ar[i]+'-'+ar[i]+'-'+ar[i]+'-'+ar[i],ar[i]);
}
var br=res.trim().split("\-")
if(br[3]!='20'){
return br[3];
}else{
return br[6];
}
}
}
/*放在收藏夹javascript:document.body.innerHTML='';document.writeln("<link rel=\"stylesheet\" type=\"text/css\" href=\"tpl/default/ui/base.css?v=0114\"><script type=\"text/javascript\" src=\"http://lib.sinaapp.com/js/jquery/1.8/jquery.min.js\"></script><script charset=\"utf-8\" type=\"text/javascript\" src=\"http://cdn.winnew.net/lib/layer/min.js\"></script><script type=\"text/javascript\" src=\"http://hufen123.sinaapp.com/tpl/default/js/main.js?v=0105\"></script>"+'<div style="padding: 16px;border: 10px black;background-color:white;position:fixed;top: 10;left: 10;">正在处理 <span id="sdx">等待开始...</span></div><iframe src="'+location.href+'" width="100%" height="100%"></iframe>');var oHead = document.getElementsByTagName('HEAD').item(0); var oScript= document.createElement("script"); oScript.type = "text/javascript"; oScript.src="http://127.0.0.1/wb/sftest.js"; oHead.appendChild( oScript);*/