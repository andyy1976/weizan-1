<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/template/navs', TEMPLATE_INCLUDEPATH)) : (include template('web/template/navs', TEMPLATE_INCLUDEPATH));?>
<div class="panel panel-default">
	<div class="panel-heading">
		帮我送-默认配送价格设置
	</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal" role="form" id="form1" >
			<div class="form-group">
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">起步价</div>
						<input type="text" class="form-control" name ="start_fee" value="<?php  echo $item['start_fee'];?>"/>
						<div class="input-group-addon">元含</div>
						<input type="text" class="form-control" name ="start_km" value="<?php  echo $item['start_km'];?>" >
						<div class="input-group-addon">公里以内</div>
						<input type="text" class="form-control" name ="start_kg" value="<?php  echo $item['start_kg'];?>">
						<div class="input-group-addon">公斤以内</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">正常服务时间，从</div>
						<input type="text" class="form-control" name ="start_time" value="<?php  echo $item['start_time'];?>"/>
						<div class="input-group-addon">点</div>
						<input type="text" class="form-control" name ="end_time" value="<?php  echo $item['end_time'];?>" >
						<div class="input-group-addon">点,超出每单加</div>
						<input type="text" class="form-control" name ="time_fee" value="<?php  echo $item['time_fee'];?>">
						<div class="input-group-addon">%</div>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">每</div>
						<input type="text" class="form-control" name="limit_km_km" value="<?php  echo $item['limit_km_km'];?>"/>
						<div class="input-group-addon">公里增加</div>
						<input type="text" class="form-control" name="limit_km_fee" value="<?php  echo $item['limit_km_fee'];?>"/>
						<div class="input-group-addon">元</div>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">每</div>
						<input type="text" class="form-control" name="limit_kg_kg" value="<?php  echo $item['limit_kg_kg'];?>"/>
						<div class="input-group-addon">公斤增加</div>
						<input type="text" class="form-control" name="limit_kg_fee" value="<?php  echo $item['limit_kg_fee'];?>"/>
						<div class="input-group-addon">元</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<div class="input-group">
						<div class="input-group-addon">每</div>
						<input type="text" class="form-control" name="limit_fee_num" value="<?php  echo $item['limit_fee_num'];?>"/>
						<div class="input-group-addon">元增加</div>
						<input type="text" class="form-control" name="limit_fee_fee" value="<?php  echo $item['limit_fee_fee'];?>"/>
						<div class="input-group-addon">元</div>
					</div>
				</div>
			</div>
			
			
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label"></label>
				<div class="col-sm-8 col-lg-9 col-xs-12">
					<input type="submit" class="btn btn-default" value="提交">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
				</div>
			</div>
		</form>
	</div>
	<div class="panel-footer">
	
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>