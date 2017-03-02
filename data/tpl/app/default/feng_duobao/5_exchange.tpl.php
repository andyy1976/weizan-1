<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta  charset="utf-8">
<meta  name="viewport"  content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>一元夺宝</title>
<link  rel="stylesheet"  href="../addons/feng_duobao/template/css/css.css">
<script   src="../addons/feng_duobao/template/js/jquery.js" type="text/javascript"></script>
<script  src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript"></script>
</head>
<body  style="background:#f6f6f8;">
<section  class="top_bar"> 
	<a  href="javascript:history.back(-1);"   title="返回"  class="back"><i  class="b_arr"></i>返回</a>
	<a  href="<?php  echo $this->createMobileUrl('index')?>"  title="首页"  class="home">首页</a>
	<h2  id="oneNavTitle">兑换幸运码</h2>
</section>
<section  class="wrap">
	<form id="form1" action="javascript:;" method="post">
	<section  class="white_box">
		<dl  class="order">
			<dt  class="pri_img1"> 
				<a  id="oneGiftLink"  title="(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?>"><img  id="oneGiftImg"  src="<?php  echo $_W['attachurl'];?><?php  echo $goods['picarr'];?>"  alt="(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?>"></a>
			</dt>
			<dd  class="pri_info1">
				<h3  class="pri_tit"> 
					<a  id="oneGiftName"  title="(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?>">(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?></a>
				</h3>
				<p>总需：<span  id="oneGiftNeed"><?php  echo $goods['zongrenshu'];?></span>份，剩余：<span  id="oneGiftLeft"  class="fc" value="<?php  echo $goods['shengyurenshu'];?>"><?php  echo $goods['shengyurenshu'];?></span>份</p>
				<div  id="oneChangeOpt"  class="rec_box"  style=""> 兑换
					<div  class="item_amount ">
						<input  id="oneChangeNum"  type="text"  class="ip_num"  value="1">
						<textarea id="experience" name="experience" style="display: none;"><?php  echo $goods['shengyurenshu'];?></textarea>
					</div> 
					<span  class="rec_txt">个幸运码</span>
				</div>
			</dd>
		</dl>
	</section>
	</form>
	<section  id="oneDoWrap"  class="abs_bottom"  style="">
		<div  class="submit">
			<p>每个幸运码需<span  id="oneDoChangeNum"  class="fc">1</span>元</p>
			<a  id="oneDoChange"  href="javascript:submit();"  title="提交"  class="smt_btn">提交订单</a>
		</div>
	</section>
</section>
<script type="text/javascript">
	function submit(){	    
    	var form_input = document.getElementById("form1");
    	var shengyurenshu=form_input['experience'].value;
    	var ip_num=form_input['oneChangeNum'].value;

		if (ip_num>Number(shengyurenshu)) {
			alert('兑换数量超过剩余数量！');
			return false;
		}

		if (ip_num<1) {
			alert('请输入不小于1的整数！');
			return false;
		}
		var url="./index.php?i="+<?php  echo $uniacid?>+"&c=entry&id="+<?php  echo $goods['id']?>+"&count="+ip_num+"&do=postorder&m=feng_duobao&wxref=mp.weixin.qq.com#wechat_redirect";
		window.location.href=url;
	}
</script>
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