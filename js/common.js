var psx=0;
var anum=0;
var cnum=0



function xload(url){
  document.getElementById('index').innerHTML='<div style="padding:10px;margin:5px;border:1px solid #ccc" align="center">Loading...</div>';
  loadXMLDoc(url,'index',false,'x');
  scroll(0,0);
  anum=0;
  cnum=0;
  

}
function pload(url){
  document.getElementsByClassName('pindex')[0].innerHTML='<div style="padding:10px;margin:5px;border:1px solid #ccc" align="center">Loading...</div>';
  loadXMLDoc(url+'&pp=1','pindex',false,'p');
  //scroll(0,0);
  //anum=0;
  //cnum=0;
  //document.getElementById('ttsx').innerHTML=document.getElementById('ttsx').innerHTML+document.getElementById('tts')[last].innerHTML;
}
function tt(){
document.getElementById('tt').src='about:blank';
document.getElementById('tt').src='limit.php';
}
function loada(id,count){
//alert(id);
sethash('1','1',count,id);
xload("main.php?page=1&count="+count+"&mode=1&id="+id);
}
function loadb(id,count){
//alert(id);
sethash('2','1',count,id);
xload("main.php?page=1&count="+count+"&mode=2&id="+id);
}
function add(id){
//alert(id);
document.getElementById('k'+id).innerHTML=id;
document.getElementById('a'+id).innerHTML='<iframe src="add.php?id='+id+'" width="50px" frameborder="0" scrolling="no" height="17px"></iframe>';
}
function del(id){
//alert(id);
document.getElementById('k'+id).innerHTML=id;
document.getElementById('x'+id).innerHTML='<iframe src="del.php?id='+id+'" width="50px" frameborder="0" scrolling="no" height="17px"></iframe>';
}
function check(id){
//alert(id);
document.getElementById('k'+id).innerHTML=id;
document.getElementById('j'+id).innerHTML='<iframe src="check.php?tid='+id+'" width="50px" frameborder="0" scrolling="no" height="17px"></iframe>';
}
function addall(){
var kx=document.getElementById('ttsx').innerHTML.split('|');
for (var i=0;i<kx.length-1;i++)
{
setTimeout("add('"+kx[i].trim()+"')",100);
}
}
function delall(){
var kx=document.getElementById('ttsx').innerHTML.split('|');
for (var i=0;i<kx.length-1;i++)
{
setTimeout("del('"+kx[i].trim()+"')",100);
}
}
function checkall(){
var kx=document.getElementById('ttsx').innerHTML.split('|');
for (var i=0;i<kx.length-1;i++)
{
setTimeout("check('"+kx[i].trim()+"')",100);
}
}
function sethash(xmode,xpage,xcount,xid){
mode=xmode;
page=xpage;
count=xcount;
id=xid;
window.location.hash="mode="+mode+"&page="+page+"&count="+count+"&id="+id;
}
function dehash(mainurl){
var hs=window.location.hash.replace('#','');

if(hs){
var dxk=hs.split('&');
for (var i=0;i<dxk.length;i++)
{
var isc=dxk[i].split('=');
if((isc[0])=='mode'){mode=isc[1];}
if((isc[0])=='page'){page=isc[1];}
if((isc[0])=='count'){count=isc[1];}
if((isc[0])=='id'){id=isc[1];}
}
}
xload(mainurl+'?mode='+mode+'&page='+page+'&count='+count+'&id='+id);
window.location.hash="mode="+mode+"&page="+page+"&count="+count+"&id="+id;
}
