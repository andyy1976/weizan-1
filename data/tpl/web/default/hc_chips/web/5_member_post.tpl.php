<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('member',array('op'=>'post'));?>">添加粉丝</a></li>
	<li><a href="<?php  echo $this->createWebUrl('member');?>">粉丝管理</a></li>
</ul>
<div class="main">
	<form action="" id="form" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				添加粉丝
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">姓名</label>
					<div class="col-sm-5">
						<input type="text" name="realname" class="form-control" value="<?php  echo base64_decode($member['realname'])?>"/>
					</div>
				</div>
				<?php  if(empty($member['openid'])) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">头像</label>
					<div class="col-sm-5">
						<?php  echo tpl_form_field_image('headimgurl', $member['headimgurl']);?>
					</div>
				</div>
				<?php  } else { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">头像</label>
					<div class="col-sm-5">
						<img src="<?php  echo $member['headimgurl'];?>" width="100px">
					</div>
				</div>
				<?php  } ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">电话</label>
					<div class="col-sm-5">
						<input type="text" name="mobile" class="form-control" value="<?php  echo $member['mobile'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">状态</label>
					<div class="col-sm-5">
						<label class="radio-inline">
							<input type="radio" name="status" value="1" <?php  if($member['status'] == 1) { ?>checked="true"<?php  } ?>>可用
						</label>
						<label class="radio-inline">
							<input type="radio" name="status" value="0" <?php  if($member['status'] == 0) { ?>checked="true"<?php  } ?>>禁止
						</label>
					</div>
				</div>
				<?php  if(intval($member['id'])) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">添加方式</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" value="<?php  if(empty($member['openid'])) { ?>后台添加<?php  } else { ?>手机添加<?php  } ?>" readonly />
						<input type="hidden" name="openid" class="form-control" value="<?php  echo $member['openid'];?>" />
					</div>
				</div>
				<?php  } ?>
			</div>
			<div class="form-group col-sm-12">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				<input type="hidden" name="id" value="<?php  echo $member['id'];?>" />
				<input type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交" />
			</div>
		</div>
	</form>
</div>
<script text="text/javascript">
require(['jquery', 'util'], function($, u){
	$("#form").submit(function(){
		var reg = /^1[3458]\d{9}$/;
		if($(":text[name='realname']").val() == '') {
			u.message('请填写名字！', '', 'error');
			return false;
		}
		if($(":text[name='headimgurl']").val() == '') {
			u.message('请上传头像！', '', 'error');
			return false;
		}
		if(!reg.test($(":text[name='mobile']").val())) {
			u.message('手机号码格式不正确', '', 'error');
			return false;
		}
		return true;
	});
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>