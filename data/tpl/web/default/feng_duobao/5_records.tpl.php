<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
<!-- 	<li <?php  if($status == '') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('record');?>">全部记录</a></li> -->
	<li <?php  if(($status == '0' || $status == '')) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('record',array('status' => 0));?>">未付款</a></li>
	<li <?php  if($status == '1') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('record',array('status' => 1));?>">已付款</a></li>
</ul>
	<div class="panel panel-default">
		<div class="panel-heading">交易记录</div>
		<div class="panel-body">
			<div class="table-responsive panel-body">
				<table class="table table-hover" style="min-width: 300px;">
					<thead class="navbar-inner">
						<tr>
							<th class="col-sm-2">订单号</th>
							<th class="col-sm-1">商品ID</th>
							<th class="col-sm-1">昵称</th>
							<th class="col-sm-1">支付方式</th>
							<th class="col-sm-2">微信订单号</th>
							<th class="col-sm-1">数量</th>
							<th class="col-sm-1">总价</th>
							<th class="col-sm-1">状态</th>
							<th class="col-sm-2">下单时间</th>
							<th class="col-sm-2 text-right">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php  if(is_array($goodses)) { foreach($goodses as $goodsid => $goods) { ?>
						<tr>
							<td><?php  echo $goods['ordersn'];?></td>
							<td><?php  echo $goods['sid'];?></td>
							<td><?php  echo $goods['nickname'];?></td>
							<td><?php  if(($goods['paytype']!=3)) { ?><?php  if(($goods['paytype']==1)) { ?><span class="label label-danger">余额支付<?php  } else { ?><?php  if(($goods['paytype']==2)) { ?><span class="label label-danger">支付宝支付<?php  } else { ?><span class="label label-default">未支付<?php  } ?><?php  } ?><?php  } else { ?><span class="label label-danger">微信支付<?php  } ?></span</td>
							<td><?php  echo $goods['transid'];?></td>
							<td><?php  echo $goods['count'];?> 个</td>
							<td><?php  echo $goods['count'];?> 元</td>
							<td><?php  if(($goods['status']==1)) { ?><span class="label label-info">已支付</span><?php  } else { ?><span class="label label-default">未支付</span><?php  } ?></td>
							<td><?php  echo date('Y-m-d H:i:s', $goods['createtime'])?></td>
							<td class="text-right">
								<a href="<?php  echo $this->createWebUrl('showrecords', array('id'=>$goods['id']));?>" class="btn btn-success btn-sm" data-original-title="" title="">查看兑换码</a>
							</td>
						</tr>
						<?php  } } ?>
						<?php  if(empty($goodses)) { ?>
						<tr>
							<td colspan="8">
								没有交易记录
							</td>
						</tr>
						<?php  } ?>
					</tbody>
				</table>
				<?php  echo $pager;?>
			</div>
		</div>
	</div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>