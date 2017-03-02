<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<?php  if($reply['id']) { ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="row-fluid">
				<div class="span8 control-group">
					<a class="btn btn-default" href="<?php  echo $this->createWebUrl('members', array('rid' => $rid))?>">投票管理</a>
					<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('provevote', array('rid' => $rid, 'foo' => 'display'))?>">审核管理</a>				
					<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('tags', array('rid' => $rid))?>">分组</a>				
					<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('votelog', array('rid' => $rid))?>">投票记录</a>
					<a class="btn btn-default"  href="<?php  echo $this->createWebUrl('message', array('rid' => $rid))?>">留言管理</a>
					<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('rankinglist', array('rid' => $rid))?>">排行榜</a>
					<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('announce', array('rid' => $rid))?>">公告</a>
					<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('banner', array('rid' => $rid))?>">幻灯片</a>
					<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('adv', array('rid' => $rid))?>">赞助商</a>
					<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('fmqf', array('rid' => $rid))?>">群发</a>
					<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('fmcount', array('rid' => $rid))?>">数据统计</a>
					<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('iplist', array('rid' => $rid))?>">禁止ip设置</a>
					<a  class="btn btn-default" href="<?php  echo $this->createWebUrl('index', array('rid' => $rid))?>">活动首页</a>	
				</div>
			</div>
		</div>
	</div>
<?php  } ?>
<div class="panel panel-default">
	<div class="panel-heading">
		女神来了设置
	</div>

	<style type="text/css">
		.bootstrap-switch .bootstrap-switch-handle-on.bootstrap-switch-primary {
		    color: #fff;
		    background: #A5428B;
		}
	</style>
	<div class="panel-body">
		<?php  if(!empty($rid)) { ?>
			<ul class="nav nav-tabs">
				
					<li  class="active" ><a href="<?php  echo url('platform/reply/post',array('m'=>'fm_photosvote','rid'=>$rid));?>">基本设置</a></li>
				
					<li  <?php  if($op == 'rshare') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('system',array('op'=>'rshare','rid'=>$rid));?>" >关注分享</a></li>
					<li  <?php  if($op == 'rhuihua') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('system',array('op'=>'rhuihua','rid'=>$rid));?>" >会话设置</a></li>
					<li  <?php  if($op == 'rdisplay') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('system',array('op'=>'rdisplay','rid'=>$rid));?>" >显示设置</a></li>
					<li  <?php  if($op == 'rvote') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('system',array('op'=>'rvote','rid'=>$rid));?>" >投票设置</a></li>
					<li  <?php  if($op == 'rbody') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('system',array('op'=>'rbody','rid'=>$rid));?>" >页面设置</a></li>
					<li  <?php  if($op == 'rupload') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('system',array('op'=>'rupload','rid'=>$rid));?>" >存储设置</a></li>
					<li  <?php  if($op == 'rjifen') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('system',array('op'=>'rjifen','rid'=>$rid));?>" >积分奖品</a></li>
					<li  <?php  if($op == 'rstar') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('system',array('op'=>'rstar','rid'=>$rid));?>" >抢幸运星</a></li>
				
			</ul>
		<?php  } ?>
		<div class="tab-content">
			<div class="tab-pane  active" id="tab_basic"><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/form_basic', TEMPLATE_INCLUDEPATH)) : (include template('web/form_basic', TEMPLATE_INCLUDEPATH));?></div>
		</div>
	</div>
</div>

<script type="text/javascript">
<!--	
	require(['jquery', 'util', 'bootstrap.switch'], function($, u){
		$(function(){
			
			u.editor($('.richtext')[0]);
			//u.editor($('.richtexti')[0]);
			$('.js-flag:checkbox').bootstrapSwitch({onText: '开启', offText: '关闭'});
			$('.js-flag:checkbox').on('switchChange.bootstrapSwitch', function(event, state) {
				var radiotype = $(this).attr('radiotype');
				//var ban = state ? 1 : 0;
				if (state) {
					$('#'+radiotype+'').show();
				}else{
					$('#'+radiotype+'').hide();
				}
				
			});
		});
		
	});
//-->	
</script>