<?php defined('IN_IA') or exit('Access Denied');?><ul class="nav nav-tabs">
	<li <?php  if($_GPC['do']=="task") { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('task')?>">任务管理</a>
	</li>
	<li <?php  if($_GPC['do']=="v") { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('v')?>">认证管理</a>
	</li>
	<li <?php  if($_GPC['do']=="runner") { ?>class="active"<?php  } ?>>
		<a href="<?php  echo $this->createWebUrl('runner')?>">监控</a>
	</li>
</ul>