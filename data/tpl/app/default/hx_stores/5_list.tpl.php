<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,initial-scale=no,user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes"/>
<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
<meta name="format-detection" content="telephone=no"/>
<link rel="stylesheet" href="/addons/hx_stores/template/style/css/style.css" />
<link rel="stylesheet" href="/addons/hx_stores/template/style/css/common.css?v=20140121" />
<link rel="stylesheet" href="/addons/hx_stores/template/style/css/shop.css?v=20140121" />
<title>门店列表</title>
<style>
</style>
</head>
<body>
<!--头部-->
	<header class="ts1">
		<a class="u_back fl" href="javascript:history.go(-1)">&nbsp;</a>
		<ul class="topbar fr" style="display:none">
			<li>
				<a class="icon_user" href=""> <i></i>
					我的
				</a>
			</li>
			<li>
				<a class="icon_shopping" href=""> <i></i>
					购物车
				</a>
			</li>
			<li>
				<a class="icon_class" href="<?php  echo create_url('mobile/module/area', array('name' => 'locationnew', 'id' => $row['id'], 'weid' => $_W['weid'],'lng'=>$_GPC['lng'],'lat'=>$_GPC['lat']));?>">
					<i></i>
					分类
				</a>
			</li>
          <li>
				<a class="icon_index" href="">
					<i></i>
					主页
				</a>
			</li>
		</ul>
	</header><!--主体-->
	<form class="f_index_search clearfix" action="" method="post" id="search_form">
		<input type="text" id="search_name" name="search_name" class="search_box" placeholder="请输入搜索关键字" value="<?php  echo $_GPC['search_name'];?>" />
		<input type="submit" class="search_button" value="搜 索" />
	</form> 
	<?php  if(is_array($list)) { foreach($list as $row) { ?>
	<div class="block">
		<h1><?php  echo $row['title'];?></h1> 
		<div class="lst"> 
			<ul id="lstname0"> 
				<li><a href="<?php  echo $this->createMobileUrl('detail', array('id' => $row['id'],'lng'=>$_GPC['lng'],'lat'=>$_GPC['lat']));?>" class="addr"><?php  echo $row['address'];?><span class="icon">&nbsp;</span></a></li>
				<li><a class="tel"><?php  echo $row['phone'];?><span class="icon">&nbsp;</span></a></li>
				<li class="last"><a href="<?php  echo $this->createMobileUrl('detail', array('id' => $row['id'],'lng'=>$_GPC['lng'],'lat'=>$_GPC['lat']));?>" class="details">查看详情<span class="icon">&nbsp;</span></a></li>
			</ul> 
		</div>
	</div>
	<?php  } } ?>	
<div class="pagination">
	<ul>
		<li class="prev" >
		<?php  if($p>1) { ?>
		<a href="<?php  echo $this->createMobileUrl('list', array('lng'=>$_GPC['lng'],'lat'=>$_GPC['lat'],'p'=>($p-1)))?>">上一页</a></li>
		<?php  } else { ?>
		<a>上一页</a>
		<?php  } ?>
		</li>
		<li><?php  echo $p;?>/<?php  echo $totalpage;?></li>
		<li class="next">
		<?php  if($p < $totalpage) { ?>
		<a href="<?php  echo $this->createMobileUrl('list', array('lng'=>$_GPC['lng'],'lat'=>$_GPC['lat'],'p'=>($p+1)))?>">下一页</a>
		<?php  } else { ?>
		<a>下一页</a>
		<?php  } ?>
		</li>
	</ul>
</div>
 	<p class="page-url">
		<a   class="page-url-link">&copy;<?php  if(empty($_W['account']['name'])) { ?>珊瑚海<?php  } else { ?><?php  echo $_W['account']['name'];?><?php  } ?></a>
	</p>
</body>
</html>