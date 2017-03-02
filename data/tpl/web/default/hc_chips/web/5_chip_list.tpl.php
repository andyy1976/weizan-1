<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('chip',array('op'=>'post'));?>">添加卡券</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('chip');?>">卡券管理</a></li>
</ul>	
<form action="" id="form" method="post" class="form-horizontal form" enctype="multipart/form-data">
	<div class="panel panel-default">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th>序号</th>
					<th>标题</th>
					<th style="width:300px;">活动时间</th>
					<th>卡券类型</th>
					<th>是否显示</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($chips)) { foreach($chips as $key => $item) { ?>
			<tr>
				<td><input type="text" class="form-control" name="listorder[]" value="<?php  echo $item['listorder'];?>" style="width:70px;"><?php  if(allJoinMoney($item['id']) >= $item['price']) { ?><font color="red">(满足条件)</font><?php  } ?></td>
				<td><?php  echo $item['title'];?></td>
				<td><?php  echo date('Y-m-d', $item['starttime'])?>~<?php  echo date('Y-m-d', $item['endtime'])?></td>
				<td>
					<?php  if($item['type']==0) { ?>
					<span class="label" style="background:#56af45;">众筹券</span>
					<?php  } else { ?>
					<span class="label" style="background:#747474;"></span>
					<?php  } ?>
				</td>
				<td>
					<?php  if($item['isopen']==1) { ?>
					<span class="label" style="background:#56af45;">显示</span>
					<?php  } else { ?>
					<span class="label" style="background:#747474;">不显示</span>
					<?php  } ?>
				</td>
				<td>
					<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('chip', array('id' => $item['id'], 'op' => 'post'))?>" title="编辑"><i class="fa fa-pencil"></i></a>
					<a class="btn btn-default btn-sm" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo $this->createWebUrl('chip', array('id' => $item['id'], 'op' => 'delete'))?>" title="删除"><i class="fa fa-times"></i></a>
					<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('chipmanager', array('id' => $item['id'], 'op' => 'visit'))?>" title="参与粉丝"><i class="fa fa-chain-broken"></i></a>
				</td>
			</tr>
			<input type="hidden" name="id[]" value="<?php  echo $item['id'];?>" />
			<?php  } } ?>
			</tbody>
		</table>
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		<input type="submit" class="btn btn-primary col-lg-1" name="submit" value="批量更新" />
	</div>
</form>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>