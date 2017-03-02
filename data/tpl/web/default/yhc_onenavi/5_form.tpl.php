<?php defined('IN_IA') or exit('Access Denied');?><?php  load()->func('tpl')?>
<input type="hidden" name="reply_id" value="<?php  echo $item['id'];?>" />
<div class="panel panel-default">
    <div class="panel-heading">
        一键导航回复设置
    </div>
    <div class="panel-body">
        <?php  if(!empty($url)) { ?>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">直接URL</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" value="<?php  echo $url;?>"  class="form-control" disabled />
            </div>
        </div>
        <?php  } ?>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">坐标名称</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="title" name="title" value="<?php  echo $item['title'];?>"  class="form-control" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">坐标信息</label>
            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_coordinate('baidumap',array('lng'=>$item['lng'],'lat'=>$item['lat']))?>
            </div>
        </div>
    </div>
</div> 
 

