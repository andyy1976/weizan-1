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
    <div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="stonefish_scratch" />
        	<input type="hidden" name="do" value="fansdata" />
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
	<div class="row-fluid">
    	<div class="span8 control-group">			
			<a class="btn btn-default<?php  if($_GPC['zhongjiang']=='') { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('fansdata',array('rid'=>$rid))?>">全　部</a>
			<a class="btn btn-default<?php  if($_GPC['zhongjiang']==1) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('fansdata',array('rid'=>$rid,'zhongjiang'=>1))?>">未中奖</a>
			<a class="btn btn-default<?php  if($_GPC['zhongjiang']==2) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('fansdata',array('rid'=>$rid,'zhongjiang'=>2))?>">已中奖</a>
			<a class="btn btn-default<?php  if($_GPC['zhongjiang']==3) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('fansdata',array('rid'=>$rid,'zhongjiang'=>3))?>">虚拟奖</a>
        </div>
    </div>
	<div class="alert" style="margin-bottom:0;">
		本次活动参与粉丝总数：<?php  echo $total;?>个　　未中奖：<?php  echo $num1;?>个　　已中奖：<?php  echo $num2;?>个　　虚拟奖：<?php  echo $num3;?>个
	</div>
	<div class="row-fluid">
    	<div class="span8 control-group">
			<a class="btn btn-warning" href="<?php  echo $this->createWebUrl('download',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],'data'=>'fansdata'))?>"><i class="fa fa-download"></i> 导出<?php  echo $statustitle;?>用户信息</a>
        </div>
    </div>
</div>
<div style="position:relative">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="position:relative">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;">删？</th>
					<th style="width:40px;">头像</th>
					<th style="width:100px;">真实姓名</th>
					<th style="width:100px;">手机号码</th>					
					<th style="width:85px;">奖品状态</th>
					<th style="width:100px;">助力情况</th>
					<th style="width:50px;">次数</th>
					<th style="width:150px;">参与时间</th>
					<th style="width:240px;">操作</th>
					<th style="width:50px;">状态</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<tr>
					<td><input type="checkbox" name="uid[]" value="<?php  echo $row['id'];?>" class=""></td>
					<td><img src="<?php  if(substr($row['avatar'],-1)=='0') { ?><?php  echo rtrim(toimage($row['avatar']), '0').$reply['poweravatar']?><?php  } else { ?><?php  echo toimage($row['avatar'])?><?php  } ?>" width="30"></td>
					<td><a href="javascript:void(0)" id="<?php  echo $row['id'];?>" class="btn btn-default btn-sm userinfo" style="width:100px;" data-toggle="tooltip" data-placement="top" title="用户兑奖参数项"><i class="fa fa-child"></i> <?php  if(!empty($row['realname'])) { ?><?php  echo $row['realname'];?><?php  } else { ?><?php  echo stripcslashes($row['nickname'])?><?php  } ?></a></td>
					<td><?php  echo $row['mobile'];?></td>
					<td><span id="<?php  echo $row['id'];?>" class="btn btn-<?php  if($row['zhongjiang']==2) { ?>success<?php  } else if($row['zhongjiang']==1) { ?>warning<?php  } else { ?>default<?php  } ?> btn-sm<?php  if($row['zhongjiang']>=1) { ?> prizeinfo<?php  } ?>" style="width:85px;" data-toggle="tooltip" data-placement="top" title="用户中奖记录"><?php  if($row['zhongjiang']==0) { ?>未中奖<?php  } else if($row['zhongjiang']==1) { ?>未兑换<?php  } else { ?>已兑奖<?php  } ?><?php  if($row['xuni']==0) { ?>/真实<?php  } else { ?>/虚拟<?php  } ?></span></td>
					<td><?php  if($row['share_num']==0) { ?>未成功分享<?php  } else { ?><span id="<?php  echo $row['id'];?>" class="btn btn-success btn-sm sharenum" style="width:100px;" data-toggle="tooltip" data-placement="top" title="助力情况"><i class="fa fa-share-alt"></i> 助力情况[<?php  echo $row['share_num'];?>]</span><?php  } ?></td>
					<td><?php  echo $row['totalnum'];?></td>
					<td><?php  echo date('Y/m/d H:i',$row['createtime']);?></td>
					<td><?php  if($row['fanid']) { ?><a href="./index.php?c=mc&a=notice&do=tpl&id=<?php  echo $row['fanid'];?>" id="<?php  echo $row['fanid'];?>" class="btn btn-success btn-sm sms"> 发送消息</a><?php  } else { ?><span class="btn btn-default btn-sm sms"> 发送消息</span><?php  } ?> <a href="javascript:void(0)" id="<?php  echo $row['id'];?>" class="btn btn-default btn-sm xunishare" data-toggle="tooltip" data-placement="top" title="添加虚拟助力"><i class="fa fa-share-alt"></i> 虚拟助力</a> <a href="javascript:void(0)" id="<?php  echo $row['id'];?>" class="btn btn-default btn-sm xuniaward" data-toggle="tooltip" data-placement="top" title="添加虚拟奖品"><i class="fa fa-gift"></i> 虚拟奖品</a></td>
					<td><label data='<?php  echo $row['status'];?>' class='label label-default <?php  if($row['status']==1) { ?>label-info<?php  } else { ?><?php  } ?>' onclick="setstatus(this,<?php  echo $row['id'];?>)"><?php  if($row['status']==1) { ?>正常<?php  } else { ?>禁止<?php  } ?></label></td>
				</tr>
				<?php  } } ?>
				<tr>
					<td><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
					<td colspan="9"><input name="token" type="hidden" value="<?php  echo $_W['token'];?>" /><input type="submit" name="deleteall" class="btn btn-danger" value="删除选中的粉丝"></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</div>
<?php  echo $pager;?>
</div>
<div id="guanbi" class="hide">
	<span type="button" class="pull-right btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</span>
</div>
<script>
	require(['jquery', 'util'], function($, u){
		$('.xunishare').click(function(){
			var uid = parseInt($(this).attr('id'));
			$.get("<?php  echo url('site/entry/addxunishare',array('m' => 'stonefish_scratch','rid' => $rid))?>&uid=" + uid, function(data){
				if(data == 'dataerr') {
					u.message('未找到指定粉丝', '', 'error');
				} else {
					var obj = u.dialog('增加虚拟分享助力值', data, $('#guanbi').html());
				}
				obj.modal('show');
			});
		});
		$('.xuniaward').click(function(){
			var uid = parseInt($(this).attr('id'));
			$.get("<?php  echo url('site/entry/addxuniaward',array('m' => 'stonefish_scratch','rid' => $rid))?>&uid=" + uid, function(data){
				if(data == 'dataerr') {
					u.message('未找到指定粉丝', '', 'error');
				} else {
					var obj = u.dialog('增加虚拟奖品', data, $('#guanbi').html());
				}
				obj.modal('show');
			});
		});
		$('.prizeinfo').click(function(){
			var uid = parseInt($(this).attr('id'));
			$.get("<?php  echo url('site/entry/prizeinfo',array('m' => 'stonefish_scratch','rid' => $rid))?>&uid=" + uid, function(data){
				if(data == 'dataerr') {
					u.message('未找到指定粉丝中奖记录', '', 'error');
				} else {
					var obj = u.dialog('粉丝中奖记录', data, $('#guanbi').html());
				}
				obj.modal('show');
			});
		});
		$('.userinfo').click(function(){
			var uid = parseInt($(this).attr('id'));
			$.get("<?php  echo url('site/entry/userinfo',array('m' => 'stonefish_scratch','rid' => $rid))?>&uid=" + uid, function(data){
				if(data == 'dataerr') {
					u.message('未找到指定粉丝资料', '', 'error');
				} else {
					var obj = u.dialog('粉丝资料兑奖参数', data, $('#guanbi').html());
				}
				obj.modal('show');
			});
		});
		$('.sharenum').click(function(){
			var uid = parseInt($(this).attr('id'));
			$.get("<?php  echo url('site/entry/sharelist',array('m' => 'stonefish_scratch','rid' => $rid))?>&uid=" + uid, function(data){
				if(data == 'dataerr') {
					u.message('未找到指定粉丝分享记录', '', 'error');
				} else {
					var obj = u.dialog('分享助力详细情况', data, $('#guanbi').html());
				}
				obj.modal('show');
			});
		});
		$("input[name=deleteall]").click(function(){
		    if($(":checkbox[name='uid[]']:checked").size() > 0){
			    var check = $(":checkbox[name='uid[]']:checked");
			    //if(confirm("确认要删除选择的粉丝中奖记录?")){
		            var id = new Array();
				    var rid = <?php  echo $rid;?>;
		            check.each(function(i){
			            id[i] = $(this).val();
		            });
		            $.post('<?php  echo $this->createWebUrl('deletefans')?>', {idArr:id,rid:rid},function(data){
			        if (data.errno ==0){
						u.message(data.error, '<?php  echo url('site/entry/fansdata',array('m' => 'stonefish_scratch','rid' => $rid))?>', 'warning');
			        }else{
				        u.message(data.error, '', 'error');
			        }
					return false;
		            },'json');
		        //}
		    }else{
		        u.message('没有选择粉丝', '', 'error');
		        return false;
		    }		    
	    });
	});
	function setstatus(obj,id){
		$(obj).html($(obj).html() + "...");
		$.post("<?php  echo $this->createWebUrl('setfansstatus')?>",{id:id,data: obj.getAttribute("data")},function(d){
			$(obj).html($(obj).html().replace("...",""));
			$(obj).html( d.data=='1'?'正常':'禁止');
			$(obj).attr("data",d.data);
			if(d.result==1){
				$(obj).toggleClass("label-info");
			}
		},"json");
	}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>