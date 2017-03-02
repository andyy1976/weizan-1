<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li<?php  if($_GPC['do'] == 'manage' || $_GPC['do'] == '' ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>">活动管理</a></li>
<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'weisrc_dragonboat'));?>">添加活动规则</a></li>
	</ul>
    <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width: 5%;">编号</th>
                    <th style="width: 35%;">活动名称</th>
                    <th style="width: 20%;">开始时间/结束时间</th>
                    <th style="width: 10%;">状态</th>
                    <th style="width: 30%;">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td class="with-checkbox">
                        <?php  echo $row['id'];?>
                    </td>
                    <td><?php  echo $row['name'];?> </td>
                    <td><?php  echo $row['starttime'];?><br>
                        <?php  echo $row['endtime'];?></td>
                    <td>
                        <?php  echo $row['show'];?>
                    </td>
                    <td>
                        <a href="<?php  echo $this->createWebUrl('fanslist',array('rid'=>$row['id']))?>" class="btn  btn-default" data-toggle="tooltip" data-placement="top" title="SN"><i class="fa fa-bar-chart-o"></i> 参与用户</a>
                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="<?php  echo url('platform/reply/post',array('m'=>'weisrc_dragonboat','rid'=>$row['id']));?>" title="编辑"><i class="fa fa-edit"></i></a>
                        <?php  if($row['status']==0) { ?>
                        <a class="btn btn-default" title="开始活动" data-placement="top" href="#" onclick="drop_confirm('您确定要开始吗,设置中途可以随时修改!', '<?php  echo $this->createWebUrl('setshow',array('rid'=>$row['id'],'status'=>1))?>');"><i class="fa fa-play"></i></a>
                        <?php  } else if($row['status']==1) { ?>
                        <a class="btn btn-default" title="结束活动" data-placement="top" href="#" onclick="drop_confirm('您确定要暂停吗,设置中途可以随时修改!', '<?php  echo $this->createWebUrl('setshow',array('rid'=>$row['id'],'status'=>0))?>');"><i class="fa fa-stop"></i></a>
                        <?php  } ?>
                        <a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('delete',array('rid'=>$row['id']))?>');" title="删除"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        活动链接：<font color="#428bca"><?php echo $_W['siteroot'] . 'app/index.php?i=' . $row['weid'] . '&c=entry&id=' . $row['id'] . '&do=index&m=weisrc_dragonboat'?></font>
                    </td>
                </tr>
                <?php  } } ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php  echo $pager;?>
</div>
<script>
$(function(){
   
    $(".check_all").click(function(){
       var checked = $(this).get(0).checked;
       $("input[type=checkbox]").attr("checked",checked);
    });
	$("input[name=deleteall]").click(function(){
 
		var check = $("input:checked");
		if(check.length<1){
			err('请选择要删除的记录!');
			return false;
		}
        if( confirm("确认要删除选择的记录?")){
		var id = new Array();
		check.each(function(i){
			id[i] = $(this).val();
		});
		$.post('<?php  echo create_url('site/module', array('do' => 'deleteAll', 'name' => 'weisrc_dragonboat'))?>', {idArr:id},function(data){
			if (data.errno ==0)
			{
				location.reload();
			} else {
				alert(data.error);
			}


		},'json');
		}

	});
});
</script>
<script>
function drop_confirm(msg, url){
    if(confirm(msg)){
        window.location = url;
    }
}
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>