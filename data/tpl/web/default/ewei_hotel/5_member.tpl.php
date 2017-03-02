<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<script language='javascript' src='<?php  echo $this->_script_url?>jquery.gcjs.js'></script>
<script language='javascript' src='<?php  echo $this->_script_url?>jquery.form.js'></script>
<script language='javascript' src='<?php  echo $this->_script_url?>tooltipbox.js'></script>
<div class="main">
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php  echo $this->createWebUrl('member',array('op'=>'list'));?>">用户管理</a></li>
		<li><a href="<?php  echo $this->createWebUrl('member',array('op'=>'edit'));?>">添加用户</a></li>
	</ul>
	<div class="panel panel-info">
		<div class="panel-heading">条件</div>
		<div class="panel-body">
			<form action="./index.php" method="get" class="form-horizontal" role="form">
				<input type="hidden" name="c" value="site" />
				<input type="hidden" name="a" value="entry" />
				<input type="hidden" name="m" value="ewei_hotel" />
				<input type="hidden" name="do" value="member" />
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">身份</label>
					<div class="col-sm-9 col-xs-12">
						<a href="<?php  echo url('site/entry', array('m' => 'ewei_hotel', 'do' => 'member', 'clerk' => 1))?>" class="btn <?php  if(!empty($_GPC['clerk'])) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>" style="width: 90px">店员</a>
						<a href="<?php  echo url('site/entry', array('m' => 'ewei_hotel', 'do' => 'member', 'clerk' => 0))?>" class="btn <?php  if(empty($_GPC['clerk'])) { ?>btn-primary<?php  } else { ?>btn-default<?php  } ?>">普通用户</a>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">姓名</label>
					<div class="col-xs-12 col-sm-8 col-lg-9">
						<input class="form-control" name="realname" type="text" value="<?php  echo $_GPC['realname'];?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">手机号</label>
					<div class="col-xs-12 col-sm-8 col-lg-9">
						<input class="form-control" name="mobile" type="text" value="<?php  echo $_GPC['mobile'];?>">
					</div>
					<div class=" col-xs-12 col-sm-2 col-lg-2">
						<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<div class="panel panel-default">
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
			<tr>
				<th style='width:30px' class='with-checkbox'>
					<input type="checkbox" class="check_all" />
				</th>
				<th style='width:100px'>序号</th>
				<th style='width:100px'>微信号</th>
				<th style='width:150px'>用户名</th>
				<th style='width:150px'>真实姓名</th>
				<th style='width:150px'>电话</th>
				<th style='width:150px'>加入时间</th>
				<th style="width:100px;">状态</th>
				<th style="width:200px;">操作</th>
			</tr>
			</thead>
			<tbody>
			<?php  if(is_array($list)) { foreach($list as $item) { ?>
			<tr>
				<td class="with-checkbox">
					<input type="checkbox" name="check" value="<?php  echo $item['id'];?>">
				</td>
				<td><?php  echo $item['id'];?></td>
				<td><?php  echo $item['from_user'];?></td>
				<td>
					<?php  if(empty($item['username'])) { ?>
					<span class="label label-danger">未完善</span>
					<?php  } else { ?>
					<?php  echo $item['username'];?>
					<?php  } ?>
				</td>
				<td>
					<?php  if(empty($item['realname'])) { ?>
					<span class="label label-danger">未完善</span>
					<?php  } else { ?>
					<?php  echo $item['realname'];?>
					<?php  } ?>
				</td>
				<td>
					<?php  if(empty($item['mobile'])) { ?>
					<span class="label label-danger">未完善</span>
					<?php  } else { ?>
					<?php  echo $item['mobile'];?>
					<?php  } ?>
				</td>
				<td><?php  echo date('Y-m-d H:i',$item['createtime'])?></td>
				<td>
					<?php  if($item['status']==1) { ?>
					<span class='label label-success'>启用</span>
					<?php  } else { ?>
					<span class='label label-default'>禁用</span>
					<?php  } ?>
				</td>
				<td>
					<a class="btn btn-default " data-toggle="tooltip" data-placement="bottom" href="<?php  echo $this->createWebUrl('member',array('op'=>'edit','id'=>$item['id']))?>" title="编辑"><i class="fa fa-edit"></i></a>
					<?php  if($item['status']==0) { ?>
					<a class="btn btn-default" title="显示" href="#" onclick="drop_confirm('您确定要启用此用户吗?', '<?php  echo $this->createWebUrl('member',array('op'=>'status','status'=>1, 'id'=>$item['id']))?>');" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-play"></i></a>
					<?php  } else if($item['status']==1) { ?>
					<a class="btn btn-default" title="隐藏" href="#" onclick="drop_confirm('您确定要禁用此用户吗?', '<?php  echo $this->createWebUrl('member',array('op'=>'status','status'=>0, 'id'=>$item['id']))?>');" data-toggle="tooltip" data-placement="bottom"><i class="fa fa-stop"></i></a>
					<?php  } ?>
					<a class="btn btn-default" data-toggle="tooltip" data-placement="bottom" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('member',array('op'=>'delete', 'id'=>$item['id']))?>');" title="删除" ><i class="fa fa-times"></i></a>
				</td>
			</tr>
			<?php  } } ?>
			<tr>
				<td colspan="9">
					<input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
					<input type="button" class="btn btn-primary edit_all" name="showall" value="批量启用" />
					<input type="button" class="btn btn-primary edit_all" name="hideall" value="批量禁用" />
				</td>
			</tr>
			</tbody>
			<input name="token" type="hidden" value="<?php  echo $_W['token'];?>" />
		</table>
	</div>
	</div>
	<?php  echo $pager;?>
</div>
<script>
	require(['bootstrap'],function(){
		$('.btn').tooltip();
	});
	$(function(){
		$(".check_all").click(function(){
			var checked = $(this).get(0).checked;
			$(':checkbox').each(function(){this.checked = checked});
		});
		$(".edit_all").click(function(){
			var name = $(this).attr('name');
			var check = $("input:checked");
			if(check.length < 1){
				alert('请选择要操作的记录!');
				return false;
			}
			var id = new Array();
			check.each(function(i){
				id[i] = $(this).val();
			});
			$.post("<?php  echo create_url('site/entry', array('do' => 'member','op'=>'showall', 'm' => $_GPC['m']))?>", {idArr:id,show_name:name},function(data){
				if (data.errno == 0)
				{
					location.reload();
				} else {
					alert(data.error);
				}
			},'json');
		});

		$("input[name=deleteall]").click(function(){
			var check = $("input:checked");
			if(check.length<1){
				alert('请选择要删除的记录!');
				return false;
			}
			if( confirm("确认要删除选择的记录?")){
				var id = new Array();
				check.each(function(i){
					id[i] = $(this).val();
				});
				$.post("<?php  echo create_url('site/entry', array('do' => 'member','op'=>'deleteall', 'm' => $_GPC['m']))?>", {idArr:id},function(data){
					if (data.errno ==0)
					{
						location.reload();
					} else {
						alert(data.error);
					}
				},'json');
			}

		});
	});
</script>
<script>
	function drop_confirm(msg, url){
		if(confirm(msg)){
			window.location = url;
		}
	}
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
