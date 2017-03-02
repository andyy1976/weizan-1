<?php defined('IN_IA') or exit('Access Denied');?><?php  $newUI = true;?>
	<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('mc/card-nav', TEMPLATE_INCLUDEPATH)) : (include template('mc/card-nav', TEMPLATE_INCLUDEPATH));?>
<div class="clearfix">
	<form action="" method="post" class="form-horizontal" role="form">
		<div class="panel panel-default">
			<div class="panel-body table-responsive">
				<table class="table table-hover">
					<thead>
					<tr>
						<th>会员姓名</th>
						<th>积分</th>
						<th>签到时间</th>
					</tr>
					</thead>
					<tbody>
					<?php  if(is_array($list)) { foreach($list as $sign) { ?>
					<tr>
						<td><?php  echo $sign['realname'];?></td>
						<td><?php  echo $sign['credit'];?></td>
						<td><?php  echo $sign['addtime'];?></td>
					</tr>
					<?php  } } ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php  echo $pager;?>
	</form>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
