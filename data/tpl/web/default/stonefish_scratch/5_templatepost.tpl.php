<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li<?php  if($_GPC['do'] == 'manage') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>"> 管理幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'template') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('template');?>"> 管理活动模板</a></li>
        <li<?php  if($_GPC['do'] == 'templatepost' || $_GPC['do'] == '' ) { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/templatepost',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加活动模板</a></li>
		<li<?php  if($_GPC['do'] == 'tmplmsg') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('tmplmsg');?>"> 管理消息模板</a></li>
        <li<?php  if($_GPC['do'] == 'tmplmsgpost') { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/tmplmsgpost',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加消息模板</a></li>		
	</ul>
	<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
	<input type="hidden" name="uniacid" value="<?php  echo $item['uniacid'];?>">
    <div class="panel panel-default">
	    <div class="panel-heading">模板配置</div>
	        <div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">模板名称</label>
					<div class="col-sm-9">
						<input type="text" name="title" value="<?php  if(!empty($item['title'])) { ?><?php  echo $item['title'];?><?php  } ?>" class="form-control">
					</div>
				</div>				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">模板图标</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_image('thumb',$item['thumb']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >文字大小</label>
					<div class="col-sm-9">
						<div class="input-group">
					        <input type="text" name="fontsize" value="<?php  if(!empty($item['fontsize'])) { ?><?php  echo $item['fontsize'];?><?php  } ?>" class="form-control">
					        <span class="input-group-addon">PX</span>					
				        </div>				
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">背景图</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_image('bgimg',$item['bgimg']);?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">背景色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('bgcolor', $item['bgcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('textcolor', $item['textcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">链接文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('textcolorlink', $item['textcolorlink'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">按钮色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('buttoncolor', $item['buttoncolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">按钮文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('buttontextcolor', $item['buttontextcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">规则框背景色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('rulecolor', $item['rulecolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">规则框文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('ruletextcolor', $item['ruletextcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">导航色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('navcolor', $item['navcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">导航文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('navtextcolor', $item['navtextcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">导航选中文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('navactioncolor', $item['navactioncolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">弹出框背景色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('watchcolor', $item['watchcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">弹出框文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('watchtextcolor', $item['watchtextcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">兑奖框背景色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('awardcolor', $item['awardcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">兑奖框文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('awardtextcolor', $item['awardtextcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">兑奖框成功背景色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('awardscolor', $item['awardscolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">兑奖框成功文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('awardstextcolor', $item['awardstextcolor'])?>
					</div>
				</div>
	        </div>			
        </div>
		<div class="form-group">
		    <div class="col-sm-12">
			    <button type="submit" class="btn btn-primary col-lg-3" name="submit" value="保存模板配置">保存模板配置</button>
			    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		    </div>
	    </div>
    </div>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>