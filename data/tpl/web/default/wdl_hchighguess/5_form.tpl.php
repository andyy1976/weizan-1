<?php defined('IN_IA') or exit('Access Denied');?><input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<div class="panel panel-default">
    <div class="panel-heading">
        我画你猜游戏设置
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">标题</label>
            <div class="col-sm-9 col-xs-12">
				<input type="text" value="<?php  echo $reply['title'];?>" class="form-control" name="title" />
				<div class="help-block">用户发送关键词返回的图文主题。</div>
            </div>
        </div>
    </div>
	<div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">封面</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('cover', $reply['cover']);?>
            </div>
        </div>
    </div>
	<div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style="height:150px;" name="description" class="form-control"><?php  echo $reply['description'];?></textarea>
				<div class="help-block">用于图文显示的简介</div>
            </div>
        </div>
    </div>
	<div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">关注链接</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" value="<?php  echo $reply['gzurl'];?>" class="form-control" name="gzurl" />
				<span class="help-block">引导关注的链接</span>
            </div>
        </div>
    </div>
	<div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享标题</label>
            <div class="col-sm-9 col-xs-12">
               	<input type="text" value="<?php  echo $reply['sharetitle'];?>" class="form-control" name="sharetitle" />
				<div class="help-block">用于分享的标题。</div>
            </div>
        </div>
    </div>
	<div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享封面</label>
            <div class="col-sm-9 col-xs-12">
               	<?php  echo tpl_form_field_image('sharecover', $reply['sharecover']);?>
				<div class="help-block">用于分享的图片。</div>
            </div>
        </div>
    </div>
	<div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享描述</label>
            <div class="col-sm-9 col-xs-12">
               	<textarea style="height:150px;" name="sharedescription" class="form-control" ><?php  echo $reply['sharedescription'];?></textarea>
				<div class="help-block">用于分享的描述</div>
            </div>
        </div>
    </div>
<!--	<div class="panel-body">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">版本切换</label>
			<div class="col-sm-9 col-xs-12">
				<label class="radio-inline">
					<input type="radio" name="level" value="1" <?php  if($reply['level'] == 1) { ?>checked="true"<?php  } ?>> 高级版
				</label>
				<label class="radio-inline">
					<input type="radio" name="level" value="0" <?php  if($reply['level'] == 0) { ?>checked="true"<?php  } ?>>低级版
				</label>
			</div>
		</div>
	</div>-->
</div>

    