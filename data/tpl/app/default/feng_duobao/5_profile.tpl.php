<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta  charset="utf-8">
<meta  name="viewport"  content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>一元夺宝</title>
<?php  echo register_jssdk();?>
<link  rel="stylesheet"  href="../addons/feng_duobao/template/css/css.css">
<script  src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript"></script>
</head>
<body  style="background:#f6f6f8;">
<section  class="top_bar"> 
	<a  href="javascript:history.back(-1);"   title="返回"  class="back"><i  class="b_arr"></i>返回</a>
	<a  href="<?php  echo $this->createMobileUrl('index')?>"  title="首页"  class="home">首页</a>
	<h2  id="oneNavTitle">个人中心</h2>
</section>
<section  class="wrap">
  <section  class="white_box">
    <dl  class="user_info">
      <dt  class="user_head"><img  id="oneUserImg"  src="<?php  echo $people['avatar'];?>"  alt=""></dt>
      <dd  class="user_detail"> <strong  id="oneUserNick"  class="user_name mg_top"><?php  echo $people['nickname'];?></strong>
        <p  class="user_sum">余额：<strong  id="oneUserChances"  class="fc">￥<?php  echo $result['credit2'];?></strong></p>
      </dd>
    </dl>
  </section>
  <section  class="nav_bar">
   <a  id="oneChangeList"  href="<?php  echo $this->createMobileUrl('prodata')?>"  class="item"> <strong  class="item_txt">个人资料</strong></a>
  </section>
  <section  class="nav_bar">
    <a  id="onePayList"  href="<?php  echo $this->createMobileUrl('myorder')?>"  class="item"> <strong  class="item_txt">兑换记录</strong><!-- <span  class="rec_num">未揭晓</span> --></a>
  </section>
  <section  class="nav_bar">
    <a  id="oneAddrInfo"  href="<?php  echo $this->createMobileUrl('prize')?>"  class="item"> <strong  class="item_txt">获得的商品</strong></a>
  </section>
  <section  class="abs_bottom">
    <a  id="oneLogout"  href="<?php  echo $this->createMobileUrl('introduction')?>"  title="玩儿法介绍"  class="exit">玩儿法介绍</a>
  </section>
</section>

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