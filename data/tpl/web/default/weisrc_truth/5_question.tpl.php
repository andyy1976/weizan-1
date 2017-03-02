<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li <?php  if($operation == 'post') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('question', array('op' => 'post'))?>">添加真心话</a></li>
    <li <?php  if($operation == 'display') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('question', array('op' => 'display'))?>">管理真心话</a></li>
</ul>
<?php  if($operation == 'display') { ?>
<style>
    .page-nav {
        margin:0;
        width:100%;
        min-width:800px;
    }

    .page-nav-tabs {
        background:#EEE;
    }

    .page-nav > li > a {
        display: block;
    }

    .page-nav-tabs > li > a{
        padding-right: 12px;
        padding-left: 12px;
        margin-right: 2px;
        line-height: 14px;
    }
    .page-nav-tabs > li > a {
        padding-top: 8px;
        padding-bottom: 8px;
        line-height: 20px;
        border: 1px solid transparent;
        border-bottom-width: 0px;
        -webkit-border-radius: 4px 4px 0 0;
        -moz-border-radius: 4px 4px 0 0;
        border-radius: 4px 4px 0 0;
    }
    .page-nav-tabs > li > a {
        padding: 0;
        margin: 0;
        height: 40px;
        line-height: 40px;
        padding: 0 10px;
        font-size: 14px;
        color: #666;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
    }

    .page-nav-tabs>li {
        line-height: 40px;
        float: left;
        list-style: none;
        display: block;
        text-align: -webkit-match-parent;
    }

    .page-nav-tabs>li>a,.page-nav-tabs>li>a:focus {
        border-radius: 0 !important;
        background-color: #f9f9f9;
        color: #999;
        margin-right: -1px;
        position: relative;
        z-index: 11;
        border-color: #c5d0dc;
        text-decoration: none;
    }

    .page-nav-tabs>li>a:hover
    {
        background-color: #FFF;
    }

    .page-nav-tabs>li.active>a, .page-nav-tabs>li.active>a:hover, .page-nav-tabs>li.active>a:focus {
        color: #576373;
        border-color: #c5d0dc;
        border-top: 2px solid #4c8fbd;
        border-bottom-color: transparent;
        background-color: #FFF;
        z-index: 12;
        margin-top: -1px;
        box-shadow: 0 -2px 3px 0 rgba(0,0,0,0.15);
    }
</style>
<div class="main">
    <div class="panel panel-default">
        <div class="table-responsive panel-body">
        <form action="" method="post" class="form-horizontal form">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width:5%"><input type="checkbox" class="check_all" /></th>
                <th style="width:10%">顺序</th>
                <th style="width:5%">编号</th>
                <th style="width:45%;">题目</th>
                <th style="width:15%;">发布时间</th>
                <th style="width:10%;">状态</th>
                <th style="width:10%;text-align: right;">编辑/删除</th>
            </tr>
            </thead>
            <tbody id="level-list">
            <?php  if(is_array($list)) { foreach($list as $item) { ?>
            <tr>
                <td class="with-checkbox"><input type="checkbox" name="check" value="<?php  echo $item['id'];?>"></td>
                <td><input type="text" class="form-control" name="displayorder[<?php  echo $item['id'];?>]" value="<?php  echo $item['displayorder'];?>" style="width: 60px;"></td>
                <td><?php  echo $item['id'];?></td>
                <td>
                    <?php  echo $item['title'];?>
                </td>
                <td><?php  echo date('Y-m-d H:i', $item['dateline'])?></td>
                <td>
                    <?php  if($item['status']==1) { ?>
                    <span class="label" style="background:#56af45;">显示</span>
                    <?php  } else { ?>
                    <span class="label" style="background:#f00;">隐藏</span>
                    <?php  } ?>
                </td>
                <td style="text-align: right;">
                    <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('question', array('op' => 'post', 'id' => $item['id']))?>" title="编辑"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-default btn-sm" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo $this->createWebUrl('question', array('op' => 'delete', 'id' => $item['id']))?>" title="删除"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            <?php  if(is_array($children[$item['id']])) { foreach($children[$item['id']] as $row) { ?>
            <tr>
                <td class="with-checkbox"><input type="checkbox" name="check" value="<?php  echo $row['id'];?>"></td>
                <td><input type="text" class="form-control" name="displayorder[<?php  echo $row['id'];?>]" value="<?php  echo $row['displayorder'];?>" style="width: 60px;"></td>
                <td><?php  echo $row['id'];?></td>
                <td>
                    <img width="50px;" src="<?php  if((strpos($row['headimgurl'], 'http') === false)) { ?><?php  echo $_W['attachurl'];?><?php  echo $row['headimgurl'];?><?php  } else { ?><?php  echo $row['headimgurl'];?><?php  } ?>" onerror="this.src='<?php echo RES;?>images/default-headimg.jpg'"/><br/>
                    <?php  echo $row['username'];?>
                </td>
                <td>
                    <div style="padding-left: 55px;
background: url('../addons/weisrc_question/template/images/bg_repno.gif') no-repeat -248px -550px;">
                        <?php  echo $row['content'];?>
                    </div>
                </td>
                <td></td>
                <td><?php  echo date('Y-m-d H:i', $row['dateline'])?></td>
                <td>
                    <?php  if($row['status']==1) { ?>
                    <span class="label" style="background:#56af45;">已审核</span>
                    <?php  } else { ?>
                    <span class="label" style="background:#f00;">未审核</span>
                    <?php  } ?>
                </td>
                <td style="text-align: right;">
                    <a class="btn btn-default btn-sm" href="<?php  echo $this->createWebUrl('question', array('op' => 'post', 'id' => $row['id']))?>" title="编辑"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-default btn-sm" onclick="return confirm('确认删除吗？');return false;" href="<?php  echo $this->createWebUrl('question', array('op' => 'delete', 'id' => $row['id']))?>" title="删除"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            <?php  } } ?>
            <?php  } } ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="8">
                    <input name="submit" type="submit" class="btn btn-primary" value="批量排序">
                    <input name="deleteall" type="button" class="btn btn-primary" value="批量删除">
                    <input name="checkall" type="button" class="btn btn-primary" value="批量审核">
                    <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                </td>
            </tr>
            </tfoot>
        </table>
        </form>
        </div>
    </div>
    <?php  echo $pager;?>
</div>
<script>
    function drop_confirm(msg, url){
        if(confirm(msg)){
            window.location = url;
        }
    }
</script>
<script type="text/javascript">
    $(function(){
        $(".check_all").click(function(){
            var checked = $(this).get(0).checked;
            $("input[type=checkbox]").attr("checked",checked);
        });

        $("input[name=deleteall]").click(function(){
            var check = $("input[type=checkbox][class!=check_all]:checked");
            if(check.length < 1){
                alert('请选择要删除的真心话!');
                return false;
            }
            if(confirm("确认要删除选择的真心话?")){
                var id = new Array();
                check.each(function(i){
                    id[i] = $(this).val();
                });
                var url = "<?php  echo $this->createWebUrl('question', array('op' => 'deleteall'))?>";
                $.post(
                        url,
                        {idArr:id},
                        function(data){
                            alert(data.error);
                            location.reload();
                        },'json'
                );
            }
        });

        $("input[name=checkall]").click(function(){
            var check = $("input[type=checkbox][class!=check_all]:checked");
            if(check.length < 1){
                alert('请选择要审核的真心话!');
                return false;
            }
            if(confirm("确认要审核选择的真心话?")){
                var id = new Array();
                check.each(function(i){
                    id[i] = $(this).val();
                });
                var url = "<?php  echo $this->createWebUrl('question', array('op' => 'checkall'))?>";
                $.post(
                    url,
                    {idArr:id},
                    function(data){
                        alert(data.error);
                        location.reload();
                    },'json'
                );
            }
        });

    });
</script>
<?php  } else if($operation == 'post') { ?>
<style>
    .item_box img{
        width: 100%;
        height: 100%;
    }
</style>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">
        <div class="panel panel-default">
            <div class="panel-heading">
                真心话信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label" style="color:#f00;">状态</label>
                    <div class="col-sm-9">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="1" <?php  if($item['status']==1 || empty($item)) { ?>checked<?php  } ?>>显示
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="0" <?php  if(isset($item['status']) && empty($item['status'])) { ?>checked<?php  } ?>>隐藏</label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">题目</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" value="<?php  echo $item['title'];?>" id="title" class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
                    <div class="col-sm-9">
                        <input type="text" name="displayorder" value="<?php  if(empty($item)) { ?>0<?php  } else { ?><?php  echo $item['displayorder'];?><?php  } ?>" id="displayorder" class="form-control" />
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>
</div>
<script>
    require(['jquery.ui', 'bootstrap.switch','util'], function($, $, u){
        $(function(){
            //表单验证
            $(function () {
                $('#invitative').submit(function () {
                    if ($.trim($(':text[name="reply_title"]').val()) == '') {
                        u.message('请填写图文回复标题.', '', 'error');
                        return false;
                    }

                    if ($.trim($(':text[name="title"]').val()) == '') {
                        u.message('必须填写活动标题.', '', 'error');
                        return false;
                    }
                    return true;
                });
            });
        });
    });

    require(['jquery', 'util'], function ($, u) {
        $(function () {
            u.editor($('.richtext')[0]);
        });
    });
</script>
<?php  } else if($operation == 'reply') { ?>
<style>
    .item_box img{
        width: 100%;
        height: 100%;
    }
</style>
<div class="main">
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="invitative">
        <input type="hidden" name="parentid" value="<?php  echo $parentid;?>" />
        <div class="panel panel-default">
            <div class="panel-heading">
                真心话回复
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">回复内容</label>
                    <div class="col-sm-9">
                        <textarea name="content" id="content" class="form-control" cols="60" rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1"/>
            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
        </div>
    </form>
</div>
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
