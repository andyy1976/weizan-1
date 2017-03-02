<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('redpack', array('op'=>'display'));?>">历史红包列表</a></li>
	<li <?php  if(empty($id)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('redpack', array('op'=>'edit'));?>">添加红包数据</a></li>
	<?php  if(!empty($id)) { ?>
	<li class="active"><a href="<?php  echo $this->createWebUrl('redpack', array('op'=>'edit', 'id'=>$id));?>">编辑红包数据</a></li>
	<?php  } ?>
</ul>

<div class="main">
	<form action="" method="post" class="form-horizontal form" id="form">
		<div class="panel panel-default">
			<div class="panel-heading">编辑红包数据</div>
			<div class="panel-body">
			<?php  if(isset($redpack['id'])) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">id</label>
					<div class="col-xs-12 col-sm-8">
						<input type="text" name="redpack[id]" class="form-control" value="<?php  echo $redpack['id'];?>" readonly />
					</div>
				</div>
			<?php  } ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">openid</label>
					<div class="col-xs-12 col-sm-8">
						<input type="text" name="redpack[openid]" class="form-control" value="<?php  echo $redpack['openid'];?>" <?php  if(isset($redpack['openid'])) { ?>readonly<?php  } ?>/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">是否领取过红包</label>
					<div class="col-xs-12 col-sm-8">
					
						<div class="input-group">
							<select name="redpack[hasSub]" class="form-control">
								<option value='1' <?php  if($redpack['hasSub']== 1) { ?>selected<?php  } ?>>是</option>
								<option value='0' <?php  if($redpack['hasSub']== 0) { ?>selected<?php  } ?>> 否</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">红包金额</label>
					<div class="col-xs-12 col-sm-8">
						<div class="input-group">
							<input type="text" name="redpack[money]" class="form-control" value="<?php  echo $redpack['money'];?>" >
							<span class="input-group-addon">元</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">领取时间</label>
					<div class="col-xs-12 col-sm-8">
						<div class="input-group">
							<?php  echo tpl_form_field_date('redpack[time]', $redpack['time'], true);?>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 col-sm-offset-3 col-md-offset-2 col-lg-offset-2">
						<input type="hidden" name="redpack[appid]" value="<?php  echo $redpack['appid'];?>" />
						<input type="hidden" name="id" value="<?php  echo $redpack['id'];?>" />
						<input name="submit" type="submit" value="提交" class="btn btn-primary" />
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script>
require(['jquery', 'util'], function($, util){
	$(function(){
		$('#form').submit(function(){
			if($('input[name="redpack[openid]"]').val() == ''){
				util.message('请填写openid.');
				return false;
			}
			if($('input[name="redpack[hasSub]"]').val() == ''){
				util.message('请选择是否领取过.');
				return false;
			}
			var money = parseFloat($('input[name="redpack[money]"]').val());
			if(isNaN(money)){
				util.message('请填写领取过红包的金额.');
				return false;
			}
			if($('input[name="redpack[time]"]').val() == ''){
				util.message('请填写领取过红包的时间.');
				return false;
			}
			return true;
		});
	});
});
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>