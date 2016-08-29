var sx;try{sx=document.getElementsByClassName('user_entities_wrap clearfix')[0].innerHTML;}catch(e){alert('打开粉丝大师扫描');window.open('http://fansmaster.sinaapp.com/weibo/light_apps/z_friends_clear/index.php','_top');}
sx=sx.replace(/[^0-9]/ig,"-");
//.replace(/----------------------------------------------------------------------------/g,'-').replace(/-------------/g,'-').replace(/------/g,'-').replace(/------/g,'-').replace(/-----/g,'-')
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
var ss='{"ids":[';
for(var i=1;i<br.length-1;i++) { 
ss=ss+br[i]+',';
}
ss=ss+''+']}'
ss=ss.replace(',]}','],"num":'+num+'}');
alert(ss);
var b = new Base64();ss = b.encode(ss);
window.open('http://127.0.0.1/wb/rd.php?'+ss,'_top');
}else{alert('木有屏蔽关注！');}