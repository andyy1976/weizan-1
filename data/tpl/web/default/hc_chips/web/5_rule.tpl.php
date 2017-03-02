<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<form action="" id="form" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				规则管理
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">分享标题</label>
					<div class="col-sm-5">
						<input type="text" name="title" class="form-control" value="<?php  echo $rule['title'];?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">分享图片</label>
					<div class="col-sm-5">
						<?php  echo tpl_form_field_image('picture', $rule['picture']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">分享描述</label>
					<div class="col-sm-5">
						<input type="text" name="description" class="form-control" value="<?php  echo $rule['description'];?>"/>
					</div>
				</div>			
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">活动规则</label>
					<div class="col-sm-5">
						<textarea style="height:200px;" class="form-control" name="rule" id="rule"><?php  echo $rule['rule'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关注地址</label>
					<div class="col-sm-5">
						<input type="text" name="gzurl" class="form-control" value="<?php  echo $rule['gzurl'];?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">联系电话</label>
					<div class="col-sm-5">
						<input type="text" name="mobile" class="form-control" value="<?php  echo $rule['mobile'];?>"/>
					</div>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				<input type="hidden" name="id" value="<?php  echo $rule['id'];?>" />
				<input type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交" />
			</div>
		</div>
	</form>
</div>
<script text="text/javascript">
require(['jquery', 'util'], function($, u){
	$(function(){
		u.editor($('#rule')[0]);
	});
	$("#form").submit(function(){
		var reg = /^1[3458]\d{9}$/;
		if(!reg.test($(":text[name='mobile']").val())) {
			u.message('手机号码格式不正确', '', 'error');
			return false;
		}
		return true;
	});
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>