<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('list');?>">门店列表</a></li>
	<li><a href="<?php  echo $this->createWebUrl('post');?>">添加门店</a></li>
</ul>
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">门店名称</label>
				<div class="col-sm-4">
					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
				</div>			
			</div>
			<div class="form_group">
				<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
				<input type="submit" class="btn btn-primary" name="submit" value="提交" />
			</div>
			</form>
		</div>
	</div>
	
	<div style="padding:15px;">
		<form action="" method="post">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th align="center" style="width:20px;text-align:center;">ID</th>						
                    <th align="center" style="width:100px;text-align:center;">门店名称</th>
					<th align="center" style="width:40px;text-align:center;">门店地址</th>
					<th align="center" style="width:80px;text-align:center;">电话</th>
					<th style="width:80px;text-align:center;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>			
						<td align="center" style="text-align:center;"><?php  echo $row['id'];?></td>
                        <td align="center" style="text-align:center;<?php  if($row['status'] == '0') { ?>color:red;<?php  } ?>"><?php  echo $row['title'];?></td>
						<td align="center" style="font-size:12px; color:#666text-align:center;"><?php  echo $row['address'];?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $row['phone'];?></td>
						<td style="text-align:center;">
                        	<a href="<?php  echo $this->createWebUrl('Post',array('id'=>$row['id']));?>">编辑</a> | <a href="<?php  echo $this->createWebUrl('Delete',array('id'=>$row['id']));?>" onclick="return confirm('删除记录后不可恢复,确定要删除吗?')" >删除</a>
                        </td>
					</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</form>
		<?php  echo $pager;?>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>