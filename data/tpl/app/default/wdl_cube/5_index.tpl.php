<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
  <title>变态方块游戏</title>
  <link rel="stylesheet" href="../addons/wdl_cube/template/mobile/tetris.css"/>
</head>
<body>
<div class="container">
  <div class="main">
    <div class="main-game">
      <div class="main-panel"><canvas></canvas></div>
      <div class="main-info">
        <div class="wrap">
          <div class="main-info-shape main-info-shape0"></div>
          <div class="main-info-grade">
            <p class="main-info-score"></p>
            <p class="main-info-level"></p>
          </div>
        </div>
      </div>
    </div>
    <div class="main-direction">
      <div class="wrap">
        <button class="up" type="button" data-role="up">变</button>
        <button class="left" type="button" data-role="left">左</button>
        <button class="right" type="button" data-role="right">右</button>
        <!--<button class="down" type="button" data-role="down" style="left: 60px">下</button>-->
      </div>
    </div>
    <!--<div class="main-adv"><a href="#"><img src="jp.jpg"/></a></div>-->
  </div>
  <div class="curtain">
    <div class="curtain-start">
      <div class="curtain-header">
        <p>变态方块</p>
        <p>你的童年会被虐惨</p>
      </div>
      <div class="curtain-buttons">
        <button type="button" data-role="start">开始受虐</button>
      </div>
    </div>
    <div class="curtain-end" style="display: none;">
      <div class="curtain-header"></div>
      <div class="curtain-buttons">
        <div class="wrap">
          <button class="retry" type="button" data-role="start">重试</button>
          <a class="score" href="#">换奖品</a>
          <button class="share" type="button" data-role="share">右上角分享</button>
        </div>
      </div>
    </div>
    <div class="curtain-info"></div>
  </div>
</div>
<script src="../addons/wdl_cube/template/mobile/tetris.min.js"></script>
<!-- http://v2.addons.012wz.com/web/index.php?c=store&a=author&uid=91001 Baidu tongji analytics -->
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F048fdec886cd53f8bb62cee837c505c2' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>
