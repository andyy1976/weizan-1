<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php  echo $reply['title'];?>排行榜--<?php  echo $_W['account']['name'];?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta name="Description" content="<?php  echo $reply['description'];?>" />
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<!-- Mobile Devices Support @end -->
<link href="../addons/stonefish_scratch/template/css/style.css?v1" rel="stylesheet" type="text/css" />
<style>
html{color:<?php  echo $template['textcolor'];?>;}
html{background-image: url(<?php  echo toimage($template['bgimg'])?>);}
html{background-color: <?php  echo $template['bgcolor'];?>;}
body{font-size:<?php  echo $template['fontsize'];?>px; }
a:link, a:visited, a:hover, a:active { color:<?php  echo $template['textcolorlink'];?>; text-decoration:none; } 
.mingdan{background-color:<?php  echo $template['buttoncolor'];?>;}
.biaoti{color:<?php  echo $template['buttontextcolor'];?>;}
.biaoti a{ color:<?php  echo $template['buttontextcolor'];?>;}
.mingdaninfo{background-color:<?php  echo $template['rulecolor'];?>;	border:1px <?php  echo $template['rulecolor'];?> solid ;color:<?php  echo $template['ruletextcolor'];?>;}

.rankList {	margin:0px 10px;}
.rankList .ranks {margin-top:10px;color:<?php  echo $template['ruletextcolor'];?>;}
.rankList .ranks .avatar {float: left;width: 40px;height: 40px;	margin: 10px 0 0 0;}
.rankList .ranks .avatar img {display: block;width: 100%;height: 100%;}
.rankList .ranks .name {float: left;margin-left: 5px;}
.rankList .ranks .lihe {margin-left:10px;float: left;margin-top:10px;width:100%;}
.rankList .ranks .price {float: right;margin-right: 10px;}
.rankList .rank_01{height: 60px;margin-bottom: 20px}
.rankList .rank_01 {background: <?php  echo $template['rulecolor'];?>;border-radius: 5px;}
.rankList .rank_01 .avatar{margin: 10px 0 0 10px}
.rankList .rank_01 .name,.rankList .rank_01 .price{line-height: 40px;margin-top:10px;}
.rankList .ranks .serialNum {
	float: left;
	width: 44px;
	height: 44px;
	margin: 12px 12px 0 5px;
	background: url(../addons/stonefish_scratch/template/images/serial_num_bg.png);
	background-size: 100% 100%;
	line-height: 20px;
	font-size: 20px;
	text-align: center;
	color: #a9a589
}
.rankList .rank_bg .serialNum{
	position: relative;
	top: -2px;
	width: 46px;
	height: 74px;
	margin: 0;
	background: url(../addons/stonefish_scratch/template/images/rank_bg.png);
	background-size: 46px 298px;
	border-top: 0;
	line-height: 65px
}
.rankList .rank_bg1 .serialNum {
	color: #ffe949;
	background-position: 0 0;
}

.rankList .rank_bg2 .serialNum {
	color: #fff6b2;
	background-position: 0 -75px;
}

.rankList .rank_bg3 .serialNum {
	color: #fffff3;
	background-position: 0 -149px;
}
.rankList .rank_bg4 .serialNum {
	color: #fffff3;
	background-position: 0 -224px;
}
</style>
</head>
<body>
<div>
    <div class="nou">	    
        <div style="margin:10px;" class="adpic">
		<?php  if(!empty($reply['adpic'])) { ?><?php  if(!empty($reply['adpicurl'])) { ?><a href="<?php  echo $reply['adpicurl'];?>"><?php  } ?><img id="top_img" style="max-width: 100%;height: auto;width: auto\9;"  src="<?php  echo toimage($reply['adpic'])?>" width="100%" border="0"><?php  if(!empty($reply['adpicurl'])) { ?></a><?php  } ?><?php  } ?>
        </div>
		<div class="zhuan1">
		    <div class="mingdan">
                <h2 class="biaoti">排行榜</h2>
            </div>
			<?php  if(!empty($rank)) { ?>
		    <div class="rankList">
			    <?php  $i =1;?>
				<?php  if(is_array($rank)) { foreach($rank as $row) { ?>
			    <div class="ranks rank_01 rank_bg rank_bg<?php  if($i>3) { ?>4<?php  } else { ?><?php  echo $i;?><?php  } ?>">
                    <div class="serialNum"><?php  if($i>3) { ?><?php  echo $i;?><?php  } ?></div>
                    <div class="avatar"><img src="<?php  if(substr($row['avatar'],-1)=='0') { ?><?php  echo rtrim(toimage($row['avatar']), '0').$reply['poweravatar']?><?php  } else { ?><?php  echo toimage($row['avatar'])?><?php  } ?>"></div>
                    <div class="name nickname" style="vertical-align: middle;"><?php  echo stripslashes($row['nickname'])?></div>
                </div>
				<?php  $i++?>
			   <?php  } } ?>
			</div>
			<?php  } else { ?>
			<div class="mingdaninfo">
				<div>暂时没有排名！</div>					
            </div>
			<?php  } ?>
        </div>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdkhide', TEMPLATE_INCLUDEPATH)) : (include template('jssdkhide', TEMPLATE_INCLUDEPATH));?>
</body>
</html>