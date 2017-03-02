<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('chip',array('op'=>'post'));?>">添加卡券</a></li>
	<li><a href="<?php  echo $this->createWebUrl('chip');?>">卡券管理</a></li>
</ul>
<div class="main">
	<form action="" id="form" method="post" class="form-horizontal form" enctype="multipart/form-data">
		<div class="panel panel-default">
			<div class="panel-heading">
				添加卡券
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">排序</label>
					<div class="col-sm-5">
						<input type="text" name="listorder" class="form-control" value="<?php  echo $chip['listorder'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">标题</label>
					<div class="col-sm-5">
						<input type="text" name="title" class="form-control" value="<?php  echo $chip['title'];?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">图片</label>
					<div class="col-sm-5">
						<?php  echo tpl_form_field_image('picture', $chip['picture']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">图片链接</label>
					<div class="col-sm-5">
						<input type="text" name="url" class="form-control" value="<?php  echo $chip['url'];?>" placeholder="默认空"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">简介</label>
					<div class="col-sm-5">
						<input type="text" name="description" class="form-control" value="<?php  echo $chip['description'];?>"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">详情</label>
					<div class="col-sm-5">
						<textarea style="height:200px;" class="form-control" name="detail" id="detail"><?php  echo $chip['detail'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">规则</label>
					<div class="col-sm-5">
						<textarea style="height:200px;" class="form-control" name="rule" id="rule"><?php  echo $chip['rule'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">类型</label>
					<div class="col-sm-5">
						<label class="radio-inline">
							<input type="radio" name="type" value="0" <?php  if($chip['type'] == 0) { ?>checked="true"<?php  } ?>>众筹券
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">奖品价值</label>
					<div class="col-sm-5">
						<input type="text" name="price" class="form-control" value="<?php  echo $chip['price'];?>" placeholder="默认0"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">众筹值</label>
					<div class="col-sm-5">
						<input type="text" name="chipmoney" class="form-control" value="<?php  echo $chip['chipmoney'];?>" placeholder="默认客户随意输入"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">活动时间</label>
					<div class="col-sm-5">
						<?php  echo tpl_form_field_daterange('datelimit', array('starttime'=>date('Y-m-d h:i:s', $chip['starttime']),'endtime'=>date('Y-m-d h:i:s', $chip['endtime'])))?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">浏览量</label>
					<div class="col-sm-5">
						<input type="text" name="view" class="form-control" value="<?php  echo $chip['view'];?>" placeholder="默认0"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">分享量</label>
					<div class="col-sm-5">
						<input type="text" name="share" class="form-control" value="<?php  echo $chip['share'];?>" placeholder="默认0"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">是否显示</label>
					<div class="col-sm-5">
						<label class="radio-inline">
							<input type="radio" name="isopen" value="1" <?php  if($chip['isopen'] == 1) { ?>checked="true"<?php  } ?>>显示
						</label>
						<label class="radio-inline">
							<input type="radio" name="isopen" value="0" <?php  if($chip['isopen'] == 0) { ?>checked="true"<?php  } ?>>不显示
						</label>
					</div>
				</div>
				<?php  if(!empty($chip['createtime'])) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">添加时间</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" value="<?php  echo date('Y-m-d h:i:s', $chip['createtime'])?>" readonly />
					</div>
				</div>
				<?php  } ?>
			</div>
			<div class="form-group col-sm-12">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				<input type="hidden" name="id" value="<?php  echo $chip['id'];?>" />
				<input type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交" />
			</div>
		</div>
	</form>
</div>
<script text="text/javascript">
require(['jquery', 'util'], function($, u){
	$(function(){
		u.editor($('#detail')[0]);
		u.editor($('#rule')[0]);
	});
	$("#form").submit(function(){
		if($(":text[name='title']").val() == '') {
			u.message('请填写标题！', '', 'error');
			return false;
		}
		if($(":text[name='picture']").val() == '') {
			u.message('请上传图片！', '', 'error');
			return false;
		}
		if($(":text[name='description']").val() == '') {
			u.message('请填写简介！', '', 'error');
			return false;
		}
		if($(":text[name='price']").val() != '' && isNaN($(":text[name='price']").val())) {
			u.message('请填写合法奖品价值！', '', 'error');
			return false;
		}
		if($(":text[name='chipmoney']").val() != '' && isNaN($(":text[name='chipmoney']").val())) {
			u.message('请填写合法众筹值！', '', 'error');
			return false;
		}
		if($(":text[name='view']").val() != '' && isNaN($(":text[name='view']").val())) {
			u.message('请填写合法浏览量！', '', 'error');
			return false;
		}
		if($(":text[name='share']").val() != '' && isNaN($(":text[name='share']").val())) {
			u.message('请填写合法分享量！', '', 'error');
			return false;
		}
		return true;
	});
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>