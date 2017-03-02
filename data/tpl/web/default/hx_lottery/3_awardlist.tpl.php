<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('list');?>">活动列表</a></li>
	<li><a href="./index.php?c=platform&a=reply&do=post&m=hx_lottery">添加活动</a></li>
	<li class="active"><a href="">中奖记录</a></li>
</ul>
<form method="post" action="" role="form">
	<input name="submit" type="submit" value="导出EXCEL" class="btn btn-primary">
	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
</form>

	<div style="padding:15px;">
		<form action="" method="post">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th align="center" style="width:20px;text-align:center;">ID</th>						
                    <th align="center" style="width:30px;text-align:center;">uid</th>
                    <th align="center" style="width:30px;text-align:center;">姓名</th>
                    <th align="center" style="width:50px;text-align:center;">电话号</th>
					<th align="center" style="width:80px;text-align:center;">说明</th>
					<th align="center" style="width:60px;text-align:center;">级别</th>
					<th align="center" style="width:60px;text-align:center;">中奖时间</th>
					<th align="center" style="width:60px;text-align:center;">操作时间</th>
					<th style="width:80px;text-align:center;">状态</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<?php  $profile = mc_fetch($row['uid']);?>
					<tr>		
						<td align="center" style="text-align:center;"><?php  echo $row['id'];?></td>
                        <td align="center" style="text-align:center;<?php  if($row['status'] == '0') { ?>color:red;<?php  } ?>"><?php  echo $row['uid'];?></td>
                        <td align="center" style="text-align:center;"><?php  echo $profile['realname'];?></td>
                        <td align="center" style="text-align:center;"><?php  echo $profile['mobile'];?></td>
						<td align="center" style="font-size:12px; color:#666text-align:center;"><?php  echo $row['name'];?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;">奖品<?php  echo $row['level'];?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo date('Y-m-d H:i:s',$row['createtime'])?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo date('Y-m-d H:i:s',$row['consumetime'])?></td>
						<td style="text-align:center;"><?php  if($row['status'] == 1) { ?>操作成功<?php  } ?>
                        </td>
					</tr>
					<?php  unset($profile);?>
				<?php  } } ?>
			</tbody>
		</table>
	</form>
		<?php  echo $pager;?>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>