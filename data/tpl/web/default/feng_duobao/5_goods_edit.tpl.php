<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('goods', array('op'=>'display'));?>">商品列表</a></li>
	<li <?php  if(empty($id)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('goods', array('op'=>'edit'));?>">添加商品</a></li>
	<?php  if(!empty($id)) { ?>
	<li class="active"><a href="<?php  echo $this->createWebUrl('goods', array('op'=>'edit', 'id'=>$id));?>">编辑商品</a></li>
	<?php  } ?>
</ul>

<div class="main">
	<form action="" method="post" class="form-horizontal form" id="form">
		<div class="panel panel-default">
			<div class="panel-heading">一元夺宝商品</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">商品标题</label>
					<div class="col-xs-12 col-sm-8">
						<input type="text" name="goods[title]" class="form-control" value="<?php  echo $goods['title'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">商品图片</label>
					<div class="col-xs-12 col-sm-8">
						<?php  echo tpl_form_field_image('goods[picarr]', $goods['picarr']);?>
					</div>
					<span class="help-block">图片建议为180*180</span>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">商品价格</label>
					<div class="col-xs-12 col-sm-8">
						<div class="input-group">
							<input type="text" name="goods[price]" class="form-control" value="<?php  echo $goods['price'];?>" <?php  if(!empty($id)) { ?> disabled="disabled" <?php  } ?>>
							<span class="input-group-addon">元</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">商品总期数</label>
					<div class="col-xs-12 col-sm-8">
						<div class="input-group">
							<input type="text" name="goods[maxperiods]" class="form-control" value="<?php  echo $goods['maxperiods'];?>" >
							<span class="input-group-addon">期</span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">商品中奖码(例1000001)</label>
					<div class="col-xs-12 col-sm-8">
						<input type="text" name="goods[q_user_code]" class="form-control" value="<?php  echo $goods['q_user_code'];?>" />
						<span class="help-block">第一次添加商品时，请勿填写，等添加购买以后再填（谨慎使用）</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">商品详情链接</label>
					<div class="col-xs-12 col-sm-8">
						<input type="text" name="goods[content]" class="form-control" value="<?php  echo $goods['content'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">状态</label>
					<div class="col-xs-12 col-sm-8">
						<label class="radio radio-inline">
							<input type="radio" name="goods[status]" value="1" <?php  if(intval($goods['status']) != 2) { ?>checked="checked"<?php  } ?>> 下架
						</label>
						<label class="radio radio-inline">
							<input type="radio" name="goods[status]" value="2" <?php  if(intval($goods['status']) == 2) { ?>checked="checked"<?php  } ?>> 上架
						</label>
					</div>
				</div>
				<?php  if(!empty($id)) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">添加日期</label>
					<div class="col-xs-12 col-sm-8">
						<p class="form-control-static"><?php  echo date('Y-m-d', $goods['createtime']);?></p>
					</div>
				</div>
				<?php  } ?>
				<div class="form-group">
					<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 col-sm-offset-3 col-md-offset-2 col-lg-offset-2">
						<input type="hidden" name="id" value="<?php  echo $goods['id'];?>" />
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
			if($('input[name="goods[title]"]').val() == ''){
				util.message('请填写商品名称.');
				return false;
			}
			if($('input[name="goods[picarr]"]').val() == ''){
				util.message('请上传商品图片.');
				return false;
			}
			var maxperiods = parseFloat($('input[name="goods[maxperiods]"]').val());
			if(isNaN(maxperiods)){
				util.message('请填写商品期数.');
				return false;
			}
			return true;
		});
	});
});
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>