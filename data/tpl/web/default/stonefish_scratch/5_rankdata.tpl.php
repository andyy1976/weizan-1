<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
.label{cursor:pointer;}
</style>
<div class="main">
	<ul class="nav nav-tabs">
		<li<?php  if($_GPC['do'] == 'manage') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>">管理幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'fansdata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('fansdata',array('rid' => $rid));?>">参与粉丝</a></li>
		<li<?php  if($_GPC['do'] == 'sharedata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('sharedata',array('rid' => $rid));?>">分享数据</a></li>
		<li<?php  if($_GPC['do'] == 'prizedata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('prizedata',array('rid' => $rid));?>">中奖名单</a></li>		
		<li<?php  if($_GPC['do'] == 'rankdata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('rankdata',array('rid' => $rid));?>">粉丝排行</a></li>
		<li<?php  if($_GPC['do'] == 'trend') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('trend',array('rid' => $rid));?>">活动分析</a></li>
		<li<?php  if($_GPC['do'] == 'posttmplmsg') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('posttmplmsg',array('rid' => $rid));?>">消息通知</a></li>
		<?php  if($stonefish_branch) { ?><li<?php  if($_GPC['do'] == 'branch') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('branch',array('rid' => $rid));?>">商家赠送项</a></li><?php  } ?>
		<li><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_scratch', 'rid' => $rid));?>">编辑幸运刮刮卡</a></li>
	</ul>
<div class="panel panel-default">
<div class="panel-heading">
	<div class="row-fluid">
    	<div class="span8 control-group">
			<a class="btn btn-default<?php  if($_GPC['rank']=='sharenum' || $_GPC['rank']=='') { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('rankdata',array('rid'=>$rid,'rank'=>'sharenum'))?>">分享值排行榜</a>			
			<a class="btn btn-default<?php  if($_GPC['rank']=='award') { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('rankdata',array('rid'=>$rid,'rank'=>'award'))?>">中奖量排行榜</a>
			<a class="btn btn-warning">共计：<?php  echo $total;?>参与活动</a>
			<a class="btn btn-warning" style="float:right;" href="<?php  echo $this->createWebUrl('download',array('rid'=>$rid,rank=>$_GPC['rank'],'data'=>'rankdata'))?>"><i class="fa fa-download"></i> 导出<?php  echo $statustitle;?>排行榜</a>
        </div>
    </div>
</div>
<div style="position:relative">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="position:relative">
			<thead class="navbar-inner">
				<tr>
					<th style="width:50px;">排名</th>
					<th style="width:50px;">头像</th>
					<th style="width:100px;">真实姓名</th>
					<th style="width:100px;">手机号码</th>					
					<th style="width:100px;">奖品状态</th>
					<th style="width:100px;">助力情况</th>
					<th style="width:150px;">参与时间</th>
					<th style="width:50px;">分享值</th>
					<th style="width:50px;">中奖量</th>
				</tr>
			</thead>
			<tbody>
				<?php  $i=1;?>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<tr>
					<td><?php  echo $i+$psize*$_GPC['page']?></td>
					<td><img src="<?php  if(substr($row['avatar'],-1)=='0') { ?><?php  echo rtrim(toimage($row['avatar']), '0').$reply['poweravatar']?><?php  } else { ?><?php  echo toimage($row['avatar'])?><?php  } ?>" width="30"></td>
					<td><?php  if(!empty($row['realname'])) { ?><?php  echo $row['realname'];?><?php  } else { ?><?php  echo stripcslashes($row['nickname'])?><?php  } ?></td>
					<td><?php  echo $row['mobile'];?></td>
					<td><?php  if($row['zhongjiang']==0) { ?><span class="label label-default">未中奖
						<?php  } else if($row['zhongjiang']==1) { ?><span class="label label-warning">未兑换
						<?php  } else { ?><span class="label label-success">已兑奖<?php  } ?>
						<?php  if($row['xuni']==0) { ?>/真实</span>
						<?php  } else { ?>/虚拟</span><?php  } ?></td>
					<td><?php  if($row['share_num']==0) { ?>未成功分享<?php  } else { ?>助力情况[<?php  echo $row['sharenum'];?>]<?php  } ?></td>
					<td><?php  echo date('Y/m/d H:i',$row['createtime']);?></td>
					<td><?php  echo $row['sharenum'];?></td>
					<td><?php  echo $row['awardnum'];?></td>
				</tr>
				<?php  $i++;?>
				<?php  } } ?>				
			</tbody>
		</table>
	</div>
</div>
</div>
<?php  echo $pager;?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>