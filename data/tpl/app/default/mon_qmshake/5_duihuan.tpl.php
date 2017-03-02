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
    <link rel="stylesheet" type="text/css" href="<?php echo MON_QMSHAKE_RES;?>/css/win_prize.css">
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
        <h1 style="padding-top: 10px">兑奖!</h1>
        <img id="productImg" src="<?php  echo MonUtil::getpicurl($prize['pimg'])?>" >

        <h3 style="padding-top: 10px"><span id="good_info"><?php  echo $prize['pname'];?> 价值<?php  echo $prize['price'];?></span></h3>
    </div>
    <div id="form_wrap">

        <p class="phone_tip"></p>
        <div class="input">
            <input id="dpassword" type="password" class="btn" placeholder="请输入商家兑奖密码" />
        </div>

            <button id="submit"  class="buttonDefault btn">提交</button>

        <button id="back"  class="buttonDefault btn ">返回继续摇</button>
    </div>
</div>

<script src="<?php echo MON_QMSHAKE_RES;?>/js/zepto.min.js"></script>
<script src="<?php echo MON_QMSHAKE_RES;?>/js/mobile.alert.js"></script>

<script>
    $(function() {

        $("#back").click(function(){
            window.top.location.href = "<?php  echo MonUtil::str_murl($this->createMobileUrl('shake',array('sid'=>$shake['id'],'from'=>$from,'oid'=>$oid),true))?>";
        });

        $("#submit").click(function (){
             var dpassword = $("#dpassword").val();

            if (dpassword =="") {
                alert("请输入兑换密码");
                return ;
            }


            $.post("<?php  echo MonUtil::str_murl($this->createMobileUrl('AjaxDuijiang',array('rid'=>$record['id']),true))?>",{"dpassword":dpassword},function(res){
                if (res.code == 200) {
                    alert("兑奖成功!");
                } else {
                    alert(res.msg);
                }

            },'json');


        });

    }) ;

</script>

<?php  echo register_jssdk(false);?>
<script type="text/javascript">

    wx.ready(function () {
        sharedata = {
            title: "<?php  echo $shake['share_title'];?>",
            desc: "<?php  echo $shake['share_content'];?>",
            link: "<?php  if($shake['share_url']) { ?><?php  echo $shake['share_url'];?><?php  } else { ?><?php  echo MonUtil::str_murl($this->createMobileUrl('Index',array('sid'=>$shake['id']),true))?><?php  } ?>",
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