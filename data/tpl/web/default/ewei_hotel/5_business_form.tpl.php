<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  load()->func('tpl')?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li><a href="<?php  echo $this->createWebUrl('business');?>">商圈列表</a></li>
		<li<?php  if($op=='edit' && empty($id)) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('business',array('op'=>'edit'));?>">添加商圈</a></li>
		<?php  if($op=='edit' && !empty($id)) { ?><li class="active"><a href="<?php  echo $this->createWebUrl('business',array('op'=>'edit','id'=>$id));?>">编辑商圈</a></li><?php  } ?>
	</ul>
	<form action="" class="form-horizontal form" method="post" onsubmit="return formcheck()">
		<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
		<div class="panel panel-default">
			<div class="panel-heading">
				商圈基本信息
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" id="displayorder" name="displayorder"  class="form-control" value="<?php  echo $item['displayorder'];?>">
						<span class='help-block'>数字越大排名越高</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">所在地区</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_district('district',array('province'=>$item['location_p'],'city'=>$item['location_c'],'district'=>$item['location_a']))?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">商圈名称</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="title" id="title" value="<?php  echo $item['title'];?>" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
					<div class="col-sm-9 col-xs-12">
						<label class="radio-inline">
							<input type="radio" name="status" value="1" <?php  if($item['status'] == 1) { ?>checked<?php  } ?>/>显示
						</label>
						<label class="radio-inline">
							<input type="radio" name="status" value="0" <?php  if($item['status'] == 0) { ?>checked<?php  } ?>/>隐藏
						</label>
						<span class='help-block'>手机前台是否显示</span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>

	<script type="text/javascript">
		function formcheck() {
			if ($("#title").isEmpty()) {
				Tip.select("title", "请填写商圈!", "right");
				return false;
			}
			return true;
		}
	</script>

