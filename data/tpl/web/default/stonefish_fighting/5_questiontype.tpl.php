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
		<a href="<?php  echo $this->createWebUrl('questiontype');?>" class='btn btn-danger' style="margin:0px 15px;"  title="题库分类设置"><i class='fa fa-plus'></i> 题库分类设置</a>
	</div>
    <!-- 题库分类设置 -->
    <div class="clearfix">
		<?php  if($op == 'category') { ?>
		<form action="" method="post" onsubmit="return formcheck(this)">
		<div class="panel panel-default">
		<div class="panel-heading">
			题库分类配置
		</div>
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th style="width:10%; text-align:center;">显示顺序</th>
					<th style="width:40%;">分类名称</th>
					<th style="width:10%;text-align:center;">题库数</th>
					<th style="width:30%; text-align:center">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($category)) { foreach($category as $row) { ?>
				<tr>
					<td class="text-center"><input type="text" class="form-control" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
					<td class="text-left"><div style="height:30px;line-height:30px"><?php  echo $row['gname'];?>&nbsp;&nbsp;<?php  if(empty($row['parentid']) && ($row['uniacid']!=0 || $_W['role']=='founder')) { ?><a href="<?php  echo $this->createWebUrl('questiontype', array('op'=>'postcategory','parentid' => $row['id']));?>" title="添加子分类"><i class="fa fa-plus"></i></a><?php  } ?></div></td>					
					<td class="text-center"><a href="<?php  echo $this->createWebUrl('questions',array('questiontype'=>$row['id']));?>"><?php  echo $row['total'];?></a></td>
					<td class="text-center">
						<?php  if($row['uniacid']!=0 || $_W['role']=='founder') { ?><a href="<?php  echo $this->createWebUrl('questiontype', array('op'=>'postcategory','id' => $row['id']));?>" title="编辑" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i></a>
						<a href="<?php  echo $this->createWebUrl('questiontype', array('op'=>'delcategory','id' => $row['id']));?>" onclick="return confirm('确认删除此分类吗？');return false;" title="删除" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a><?php  } else { ?>系统分类<?php  } ?>
					</td>
				</tr>
				<?php  if(is_array($children[$row['id']])) { foreach($children[$row['id']] as $row1) { ?>
				<tr>
					<td class="text-center"><input type="text" class="form-control" name="displayorder[<?php  echo $row1['id'];?>]" value="<?php  echo $row1['displayorder'];?>"></td>
					<td class="text-left"><div style="padding-left:50px;height:30px;line-height:30px;background:url('./resource/images/bg_repno.gif') no-repeat -245px -545px;"><?php  echo $row1['gname'];?>&nbsp;&nbsp;<?php  if(empty($row1['parentid']) && ($row1['uniacid']!=0 || $_W['role']=='founder')) { ?><a href="<?php  echo $this->createWebUrl('questiontype', array('op'=>'postcategory','parentid' => $row1['id']));?>"><i class="fa fa-plus" title="添加子分类"></i></a><?php  } ?></div></td>
					<td class="text-center"><a href="<?php  echo $this->createWebUrl('questions',array('questiontype'=>$row['id']));?>"><?php  echo $row1['total'];?></a></td>
					<td class="text-center">
						<?php  if($row['uniacid']!=0 || $_W['role']=='founder') { ?><a href="<?php  echo $this->createWebUrl('questiontype', array('op'=>'postcategory','id' => $row1['id'], 'parentid' => $row1['parentid']));?>" title="编辑" class="btn btn-default btn-sm"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top"></i></a>
						<a href="<?php  echo $this->createWebUrl('questiontype', array('op'=>'delcategory','id' => $row1['id']));?>" onclick="return confirm('确认删除此分类吗？');return false;" title="删除" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a><?php  } else { ?>系统分类<?php  } ?>
					</td>
				</tr>
				<?php  } } ?>
			<?php  } } ?>
				<tr>
					<td colspan="4">
						<a href="<?php  echo $this->createWebUrl('questiontype',array('op'=>'postcategory'));?>"><i class="fa fa-plus-circle" title="添加新分类"></i> 添加新分类</a>
					</td>
				</tr>
			</tbody>
		</table>
		</div>
		</div>
			<div class="form-group col-sm-12">
				<input name="submit" type="submit" class="btn btn-primary col-lg-1" value="提交">
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</div>
		</form>
		<?php  } ?>
		<?php  if($op == 'postcategory') { ?>
		<form action="" method="post" class="form-horizontal form" id="form1">
	    <input type="hidden" name="parentid" value="<?php  echo $parent['id'];?>" />
		<div class="panel panel-default">
			<div class="panel-heading">分类详细设置</div>
			<div class="panel-body">
				<?php  if(!empty($parentid)) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">上级分类</label>
					<div class="col-sm-8 col-xs-12">
						<div class="form-control-static"><?php  echo $parent['gname'];?></div>
					</div>
				</div>
				<?php  } ?>
				<?php  if($category['enabled']) { ?>
				<input type="hidden" name="uniacid" value="0" />
				<input type="hidden" name="enabled" value="1" />
				<?php  } else { ?>
				<input type="hidden" name="enabled" value="0" />
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">类型</label>
					<div class="col-sm-9">
						<label class="radio-inline">
                	        <input type="radio" name="uniacid" value="<?php  echo $uniacid;?>" <?php  if($category['uniacid']) { ?> checked="checked"<?php  } ?>/>私库
                        </label>
                        <label class="radio-inline">
                	        <input type="radio" name="uniacid" value="0" <?php  if($category['uniacid'] == 0) { ?> checked="checked"<?php  } ?>/>公库
                        </label>
					</div>
				</div>
				<?php  } ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">排序</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" name="displayorder" class="form-control" value="<?php  echo $category['displayorder'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">分类名称</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" name="gname" class="form-control" value="<?php  echo $category['gname'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">分类描述</label>
					<div class="col-sm-8 col-xs-12">
						<textarea name="description" class="form-control" cols="70"><?php  echo $category['description'];?></textarea>
					</div>
				</div>				
		    </div>
		</div>

	    <div class="form-group">
		<div class="col-sm-12">
			<input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-2">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	    </div>
	    </form>
		<?php  } ?>
</div>
<script type="text/javascript">
	require(['jquery.ui', 'bootstrap.switch', 'util'], function($, $, u){
		$(function(){
			$(":checkbox[name='flag']").bootstrapSwitch();
			$(':checkbox').on('switchChange.bootstrapSwitch', function(e, state){
				$this = $(this);
				var status = this.checked ? 1 : 0;
				$.post(location.href, {status:status}, function(resp){
					if(resp != 'success') {
						u.message('操作失败, 请稍后重试.')
					} else {
						u.message('操作成功', location.href, 'success');
					}
				});
			});
			$('.btn').hover(function(){
				$(this).tooltip('show');
			},function(){
				$(this).tooltip('hide');
			});
		});		
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>