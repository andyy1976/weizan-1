<?php defined('IN_IA') or exit('Access Denied');?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php  echo $title;?></title>
<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />
<link rel="stylesheet" href="/web/resource/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="/addons/deam_puzzleredpack/images/touch.css" />
<link type="text/css" rel="stylesheet" href="/addons/deam_puzzleredpack/images/puzzle.css" />
<script>
var se;
var bgimg = '<?php  echo $puzzle_image;?>';
</script>
</head>
<body>
<div style='display:none'><?php  if($share_img) { ?><img src="<?php  echo $share_img;?>"><?php  } ?></div>
<div class="share" style="display:none">
    <img src="/addons/deam_puzzleredpack/images/share.png">
</div>
<div class="bg">
<img src="/addons/deam_puzzleredpack/images/bg-top.jpg">
</div>
<div class="puzzle-img">
	<section id='container' class="one_pic"></section>
    <div class="puzzle-mask"><img src="/addons/deam_puzzleredpack/images/float.png"/></div>
</div>
<?php  if($act_status==1) { ?>
<center>活动已关闭</center>
<?php  } else if($act_status==2) { ?>
<center>活动未开始</center>
<?php  } else if($act_status==3) { ?>
<center class="starter" id="startbtn"><button id='start' type="button" class="btn btn-success">开 始</button></center>
<?php  } else if($act_status==4) { ?>
<center>活动已结束</center>
<?php  } ?>

<div class="panel panel-danger state" id='noredpack'>
    <div class="panel-heading">
    	<h3 class="panel-title">您来晚了，红包被抢光啦！</h3>
    </div>
    <div class="panel-body">
    	<center><img src="/addons/deam_puzzleredpack/images/noredpack.gif"/></center>
        <p class="text-center" style="padding:10px 0 10px 0;">您来晚啦，红包都被抢光了，下次请赶早来哦！</p>
        <center><button type="button" class="btn btn-success btn-lg btn-block closeW">关闭</button></center>
    </div>
</div>
<div class="panel panel-danger state" id='already'>
    <div class="panel-heading">
    	<h3 class="panel-title">提示信息</h3>
    </div>
    <div class="panel-body">
        <p class="text-center" style="padding:10px 0 10px 0;">您已领取过一次了，请将机会留给其他人哦</p>
        <center><button type="button" class="btn btn-success btn-lg btn-block closeW">关闭</button></center>
    </div>
</div>
<div class="panel panel-danger state" id='prize'>
    <div class="panel-heading">
    	<h3 class="panel-title">恭喜你！</h3>
    </div>
    <div class="panel-body">
    	<div class="myPrize"><center><img class="myPrizeImg" src="/addons/deam_puzzleredpack/images/prize.jpg"/><em>NULL</em></center></div>
        <p class="text-center" style="padding:10px 0 10px 0;">已通过公众号发送，请查收</p>
        
        <?php  if($arr['ads_text']) { ?>
        	<?php  if($arr['ads_type']) { ?>
            	<center><button type="button" style="<?php  if($arr['ads_button_color']) { ?> background-color:<?php  echo $arr['ads_button_color'];?>; <?php  } ?> margin-top:20px;color:<?php  echo $arr['ads_color'];?>"  class="btn <?php  if(!$arr['ads_button_color']) { ?> btn-default <?php  } ?> btn-lg btn-block" <?php  if($arr['ads_link']) { ?> onClick="location.href='<?php  echo $arr['ads_link'];?>'"<?php  } ?>><?php  echo $arr['ads_text'];?></button></center>
            <?php  } else { ?>
            	<center><?php  if($arr['ads_link']) { ?><a style="color:<?php  echo $arr['ads_color'];?>" href="<?php  echo $arr['ads_link'];?>"><?php  echo $arr['ads_text'];?></a><?php  } else { ?><p style="color:<?php  echo $arr['ads_color'];?>"><?php  echo $arr['ads_text'];?></p><?php  } ?></center>
            <?php  } ?>
        <?php  } ?>
        <center><button type="button" class="btn btn-warning btn-lg btn-block shareFriend" style="margin-top:10px" onclick="$('.share').show();">分享到朋友圈</button></center>
        <center><button type="button" class="btn btn-success btn-lg btn-block closeW" style="margin-top:10px">关闭</button></center>
    </div>
</div>

<div class="attention" id="pleaseShare" style="display:none">

	<div class="attention-con attention-con2">
        <p class="attention-title">提示</p>
        <p class="attention-text">恭喜您完成拼图，现在只需将本活动分享到朋友圈即可领取红包哦，赶快行动吧！</p>
        <div class="attention-button">
        <button type="button" class="btn btn-close">关闭</button>
        <button type="button" class="btn btn-share" onclick="$('.share').show();">分享给好友</button>
        </div>
    </div>
</div>
<div class="attention" id="guanzhu" style="display:none">
    <div class="attention-con">
        <img src="<?php  echo $qrcode_image;?>" class="ewm">	
        <img src="/addons/deam_puzzleredpack/images/ewmwz.png" class="ewmwz">	
    </div>
</div>
</body>
<script src="/addons/deam_puzzleredpack/images/puzzle.js" type="text/javascript"></script>
<script src="/web/resource/js/lib/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript" >
wx.config({
	debug: false,
	appId: '<?php  echo $package["appId"];?>',
	timestamp: '<?php  echo $package["timestamp"];?>',
	nonceStr: '<?php  echo $package["nonceStr"];?>',
	signature: '<?php  echo $package["signature"];?>',
	jsApiList: [
		'onMenuShareTimeline',
		'onMenuShareAppMessage'
	]
});
var jsonTitle = '<?php  echo $share_title;?>';

var gamenum = 1;
var  t=new Game(<?php  echo $puzzlelevel;?>,<?php  echo $puzzlelevel;?>);
jQuery("#start").click(function(){
	jQuery.ajax({
		type: "post",
		dataType: "json",
		url: "<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $uniacid;?>&c=entry&do=callback&m=deam_puzzleredpack&actid=<?php  echo $act_id;?>",
		cache: false,
		data: {
			'act_id':'<?php  echo $act_id;?>'
		},
		beforeSend: function () {
			jQuery('#start').attr("disabled","disabled");
		},	
		success: function(data){
			1002==data.status?(jQuery("#start").hide(),t.startGame()):40007==data.status?$("#guanzhu").show():(alert(data.msg),location.reload());
		}
	});
	
});
jQuery('.closeW').click(function(){
	jQuery('.state').fadeOut(1000);
});
Game.prototype.tips=function(ts){
	<?php  if($arr['isshare']) { ?>
		jQuery('#start').attr("disabled","disabled");
		jQuery('#pleaseShare').fadeIn(200);
		wx.ready(function () {
			wx.onMenuShareTimeline({
				title: '<?php  echo $myShareTitle;?>', // 分享标题
				link: '', // 分享链接
				imgUrl: '<?php  echo $share_img;?>', // 分享图标
				desc: '',
				success: function () {
					// 用户确认分享后执行的回调函数
					jQuery('.share').hide();
					jQuery.ajax({
						type: "post",
						dataType: "json",
						url: "<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $uniacid;?>&c=entry&do=getdata&m=deam_puzzleredpack&actid=<?php  echo $act_id;?>",
						cache: false,
						data: {
							'act_id':'<?php  echo $act_id;?>','pmg': 'getdata'
						},
						beforeSend: function () {
						},	
						success: function(data){
							jQuery('.attention').fadeOut(200,function(){
								jQuery('.puzzle-mask').show();
							});
							
							101==data.status?(jQuery(".myPrize em").text(data.money),jsonTitle = jsonTitle.replace(new RegExp("\{MONEY\}", "g"),data.money),jQuery("#prize").show()):109==data.status?jQuery("#noredpack").show():40004==data.status?jQuery("#already").show():40007==data.status?$(".attention").show():(alert(data.msg),location.reload());
							wx.ready(function () {
								wx.onMenuShareTimeline({
									title: jsonTitle, // 分享标题
									link: '', // 分享链接
									imgUrl: '<?php  echo $share_img;?>', // 分享图标
									desc: '',
									success: function () {
									},
									cancel: function () {
									}
								});
								//分享到朋友
								wx.onMenuShareAppMessage({
									title: jsonTitle, // 分享标题
									desc: '', // 分享描述
									link: '', // 分享链接
									imgUrl: '<?php  echo $share_img;?>', // 分享图标
									type: '', // 分享类型,music、video或link，不填默认为link
									dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
									success: function () {
										// 用户确认分享后执行的回调函数
									},
									cancel: function () { 
										// 用户取消分享后执行的回调函数
									}
								});
							});
						}
					});
					//end
				},
				cancel: function () {
					// 用户取消分享后执行的回调函数
				}
			});
			//分享到朋友
			wx.onMenuShareAppMessage({
				title: '<?php  echo $myShareTitle;?>', // 分享标题
				desc: '', // 分享描述
				link: '', // 分享链接
				imgUrl: '<?php  echo $share_img;?>', // 分享图标
				type: '', // 分享类型,music、video或link，不填默认为link
				dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
				success: function () {
					// 用户确认分享后执行的回调函数
					jQuery('.share').hide();
					jQuery.ajax({
						type: "post",
						dataType: "json",
						url: "<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $uniacid;?>&c=entry&do=getdata&m=deam_puzzleredpack&actid=<?php  echo $act_id;?>",
						cache: false,
						data: {
							'act_id':'<?php  echo $act_id;?>','pmg': 'getdata'
						},
						beforeSend: function () {
							
						},	
						success: function(data){
							jQuery('.attention').fadeOut(200,function(){
								jQuery('.puzzle-mask').show();
							});
							101==data.status?(jQuery(".myPrize em").text(data.money),jsonTitle = jsonTitle.replace(new RegExp("\{MONEY\}", "g"),data.money),jQuery("#prize").show()):109==data.status?jQuery("#noredpack").show():40004==data.status?jQuery("#already").show():40007==data.status?$(".attention").show():(alert(data.msg),location.reload());
							wx.ready(function () {
								wx.onMenuShareTimeline({
									title: jsonTitle, // 分享标题
									link: '', // 分享链接
									imgUrl: '<?php  echo $share_img;?>', // 分享图标
									desc: '',
									success: function () {
									},
									cancel: function () {
									}
								});
								//分享到朋友
								wx.onMenuShareAppMessage({
									title: jsonTitle, // 分享标题
									desc: '', // 分享描述
									link: '', // 分享链接
									imgUrl: '<?php  echo $share_img;?>', // 分享图标
									type: '', // 分享类型,music、video或link，不填默认为link
									dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
									success: function () {
										// 用户确认分享后执行的回调函数
									},
									cancel: function () { 
										// 用户取消分享后执行的回调函数
									}
								});
							});
						}
					});
					//end
				},
				cancel: function () { 
					// 用户取消分享后执行的回调函数
				}
			});
		});
	<?php  } else { ?>
	jQuery.ajax({
		type: "post",
		dataType: "json",
		url: "<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $uniacid;?>&c=entry&do=getdata&m=deam_puzzleredpack&actid=<?php  echo $act_id;?>",
		cache: false,
		data: {
			'act_id':'<?php  echo $act_id;?>','pmg': 'getdata'
		},
		beforeSend: function () {
			jQuery('#start').attr("disabled","disabled");
		},	
		success: function(data){
			jQuery('.puzzle-mask').show();
			101==data.status?(jQuery(".myPrize em").text(data.money),jsonTitle = jsonTitle.replace(new RegExp("\{MONEY\}", "g"),data.money),jQuery("#prize").show()):109==data.status?jQuery("#noredpack").show():40004==data.status?jQuery("#already").show():40007==data.status?$(".attention").show():(alert(data.msg),location.reload());
			wx.ready(function () {
				wx.onMenuShareTimeline({
					title: jsonTitle, // 分享标题
					link: '', // 分享链接
					imgUrl: '<?php  echo $share_img;?>', // 分享图标
					desc: '',
					success: function () {
					},
					cancel: function () {
					}
				});
				//分享到朋友
				wx.onMenuShareAppMessage({
					title: jsonTitle, // 分享标题
					desc: '', // 分享描述
					link: '', // 分享链接
					imgUrl: '<?php  echo $share_img;?>', // 分享图标
					type: '', // 分享类型,music、video或link，不填默认为link
					dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
					success: function () {
						// 用户确认分享后执行的回调函数
					},
					cancel: function () { 
						// 用户取消分享后执行的回调函数
					}
				});
			});
		}
	});
	
	<?php  } ?>
};
var pinHeight = document.body.scrollHeight;

var noredpackHeight =  jQuery('#noredpack').height();
var noredpackTop = (pinHeight - noredpackHeight) / 2;
jQuery('#noredpack').css({'top' : noredpackTop});

var alreadyHeight =  jQuery('#already').height();
var alreadyTop = (pinHeight - alreadyHeight) / 2;
jQuery('#already').css({'top' : alreadyTop});

var prizeHeight =  jQuery('#prize').height();
var prizeTop = (pinHeight - prizeHeight) / 2;
jQuery('#prize').css({'top' : prizeTop});

var prizeWidth = jQuery('#prize').width();
jQuery('.myPrizeImg').css({'width' : prizeWidth / 1.5 });


jQuery(document).ready(function(){

    $('.share').click(function () {
        $(this).hide();
    })
	var actStatus = <?php  echo $act_status;?>;
	if(actStatus != '3'){
		jQuery('.puzzle-mask').show();
	}
	<?php  if($is_subscribe && !$isGuanzhu) { ?>
	$('#guanzhu').show();
	<?php  } ?>
	
	jQuery('.btn-close').click(function(){
		jQuery('.attention').fadeOut(200);
		
	});
});
wx.ready(function () {
	wx.onMenuShareTimeline({
		title: '<?php  echo $myShareTitle;?>', // 分享标题
		link: '', // 分享链接
		imgUrl: '<?php  echo $share_img;?>', // 分享图标
		desc: '',
		success: function () {
			// 用户确认分享后执行的回调函数
		},
		cancel: function () {
			// 用户取消分享后执行的回调函数
		}
	});
	//分享到朋友
	wx.onMenuShareAppMessage({
		title: '<?php  echo $myShareTitle;?>', // 分享标题
		desc: '', // 分享描述
		link: '', // 分享链接
		imgUrl: '<?php  echo $share_img;?>', // 分享图标
		type: '', // 分享类型,music、video或link，不填默认为link
		dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
		success: function () {
			// 用户确认分享后执行的回调函数
		},
		cancel: function () { 
			// 用户取消分享后执行的回调函数
		}
	});
});


</script>

</html>