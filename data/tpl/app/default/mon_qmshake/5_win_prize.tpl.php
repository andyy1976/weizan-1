<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE html>
<html>
<head>
    <title>中奖了耶</title>
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no" name="format-detection">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo MON_QMSHAKE_RES;?>/css/mobile.common.css">
    <link rel="stylesheet" type="text/css" href="<?php echo MON_QMSHAKE_RES;?>/css/common.css">
    <link rel="stylesheet" type="text/css" href="<?php echo MON_QMSHAKE_RES;?>/css/win_prize.css?v=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo MON_QMSHAKE_RES;?>/css/mobile.alert.css">
    <script src="<?php echo MON_QMSHAKE_RES;?>/js/img_square.js"></script>

    <style>
        body{
            background: rgb(238, 51, 32) url("<?php  echo MonUtil::defaultImg(MonUtil::$IMG_SHAKE_BG,$shake)?>") no-repeat;
            background-size: 100% 100%;
        }
        .win_prize_img{
            background: #F2F2F2;
            height: 280px;
            text-align: center;
        }

        .win_prize_img img{
            height: 150px;width:220px; margin: 25px auto;
            border: 1px solid #FF0000;
        }

        .win_prize_img h1 {
            color: #ff0000;
        }
    </style>
</head>
<body>
<div id="win_prize" >
    <div class="win_prize_img">
        <h1 style="padding-top: 10px">恭喜您中奖啦!</h1>
        <img id="productImg" src="<?php echo MON_QMSHAKE_RES;?>/images/zanwei.png" >

        <h3 style="padding-top: 10px"><span id="good_info"></span></h3>
    </div>
    <div id="form_wrap">

        <p class="phone_tip">  <?php  if($bind ==0) { ?>请填写您的领取信息，信息务必真实有效<?php  } else { ?>以下为您的兑奖信息<?php  } ?></p>
        <div class="input">
            <input id="uname" type="text" class="btn" placeholder="请输入您的姓名" value="<?php  echo $user['uname'];?>"/>
        </div>
        <p class="phone_tip"></p>
        <div class="input">
            <input id="phone_num" type="tel" class="btn" placeholder="请输入您的手机号" value="<?php  echo $user['tel'];?>"/>
        </div>

        <?php  if($shake['udefine']) { ?>
        <p class="phone_tip"></p>
        <div class="input">
            <input  type="text" id="udefine" class="btn"  placeholder="请输入您的<?php  echo $shake['udefine'];?>" value="<?php  echo $user['udefine'];?>"/>
        </div>
        <?php  } ?>
        <p class="phone_tip">  <?php  if($bind ==0) { ?><?php  echo $shake['lj_tip'];?><?php  } ?></p>
        <?php  if($bind ==0) { ?>
            <button id="submit"  class="buttonDefault btn">提交</button>
        <?php  } ?>
        <button id="back"  class="buttonDefault btn ">返回继续摇</button>
    </div>
</div>

<script src="<?php echo MON_QMSHAKE_RES;?>/js/zepto.min.js"></script>
<script src="<?php echo MON_QMSHAKE_RES;?>/js/mobile.alert.js"></script>
<script src="<?php echo MON_QMSHAKE_RES;?>/js/win_prize.js?v=1.5"></script>
<script>
    $(function() {
        $("#back").click(function(){
            var uname = $("#uname").val();
            var tel = $("#phone_num").val();
            if (uname == "" || tel =="") {
                alert("请填写你的中奖信息后，再玩哦！");
                return ;
            }
            window.top.location.href = "<?php  echo MonUtil::str_murl($this->createMobileUrl('shake',array('sid'=>$shake['id'],'from'=>$from,'oid'=>$oid),true))?>";
        });

        $("#submit").click(function (){
             var uname = $("#uname").val();
            var tel = $("#phone_num").val();

            if (uname =="") {
                alert("请输入你的姓名");
                return ;
            }

            if (tel =="") {
                alert("请输入您的手机号码");
                return ;
            }
            var udefine = "";
            <?php  if($shake['udefine']) { ?>
                 udefine = $("#udefine").val();
                if (udefine == "") {
                    alert("请输入<?php  echo $shake['udefine'];?>");
                    return ;
                }
            <?php  } ?>

            if(!verify_mobile(tel)) {
                alert("请输入正确的手机号码格式");
                return ;
            }

            $.post("<?php  echo MonUtil::str_murl($this->createMobileUrl('BindUser',array('uid'=>$user['id']),true))?>",{"tel":tel,"uname":uname, "udefine":udefine},function(res){
                if (res.code == 200) {
                    alert("提交用户信息成功!");
                } else {
                    alert(res.msg);
                }

            },'json');


        });

    }) ;


    function verify_mobile(tel) {
        if (tel.match(/^0{0,1}(13[0-9]|14[0-9]|15[0-9]|18[0-9]|17[0-9])[0-9]{8}$/)) {
            return true;
        }
        else {
            return false;
        }
    }


</script>


<?php  echo register_jssdk(false);?>
<script type="text/javascript">

    wx.ready(function () {
        sharedata = {
            title: "<?php  echo $shake['share_title'];?>",
            desc: "<?php  echo $shake['share_content'];?>",
            link: " <?php  if($shake['share_url']) { ?><?php  echo $shake['share_url'];?><?php  } else { ?><?php  echo MonUtil::str_murl($this->createMobileUrl('Index',array('sid'=>$shake['id']),true))?><?php  } ?>",
            imgUrl: "<?php  echo $_W['attachurl'];?><?php  echo $shake['share_icon'];?>",
            success: function(){

            },
            cancel: function(){

            }
        };
        wx.onMenuShareAppMessage(sharedata);
        wx.onMenuShareTimeline(sharedata);
    });


</script>

</body>
</html>