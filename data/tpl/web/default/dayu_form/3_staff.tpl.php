<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
	.require{color:red;}
	.info{padding:6px;width:400px;margin:-20px auto 3px auto;text-align:center;}
</style>
<div class="alert alert-info info">
	<i class="fa fa-info-circle"></i>
	当前表单: <?php  echo $activity['title'];?>
</div>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('display')?>">返回表单列表</a></li>
	<li<?php  if($op == 'list') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('staff', array('op' => 'list','reid' => $_GPC['reid']))?>">客服列表</a></li>
	<li<?php  if($op == 'post' && !$id) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('staff', array('op' => 'post','reid' => $_GPC['reid']))?>">添加客服</a></li>
	<?php  if($id) { ?><li class="active"><a href="#">编辑客服</a></li><?php  } ?>
</ul>
<?php  if($op == 'post') { ?>
	<form class="form-horizontal form" id="form1" action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="reid" value="<?php  echo $reid;?>">
		<input type="hidden" name="weid[]" value="<?php  echo $weid;?>">
		<div class="main">
			<div class="panel panel-default">
				<div class="panel-heading">添加客服</div>
				<div class="panel-body">
					<div id="tpl">
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">客服昵称</label>
							<div class="col-sm-9 col-xs-12">
								<input type="text" class="form-control" name="nickname[]" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">归属表单</label>
							<div class="col-sm-9 col-xs-12">
								<input type="text" class="form-control" value="<?php  echo $activity['title'];?>" readonly>
							</div>
						</div>	
						<div class="form-group">
							<label class="col-xs-12 col-sm-3 col-md-2 control-label">openid</label>
							<div class="col-sm-9 col-xs-12">
								<input type="text" class="form-control" name="openid[]" value="" placeholder="粉丝编号">
							</div>
						</div>
						<hr>
					</div>
					<div id="tpl-container"></div>
					<div class="form-group">
						<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
						<div class="col-sm-9 col-xs-12" style="padding-top:7px">
							<a href="javascipt:;" id="post-add"><i class="fa fa-plus-circle"></i> 继续添加</a>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9 col-xs-9 col-md-9">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
					<input name="submit" id="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
				</div>	
			</div>
		</div>
	</form>
	<script type="text/javascript">
		require(['util'], function(u){
			$('#post-add').click(function(){
				$('#tpl-container').append($('#tpl').html());
			});
		});
	</script>
<?php  } else if($op == 'list') { ?>
	<style type="text/css">
		.status-toggle{cursor:pointer;}
	</style>
	<div class="main">
		<div class="panel panel-info">
			<div class="panel-heading">筛选</div>
			<div class="panel-body">
				<form action="./index.php" method="get" class="form-horizontal" role="form">
					<input type="hidden" name="c" value="site">
					<input type="hidden" name="a" value="entry">
					<input type="hidden" name="m" value="dayu_form">
					<input type="hidden" name="do" value="staff"/>
					<input type="hidden" name="op" value="list"/>
					<input type="hidden" name="reid" value="<?php  echo $_GPC['reid'];?>">
					<div class="form-group clearfix">
						<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">客服</label>
						<div class="col-sm-7 col-lg-8 col-md-8 col-xs-12">
							<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
						</div>
						<div class="col-xs-12 col-sm-3 col-md-2 col-lg-1">
							<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
			<div class="panel panel-default">
				<div class="panel-body table-responsive">
					<table class="table table-hover">
						<thead class="navbar-inner">
							<tr>
								<th width="80px">管理员</th>
								<th>客服</th>
								<th><a href="/web/index.php?c=mc&a=fans&" target="_blank">openid：粉丝管理中的粉丝编号</a></th>
								<th>归属</th>
								<th style="width:80px; text-align:right;">操作</th>
							</tr>
						</thead>
						<tbody>
							<?php  if(is_array($lists)) { foreach($lists as $item) { ?>
							<tr <?php  if($item['openid'] == $activity['kfid']) { ?>style="background-color:#fff8e1;"<?php  } ?>>
								<input type="hidden" name="ids[]" value="<?php  echo $item['id'];?>">
								<input type="hidden" name="weid[]" value="<?php  echo $weid;?>">
								<td>
				<?php  if($item['openid'] != $activity['kfid']) { ?>
					<a class="btn" href="javascript:void(0);" onclick="change_checked('<?php  echo $item['reid'];?>','<?php  echo $item['openid'];?>')" title="设置 <?php  echo $item['nickname'];?> 为微信端管理员"><i class="fa fa-dot-circle-o" style="font-size:3rem"></i></a>
				<?php  } else if($item['openid'] === $activity['kfid']) { ?>
					<span class="btn" title="微信端管理员"><i class="fa fa-check-square-o" style="font-size:3rem"></i></span>
				<?php  } ?></td>
								<td><input type="text" name="nickname[]" class="form-control" value="<?php  echo $item['nickname'];?>"></td>
								<td><input type="text" name="openid[]" class="form-control" value="<?php  echo $item['openid'];?>"></td>
								<td><input type="text" class="form-control" value="<?php  echo $activity['title'];?>" disabled></td>
								<td style="text-align:right;">
									<a href="<?php  echo $this->createWebUrl('staff', array('op' => 'staffdel', 'id' => $item['id'], 'reid' => $_GPC['reid']))?>" class="btn btn-default btn-sm" title="删除" data-toggle="tooltip" data-placement="top" onclick="if(!confirm('删除客服，确定删除吗?')) return false;"><i class="fa fa-times"> </i></a>
								</td>
							</tr>
							<?php  } } ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-9 col-xs-9 col-md-9">
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>">
					<input name="submit" id="submit" type="submit" value="批量修改" class="btn btn-primary">
				</div>	
			</div>
			<?php  echo $pager;?>
		</form>
	</div>
<script>
	require(['bootstrap'],function($){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
</script>
	<script>
	    function change_checked(id, kfid){
	    	$.post(
	    			'<?php  echo $this->createWebUrl("changecheckedAjax")?>',
	    	        {"id":id, "kfid":kfid},
	    	        function (data){
	    	        	location.reload();
	    	        }
	    	);
	    }
	</script>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>