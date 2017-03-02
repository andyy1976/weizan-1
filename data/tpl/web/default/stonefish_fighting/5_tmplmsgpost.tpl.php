<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li<?php  if($_GPC['do'] == 'manage') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>"> 管理一站到底活动</a></li>
		<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_fighting'));?>"><i class="fa fa-plus"></i> 添加一站到底活动</a></li>
		<li<?php  if($_GPC['do'] == 'template') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('template');?>"> 管理活动模板</a></li>
        <li<?php  if($_GPC['do'] == 'templatepost') { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/templatepost',array('m'=>'stonefish_fighting'));?>"><i class="fa fa-plus"></i> 添加活动模板</a></li>
		<li<?php  if($_GPC['do'] == 'tmplmsg') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('tmplmsg');?>"> 管理消息模板</a></li>
        <li<?php  if($_GPC['do'] == 'tmplmsgpost' || $_GPC['do'] == '') { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/tmplmsgpost',array('m'=>'stonefish_fighting'));?>"><i class="fa fa-plus"></i> 添加消息模板</a></li>
		<li<?php  if($_GPC['do'] == 'questions') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('questions');?>"> 管理题库</a></li>
        <li<?php  if($_GPC['do'] == 'questionspost') { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/questionspost',array('m'=>'stonefish_fighting'));?>"><i class="fa fa-plus"></i> 添加题库问题</a></li>
	</ul>
	<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
	<input type="hidden" name="uniacid" value="<?php  echo $item['uniacid'];?>">
    <div class="panel panel-default">
	    <div class="panel-heading">消息模板配置</div>
	        <div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:red">消息模板名称</label>
					<div class="col-sm-9">
						<input type="text" name="template_name" value="<?php  if(!empty($item['template_name'])) { ?><?php  echo $item['template_name'];?><?php  } ?>" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">消息模板ID</label>
					<div class="col-sm-9">
						<input type="text" name="template_id" value="<?php  if(!empty($item['template_id'])) { ?><?php  echo $item['template_id'];?><?php  } ?>" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">提醒名称文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('topcolor', $item['topcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">可用变量</label>
					<div class="col-sm-9">
						<div class="help-block"><span style='color:red'>#活动名称# ：</span>本次活动的活动名称</div>
						<div class="help-block"><span style='color:red'>#参与人数# ：</span>所有参与活动的真实人数 + 虚拟人数</div>
						<div class="help-block"><span style='color:red'>#活动时间# ：</span>一次活动设置的活动时间2015年05月01日至2015年05月31日</div>						
						<div class="help-block"><span style='color:red'>#粉丝昵称# ：</span>获取奖品的粉丝昵称</div>
						<div class="help-block"><span style='color:red'>#真实姓名# ：</span>获取奖品的粉丝输入的真实姓名，活动配置时需要选择输入项：姓名</div>
						<div class="help-block"><span style='color:red'>#现在时间# ：</span>触发消息模板的北京时间</div>
						<div class="help-block"><span style='color:red'>#今日排名# ：</span>今日排名位置</div>
						<div class="help-block"><span style='color:red'>#总排名# ：</span>总排名位置</div>
					</div> 
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒标题</label>
					<div class="col-sm-9">
					    <input type="text" name="first" value="<?php  if(!empty($item['first'])) { ?><?php  echo $item['first'];?><?php  } ?>" class="form-control">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">提醒标题文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('firstcolor', $item['firstcolor'])?>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">提醒关健词说明</label>
					<div class="col-sm-9">
						<div class="help-block"><span style='color:red'>根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可</span></div>
						<div class="help-block">提醒关健词请输入需要提醒的变量或自定义内容</div>
						<div class="help-block">代码为微信平台消息模板的{{keyword1.DATA}}除去.DATA的变量代码</div>
						<div class="help-block">文字色为显示此变量转换成功的文字色</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒关键字1</label>
					<div class="col-sm-9">
					    <input type="text" name="keyword1" value="<?php  if(!empty($item['keyword1'])) { ?><?php  echo $item['keyword1'];?><?php  } ?>" class="form-control" placeholder="根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字1代码</label>
                    <div class="col-sm-3">
                        <input type="text" name="keyword1code" value="<?php  if(!empty($item['keyword1code'])) { ?><?php  echo $item['keyword1code'];?><?php  } else { ?>keyword1<?php  } ?>" class="form-control">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字1文字色</label>
                    <div class="col-sm-5">
                        <?php  echo tpl_form_field_color('keyword1color', $item['keyword1color'])?>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒关键字2</label>
					<div class="col-sm-9">
					    <input type="text" name="keyword2" value="<?php  if(!empty($item['keyword2'])) { ?><?php  echo $item['keyword2'];?><?php  } ?>" class="form-control" placeholder="根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字2代码</label>
                    <div class="col-sm-3">
                        <input type="text" name="keyword2code" value="<?php  if(!empty($item['keyword2code'])) { ?><?php  echo $item['keyword2code'];?><?php  } else { ?>keyword2<?php  } ?>" class="form-control">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字2文字色</label>
                    <div class="col-sm-5">
                        <?php  echo tpl_form_field_color('keyword2color', $item['keyword2color'])?>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒关键字3</label>
					<div class="col-sm-9">
					    <input type="text" name="keyword3" value="<?php  if(!empty($item['keyword3'])) { ?><?php  echo $item['keyword3'];?><?php  } ?>" class="form-control" placeholder="根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字3代码</label>
                    <div class="col-sm-3">
                        <input type="text" name="keyword3code" value="<?php  if(!empty($item['keyword3code'])) { ?><?php  echo $item['keyword3code'];?><?php  } ?>" class="form-control">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字3文字色</label>
                    <div class="col-sm-5">
                        <?php  echo tpl_form_field_color('keyword3color', $item['keyword3color'])?>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒关键字4</label>
					<div class="col-sm-9">
					    <input type="text" name="keyword4" value="<?php  if(!empty($item['keyword4'])) { ?><?php  echo $item['keyword4'];?><?php  } ?>" class="form-control" placeholder="根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字4代码</label>
                    <div class="col-sm-3">
                        <input type="text" name="keyword4code" value="<?php  if(!empty($item['keyword4code'])) { ?><?php  echo $item['keyword4code'];?><?php  } ?>" class="form-control">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字4文字色</label>
                    <div class="col-sm-5">
                        <?php  echo tpl_form_field_color('keyword4color', $item['keyword4color'])?>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒关键字5</label>
					<div class="col-sm-9">
					    <input type="text" name="keyword5" value="<?php  if(!empty($item['keyword5'])) { ?><?php  echo $item['keyword5'];?><?php  } ?>" class="form-control" placeholder="根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字5代码</label>
                    <div class="col-sm-3">
                        <input type="text" name="keyword5code" value="<?php  if(!empty($item['keyword5code'])) { ?><?php  echo $item['keyword5code'];?><?php  } ?>" class="form-control">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字5文字色</label>
                    <div class="col-sm-5">
                        <?php  echo tpl_form_field_color('keyword5color', $item['keyword5color'])?>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒关键字6</label>
					<div class="col-sm-9">
					    <input type="text" name="keyword6" value="<?php  if(!empty($item['keyword6'])) { ?><?php  echo $item['keyword6'];?><?php  } ?>" class="form-control" placeholder="根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字6代码</label>
                    <div class="col-sm-3">
                        <input type="text" name="keyword6code" value="<?php  if(!empty($item['keyword6code'])) { ?><?php  echo $item['keyword6code'];?><?php  } ?>" class="form-control">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字6文字色</label>
                    <div class="col-sm-5">
                        <?php  echo tpl_form_field_color('keyword6color', $item['keyword6color'])?>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒关键字7</label>
					<div class="col-sm-9">
					    <input type="text" name="keyword7" value="<?php  if(!empty($item['keyword7'])) { ?><?php  echo $item['keyword7'];?><?php  } ?>" class="form-control" placeholder="根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字7代码</label>
                    <div class="col-sm-3">
                        <input type="text" name="keyword7code" value="<?php  if(!empty($item['keyword7code'])) { ?><?php  echo $item['keyword7code'];?><?php  } ?>" class="form-control">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字7文字色</label>
                    <div class="col-sm-5">
                        <?php  echo tpl_form_field_color('keyword7color', $item['keyword7color'])?>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒关键字8</label>
					<div class="col-sm-9">
					    <input type="text" name="keyword8" value="<?php  if(!empty($item['keyword8'])) { ?><?php  echo $item['keyword8'];?><?php  } ?>" class="form-control" placeholder="根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字8代码</label>
                    <div class="col-sm-3">
                        <input type="text" name="keyword8code" value="<?php  if(!empty($item['keyword8code'])) { ?><?php  echo $item['keyword8code'];?><?php  } ?>" class="form-control">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字8文字色</label>
                    <div class="col-sm-5">
                        <?php  echo tpl_form_field_color('keyword8color', $item['keyword8color'])?>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒关键字9</label>
					<div class="col-sm-9">
					    <input type="text" name="keyword9" value="<?php  if(!empty($item['keyword9'])) { ?><?php  echo $item['keyword9'];?><?php  } ?>" class="form-control" placeholder="根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字9代码</label>
                    <div class="col-sm-3">
                        <input type="text" name="keyword9code" value="<?php  if(!empty($item['keyword9code'])) { ?><?php  echo $item['keyword9code'];?><?php  } ?>" class="form-control">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字9文字色</label>
                    <div class="col-sm-5">
                        <?php  echo tpl_form_field_color('keyword9color', $item['keyword9color'])?>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒关键字10</label>
					<div class="col-sm-9">
					    <input type="text" name="keyword10" value="<?php  if(!empty($item['keyword10'])) { ?><?php  echo $item['keyword10'];?><?php  } ?>" class="form-control" placeholder="根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字10代码</label>
                    <div class="col-sm-3">
                        <input type="text" name="keyword10code" value="<?php  if(!empty($item['keyword10code'])) { ?><?php  echo $item['keyword10code'];?><?php  } ?>" class="form-control">
                    </div>
					<label class="col-xs-12 col-sm-2 col-md-2 control-label">提醒关键字10文字色</label>
                    <div class="col-sm-5">
                        <?php  echo tpl_form_field_color('keyword10color', $item['keyword10color'])?>
                    </div>
                </div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">提醒关健词说明</label>
					<div class="col-sm-9">
						<div class="help-block"><span style='color:red'>根据消息模板所使用的变量代码进行输入，有几个输入几个，其他留空即可</span></div>
						<div class="help-block">提醒关健词请输入需要提醒的变量或自定义内容</div>
						<div class="help-block">代码为微信平台消息模板的{{keyword1.DATA}}除去.DATA的变量代码</div>
						<div class="help-block">文字色为显示此变量转换成功的文字色</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label" >提醒备注</label>
					<div class="col-sm-9">
					    <input type="text" name="remark" value="<?php  if(!empty($item['remark'])) { ?><?php  echo $item['remark'];?><?php  } ?>" class="form-control">			
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">提醒备注文字色</label>
					<div class="col-sm-9">
						<?php  echo tpl_form_field_color('remarkcolor', $item['remarkcolor'])?>
					</div>
				</div>
	        </div>			
        </div>
		<div class="form-group">
		    <div class="col-sm-12">
			    <button type="submit" class="btn btn-primary col-lg-3" name="submit" value="保存消息模板配置">保存消息模板配置</button>
			    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		    </div>
	    </div>
    </div>
	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>