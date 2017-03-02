<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
.label{cursor:pointer;}
</style>
<div class="main">
	<ul class="nav nav-tabs">
		<li<?php  if($_GPC['do'] == 'manage') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>">管理幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加拆礼盒活动</a></li>
		<li<?php  if($_GPC['do'] == 'fansdata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('fansdata',array('rid' => $rid));?>">参与粉丝</a></li>
		<li<?php  if($_GPC['do'] == 'sharedata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('sharedata',array('rid' => $rid));?>">分享数据</a></li>
		<li<?php  if($_GPC['do'] == 'prizedata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('prizedata',array('rid' => $rid));?>">中奖名单</a></li>		
		<li<?php  if($_GPC['do'] == 'rankdata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('rankdata',array('rid' => $rid));?>">粉丝排行</a></li>
		<li<?php  if($_GPC['do'] == 'trend') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('trend',array('rid' => $rid));?>">活动分析</a></li>
		<li<?php  if($_GPC['do'] == 'posttmplmsg') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('posttmplmsg',array('rid' => $rid));?>">消息通知</a></li>
		<?php  if($stonefish_branch) { ?><li<?php  if($_GPC['do'] == 'branch') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('branch',array('rid' => $rid));?>">商家赠送项</a></li><?php  } ?>
		<li><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_scratch', 'rid' => $rid));?>">编辑幸运刮刮卡</a></li>
	</ul>
    <div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="stonefish_scratch" />
        	<input type="hidden" name="do" value="posttmplmsg" />
        	<input type="hidden" name="rid" value="<?php  echo $_GPC['rid'];?>" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">粉丝昵称</label>
				<div class="col-xs-12 col-sm-8 col-lg-4">
					<input class="form-control" name="nickname" id="" type="text" value="<?php  echo $_GPC['nickname'];?>" placeholder="粉丝昵称"> 
				</div>			
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">真实姓名</label>
				<div class="col-xs-12 col-sm-8 col-lg-4">
					<input class="form-control" name="realname" id="" type="text" value="<?php  echo $_GPC['realname'];?>" placeholder="真实姓名"> 
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">手机号码</label>
				<div class="col-xs-12 col-sm-8 col-lg-4">
					<input class="form-control" name="mobile" id="" type="text" value="<?php  echo $_GPC['mobile'];?>" placeholder="手机号码"> 
				</div>
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">中奖状态</label>
				<div class="col-xs-12 col-sm-8 col-lg-4">
					<select name="zhongjiang" class="form-control" style="float:left">
                    	<option value="" <?php  if($_GPC['zhongjiang']=='') { ?>selected<?php  } ?>>全部</option>
                        <option value="1" <?php  if($_GPC['zhongjiang']=='1') { ?>selected<?php  } ?>>未中奖</option>
						<option value="2" <?php  if($_GPC['zhongjiang']=='2') { ?>selected<?php  } ?>>已中奖</option>
						<option value="3" <?php  if($_GPC['zhongjiang']=='3') { ?>selected<?php  } ?>>虚拟奖</option>						
                	</select>
				</div>
                <div class=" col-xs-12 col-sm-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">
	消息模板发送记录　共计：<?php  echo $total;?>条
</div>
<div style="position:relative">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="position:relative">
			<thead class="navbar-inner">
				<tr>
					<th style="width:50px;">头像</th>
					<th style="width:120px;">真实姓名</th>
					<th style="width:120px;">手机号码</th>
					<th>消息内容</th>
					<th style="width:150px;">发送时间</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<tr>
					<td><img src="<?php  if(substr($row['avatar'],-1)=='0') { ?><?php  echo rtrim(toimage($row['avatar']), '0').$reply['poweravatar']?><?php  } else { ?><?php  echo toimage($row['avatar'])?><?php  } ?>" width="30"></td>
					<td><?php  if(!empty($row['realname'])) { ?><?php  echo $row['realname'];?><?php  } else { ?><?php  echo stripcslashes($row['nickname'])?><?php  } ?></td>
					<td><?php  echo $row['mobile'];?></td>
					<td><?php  echo $row['template_name'];?></td>
					<td><?php  echo date('Y/m/d H:i',$row['createtime']);?></td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<?php  echo $pager;?>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>