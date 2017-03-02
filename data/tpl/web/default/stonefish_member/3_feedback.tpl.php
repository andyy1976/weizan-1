<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('level');?>">等级头衔</a></li>
	<li><a href="<?php  echo $this->createWebUrl('sms');?>">短信中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('signin');?>">签到中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('message');?>">消息中心</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('feedback');?>">留言中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('task');?>">任务中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('member');?>">会员中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('template');?>">会员模板</a></li>
	<li><a href="<?php  echo $this->createWebUrl('fanslog');?>">粉丝统计</a></li>	
	<li><a href="<?php  echo $this->createWebUrl('memberlog');?>">会员统计</a></li>
</ul>

<!-- 留言策略设置 -->
<div class="clearfix">
	    <div class="alert alert-info">
	    <a href="<?php  echo $this->createWebUrl('feedback');?>" title="留言记录" class="btn btn-primary"><i class="fa fa-refresh"></i> 留言记录</a>
		<a href="<?php  echo $this->createWebUrl('feedback',array('op'=>'category'));?>" class='btn btn-danger' style="margin:0px 15px;"  title="留言分类设置"><i class='fa fa-plus'></i> 留言分类设置</a>
	    </div>
		<?php  if($op == 'display') { ?>
		<div class="panel panel-default">
			<div class="panel-heading">
			    是否启用留言功能：
			    <input type="checkbox" name="flag" value="1" <?php  if(intval($setting['feedbackstatus'])==1) { ?> checked="checked" <?php  } ?> data="<?php  echo $setting['id'];?>"/>
		    </div>
			<div class="panel-body">
			<div class="row-fluid">
    			<div class="span8 control-group">
					<?php  if(is_array($category)) { foreach($category as $row) { ?>
					<a class="btn btn-<?php  if($_GPC['fid']==$row['id']) { ?>primary<?php  } else { ?>default<?php  } ?>" href="<?php  echo $this->createWebUrl('feedback',array('fid'=>$row['id']));?>" style="margin-left:10px;"><i class="fa fa-list"></i> <?php  echo $row['cname'];?></a>
					<?php  } } ?>
       		    </div>
    		</div>
    		</div>
	    </div>
		<style>
		.label{cursor:pointer;}
		</style>
		<div class="panel panel-default">
		    <div class="panel-heading">
			   <?php  if($_GPC['fid']=='') { ?>全部<?php  } else { ?><?php  echo $cname;?><?php  } ?>留言记录
		    </div>
			<form method="post" class="form-horizontal" id="signinrecord">
			<div style="position:relative">
				<div class="panel-body table-responsive">
					<table class="table table-hover" style="position:relative">
						<thead class="navbar-inner">
							<tr>
								<th style="width:50px;">删？</th>
								<th style="width:100px;">头像</th>
								<th style="width:150px;">真实姓名</th>
								<th style="width:150px;">手机号码</th>
								<th style="width:120px;">留言内容</th>								
								<th style="width:150px;">留言时间</th>
								<th style="width:150px;">留言IP</th>
								<th style="width:50px;">状态</th>
							</tr>
						</thead>
						<tbody>
							<?php  if(is_array($record)) { foreach($record as $row) { ?>
							<tr>
								<td><input type="checkbox" name="uid[]" value="<?php  echo $row['id'];?>"></td>
								<td><img src="<?php  if(!empty($row['headimgurl'])) { ?><?php  echo $row['headimgurl'];?><?php  } else { ?>resource/images/noavatar_middle.gif<?php  } ?>" width="48px"></td>
								<td><?php  echo $row['realname'];?></td>
								<td><?php  echo $row['mobile'];?></td>
								<td><a href="javascript:void(0)" id="<?php  echo $row['id'];?>" class="btn btn-default btn-sm feedback" style="width:100px;" data-toggle="tooltip" data-placement="top" title="留言详细内容"><i class="fa fa-child"></i> 留言内容</a></td>
								<td><?php  echo date('Y/m/d H:i',$row['createtime']);?></td>
								<td><?php  echo $row['visitorsip'];?></td>
								<td><label data="<?php  echo $row['status'];?>" class="label label-default <?php  if($row['status']) { ?>label-info<?php  } ?>" onclick="setstatus(this,<?php  echo $row['id'];?>,'status')"><?php  if($row['status']) { ?>已审核<?php  } else { ?>未审核<?php  } ?></label></td>								
							</tr>
							<?php  } } ?>
							<tr>
								<td><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
								<td colspan="7"><input name="token" type="hidden" value="<?php  echo $_W['token'];?>" /><input type="submit" name="submit" class="btn btn-primary delfeedback" value="删除选中的留言记录"></td>
							</tr>
						</tbody>
					</table>
					<?php  echo $pager;?>
				</div>
			</div>
			</form>
	    </div>
		<div id="guanbi" class="hide">
		     <span type="button" class="pull-right btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</span>
		</div>
		<script>
	    require(['jquery', 'util'], function($, u){
		$('.feedback').click(function(){
			var id = parseInt($(this).attr('id'));
			$.get("<?php  echo $this->createWebUrl('feedback',array('op'=>'feedbackview','fid'=>$_GPC['fid'],'page'=>$_GPC['page']))?>&id=" + id, function(data){
				if(data == 'dataerr') {
					u.message('未找到指定留言内容', '', 'error');
				} else {
					var obj = u.dialog('粉丝留言内容', data, $('#guanbi').html());
				}
				obj.modal('show');
			});
		});

		$('.delfeedback').click(function(){
		    if($(":checkbox[name='uid[]']:checked").size() > 0){
			    var check = $(":checkbox[name='uid[]']:checked");
			    if( confirm("确认要删除选择的留言记录?")){
		            var id = new Array();
		            check.each(function(i){
			            id[i] = $(this).val();
		            });
		            $.post('<?php  echo $this->createWebUrl('feedback',array('op'=>'delfeedback'))?>', {idArr:id},function(data){
			        if (data.errno ==0){
						location.reload();
			        } else {
				        alert(data.error);
			        }
		            },'json');
		        }
		    }else{
		        u.message('没有选择留言记录', '', 'error');
		        return false;
		    }
	    });		
	    });
		function setstatus(obj,id,type){
		$(obj).html($(obj).html() + "...");
		$.post("<?php  echo $this->createWebUrl('feedback',array('op'=>'setstatus'))?>"
			,{id:id,type:type, data: obj.getAttribute("data")}
			,function(d){
				$(obj).html($(obj).html().replace("...",""));
				if(type=='status'){
				 $(obj).html( d.data=='1'?'已审核':'未审核');
				}
				$(obj).attr("data",d.data);
				if(d.result==1){
					$(obj).toggleClass("label-info");
				}
			}
			,"json"
		);
	    }
        </script>
		<?php  } ?>
		<?php  if($op == 'category') { ?>
		<form action="" method="post" onsubmit="return formcheck(this)">
		<div class="panel panel-default">
		<div class="panel-heading">
			留言分类配置
		</div>
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th style="width:10%; text-align:center;">显示顺序</th>
					<th style="width:40%;">分类名称</th>
					<th style="width:10%;text-align:center;">类型</th>
					<th style="width:10%;text-align:center;">留言记录数</th>
					<th style="width:30%; text-align:center">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($category)) { foreach($category as $row) { ?>
				<tr>
					<td class="text-center"><input type="text" class="form-control" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
					<td class="text-left"><div style="height:30px;line-height:30px"><?php  echo $row['cname'];?><!--&nbsp;&nbsp;<?php  if(empty($row['parentid'])) { ?><a href="<?php  echo $this->createWebUrl('feedback', array('op'=>'postcategory','parentid' => $row['id']));?>" title="添加子分类"><i class="fa fa-plus"></i></a><?php  } ?>--></div></td>
					<td class="text-center"><?php  if($row['open']) { ?>公开<?php  } else { ?>隐私<?php  } ?>(<?php  if($row['feedtype']) { ?>管理回复<?php  } else { ?>交流<?php  } ?>)</td>
					<td class="text-center"><a href="<?php  echo $this->createWebUrl('feedback',array('fid'=>$row['id']));?>"><?php  echo $row['total'];?></a></td>
					<td class="text-center">
						<a href="<?php  echo $this->createWebUrl('feedback', array('op'=>'postcategory','id' => $row['id']));?>" title="编辑" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i></a>
						<a href="<?php  echo $this->createWebUrl('feedback', array('op'=>'delcategory','id' => $row['id']));?>" onclick="return confirm('确认删除此分类吗？');return false;" title="删除" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php  if(is_array($children[$row['id']])) { foreach($children[$row['id']] as $row) { ?>
				<tr>
					<td class="text-center"><input type="text" class="form-control" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>"></td>
					<td class="text-left"><div style="padding-left:50px;height:30px;line-height:30px;background:url('./resource/images/bg_repno.gif') no-repeat -245px -545px;"><?php  echo $row['name'];?><!--&nbsp;&nbsp;<?php  if(empty($row['parentid'])) { ?><a href="<?php  echo $this->createWebUrl('feedback', array('op'=>'postcategory','parentid' => $row['id']));?>"><i class="fa fa-plus" title="添加子分类"></i></a><?php  } ?>--></div></td>
					<td class="text-center"><?php  if($row['open']) { ?>公开<?php  } else { ?>隐私<?php  } ?>(<?php  if($row['feedtype']) { ?>管理回复<?php  } else { ?>交流<?php  } ?>)</td>
					<td class="text-center"><?php  echo $row['total'];?></td>
					<td class="text-center">
						<a href="<?php  echo $this->createWebUrl('feedback', array('op'=>'postcategory','id' => $row['id'], 'parentid' => $row['parentid']));?>" title="编辑" class="btn btn-default btn-sm"><i class="fa fa-edit" data-toggle="tooltip" data-placement="top"></i></a>
						<a href="<?php  echo $this->createWebUrl('feedback', array('op'=>'delcategory','id' => $row['id']));?>" onclick="return confirm('确认删除此分类吗？');return false;" title="删除" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php  } } ?>
			<?php  } } ?>
				<tr>
					<td colspan="5">
						<a href="<?php  echo $this->createWebUrl('feedback',array('op'=>'postcategory'));?>"><i class="fa fa-plus-circle" title="添加新分类"></i> 添加新分类</a>
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
				<?php  if(!empty($category['cname'])) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">访问地址</label>
					<div class="col-sm-8 col-xs-12">
						<div class="form-control-static"><a href="<?php  echo $_W['siteroot'];?>app/index.php?c=entry&m=stonefish_member&cid=<?php  echo $category['id'];?>&i=<?php  echo $_W['uniacid'];?>&do=feedback" target="_blank"><?php  echo $_W['siteroot'];?>app/index.php?c=entry&m=stonefish_member&do=feedback&cid=<?php  echo $category['id'];?>&i=<?php  echo $_W['uniacid'];?></a></div>
						<span class="help-block">您可以根据此地址，添加回复规则，设置访问。</span>
					</div>
				</div>
				<?php  } ?>
				<?php  if(!empty($parentid)) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">上级分类</label>
					<div class="col-sm-8 col-xs-12">
						<div class="form-control-static"><?php  echo $parent['cname'];?></div>
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
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">留言分类名称</label>
					<div class="col-sm-8 col-xs-12">
						<input type="text" name="cname" class="form-control" value="<?php  echo $category['cname'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">留言分类描述</label>
					<div class="col-sm-8 col-xs-12">
						<textarea name="description" class="form-control" cols="70"><?php  echo $category['description'];?></textarea>
					</div>
				</div>				
		    </div>
		</div>

		<div class="panel panel-default" id="style">
			<div class="panel-heading">界面显示配置</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">每页显示数量</label>
					<div class="col-sm-9">
                        <input type="text" name="pagesize" value="<?php  echo $category['pagesize'];?>" class="form-control">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">留言顶部图片</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_image('topimgurl', $category['topimgurl'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">页面色调</label>
					<div class="col-sm-9">
                        <?php  echo tpl_form_field_color('pagecolor', $category['pagecolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">留言是否需要审核</label>
					<div class="col-sm-9">
						<label for="status0" class="radio-inline"><input type="radio" name="status" value="0" id="status0" <?php  if(intval($category['status'])==0) { ?> checked="checked" <?php  } ?>/> 不需要审核</label>&nbsp;&nbsp;&nbsp;
						<label for="status1" class="radio-inline"><input type="radio" name="status" value="1" id="status1" <?php  if(intval($category['status'])==1) { ?> checked="checked" <?php  } ?>/> 审核后显示</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">留言是否公开</label>
					<div class="col-sm-9">
						<label for="open0" class="radio-inline"><input type="radio" name="open" value="0" id="open0" <?php  if(intval($category['open'])==0) { ?> checked="checked" <?php  } ?>/> 隐私</label>&nbsp;&nbsp;&nbsp;
						<label for="open1" class="radio-inline"><input type="radio" name="open" value="1" id="open1" <?php  if(intval($category['open'])==1) { ?> checked="checked" <?php  } ?>/> 公开</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">留言类型</label>
					<div class="col-sm-9">
						<label for="feedtype0" class="radio-inline"><input type="radio" name="feedtype" value="0" id="feedtype0" <?php  if(intval($category['feedtype'])==0) { ?> checked="checked" <?php  } ?>/> 交流</label>&nbsp;&nbsp;&nbsp;
						<label for="feedtype1" class="radio-inline"><input type="radio" name="feedtype" value="1" id="feedtype1" <?php  if(intval($category['feedtype'])==1) { ?> checked="checked" <?php  } ?>/> 仅管理回复</label>
					</div>
				</div>
			</div>
		</div>

	    <div class="form-group">
		<div class="col-sm-12">
			<input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
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