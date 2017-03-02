<?php defined('IN_IA') or exit('Access Denied');?><style>
    .red {
        color: red;
    }
</style>
<input type="hidden" name="sid" value="<?php  echo $reply['id'];?>"/>
<!--基本设置-->
<div class="panel panel-default">
    <div class="panel-heading">
        基本设置
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动名称：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="title" class="form-control span7"
                       placeholder="" name="title" value="<?php  echo $reply['title'];?>">
            </div>
        </div>



        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>活动时间：</label>

            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_daterange('hd_time', $hd_time, true);?>
            </div>
        </div>




        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>活动未开始提示文字：</label>

            <div class="col-sm-9 col-xs-12">
                <textarea style="height: 60px;" name="unstarttip" class="form-control span7" cols="60"><?php  if($reply['unstarttip']) { ?><?php  echo $reply['unstarttip'];?><?php  } else { ?>活动未开始<?php  } ?></textarea>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>关注引导图文介绍链接：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="follow_url" class="form-control span7"
                       placeholder="" name="follow_url" value="<?php  echo $reply['follow_url'];?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>关注按钮文字：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="follow_btn_name" class="form-control span7" placeholder="" name="follow_btn_name"
                       value="<?php  if($reply['follow_btn_name']) { ?><?php  echo $reply['follow_btn_name'];?><?php  } else { ?>关注<?php  } ?>">
                <div class="help-block"></div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>关注接提示文字：</label>

            <div class="col-sm-9 col-xs-12">
                <textarea style="height: 60px;" name="follow_dlg_tip" class="form-control span7" cols="60"><?php  if($reply['follow_dlg_tip']) { ?><?php  echo $reply['follow_dlg_tip'];?><?php  } else { ?>关注公众号后才能摇一摇哦！<?php  } ?></textarea>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>自定义分享链接(http://)：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="share_url" class="form-control span7"
                       placeholder="" name="share_url" value="<?php  echo $reply['share_url'];?>">

                <div class="help-block">此处可填写可不填写。。。如果不不填写，分享出去的链接将是活动的链接，如果填写则是该处填写的链接</div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>每个用户每天摇一摇次数限制：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="shake_day_limit" class="form-control span7" placeholder="" name="shake_day_limit"
                       value="<?php  if($reply['shake_day_limit']) { ?><?php  echo $reply['shake_day_limit'];?><?php  } else { ?>1<?php  } ?>">
                <div class="help-block"></div>
            </div>
        </div>



        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>每个用户摇一摇总次数限制：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="total_limit" class="form-control span7" placeholder="" name="total_limit"
                       value="<?php  if($reply['total_limit']) { ?><?php  echo $reply['total_limit'];?><?php  } else { ?>1<?php  } ?>">
                <div class="help-block"></div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>每个用户中奖次数限制：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="prize_limit" class="form-control span7" placeholder="" name="prize_limit"
                       value="<?php  if($reply['prize_limit']) { ?><?php  echo $reply['prize_limit'];?><?php  } else { ?>1<?php  } ?>">
                <div class="help-block"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>滚动显示中奖条数</label>

            <div class="col-sm-9 col-xs-12">
                <input type="number" id="randking_count" class="form-control span7"
                       placeholder="" name="randking_count" value="<?php  echo $reply['randking_count'];?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>兑奖密码：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="password" id="dpassword" class="form-control span7" placeholder="" name="dpassword"
                       value="<?php  echo $reply['dpassword'];?>">
                <div class="help-block"></div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">中奖通知模板消息ID：</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" name="tmpId" class="form-control" value="<?php  echo $reply['tmpId'];?>" />
                <div class="help-block">
                    模板库类型请选择： IT科技/互联网|电子商务 类型模板。
                    标题为 《中奖结果通知》 模板消息，具体模板详细内容如下图。</div>
            </div>

        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">中奖通知模板消息详细内容如下：</label>
            <div class="col-sm-9 col-xs-12">
                <img src="<?php echo MON_QMSHAKE_RES;?>images/res.jpg">
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>中奖通知模板消息开关：</label>

            <div class="col-sm-9 col-xs-12">

                <input type="radio" name="tmpenable" value="0" <?php  if($reply['tmpenable'] == 0) { ?>checked="checked"<?php  } ?>>关闭
                &nbsp; <input type="radio" name="tmpenable" value="1" <?php  if($reply['tmpenable'] == 1) { ?>checked="checked"<?php  } ?>/>开启

            </div>
        </div>



        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>用户提交自定义字段名称：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="udefine" class="form-control span7" placeholder="" name="udefine"
                       value="<?php  echo $reply['udefine'];?>">
                <div class="help-block">中奖用户会弹出框收集此字段信息，不填则默认显示收集 姓名、手机号。填则显示此字段名称。例如:邮箱</div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>中奖手机用户下面提示文字：</label>

            <div class="col-sm-9 col-xs-12">
                <textarea style="height: 60px;" name="lj_tip" class="form-control span7" cols="60"><?php  if($reply['lj_tip']) { ?><?php  echo $reply['lj_tip'];?><?php  } else { ?>中奖务必准确填入您的信息，以便领奖哦！<?php  } ?></textarea>
            </div>
        </div>



        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>底部广告开启关闭：</label>

            <div class="col-sm-9 col-xs-12">

                <input type="radio" name="top_banner_show" value="0" <?php  if($reply['top_banner_show'] == 0) { ?>checked="checked"<?php  } ?>>关闭  &nbsp; <input type="radio" name="top_banner_show" value="1" <?php  if($reply['top_banner_show'] == 1) { ?>checked="checked"<?php  } ?>/>开启

            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>底部标题：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="top_banner_title" class="form-control span7" placeholder="" name="top_banner_title"
                       value="<?php  echo $reply['top_banner_title'];?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>底部广告：</label>

            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('top_banner',$reply['top_banner']);?>
                建议宽*高(440*302)
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>底部banner链接URL(http://)：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="top_banner_url" class="form-control span7"
                       placeholder="" name="top_banner_url" value="<?php  echo $reply['top_banner_url'];?>">
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>版权</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="copyright" class="form-control span7"
                       placeholder="" name="copyright" value="<?php  echo $reply['copyright'];?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>欢迎页图片:</label>

            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('index_bg',$reply['index_bg'],MonUtil::defaultImg(MonUtil::$IMG_INDEX_BG));?>
                建议宽*高(1040*1814)
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>标题图片:</label>

            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('title_bg',$reply['title_bg'],MonUtil::defaultImg(MonUtil::$IMG_TITLE_BG));?>
                建议宽*高(541*189)
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>主题背景:</label>

            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('shake_bg',$reply['shake_bg'],MonUtil::defaultImg(MonUtil::$IMG_SHAKE_BG));?>
                建议宽*高(751*889)
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享引导:</label>

            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('share_bg',$reply['share_bg'],MonUtil::defaultImg(MonUtil::$IMG_SHARE_BG));?>
                建议宽*高(330*228)
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>规则说明:</label>

            <div class="col-sm-9 col-xs-12">
                  <textarea style="height: 60px;" id="rule" name="rule"
                            class="form-control span7" cols="60"><?php  echo $reply['rule'];?></textarea>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享奖励设置：</label>


            <div class="col-sm-9" style="margin-top:5px;">

                <div class="checkbox  col-sm-1">

                    <label>
                        <input type="checkbox" id="share_enable" name="share_enable" <?php  if($reply['share_enable']==1) { ?>checked="checked"<?php  } ?> value="<?php  echo $reply['share_enable'];?>" >启用
                    </label>
                </div>

                <div class="input-group col-sm-4" style="float:left">
                    <span class="input-group-addon">每天奖励分享</span>
                    <input type="text" class="form-control span1" name="share_times" value="<?php  echo $reply['share_times'];?>">
                    <span class="input-group-addon">次</span>

                </div>
                <div class="input-group col-sm-4" style="float:left">
                    <span class="input-group-addon">每次分享奖励抽奖就会</span>
                    <input type="text" class="form-control span1" name="share_award_count" value="<?php  echo $reply['share_award_count'];?>">
                    <span class="input-group-addon">次</span>
                </div>

            </div>


        </div>


    </div>

</div>






<!--奖品设置--->
<div class="panel panel-default">
    <div class="panel-heading">
        奖品设置
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label class="col-xs-12 col-sm-0 col-md-2 control-label"></label>

            <div class="col-sm-12 col-xs-12">
                <span class="label label-danger" id="p_text">未中奖概率:100%</span>
                <span class="label label-danger" >手机端显示：奖品数量=奖品总数量+虚拟数量</span>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th width="50px">排序</th>
                        <th width="80px">奖品名称</th>
                        <th width="100px">类型<font color="red">(奖品是积分或余额时需要填写积分或余额)</font></th>
                        <th width="80px">积分(余额)</th>
                        <th width="80px">奖品说明</th>
                        <th width="70px">总数量</th>
                        <th width="70px">虚拟数量</th>
                        <th width="70px">剩余数量</th>
                        <th width="80px">商家</th>
                        <th width="70px">物品链接url(http://)</th>
                        <th width="60px">奖品价值</th>
                        <th width="80px">中奖概率</th>
                        <th width="50px">奖品图片(大小100*50)</th>
                        <th width="170px">操作</th>
                    </tr>
                    </thead>

                    <tbody class="prize-items">


                    <?php  if(is_array($prizes)) { foreach($prizes as $pr) { ?>
                    <tr>
                        <td><input type="text" class="form-control" name="display_orders[]" value="<?php  echo $pr['display_order'];?>"/></td>
                        <td><input type="text" class="form-control" name="pnames[]" value="<?php  echo $pr['pname'];?>"/></td>
                        <td>
                            <select name="ptypes[]" class="form-control">
                                <option value="0" <?php  if($pr['ptype']==0) { ?>selected ='selected'<?php  } ?> >实物</option>
                                <option value="1" <?php  if($pr['ptype']==1) { ?>selected ='selected'<?php  } ?> >积分</option>
                                <option value="2" <?php  if($pr['ptype']==2) { ?>selected ='selected'<?php  } ?> >余额</option>
                            </select>
                        </td>

                        <td><input type="text" class="form-control" name="jfyes[]" value="<?php  echo $pr['jfye'];?>"/></td>
                        <td><input type="text" class="form-control" name="p_summarys[]" value="<?php  echo $pr['p_summary'];?>"/></td>
                        <td><input type="text" class="form-control" name="pcounts[]" value="<?php  echo $pr['pcount'];?>"/></td>
                        <td><input type="text" class="form-control" name="virtual_counts[]" value="<?php  echo $pr['virtual_count'];?>"/></td>
                        <td><input type="text" class="form-control" name="werwer[]" value="<?php  echo $pr['pcount'] - $pr['ycount']?>" disabled/></td>
                        <td><input type="text" class="form-control" name="tgss[]" value="<?php  echo $pr['tgs'];?>"/></td>
                        <td><input type="text" class="form-control" name="tgs_urls[]" value="<?php  echo $pr['tgs_url'];?>"/></td>
                        <td><input type="text" class="form-control" name="prices[]" value="<?php  echo $pr['price'];?>"/></td>
                        <td><input type="text" class="form-control" name="pbs[]" value="<?php  echo $pr['pb'];?>" onkeyup="pChange();"/></td>
                        <td>
                            <div id="img_div">
                                <img src="<?php  if($pr['pimg']) { ?><?php  echo $_W['attachurl'];?><?php  echo $pr['pimg'];?><?php  } ?>"
                                     style="max-width: 80px; max-height: 80px;">
                                <input name="pimgs[]" type="hidden" value="<?php  echo $pr['pimg'];?>" />
                            </div>
                        </td>

                        <td><input name="pids[]" type="hidden" value="<?php  echo $pr['id'];?>"/><span onclick="upimg(this)"
                                                                                          class="btn btn-primary"><i
                                class="fa fa-plus"></i>上传图片</span>&nbsp;<a href="javascript:;" onclick="removePrize(this)"><i class="glyphicon glyphicon-remove"></i> 删除</a></td>

                    </tr>

                    <?php  } } ?>


                    </tbody>

                </table>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>

            <div class="col-sm-9 col-xs-12">
                <a href="javascript:void(0);" onclick="addPrize();"><i class="gglyphicon glyphicon-plus" title="添加奖品"></i>添加奖品</a>
            </div>
        </div>



        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>积分余额奖品自动兑换：</label>

            <div class="col-sm-9 col-xs-12">

                <input type="radio" name="jfye_auto_dh" value="0" <?php  if($reply['jfye_auto_dh'] == 0) { ?>checked="checked"<?php  } ?>>关闭  &nbsp; <input type="radio" name="jfye_auto_dh" value="1" <?php  if($reply['jfye_auto_dh'] == 1) { ?>checked="checked"<?php  } ?>/>开启

            </div>
        </div>

    </div>

</div>


<!--图文样式设置-->
<div class="panel panel-default">
    <div class="panel-heading">
        图文设置
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文标题：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="new_title" class="form-control span7" placeholder="" name="new_title"
                       value="<?php  echo $reply['new_title'];?>">

            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文 图标：</label>

            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('new_icon',$reply['new_icon']);?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文描述：</label>

            <div class="col-sm-9 col-xs-12">
			<textarea style="height: 60px;" name="new_content"
                      class="form-control span7" cols="60"><?php  echo $reply['new_content'];?></textarea>
            </div>
        </div>


    </div>
</div>

<!--分享设置-->
<div class="panel panel-default">
    <div class="panel-heading">
        分享设置
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享标题：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="share_title" class="form-control span7" placeholder="" name="share_title"
                       value="<?php  echo $reply['share_title'];?>">
                <div class="help-block"></div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享图标：</label>

            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('share_icon',$reply['share_icon']);?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享描述：</label>

            <div class="col-sm-9 col-xs-12">
			<textarea style="height: 60px;" name="share_content"
                      class="form-control span7" cols="60"><?php  echo $reply['share_content'];?></textarea>
                <div class="help-block"></div>
            </div>
        </div>


    </div>
</div>
<script>

    $(function(){

        $("#share_enable").click(function(){



            if($(this).get(0).checked){

                $(this).val(1);
            }else{
                $(this).val(0);
            }


        });
        pChange();

    });


    require(['jquery', 'util'], function ($, u) {
        $(function () {
            u.editor($('#rule')[0]);
        });
    });

/**
 * 添加奖品
 */
function addPrize() {


    var index = $(".prize-items tr").length + 1;
    var html = "<tr>";
    html += '<td><input type="text" class="form-control" name="display_orders[]"  value="' + index + '"/></td>';
    html += '<td><input type="text" class="form-control" name="pnames[]"  value=""/></td>';
    html += '<td><select name="ptypes[]" class="form-control"><option value="0" >实物</option><option value="1" >积分</option><option value="2" >余额</option></select></td>';
    html += '<td><input type="text" class="form-control" name="jfyes[]" value="0"/></td>';
    html += '<td><input type="text" class="form-control" name="p_summarys[]"  value=""/></td>';
    html += '<td><input type="text" class="form-control" name="pcounts[]"  value="1"/></td>';
    html += '<td><input type="text" class="form-control" name="virtual_counts[]" value="0"/></td>';
    html += '<td><input type="text" class="form-control" name="virtual_counts[]" value="0" disabled/></td>';
    html += '<td><input type="text" class="form-control" name="tgss[]"  value=""/></td>';
    html += '<td><input type="text" class="form-control" name="tgs_urls[]"  value=""/></td>';
    html += '<td><input type="text" class="form-control" name="prices[]"  value=""/></td>';
    html += '<td><input type="text" class="form-control" name="pbs[]"  value="0" onkeyup="pChange();" /></td>';
    html += '<td><div id="img_div"></div></td>';

    html += '<td> <input  name="pids[]" type="hidden" value="" /><span onclick="upimg(this)" class="btn btn-primary"><i class="fa fa-plus"></i>上传图片</span>&nbsp;<a href="javascript:;" onclick="removePrize(this)" ><i class="glyphicon glyphicon-remove"></i> 删除</a></td>';

    html += "</tr>";

    $(".prize-items").append(html);

}

    function pChange(){
        var totalP=0;
        $(".prize-items tr input[name='pbs[]']").each(function () {
            var vp=$(this).val();
            if(!isNaN(vp)){
                totalP+=parseInt(vp);
            }

        });
        $("#p_text").html("未中奖概率:"+(10000-totalP)+"%");
    }

    function upimg(obj) {

        require(['jquery', 'util'], function ($, util) {

            util.image('', function (data) {
                $(obj).parent().parent().find('#img_div').html('<img src="' + data['url'] + '" style="max-width: 80px; max-height: 80px;"><input name="pimgs[]" type="hidden" value="' + data['filename'] + '" />');

            });

        });


    }

    function removePrize(obj) {


        var pid= $(obj).parent().parent().find("input[name='pids[]']").val();

        if(pid!=""){

            $.post("<?php  echo $this->createWebUrl('DeletePrize')?>",{"pid":pid},function(res){


                if(res.code==200){
                    $(obj).parent().parent().remove();
                    pChange();

                }else{

                    alert("该奖品有用户中奖记录不能删除！请删除该奖品的用户中奖记录后再删除此奖品！");
                }


            },'json');
        }else{

            $(obj).parent().parent().remove();
            pChange();
        }
    }

</script>

