<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php  echo $reply['title'];?>帮助情况--<?php  echo $_W['account']['name'];?></title>
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
<link href="../addons/stonefish_scratch/template/css/style.css?<?php  echo time()?>" rel="stylesheet" type="text/css" />
<?php  if($share['share_open_close']) { ?><script src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/jquery-1.11.1.min.js?<?php  echo time()?>"></script><?php  } ?>
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
.rankList .rank_01 .name,.rankList .rank_01 .price{line-height: 20px;margin-top:10px;}
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
                <h2 class="biaoti"><?php  if(strstr($share['share_firend'], '/')) { ?><img src="<?php  echo toimage($share['share_anniu'])?>"><?php  } else { ?><?php  echo $share['share_firend'];?><?php  } ?></h2>
            </div>
			<?php  if(!empty($firend)) { ?>
		    <div class="rankList">
				<?php  if(is_array($firend)) { foreach($firend as $row) { ?>
			    <div class="ranks rank_01">
                    <div class="avatar"><img src="<?php  if(substr($row['avatar'],-1)=='0') { ?><?php  echo rtrim(toimage($row['avatar']), '0').$reply['poweravatar']?><?php  } else { ?><?php  echo toimage($row['avatar'])?><?php  } ?>"></div>
                    <div class="name nickname" style="vertical-align: middle;"><?php  echo stripslashes($row['nickname'])?><br/><?php  echo date('Y-m-d H:i', $row['visitorstime'])?></div>
                </div>
			   <?php  } } ?>
			</div>
			<?php  } else { ?>
			<div class="mingdaninfo">
				<div style="text-align:center;">快去拉小伙伴一起来玩耍吧！</div>					
            </div>
			<?php  } ?>
			<?php  if($share['share_open_close']) { ?>
			<!--分享按钮-->
			<div class="mingdan" style="margin-top:10px;">
                <div id="shareimg" class="biaoti"><?php  if(strstr($share['share_anniu'], '/')) { ?><img style="height: 35px;width: auto;" src="<?php  echo toimage($share['share_anniu'])?>"><?php  } else { ?><?php  echo $share['share_anniu'];?><?php  } ?></div>
				<div id="pop_share"><img src="<?php  echo toimage($share['share_pic'])?>" width="100%" alt="分享到朋友圈"/></div>
            </div>
			<!--分享按钮-->			
			<?php  } ?>
        </div>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>
<?php  if($share['share_open_close']) { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
<script>
$("#shareimg").click(function(){
	$("#pop_share").show();
});

$("#pop_share").click(function(){
	$("#pop_share").hide();
});
</script>
<?php  } else { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdkhide', TEMPLATE_INCLUDEPATH)) : (include template('jssdkhide', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>
</body>
</html>