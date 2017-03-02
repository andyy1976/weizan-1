<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li<?php  if($_GPC['do'] == 'manage') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>"> 管理幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'template') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('template');?>"> 管理活动模板</a></li>
        <li<?php  if($_GPC['do'] == 'templatepost') { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/templatepost',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加活动模板</a></li>
		<li<?php  if($_GPC['do'] == 'tmplmsg' || $_GPC['do'] == '' ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('tmplmsg');?>"> 管理消息模板</a></li>
        <li<?php  if($_GPC['do'] == 'tmplmsgpost') { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/tmplmsgpost',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加消息模板</a></li>
	</ul>
	<div class="alert alert-info"><a href="http://bbs.012wz.com" target="_blank">消息模板说明</a></div>
    <div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="stonefish_moban" />
        	<input type="hidden" name="do" value="tmplmsg" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
				<div class="col-xs-12 col-sm-8 col-lg-9">
					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
				</div>
                <div class=" col-xs-12 col-sm-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div>
			</div>
 			<div class="form-group">
			</div>
		</form>
	</div> 
    </div>    
</div>
<div class="panel panel-default">
<div style="position:relative">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="position:relative">
			<thead class="navbar-inner">
				<tr>
					<th style="width:40%">模板名称</th>
					<th style="width:40%;">模板ID</th>
					<th style="width:20%;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<tr>
					<td><?php  echo $row['template_name'];?></td>					
					<td><?php  echo $row['template_id'];?></td>
					<td><a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="<?php  echo $this->createWeburl('tmplmsgpost',array('id'=>$row['id']))?>" title="编辑"><i class="fa fa-edit"></i> 编辑</a>  <a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="<?php  echo $this->createWeburl('tmplmsgdel',array('id'=>$row['id']))?>" title="删除"><i class="fa fa-times"></i> 删除</a></td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
</div>
</div>
<?php  echo $pager;?>
</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>