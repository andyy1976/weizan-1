<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>一元夺宝</title>
<?php  echo register_jssdk();?>
<link rel="stylesheet" href="../addons/feng_duobao/template/css/css.css">
<script  src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript"></script>
</head>
<body style="background:#ffffff;">
<section class="top_bar"> 
	<a href="javascript:;" onclick="window.history.back();" title="返回" class="back"><i class="b_arr"></i>返回</a>
	<a href="<?php  echo $this->createMobileUrl('index')?>" title="首页" class="home">首页</a>
	<h2 id="oneNavTitle">兑换记录</h2>
</section>
<section class="wrap">
  <section class="exc_record">
	<div id="oneUserChangelist" class="prize_list">
		<?php  if(is_array($p_record)) { foreach($p_record as $goodsid => $goods) { ?>
		<dl class="prize">
			<dt class="pri_img"> 
				<a href="<?php  echo $this->createMobileUrl('details', array('id' => $goods['id']))?>" title="(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?>"><img src="<?php  echo $_W['attachurl'];?><?php  echo $goods['picarr'];?>" alt="(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?>"></a>
			</dt>
			<dd class="pri_info">
				<h3 class="pri_tit"> <a href="<?php  echo $this->createMobileUrl('details', array('id' => $goods['id']))?>" title="(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?>">(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?></a></h3>
				<p>总需：<?php  echo $goods['zongrenshu'];?>份</p>
				<?php  if($goods['q_uid'] == '') { ?>
				<p>获得者：<a href=" " title=""><span class="fc">待揭晓</span></a></p>
				<p>幸运号码：<span class="fc">待揭晓</span></p>
				<p>揭晓时间：待揭晓</p>
				<?php  } else { ?>
				<p>获得者：<a href=" " title=""><span class="fc"><?php  echo $goods['q_uid'];?></span></a></p>
				<p>幸运号码：<span class="fc"><?php  echo $goods['q_user_code'];?></span></p>
				<p>揭晓时间：<?php  echo date('Y-m-d H:i:s',$goods['q_end_time'])?></p>
				<?php  } ?>
				<p>中奖率：<?php  echo round($goods['allcount']/$goods['zongrenshu'] ,4)*100?>%</p>
				<p>本期参与：<?php  echo $goods['allcount'];?>人次</p>
				<a href="<?php  echo $this->createMobileUrl('mycodes', array('id' => $goods['id'],'periods' => $goods['periods'],'title' => $goods['title']))?>" title="查看我的幸运码" class="chk_link">我的幸运码</a>
			</dd>
		</dl>
		<?php  } } ?>	
		</div>
  </section>
</section>
<!-- <span id="oneMore" style="display: block;" class="load_more">加载更多&gt;&gt;</span> -->
</body>
<script type="text/javascript">
wx.ready(function () {
	var shareData = {
		title: "<?php  echo $share_data['share_title'];?>",
		desc: "<?php  echo $share_data['share_desc'];?>",
		link: "<?php  echo $to_url;?>",
		imgUrl: "<?php  echo $_W['attachurl'];?><?php  echo $share_data['share_image'];?>",
	};
//分享朋友
	wx.onMenuShareAppMessage({
	    title: shareData.title,
	  	desc: shareData.desc,
	  	link: shareData.link,
	  	imgUrl:shareData.imgUrl,
	  	trigger: function (res) {
	  	},
	  	success: function (res) {
	    	window.location.href =adurl;
	  	},
	  	cancel: function (res) {
	  	},
	  	fail: function (res) {
	    	alert(JSON.stringify(res));
	  	}
	});
	//朋友圈
	wx.onMenuShareTimeline({
	  	title: shareData.title+"---"+shareData.desc,
	  	link: shareData.link,
	  	imgUrl:shareData.imgUrl,
	  	trigger: function (res) {
	  	},
	  	success: function (res) {
	    	window.location.href =adurl;
	  	},
	  	cancel: function (res) {
	  	},
	  	fail: function (res) {
	    	alert(JSON.stringify(res));
	  	}
	});   

});
</script>
</html>