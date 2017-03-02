<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1"> 
		<div class="alert alert-info">开启本会员模块后,请关闭平台粉丝营销中的会员入口</div>
		<div class="panel panel-default" id="cardmain">
			<div class="panel-heading">
				会员界面配置
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">背景色</label>
					<div class="col-sm-9">
                        <?php  echo tpl_form_field_color('memberbgcolor', $mconfig['memberbgcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">文字色</label>
					<div class="col-sm-9">
                        <?php  echo tpl_form_field_color('membercolor', $mconfig['membercolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">顶部背景图</label>
					<div class="col-sm-9">
					    <?php  if(empty($mconfig['homebg'])) { ?>
                            <?php  echo tpl_form_field_image('homebg', '../addons/stonefish_member/template/images/head-bg.png')?>
                        <?php  } else { ?>
                            <?php  echo tpl_form_field_image('homebg', $mconfig['homebg'])?>
                        <?php  } ?>
                        <span style="color:red;">*建议尺寸：宽640像素，高340像素</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">导航文字色</label>
					<div class="col-sm-9">
                        <?php  echo tpl_form_field_color('membernavcolor', $mconfig['membernavcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">导航选中文字色</label>
					<div class="col-sm-9">
                        <?php  echo tpl_form_field_color('membernavacolor', $mconfig['membernavacolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">左测图标色</label>
					<div class="col-sm-9">
                        <?php  echo tpl_form_field_color('memberiocncolor', $mconfig['memberiocncolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">按钮背景色</label>
					<div class="col-sm-9">
                        <?php  echo tpl_form_field_color('memberbntcolor', $mconfig['memberbntcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">按钮文字色</label>
					<div class="col-sm-9">
                        <?php  echo tpl_form_field_color('memberbnttcolor', $mconfig['memberbnttcolor'])?>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">关联功能配置</div>
			<div class="panel-body">
				<?php  if($stonefish_branch) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否关联</label>
					<div class="col-sm-8">
						<label for="module_branch" class="checkbox-inline">
						    <input type="checkbox" name="module_branch" value="1" id="module_branch" <?php  if(intval($settings['module_branch'])==1) { ?> checked="checked" <?php  } ?> data="<?php  echo $settings['module_branch'];?>" /> <strong>商家网点</strong> [提供商家信息的添加、聚合及LBS的查询]
						</label>
						<span class="help-block">关联此功能模块时，会员注册时会要求会员选择商家网点以及领取特权或其他奖品时，默认以此商家网点进行兑换</span>
					</div>
				</div>
				<?php  } ?>
				<?php  if($stonefish_shopping) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否关联</label>
					<div class="col-sm-8">
						<label for="module_shopping" class="checkbox-inline">
						    <input type="checkbox" name="module_shopping" value="1" id="module_shopping" <?php  if(intval($settings['module_shopping'])==1) { ?> checked="checked" <?php  } ?> data="<?php  echo $settings['module_shopping'];?>" /> <strong>微信商城</strong> [为商家提供微信端在线购物以及积分兑换综合类商城]
						</label>
						<span class="help-block">关联此功能模块后，会员中心显示微信商城的订单信息，微信商城的积分的会员系统以此会员中心为准</span>
					</div>
				</div>
				<?php  } ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否关联</label>
					<div class="col-sm-8">
						<label for="mc_activity" class="checkbox-inline">
						    <input type="checkbox" name="mc_activity" value="1" id="mc_activity" <?php  if(intval($settings['mc_activity'])==1) { ?> checked="checked" <?php  } ?> data="<?php  echo $settings['mc_activity'];?>" /> <strong>积分兑换</strong> [粉丝营销之积分兑换功能折扣券、代金券、真实物品]
						</label>
						<span class="help-block">关联此功能模块后，会员中心显示积分兑换功能折扣券、代金券、真实物品</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否关联</label>
					<div class="col-sm-8">
						<label for="mc_card" class="checkbox-inline">
						    <input type="checkbox" name="mc_card" value="1" id="mc_card" <?php  if(intval($settings['mc_card'])==1) { ?> checked="checked" <?php  } ?> data="<?php  echo $settings['mc_card'];?>" /> <strong>会员卡</strong> [粉丝营销之会员卡会员卡管理、商家设置以及店员设置]
						</label>
						<span class="help-block">关联此功能模块后，会员中心显示会员卡功能</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否关联</label>
					<div class="col-sm-8">
						<label for="mc_pay" class="checkbox-inline">
						    <input type="checkbox" name="mc_pay" value="1" id="mc_pay" <?php  if(intval($settings['mc_pay'])==1) { ?> checked="checked" <?php  } ?> data="<?php  echo $settings['mc_pay'];?>" /> <strong>会员充值</strong>
						</label>
						<span class="help-block">关联此功能模块后，会员中心显示会员充值功能</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否强制</label>
					<div class="col-sm-8">
						<label for="smsverification" class="checkbox-inline">
						    <input type="checkbox" name="smsverification" value="1" id="smsverification" <?php  if(intval($settings['smsverification'])==1) { ?> checked="checked" <?php  } ?> data="<?php  echo $settings['smsverification'];?>" /> <strong>短信验证</strong>
						</label>
						<span class="help-block">开启此功能并开启短信中心的短信验证功能时，没有短信验证会员将重新进行短信验证</span>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">分享配置</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分享标题</label>
					<div class="col-sm-9">
                        <input type="text" name="sharetitle" class="form-control" value="<?php  echo $mconfig['sharetitle'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分享简介</label>
					<div class="col-sm-9 col-xs-12">
						<textarea name="sharedesc" class="form-control" cols="70"><?php  echo $mconfig['sharedesc'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">分享图片</label>
					<div class="col-sm-9">
					    <?php  if(empty($mconfig['sharepic'])) { ?>
                            <?php  echo tpl_form_field_image('sharepic', '../addons/stonefish_member/template/images/sharepic.png')?>
                        <?php  } else { ?>
                            <?php  echo tpl_form_field_image('sharepic', $mconfig['sharepic'])?>
                        <?php  } ?>
                        <span style="color:red;">建议尺寸：宽200像素，高200像素</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">关注引导页</label>
					<div class="col-sm-9">
                        <input type="text" name="shareurl" class="form-control" value="<?php  echo $mconfig['shareurl'];?>" />
					</div>
				</div>
			</div>
		</div>
		<div class="form-group" style="margin:0px; margin-bottom:20px;">
			<input type="submit" name="submit" value="保存参数设置" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>

	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>