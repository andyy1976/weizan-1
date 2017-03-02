<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<form enctype="multipart/form-data" class="form-horizontal form" method="post" action="">
<div class="panel panel-success">
	<div class="panel-heading"><h4>参数设置<small>微WiFi无线热点系统</small></h4></div>
	<div class="panel-body">
		<div class="form-group">
				<label for="input" class="col-xs-12 col-sm-3 col-md-2 control-label">API ID</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" class="form-control" placeholder="" name="api_id" value="<?php  echo $settings['api_id'];?>">
				</div>
		</div>
		<div class="form-group">
				<label for="input" class="col-xs-12 col-sm-3 col-md-2 control-label">API KEY</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" class="form-control" placeholder="" name="api_key" value="<?php  echo $settings['api_key'];?>">
				</div>
		</div>
		<div class="form-group">
				<label for="input" class="col-xs-12 col-sm-3 col-md-2 control-label">Node ID</label>
				<div class="col-sm-9 col-xs-12">
					<input type="text" class="form-control" placeholder="" name="node" value="<?php  echo $settings['node'];?>">
				</div>
		</div>
		<div class="form-group">
			<div class="col-sm-12">
				<button type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交">提交</button>
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</div>
		</div>
	</div>
</div>
</form>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>