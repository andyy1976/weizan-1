<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template("common/header", TEMPLATE_INCLUDEPATH)) : (include template("common/header", TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<div class="panel panel-default">
		<div class="panel-heading">参数设置</div>
		<div class="panel-body">暂时用不到</div>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template("common/footer", TEMPLATE_INCLUDEPATH)) : (include template("common/footer", TEMPLATE_INCLUDEPATH));?>