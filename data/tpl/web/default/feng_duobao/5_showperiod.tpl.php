<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li class="active"><a>往期商品列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('goods', array('op'=>'display'));?>">商品列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('goods', array('op'=>'edit'));?>">添加商品</a></li>
</ul>
	<div class="panel panel-default">
		<div class="panel-heading">往期商品列表</div>
		<div class="panel-body">
			<div class="table-responsive panel-body">
				<table class="table table-hover" style="min-width: 300px;">
					<thead class="navbar-inner">
						<tr>
							<th class="col-sm-1">商品ID</th>
							<th class="col-sm-2">商品名称</th>
							<th class="col-sm-1">商品图片</th>
							<th class="col-sm-1">商品价格</th>
							<th class="col-sm-1">当前/总期数</th>
							<th class="col-sm-1">中奖人昵称</th>
							<th class="col-sm-1">中奖码</th>
							<th class="col-sm-2">揭晓时间</th>
							<th class="col-sm-1 text-right">查看兑换记录</th>
						</tr>
					</thead>
					<tbody>
						<?php  if(is_array($goodses)) { foreach($goodses as $goodsid => $goods) { ?>
						<tr>
							<td><?php  echo $goods['id'];?></td>
							<td><?php  echo $goods['title'];?></td>
							<td><image src="<?php  echo tomedia($goods['picarr']);?>" style="max-width: 48px; max-height: 48px; border: 1px dotted gray"></td>
							<td><?php  echo $goods['price'];?></td>
							<td><?php  echo $goods['periods'];?>/<?php  echo $goods['maxperiods'];?></td>
							<td><?php  echo $goods['q_uid'];?></td>
							<td><?php  echo $goods['q_user_code'];?></td>
							<td><?php  echo date('Y-m-d H:i:s', $goods['q_end_time'])?></td>
							<td class="text-right">
								<a href="<?php  echo $this->createWebUrl('srecords', array('id'=>$goods['id']));?>" class="btn btn-success btn-sm" data-original-title="" title="">兑换记录</a>
							</td>
						</tr>
						<?php  } } ?>
						<?php  if(empty($goodses)) { ?>
						<tr>
							<td colspan="8">
								没有往期商品
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