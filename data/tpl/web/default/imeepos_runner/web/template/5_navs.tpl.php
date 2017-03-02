<?php defined('IN_IA') or exit('Access Denied');?><ul class="nav nav-tabs">
	<li <?php  if($_GPC['do']=="setting" || empty($_GPC['do'])) { ?>class="active"<?php  } ?>>
		<a href="./index.php?c=profile&a=module&do=setting&m=imeepos_runner">模板管理</a>
	</li>
	<li <?php  if($_GPC['do']=="divider_set") { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('divider_set')?>">帮我送设置</a>
	</li>
	<li <?php  if($_GPC['do']=="buy_set") { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('buy_set')?>">帮我买设置</a>
	</li>
	<li <?php  if($_GPC['do']=="v_set") { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('v_set')?>">跑腿设置</a>
	</li>
	<li <?php  if($_GPC['do']=="card_set") { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('card_set')?>">身份证核实接口</a>
	</li>
	
	<li <?php  if($_GPC['do']=="sms_set") { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('sms_set')?>">阿里大鱼短信接口</a>
	</li>
</ul>