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
        	<input type="hidden" name="do" value="prizedata" />
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
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">奖品类别</label>
				<div class="col-xs-12 col-sm-8 col-lg-4">
					<select name="prizeid" class="form-control" style="float:left">
                        <option value="" <?php  if($_GPC['prizeid']=='') { ?>selected<?php  } ?>>全部</option>
						<?php  if(is_array($award)) { foreach($award as $awards) { ?>
						<option value="<?php  echo $awards['id'];?>" <?php  if($_GPC['prizeid']==$awards['id']) { ?>selected<?php  } ?>><?php  echo $awards['prizerating'];?></option>						
						<?php  } } ?>
                	</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">参数</label>
				<div class="col-xs-12 col-sm-3 col-lg-3">
					<select name="tickettype" class="form-control" style="float:left">
                        <option value="" <?php  if($_GPC['tickettype']=='') { ?>selected<?php  } ?>>全部兑奖类型</option>
						<option value="1" <?php  if($_GPC['tickettype']=='1') { ?>selected<?php  } ?>>后台兑奖</option>
						<option value="2" <?php  if($_GPC['tickettype']=='2') { ?>selected<?php  } ?>>店员兑奖</option>
						<?php  if($stonefish_branch) { ?><option value="3" <?php  if($_GPC['tickettype']=='3') { ?>selected<?php  } ?>>商家网店</option><?php  } ?>
						<option value="4" <?php  if($_GPC['tickettype']=='4') { ?>selected<?php  } ?>>密码兑奖</option>
                	</select>
				</div>
				<div class="col-xs-12 col-sm-3 col-lg-3">
					<select name="xuni" class="form-control" style="float:left">
                    	<option value="" <?php  if($_GPC['xuni']=='') { ?>selected<?php  } ?>>全部真实虚拟奖</option>
						<option value="2" <?php  if($_GPC['xuni']=='2') { ?>selected<?php  } ?>>真实</option>
                        <option value="1" <?php  if($_GPC['xuni']=='1') { ?>selected<?php  } ?>>虚拟</option>
                	</select>
				</div>
				<div class="col-xs-12 col-sm-3 col-lg-3">
					<select name="zhongjiang" class="form-control" style="float:left">
                    	<option value="" <?php  if($_GPC['zhongjiang']=='') { ?>selected<?php  } ?>>全部状态</option>
                        <option value="1" <?php  if($_GPC['zhongjiang']=='1') { ?>selected<?php  } ?>>未兑换</option>
						<option value="2" <?php  if($_GPC['zhongjiang']=='2') { ?>selected<?php  } ?>>已兑换</option>						
                	</select>
				</div>
                <div class=" col-xs-12 col-sm-3 col-lg-2">
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
			<a class="btn btn-default<?php  if($_GPC['zhongjiang']=='') { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'xuni'=>$_GPC['xuni'],tickettype=>$_GPC['tickettype'],prizeid=>$_GPC['prizeid']))?>">全　部</a>
			<a class="btn btn-default<?php  if($_GPC['zhongjiang']==1) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>1,'xuni'=>$_GPC['xuni'],tickettype=>$_GPC['tickettype'],prizeid=>$_GPC['prizeid']))?>">未兑换</a>
			<a class="btn btn-default<?php  if($_GPC['zhongjiang']==2) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>2,'xuni'=>$_GPC['xuni'],tickettype=>$_GPC['tickettype'],prizeid=>$_GPC['prizeid']))?>">已兑换</a>
        </div>
    </div>
	<div class="row-fluid" style="margin-top:10px;">
    	<div class="span8 control-group">			
			<a class="btn btn-default<?php  if($_GPC['xuni']=='') { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],tickettype=>$_GPC['tickettype'],prizeid=>$_GPC['prizeid']))?>">全　部</a>
			<a class="btn btn-default<?php  if($_GPC['xuni']==2) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],'xuni'=>2,tickettype=>$_GPC['tickettype'],prizeid=>$_GPC['prizeid']))?>">真实奖</a>
			<a class="btn btn-default<?php  if($_GPC['xuni']==1) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],'xuni'=>1,tickettype=>$_GPC['tickettype'],prizeid=>$_GPC['prizeid']))?>">虚拟奖</a>
        </div>
    </div>
	<div class="row-fluid" style="margin-top:10px;">
    	<div class="span8 control-group">
			<a class="btn btn-default<?php  if($_GPC['tickettype']=='') { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],xuni=>$_GPC['xuni'],prizeid=>$_GPC['prizeid']))?>">全　部</a>
			<a class="btn btn-default<?php  if($_GPC['tickettype']==1) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],'xuni'=>$_GPC['xuni'],tickettype=>1,prizeid=>$_GPC['prizeid']))?>">后台兑奖</a>
			<a class="btn btn-default<?php  if($_GPC['tickettype']==2) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],'xuni'=>$_GPC['xuni'],tickettype=>2,prizeid=>$_GPC['prizeid']))?>">店员兑奖</a>
			<?php  if($stonefish_branch) { ?><a class="btn btn-default<?php  if($_GPC['tickettype']==3) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],'xuni'=>$_GPC['xuni'],tickettype=>3,prizeid=>$_GPC['prizeid']))?>">商家网店</a><?php  } ?>
			<a class="btn btn-default<?php  if($_GPC['tickettype']==4) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],'xuni'=>$_GPC['xuni'],tickettype=>4,prizeid=>$_GPC['prizeid']))?>">密码兑奖</a>
        </div>
    </div>
	<div class="alert" style="margin-bottom:0;">兑奖：共计<?php  echo $total;?>个奖品　　后台兑奖：<?php  echo $num1;?>个　　店员兑奖：<?php  echo $num2;?>个<?php  if($stonefish_branch) { ?>　　商家网店：<?php  echo $num3;?>个<?php  } ?>　　密码兑奖：<?php  echo $num4;?>个</div>
	<div class="row-fluid" style="margin-top:10px;">
    	<div class="span8 control-group">
			<a class="btn btn-default<?php  if($_GPC['prizeid']=='') { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],xuni=>$_GPC['xuni'],tickettype=>$_GPC['tickettype']))?>">全　部</a>
			<?php  if(is_array($award)) { foreach($award as $awardp) { ?>
			<a class="btn btn-default<?php  if($_GPC['prizeid']==$awardp['id']) { ?> btn-primary active<?php  } ?>" href="<?php  echo $this->createWebUrl('prizedata',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],'xuni'=>$_GPC['xuni'],tickettype=>$_GPC['tickettype'],'prizeid'=>$awardp['id']))?>"><?php  echo $awardp['prizerating'];?></a>
			<?php  } } ?>			
        </div>
    </div>
	<div class="alert" style="margin-bottom:0;">
		<?php  if(is_array($award)) { foreach($award as $awardt) { ?>
		    <?php  echo $awardt['prizerating'];?>:<?php  echo $awardt['prizetotal'];?>/<?php  echo $awardt['prizedraw'];?>　　
		<?php  } } ?>			
	</div>
	<div class="row-fluid">
    	<div class="span8 control-group">
			<a class="btn btn-warning" href="<?php  echo $this->createWebUrl('download',array('rid'=>$rid,'zhongjiang'=>$_GPC['zhongjiang'],'xuni'=>$_GPC['xuni'],tickettype=>$_GPC['tickettype'],prizeid=>$_GPC['prizeid'],data=>'prizedata'))?>"><i class="fa fa-download"></i> 导出<?php  echo $statustitle;?>信息</a>
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
					<th style="width:100px;">奖品</th>
					<th style="width:150px;">领取时间</th>
					<th style="width:90px;">兑奖类型</th>
					<th style="width:100px;">兑奖状态</th>
					<th style="width:80px;">兑奖人</th>
					<th style="width:150px;">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<tr>
					<td><input type="checkbox" name="uid[]" value="<?php  echo $row['id'];?>" class=""></td>
					<td><img src="<?php  if(substr($row['avatar'],-1)=='0') { ?><?php  echo rtrim(toimage($row['avatar']), '0').$reply['poweravatar']?><?php  } else { ?><?php  echo toimage($row['avatar'])?><?php  } ?>" width="30"></td>
					<td><a href="javascript:void(0)" id="<?php  echo $row['fid'];?>" class="btn btn-default btn-sm userinfo" style="width:100px;" data-toggle="tooltip" data-placement="top" title="用户兑奖参数项"><i class="fa fa-child"></i> <?php  if(!empty($row['realname'])) { ?><?php  echo $row['realname'];?><?php  } else { ?><?php  echo stripcslashes($row['nickname'])?><?php  } ?></a></td>
					<td><?php  echo $row['mobile'];?></td>
					<td><?php  echo $row['prizerating'];?>:<?php  echo $row['prizename'];?></td>
					<td><?php  echo date('Y/m/d H:i',$row['createtime']);?></td>
					<td><?php  if($row['tickettype']==1) { ?><span class="label label-warning">后台兑奖</span>
						<?php  } else if($row['tickettype']==2) { ?><span class="label label-warning">店员兑奖</span>
						<?php  } else if($row['tickettype']==3) { ?><span class="label label-warning">商家网店</span><?php  } else { ?><span class="label label-warning">密码兑奖</span><?php  } ?></td>
					<td><?php  if($row['zhongjiang']==0) { ?><span class="label label-default">未中奖
						<?php  } else if($row['zhongjiang']==1) { ?><span class="label label-warning">未兑换
						<?php  } else { ?><span class="label label-success">已兑奖<?php  } ?>
						<?php  if($row['xuni']==0) { ?>/真实</span>
						<?php  } else { ?>/虚拟</span><?php  } ?></td>
					<td><?php  echo $row['ticketname'];?></td>
					<td>
						<?php  if($row['fanid']) { ?><a href="./index.php?c=mc&a=notice&do=tpl&id=<?php  echo $row['fanid'];?>" id="<?php  echo $row['fanid'];?>" class="btn btn-success btn-sm sms"> 发送消息</a><?php  } else { ?><span class="btn btn-default btn-sm sms"> 发送消息</span><?php  } ?> <?php  if($row['zhongjiang']==1) { ?><a class="btn btn-warning btn-sm" href="<?php  echo $this->createWebUrl('setprizestatus',array('zhongjiang'=>2,'id'=>$row['id'],'pid'=>$row['prizeid'],'rid'=>$row['rid']))?>"><i class="fa fa-times-circle-o"></i> 确认兑奖</a><?php  } ?>
						<?php  if($row['zhongjiang']==2) { ?><a class="btn btn-success btn-sm" href="<?php  echo $this->createWebUrl('setprizestatus',array('zhongjiang'=>1,'id'=>$row['id'],'pid'=>$row['prizeid'],'rid'=>$row['rid']))?>"><i class="fa fa-check-circle-o"></i> 取消兑奖</a><?php  } ?>
					</td>
				</tr>
				<?php  } } ?>
				<tr>
					<td><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
					<td colspan="9"><input name="token" type="hidden" value="<?php  echo $_W['token'];?>" /><input type="submit" name="deleteall" class="btn btn-danger" value="删除选中的奖品"></td>
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
		$("input[name=deleteall]").click(function(){
		    if($(":checkbox[name='uid[]']:checked").size() > 0){
			    var check = $(":checkbox[name='uid[]']:checked");
			    //if(confirm("确认要删除选择的粉丝中奖记录?")){
		            var id = new Array();
				    var rid = <?php  echo $rid;?>;
		            check.each(function(i){
			            id[i] = $(this).val();
		            });
		            $.post('<?php  echo $this->createWebUrl('deleteprizedata')?>', {idArr:id,rid:rid},function(data){
			        if (data.errno ==0){
						u.message(data.error, '<?php  echo url('site/entry/prizedata',array('m' => 'stonefish_scratch','rid' => $rid))?>', 'warning');
			        }else{
				        u.message(data.error, '', 'error');
			        }
					return false;
		            },'json');
		        //}
		    }else{
		        u.message('没有选择奖品记录', '', 'error');
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