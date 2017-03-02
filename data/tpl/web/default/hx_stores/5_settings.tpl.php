<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
.field label{float:left;margin:0 !important; width:140px;}
</style>
<div class="main">
	<div class="panel panel-info">
		<div class="panel-heading">参数配置</div>
		<div class="panel-body">
			<form action="" method="post" class="form-horizontal" role="form" id="form1">
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-2 control-label">百度地图AK</label>
				<div class="col-sm-8">
					<input class="form-control" name="ak" id="" type="text" value="<?php  echo $settings['ak'];?>">&nbsp;&nbsp;<a href="http://lbsyun.baidu.com/apiconsole/key" target="_blank">点击进入申请地址</a>
				</div>	
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-2 control-label">LBS查询范围</label>
				<div class="col-sm-8">
					<input class="form-control" name="range" id="" type="text" value="<?php  echo $settings['range'];?>">&nbsp;&nbsp;设置用户在发送位置信息时，回复此设置项方圆范围内的商家。默认为<span style="color:red">&nbsp;5&nbsp;</span>公里以内的商家。
				</div>	
			</div>
			<div class="form-group">
				<div class="col-sm-8">
					<input type="submit" name="submit" value="提交" class="btn btn-primary">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</div>		
			</div>
			</form>
		</div>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>