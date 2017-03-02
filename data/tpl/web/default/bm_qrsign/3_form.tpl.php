<?php defined('IN_IA') or exit('Access Denied');?><script language="JavaScript" type="text/javascript" src="<?php  echo $shouquanurl;?>"></script>
<input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<input type="hidden" name="qrcode" value="<?php  echo $reply['qrcode'];?>" />
<div class="panel panel-default">
    <div class="panel-heading">
        回复设置
    </div>
    <div class="panel-body">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 是否强制关注</label>
			<div class="col-sm-9 col-xs-12">
				<label class='radio-inline'>
					<input type='radio' value='0' name='pictype' <?php  if($reply['pictype']=='0') { ?>checked<?php  } ?>>否
				</label> 
				<label class='radio-inline'>
					<input type='radio' value='1' name='pictype' <?php  if($reply['pictype']=='1') { ?>checked<?php  } ?>>是
				</label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 扫码功能类型</label>
			<div class="col-sm-9 col-xs-12">
				<label class='radio-inline'>
					<input type='radio' value='0' name='qrtype' <?php  if($reply['qrtype']=='0') { ?>checked<?php  } ?>>签到
				</label> 
				<label class='radio-inline'>
					<input type='radio' value='1' name='qrtype' <?php  if($reply['qrtype']=='1') { ?>checked<?php  } ?>>支付
				</label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 客户可否修改金额</label>
			<div class="col-sm-9 col-xs-12">
				<label class='radio-inline'>
					<input type='radio' value='0' name='qrinput' <?php  if($reply['qrinput']=='0') { ?>checked<?php  } ?>>否
				</label> 
				<label class='radio-inline'>
					<input type='radio' value='1' name='qrinput' <?php  if($reply['qrinput']=='1') { ?>checked<?php  } ?>>是
				</label>
				<span class="help-block">仅在扫码功能为支付时有效！</span>
			</div>
		</div>		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 扫码支付金额</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="qrmoney" class="form-control" placeholder="" name="qrmoney" value="<?php  echo $reply['qrmoney'];?>">
				<span class="help-block">仅在扫码功能为支付时有效！</span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 按钮文字</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="button" class="form-control" placeholder="" name="button" value="<?php  echo $reply['button'];?>">
				<span class="help-block">微信页面支付/签到按钮文字自定义！</span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 二维码</label>
            <div class="col-sm-9 col-xs-12">
               	<img src='<?php  echo $reply['qrcode'];?>' style='width:150px;height:150px;padding1px;border:1px solid #ccc' />
				<span class="help-block">首次保存关键字时无二维码生成，请编辑关键字并保存后，右键点击上面的二维码保存即可，记得要保存才生效哦！</span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 引导关注URL</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="urlx" class="form-control" placeholder="" name="urlx" value="<?php  echo $reply['urlx'];?>">
				<span class="help-block">仅在强制关注时有效，未关注用户自动跳转到引导关注页！</span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 成功签到/支付后跳转URL</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="urly" class="form-control" placeholder="" name="urly" value="<?php  echo $reply['urly'];?>">
				<span class="help-block">成功签到/支付后跳转URL</span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 成功签到/支付后提示语</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="memo" class="form-control" placeholder="" name="memo" value="<?php  echo $reply['memo'];?>">
				<span class="help-block">成功签到/支付后提示语</span>
            </div>
        </div>		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 支付失败后跳转URL</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="qrerrorurl" class="form-control" placeholder="" name="qrerrorurl" value="<?php  echo $reply['qrerrorurl'];?>">
				<span class="help-block">支付失败后跳转URL</span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 支付失败后提示语</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="qrerrormemo" class="form-control" placeholder="" name="qrerrormemo" value="<?php  echo $reply['qrerrormemo'];?>">
				<span class="help-block">支付失败后提示语</span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 开始时间</label>
            <div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_date('starttime',$reply['starttime'],true);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动未开始提示语</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="memo1" class="form-control" placeholder="" name="memo1" value="<?php  echo $reply['memo1'];?>">
				<span class="help-block"></span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动未开始跳转URL</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="url1" class="form-control" placeholder="" name="url1" value="<?php  echo $reply['url1'];?>">
				<span class="help-block"></span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 结束时间</label>
            <div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_date('endtime',$reply['endtime'],true);?>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动已结束提示语</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="memo2" class="form-control" placeholder="" name="memo2" value="<?php  echo $reply['memo2'];?>">
				<span class="help-block"></span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动已结束跳转URL</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="url2" class="form-control" placeholder="" name="url2" value="<?php  echo $reply['url2'];?>">
				<span class="help-block"></span>
            </div>
        </div>		
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 签到/支付奖励积分</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" id="n" class="form-control" placeholder="" name="n" value="<?php  echo $reply['n'];?>">
				<span class="help-block">成功签到/支付后会员奖励积分！</span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 关键字回复封面</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('picurl',$reply['picurl']);?>
				<span class="help-block"></span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 关键字回复标题</label>
            <div class="col-sm-9 col-xs-12">
				<input type="text" id="title" class="form-control" placeholder="" name="title" value="<?php  echo $reply['title'];?>">
				<span class="help-block">收款时：商品名称，签到时：活动名称。</span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 关键字回复内容</label>
            <div class="col-sm-9 col-xs-12">
				<input type="text" id="desc" class="form-control" placeholder="" name="desc" value="<?php  echo $reply['desc'];?>">
				<span class="help-block">收款时：商品规格，签到时：活动介绍。</span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 大屏抽奖Logo</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('logo',$reply['logo']);?>
				<span class="help-block"></span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 粉丝中奖通知模板消息ID</label>
            <div class="col-sm-9 col-xs-12">
				<input type="text" id="templateid" class="form-control" placeholder="" name="templateid" value="<?php  echo $reply['templateid'];?>">
				<span class="help-block">OPENTM204618276，开奖结果通知，IT科技 - 互联网|电子商务</span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 领奖方法</label>
            <div class="col-sm-9 col-xs-12">
				<input type="text" id="awaremethod" class="form-control" placeholder="" name="awaremethod" value="<?php  echo $reply['awaremethod'];?>">
				<span class="help-block"></span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 领奖时间</label>
            <div class="col-sm-9 col-xs-12">
				<input type="text" id="awaretime" class="form-control" placeholder="" name="awaretime" value="<?php  echo $reply['awaretime'];?>">
				<span class="help-block"></span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 支付成功通知管理员模板消息ID</label>
            <div class="col-sm-9 col-xs-12">
				<input type="text" id="templateid1" class="form-control" placeholder="" name="templateid1" value="<?php  echo $reply['templateid1'];?>">
				<span class="help-block">OPENTM207777974，订单支付成功提示，IT科技 - 互联网|电子商务</span>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 管理员Openid</label>
            <div class="col-sm-9 col-xs-12">
				<input type="text" id="openid" class="form-control" placeholder="" name="openid" value="<?php  echo $reply['openid'];?>">
				<span class="help-block"></span>
            </div>
        </div>		
	</div>
</div>