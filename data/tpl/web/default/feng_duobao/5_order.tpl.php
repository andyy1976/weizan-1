<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
<!-- 	<li <?php  if($status == '') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('order');?>">已揭晓商品单</a></li> -->
	<li <?php  if(($send_state == '0' || $send_state == '')) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('order', array('state'=>0));?>">未发货商品单</a></li>
	<li <?php  if($send_state == '1') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('order', array('state'=>1));?>">已发货商品单</a></li>
</ul>
	<div class="panel panel-default">
		<div class="panel-heading">已揭晓商品单</div>
		<div class="panel-body">
			<div class="table-responsive panel-body">
				<table class="table table-hover" style="min-width: 300px;">
					<thead class="navbar-inner">
						<tr>
							<th class="col-sm-1">ID</th>
							<th class="col-sm-1">商品ID</th>
							<th class="col-sm-2">商品名称</th>
							<th class="col-sm-1">商品图片</th>
							<th class="col-sm-1">商品价格</th>
							<th class="col-sm-1">当前/总期数</th>
							<th class="col-sm-1">中奖人昵称</th>
							<th class="col-sm-2">中奖人form_user</th>
							<th class="col-sm-1">中奖码</th>
							<th class="col-sm-2">揭晓时间</th>
							<th class="col-sm-1 text-right">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php  if(is_array($goodses)) { foreach($goodses as $goodsid => $goods) { ?>
						<tr>
							<td><?php  echo $goods['id'];?></td>
							<td><?php  echo $goods['sid'];?></td>
							<td><?php  echo $goods['title'];?></td>
							<td><image src="<?php  echo tomedia($goods['picarr']);?>" style="max-width: 48px; max-height: 48px; border: 1px dotted gray"></td>
							<td><?php  echo $goods['price'];?></td>
							<td><?php  echo $goods['periods'];?>/<?php  echo $goods['maxperiods'];?></td>
							<td><?php  echo $goods['q_uid'];?></td>
							<td><?php  echo $goods['q_user'];?></td>
							<td><?php  echo $goods['q_user_code'];?></td>
							<td><?php  echo date('Y-m-d H:i:s', $goods['q_end_time'])?></td>
							<td class="text-right">
								<?php  if(($goods['send_state']!=1)) { ?><a href="<?php  echo $this->createWebUrl('sendprize', array('sid'=>$goods['id'],'openid'=>$goods['q_user']));?>" class="btn btn-success btn-sm" data-original-title="" title="">去发货<?php  } else { ?><a href="<?php  echo $this->createWebUrl('sendprize', array('sid'=>$goods['id'],'openid'=>$goods['q_user']));?>" class="btn btn-danger btn-sm" data-original-title="" title="">已发货<?php  } ?></a>
							</td>
						</tr>
						<?php  } } ?>
					</tbody>
				</table>
			</div>
		</div>
		</div>
	</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>