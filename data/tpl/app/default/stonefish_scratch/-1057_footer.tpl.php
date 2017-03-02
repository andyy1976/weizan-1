<?php defined('IN_IA') or exit('Access Denied');?><!--底部菜单-->
<div style="height:50px;"></div>
<link href="./resource/css/font-awesome.min.css" rel="stylesheet">
<style>
.nav{font-family:"Microsoft YaHei UI", "微软雅黑", "宋体";}
a:focus {outline:none; -moz-outline:none}

.nav{padding-left:0;margin-bottom:0;list-style:none;font-size:12px;background-color:<?php  echo $template['navcolor'];?>}
.nav>li{position:relative;display:block}
.nav>li>a{position:relative;display:block;padding:10px 15px}
.nav>li>a:hover,.nav>li>a:focus{text-decoration:none;}
.nav>li.disabled>a{color:<?php  echo $template['navtextcolor'];?>}
.nav>li.disabled>a:hover,.nav>li.disabled>a:focus{color:<?php  echo $template['navtextcolor'];?>;text-decoration:none;cursor:not-allowed;background-color:transparent}

.nav-tabs.nav-justified{width:100%;border-bottom:0}
.nav-tabs.nav-justified>li{float:none}
.nav-tabs.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-tabs.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:300px){.nav-tabs.nav-justified>li{display:table-cell;width:1%}.nav-tabs.nav-justified>li>a{margin-bottom:0}}.nav-tabs.nav-justified>li>a{margin-right:0;border-radius:4px}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:hover,.nav-tabs.nav-justified>.active>a:focus{border:1px solid #ddd}@media (min-width:300px){.nav-tabs.nav-justified>li>a{border-bottom:1px solid #ddd;border-radius:4px 4px 0 0}.nav-tabs.nav-justified>.active>a,.nav-tabs.nav-justified>.active>a:hover,.nav-tabs.nav-justified>.active>a:focus{border-bottom-color:#fff}}.nav-pills>li{float:left}.nav-pills>li>a{border-radius:4px}.nav-pills>li+li{margin-left:2px}.nav-pills>li.active>a,.nav-pills>li.active>a:hover,.nav-pills>li.active>a:focus{color:#fff;background-color:#428bca}.nav-stacked>li{float:none}.nav-stacked>li+li{margin-top:2px;margin-left:0}.nav-justified{width:100%}.nav-justified>li{float:none}.nav-justified>li>a{margin-bottom:5px;text-align:center}.nav-justified>.dropdown .dropdown-menu{top:auto;left:auto}@media (min-width:300px){.nav-justified>li{display:table-cell;width:1%}.nav-justified>li>a{margin-bottom:0}}
.nav-bardown{position:fixed; bottom:0; left:0; height:3.7em; overflow:hidden; background:<?php  echo $template['navcolor'];?>; border-top:1px solid <?php  echo $template['navtextcolor'];?>; width:100%; display:-webkit-box; display:-moz-box; display:box; -webkit-box-orient:horizontal; -moz-box-orient:horizontal; box-orient:horizontal; -webkit-box-sizing:border-box; -moz-box-sizing:border-box; box-sizing:border-box;}
.nav-bardown > *{-webkit-box-flex:1; -moz-box-flex:1; box-flex:1;}
.nav-bardown li{position:relative;}
.nav-bardown li a{padding-top:.2em; text-align:center; color:<?php  echo $template['navtextcolor'];?>; text-decoration:none;}
.nav-bardown li a:hover{background-color:<?php  echo $template['navcolor'];?>;}
.nav-bardown i{display:block; font-size:2em; color:<?php  echo $template['navtextcolor'];?>;}
@-moz-document url-prefix(){.nav-bardown li{display:table-cell;width:1%;}}
.active span,.active i{color:<?php  echo $template['navactioncolor'];?>;}
</style>
<ul class="nav nav-bardown nav-justified" style="z-index:10;">
	<li><a href="<?php  echo $this->createMobileUrl('entry', array('rid' => $rid,'entrytype' => 'index'))?>" <?php  if($_GPC['do'] == 'index') { ?>class="active"<?php  } ?>><i class="fa fa-desktop"></i> <span>刮奖</span></a></li>
	<li><a href="<?php  echo $this->createMobileUrl('myaward', array('rid' => $rid))?>" <?php  if($_GPC['do'] == 'myaward') { ?>class="active"<?php  } ?>><i class="fa fa-gift"></i> <span>宝箱</span></a></li>
	<li><a href="<?php  echo $this->createMobileUrl('rule', array('rid' => $rid))?>" <?php  if($_GPC['do'] == 'rule') { ?>class="active"<?php  } ?>><i class="fa fa-volume-up"></i> <span>规则</span></a></li>
	<li><a href="<?php  echo $this->createMobileUrl('rank', array('rid' => $rid))?>" <?php  if($_GPC['do'] == 'rank') { ?>class="active"<?php  } ?>><i class="fa fa-trophy"></i> <span>排行</span></a></li>
</ul>
<!--底部菜单-->