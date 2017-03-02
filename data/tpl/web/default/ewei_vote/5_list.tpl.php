<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>

<form action="<?php  echo $_W['siteurl']?>" method="post">
	<div class="main">
		<div class="panel panel-default">
			<div class="panel-heading">
				投票记录<span class="pull-right" style="color:red;">
				投票记录总数：<?php  echo count($list);?></span>
			</div>
			<div class="panel-body table-responsive">
				<table class="table table-hover">
					<thead>
					<tr>
						<th>用户</th>
						<th>昵称</th>
						<th>投票项</th>
						<th>投票时间</th>
					</tr>
					</thead>
					<tbody>
					<?php  if(is_array($list)) { foreach($list as $v) { ?>
					<tr>
						<td>
							<?php  echo $v['from_user'];?>
						</td>
						<td>
							<?php  if(empty($v['nickname'])) { ?>
							<span class="label label-danger">未完善</span>
							<?php  } else { ?>
							<?php  echo $v['nickname'];?>
							<?php  } ?>
						</td>
						<td>
							<?php  echo $v['options'];?>
						</td>
						<td>
							<?php  echo date('Y-m-d H:i:s',$v['votetime']);?>
						</td>
					</tr>
					<?php  } } ?>
					</tbody>
				</table>
				<?php  echo $pager;?>
			</div>
		</div>
		<a href="" class="btn btn-default">刷 新</a>
		<a href="javascript:;" class="btn btn-default" onclick="history.back();">返 回</a>
		<button type="submit" name="export" class="btn btn-default" value="export"><i class="fa fa-download"></i> 导出数据</button>
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
	</div>
</form>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>