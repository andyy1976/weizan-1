<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<?php  load()->func('tpl')?>
<div class="panel panel-default">
	<div class="panel-heading">别踩白块儿游戏介绍</div>
    <div class="panel-body">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">标题</label>
			<div class="col-xs-12 col-sm-9">
				<input type="text" value="<?php  echo $reply['title'];?>" class="form-control" name="title">
				<div class="help-block">用户发送关键词返回的图文主题。</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">封面</label>
			<div class="col-xs-12 col-sm-9">
				<?php  echo tpl_form_field_image('cover', $reply['cover'])?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
			<div class="col-xs-12 col-sm-9">
				<textarea style="height:150px;" name="description" class="form-control" cols="60"><?php  echo $reply['description'];?></textarea>
				<div class="help-block">用于图文显示的简介</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">主题说明</label>
			<div class="col-xs-12 col-sm-9">
				<input type="text" value="<?php  echo $reply['title1'];?>" class="form-control" name="title1">
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">游戏说明</label>
			<div class="col-xs-12 col-sm-9">
				<textarea style="height:150px;" name="description1" class="form-control" cols="60"><?php  echo $reply['description1'];?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">前景图</label>
			<div class="col-xs-12 col-sm-9">
				<?php  echo tpl_form_field_image('fimg', $reply['fimg']);?>
				<span class="help-block" style="clear:both">建议图片大小不超过300K(148*148),以免影响展示效果</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">后景图</label>
			<div class="col-xs-12 col-sm-9">
				<?php  echo tpl_form_field_image('bimg', $reply['bimg']);?>
				<span class="help-block" style="clear:both">建议图片大小不超过300K(148*148),以免影响展示效果</span>
			</div>
		</div>
    </div>
</div>
 

<script type="text/javascript">
    function message(msg){
        require(['util'],function(util){util.message(msg)});
    }
    $('form').submit(function() {
        if ($.trim($(':text[name="title1"]').val()) == '') {
            message('必须填写主题说明.', '', 'error');
            return false;
        }
        if ($.trim($('textarea[name="description1"]').val()) == '') {
            message('必须填写游戏说明.', '', 'error');
            return false;
        }
        if ($.trim($(':text[name="fimg"]').val()) == '') {
            message('请上传前景图.', '', 'error');
            return false;
        }
        if ($.trim($(':text[name="bimg"]').val()) == '') {
            message('请上传后景图.', '', 'error');
            return false;
        }
        return true;
    });
    
</script>
