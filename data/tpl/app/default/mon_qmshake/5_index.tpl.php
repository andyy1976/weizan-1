<?php defined('IN_IA') or exit('Access Denied');?><html><head>
    <title><?php  echo $shake['title'];?></title>
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no" name="format-detection">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0">
    <link rel="stylesheet" href="<?php echo MON_QMSHAKE_RES;?>css/mobile.common.css">
</head>
<body>
<div id="loader">
    <style>
        html{
            width: 100%;
        }
        body{
            position: relative;
            background: #ff4223;
        }
        #wrap{
            width: 100%;
        }
        #wrap img{
            width: 100%;
            vertical-align: bottom;
        }
        #btn_shaken{
            text-align: center;
            width: 100%;
            margin-top:  -128%;
        }
        .buttonDefault{
            /*background: url("http://static.17shihui.cn/pageapp/images/slot_welfare/btn_bg.jpg?static_version=1433241780554") 0 0 no-repeat;*/
            height: 2.75em;
            background-size: 100%;
            -moz-background-size: 100%;
            -webkit-background-size: 100%;
            border:none;
            border-radius: 0.3em;
            -moz-border-radius: 0.3em;
            -webkit-border-radius: 0.3em;
            display: block;
            width: 100%;
            color: #c46f00;
        }
        .buttonDefault.active{
            background:#ffc63b !important;
        }
        a.buttonDefault{
            height: 13em;
            text-align: center;
        }
        #btn_shaken .buttonDefault{
            width: 55%;
            margin: 0 auto;
            display: inline-block;
        }
    </style>
    <div id="wrap">
        <img src="<?php  echo MonUtil::defaultImg(MonUtil::$IMG_INDEX_BG,$shake)?>">
        <!--<img src="<?php echo MON_QMSHAKE_RES;?>images/welfare_default_02.jpg">-->
        <!--<img src="<?php echo MON_QMSHAKE_RES;?>images/welfare_default_03.jpg">-->
        <!--<img src="<?php echo MON_QMSHAKE_RES;?>images/welfare_default_04.jpg">-->
        <!--<img src="<?php echo MON_QMSHAKE_RES;?>images/welfare_default_05.jpg">-->
        <!--<img src="<?php echo MON_QMSHAKE_RES;?>images/welfare_default_06.jpg">-->
        <!--<img src="<?php echo MON_QMSHAKE_RES;?>images/welfare_default_07.jpg">-->
        <!--<img src="<?php echo MON_QMSHAKE_RES;?>images/welfare_default_08.jpg">-->
        <!--<img src="<?php echo MON_QMSHAKE_RES;?>images/welfare_default_09.jpg">-->
        <!--<img src="<?php echo MON_QMSHAKE_RES;?>images/welfare_default_10.jpg">-->
        <!--<img src="<?php echo MON_QMSHAKE_RES;?>images/welfare_default_11.jpg">-->
        <!--<img src="<?php echo MON_QMSHAKE_RES;?>images/welfare_default_12.jpg">-->
    </div>
    <div id="btn_shaken">
        <a class="buttonDefault btn "></a>
    </div>
</div>
<script src="<?php echo MON_QMSHAKE_RES;?>js/zepto.min.js"></script>

<script>
    $("#btn_shaken").click(function(){
        window.location = "<?php  echo $this->createMobileUrl('shake',array('sid'=>$shake['id'],'from'=>$from,'oid'=>$oid),true)?>";
    });

</script>

<?php  echo register_jssdk(false);?>
<script type="text/javascript">



    wx.ready(function () {
        sharedata = {
            title: "<?php  echo $shake['share_title'];?>",
            desc: "<?php  echo $shake['share_content'];?>",
            link: "<?php  if($shake['share_url']) { ?><?php  echo $shake['share_url'];?><?php  } else { ?><?php  echo MonUtil::str_murl($this->createMobileUrl('Index',array('sid'=>$shake['id'],'from'=>$from,'oid'=>$oid),true))?><?php  } ?>",
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


</body></html>