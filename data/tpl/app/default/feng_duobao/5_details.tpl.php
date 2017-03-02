<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta  charset="utf-8">
<meta  name="viewport"  content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>商品介绍</title>
<link  rel="stylesheet"  href="../addons/feng_duobao/template/css/css.css">
<script  src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript"></script>
</head>
<body  style="background:#f6f6f8;">
<section  class="top_bar"> 
	<a  href="javascript:history.back(-1);"   title="返回"  class="back"><i  class="b_arr"></i>返回</a>
	<a  href="<?php  echo $this->createMobileUrl('index')?>"  title="首页"  class="home">首页</a>
	<h2  id="oneNavTitle">商品详情</h2>
</section>
<section  class="wrap">
  <section  class="prize_detail"  id="info"> <dl  class="prize2">
      <dt  class="pri_img2"> <a  href="javascirpt:;"  title="(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?>"><img  src="<?php  echo $_W['attachurl'];?><?php  echo $goods['picarr'];?>"  alt="(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?>"></a></dt>
      <dd  class="pri_info2">
        <h3  class="pri_tit"> <a  href="<?php  echo $goods['content'];?>"  title="(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?>">(第<?php  echo $goods['periods'];?>期)<?php  echo $goods['title'];?></a></h3>
        <p  class="total">总需：<?php  echo $goods['zongrenshu'];?>份</p>
        <div  class="join_num">
          <div  class="bar">
            <div  style="width:<?php  echo $goods['scale'];?>%;"  class="bar_in"></div>
          </div>
          <span  class="att_num">已参与：<?php  echo $goods['canyurenshu'];?></span> <span  class="remain_num">剩余：<span  class="fc"><?php  echo $goods['shengyurenshu'];?></span>次</span> </div>
        <a  href="<?php  echo $this->createMobileUrl('exchange', array('id' => $goods['id']))?>"  title="兑换幸运码"  class="chk_btn"  style="display:">兑换幸运码</a> </dd>
</dl>
</section>
  <section  class="nav_bar"> <a  href="<?php  echo $this->createMobileUrl('mycodes', array('id' => $goods['id'],'periods' => $goods['periods'],'title' => $goods['title']))?>"  class="item"  id="mycode"> <strong  class="item_txt">我的幸运码</strong> </a> </section>
  <section  class="nav_bar"> <a  href="<?php  echo $goods['content'];?>"  class="item"  id="giftinfo"> <strong  class="item_txt">商品介绍</strong> </a> </section>
  <section  class="nav_bar"> <a  href="<?php  echo $this->createMobileUrl('period', array('id' => $goods['id'],'sid' => $goods['sid']))?>"  class="item"  id="wangqi"> <strong  class="item_txt">往期开奖</strong>  </a> </section>
  <section  class="white_box">
    <div  class="record_list"  id="gift">
      <h3>最近参与记录</h3>
     <span  class="ico_clock"></span>
    <div  class="date"><span  class="dot"></span></div>
      <ul>
        <?php  if(is_array($list)) { foreach($list as $gid => $lists) { ?>
        <li><span  class="dot"><i></i></span>
          <p><span  class="fc"><a  style="color:#ee433e;"  href=""><?php  echo $lists['nickname'];?></a></span> 参与了<span  class="fc"><?php  echo $lists['count'];?>次</span></p>
          <span  class="time"><?php  echo date('Y-m-d H:i:s',$lists['createtime'])?></span> 
        </li>
        <?php  } } ?> 
      </ul>
    </div>
<!--     <span  id="oneMore"  class="load_more"  style="">加载更多&gt;&gt;</span> -->
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