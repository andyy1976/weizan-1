<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
    <ul class="nav nav-tabs">
        <li class="active" ><a href="<?php  echo $this->createWebUrl('formManage');?>">商家管理</a></li>
        <li ><a href="<?php  echo url('platform/reply/post',array('m'=>'mon_orderform'));?>">添加商家</a></li>

    </ul>


    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="m" value="mon_orderform" />
                <input type="hidden" name="do" value="formManage" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
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


    <div class="panel panel-default">
        <div class="panel-heading">
            共<?php  echo $total;?>个商家通用订单
        </div>
        <div class="table-responsive panel-body">

    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th style="width: 5px">
                    <input type="checkbox" class="check_all" />
                </th>
                <th>商家名称</th>
                <th>订单名称</th>
                <th>联系电话</th>
                <th>地址</th>
                <th style="width: 350px">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
            <tr>

                <td class="with-checkbox">
                    <input type="checkbox" name="check" value="<?php  echo $row['id'];?>">
                </td>
                <td><?php  echo $row['pname'];?> </td>
                <td><?php  echo $row['oname'];?> </td>
                <td><?php  echo $row['p_tel'];?> </td>
                <th><?php  echo $row['address'];?></th>
                <td >
                    <a href="<?php  echo $this->createWebUrl('orderList',array('fid'=>$row['id']))?>" class="btn  btn-default" rel="tooltip" title="用户订单"><i class="glyphicon glyphicon-list"></i>用户订单</a>
                    <a href="<?php  echo $this->createWebUrl('orderItemlist',array('fid'=>$row['id']))?>" class="btn  btn-default" rel="tooltip" title="订单类型管理"><i class="glyphicon glyphicon-list"></i>订单类型管理</a>
                    <a class="btn btn-default" rel="tooltip" href="<?php  echo url('platform/reply/post',array('m'=>'mon_orderform','rid'=>$row['rid']));?>" title="编辑"><i class="glyphicon glyphicon-edit"></i></i></a>
                    <a class="btn  btn-default" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('formManage',array('op'=>delete,'id'=>$row['id']))?>');" title="删除"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
            <?php  } } ?>
            <tr>
                <td colspan="6">

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


                $.post('<?php  echo $this->createWebUrl('Deleteform')?>', {idArr:id}, function(data){

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