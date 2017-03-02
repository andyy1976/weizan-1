<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('level');?>">等级头衔</a></li>
	<li><a href="<?php  echo $this->createWebUrl('sms');?>">短信中心</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('signin');?>">签到中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('message');?>">消息中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('feedback');?>">留言中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('task');?>">任务中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('member');?>">会员中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('template');?>">会员模板</a></li>
	<li><a href="<?php  echo $this->createWebUrl('fanslog');?>">粉丝统计</a></li>	
	<li><a href="<?php  echo $this->createWebUrl('memberlog');?>">会员统计</a></li>
</ul>

<!-- 积分策略设置 -->
<div class="clearfix">
<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data" id="form1">
	    <div class="alert alert-info">奖励积分(必须为整数) 注意:积分数最好控制在1－9之间。</div>
		<div class="panel panel-default">
		    <div class="panel-heading">
			    是否启用签到积分：
			    <input type="checkbox" name="flag" value="1" <?php  if(intval($setting['signinstatus'])==1) { ?> checked="checked" <?php  } ?> data="<?php  echo $setting['id'];?>"/>
		    </div>
			<div class="panel-body">
			<div class="row-fluid">
    			<div class="span8 control-group">
					<a class="btn btn-default" href="<?php  echo $this->createWebUrl('signinrecord');?>"><i class="fa fa-list"></i> 签到记录</a>
					<a class="btn btn-default" href="<?php  echo $this->createWebUrl('signinprize');?>" style="margin-left:10px;"><i class="fa fa-list"></i> 奖励记录</a>
       		 </div>
    		</div>
    		</div>
	    </div>
		
		<?php  if(($setting['signinstatus'] != 0)) { ?>
		<div class="panel panel-default" id="cardmain">
			<div class="panel-heading">
				积分策略设置
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">签到提示词<span style="color:red">*</span></label>
					<div class="col-sm-9">
						<textarea style="height:150px;" name="dsigninfo" class="form-control" cols="70"><?php  echo $setting['dsigninfo'];?></textarea>
						<div class="help-block">每行一个,会员中心首页提示用户签到,用于变化提示内容</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">每天签到奖励</label>
					<div class="col-sm-9">
					    <div class="input-group input-medium">
                        	<span class="input-group-addon">每天签到系统自动奖励</span>
                        	<input type="text" name="dsigncredit" value="<?php  echo $setting['dsigncredit'];?>" class="form-control">
							<span class="input-group-addon" style="border-left:0px;border-right:0px;">个</span>
							<select name="dsigntype" class="form-control">
							    <?php  if(is_array($creditnames)) { foreach($creditnames as $key => $credit) { ?>
							    <option value="<?php  echo $key;?>" <?php  if($key == $setting['dsigntype']) { ?>selected<?php  } ?>><?php  echo $credit;?></option>
							    <?php  } } ?>
							</select>
                    	</div>						
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">显示每日排行</label>
					<div class="col-sm-9">
                        <input type="text" name="showrank" value="<?php  echo $setting['showrank'];?>" class="form-control">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">累计签到</label>
					<div class="col-sm-9">
						<div class="input-group input-medium">
                        	<span class="input-group-addon">累计签到累计</span>
                        	<input type="text" name="tsign" value="<?php  echo $setting['tsign'];?>" class="form-control">
							<span class="input-group-addon" style="border-left:0px;border-right:0px;">次系统自动奖励</span>
							<input type="text" name="tsigncredit" value="<?php  echo $setting['tsigncredit'];?>" class="form-control">
							<span class="input-group-addon" style="border-left:0px;border-right:0px;">个</span>
							<select name="tsigntype" class="form-control">
							    <?php  if(is_array($creditnames)) { foreach($creditnames as $key => $credit) { ?>
							    <option value="<?php  echo $key;?>" <?php  if($key == $setting['tsigntype']) { ?>selected<?php  } ?>><?php  echo $credit;?></option>
							    <?php  } } ?>
							</select>
                    	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">连续签到</label>
					<div class="col-sm-9">
						<div class="input-group input-medium">
                        	<span class="input-group-addon">连续签到累计</span>
                        	<input type="text" name="csign" value="<?php  echo $setting['csign'];?>" class="form-control">
							<span class="input-group-addon" style="border-left:0px;border-right:0px;">次系统自动奖励</span>
							<input type="text" name="csigncredit" value="<?php  echo $setting['csigncredit'];?>" class="form-control">
							<span class="input-group-addon" style="border-left:0px;border-right:0px;">个</span>
							<select name="csigntype" class="form-control">
							    <?php  if(is_array($creditnames)) { foreach($creditnames as $key => $credit) { ?>
							    <option value="<?php  echo $key;?>" <?php  if($key == $setting['csigntype']) { ?>selected<?php  } ?>><?php  echo $credit;?></option>
							    <?php  } } ?>
							</select>
                    	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">签到第一累计</label>
					<div class="col-sm-9">
						<div class="input-group input-medium">
                        	<span class="input-group-addon">签到第一累计</span>
                        	<input type="text" name="osign" value="<?php  echo $setting['osign'];?>" class="form-control">
							<span class="input-group-addon" style="border-left:0px;border-right:0px;">次系统自动奖励</span>
							<input type="text" name="osigncredit" value="<?php  echo $setting['osigncredit'];?>" class="form-control">
							<span class="input-group-addon" style="border-left:0px;border-right:0px;">个</span>
							<select name="osigntype" class="form-control">
							    <?php  if(is_array($creditnames)) { foreach($creditnames as $key => $credit) { ?>
							    <option value="<?php  echo $key;?>" <?php  if($key == $setting['osigntype']) { ?>selected<?php  } ?>><?php  echo $credit;?></option>
							    <?php  } } ?>
							</select>
                    	</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">每日签到时间</label>
					<div class="col-sm-9">
					    <div class="input-group input-medium">
                        	<span class="input-group-addon">从</span>                        	
							<select name="start_time_xiaoshi" class="form-control">
							    <?php  if(is_array($timexiaoshi)) { foreach($timexiaoshi as $timexiaoshis) { ?>
							    <option value="<?php  echo $timexiaoshis;?>" <?php  if($timexiaoshis == $setting['start_timexiaoshi']) { ?>selected<?php  } ?>><?php  echo $timexiaoshis;?></option>
								<?php  } } ?>								
							</select>
							<span class="input-group-addon" style="border-left:0px;border-right:0px;">点</span>
							<select name="start_time_fen" class="form-control">
							    <?php  if(is_array($timefen)) { foreach($timefen as $timefens) { ?>
							    <option value="<?php  echo $timefens;?>" <?php  if($timefens == $setting['start_timefen']) { ?>selected<?php  } ?>><?php  echo $timefens;?></option>
								<?php  } } ?>								
							</select>
							<span class="input-group-addon" style="border-left:0px;border-right:0px;">分 至</span>
							<select name="end_time_xiaoshi" class="form-control">
							    <?php  if(is_array($timexiaoshi)) { foreach($timexiaoshi as $key => $timexiaoshis) { ?>
							    <option value="<?php  echo $timexiaoshis;?>" <?php  if($timexiaoshis == $setting['end_timexiaoshi']) { ?>selected<?php  } ?>><?php  echo $timexiaoshis;?></option>
								<?php  } } ?>								
							</select>
							<span class="input-group-addon" style="border-left:0px;border-right:0px;">点</span>
							<select name="end_time_fen" class="form-control">
							    <?php  if(is_array($timefen)) { foreach($timefen as $key => $timefens) { ?>
							    <option value="<?php  echo $timefens;?>" <?php  if($timefens == $setting['end_timefen']) { ?>selected<?php  } ?>><?php  echo $timefens;?></option>
								<?php  } } ?>								
							</select>
							<span class="input-group-addon" style="border-left:0px;border-right:0px;">分 结束</span>
                    	</div>                        
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">积分规则说明<span style="color:red">*</span></label>
					<div class="col-sm-9">
						<textarea style="height:200px;" name="description" class="form-control richtext" cols="70"><?php  echo $setting['signindescription'];?></textarea>
					</div>
				</div>				
			</div>
		</div>
		<?php  } ?>
		<div class="form-group">
			<div class="col-sm-12">
				<button type="submit" class="btn btn-primary col-lg-1" name="submit" value="保存积分策略">保存积分策略</button>
				<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			</div>
		</div>
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
		$(function(){
			u.editor($('.richtext')[0]);
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>