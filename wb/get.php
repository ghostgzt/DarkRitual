<?php if (!$_SERVER['QUERY_STRING']){die('<script>alert("木有屏蔽关注");window.close();</script>');}?>
<script src="base64.js" type="text/javascript"></script> 
<script>
var cs="<?php echo $_SERVER['QUERY_STRING']?>";
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
window.open('rd.php?'+ss,'_top');
</script>