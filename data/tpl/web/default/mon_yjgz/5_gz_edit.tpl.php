<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>





<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('GZ');?>">关注管理</a></li>
	<li class="active"> <a href="<?php  echo $this->createWebUrl('GZedit');?>">添加关注</a></li>

</ul>

<div class="main">
	<form action="" method="post" class="form-horizontal form"
		  enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php  echo $gz['id'];?>" />

		<div class="panel panel-default">
	<div class="panel-heading">
		关注管理
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>名称：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="title" class="form-control span7"
					   placeholder="" name="title" value="<?php  echo $gz['title'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>标题背景图：</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('banner_pic',$gz['banner_pic']);?>
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>标题文字：</label>
			<div class="col-sm-9 col-xs-12">
				<textarea style="height: 400px; width: 100%;"
						  class="span7 richtext-clone" name="banner_desc" id="banner_desc" cols="70"><?php  echo $gz['banner_desc'];?></textarea>
			</div>
		</div>
		
		
		
		
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享标题：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="share_title" class="form-control span7" placeholder="" name="share_title" value="<?php  echo $gz['share_title'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享图标：</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('share_icon',$gz['share_icon']);?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享描述：</label>
			<div class="col-sm-9 col-xs-12">
			<textarea style="height: 60px;" name="share_content"
					  class="form-control span7" cols="60"><?php  echo $gz['share_content'];?></textarea>
			</div>
		</div>
		
		
		
		
		
		

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<input name="submit" type="submit" value="提交"
					   class="btn btn-primary span3"> <input type="hidden"
															 name="token" value="<?php  echo $_W['token'];?>" />
			</div>
		</div>





	</div>

	</div>

</form>
	</div>


<script>


	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('#banner_desc')[0]);

		});

	});

</script>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>