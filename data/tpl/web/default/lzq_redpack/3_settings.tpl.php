<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<form action="" method="post" class="form-horizontal form" id="setting-form">
		<div class="panel panel-default">
			<div class="panel-heading">红包设置</div>
			<div class="panel-body">
			
				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">基础红包金额(单位:分)</label>
					<div class="col-sm-8">
						<input type="text" name="data[money]" class="form-control" value="<?php  echo $settings['money'];?>" placeholder="红包最小发放金额"/>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">加成红包金额(单位:分)</label>
					<div class="col-sm-8">
						<input type="text" name="data[money_extra]" class="form-control" value="<?php  echo $settings['money_extra'];?>" placeholder="无加成红包则设为0，设置后红包总金额=基础红包金额+(0,加成红包金额]"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">APPID</label>
					<div class="col-sm-8">
						<input type="text" name="data[appid]" class="form-control" value="<?php  echo $settings['appid'];?>" placeholder="微信公众平台appid"/>
					</div>
				</div>
	<!--
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">APPSECRECT</label>
					<div class="col-sm-8">
						<input type="text" name="data[appsecrect]" class="form-control" value="<?php  echo $settings['appsecrect'];?>" placeholder="微信公众平台appsecrect"/>
					</div>
				</div>
	-->
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">MCHID</label>
					<div class="col-sm-8">
						<input type="password" name="data[mchid]" class="form-control" value="<?php  echo $settings['mchid'];?>" placeholder="商户号"/>
					</div>
				</div>
	
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">PARTNERKEY</label>
					<div class="col-sm-8">
						<input type="password" name="data[partner]" class="form-control" value="<?php  echo $settings['partner'];?>" placeholder="支付key" />
					</div>
				</div>
				

				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">apiclient_cert</label>
					<div class="col-sm-8">
						<textarea name="data[apiclient_cert]" class="form-control"  placeholder="导出证书部分的内容，全选apiclient_cert.pem文件内容复制到此处" ><?php  echo $settings['apiclient_cert'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">apiclient_key</label>
					<div class="col-sm-8">
						<textarea name="data[apiclient_key]" class="form-control"  placeholder="导出证书秘钥的内容，全选apiclient_key.pem文件内容复制到此处" ><?php  echo $settings['apiclient_key'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">rootca</label>
					<div class="col-sm-8">
						<textarea name="data[rootca]" class="form-control" placeholder="证明微信支付身份的服务器证书，全选rootca.pem文件内容复制到此处" ><?php  echo $settings['rootca'];?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">活动名称</label>
					<div class="col-sm-8">
						<input type="text" name="data[act_name]" class="form-control" value="<?php  echo $settings['act_name'];?>" />
					</div>
				</div>

				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">祝福语</label>
					<div class="col-sm-8">
						<input type="text" name="data[wishing]" class="form-control" value="<?php  echo $settings['wishing'];?>" />
					</div>
				</div>
			
				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">备注信息</label>
					<div class="col-sm-8">
						<input type="text" name="data[remark]" class="form-control" value="<?php  echo $settings['remark'];?>" />
					</div>
				</div>
	
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">提供方名称</label>
					<div class="col-sm-8">
						<input type="text" name="data[nick_name]" class="form-control" value="<?php  echo $settings['nick_name'];?>" />
					</div>
				</div>


				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">红包发送方名称</label>
					<div class="col-sm-8">
						<input type="text" name="data[send_name]" class="form-control" value="<?php  echo $settings['send_name'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">活动开始时间</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_date('data[starttime]', $settings['starttime'], true);?>
						<!--
						<select name="data[touch]" class="form-control"  >
							<option value="y"  <?php  if($settings['touch']== 'y') { ?>selected<?php  } ?>>是</option>
							<option value="n"  <?php  if($settings['touch']== 'n') { ?>selected<?php  } ?>>否</option>
						</select>
						-->
						<span class="help-block bg-danger">如果不想触发活动，请将开始时间设置为当前时间之前</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">活动结束时间</label>
					<div class="col-sm-8">
						<?php  echo tpl_form_field_date('data[endtime]', $settings['endtime'], true);?>
						<!--
						<select name="data[touch]" class="form-control"  >
							<option value="y"  <?php  if($settings['touch']== 'y') { ?>selected<?php  } ?>>是</option>
							<option value="n"  <?php  if($settings['touch']== 'n') { ?>selected<?php  } ?>>否</option>
						</select>
						-->
						<span class="help-block bg-danger">如果不想触发活动，请将结束时间设置为当前时间之前</span>
					</div>
				</div>

				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">触发关键字</label>
					<div class="col-sm-8">
						<input type="text" name="data[touchkey]" class="form-control" value="<?php  echo $settings['touchkey'];?>" placeholder="回复此关键字领取红包"/>
					</div>
				</div>
			
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">随机数下界</label>
					<div class="col-sm-8">
						<input type="number" name="data[randmin]" class="form-control" value="<?php  echo $settings['randmin'];?>" placeholder="随机数最小值"/>
					</div>
				</div>
				
				
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">随机数上界</label>
					<div class="col-sm-8">
						<input type="number" name="data[randmax]" class="form-control" value="<?php  echo $settings['randmax'];?>" placeholder="随机数最大值"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">红包发放数字(上下界之间,英文逗号分隔)</label>
					<div class="col-sm-8">
						<input type="text" name="data[sendnum]" class="form-control" value="<?php  echo $settings['sendnum'];?>" placeholder="位于随机数最小值和最大值之间，当产生的随机数与此处填的一个值相符即发放红包"/>
					</div>
				</div>
				<!--
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 col-lg-2 control-label">清空红包模块相关数据</label>
					<div class="col-sm-8">
						<input type="checkbox" name="data[clear]" />
						<span class="help-block">谨慎操作，会清空本模块红包表所有数据</span>
					</div>
				</div>
				-->
				<div class="form-group">
					<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 col-sm-offset-3 col-md-offset-2 col-lg-offset-2">
						<input name="submit" type="submit" value="提交" class="btn btn-primary" />
						<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
 
<script>
require(['jquery', 'util'], function($, util){
	$(function(){
		$('#setting-form').submit(function(){
			var result = true;
			if($('input[name="data[money]"]').val() == ''){
				result = false;
				util.message('未填写基础红包金额.');
			}

			if($('input[name="data[money_extra]"]').val() == ''){
				result = false;
				util.message('未填写加成红包金额.');
			}

			if($('input[name="data[appid]"]').val() == ''){
				result = false;
				util.message('未填写APPID.');
			}
			
			if($('input[name="data[appsecrect]"]').val() == ''){
				result = false;
				util.message('未填写APPSECRECT.');
			}
			
			if($('input[name="data[mchid]"]').val() == ''){
				result = false;
				util.message('未填写MCHID.');
			}
			
			if($('input[name="data[partner]"]').val() == ''){
				result = false;
				util.message('未填写PARTNERKEY.');
			}
			
			if($('input[name="data[act_name]"]').val() == ''){
				result = false;
				util.message('未填写活动名称.');
			}
			
			if($('input[name="data[wishing]"]').val() == ''){
				result = false;
				util.message('未填写祝福语.');
			}
			
			if($('input[name="data[remark]"]').val() == ''){
				result = false;
				util.message('未填写备注信息.');
			}
			
			if($('input[name="data[nick_name]"]').val() == ''){
				result = false;
				util.message('未填写提供方名称.');
			}
			
			if($('input[name="data[send_name]"]').val() == ''){
				result = false;
				util.message('未填写红包发送方名称.');
			}
			
			if($('input[name="data[touch]"]').val() == ''){
				result = false;
				util.message('未选择关注时是否触发.');
			}
			//if($('input[name="data[touchkey]"]').val() == ''){
			//	result = false;
			//	util.message('未填写触发关键字.');
			//}
			if($('input[name="data[endtime]"]').val() == ''){
				result = false;
				util.message('结束时间不能为空.');
			}
			if($('input[name="data[starttime]"]').val() == ''){
				result = false;
				util.message('开始时间不能为空.');
			}
			if($('input[name="data[randmin]"]').val() == ''){
				result = false;
				util.message('未填写随机数下界.');
			}
			if($('input[name="data[randmax]"]').val() == ''){
				result = false;
				util.message('未填写随机数上界.');
			}
			
			if($('input[name="data[sendnum]"]').val() == ''){
				result = false;
				util.message('未填写红包发放数字.');
			}
			if(isNaN($('input[name="data[money]"]').val())){
				result=false;
				util.message("基础红包金额必须为数字！");
			}
			
			if(isNaN($('input[name="data[money_extra]"]').val())){
				result=false;
				util.message("加成红包金额必须为数字！");
			}

			var min=parseInt($('input[name="data[randmin]"]').val());
			var max=parseInt($('input[name="data[randmax]"]').val());
			
			var sendnum=$('input[name="data[sendnum]"]').val();
			var sendArr=sendnum.split(",");
			for(var i=0;i<sendArr.length;i++){
				var temp=parseInt(sendArr[i]);
				if(isNaN(temp)){
					result=false;
					util.message("输入必须为数字，且以英文逗号分隔！");
					break;
				}
				if(temp<min||temp>max){
					result=false;
					util.message("红包发放数字必须在上下界之间，且随机数下界必须小于上界！");
					break;
				}
			}		
			return result;
		});
	});
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
