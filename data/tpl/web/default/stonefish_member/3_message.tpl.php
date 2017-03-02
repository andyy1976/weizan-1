<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('level');?>">等级头衔</a></li>
	<li><a href="<?php  echo $this->createWebUrl('sms');?>">短信中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('signin');?>">签到中心</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('message');?>">消息中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('feedback');?>">留言中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('task');?>">任务中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('member');?>">会员中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('template');?>">会员模板</a></li>
	<li><a href="<?php  echo $this->createWebUrl('fanslog');?>">粉丝统计</a></li>
	<li><a href="<?php  echo $this->createWebUrl('memberlog');?>">会员统计</a></li>
</ul>
	<div class="alert alert-info">
	    <a href="<?php  echo $this->createWebUrl('message',array('op'=>'display'));?>" title="消息管理" class="btn btn-primary"><i class="fa fa-refresh"></i> 消息管理</a>
		<a href="<?php  echo $this->createWebUrl('message',array('op'=>'post'));?>" class='btn btn-danger' style="margin:0px 15px;"  title="群发消息"><i class='fa fa-plus'></i> 群发消息</a>
		<a href="<?php  echo $this->createWebUrl('message',array('op'=>'postalone'));?>" class='btn btn-danger' title="单发消息"><i class='fa fa-plus'></i> 单发消息</a>
	</div>
<?php  if($op == 'postalone') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
		<div class="panel panel-default" id="step1">
			<div class="panel-heading">
				单发消息
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息标题</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="title" value="<?php  echo $item['title'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息期限</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_daterange('datelimit', array('start' => date('Y-m-d', $item['starttime']),'end' => date('Y-m-d', $item['endtime'])), '')?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">选择会员</label>
					<div class="col-sm-9 input-group input-medium" style="padding:0 15px;">
                        <span class="input-group-addon">请选择会员UID</span>
                        <input class="form-control" type="text" name="uid" value="<?php  echo $uid;?>" />
						<span class="input-group-addon" onclick="$('#modal-module-menus').modal('show');" style="cursor:pointer;">选择会员</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息图标</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_image('thumb', $item['thumb'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息内容</label>
					<div class="col-sm-9">
						<textarea style="height:200px;" class="form-control richtext" name="description" cols="70"><?php  echo $item['description'];?></textarea>
					</div>
				</div>
			</div>
		</div>		
		<div class="form-group col-sm-12">
			<input name="submit" id="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
			<input name="id" type="hidden" value="<?php  echo $item['messageid'];?>">
			<input type="hidden" name="postalone" value="postalone" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>
<!-- 选择UID -->
<div id="modal-module-menus" class="modal fade in" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>选择会员</h3>
            </div>
            <div class="modal-body">
                <div class="form-group" style=" height:30px;">
                    <label class="col-xs-12 col-sm-2 control-label">昵称/姓名</label>
                    <div class="col-sm-10">
                        <div class="input-group input-medium">
                            <input class="form-control" type="text" name="keyword" id="search-kwd" value="" placeholder="输入搜索关键字">
                            <span class="input-group-btn"><button class="btn btn-default btn-browser" type="button" onclick="search_entries();">搜索</button></span>
						</div>
                    </div>
                </div>
                <div id="module-menus"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<!-- 选择UID -->
<script type="text/javascript">
	/*获取选择UID信息*/
	function search_entries() {
		var kwd = $.trim($('#search-kwd').val());
		$.post('<?php  echo $this->createWebUrl('query');?>', {keyword: kwd}, function(dat){
			$('#module-menus').html(dat);
		});
	}
	function select_entry(o) {
		$(':text[name="uid"]').val(o.uid);
		$('#modal-module-menus').modal('hide');
	}
	/*获取选择UID信息*/
	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('.richtext')[0]);
		});
		
		$("#form1").submit(function(){
			    if($.trim($(':text[name="title"]').val()) == "") {
					u.message("请填写消息标题",'','error');
					return false;
				}
				if($.trim($(':text[name="uid"]').val()) == "") {
					u.message("请选择会员",'','error');
					return false;
				}
				if($.trim($('input[name="thumb"]').val()) == "") {
					u.message("上传消息缩略图",'','error');
					return false;
				}
			return true;
		});	
	});
</script>
<?php  } else if($op == 'post') { ?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
		<div class="panel panel-default" id="step1">
			<div class="panel-heading">
				群发消息
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息标题</label>
					<div class="col-sm-9">
						<input class="form-control" type="text" name="title" value="<?php  echo $item['title'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息期限</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_daterange('datelimit', array('start' => date('Y-m-d', $item['starttime']),'end' => date('Y-m-d', $item['endtime'])), '')?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">选择会员组</label>
					<div class="col-sm-9">
						<select class="form-control" multiple="multiple" name="group[]">
							<?php  if($group) { ?>
							<?php  if(is_array($group)) { foreach($group as $li) { ?>
							<option value="<?php  echo $li['groupid'];?>" <?php  if($li['groupid_select'] == '1') { ?>selected<?php  } ?>><?php  echo $li['title'];?></option>
							<?php  } } ?>
							<?php  } ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息图标</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_image('thumb', $item['thumb'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息内容</label>
					<div class="col-sm-9">
						<textarea style="height:200px;" class="form-control richtext" name="description" cols="70"><?php  echo $item['description'];?></textarea>
					</div>
				</div>
			</div>
		</div>	
		
		<div class="form-group col-sm-12">
			<input name="submit" id="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
			<input name="id" type="hidden" value="<?php  echo $item['messageid'];?>">
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>
<script type="text/javascript">
	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('.richtext')[0]);
		});
		
		$("#form1").submit(function(){
			    if($.trim($(':text[name="title"]').val()) == "") {
					u.message("请填写群发消息标题",'','error');
					return false;
				}				
				if($.trim($('select[name="group[]"]').val()) == "") {
					u.message("请选择可使用的会员组",'','error');
					return false;
				}
				if($.trim($('input[name="thumb"]').val()) == "") {
					u.message("上传群发消息缩略图",'','error');
					return false;
				}
			return true;
		});
	});
</script>
<?php  } else if($op == 'display') { ?>
<div class="main">
	<div class="panel panel-info">
	<div class="panel-heading">群发消息筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
		<input type="hidden" name="c" value="site" />
		<input type="hidden" name="a" value="entry" />
		<input type="hidden" name="do" value="message" />
		<input type="hidden" name="m" value="stonefish_member" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
				<div class="col-sm-7 col-lg-9">
					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
				</div>
			</div>			
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">会员组</label>
				<div class="col-sm-7 col-lg-9">
					<select name="groupid" class="form-control">
						<option value="0">不限</option>
						<?php  if(is_array($groupall)) { foreach($groupall as $li) { ?>
							<option <?php  if($_GPC['groupid'] == $li['groupid']) { ?>selected<?php  } ?> value="<?php  echo $li['groupid'];?>"><?php  echo $li['title'];?></option>
						<?php  } } ?>
					</select>
				</div>
				<div class="pull-right col-xs-12 col-sm-3 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div>
			</div>
			<div class="form-group">
			</div>
		</form>
	</div>
</div>
<div class="panel panel-default">
	<div class="table-responsive panel-body">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:80px;">缩略图</th>
					<th>群发消息标题</th>					
					<th style="min-width:200px;">所属状态</th>
					<th style="width:200px;">有效时间</th>
					<th style="width:100px;">查看人次</th>
					<th style="text-align:right; width:150px;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td><img src="<?php  echo $item['thumb'];?>" width="40"></td>
					<td><?php  echo $item['title'];?></td>
					<td><?php  echo $item['grouptitle'];?></td>
					<td><?php  echo date('Y-m-d', $item['starttime'])?> 至 <?php  echo date('Y-m-d', $item['endtime'])?></td>
					<td><?php  echo $item['view'];?></td>
					<td style="text-align:right;">
					    <?php  if($item['uid']) { ?>
						<a href="<?php  echo url('site/entry/message', array('id' => $item['messageid'], 'op' => 'postalone', 'm' => 'stonefish_member'))?>" data-toggle="tooltip" data-placement="top" title="编辑" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a>
					    <?php  } else { ?>
						<a href="<?php  echo url('site/entry/message', array('id' => $item['messageid'], 'op' => 'post', 'm' => 'stonefish_member'))?>" data-toggle="tooltip" data-placement="top" title="编辑" class="btn btn-default btn-sm"><i class="fa fa-edit"></i></a><?php  } ?>
						<a href="<?php  echo url('site/entry/message', array('id' => $item['messageid'], 'op' => 'del', 'm' => 'stonefish_member'))?>" onclick="return confirm('此操作不可恢复，确认删除？');return false;" data-toggle="tooltip" data-placement="top" title="删除" class="btn btn-default btn-sm"><i class="fa fa-times"></i></a>
						<a href="<?php  echo url('site/entry/message', array('messageid' => $item['messageid'], 'op' => 'record', 'm' => 'stonefish_member'))?>" data-toggle="tooltip" data-placement="top" title="查看记录" class="btn btn-default btn-sm"><i class="fa fa-clock-o"></i></a>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
		</div>
	</div>
	<?php  echo $pager;?>
</div>
<?php  } else if($op == 'record') { ?>
<div class="main">
	<div class="panel panel-info">
		<div class="panel-heading">筛选</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="op" value="record">			
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
			<input type="hidden" name="do" value="message" />
			<input type="hidden" name="m" value="stonefish_member" />
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息标题</label>
					<div class="col-sm-6 col-lg-8">
						<select class="form-control" name="messageid">
							<option value="0">不限</option>
							<?php  if(is_array($coupons)) { foreach($coupons as $coupon) { ?>
								<option value="<?php  echo $coupon['messageid'];?>" <?php  if($_GPC['messageid'] == $coupon['messageid']) { ?>selected<?php  } ?>><?php  echo $coupon['title'];?></option>
							<?php  } } ?>
						</select>	
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">用户ID</label>
					<div class="col-sm-6 col-lg-8">
						<input class="form-control" name="uid" id="" type="text" value="<?php  echo $_GPC['uid'];?>">	
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">查看日期</label>
					<div class="col-sm-6 col-lg-8">
						<?php  echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d', $starttime),'endtime'=>date('Y-m-d', $endtime)));?>
					</div>
					<div class="pull-right col-xs-12 col-sm-3 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>
<div class="panel panel-default">
	<div class="table-responsive panel-body">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:80px; text-align:center;">用户ID</th>
					<th style="width:100px; text-align:center;">昵称</th>
					<th style="width:180px; text-align:center;">标题</th>
					<th style="width:150px; text-align:center;">图标</th>
					<th style="width:200px; text-align:center;">查看时间</th>
					<th style="width:200px; text-align:center;">消息状态</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $item) { ?>
				<tr>
					<td class="text-center"><?php  echo $item['uid'];?></td>
					<td class="text-center"><?php  echo $item['nickname'];?></td>
					<td class="text-center"><?php  echo $item['title'];?></td>
					<td class="text-center"><img src="<?php  echo $item['thumb'];?>" style="max-width:50px; max-height: 30px;"></td>
					<td class="text-center"><?php  echo date('Y-m-d H:i', $item['granttime'])?></td>
					<td class="text-center">
						<?php  if($item['status'] == 1) { ?>
							<span class="label label-success">未读</span>
						<?php  } else { ?>
							<span class="label label-danger">已读</span>
						<?php  } ?>
					</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
</div>
	<?php  echo $pager;?>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>