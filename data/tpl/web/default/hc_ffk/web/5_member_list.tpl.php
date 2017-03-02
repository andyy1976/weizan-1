<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('member');?>">粉丝管理</a></li>
</ul>
<div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal">
			<input type="hidden" name="op" value="sort" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">姓名</label>
				<div class="col-sm-8 col-lg-9">
					<input type="text" name="realname" class="form-control" value="<?php  echo $sort['realname'];?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">电话</label>
				<div class="col-sm-8 col-lg-9">
					<input type="text" name="mobile" class="form-control" value="<?php  echo $sort['mobile'];?>" />
				</div>
                <div class=" col-xs-12 col-sm-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i>搜索</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="panel panel-default">
	<table class="table table-hover">
		<thead class="navbar-inner">
			<tr>
				<th>姓名</th>
				<th>电话</th>
				<th>注册时间</th>
				<th>状态</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php  if(is_array($members)) { foreach($members as $item) { ?>
		<tr>
			<td><?php  echo $item['realname'];?></td>
			<td><?php  if(empty($item['mobile'])) { ?>--<?php  } else { ?><?php  echo $item['mobile'];?><?php  } ?></td>
			<td><?php  echo date('Y-m-d', $item['createtime'])?></td>
			<td>
				<?php  if($item['status']==1) { ?>
				<span class="label" style="background:#56af45;">可用</span>
				<?php  } else { ?>
				<span class="label" style="background:#747474;">禁止</span>
				<?php  } ?>
			</td>
			<td>
				<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('member', array('id' => $item['id'], 'op' => 'detail'))?>" title="编辑"><i class="fa fa-pencil"></i></a>
				<a class="btn btn-default btn-sm" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo $this->createWebUrl('member', array('id' => $item['id'], 'op' => 'delete'))?>" title="删除"><i class="fa fa-times"></i></a>
			</td>
		</tr>
		<?php  } } ?>
		</tbody>
	</table>
</div>
<div style="text-align:center;"><?php  echo $pager;?></div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>