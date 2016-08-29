<?php
require 'config.php';
$uid_get = $sina->get_uid();
$uid = $uid_get['uid'];
$uinfo = $sina->show_user_by_id( $uid);

//var_dump($uinfo);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
		<?php 
/*if(isset($_GET['page'])){$p=$_GET['page'];}else{$p='1';}
if(isset($_GET['count'])){$n=$_GET['count'];}else{$n='20';}
if(isset($_GET['mode'])){$m=$_GET['mode'];}else{$m='0';}
if(isset($_GET['id'])){$id=$_GET['id'];}else{$id='11104';}*/
?>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="description" content="新浪微博互粉管理工具"/>
<meta name="keywords" content="新浪,sina,微博,新浪微博,weibo,互粉,管理,工具"/> 
<meta name="author" content="天狼星の破晓,Gentle_Kwan"/> 
<link rel="shortcut icon" href="../img/sina.png"/>
<link rel="stylesheet" type="text/css" href="../css/style.css" media="screen"/>
<script type="text/javascript" src='../js/common.js'></script>
<script type="text/javascript" src='../js/xml.js'></script>
<script type="text/javascript" src='../js/base64.js'></script>
<title><?php /*
if($m==1){
echo $id.'的关注列表 - ';
}
if($m==2){
echo $id.'的粉丝列表 - ';
}*/
?>新浪微博互粉管理工具 - Dark Ritual</title>
<script>var b = new Base64();</script>

<script>
var mode=0;
var page=1;
var count=50;
var id=0;
</script>

</head>

<body>

<div style="display:none;" id='ttsx'></div>

<div id="container">

	<div class="left" id="main_left">

		<div id="header">Dark Ritual</div>
			
		<div class="right" id="main">
		<h2>新浪微博互粉管理工具<img src="../img/sina.png" width="20px" style="position:absolute;margin-top:-2px"><span style="font-size:14px;float:right;margin-top=-10px;"><a title="发微博" href="javascript:;" onclick="document.getElementById('xxs').innerHTML='';var dss=prompt('发送微博内容:','');if(dss){document.getElementById('xxs').innerHTML='正在发送...';
		  loadXMLDoc('update.php?mode=0&nr='+ b.encode(dss),'xxs',true);
		}" style="color:black;">发微博</a>&nbsp;<span id="xxs"></span>&nbsp;<a title="<?php echo $uinfo['description']; ?>" href="http://weibo.com/<?php echo $uinfo['id']; ?>" target="_black" style="color:black;"><?php echo $uinfo['screen_name'];?></a>/<a href="clearsessions.php" target="_top" title="退出登录" style="color:black;">退出登录</a></span></h2>
		<div id='index'>
<script>dehash('main.php');</script>
        </div>
	

		</div>

		<!--<div class="left" id="subnav">

			<h1>Something</h1>
			<ul>
				<li><a href="index.html">pellentesque</a></li>
				<li><a href="index.html">sociis natoque</a></li>
				<li><a href="index.html">semper</a></li>
				<li><a href="index.html">convallis</a></li>
			</ul>

			<h1>Another thing</h1>
			<ul>
				<li><a href="index.html">consequat molestie</a></li>
				<li><a href="index.html">sem justo</a></li>
				<li><a href="index.html">semper</a></li>
				<li><a href="index.html">sociis natoque</a></li>
			</ul>

			<h1>Third and last</h1>
			<ul>
				<li><a href="index.html">sociis natoque</a></li>
				<li><a href="index.html">magna sed purus</a></li>
				<li><a href="index.html">tincidunt</a></li>
				<li><a href="index.html">consequat molestie</a></li>
			</ul>

		</div>-->
	
		<div class="clearer">&nbsp;</div>

	</div>

	<div class="right" id="main_right">

		<div class="padded">
			
			<h4>百度搜索</h4>
			<p>百度（Nasdaq简称：BIDU）是全球最大的中文搜索引擎，2000年1月由李彦宏、徐勇两人创立于北京中关村，致力于向人们提供“简单，可依赖”的信息获取方式。“百度”二字源于中国宋朝词人辛弃疾的《青玉案·元夕》词句“众里寻他千百度”，象征着百度对中文信息检索技术的执著追求。</p>  
			</div>
     <iframe width="100%" height="280px" frameborder="0" scrolling="no" src="../htm/baidu.htm"></iframe>
			
			<div class="padded">
            <h4>360搜索</h4>
			<p>奇虎360创立于2005年9月，是中国领先的互联网安全软件与互联网服务公司，曾先后获得过鼎晖创投、红杉资本、高原资本、红点投资、Matrix、IDG等风险投资商总额高达数千万美元的联合投资。2011年3月30日奇虎360公司正式在纽约证券交易所挂牌交易，证券代码为“QIHU”，而巴菲特认购一事纯属乌龙。</p>
           </div>
	<iframe width="100%" height="280px" frameborder="0" scrolling="no" src="../htm/360.htm"></iframe>	
            
			<div class="padded">
            <h4>搜搜搜索</h4>
			<p>腾讯公司（腾讯控股有限公司），成立于1998年11月，是目前中国最大的互联网综合服务提供商之一，也是中国服务用户最多的互联网企业之一。成立十多年以来，腾讯一直秉承一切以用户价值为依归的经营理念，始终处于稳健、高速发展的状态。</p>
           </div>
	<iframe width="100%" height="280px" frameborder="0" scrolling="no" src="../htm/soso.htm"></iframe>	


	</div>
	
			

	<div class="clearer">&nbsp;</div>

	<div id="footer">
		
		<span class="left">&copy; 2012-2013 <a title="作者主页" target="_blank" href="http://weibo.com/1843533784/">新浪微博互粉管理工具</a></span>
		
		<span class="right"><span>作者保留一切解释权力！</span>&nbsp;<a target="_blank" href="http://sighttp.qq.com/authd?IDKEY=7916a8c0792d2c1b6514f9f95054092d98ec76b3c920fa5b"><img border="0"  src="http://wpa.qq.com/imgd?IDKEY=7916a8c0792d2c1b6514f9f95054092d98ec76b3c920fa5b&pic=46" alt="点击这里给我发消息" title="点击这里给我发消息"></a>&nbsp;&nbsp;<a target="_blank" title="天狼星の破晓" href="http://www.godwolfs.asia/">天狼星の破晓</a> From 破晓网络技术有限公司</span>
		
		<div class="clearer">&nbsp;</div>

	</div>

</div>
<div style='width:40px;height:40px; position:fixed; bottom:5%; right:5%; z-index:97;'><a href="javascript:;" onclick="scroll(0,0);"><img src="../img/top.png" /></a></div>
</body>

</html>