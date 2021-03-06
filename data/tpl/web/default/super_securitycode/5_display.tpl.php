<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('list');?>">防伪码列表</a></li>
	<?php  if($_W['isfounder']) { ?>
	<li><a href="<?php  echo $this->createWebUrl('create');?>">生成防伪码</a></li>
	<li><a href="<?php  echo $this->createWebUrl('insert');?>">数据导入</a></li>
	<?php  } ?>
	<li><a href="<?php  echo $this->createWebUrl('logs');?>">查询记录</a></li>
</ul>
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="" method="post" class="form-horizontal" role="form">
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">防伪码</label>
				<div class="col-sm-4">
					<input class="form-control" name="code" id="" type="text" value="<?php  echo $code;?>">
				</div>
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">防伪码前缀</label>
				<div class="col-sm-4">
					<input class="form-control" name="sStr" id="" type="text" value="<?php  echo $_GPC['sStr'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">产品名称</label>
				<div class="col-sm-4">
					<input class="form-control" name="sName" id="" type="text" value="<?php  echo $_GPC['sName'];?>">
				</div>
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">产品品牌</label>
				<div class="col-sm-4">
					<input class="form-control" name="sBrand" id="" type="text" value="<?php  echo $_GPC['sBrand'];?>">
				</div>
					
			</div>
            <div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">规格参数</label>
				<div class="col-sm-4">
					<input class="form-control" name="sSpec" id="" type="text" value="<?php  echo $_GPC['sSpec'];?>">
				</div>
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">产品重量</label>
				<div class="col-sm-4">
					<input class="form-control" name="sWeight" id="" type="text" value="<?php  echo $_GPC['sWeight'];?>">
				</div>
					
			</div>  
            <div class="form-group">
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">生产厂家</label>
				<div class="col-sm-4">
					<input class="form-control" name="sFactory" id="" type="text" value="<?php  echo $_GPC['sFactory'];?>">
				</div>
				<label class="col-xs-13 col-sm-2 col-md-2 col-lg-1 control-label">备注</label>
				<div class="col-sm-4">
					<input class="form-control" name="sRemarks" id="" type="text" value="<?php  echo $_GPC['sRemarks'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">积分类型</label>
				<div class="col-sm-4">
					<input class="form-control" name="creditname" id="" type="text" value="<?php  echo $creditname;?>">
				</div>
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">积分状态</label>
				<div class="col-sm-4">
					<input name="creditstatus" id="" type="radio" value="0" <?php  if($creditstatus == 0) { ?>checked<?php  } ?>> 未发放
					<input name="creditstatus" id="" type="radio" value="1" <?php  if($creditstatus == 1) { ?>checked<?php  } ?>> 已发放
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">生成时间</label>
				<div class="col-sm-4">
					<?php  echo tpl_form_field_daterange('createtime', array('start'=>date('Y-m-d',$c_s),'end'=>date('Y-m-d',$c_e)), true)?>
				</div>
			</div>
			<div class="form_group">
				<input type="submit" class="btn btn-primary" name="submit" value="提交" />
<?php  if($_W['isfounder']) { ?>
                	<input type="submit" class="btn btn-primary" style="float: right; margin-left: 10px;" name="download" value="下载二维码" />
				<input type="submit" class="btn btn-primary" style="float: right;" name="submit2" value="导出" />
<?php  } ?>
				<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
			</div>
			</form>
		</div>
	</div>

	<div style="padding:15px;">
		<form action="" method="post">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:5px;" class="row-first">选择</th>
					<th align="center" style="width:20px;text-align:center;">ID</th>
                    <th align="center" style="width:100px;text-align:center;">防伪码</th>
					<th align="center" style="width:40px;text-align:center;">产品名称</th>
					<th align="center" style="width:40px;text-align:center;">产品品牌</th>
					<th align="center" style="width:40px;text-align:center;">规格参数</th>
					<th align="center" style="width:40px;text-align:center;">产品重量</th>
					<th align="center" style="width:80px;text-align:center;">生产厂家</th>
					<th align="center" style="width:80px;text-align:center;">备注</th>
					<th align="center" style="width:40px;text-align:center;">积分类型</th>
					<th align="center" style="width:40px;text-align:center;">积分数</th>
					<th align="center" style="width:40px;text-align:center;">积分状态</th>
					<th align="center" style="width:60px;text-align:center;">有效日期</th>
					<th align="center" style="width:40px;text-align:center;">二维码</th>
					<th align="center" style="width:40px;text-align:center;">查询次数</th>

					<th style="width:80px;text-align:center;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td class="row-first"><input type="checkbox" name="select[]" value="<?php  echo $row['id'];?>" /></td>
						<td align="center" style="text-align:center;"><?php  echo $row['id'];?></td>
                        <td align="center" style="text-align:center;"><?php  echo $row['code'];?></td>
						<td align="center" style="font-size:12px; color:#666;text-align:center;"><?php  echo $row['type'];?></td>
						<td align="center" style="font-size:12px; color:#666;text-align:center;"><?php  echo $row['brand'];?></td>
						<td align="center" style="font-size:12px; color:#666;text-align:center;"><?php  echo $row['spec'];?></td>
						<td align="center" style="font-size:12px; color:#666;text-align:center;"><?php  echo $row['weight'];?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $row['factory'];?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $row['remarks'];?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $row['creditname'];?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $row['creditnum'];?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  if($row['creditstatus'] == 1) { ?>已发放<?php  } else { ?>未发放<?php  } ?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo date('Y-m-d', $row['createtime'])?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><a href="<?php echo './index.php?c=platform&a=url2qr&do=qr&url='.  $row['url'];  ?>" target=_blank><img src="<?php echo './index.php?c=platform&a=url2qr&do=qr&url='.  $row['url'] ; ?>"  width=20 /></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $row['num'];?></td>
						<td style="text-align:center;">
                        	<a href="<?php  echo $this->createWebUrl('Frozen',array('id'=>$row['id']));?>" onclick="return confirm('更改为冻结状态后不可恢复,确定要设为冻结状态?')" >冻结查询</a>|<a href="<?php  echo $this->createWebUrl('Delete',array('id'=>$row['id']));?>" onclick="return confirm('删除记录后不可恢复,确定要删除吗?')" >删除记录</a>
                        </td>
					</tr>
				<?php  } } ?>
					<tr>
						<td><input type="checkbox" id="checkall" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
						<td colspan="10">
							<input name="Deleteall" class="btn btn-primary" value="删除" type="submit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input name="Frozenall" class="btn btn-primary" value="冻结" type="submit"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
					</tr>
			</tbody>
		</table>
	</form>
		<?php  echo $pager;?>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>