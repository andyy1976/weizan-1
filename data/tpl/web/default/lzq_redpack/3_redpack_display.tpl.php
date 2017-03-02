<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('redpack', array('op'=>'display'));?>">历史红包列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('redpack', array('op'=>'edit'));?>">添加红包数据</a></li>
</ul>

<div class="main">

	<div class="panel panel-default">
		<div class="panel-heading">删除数据</div>
		<div class="panel-body">
			确认删除本公众号红包表所有信息？
			<a onclick="if(!confirm('删除后将不可恢复,确定删除吗?')) return false;" href="<?php  echo $this->createWebUrl('deleteMine', array('op'=>'delete', 'id'=>$redpackid));?>" class="btn btn-default btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除">删除</a>
			
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">历史红包列表</div>
		<div class="panel-body">
			<div class="table-responsive panel-body">
				<table class="table table-hover" style="min-width: 300px;">
					<thead class="navbar-inner">
						<tr>
							<th class="col-sm-1">id</th>
							<th class="col-sm-3">openid</th>
							<th class="col-sm-2">是否领取过红包</th>
							<th class="col-sm-2">红包领取金额(元)</th>
							<th class="col-sm-2">红包领取时间</th>

							<th class="col-sm-2 text-right">操作</th>
						</tr>
					</thead>
					<tbody>
						<?php  if(is_array($redpacks)) { foreach($redpacks as $redpackid => $redpack) { ?>
						<tr>
							<td><?php  echo $redpack['id'];?></td>
							<td><?php  echo $redpack['openid'];?></td>
							<td><?php  echo $redpack['hasSub'];?></td>
							<td><?php  echo $redpack['money'];?></td>
							<td><?php  echo $redpack['time'];?></td>
							<td class="text-right">
								<a href="<?php  echo $this->createWebUrl('redpack', array('op'=>'edit', 'id'=>$redpackid));?>" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="" data-original-title="编辑"><i class="fa fa-pencil"></i></a>
								<a onclick="if(!confirm('删除后将不可恢复,确定删除吗?')) return false;" href="<?php  echo $this->createWebUrl('redpack', array('op'=>'delete', 'id'=>$redpackid));?>" class="btn btn-default btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="删除"><i class="fa fa-times"></i> </a>
							</td>
						</tr>
						<?php  } } ?>
						<?php  if(empty($redpacks)) { ?>
						<tr>
							<td colspan="8">
								暂无历史红包数据
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