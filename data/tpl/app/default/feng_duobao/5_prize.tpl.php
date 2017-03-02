<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta  charset="utf-8">
<meta  name="viewport"  content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>一云夺宝</title>
<?php  echo register_jssdk();?>
<link  rel="stylesheet"  href="../addons/feng_duobao/template/css/css.css">
<script  src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript"></script>
</head>
<body  style="background:#f6f6f8;">
<section  class="top_bar"> 
	<a  href="javascript:history.back(-1);"   title="返回"  class="back"><i  class="b_arr"></i>返回</a>
	<a  href="<?php  echo $this->createMobileUrl('index')?>"  title="首页"  class="home">首页</a>
	<h2  id="oneNavTitle">获得的商品</h2>
</section>
<section  id="oneGiftHistory"  class="wrap">
	<?php  if(is_array($myprize)) { foreach($myprize as $gid => $lists) { ?>
	<section  class="white_box">
		<h3  class="stg_time">(第<?php  echo $lists['periods'];?>期) <?php  echo $lists['title'];?></h3>
		<dl  class="user_info">
			<dt  class="user_head abs_top"></dt>
			<dd> 
				<div  class="winner_detail">
					<p>获奖者： <a  href="javascript:;"  class="fc"><?php  echo $lists['q_uid'];?> </a> </p>
					<p>幸运号码: <?php  echo $lists['q_user_code'];?> </p>
					<p>开奖时间: <?php  echo date('Y-m-d H:i:s',$lists['q_end_time'])?></p>
					<a id="oneRecharge" href="http://m.kuaidi100.com/index_all.html?type=<?php  echo $lists['express'];?>&postid=<?php  echo $lists['expressn'];?>&callbackurl=<?php  echo $url;?>" title="" class="rec_btnn"><?php  if(($lists['send_state']==1)) { ?>查看物流<?php  } else { ?>等待发货<?php  } ?></a>
				</div>
			</dd>
		</dl>
	</section>
	<?php  } } ?> 
</section>
<!-- <span  id="oneMore"  style=""  class="load_more">加载更多&gt;&gt;</span> -->
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