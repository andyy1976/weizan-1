<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<input type="hidden" name="reply_id" value="<?php  echo $reply['id'];?>" />
<?php  if($reply['id']) { ?>
<div class="panel panel-default">
    <div class="panel-heading">
        活动数据
    </div>
    <div class="panel-body">
        <div class="row-fluid">
            <div class="span8 control-group">
                <a class="btn btn-default" href="<?php  echo $this->createWebUrl('fanslist',array('op'=>'display', 'rid' => $rid));?>">参与用户</a>
            </div>
        </div>
    </div>
</div>
<?php  } ?>
<div class="panel panel-default">
<div class="panel-heading">
    活动设置
</div>
<div class="panel-body">
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动名称</label>
        <div class="col-sm-9 col-xs-12">
            <input type="text" id="title" class="form-control" placeholder="" name="title" value="<?php  echo $reply['title'];?>">
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 图文图片</label>
        <div class="col-sm-9 col-xs-12">
            <?php  echo tpl_form_field_image('start_picurl',$reply['start_picurl']);?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动说明</label>
        <div class="col-sm-9 col-xs-12">
            <textarea style="height:60px;" id='description' name="description" class="form-control" cols="60"><?php  echo $reply['description'];?></textarea>
            <span class="help-block">用于户图文显示</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动时间</label>
        <div class="col-sm-9 col-xs-12">
            <?php  echo tpl_form_field_daterange('datelimit', array('starttime'=>date('Y-m-d H:i',$reply['starttime']),'endtime'=>date('Y-m-d H:i',$reply['endtime'])), true)?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 版权信息</label>
        <div class="col-sm-9 col-xs-12">
            <input type="text" class="form-control" name="copyright" value="<?php  echo $reply['copyright'];?>" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 版权链接</label>
        <div class="col-sm-9 col-xs-12">
            <input type="text" class="form-control" name="copyrighturl" value="<?php  echo $reply['copyrighturl'];?>" />
        </div>
    </div>
</div>
    <div class="panel-heading">
        结束设置
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动结束标题</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="end_theme" class="form-control" placeholder="" name="end_theme" value="<?php  echo $reply['end_theme'];?>">
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动结束图片</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('end_picurl',$reply['end_picurl']);?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动结束说明</label>
            <div class="col-sm-9 col-xs-12">
                <textarea style="height:60px;" id='end_instruction' name="end_instruction" class="form-control" cols="60"><?php  echo $reply['end_instruction'];?></textarea>
            </div>
        </div>
    </div>
    <div class="panel-heading">
        活动详细设置
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">首页封面</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('cover', $reply['cover']);?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动规则</label>
            <div class="col-sm-9 col-xs-12">
                <textarea style="height:200px; width:100%;" id='rule' class="form-control richtext" name="rule" cols="70"><?php  echo $reply['rule'];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 奖品介绍</label>
            <div class="col-sm-9 col-xs-12">
                <textarea style="height:200px; width:100%;" id='award' class="form-control richtext" name="award" cols="70"><?php  echo $reply['award'];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 游戏时间</label>
            <div class="col-sm-9 col-xs-12">
                <div class="input-group">
                    <input type="text" class="form-control" name="gametime" value="<?php  echo $reply['gametime'];?>" />
                    <span class="input-group-addon">秒</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 游戏难度</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" class="form-control" name="gamelevel" value="<?php  echo $reply['gamelevel'];?>" placeholder="请输入1～5的数字"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">排名模式</label>
            <div class="col-sm-9">
                <label for="mode1" class="radio-inline"><input type="radio" name="mode" value="0" id="mode1" <?php  if($reply['mode'] == 0) { ?>checked="true"<?php  } ?> /> 单次距离</label>
                &nbsp;&nbsp;&nbsp;
                <label for="mode2" class="radio-inline"><input type="radio" name="mode" value="1" id="mode2"  <?php  if($reply['mode'] == 1) { ?>checked="true"<?php  } ?> /> 累积距离</label>
                <span class="help-block"></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">显示排名数量</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" class="form-control" name="showusernum" value="<?php  echo $reply['showusernum'];?>"/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 每人最多游戏次数</label>
            <div class="col-sm-9 col-xs-12">
                <div class="input-group">
                    <input type="text" class="form-control" name="number_times" value="<?php  echo $reply['number_times'];?>" />
                    <span class="input-group-addon">次</span>
                </div>
                <div class="help-block">0 为不限制</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 每人每天游戏次数</label>
            <div class="col-sm-9 col-xs-12">
                <div class="input-group">
                    <input type="text" class="form-control" name="most_num_times" value="<?php  echo $reply['most_num_times'];?>" />
                    <span class="input-group-addon">次</span>
                </div>
                <div class="help-block">0 为不限制</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 每人每天分享次数</label>
            <div class="col-sm-9 col-xs-12">
                <div class="input-group">
                    <span class="input-group-addon">每天可分享</span>
                    <input type="text" class="form-control" name="daysharenum" value="<?php  echo $reply['daysharenum'];?>" />
                    <span class="input-group-addon" style="border-left:0px;border-right:0px;">次,每次增加游戏次数</span>
                    <input type="text" class="form-control" name="sharelotterynum" value="<?php  echo $reply['sharelotterynum'];?>" />
                    <span class="input-group-addon">次</span>
                </div>
                <div class="help-block">分享次数设置0为不奖励游戏次数</div>
            </div>
        </div>
    </div>
    <div class="panel-heading">
        分享设置
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 分享标题</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="share_title" class="form-control" placeholder="" name="share_title" value="<?php  echo $reply['share_title'];?>">
                <div class="help-block">分享的文字，用户显示分享给用户的介绍!</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 分享图片</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('share_image',$reply['share_image']);?>
                <div class="help-block">建议尺寸640*640</div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 分享描述</label>
            <div class="col-sm-9 col-xs-12">
                <textarea style="height:60px;" name="share_desc" class="form-control" cols="60"><?php  echo $reply['share_desc'];?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 分享出去链接</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="share_url" class="form-control" placeholder="" name="share_url" value="<?php  echo $reply['share_url'];?>">
                <div class="help-block">用户分享的链接，不填为当前活动地址! 推荐用微信平台的素材库，转成短地址。<a target="_blank" href="http://www.dwz.cn/">短网址转换</a></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 引导关注链接</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="follow_url" class="form-control" placeholder="" name="follow_url" value="<?php  echo $reply['follow_url'];?>">
                <div class="help-block">引导关注链接! 推荐用微信平台的素材库，转成短地址。<a target="_blank" href="http://www.dwz.cn/">短网址转换</a></div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否需要关注</label>
            <div class="col-sm-9">
                <label for="isneedfollow1" class="radio-inline"><input type="radio" name="isneedfollow" value="0" id="isneedfollow1" <?php  if($reply['isneedfollow'] == 0) { ?>checked="true"<?php  } ?> /> 不</label>
                &nbsp;&nbsp;&nbsp;
                <label for="isneedfollow2" class="radio-inline"><input type="radio" name="isneedfollow" value="1" id="isneedfollow2"  <?php  if($reply['isneedfollow'] == 1) { ?>checked="true"<?php  } ?> /> 是</label>
                <span class="help-block"></span>
            </div>
        </div>
    </div>
</div>
 <script>
 $('form').submit(function(){
 
   if($("#title").isEmpty()){
		Tip.focus("title","请输入活动名称!","right");
		return false;
   }
//   if($("#upload-image-url-start_picurl").isEmpty()){
//		Tip.focus("upload-image-url-start_picurl","请上传活动图片!","right");
//		return false;
//   }
    if($("#description").isEmpty()){
		Tip.focus("description","请输入活动简介!","right");
		return false;
   }
//    if($("#ticket_information").isEmpty()){
//		Tip.focus("ticket_information","请输入兑奖信息!","right");
//		return false;
//   }
//   if($("#repeat_lottery_reply").isEmpty()){
//		Tip.focus("repeat_lottery_reply","请输入重复抽奖信息!","right");
//		return false;
//   }
    if($("#end_theme").isEmpty()){
		Tip.focus("end_theme","请输入活动结束标题!","right");
		return false;
   }
//   if($("#upload-image-url-end_picurl").isEmpty()){
//		Tip.focus("upload-image-url-end_picurl","请上传活动结束图片!","right");
//		return false;
//   }
    if($("#end_instruction").isEmpty()){
		Tip.focus("end_instruction","请输入活动结束说明!","right");
		return false;
   }
   return true;
});
 function moreItem() {
	 var more = $("#more_item").val();
	 if(more=="0" || more==""){
	    $("#c_four").show();
	    $("#c_five").show();
	    $("#c_six").show();
	 }
	 else{
	    $("#c_four").hide();
	    $("#c_five").hide();
	    $("#c_six").hide();
	 }
	 $("#more_item").val(more=='1'?'0':'1');
}
function doDeleteItemImage(obj,id) {
		var filename = $('input#' + id+"-value").val();
		$('.' + id +"_preview").html("");
		$(obj).html("正在删除...").attr("disabled",true);
 		   ajaxopen('./index.php?act=attachment&do=delete&filename=' + filename, function(){
		   $(obj).html("<i class='icon-upload-alt'></i> 删除").hide().removeAttr("disabled");
		});
	}
require(['jquery', 'util'], function($, u){

     $(function(){
         u.editor($('.richtext')[0]);
         u.editor($('.richtext')[1]);
     });

});
 </script>
 