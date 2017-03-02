<?php defined('IN_IA') or exit('Access Denied');?><?php  if(empty($item)) { ?>
    <?php  $namesuffix = '-new[(wrapitemid)]';?>
    <?php  $itemid = '(itemid)';?>
<?php  } else { ?>
    <?php  $namesuffix = '['.$item['id'].']';?>
    <?php  $itemid = 'egg-item-' . $item['id'];?>
<?php  } ?>

<div class="panel panel-default">
    <div class="panel-body">
    	<div class="form-group">
        	<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否实物</label>
            <div class="col-sm-9 col-xs-12">
            	<span class="pull-right">
                    <?php  if(empty($item)) { ?>
                    <a href="javascript:;" onclick="doDeleteItem('<?php  echo $itemid;?>')">删除</a>
                    <?php  } else { ?>
                    <a href="<?php  echo $this->createWebUrl('delete', array('name' => 'egg', 'id' => $item['id']))?>" onclick="doDeleteItem('<?php  echo $itemid;?>', this.href)">删除</a>
                    <?php  } ?>
                </span>
				<label for="radio_1_<?php  echo $itemid;?>" class="radio-inline">
                	<input type="radio" name="award-inkind<?php  echo $namesuffix;?>" id="radio_1_<?php  echo $itemid;?>" value="1" <?php  if($item['inkind'] == 1) { ?> checked="checked"<?php  } ?><?php  if(!empty($item)) { ?> disabled=true<?php  } ?> />是
				</label>
				<label for="radio_0_<?php  echo $itemid;?>" class="radio-inline"><input type="radio" name="award-inkind<?php  echo $namesuffix;?>" id="radio_0_<?php  echo $itemid;?>" value="0" <?php  if($item['inkind'] == 0) { ?> checked="checked"<?php  } ?><?php  if(!empty($item)) { ?> disabled=true<?php  } ?> /> 否</label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品名称</label>
            <div class="col-sm-9 col-xs-12">
            	<input type="text" value="<?php  echo $item['title'];?>" style="width:275px;" name="award-title<?php  echo $namesuffix;?>" class='form-control'>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <div class="input-group col-md-6">
                	<div class='input-group-addon'>中奖率</div>
                    <input type="text" value="<?php  echo $item['probalilty'];?>" name="award-probalilty<?php  echo $namesuffix;?>" class='form-control'>
                    <div class='input-group-addon'>%</div>
                    <div class='input-group-addon'>数量</div>
                    <input type="text" value="<?php  echo $item['total'];?>"  name="award-total<?php  echo $namesuffix;?>" class='form-control'>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">奖品描述</label>
            <div class="col-sm-9 col-xs-12">
				<textarea style="height:80px;" name="award-description<?php  echo $namesuffix;?>" class="form-control" cols="70" id=""><?php  echo $item['description'];?></textarea>
            </div>
        </div>
        <?php  if($item['inkind'] == 0) { ?>
        <div class="form-group">
        	<label class="col-xs-12 col-sm-3 col-md-2 control-label">兑 换 码</label>
            <div class="col-sm-9 col-xs-12">
				<textarea style="height:80px;" class="form-control" cols="70" id="" name="award-activation-code<?php  echo $namesuffix;?>"><?php  echo $item['activation_code'];?></textarea>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">激活地址</label>
            <div class="col-sm-9 col-xs-12">
				<input type="text" id="" class="form-control" value="<?php  echo $item['activation_url'];?>" name="award-activation-url<?php  echo $namesuffix;?>">
            </div>
        </div>
        <?php  } ?>
    </div>
</div>
