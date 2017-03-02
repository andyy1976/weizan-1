<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('list');?>">活动列表</a></li>
	<li><a href="./index.php?c=platform&a=reply&do=post&m=hx_lottery">添加活动</a></li>
</ul>	
	<div style="padding:15px;">
		<form action="" method="post">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th align="center" style="width:20px;text-align:center;">ID</th>						
                    <th align="center" style="width:100px;text-align:center;">活动标题</th>
					<th align="center" style="width:40px;text-align:center;">活动时间</th>
					<th align="center" style="width:80px;text-align:center;">综合中奖率</th>
					<th align="center" style="width:60px;text-align:center;">参与人数</th>
					<th align="center" style="width:40px;text-align:center;">中奖人次</th>
					<th style="width:80px;text-align:center;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>		
						<td align="center" style="text-align:center;"><?php  echo $row['id'];?></td>
                        <td align="center" style="text-align:center;<?php  if($row['status'] == '0') { ?>color:red;<?php  } ?>"><?php  echo $row['title'];?></td>
						<td align="center" style="font-size:12px; color:#666text-align:center;"><?php  echo date('Y-m-d',$row['starttime'])?><br /><?php  echo date('Y-m-d',$row['endtime'])?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $row['rate'];?>%</td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $this->getfansnum($row['id'])?></td>
						<td align="center" style="font-size:12px; color:#666; text-align:center;"><?php  echo $this->getawardnum($row['id'])?></td>
						<td style="text-align:center;">
                        	<a href="./index.php?c=platform&a=reply&do=post&m=hx_lottery&rid=<?php  echo $row['rid'];?>">编辑</a>
                        	<a href="<?php  echo $this->createWebUrl('awardlist',array('reply_id'=>$row['id']))?>">中奖记录</a>
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