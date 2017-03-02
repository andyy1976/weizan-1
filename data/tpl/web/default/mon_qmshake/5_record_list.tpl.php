<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li><a href="<?php  echo $this->createWebUrl('QmshakeManage');?>">摇一摇活动管理</a></li>
        <li class="active" ><a href="<?php  echo $this->createWebUrl('record_list',array('sid'=>$sid));?>">摇奖记录</a></li>
    </ul>


    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="mon_qmshake" />
                <input type="hidden" name="do" value="record_list" />
                <input type="hidden" name="sid" value="<?php  echo $sid;?>" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">状态</label>
                    <div class="col-sm-8 col-lg-9">

                        <select name="status" class="form-control" style="float:left">
                            <option value="0"> 全部</option>
                            <option value="1" <?php  if($status==1) { ?>selected ='selected'<?php  } ?>>已中奖</option>
                            <option value="2"  <?php  if($status==2) { ?>selected ='selected'<?php  } ?>>已兑换</option>

                        </select>


                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">中奖品</label>
                    <div class="col-sm-8 col-lg-9">

                        <select name="pid" class="form-control" style="float:left">
                            <option value="0"> 全部</option>

                            <?php  if(is_array($prizes)) { foreach($prizes as $pr) { ?>
                                 <option value="<?php  echo $pr['id'];?>" <?php  if($pid==$pr['id']) { ?>selected='selected'<?php  } ?>><?php  echo $pr['pname'];?></option>
                            <?php  } } ?>

                        </select>


                    </div>
                    <div class=" col-xs-12 col-sm-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>

            </form>
        </div>

    </div>


    <div style="padding: 0 15px 0  15px;">
        <div class="row-fluid">
            <div class="span8 control-group">
                <a class="btn btn-default" href="<?php  echo $this->createWebUrl('rDownload',array('sid'=>$sid,'uid'=>$uid,'pid'=>$pid,'status'=>$status))?>"><i class="icon-download-alt"></i>导出抽奖记录</a>
            </div>
        </div>

    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
           <?php  echo $shake['title'];?>活动|共<?php  echo $total;?>人
        </div>
        <div class="table-responsive panel-body">

    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th width="20px">
                    <input type="checkbox" class="check_all" />
                </th>
                <th width="100px">用户名</th>
                <th width="150px">手机</th>
                <th width="150px"><?php  echo $shake['udefine'];?></th>
                <th width="150px">昵称</th>
                <th width="60px">头像</th>
                <th  width="100px">物品</th>
                <th width="80px">状态</th>
                <th width="150px">中奖时间</th>
                <th width="150px">兑换时间</th>
                <th style="width: 250px">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
            <tr>

                <td class="with-checkbox">
                    <input type="checkbox" name="check" value="<?php  echo $row['rid'];?>">
                </td>
                <td><?php  echo $row['uname'];?> </td>
                <td><?php  echo $row['tel'];?> </td>
                <td><?php  echo $row['udefine'];?> </td>
                <td><?php  echo $row['nickname'];?> </td>
                <td><img src="<?php  echo $row['headimgurl'];?>" width="60px" height="60px"></td>
                <td><?php  echo $row['pname'];?></td>
                <td>
                    <?php  if($row['status'] == 0) { ?>
                      <span class="label label-default">未中奖</span>
                    <?php  } ?>
                    <?php  if($row['status'] == 1) { ?>
                      <span class="label label-info">已中奖</span>
                    <?php  } ?>

                    <?php  if($row['status'] == 2) { ?>
                      <span class="label label-success">已兑换</span>
                    <?php  } ?>

                </td>
                <td><?php  echo date("Y-m-d H:i", $row['createtime'])?></td>
                <td><?php  if($row['djtime']) { ?><?php  echo date("Y-m-d H:i", $row['djtime'])?><?php  } else { ?>-<?php  } ?></td>
                <td >
                    <?php  if($row['status'] == 1) { ?>
                    <a class="btn  btn-default" rel="tooltip" href="#" onclick="drop_confirm('您确定要兑换码?', '<?php  echo $this->createWebUrl('Record_list',array('op'=>dh,'id'=>$row['rid']))?>');" title="兑换">兑换<i class="glyphicon glyphicon-heart"></i></a>
                    <?php  } ?>
                    <a class="btn  btn-default" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('Record_list',array('op'=>delete,'id'=>$row['rid']))?>');" title="删除">删除<i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
            <?php  } } ?>
            <tr>
                <td colspan="10">

                    <input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
                    <input type="button" class="btn btn-success" name="dhall" value="批量兑换选择的" />
                </td>
            </tr>
            </tbody>
        </table>
        <?php  echo $pager;?>
    </div>

            </div>
        </div>
</div>
<script>
    $(function(){

        $(".check_all").click(function(){

            var checked = $(this).get(0).checked;
            $("input[type=checkbox]").each(function(i){
                $(this).get(0).checked=checked;
            });

        });


        $("input[name=deleteall]").click(function(){


            var check = $("input:checked");
            if (check.length < 1){
                 alert('请选择要删除的记录!');
                return false;
            }
            if (confirm("确认要删除选择的记录?")){
                var id = new Array();
                check.each(function(i){
                    id[i] = $(this).val();
                });


                $.post('<?php  echo $this->createWebUrl('DeleteRecord')?>', {idArr:id}, function(data){

                    if(data.code==200) {
                        alert("删除成功");
                        location.reload();
                    } else {
                        alert("删除出错，稍后再试!");
                    }

                }, 'json');
            }

        });


        $("input[name=dhall]").click(function(){


            var check = $("input:checked");
            if (check.length < 1){
                alert('请选择要兑换的记录!');
                return false;
            }
            if (confirm("确认要兑换的记录?")){
                var id = new Array();
                check.each(function(i){
                    id[i] = $(this).val();
                });


                $.post('<?php  echo $this->createWebUrl('dhAll')?>', {idArr:id}, function(data){

                    if(data.code==200) {
                        alert("兑换成功");
                        location.reload();
                    } else {
                        alert("删除出错，稍后再试!");
                    }

                }, 'json');
            }

        });

    });</script>
<script>
    function drop_confirm(msg, url){
        if (confirm(msg)){
            window.location = url;
        }
    }
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>