<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li<?php  if($_GPC['do'] == 'manage') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>"> 管理一站到底活动</a></li>
		<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_fighting'));?>"><i class="fa fa-plus"></i> 添加一站到底活动</a></li>
		<li<?php  if($_GPC['do'] == 'template') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('template');?>"> 管理活动模板</a></li>
        <li<?php  if($_GPC['do'] == 'templatepost') { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/templatepost',array('m'=>'stonefish_fighting'));?>"><i class="fa fa-plus"></i> 添加活动模板</a></li>
		<li<?php  if($_GPC['do'] == 'tmplmsg') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('tmplmsg');?>"> 管理消息模板</a></li>
        <li<?php  if($_GPC['do'] == 'tmplmsgpost') { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/tmplmsgpost',array('m'=>'stonefish_fighting'));?>"><i class="fa fa-plus"></i> 添加消息模板</a></li>
		<li<?php  if($_GPC['do'] == 'questions' || $_GPC['do'] == 'questiontype' || $_GPC['do'] == '') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('questions');?>"> 管理题库</a></li>
        <li<?php  if($_GPC['do'] == 'questionspost') { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/questionspost',array('m'=>'stonefish_fighting'));?>"><i class="fa fa-plus"></i> 添加题库问题</a></li>
	</ul>
	<div class="alert alert-info">
	    <a href="<?php  echo $this->createWebUrl('questions');?>" title="留言记录" class="btn btn-primary"><i class="fa fa-refresh"></i> 题库管理</a>
		<a href="<?php  echo url('site/entry/questionspost',array('m'=>'stonefish_fighting'));?>" class="btn btn-primary" style="margin:0px 15px;"><i class="fa fa-plus"></i> 添加题库问题</a>
		<a href="<?php  echo $this->createWebUrl('questiontype');?>" class='btn btn-danger' title="题库分类设置"><i class='fa fa-plus'></i> 题库分类设置</a>
	</div>
	<?php  if($_W['role']=='founder') { ?>
	<div class="alert alert-info">
		初此安装本模块，可联系到系统论坛下载2万多题库（此内容只有创始人可见）
	</div>
	<?php  } ?>
    <div class="panel panel-info">
	<div class="panel-heading">筛选 共计：<?php  echo $total;?>道题库 每页<?php  echo $psize;?>道题库</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="stonefish_fighting" />
        	<input type="hidden" name="do" value="questions" />
			<div class="form-group">
			    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">题库分类</label>
				<div class="col-xs-12 col-sm-5 col-lg-4">
					<select name="questiontype" class="form-control" style="float:left">
                        <option value="" <?php  if($_GPC['questiontype']=='') { ?>selected<?php  } ?>>全部</option>
						<?php  if(is_array($questiontype)) { foreach($questiontype as $questiontypes) { ?>
						<option value="<?php  echo $questiontypes['id'];?>" <?php  if($_GPC['questiontype']==$questiontypes['id']) { ?>selected<?php  } ?>><?php  echo $questiontypes['gname'];?></option>						
						<?php  } } ?>
                	</select>
				</div>
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
				<div class="col-xs-12 col-sm-5 col-lg-4">
					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
				</div>
                <div class=" col-xs-12 col-sm-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div>
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
					<th style="width:10%">题库类型</th>
					<th style="width:50%">问题名称</th>
					<th style="width:10%">分值</th>
					<th style="width:10%">类型</th>
					<th style="width:20%;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<tr>
					<td><?php  echo $row['questiontype'];?></td>
					<td><?php  echo $row['question'];?></td>
					<td><a href="javascript:void(0)" id="<?php  echo $row['id'];?>" class="btn btn-default btn-sm userinfo" style="width:60px;" data-toggle="tooltip" data-placement="top" title="查看题库"><i class="fa fa-calendar"></i> <?php  echo $row['figure'];?></a></td>
					<td><?php  if($row['public']) { ?>公库<?php  } else { ?>私有<?php  } ?></td>
					<td><?php  if($row['uniacid']==0 && $_W['role']!='founder') { ?><a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="#" title="系统题库不可编辑"><i class="fa fa-cog"></i> 系统题库</a><?php  } else { ?><a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="<?php  echo $this->createWeburl('questionspost',array('id'=>$row['id']))?>" title="编辑"><i class="fa fa-edit"></i> 编辑</a>  <a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="<?php  echo $this->createWeburl('questionsdel',array('id'=>$row['id']))?>" title="删除"><i class="fa fa-times"></i> 删除</a><?php  } ?></td>
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
<div id="guanbi" class="hide">
	<span type="button" class="pull-right btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</span>
</div>
<script>
	require(['jquery', 'util'], function($, u){
		$('.userinfo').click(function(){
			var uid = parseInt($(this).attr('id'));
			$.get("<?php  echo url('site/entry/questionsview',array('m' => 'stonefish_fighting'))?>&uid=" + uid, function(data){
				if(data == 'dataerr') {
					u.message('未找到指定题库内容', '', 'error');
				} else {
					var obj = u.dialog('题库问题', data, $('#guanbi').html());
				}
				obj.modal('show');
			});
		});		
	});	
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>