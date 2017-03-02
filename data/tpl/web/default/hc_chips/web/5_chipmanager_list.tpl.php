<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('chipmanager',array('op'=>'post'));?>">添加众筹</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('chipmanager');?>">众筹管理</a></li>
</ul>	

<div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="" method="post" class="form-horizontal">
			<input type="hidden" name="op" value="sort" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">标题</label>
				<div class="col-sm-8 col-lg-9">
					<select class="form-control" name="chipid">
							<option value="0">全部</option>
						<?php  if(is_array($chips)) { foreach($chips as $c) { ?>
							<option value="<?php  echo $c['id'];?>" <?php  if($sort['chipid']==$c['id']) { ?>selected<?php  } ?>><?php  echo $c['title'];?></option>
						<?php  } } ?>
					</select>
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
				<th>标题</th>
				<th>姓名</th>
				<th>众筹金额</th>
				<th>参与时间</th>
				<th>支付状态</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		<?php  if(is_array($chipmanagers)) { foreach($chipmanagers as $key => $item) { ?>
		<tr>
			<td><?php  echo $chip[$item['chipid']];?></td>
			<td><?php  echo $member[$item['mid']];?></td>
			<td><?php  echo $item['joinmoney'];?></td>
			<td><?php  echo date('Y-m-d', $item['createtime'])?></td>
			<td>
				<?php  if($item['status']==1) { ?>
				<span class="label" style="background:#56af45;">已支付</span>
				<?php  } else { ?>
				<span class="label" style="background:#747474;">未支付</span>
				<?php  } ?>
			</td>
			<td>
				<a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('chipmanager', array('id' => $item['id'], 'op' => 'post'))?>" title="编辑"><i class="fa fa-pencil"></i></a>
				<a class="btn btn-default btn-sm" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo $this->createWebUrl('chipmanager', array('id' => $item['id'], 'op' => 'delete'))?>" title="删除"><i class="fa fa-times"></i></a>
			</td>
		</tr>
		<?php  } } ?>
		</tbody>
	</table>
</div>
<div style="text-align:center;"><?php  echo $pager;?></div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>