<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li class="active"><a href="<?php  echo $this->createWebUrl('level');?>">等级头衔</a></li>
	<li><a href="<?php  echo $this->createWebUrl('sms');?>">短信中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('signin');?>">签到中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('message');?>">消息中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('feedback');?>">留言中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('task');?>">任务中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('member');?>">会员中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('template');?>">会员模板</a></li>
	<li><a href="<?php  echo $this->createWebUrl('fanslog');?>">粉丝统计</a></li>	
	<li><a href="<?php  echo $this->createWebUrl('memberlog');?>">会员统计</a></li>
</ul>
<!-- 等级设置 -->
<div class="clearfix">
<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data" id="form1">
	
		<div class="alert alert-info">1.等级头衔请不要重复;积分范围请填写正确。<br/>2.第一个等级积分必需从0开始;下一等级开始积分必需是上一等级结束积分+1;最后一个等级结束积分请设置为999999999。<br/>
		3.积分对应选择好以后最好不要改变。</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<select name="levelcredit" class="form-control">
					<?php  if(is_array($creditnames)) { foreach($creditnames as $key => $credit) { ?>
					<option value="<?php  echo $key;?>" <?php  if($key == $config['levelcredit']) { ?>selected<?php  } ?>>等级头衔所指积分对应 => <?php  echo $credit;?></option>
					<?php  } } ?>
				</select>
			</div>
			<div class="panel-body table-responsive">
				<table class="table table-hover">
				<thead>
					<tr>
						<th style="width:200px;">等级头衔</th>
						<th style="width:500px;">积分范围(必须为整数)</th>						
						<th style="width:100px;">操作</th>
					</tr>
				</thead>
				<tbody id="re-items">
					<?php  if(!empty($setting)) { ?>
						<?php  if(is_array($setting)) { foreach($setting as $item) { ?>
							<tr>
								<td><input name="id[]" type="hidden" value="<?php  echo $item['id'];?>"/><input name="grade[]" type="text" class="form-control" value="<?php  echo $item['grade'];?>"/></td>
								<td><div class="input-group input-medium">
                        	            <span class="input-group-addon">从</span>
                        	            <input type="text" name="integral_start[]" value="<?php  echo $item['integral_start'];?>" class="form-control">
							            <span class="input-group-addon" style="border-left:0px;border-right:0px;">积分至</span>
							            <input type="text" name="integral_end[]" value="<?php  echo $item['integral_end'];?>" class="form-control">
							            <span class="input-group-addon">积分范围内</span>
                    	            </div>
								</td>
								<td>
									<a href="javascript:;" onclick="deleteItem(this)" title="删除此等级" class="fa fa-times-circle" ></a>
								</td>
							</tr>							
						<?php  } } ?>
					<?php  } else { ?>
						    <tr>
								<td><input name="grade[]" type="text" class="form-control" value="VIP1"/></td>
								<td><div class="input-group input-medium">
                        	            <span class="input-group-addon">从</span>
                        	            <input type="text" name="integral_start[]" value="0" class="form-control">
							            <span class="input-group-addon" style="border-left:0px;border-right:0px;">积分至</span>
							            <input type="text" name="integral_end[]" value="999999999" class="form-control">
							            <span class="input-group-addon">积分范围内</span>
                    	            </div>
								</td>
								<td>
									<a href="javascript:;" onclick="deleteItem(this)" title="删除此等级" class="fa fa-times-circle" ></a>
								</td>
							</tr>
					<?php  } ?>
				</tbody>
			</table>
			<div class="alert alert-block alert-new">
					<a href="javascript:;" onclick="addItem();"><i class="fa fa-plus-circle" title="添加等级"></i> 添加等级</a>
				</div>
				<span class="help-block">会员根据积分自动进入不同的等级<span class="text-danger">(注:第一个等级积分必需从0开始，最后结束积分最大为999999999)</span></span>
			</div>
		</div>		
		
		<div class="form-group">
			<div class="col-sm-12">
				<button type="submit" class="btn btn-primary col-lg-1" name="submit" value="保存等级头衔">保存等级头衔</button>
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</div>
		</div>
		<div class="panel panel-default">
		<div class="panel-heading">等级头衔 推荐名称</div>
			<div class="panel-body">
				<div class="help-block" style="text-align:center;"><img src="../addons/stonefish_member/template/images/level.png"></div>
			</div>
	    </div>
</div>
<script type="text/javascript">
	require(['jquery.ui', 'bootstrap.switch', 'util'], function($, $, u){
		$(function(){
			$('#re-items').sortable({handle: '.fa-arrows'});
			$('#form1').submit(function() {
				$(':checkbox').each(function(){
					if($(this).prop('checked') == true) {
						$(this).next().val('1');
					} else {
						$(this).next().val('0');
					}
				});
			});
		});
	});

	function addItem() {
		var html = '' +
				'<tr>' +
					'<td><input name="id[]" type="hidden"/><input name="grade[]" type="text" class="form-control" /></td>' +
					'<td><div class="input-group input-medium"><span class="input-group-addon">从</span><input type="text" name="integral_start[]" class="form-control"><span class="input-group-addon" style="border-left:0px;border-right:0px;">积分至</span><input type="text" name="integral_end[]" value="999999999" class="form-control"><span class="input-group-addon">积分范围内</span></div></td>' +
					'<td><a href="javascript:;" onclick="deleteItem(this)" class="fa fa-times-circle"  title="删除此条目"></a></td>' +
				'</tr>';
		$('#re-items').append(html);
	}
	function deleteItem(o) {
		$(o).parent().parent().remove();
	}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>