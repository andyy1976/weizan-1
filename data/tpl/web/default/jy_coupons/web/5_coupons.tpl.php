<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('member');?>">用户管理</a></li>
	<li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('coupons', array('op' => 'display'))?>">卡券管理</a></li>
	<li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('coupons', array('op' => 'post'))?>"><?php  if($id==0) { ?>添加卡券<?php  } else { ?>修改卡券<?php  } ?></a></li>
	<li><a href="<?php  echo $this->createWebUrl('setting');?>">基本设置</a></li>
	<li><a href="<?php  echo $this->createWebUrl('stat');?>">统计分析</a></li>
	
</ul>
<style>
.panel-body {
padding: 10px;
}
</style>
<?php  if($operation == 'post') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data">
	<input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />
		<div class="panel panel-default">
			<div class="panel-heading">
				添加卡券
			</div>

			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">排序</label>
					<div class="col-sm-5">
						<input type="text" name="displayorder" class="form-control" value="<?php  echo $category['displayorder'];?>" />
					</div>
				</div>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">卡券名称</label>
					<div class="col-sm-5">
						<input type="text" name="coupons" class="form-control" value="<?php  echo $category['coupons'];?>" />
					</div>
				</div>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">卡券code</label>
					<div class="col-sm-5">
						<input type="text" name="code" class="form-control" value="<?php  echo $category['code'];?>" />
					</div>
				</div>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">卡券数量</label>
					<div class="col-sm-5">
						<input type="num" name="num" class="form-control" value="<?php  echo $category['num'];?>" />
						0代表无限
					</div>
				</div>
			</div>

			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">卡券图片</label>
				<div class="col-sm-9 col-xs-12">
					<?php  echo tpl_form_field_image('coupons_pic', $category['coupons_pic']);?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label">卡券顶部图</label>
				<div class="col-sm-9 col-xs-12">
					<?php  echo tpl_form_field_image('coupons_logo', $category['coupons_logo']);?>
				</div>
			</div>

			<div class="form-group col-sm-12">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				<input type="hidden" name="id" value="<?php  echo $category['id'];?>" />
				<input type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交" />
			</div>

			

		</div>
	</form>
</div>


<?php  } else if($operation == 'display') { ?>

<div class="main">
	<div class="category">
		
			<div class="panel panel-default">
				<div class="panel-heading">
					卡券管理
				</div>
				<div class="panel-body table-responsive">
					<form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)">
					<table class="table table-hover">

					<thead class="navbar-inner">
						<tr>
							<th style="width:10px;"></th>
							<th style="width:100px;">显示顺序</th>
							<th style="width:200px;">卡券名称</th>
							<th style="width:100px;">卡券code</th>
							<th style="width:100px;">卡券数量</th>
							<th style="width:180px;">操作</th>
						</tr>
					</thead>

					<tbody id="main">
						<?php  if(is_array($category)) { foreach($category as $row) { ?>
						<tr>
							<td>
							</td>
							<td class="text-center">
								<input type="text" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>">
							</td>

							<td class="text-left">
								<div style="height:30px;line-height:30px;"><?php  echo $row['coupons'];?>&nbsp;&nbsp;
								</div>
							</td>

							<td class="text-left">
								<div style="height:30px;line-height:30px;"><?php  echo $row['code'];?>&nbsp;&nbsp;
								</div>
							</td>

							<td class="text-left">
								<div style="height:30px;line-height:30px;"><?php  if($row['num']==0) { ?>无限<?php  } else { ?><?php  echo $row['num'];?><?php  } ?>&nbsp;&nbsp;
								</div>
							</td>

							<td>
								<a href="<?php  echo $this->createWebUrl('coupons', array('op' => 'post', 'id' => $row['id']))?>" title="编辑" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit">编辑</i></a>

								<a href="<?php  echo $this->createWebUrl('coupons', array('op' => 'delete','id' => $row['id']))?>" onclick="return confirm('确认删除此分类吗？');return false;" title="删除" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-times">删除</i></a>

							</td>
						</tr>
						
					<?php  } } ?>
					<tr>
						<td></td>
						<td colspan="4">
							<input name="submit" type="submit" class="btn btn-primary" value="提交">
							<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
						</td>
					</tr>
					</tbody>
					</table>
					</form>
				</div>
			</div>
	</div>
</div>
<?php  } ?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>