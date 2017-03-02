<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  load()->func('tpl')?>
<style type="text/css">
.form .alert{width:700px;}
</style>
<script type="text/javascript">
	function addFormItem() {
		var html = '' +
				'<tr>' +
					'<td><input name="displayorder[]" type="text" class="form-control" /></td>' +
					'<td><input name="titles[]" type="text" class="form-control" placeholder="请认真填写名称" /></td>' +
					'<td><input type="checkbox" name="essentials[]" value="1" checked/></td>' +
					'<td>' +
						'<select name="type[]" class="form-control">' +
						<?php  if(is_array($types)) { foreach($types as $k => $v) { ?><?php  if(!empty($v)) { ?>'<option <?php  if($k=='radio') { ?>selected<?php  } ?> value="<?php  echo $k;?>"><?php  echo $v;?></option>' + <?php  } ?><?php  } } ?>
						'</select>' +
					'</td>' +
					'<td style="min-width:100px"><a href="javascript:;" onclick="$(this).parent().parent().next().remove();$(this).parent().parent().remove();" class="btn btn-default btn-small" title="删除"><i class="fa fa-times">删除</i></a></td>'+
				'</tr>'+
				'<tr class="moresetting">'+
				'	<td></td>'+
				'	<td colspan="4">'+
				'		<div><textarea  class="form-control" name="descriptions[]" onfocus="" onfocusout="" style="width:820px; height:35px; margin-bottom:10px;" placeholder="请认真填写描述信息"></textarea></div>'+
				'		<div><textarea  class="form-control" name="options[]" onfocus="" onfocusout="" style="width:820px; height:35px;" placeholder="请认真填写扩展项信息，扩展项用回车/换行分开"></textarea><span class="help-block">请把扩展项信息控制在个17个字内 </span></div>'+
				'	</td>'+
				'</tr>';
		$('#form-items').append(html);
		//描述和扩展项
		$(".moresetting").delegate("textarea", "focus", function(){
			$(this).css("height", "90px");
		});
		$(".moresetting").delegate("textarea", "focusout", function() {
			$(this).css("height", "35px");
		});
	}
</script>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('display')?>">调研活动列表</a></li>
	<li<?php  if(!$sid) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('post')?>">新建调研活动</a></li>
	<?php  if($sid) { ?><li class="active"><a href="<?php  echo $this->createWebUrl('post', array('id' => $sid))?>">编辑调研活动</a></li><?php  } ?>
</ul>
<div class="main">
	<form class="form-horizontal form" action="" method="post" enctype="multipart/form-data">
    	<div class="panel panel-default">
        	<div class="panel-heading">
                调研活动信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">调研名称</label>
                    <div class="col-xs-12 col-sm-9">
                         <input type="text" class="form-control" placeholder="" name="title" value="<?php  echo $activity['title'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">简介</label>
                    <div class="col-xs-12 col-sm-9">
                         <textarea style="height:200px;" class="form-control" id="description" name="description" cols="70"><?php  echo $activity['description'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">调研内容</label>
                    <div class="col-xs-12 col-sm-9">
                       	<textarea  id="content" type="text" class="form-control richtext-clone" placeholder="" name="content"><?php  echo $activity['content'];?></textarea>
	        			<span class="help-block">此调研活动的说明信息. 例如: 请提交你的联系方式, 和要咨询的产品信息. 我们会尽快联系你</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提交提示信息</label>
                    <div class="col-xs-12 col-sm-9">
                    	<textarea type="text" class="form-control"  placeholder="" name="information"><?php  echo $activity['information'];?></textarea>
                        <span class="help-block">调研提交成功以后提示的信息. 例如: 您的信息我们已经收到, 很快会有专人联系你. </span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">调研活动封面</label>
                    <div class="col-xs-12 col-sm-9">
                         <?php  echo tpl_form_field_image('thumb',$activity['thumb']);?>
	       				<span class="help-block">用一张图片来更好的表现你的调研主题</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">每人可参与调研次数</label>
                    <div class="col-xs-12 col-sm-9">
                    	<input type="text" class="form-control" name="pertotal" value="<?php  if(!empty($activity['pertotal'])) { ?><?php  echo $activity['pertotal'];?><?php  } else { ?>1<?php  } ?>" />
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
                    <div class="col-xs-12 col-sm-9">
                        <label class="radio-inline"><input type="radio" name="status" value="1" <?php  if($activity['status'] == 1 || empty($activity['status'])) { ?> checked="checked"<?php  } ?> /> 开始</label>
	         			<label class="radio-inline"><input type="radio" name="status" value="0" <?php  if(!empty($activity) && $activity['status'] == 0) { ?> checked="checked"<?php  } ?> /> 停止</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否开启提交建议</label>
                    <div class="col-xs-12 col-sm-9">
                 		<label class="radio-inline"><input type="radio" name="suggest_status" value="1" <?php  if($activity['suggest_status'] == 1 || empty($activity['suggest_status'])) { ?> checked="checked"<?php  } ?> />开启</label>
                        <label class="radio-inline"><input type="radio" name="suggest_status" value="0" <?php  if(!empty($activity) && $activity['suggest_status'] == 0) { ?> checked="checked"<?php  } ?> /> 关闭</label>
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
            </div>
        </div>
		<div class="panel panel-default">
            <div class="panel-heading">
                调研内容管理
            </div>
            <div class="panel-body table-responsive">
            	<table class="table">
					<thead class="navbar-inner">
					<tr>
						<th  class="row-first" style="width:50px;">排序</th>
						<th  class="row-hover" style="width:200px;">名称 <span title="必填项" class="text-error">*</span><i></i></th>
						<th style="width:150px;">必填项<i></i></th>
						<th style="width:100px">类型<i></i></th>
						<th style="width:200px;">操作</th>
					</tr>
					</thead>
					<tbody id="form-items">
					<?php  if($hasData) { ?>
					<?php  if(is_array($ds)) { foreach($ds as $field) { ?>
					<tr >
						<td><input type="text" class="form-control" readonly name="displayorder[<?php  echo $field['sfid'];?>]" value="<?php  echo $field['displayorder'];?>"></td>
						<td><input type="text" class="form-control" readonly  name="titles[<?php  echo $field['sfid'];?>]" value="<?php  echo $field['title'];?>" placeholder="请认真填写名称"></td>
						<td><input type="checkbox" readonly name="essentials[<?php  echo $field['sfid'];?>]" <?php  if($field['essential'] == '1') { ?>checked<?php  } ?> value="1"></td>
						<td>
							<select readonly name="type[<?php  echo $field['sfid'];?>]" class="form-control">
								<?php  if(is_array($types)) { foreach($types as $k => $v) { ?><?php  if(!empty($v)) { ?><option <?php  if($field['type'] == $k) { ?>selected<?php  } ?> value="<?php  echo $k;?>"><?php  echo $v;?></option><?php  } ?><?php  } } ?>
							</select>
						</td>
						<td  style="text-align:left;"><a onclick="$(this).parent().parent().next().remove();$(this).parent().parent().remove();" class="btn btn-small" title="删除"><i class="fa fa-times">删除</i></a></td>
					</tr>
					<tr class="moresetting">
						<td></td>
						<td colspan="4">
							<div><textarea class='form-control' readonly name="descriptions[<?php  echo $field['sfid'];?>]" style="width:820px; height:35px; margin-bottom:10px;" placeholder="请认真填写描述信息"><?php  echo $field['description'];?></textarea></div>
							<div><textarea class='form-control' readonly name="options[<?php  echo $field['sfid'];?>]" style="width:820px; height:35px;" placeholder="请认真填写扩展项信息，每行一个扩展项"><?php  echo $field['value'];?></textarea></div>
						</td>
					</tr>
					<?php  } } ?>
					<?php  } else { ?>
					<?php  if(is_array($ds)) { foreach($ds as $field) { ?>
					<tr >
						<td><input type="text" class="form-control"   name="displayorder[<?php  echo $field['sfid'];?>]" value="<?php  echo $field['displayorder'];?>"></td>
						<td><input type="text" class="form-control"    name="titles[<?php  echo $field['sfid'];?>]" value="<?php  echo $field['title'];?>" placeholder="请认真填写名称"></td>
						<td><input type="checkbox"   name="essentials[<?php  echo $field['sfid'];?>]" <?php  if($field['essential'] == '1') { ?>checked<?php  } ?> value="1"></td>
						<td>
							<select   name="type[<?php  echo $field['sfid'];?>]" class="form-control">
								<?php  if(is_array($types)) { foreach($types as $k => $v) { ?><?php  if(!empty($v)) { ?><option <?php  if($field['type'] == $k) { ?>selected<?php  } ?> value="<?php  echo $k;?>"><?php  echo $v;?></option><?php  } ?><?php  } } ?>
							</select>
						</td>
						<td  style="text-align:left;min-width:500px"><a onclick="$(this).parent().parent().next().remove();$(this).parent().parent().remove();" class="btn btn-small" title="删除"><i class="fa fa-times">删除</i></a></td>
					</tr>
					<tr class="moresetting">
						<td></td>
						<td colspan="4">
							<div><textarea   class='form-control' name="descriptions[<?php  echo $field['sfid'];?>]" style="width:820px; height:35px; margin-bottom:10px;" placeholder="请认真填写描述信息"><?php  echo $field['description'];?></textarea></div>
							<div><textarea   class='form-control' name="options[<?php  echo $field['sfid'];?>]" style="width:820px; height:35px;" placeholder="请认真填写扩展项信息，扩展项用回车/换行分开"><?php  echo $field['value'];?></textarea></div>
						</td>
					</tr>
					<?php  } } ?>
					<?php  } ?>
					</tbody>
					<?php  if(!$hasData) { ?>
					<tr>
						<td colspan="5">
							<a href="javascript:;" onclick="addFormItem()"><i class="fa fa-arrows"></i> 添加新项目</a>
						</td>
					</tr>
					<?php  } ?>
				</table>
            </div>
        </div>
        <div class="form-group col-sm-12">
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
    </form>
</div>
<script text="text/javascript">
    require(['util'],function(util){
       util.editor($('.richtext-clone')[0]); 
    });
    function message(msg){
        require(['util'],function(util){
            util.message(msg);
        })
    }
    $(function(){
	$('form').submit(function(){
      
		if($.trim($(':text[name="title"]').val()) == '') {
			message('必须填写调研活动标题.', '', 'error');
			return false;
		}
		if($.trim($("#description").val())==""){
			message('必须填写调研活动简介.', '', 'error');
			return false;
		}
//		if($.trim($("#content").val())==""){
//			message('必须填写调研活动内容.', '', 'error');
//			return false;
//		}
		if($.trim($('textarea[name="information"]').val()) == '') {
			message('必须填写调研活动成功提示信息.', '', 'error');
			return false;
		}
		//如果是新建调研项目
		<?php  if(empty($sid)) { ?>
			if($.trim($(':text[name="thumb"]').val()) == '') {
				message('必须上传调研活动封面.', '', 'error');
				return false;
			}
		<?php  } ?>
		var num = $(':text[name="pertotal"]').val();
			num = parseInt(num);
			if(isNaN(num)) {
				message('每人可参与调研次数必须为数字.', '', 'error');
				return false;
			}
			<?php  if(!$hasData) { ?>
			if($(':text[name^="titles"]').length == 0) {
				message('必须设定调研活动的调查条目.', '', 'error');
				return false;
			}
			var isError = false;
			$(':text[name^="titles"]').each(function(){
				if($.trim($(this).val()) == '') {
					isError = true;
				}
			});
			if(isError) {
				message('必须要设定每个调查条目的标题.', '', 'error');
				return false;
			}
			var isError = false;
			$('select[name^="type"]').each(function(index){
				var t = $(this).val();
				if(t == 'radio' || t == 'checkbox' || t == 'select') {
					$('textarea[name^="options"]').each(function(index1){
					if(index == index1){
						if($.trim($(this).val()) == '') {
							isError = true;
						}
					}
					});
				}
			});
			if(isError) {
				message('单选, 多选或下拉选择项目必须要设定扩展项.', '', 'error');
				return false;
			}

		<?php  } ?>
		return true;
	});
		$(".moresetting").delegate("textarea", "focus", function(){
			$(this).css("height", "90px");
		});
		$(".moresetting").delegate("textarea", "focusout", function() {
			$(this).css("height", "35px");
		});
                });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
