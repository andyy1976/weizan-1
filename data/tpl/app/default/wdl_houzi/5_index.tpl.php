<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <title></title>

    <style type="text/css">
        body, div, canvas
        {
            image-rendering: optimizeSpeed;
            -webkit-image-rendering: optimizeSpeed;
            -webkit-interpolation-mode: nearest-neighbor;
        }

        body{padding:0; margin:0;font-size:12px;background-color:#000;}
        body, html{height: 100%;}
        #outer{height:100%; overflow:hidden; position:relative; width:100%;}
        #outer[id]{display:table; position:static;}
        #middle{position:absolute; top:50%;} /* for ie only*/
        #middle[id]{display:table-cell; vertical-align:middle; position:static;}
    </style>

    <script type="text/javascript" src="../addons/wdl_houzi/template/mobile/js/quark.base-1.0.0.alpha.min.js"></script>
    <script type="text/javascript" src="../addons/wdl_houzi/template/mobile/js/jquery.js"></script>
    <script type="text/javascript" src="../addons/wdl_houzi/template/mobile/js/jquery.jplayer.min.js"></script>
   <!-- <script type="text/javascript" src="../addons/wdl_houzi/template/mobile/src/Audio.js"></script> -->
    <script type="text/javascript" src="../addons/wdl_houzi/template/mobile/src/Orientation.js"></script>
    <script type="text/javascript" src="../addons/wdl_houzi/template/mobile/src/Button.js"></script>
    <script type="text/javascript" src="../addons/wdl_houzi/template/mobile/src/main.js"></script>
    <script type="text/javascript" src="../addons/wdl_houzi/template/mobile/src/Peach.js"></script>
    <script type="text/javascript" src="../addons/wdl_houzi/template/mobile/src/Monkey.js"></script>
    <script type="text/javascript" src="../addons/wdl_houzi/template/mobile/src/Num.js"></script>

</head>

<body>

<div id="outer">
    <div id="middle">
        <div id="container" style="position:relative;top:-50%;width:100%;height:100%;margin:0 auto;">
        </div>
    </div>
</div>

<audio src="../addons/wdl_houzi/template/mobile/images/a.mp3" preload="auto" loop="true"></audio>


<script>
    var imgUrl = "http://v2.addons.012wz.com/web/index.php?c=store&a=author&uid=91001";
    var lineLink = "http://v2.addons.012wz.com/web/index.php?c=store&a=author&uid=91001";
    var descContent = '微信抢桃';
    var shareTitle = '微信抢桃微信抢桃';
    var appid = '';

    function shareFriend() {
        WeixinJSBridge.invoke('sendAppMessage',{
            "appid": appid,
            "img_url": imgUrl,
            "img_width": "200",
            "img_height": "200",
            "link": lineLink,
            "desc": descContent,
            "title": shareTitle
        }, function(res) {
            //_report('send_msg', res.err_msg);
        })
    }
    function shareTimeline() {
        WeixinJSBridge.invoke('shareTimeline',{
            "img_url": imgUrl,
            "img_width": "200",
            "img_height": "200",
            "link": lineLink,
            "desc": descContent,
            "title": shareTitle
        }, function(res) {
            //_report('timeline', res.err_msg);
        });
    }
    function shareWeibo() {
        WeixinJSBridge.invoke('shareWeibo',{
            "content": descContent,
            "url": lineLink,
        }, function(res) {
            //_report('weibo', res.err_msg);
        });
    }
    // 当微信内置浏览器完成内部初始化后会触发WeixinJSBridgeReady事件。
    document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
        // 发送给好友
        WeixinJSBridge.on('menu:share:appmessage', function(argv){
            shareFriend();
        });
        // 分享到朋友圈
        WeixinJSBridge.on('menu:share:timeline', function(argv){
            shareTimeline();
        });
        // 分享到微博
        WeixinJSBridge.on('menu:share:weibo', function(argv){
            shareWeibo();
        });
    }, false);

   /*
    $("#jquery_jplayer_1").jPlayer({
        ready: function () {
            $(this).jPlayer("setMedia", {
                mp3: "../addons/wdl_houzi/template/mobile/images/a.mp3"
            }).jPlayer("play");
        },
        swfPath: "js",
        supplied: "mp3",
        loop:"true"
    });
    */
</script>
<!-- http://v2.addons.012wz.com/web/index.php?c=store&a=author&uid=91001 Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F048fdec886cd53f8bb62cee837c505c2' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>
