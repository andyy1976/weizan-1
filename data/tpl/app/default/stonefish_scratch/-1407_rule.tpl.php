<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php  echo $reply['title'];?>活动规则--<?php  echo $_W['account']['name'];?></title>
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
</head>
<style>
html{font:<?php  echo $template['fontsize'];?>px; color:<?php  echo $template['textcolor'];?>;}
html{background-image: url(<?php  echo toimage($template['bgimg'])?>);}
html{background-color: <?php  echo $template['bgcolor'];?>;}
a:link, a:visited, a:hover, a:active { color:<?php  echo $template['textcolorlink'];?>; text-decoration:none; } 
.mingdan{background-color:<?php  echo $template['buttoncolor'];?>;border:1px <?php  echo $template['buttoncolor'];?> solid ;}
.biaoti{color:<?php  echo $template['buttontextcolor'];?>;}
.biaoti a{ color:<?php  echo $template['buttontextcolor'];?>;}
.mingdaninfo{background-color:<?php  echo $template['rulecolor'];?>;	border:1px <?php  echo $template['rulecolor'];?> solid ;color:<?php  echo $template['ruletextcolor'];?>;}
</style>
<body>
<div>
   <div class="nou">
        <div style="margin:10px;" class="adpic">
		<?php  if(!empty($reply['adpic'])) { ?><?php  if(!empty($reply['adpicurl'])) { ?><a href="<?php  echo $reply['adpicurl'];?>"><?php  } ?><img id="top_img" style="max-width: 100%;height: auto;width: auto\9;"  src="<?php  echo toimage($reply['adpic'])?>" width="100%" border="0"><?php  if(!empty($reply['adpicurl'])) { ?></a><?php  } ?><?php  } ?>
        </div>
		<div class="zhuan1">
		    <div class="mingdan">
                <h2 class="biaoti">活动时间</h2>
            </div>
            <div class="mingdaninfo">
				<div style="text-align:center;"><?php  echo date('Y-m-d H:i',$reply['starttime']);?> 至 <?php  echo date('Y-m-d H:i',$reply['endtime']);?></div>					
            </div>
			<div class="mingdan">
                <h2 class="biaoti">活动说明</h2>
            </div>
            <div class="mingdaninfo">
				<div><?php  echo htmlspecialchars_decode($share['share_txt'])?></div>					
            </div>
			<div class="mingdan">
                <h2 class="biaoti">活动奖品</h2>
            </div>
            <div class="mingdaninfo">
				<div class='guize'>
                    <?php  if($reply['showprize']>0) { ?>
			        <?php  if(is_array($prize)) { foreach($prize as $prizes) { ?>
		            <p style="text-align:center; margin:0px 20px;line-height:200%;"><img src="<?php  echo toimage($prizes['prizepic'])?>"><br/><?php  echo $prizes['prizerating'];?> - <?php  echo $prizes['prizename'];?><?php  if($reply['showprize']==2) { ?> X<?php  echo $prizes['prizetotal'];?><?php  } ?></p>
                    <?php  } } ?>
			        <?php  } ?>
		            <p class="line"></p>
			        <p style="text-align:left; margin:0px 20px;line-height:200%;"><?php  echo htmlspecialchars_decode($reply['prizeinfo'])?></p>
    	        </div>
            </div>
        </div>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdkhide', TEMPLATE_INCLUDEPATH)) : (include template('jssdkhide', TEMPLATE_INCLUDEPATH));?>
</body>
</html>