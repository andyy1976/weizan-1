<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('level');?>">等级头衔</a></li>
	<li><a href="<?php  echo $this->createWebUrl('sms');?>">短信中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('signin');?>">签到中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('message');?>">消息中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('feedback');?>">留言中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('task');?>">任务中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('member');?>">会员中心</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('template');?>">会员模板</a></li>
	<li><a href="<?php  echo $this->createWebUrl('fanslog');?>">粉丝统计</a></li>	
	<li><a href="<?php  echo $this->createWebUrl('memberlog');?>">会员统计</a></li>
</ul>
<!-- 会员模板 -->
<div class="clearfix">
<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data" id="form1">
	    <div class="alert alert-info">会员风格模板设置</div>
		<div class="panel panel-default">
		    <div class="panel-heading">
			    所有风格
		    </div>
			<div class="panel-body">
			<div class="row-fluid">
    			<div class="span8 control-group">
					下个版本提供
       		 </div>
    		</div>
    		</div>
	    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>