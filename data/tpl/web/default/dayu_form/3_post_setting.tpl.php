<?php defined('IN_IA') or exit('Access Denied');?>
        <div class="panel panel-default">
            <div class="panel-heading">邮件通知设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提醒接收邮箱</label>
                    <div class="col-xs-12 col-sm-5">
                        <input type="text" name="noticeemail" class="form-control" value="<?php  echo $activity['noticeemail'];?>" />
                    </div>
					<div class="col-xs-12 col-sm-4"><a href="./index.php?c=profile&a=notify&">邮件参数设置</a></div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">通知消息设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">微信端管理员</label>
                    <div class="col-xs-12 col-sm-8">
                    	<input type="text" class="form-control" value="表单列表 - 客服管理 中设置" disabled />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">通知消息接口</label>
                    <div class="col-xs-12 col-sm-9">
		 				<label class="radio-inline"><input type="radio" name="custom_status" value="0" <?php  if(empty($activity) || $activity['custom_status'] == 0) { ?> checked="checked"<?php  } ?> onclick="$('#turntable').show();" /> 使用模板消息(服务号)</label>
                		<label class="radio-inline"><input type="radio" name="custom_status" value="1" <?php  if($activity['custom_status'] == 1) { ?> checked="checked"<?php  } ?> onclick="$('#turntable').hide();" /> 使用客服消息(订阅号)</label>
                    </div>
                </div>
		<div id="turntable"<?php  if($activity['custom_status'] == 0) { ?> style="display:block"<?php  } else { ?> style="display:none"<?php  } ?>>
                <div class="form-group" style="background-color:#eee;">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">客服模板消息ID</label>
                    <div class="col-xs-12 col-sm-8 input-group">
                    	<input type="text" name="k_templateid" class="form-control" value="<?php  echo $activity['k_templateid'];?>" /><span class="input-group-addon">参考模板消息：万能表单客服通知（IT，互联网）</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-8 input-group">
                    <span class="input-group-addon">标题(如：有新的客户提交表单，请及时确认)：</span><input type="text" name="kfirst" class="form-control" value="<?php  echo $activity['kfirst'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword1.DATA}}：</span><input type="text" class="form-control" value="客户姓名" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword2.DATA}}：</span><input type="text" class="form-control" value="客户手机" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword3.DATA}}：</span><input type="text" class="form-control" value="提交时间" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword4.DATA}}：</span><input type="text" class="form-control" value="表单所有项目" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-8 input-group">
                    <span class="input-group-addon">尾注(如：点击处理客户提交的表单。)：</span><input type="text" name="kfoot" class="form-control" value="<?php  echo $activity['kfoot'];?>" />
                    </div>
                </div>
                <div class="form-group" style="background-color:#eee;">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户模板消息ID</label>
                    <div class="col-xs-12 col-sm-8 input-group">
                    	<input type="text" name="m_templateid" class="form-control" value="<?php  echo $activity['m_templateid'];?>" /><span class="input-group-addon">参考模板消息：万能表单用户通知（IT，互联网）</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-8 input-group">
                    <span class="input-group-addon">标题(如：受理结果通知)：</span><input type="text" name="mfirst" class="form-control" value="<?php  echo $activity['mfirst'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword1.DATA}}：</span><input type="text" class="form-control" value="客户姓名" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword2.DATA}}：</span><input type="text" class="form-control" value="客户手机" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword3.DATA}}：</span><input type="text" class="form-control" value="客服受理时间" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-6 input-group">
                    <span class="input-group-addon">{{keyword4.DATA}}：</span><input type="text" class="form-control" value="客服受理状态及回复" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-xs-12 col-sm-8 input-group">
                    <span class="input-group-addon">尾注(如：如有疑问，请致电联系我们。)：</span><input type="text" name="mfoot" class="form-control" value="<?php  echo $activity['mfoot'];?>" />
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">短信通知设置 (短信通知包含表单填写的所有项目,内容较多可能分拆成数条短信,请慎用)</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提醒接收手机</label>
                    <div class="col-xs-12 col-sm-9">
                        <input type="text" name="mobile" class="form-control" value="<?php  echo $activity['mobile'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信accountsid</label>
                    <div class="col-xs-12 col-sm-9">
                        <input type="text" name="accountsid" class="form-control" value="<?php  echo $activity['accountsid'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信token</label>
                    <div class="col-xs-12 col-sm-9">
                        <input type="text" name="tokenid" class="form-control" value="<?php  echo $activity['tokenid'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信appId</label>
                    <div class="col-xs-12 col-sm-9">
                        <input type="text" name="appId" class="form-control" value="<?php  echo $activity['appId'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信模板ID</label>
                    <div class="col-xs-12 col-sm-9">
                        <input type="text" name="templateId" class="form-control" value="<?php  echo $activity['templateId'];?>" />
	        			<span class="help-block">无充值套餐,可任意金额</span>
                    </div>
                </div>
            </div>
        </div>