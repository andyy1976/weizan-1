<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<style type='text/css'>
	.sel { background:#33cdd6; color:#fff;}
	.nosel { background:#fff;color:#000}
</style>
<style type="text/css">
.myoder{margin:10px; -webkit-box-shadow:0 1px 2px 1px rgba(0,0,0,0.2); box-shadow:0 1px 2px 1px rgba(0,0,0,0.2); overflow:hidden; background:#FFF;}
.myoder .myoder-hd{height:35px; line-height:35px; overflow:hidden; background:#f0f0f0; border-bottom:1px solid #cacaca; padding:0 10px;}
.myoder .myoder-hd > span{font-size:14px; color:#504040;}
.myoder .myoder-hd > span.pull-right{font-size:12px; color:#999;}
.myoder .myoder-detail{min-height:73px; border-bottom:1px solid #f3f3f4; padding:10px; overflow-x:hidden;}
.myoder .myoder-detail img{width:50px; margin-right:10px; float:left;}
.myoder .myoder-detail .name a{color:#4d4f5d; display:inline-block; width:200px; font-weight:bold; text-decoration:underline; text-overflow:ellipsis; white-space:nowrap; overflow:hidden;}
.myoder .myoder-detail .price{font-size:14px;}
.myoder .myoder-detail .price span{display:inline-block; width:100px;}
.myoder .myoder-detail .price span.num{width:60px;}
.myoder .myoder-total{height:65px; padding:5px 10px; color:#b9b9b9; font-weight:bold;}
.myoder .myoder-total > span{margin-right:5px;}
.myoder .myoder-total > span .false{color:#e9342a;}
.myoder .myoder-total > .btn{margin-top:3.5px;}
.myoder .myoder-express{border-bottom:1px solid #f3f3f4; padding:5px 10px; overflow:hidden; background:#F9F9F9;}
.myoder .myoder-express > span{display:inline-block; width:50%; float:left;}
.myoder .myoder-express .express-company{}
.myoder .myoder-express .express-num{text-align:right;}
</style>
 <div class="myoder img-rounded" style='text-align:center;color:#aaa;padding:5px;'>
	 <div style='float:left;height:23px;margin:auto;width:60%;'>
		<div <?php  if($status==0) { ?>class='sel'<?php  } else { ?>class="nosel"<?php  } ?> style='border-top-left-radius: 5px;border-bottom-left-radius:5px;border:1px solid #33cdd6;text-align: center;float:left;width:30%' onclick="location.href='<?php  echo $this->createMobileUrl('myorder',array('status'=>0))?>'">
			待支付
		</div>
		<div <?php  if($status==1 || $status==2) { ?>class='sel'<?php  } else { ?>class="nosel"<?php  } ?> style='border:1px solid #33cdd6;margin-left:-1px;float:left;width:30%;text-align: center;' onclick="location.href='<?php  echo $this->createMobileUrl('myorder',array('status'=>2))?>'">
			待收货
		</div>
		<div <?php  if($status==3) { ?>class='sel'<?php  } else { ?>class="nosel"<?php  } ?> style='border-top-right-radius: 5px;margin-left:-1px;border-bottom-right-radius:5px;text-align: center;border:1px solid #33cdd6;float:left;width:30%' onclick="location.href='<?php  echo $this->createMobileUrl('myorder',array('status'=>3))?>'">
			已完成
		</div>
	</div>
</div>

<?php  if(count($list)<=0) { ?>
<div class="myoder img-rounded" style='text-align:center;color:#aaa;padding:30px;'>
	您暂时没有任何订单!
</div>
<?php  } ?>
<div style='margin-bottom:40px;'>
<?php  if(is_array($list)) { foreach($list as $item) { ?>
<div class="myoder img-rounded">
	<div class="myoder-hd">
		<span class="pull-left">订单编号：<?php  echo $item['ordersn'];?></span>
		<span class="pull-right"><?php  echo date('Y-m-d H:i', $item['createtime'])?>
		<?php  if($item['paytype'] == 3) { ?>
			<?php  if($item['status'] == -1) { ?>
			<span class="text-muted">订单取消</span>
			<?php  } else if($item['status'] < 3) { ?>
			<span class="text-danger">货到付款 / 未付款</span>
			<?php  } else { ?>
			<span class="text-success">已完成</span>
			<?php  } ?>
		<?php  } else { ?>
			<?php  if($item['status'] == -1) { ?>
			<span class="text-muted">订单取消</span>
			<?php  } else if($item['status'] == 0) { ?>
			<span class="text-danger">未付款</span>
			<?php  } else if($item['status'] == 1) { ?>
			<span class="text-warning">已付款</span>
			<?php  } else if($item['status'] == 2) { ?>
			<span class="text-warning">已发货</span>
			<?php  } else { ?>
			<span class="text-success">已完成</span>
			<?php  } ?>
		<?php  } ?>
		</span>
	</div>
	<?php  $project = $this->getproject($item['pid']);?>
	<?php  $p_item = $this->getitem($item['item_id']);?>
	<div class="myoder-detail">
		<a href="<?php  echo $this->createMobileUrl('detail', array('id' => $project['id']))?>">
			<img src="<?php  echo $_W['attachurl'];?><?php  echo $p_item['thumb'];?>" width="160"/>项目名称：<?php  echo $project['title'];?>
		</a>
	</div>
	<div class="myoder-total">
		<span>
			共计：<span class="false">
				<?php  if($item['dispatchprice']<=0) { ?>
				<?php  echo $item['price'];?> 元
				<?php  } else { ?>
				<?php  echo $item['price'];?> 元 (付出金额：<?php  echo $item['item_price'];?>元 运费 <?php  echo $item['dispatchprice'];?> 元)
				<?php  } ?></span>
		</span>
		<div style="height:30px;"><a href="<?php  echo $this->createMobileUrl('myorder', array('orderid' => $item['id'], 'op' => 'detail'))?>" class="btn btn-success pull-right btn-sm" >订单详情</a></div>
	</div>
</div>
<?php  } } ?></div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footerbar', TEMPLATE_INCLUDEPATH)) : (include template('footerbar', TEMPLATE_INCLUDEPATH));?>