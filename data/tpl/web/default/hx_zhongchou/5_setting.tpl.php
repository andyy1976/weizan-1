<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
.red {float:left;color:red}
.white{float:left;color:#fff}
.tooltipbox {
	background:#fef8dd;border:1px solid #c40808; position:absolute; left:0;top:0; text-align:center;height:20px;
	color:#c40808;padding:2px 5px 1px 5px; border-radius:3px;z-index:1000;
}
.red { float:left;color:red}
</style>
<ul class="nav nav-tabs">
    <li class="active"><a href="<?php  echo wurl('profile/module/setting',array('m'=>'hx_o2o'))?>">参数设置</a></li>
</ul>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
		<div class="panel panel-default">
			<div class="panel-heading">
				提醒设置
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">提醒接收邮箱</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="noticeemail" class="form-control" value="<?php  echo $settings['noticeemail'];?>" />
					</div>
				</div>
			</div>
		</div>
        <div class="panel panel-default">
            <div class="panel-heading">
                分享设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享标题</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="share_title" class="form-control" value="<?php  echo $settings['share_title'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享描述</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea name="share_description" class="form-control" cols="70"><?php  echo $settings['share_description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享图片</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('share_img',$settings['share_img'])?>
                    </div>
                </div>
            </div>
            
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">模板消息设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">接收消息客服ID</label>
                    <div class="col-xs-12 col-sm-9 input-group">
                    	<input type="text" name="kfid" class="form-control" value="<?php  echo $settings['kfid'];?>" /><span class="input-group-addon"><a href="/web/index.php?c=mc&a=fans&" target="_blank">openid：粉丝管理中的粉丝编号</a>【若为用户发布的众筹将同时通知发起人和此客服】</span>
                    </div>
                </div>
                <div class="form-group" style="background-color:#eee;">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">通知客服模板ID</label>
                    <div class="col-xs-12 col-sm-9 input-group">
                    	<input type="text" name="k_templateid" class="form-control" value="<?php  echo $settings['k_templateid'];?>" /><span class="input-group-addon">例（IT科技 - 互联网|电子商务）：新订单提醒，编号：OPENTM207804697</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-9 input-group">
                    <span class="input-group-addon">标题(默认为：您有一个新的众筹订单)：</span><input type="text" name="kfirst" class="form-control" value="<?php  echo $settings['kfirst'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword1.DATA}}：</span><input type="text" class="form-control" value="订单编号" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword2.DATA}}：</span><input type="text" class="form-control" value="订单详情" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword3.DATA}}：</span><input type="text" class="form-control" value="订单金额" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword4.DATA}}：</span><input type="text" class="form-control" value="联系人" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword5.DATA}}：</span><input type="text" class="form-control" value="支付方式" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-9 input-group">
                    <span class="input-group-addon">尾注(默认为：请及时处理，点击可查看详情)：</span><input type="text" name="kfoot" class="form-control" value="<?php  echo $settings['kfoot'];?>" />
                    </div>
                </div>
                <div class="form-group" style="background-color:#eee;">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户支付成功通知</label>
                    <div class="col-xs-12 col-sm-9 input-group">
                    	<input type="text" name="m_templateid" class="form-control" value="<?php  echo $settings['m_templateid'];?>" /><span class="input-group-addon">例（IT科技 - 互联网|电子商务）：订单支付成功通知，编号：OPENTM207498902</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-9 input-group">
                    <span class="input-group-addon">标题(默认为：众筹支付成功通知)：</span><input type="text" name="mfirst" class="form-control" value="<?php  echo $settings['mfirst'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword1.DATA}}：</span><input type="text" class="form-control" value="用户名" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword2.DATA}}：</span><input type="text" class="form-control" value="订单号" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword3.DATA}}：</span><input type="text" class="form-control" value="订单金额" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword4.DATA}}：</span><input type="text" class="form-control" value="商品信息" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-9 input-group">
                    <span class="input-group-addon">尾注(默认为：点击查看订单详情)：</span><input type="text" name="mfoot" class="form-control" value="<?php  echo $settings['mfoot'];?>" />
                    </div>
                </div>
            </div>
        </div>
		<div class="panel panel-default">
			<div class="panel-heading">站点信息</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否允许前台发布信息</label>
					<div class="col-sm-9 col-xs-12" style="padding-top:7px;">
						<label><input type="radio" name="ispublish" value="0" <?php  if($settings['ispublish'] == 0) { ?>checked<?php  } ?>/> 禁止 </label>
						<label><input type="radio" name="ispublish" value="1" <?php  if($settings['ispublish'] == 1) { ?>checked<?php  } ?> /> 允许 </label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">站点名称</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="shopname" class="form-control" value="<?php  echo $settings['shopname'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">官方网址</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="officialweb" class="form-control" value="<?php  echo $settings['officialweb'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">站点logo</label>
					<div class="col-sm-9 col-xs-12">
						<?php  echo tpl_form_field_image('logo', $settings['logo'])?><span class="help-block">建议使用尺寸为120px*35px的png格式图片</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">联系电话</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="phone" class="form-control" value="<?php  echo $settings['phone'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">联系邮箱</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="email" class="form-control" value="<?php  echo $settings['email'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">所在地址</label>
					<div class="col-sm-9 col-xs-12">
						<input type="text" name="address" class="form-control" value="<?php  echo $settings['address'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">众筹介绍</label>
					<div class="col-sm-9 col-xs-12">
						<textarea name="description" class="form-control richtext" cols="70"><?php  echo $settings['description'];?></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
            <div class="panel-heading">
                企业付款的接口参数
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="alert alert-info">
                            企业付款需要使用 <br>
                            <span class="label label-info">认证服务号并开通微信支付</span> <br>
                            如果账号是订阅号也可以借用别人的账号
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">AppID</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="appid" value="<?php  echo $settings['appid'];?>" class="form-control">
                        <span class="help-block">使用或借用的认证服务号AppID</span>
                        <span class="help-block"><strong>设置好以后请不要更换, 否则会造成重复领取红包</strong></span>
                        <span class="help-block"><strong>请在公众平台中设置oAuth授权域名为当前系统域名, <a href="http://mp.weixin.qq.com/" target="_blank">去设置</a></strong></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">AppSecret</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="secret" value="<?php  echo $settings['secret'];?>" class="form-control">
                        <span class="help-block">使用或借用的认证服务号AppSecret, 需要使用高级接口鉴权</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商户号</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="mchid" value="<?php  echo $settings['mchid'];?>" class="form-control">
                        <span class="help-block">使用或借用的微信支付商户号, 开通微信支付才能获得商户号</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商户支付密钥</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="password" value="<?php  echo $settings['password'];?>" class="form-control">
                        <span class="help-block">使用或借用的微信支付商户所使用的支付密钥, 开通微信支付才能获得商户号</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">服务器IP</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="ip" value="<?php  echo $settings['ip'];?>" class="form-control">
                        <span class="help-block">发放红包接口需要服务器IP. 程序将自动获取你的服务器IP, 如果获取失败, 请手动指定</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商户支付证书</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea class="form-control" name="cert" rows="8" placeholder="为保证安全性, 不显示证书内容. 若要修改, 请直接输入"></textarea>
                        <span class="help-block">从商户平台上下载支付证书, 解压并取得其中的 <mark>apiclient_cert.pem</mark> 用记事本打开并复制文件内容, 填至此处</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">支付证书私钥</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea class="form-control" name="key" rows="8" placeholder="为保证安全性, 不显示证书内容. 若要修改, 请直接输入"></textarea>
                        <span class="help-block">从商户平台上下载支付证书, 解压并取得其中的 <mark>apiclient_key.pem</mark> 用记事本打开并复制文件内容, 填至此处</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">支付根证书</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea class="form-control" name="ca" rows="8" placeholder="为保证安全性, 不显示证书内容. 若要修改, 请直接输入"></textarea>
                        <span class="help-block">从商户平台上下载支付证书, 解压并取得其中的 <mark>rootca.pem</mark> 用记事本打开并复制文件内容, 填至此处</span>
                    </div>
                </div>
            </div>
        </div>
		<div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>
<script language='javascript'>
	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('.richtext')[0]);
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>