<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('actset', array('op' => 'display'))?>">活动管理</a></li>
    <li <?php  if($operation == 'post'&& empty($id)) { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('actset', array('op' => 'post'))?>">新增活动</a></li>
    <?php  if($operation == 'post'&& !empty($id)) { ?><li class="active"><a href="<?php  echo $this->createWebUrl('actset', array('op' => 'post','id' => $id))?>">编辑活动</a></li><?php  } ?>
    
</ul>
<?php  if($operation == 'display') { ?>
<div class="main">
	<div class="panel panel-default" style="padding-top:15px">
    	<table class="table table-hover">
        	<thead class="navbar-inner">
                <tr>
                    <th style="width:50px;text-align:center;">ID</th>
                    <th style="width:160px;text-align:center;">活动名称</th>
                    <th style="width:112px;text-align:center;">拼图图片</th>
                    <th style="text-align:center;">活动时间</th>
                    <th>活动状态</th>
                    <th>活动链接</th>
                    <th style="text-align:center; width:280px;">操作</th>
                </tr>
            </thead>
            <tbody>
           		 	<?php  if(is_array($list)) { foreach($list as $item) { ?>
						<tr>
							<td style="width:50px;text-align:center;"><?php  echo $item['id'];?></td>
							<td style="width:160px;text-align:center;"><?php  echo $item['act_name'];?></td>
                            <td style="width:112px;text-align:center;"><?php  if(strpos($arr['puzzleimage'],'://')) { ?><img width="80" height="80" src="<?php  echo $item['puzzleimage'];?>"/><?php  } else { ?><img width="80" height="80" src="<?php  echo $_W['attachurl'].$item['puzzleimage']?>"/><?php  } ?></td>
                            <td style="text-align:center;"><p class="label label-warning">开始：<?php  echo date('Y-m-d H:i:s',$item['starttime'])?></p><br><p class="label label-warning">结束：<?php  echo date('Y-m-d H:i:s',$item['endtime'])?></p></td>
                            
                            <td>
                            <?php  if(empty($item['status'])) { ?>
                            <span class="label label-danger">活动未开始</span>
                            <?php  } else if($nowtime >= $item['starttime'] && $nowtime <= $item['endtime']) { ?>
                            <span class="label label-success">活动进行中</span>
                            <?php  } else if($nowtime >= $item['endtime']) { ?>
                            <span class="label label-danger">活动已结束</span>
                            <?php  } ?>
                            </td>
                            <td><input class="form-control" type="text" value="<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&c=entry&id=<?php  echo $item['id'];?>&do=puzzle&m=deam_puzzleredpack"></td>
							<td style="text-align:center;"><a href="<?php  echo $this->createWebUrl('actset', array('id' => $item['id'], 'op' => 'post'))?>">编辑</a>&nbsp;&nbsp;<span class="label label-danger">禁止删除</span>&nbsp;&nbsp;<a href="<?php  echo $this->createWebUrl('packetrecord', array('id' => $item['id']))?>">查看数据</a></td>
						</tr>
					<?php  } } ?>
            
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>
</div>
<?php  } else if($operation == 'post') { ?>
<div class="main">
<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" onsubmit="return formcheck();">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>" />
	<div class="panel panel-default">
    	<div class="panel-heading">活动基本参数设置</div>
        <div class="panel-body">
        	<div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="white">*</span>商户名称</label>
                <div class="col-sm-9 col-xs-12">
                    <input class="form-control" type="text" name="send_name" value="<?php  echo $item['send_name'];?>">
                    <div class="help-block">红包发送者名称（必须少于10个汉字，含标点符号）</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="white">*</span>活动名称</label>
                <div class="col-sm-9 col-xs-12">
                    <input class="form-control" type="text" name="act_name" value="<?php  echo $item['act_name'];?>">
                    <div class="help-block">活动名称。如：猜灯谜抢红包活动（必须少于10个汉字，含标点符号）</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="white">*</span>红包祝福语</label>
                <div class="col-sm-9 col-xs-12">
                    <input class="form-control" type="text" name="wishing" value="<?php  echo $item['wishing'];?>">
                    <div class="help-block">红包祝福语，展示在红包页面。如：感谢您参加猜灯谜活动，祝您元宵节快乐（必须少于20个汉字，含标点符号）</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="white">*</span>备注</label>
                <div class="col-sm-9 col-xs-12">
                    <input class="form-control" type="text" name="remark" value="<?php  echo $item['remark'];?>">
                    <div class="help-block">备注信息。如：猜越多得越多，快来抢（必须少于10个汉字，含标点符号）</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="white">*</span>单个红包发放总人数</label>
                <div class="col-sm-2 col-xs-12">
                    <input class="form-control" type="text" name="total_num" value="<?php echo !empty($item['total_num']) ? $item['total_num'] : '1'?>" readonly>
                    <div class="help-block">固定为1</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="white">*</span>单个红包金额</label>
                <div class="col-sm-9 col-xs-12">
                	<div class="input-group" style="width:150px; float:left">
                        <input class="form-control" type="text" name="singel_amountMin" value="<?php echo !empty($item['minprize']) ? $item['minprize'] : '1'?>">
                        <div class="input-group-addon" style=" border-right:0px;border-bottom-right-radius:0px; border-top-right-radius:0px">至</div>
                    </div>
                    <div class="input-group" style="width:150px;">
                        <input class="form-control" style="border-bottom-left-radius:0px; border-top-left-radius:0px" type="text" name="singel_amountMax" value="<?php echo !empty($item['maxprize']) ? $item['maxprize'] : '1'?>">
                        <div class="input-group-addon">元</div>
                    </div>
                    <div class="help-block">每个人领取的红包金额，单位元。范围1-200元。</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="white">*</span>红包总金额</label>
                <div class="col-sm-9 col-xs-12">
                	<div class="input-group" style="width:150px;">
                        <input class="form-control" type="text" name="total_prize" value="<?php  echo $item['total_prize'];?>">
                        <div class="input-group-addon">元</div>
                    </div>
                    <div class="help-block">总共发放金额</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动开关</label>
                <div class="col-sm-6 col-xs-12">
                    <label for="isopen1" class="radio-inline"><input type="radio" name="status" value="1" id="isopen1" <?php  if($item['status'] == 1) { ?> checked="true" <?php  } ?>> 开</label>
                    <label for="isopen2" class="radio-inline"><input type="radio" name="status" value="0" id="isopen2" <?php  if($item['status'] == 0) { ?> checked="true" <?php  } ?>> 关</label>
                    <div class="help-block"><font color="#FF0000"></font></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动时间</label>
                <div class="col-sm-9 col-xs-12">
                    <?php  echo tpl_form_field_daterange('datelimit', array('starttime'=>date('Y-m-d H:i:s',$item['starttime']),'endtime'=>date('Y-m-d H:i:s',$item['endtime'])),true)?>
                </div>
            </div>
            
            
        </div>
	</div>
    
    <div class="panel panel-default">
    	<div class="panel-heading">活动营销设置</div>
        <div class="panel-body">
        	<div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="white">*</span>是否强制关注</label>
                <div class="col-sm-9 col-xs-12">
                    <label for="is_subscribe1" class="radio-inline"><input type="radio" name="is_subscribe" value="1" id="is_subscribe1" <?php  if($item['is_subscribe'] == 1) { ?> checked="true" <?php  } ?>> 是</label>
                    <label for="is_subscribe2" class="radio-inline"><input type="radio" name="is_subscribe" value="0" id="is_subscribe2" <?php  if($item['is_subscribe'] == 0) { ?> checked="true" <?php  } ?>> 否</label>
                    <div class="help-block">设置强制关注后必须关注才能参加活动。认证的服务号效果最佳，其他公众号只能通过触发关键字判断</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">关注二维码</label>
                <div class="col-sm-8 col-xs-12">
                   <?php  echo tpl_form_field_image('qrcodeimage',$item['qrcodeimage']);?>
                   <div class="help-block">二维码为对应的公众号平台的二维码</div>
                </div>
                
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class="red">*</span>是否成功分享后才能领取红包</label>
                <div class="col-sm-9 col-xs-12">
                    <label for="isshare1" class="radio-inline"><input type="radio" name="isshare" value="1" id="isshare1" <?php  if($item['isshare'] == 1) { ?> checked="true" <?php  } ?>> 是</label>
                    <label for="isshare2" class="radio-inline"><input type="radio" name="isshare" value="0" id="isshare2" <?php  if($item['isshare'] == 0) { ?> checked="true" <?php  } ?>> 否</label>
                    <div class="help-block"></div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">页面分享图片</label>
                <div class="col-sm-8 col-xs-12">
                   <?php  echo tpl_form_field_image('share_img',$item['share_img']);?>
                   <div class="help-block">分享到朋友圈的缩略图，不填写默认为拼图的图片</div>
                </div>
                
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">未获得红包前分享标题自定义</label>
                <div class="col-sm-8 col-xs-12">
                   <input type="text" class="form-control" placeholder="" name="noshare_title" value="<?php  echo $item['noshare_title'];?>">
                   <div class="help-block"><font color="#FF0000">需要有js分享权限。</font>&#123;USERNAME&#125;表示用户昵称，如：我是&#123;USERNAME&#125;，我正在参加拼图送红包活动，你也赶快来参加吧！</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">获得红包后分享标题自定义</label>
                <div class="col-sm-8 col-xs-12">
                   <input type="text" class="form-control" placeholder="" name="share_title" value="<?php  echo $item['share_title'];?>">
                   <div class="help-block"><font color="#FF0000">需要有js分享权限。</font>&#123;USERNAME&#125;表示用户昵称，&#123;MONEY&#125;表示获得的红包金额，如：我是&#123;USERNAME&#125;，我参加拼图送红包活动获得了&#123;MONEY&#125;元，你也赶快来参加吧！</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">广告类型</label>
                <div class="col-sm-9 col-xs-12">
                    <label for="ads_type1" class="radio-inline"><input type="radio" name="ads_type" value="0" id="ads_type1" <?php  if($item['ads_type'] == 0) { ?> checked="true" <?php  } ?>> 带链接文字广告</label>
                    <label for="ads_type2" class="radio-inline"><input type="radio" name="ads_type" value="1" id="ads_type2" <?php  if($item['ads_type'] == 1) { ?> checked="true" <?php  } ?>> 带链接按钮广告</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">广告文字颜色</label>
                <div class="col-sm-8 col-xs-12">
                   <?php  echo tpl_form_field_color('ads_color',$item['ads_color']);?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">广告按钮颜色</label>
                <div class="col-sm-8 col-xs-12">
                   <?php  echo tpl_form_field_color('ads_button_color',$item['ads_button_color']);?>
                   <div class="help-block">仅在广告类型选择为“带链接按钮广告”下生效</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">广告文字</label>
                <div class="col-sm-8 col-xs-12">
                   <input type="text" class="form-control" placeholder="" name="ads_text" value="<?php  echo $item['ads_text'];?>">
                   <div class="help-block">展示在提示获得红包的窗口上，字数不建议过多，不填写则不显示</div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">广告链接</label>
                <div class="col-sm-8 col-xs-12">
                   <input type="text" class="form-control" placeholder="" name="ads_link" value="<?php  echo $item['ads_link'];?>">
                   <div class="help-block">请输入完整的广告链接</div>
                </div>
            </div>
        </div>
	</div>
    
    <div class="panel panel-default">
        <div class="panel-heading">活动页面设置</div>
        <div class="panel-body">
        	<div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">页面标题</label>
                <div class="col-sm-8 col-xs-12">
                    <input type="text" class="form-control" placeholder="" name="pagetitle" value="<?php  echo $item['pagetitle'];?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">拼图图片</label>
                <div class="col-sm-8 col-xs-12">
                   <?php  echo tpl_form_field_image('puzzleimg',$item['puzzleimage']);?>
                   <div class="help-block">拼图图片请上传300px*300px的图片效果最佳</div>
                </div>
                
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">拼图难度</label>
                <div class="col-sm-1 col-xs-9">
                   <select class="form-control" name="puzzlelevel" autocomplete="off">
                       <option value="2" <?php  if($item['puzzlelevel'] == '2') { ?>selected="selected"<?php  } ?>>2 x 2</option>
                       <option value="3" <?php  if($item['puzzlelevel'] == '3') { ?>selected="selected"<?php  } ?>>3 x 3</option>
                       <option value="4" <?php  if($item['puzzlelevel'] == '4') { ?>selected="selected"<?php  } ?>>4 x 4</option>
                   </select>
                </div>
            </div>
            <div class="form-group col-sm-12">
                <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
                <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
            </div>
        </div>
    </div>
</form>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>