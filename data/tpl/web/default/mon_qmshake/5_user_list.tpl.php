<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li ><a href="<?php  echo $this->createWebUrl('QmshakeManage');?>">全民摇一摇管理</a></li>
        <li  class="active"><a href="<?php  echo $this->createWebUrl('userList',array('sid'=>$sid))?>">参加用户</a></li>

    </ul>


    <div class="panel panel-info">
        <div class="panel-heading"><?php  echo $shake['title'];?> 参加用户</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="mon_qmshake" />
                <input type="hidden" name="do" value="userList" />
                <input type="hidden" name="sid" value="<?php  echo $sid;?>" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">手机号/昵称</label>
                    <div class="col-sm-8 col-lg-9">
                        <input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
                    </div>
                    <div class=" col-xs-12 col-sm-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>
                <div class="form-group">
                </div>
            </form>
        </div>

    </div>


    <div style="padding: 0 15px 0  15px;">
        <div class="row-fluid">
            <div class="span8 control-group">
                <a class="btn btn-default" href="<?php  echo $this->createWebUrl('uDownload',array('sid'=>$sid))?>"><i class="icon-download-alt"></i>导出用户信息</a>
            </div>
        </div>

    </div>


        <div class=" panel panel-default">
            <div class="panel-heading">

               共<?php  echo $total;?>人

            </div>
        <div class="table-responsive panel-body">

            <div style="padding:15px;">

                <table class="table table-hover">
                    <thead class="navbar-inner">
                    <tr>
                        <th style="width: 5px">
                            <input type="checkbox" class="check_all" />
                        </th>
                        <th>openid</th>
                        <th style="width: 80px">姓名</th>
                        <th>手机</th>
                        <th><?php  echo $shake['udefine'];?></th>
                        <th>昵称</th>
                        <th>头像</th>
                        <th>参加时间</td>
                        <th style="width: 300px">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                    <tr>

                        <td class="with-checkbox">
                            <input type="checkbox" name="check" value="<?php  echo $row['id'];?>">
                        </td>
                        <td><?php  echo $row['openid'];?> </td>
                        <td><?php  if($row['uname']) { ?><?php  echo $row['uname'];?><?php  } else { ?><span class="label label-danger">未绑定</span><?php  } ?> </td>
                        <td><?php  if($row['tel']) { ?><?php  echo $row['tel'];?><?php  } else { ?><span class="label label-danger">未绑定</span><?php  } ?> </td>
                        <th><?php  if($row['udefine']) { ?><?php  echo $row['udefine'];?><?php  } else { ?><span class="label label-danger">未绑定</span><?php  } ?></th>
                        <td><?php  echo $row['nickname'];?> </td>
                        <td><img src="<?php  echo $row['headimgurl'];?>" width="50px" height="50px"></td>
                        <td><?php  echo date("Y-m-d H:i", $row['createtime'])?></td>
                        <td >
                            <a class="btn  btn-default" rel="tooltip" href="<?php  echo $this->createWebUrl('Record_list',array('uid'=>$row['id'],'sid'=>$row['sid']))?>" onclick="" title="抽奖记录">抽奖记录<i class="glyphicon glyphicon-list"></i></a>
                            <a class="btn  btn-default" rel="tooltip" href="<?php  echo $this->createWebUrl('shareList',array('uid'=>$row['id'],'sid'=>$row['sid']))?>" onclick="" title="分享奖励记录">分享奖励<i class="glyphicon glyphicon-list"></i></a>
                            <a class="btn  btn-default" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('userList',array('op'=>delete,'id'=>$row['id']))?>');" title="删除">删除<i class="glyphicon glyphicon-remove"></i></a>
                        </td>
                    </tr>
                    <?php  } } ?>
                    <tr>
                        <td colspan="8">

                            <input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" />
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


                $.post('<?php  echo $this->createWebUrl('DeleteUser')?>', {idArr:id}, function(data){

                    if(data.code==200) {
                        alert("删除成功");
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