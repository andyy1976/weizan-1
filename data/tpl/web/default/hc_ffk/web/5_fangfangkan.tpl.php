<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="panel panel-default">
	<form class="form-horizontal form" action="" method="post">
		<div class="panel-body">
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">难度选择</label>
				<div class="col-sm-3">
					<input type="radio" name="level" value="0" <?php  if($item['level'] == 0) { ?>checked<?php  } ?> />				
					简单&nbsp;&nbsp;&nbsp;
					<input type="radio" name="level" value="1" <?php  if($item['level'] == 1) { ?>checked<?php  } ?> />				
					普通&nbsp;&nbsp;&nbsp;
					<input type="radio" name="level" value="2" <?php  if($item['level'] == 2) { ?>checked<?php  } ?> />				
					困难
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">简单积分</label>
				<div class="col-sm-3">
					<input type="text" name="easycredit" value="<?php  echo $item['easycredit'];?>" class="form-control" placeholder="每通关一次简单关卡能获得的积分数"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">普通积分</label>
				<div class="col-sm-3">
					<input type="text" value="<?php  echo $item['normalcredit'];?>" class="form-control" name="normalcredit" placeholder="每通关一次普通关卡能获得的积分数"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">困难积分</label>
				<div class="col-sm-3">
					<input type="text" name="hardcredit" value="<?php  echo $item['hardcredit'];?>" class="form-control" placeholder="每通关一次困难关卡能获得的积分数"/>
				</div>
			</div>
			<!--
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">明牌时间</label>
				<div class="col-sm-3">
					<input type="text" name="showtime" value="<?php  echo $item['showtime'];?>" class="form-control" placeholder="单位：秒"/>	
				</div>
			</div>
			-->
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">游戏次数</label>
				<div class="col-sm-3">
					<input type="text" name="gametimes" value="<?php  echo $item['gametimes'];?>" class="form-control" placeholder="每天限制用户的游戏次数，0点更新"/>	
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">游戏限时</label>
				<div class="col-sm-3">
					<input type="text" name="gametime" value="<?php  echo $item['gametime'];?>" class="form-control" placeholder="单位：秒"/>	
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">翻翻图片1</label>
				<div class="col-sm-3">
					<?php  echo tpl_form_field_image('picture1', $item['picture1'])?>
					<div class="help-block">建议135*135</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">翻翻图片2</label>
				<div class="col-sm-3">
					<?php  echo tpl_form_field_image('picture2', $item['picture2'])?>
					<div class="help-block">建议135*135</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">翻翻图片3</label>
				<div class="col-sm-3">
					<?php  echo tpl_form_field_image('picture3', $item['picture3'])?>
					<div class="help-block">建议135*135</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">翻翻图片4</label>
				<div class="col-sm-3">
					<?php  echo tpl_form_field_image('picture4', $item['picture4'])?>
					<div class="help-block">建议135*135</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">翻翻图片5</label>
				<div class="col-sm-3">
					<?php  echo tpl_form_field_image('picture5', $item['picture5'])?>
					<div class="help-block">建议135*135</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">翻翻背景图</label>
				<div class="col-sm-3">
					<?php  echo tpl_form_field_image('ffpicture', $item['ffpicture'])?>
					<div class="help-block">建议135*135</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 col-lg-1 control-label">是否显示</label>
				<div class="col-sm-3">
					<input type="radio" name="isopen" value="1" <?php  if($item['isopen'] == 1) { ?>checked<?php  } ?> />				
					显示&nbsp;&nbsp;&nbsp;
					<input type="radio" name="isopen" value="0" <?php  if($item['isopen'] == 0) { ?>checked<?php  } ?> />				
					不显示
				</div>
			</div>
		</div>
		<div class="form-group col-sm-12">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
			<input type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交" />
		</div>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>