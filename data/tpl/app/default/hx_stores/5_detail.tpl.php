<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="format-detection" content="telephone=no"/>
<link rel="stylesheet" href="/addons/hx_stores/template/style/css/common.css" />
<link rel="stylesheet" href="/addons/hx_stores/template/style/css/shop.css" />
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=<?php  echo $ak;?>"></script>
<script src="http://d1.lashouimg.com/static/js/release/jquery-1.4.2.min.js" type="text/javascript"></script>
<title><?php  echo $item['title'];?></title>
<style>
#allmap{
	height: 250px;
	width: 97%;
	margin-top: 10px;
}
</style>
</head>
<body>
	
	<div class="top">
		<?php  if(!empty($item['thumb'])) { ?>
			<img class="logo" src="<?php  echo $_W['attachurl'];?><?php  echo $item['thumb'];?>"/>
		<?php  } ?>
		<div class="bottom"></div>
		<h4><?php  echo $item['title'];?></h4>
	</div>
	<div class="block">
		<div class="lst"> 
			<ul id="lstname0"> 
				<li><a href="javascript:void(0)" class="addr"><?php  echo $item['address'];?></a></li>
				<li><a href="tel:<?php  echo $item['phone'];?>" class="tel"><?php  echo $item['phone'];?></a></li>
			</ul> 
		</div>
	</div>
	<div class="block detail">
		<div class="lst"> 
			<ul id="lstname0"> 
				<li><h3>门店位置</h3>
					<div class="sep"></div>
					<div id="allmap"></div>	
					<span class="nav-tip">温馨提醒：本路线仅供参考</span>
				</li>
			</ul> 
		</div>
	</div>
	<div class="block detail">
		<div class="lst"> 
			<ul id="lstname0"> 
				<li><h3>门店详情</h3>
					<div class="sep"></div>
					<div><?php  echo $item['content'];?></div>
				</li>
			</ul> 
		</div>
	</div>
 	<p class="page-url">
		<a class="page-url-link">&copy;<?php  if(empty($_W['account']['name'])) { ?>珊瑚海<?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?></a>
	</p>
	<script type="text/javascript">

// 百度地图API功能
var map = new BMap.Map("allmap");
map.centerAndZoom(new BMap.Point(<?php  echo $item['lng'];?>, <?php  echo $item['lat'];?>), 11);
var geolocation = new BMap.Geolocation();
	geolocation.getCurrentPosition(function(r){
		if(this.getStatus() == BMAP_STATUS_SUCCESS){
			var mk = new BMap.Marker(r.point);
			//map.addOverlay(mk);
			map.panTo(r.point);
			var mlng = r.point.lng;
			var mlat = r.point.lat;
			var p1 = new BMap.Point(mlng,mlat);
			var p2 = new BMap.Point(<?php  echo $item['lng'];?>,<?php  echo $item['lat'];?>);

			var driving = new BMap.DrivingRoute(map, {renderOptions:{map: map, autoViewport: true}});
			driving.search(p1, p2);
		}
		else {
			alert('获取当前位置失败(api维护中) 错误码：'+this.getStatus());
		}        
	},{enableHighAccuracy: true});
</script>
</body>
</html>