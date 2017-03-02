<?php defined('IN_IA') or exit('Access Denied');?>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">表单名称</label>
                    <div class="col-xs-12 col-sm-9">
                         <input type="text" class="form-control" placeholder="" name="activity" value="<?php  echo $activity['title'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">图文消息简介</label>
                    <div class="col-xs-12 col-sm-9">
                         <textarea style="height:200px;" class="form-control" id="description" name="description" cols="70"><?php  echo $activity['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">表单说明</label>
                    <div class="col-xs-12 col-sm-9">
						<?php  if(IMS_VERSION==0.7) { ?>
						<?php  echo tpl_ueditor('content', $activity['content']);?>
						<?php  } else { ?>
                        <textarea  id="content" type="text" class="form-control richtext-clone" placeholder="" name="content"><?php  echo $activity['content'];?></textarea>
						<?php  } ?>
	        			<span class="help-block">此表单的说明信息. 例如: 请提交你的表单内容. 我们会尽快联系你</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提交提示信息</label>
                    <div class="col-xs-12 col-sm-9">
                            <textarea type="text" class="form-control"  placeholder="" name="information"><?php  echo $activity['information'];?></textarea>
                            <span class="help-block">表单提交成功以后提示的信息. 例如: 您的表单我们已经收到, 请等待客服确认. </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">表单封面</label>
                    <div class="col-xs-12 col-sm-9">
                         <?php  echo tpl_form_field_image('thumb',$activity['thumb']);?>
	      				<span class="help-block">用一张图片来更好的表现你的表单主题</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">每人可提交次数</label>
                    <div class="col-xs-12 col-sm-9">
                    	<input type="text" class="form-control" name="pretotal" value="<?php  if(!empty($activity['pretotal'])) { ?><?php  echo $activity['pretotal'];?><?php  } else { ?>100<?php  } ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">启用状态</label>
                    <div class="col-xs-12 col-sm-9">
                        <label class="radio-inline"><input type="radio" name="status" value="1" <?php  if($activity['status'] == 1 || empty($activity['status'])) { ?> checked="checked"<?php  } ?> /> 开始</label>
	         			<label class="radio-inline"><input type="radio" name="status" value="0" <?php  if(!empty($reid) && $activity['status'] == 0) { ?> checked="checked"<?php  } ?> /> 停止</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">开始时间</label>
                    <div class="col-xs-12 col-sm-9">
                  		<?php  echo tpl_form_field_date('starttime', $activity['starttime'], true)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">结束时间</label>
                    <div class="col-xs-12 col-sm-9">
                 		<?php  echo tpl_form_field_date('endtime', $activity['endtime'], true)?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">微站首页展示</label>
                    <div class="col-xs-12 col-sm-9">
                		<label class="radio-inline"><input type="radio" name="inhome" value="1" <?php  if($activity['inhome'] == 1) { ?> checked="checked"<?php  } ?> /> 显示</label>
		 				<label class="radio-inline"><input type="radio" name="inhome" value="0" <?php  if(empty($activity) || $activity['inhome'] == 0) { ?> checked="checked"<?php  } ?> /> 不显示</label>
                    </div>
                </div>