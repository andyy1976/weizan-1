<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
body{background:#282c2d;}
.rule{background:#fff; margin:10px 10px 50px 10px; padding:10px;}
.enter-game, .enter-game a{display:block; text-align:center;}
.enter-game{margin:0 auto; width:110px; height:110px; background:#666;}
.enter-game a{margin:0 auto; width:100px; height:100px; line-height:100px;}
</style>
<div class="rule img-rounded">
<?php  echo $reply['rule'];?>
</div>
<div class="enter-game img-circle">
	<a href="<?php  echo $this->createMobileUrl('detail', array('rid' => $rid))?>" class="btn-danger img-circle">进入游戏</a>
</div>
<?php  $footer_off = 1;?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>