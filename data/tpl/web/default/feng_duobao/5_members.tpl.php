<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<ul class="nav nav-tabs">
	<li class="active"><a>会员信息列表</a></li>
</ul>
	<div class="panel panel-default">
		<div class="panel-heading">会员列表</div>
		<div class="panel-body">
			<div class="table-responsive panel-body">
				<table class="table table-hover" style="min-width: 300px;">
					<thead class="navbar-inner">
						<tr>
							<th style="width:50px;">ID</th>
							<th style="width:220px;">用户from_user</th>
							<th style="width:120px;">用户昵称</th>
							<th style="width:120px;">真实姓名</th>
							<th style="width:120px;">电话</th>
							<th style="width:400px;">地址</th>
						</tr>
					</thead>
						<?php  if(is_array($members)) { foreach($members as $memberid => $member) { ?>
						<tr>
							<td><?php  echo $member['id'];?></td>
							<td><?php  echo $member['from_user'];?></td>
							<td><?php  echo $member['nickname'];?></td>
							<td><?php  echo $member['realname'];?></td>
							<td><?php  echo $member['mobile'];?></td>
							<td><?php  echo $member['address'];?></td>
						</tr>
						<?php  } } ?>
						<?php  if(empty($members)) { ?>
						<tr>
							<td colspan="8">
								没有会员信息
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