<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php  echo $_W['account']['name'];?>--提示信息</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<!-- Mobile Devices Support @end -->
<style>
    body{margin:0;padding:0;font-size:15px;}
	.tips{color:#a94442;background-color:#f2dede;border-color:#ebccd1;padding:15px;margin:20px;border:1px solid transparent;border-radius:5px}
	.btns,.url{margin:20px;height:40px;text-align:center; line-height:40px;background:#F5F5F5; color:#000; border:0; border-radius:5px;}
</style>
</head>
<body onload="tourl()">
<div class="tips">
    <div><?php  echo $msg;?></div>
</div>
<?php  if(!empty($url)) { ?>
<div class="url" id="share_miao"><?php  echo $time;?>秒后自动进入</div>
<?php  } else { ?>
<div class="btns">返回回话界面</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdkhide', TEMPLATE_INCLUDEPATH)) : (include template('jssdkhide', TEMPLATE_INCLUDEPATH));?>
<script src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/jquery-1.11.1.min.js"></script>
<script>
    <?php  if(!empty($url)) { ?>
	function tourl(){
	    djstime(<?php  echo $time;?>);
		setTimeout(function () {
		    window.location.href='<?php  echo $url;?>';
	    },<?php  echo $time;?>*1000+1000)
	}
	/*倒计时*/
	function djstime(miao){
	    var e1=$("#share_miao").first();
	    var i=miao;
	    var interval=setInterval(function(){
		    e1.html(i+"秒后自动进入");		
		    i--;
		    if(i<0){
			    clearInterval(interval);	
		    }
	    },1000);
    }
	<?php  } ?>
	$(".btns").click(function () {
		wx.closeWindow();
	});
</script>
</body>		
</html>