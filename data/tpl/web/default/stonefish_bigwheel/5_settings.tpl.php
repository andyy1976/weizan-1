<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1"> 
		<div class="alert alert-info">请根据自身活动设置选择不同的权限</div>
		<div class="panel panel-default">
		<div class="panel-heading">参数设置</div>
			<?php  if($stonefish_branch) { ?>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">商家网点权限</label>
					<div class="col-sm-9">
						<label class="radio-inline">
					        <input type="radio" name="stonefish_bigwheel_num" value="1" <?php  if($settings['stonefish_bigwheel_num'] == 1) { ?> checked="checked"<?php  } ?>/>审核生效
					    </label>
						<label class="radio-inline">
					        <input type="radio" name="stonefish_bigwheel_num" value="2" <?php  if($settings['stonefish_bigwheel_num'] == 2) { ?> checked="checked"<?php  } ?>/>立即生效
					    </label>
					    <div class="help-block"><strong>审核生效：</strong>商家网点添加的礼盒领取资格需要管理员审核后才能生效</div>
					    <div class="help-block"><strong>立即生效：</strong>商家网点添加的礼盒领取资格粉丝即可参与活动抽奖</div>
					</div>
				</div>
			</div>
			<?php  } ?>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">非微信页访问<br></label>
					<div class="col-sm-9">
						<label class="radio-inline">
					        <input type="radio" name="weixinvisit" value="1" <?php  if($settings['weixinvisit'] == 1) { ?> checked="checked"<?php  } ?> />非微信不可访问
					    </label>
						<label class="radio-inline">
					        <input type="radio" name="weixinvisit" value="0" <?php  if($settings['weixinvisit'] == 0) { ?> checked="checked"<?php  } ?> />非微信可访问
					    </label>						
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">授权时效</label>
			        <div class="col-sm-9 col-xs-12">
				        <div class="input-group">
						    <span class="input-group-addon">弹出授权</span>
					        <input type="text" name="stonefish_oauth_time" class="form-control" value="<?php  echo $settings['stonefish_oauth_time'];?>" />
					        <span class="input-group-addon">天内有效</span>					
					    </div>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">借用oAuth设置<br></label>
					<div class="col-sm-9">
						<label class="radio-inline">
					        <input type="radio" name="stonefish_bigwheel_oauth" value="0" <?php  if($settings['stonefish_bigwheel_oauth'] == 0) { ?> checked="checked"<?php  } ?>  onclick="$('#app').hide();$('#appimg').hide();$('#apphelp').hide();$('#appsys').hide();"/>认证服务号无需设置 或 无借用
					    </label>
						<label class="radio-inline">
					        <input type="radio" name="stonefish_bigwheel_oauth" value="1" <?php  if($settings['stonefish_bigwheel_oauth'] == 1) { ?> checked="checked"<?php  } ?>  onclick="$('#app').hide();$('#appimg').hide();$('#apphelp').hide();$('#appsys').show();"/>系统借用
					    </label>
						<label class="radio-inline">
					        <input type="radio" name="stonefish_bigwheel_oauth" value="2" <?php  if($settings['stonefish_bigwheel_oauth'] == 2) { ?> checked="checked"<?php  } ?>  onclick="$('#app').show();$('#appimg').show();$('#apphelp').show();$('#appsys').hide();"/>模块借用
					    </label>
					    <div class="help-block"><span style="color:#F00;"><b>认证服务号无需设置 或 无借用 请选择此项</b></span></div>
						<div class="help-block" id="appsys"<?php  if($settings['stonefish_bigwheel_oauth']==0 || $settings['stonefish_bigwheel_oauth']==2) { ?> style="display: none;"<?php  } ?>><strong>系统借用：</strong>功能选项之公众号选项下借用oAuth设置 <a href="index.php?c=mc&a=passport&do=oauth">点击设置</a></div>
					    <div class="help-block" id="apphelp"<?php  if($settings['stonefish_bigwheel_oauth']==0 || $settings['stonefish_bigwheel_oauth'] == 1 || $oauth['status']==1) { ?> style="display: none;"<?php  } ?>><strong>模块借用：</strong>请填写你要借用的Appid以及AppSecret 并设置借用公众号回调域名为本平台域名，详细见面图说明 <a href="#oauth">查看说明</a></div>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div id="app"<?php  if($settings['stonefish_bigwheel_oauth']==0 || $settings['stonefish_bigwheel_oauth'] == 1) { ?> style="display: none;"<?php  } ?>>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">借用AppId</label>
					<div class="col-sm-3">
					    <input type="text" name="appid" class="form-control" value="<?php  echo $settings['appid'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">借用AppSecret</label>
					<div class="col-sm-5">
					    <input type="text" name="secret" class="form-control" value="<?php  echo $settings['secret'];?>" />
					</div>
				</div>
				</div>				
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">借用JS分享设置<br></label>
					<div class="col-sm-9">
						<label class="radio-inline">
					        <input type="radio" name="stonefish_bigwheel_jssdk" value="0" <?php  if($settings['stonefish_bigwheel_jssdk'] == 0) { ?> checked="checked"<?php  } ?>  onclick="$('#appjs').hide();$('#appjsimg').hide();$('#appjshelp').hide();$('#appjssys').hide();"/>认证号无需设置
					    </label>
						<label class="radio-inline">
					        <input type="radio" name="stonefish_bigwheel_jssdk" value="1" <?php  if($settings['stonefish_bigwheel_jssdk'] == 1) { ?> checked="checked"<?php  } ?>  onclick="$('#appjs').hide();$('#appjsimg').hide();$('#appjshelp').hide();$('#appjssys').show();"/>系统借用
					    </label>
						<label class="radio-inline">
					        <input type="radio" name="stonefish_bigwheel_jssdk" value="2" <?php  if($settings['stonefish_bigwheel_jssdk'] == 2) { ?> checked="checked"<?php  } ?>  onclick="$('#appjs').show();$('#appjsimg').show();$('#appjshelp').show();$('#appjssys').hide();"/>模块借用
					    </label>
					    <div class="help-block"><span style="color:#F00;"><b>认证号无需设置 请选择此项</b></span></div>
						<div class="help-block" id="appjssys"<?php  if($settings['stonefish_bigwheel_jssdk']==0 || $settings['stonefish_bigwheel_jssdk']==2) { ?> style="display: none;"<?php  } ?>><strong>系统借用：</strong>功能选项之公众号选项下借用JS分享设置 <a href="index.php?c=profile&a=jsauth&">点击设置</a></div>
					    <div class="help-block" id="appjshelp"<?php  if($settings['stonefish_bigwheel_jssdk']==0 || $settings['stonefish_bigwheel_jssdk'] == 1) { ?> style="display: none;"<?php  } ?>><strong>模块借用：</strong>请填写你要借用的Appid以及AppSecret 并设置借用认证号的JS分享安全域名为本平台域名，详细见面图说明 <a href="#oauth">查看说明</a></div>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div id="appjs"<?php  if($settings['stonefish_bigwheel_jssdk']==0 || $settings['stonefish_bigwheel_jssdk'] == 1) { ?> style="display: none;"<?php  } ?>>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">借用JS分享设置AppId</label>
					<div class="col-sm-3">
					    <input type="text" name="jssdk_appid" class="form-control" value="<?php  echo $settings['jssdk_appid'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">借用JS分享设置AppSecret</label>
					<div class="col-sm-5">
					    <input type="text" name="jssdk_secret" class="form-control" value="<?php  echo $settings['jssdk_secret'];?>" />
					</div>
				</div>
				</div>
			</div>
			<div class="panel-body">
			    <div class="form-group col-sm-12">
			         <div class="col-sm-12">
				        <input type="submit" name="submit" value="保存参数设置" class="btn btn-primary col-lg-3" />
			            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
			        </div>
		        </div>
			</div>
	    </div>
		
		<a name="oauth"></a>
		<div class="panel panel-default" id="appimg"<?php  if($settings['stonefish_bigwheel_oauth']==0 || $settings['stonefish_bigwheel_oauth'] == 1) { ?> style="display: none;"<?php  } ?>>
		<div class="panel-heading">借用说明</div>
			<div class="panel-body">
				<div class="help-block">借用说明：必需设置借用高级认证号的OAuth2.0网页授权的回调域名为你公众号第三方平台的全域名。如：你的平台域名为：www.weixin.com ，你必需让借用高级认证号设置OAuth2.0网页授权的回调域名为:www.weixin.com</div>
				<div class="help-block">使用的AppId和AppSecret在功能-高级功能-开发模式-开发者凭据中，可以找到。这个也是借用的高级证号</div>
				<div class="help-block"><img src="../addons/stonefish_bigwheel/template/images/appidappsecret.jpg"></div>
			</div>
	    </div>
		<a name="jssdk"></a>
		<div class="panel panel-default" id="appjsimg"<?php  if($settings['stonefish_bigwheel_jssdk']==0 || $settings['stonefish_bigwheel_jssdk'] == 1) { ?> style="display: none;"<?php  } ?>>
		<div class="panel-heading">借用JS分享说明</div>
			<div class="panel-body">
				<div class="help-block">借用说明：必需设置借用认证号的JS安全域名为你公众号第三方平台的全域名。如：你的平台域名为：www.weixin.com ，你必需让借用认证号设置JS安全域名为:www.weixin.com</div>
				<div class="help-block">使用的AppId和AppSecret在功能-高级功能-开发模式-开发者凭据中，可以找到。这个也是借用的认证号</div>
				<div class="help-block"><img src="../addons/stonefish_bigwheel/template/images/appidappsecretjs.jpg"></div>
			</div>
	    </div>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>