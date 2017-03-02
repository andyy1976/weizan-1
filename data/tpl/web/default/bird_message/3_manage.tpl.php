<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
  <ul class="nav nav-tabs">
    <li class="active"><a href="<?php  echo $this->createWebUrl('manage');?>">产品采购管理</a></li>
  </ul>
  <div class="panel panel-info">
    <div class="panel-heading">筛选</div>
    <div class="panel-body">
      <form action="./index.php" method="get" class="form-horizontal" role="form">
        <input type="hidden" name="c" value="site" />
        <input type="hidden" name="a" value="entry" />
        <input type="hidden" name="m" value="bird_message" />
        <input type="hidden" name="do" value="manage" />
        <div class="form-group">
          <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
          <div class="col-sm-8 col-lg-9">
            <input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
          </div>
          <div class=" col-xs-12 col-sm-2 col-lg-2">
            <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
          </div>
        </div>
        <div class="form-group"></div>
      </form>
    </div>
  </div>
  <div style="padding:15px;">
    <table class="table table-hover">
      <thead class="navbar-inner">
        <tr>
          <th class='with-checkbox' style="width:30px;"><input type="checkbox" class="check_all" /></th>
          <th style="min-width:200px;">姓名</th>
          <th style="width:200px;">手机号</th>
          <th style="min-width:200px;">预约产品</th>
          <th style="min-width:200px;">预约时间</th>
          <th style="width:60px;">操作</th>
        </tr>
      </thead>
      <tbody>
      
      <?php  if(is_array($list)) { foreach($list as $row) { ?>
      <tr>
        <td class="with-checkbox"><input type="checkbox" name="check" value="<?php  echo $row['id'];?>"></td>
        <td><?php  echo $row['name'];?></td>
        <td><?php  echo $row['tel'];?> </td>
        <td><?php  echo $row['pro'];?> </td>
        <td><?php  echo date('Y/m/d H:i:s', $row['addtime'])?></td>
        <td ><a class="btn  btn-default" rel="tooltip" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('manage',array('id'=>$row['id'], 'op'=>'delete'))?>');" title="删除"><i class="fa fa-times"></i></a></td>
      </tr>
      <?php  } } ?>
      <tr>
        <td colspan="6"><input type="button" class="btn btn-primary" name="deleteall" value="删除选择的" /></td>
      </tr>
        </tbody>
      
    </table>
    <?php  echo $pager;?> </div>
  <script>
	$(function(){

		$(".check_all").click(function(){
            var checked = $(this).get(0).checked;
                    $("input[type=checkbox]").attr("checked", checked);
		});
		$("input[name=deleteall]").click(function(){

            var check = $("input:checked");
			if (check.length < 1){
				alert('请选择要删除的产品采购!');
				return false;
            }
            if (confirm("确认要删除选择的产品采购吗?")){
            	var id = new Array();
				check.each(function(i){
					id[i] = $(this).val();
				});
				$.post("<?php  echo create_url('site/entry', array('do' => 'manage', 'm' => 'bird_message', 'op'=>'delete'))?>", {id:id}, function(data){
					if (data.errno == 1){
						location.reload();
					} else {
						alert(data.errno);
					}
	
				}, 'json');
			}

		});
	});
</script> 
  <script>
	function drop_confirm(msg, url){
		if (confirm(msg)){
			window.location = url;
		}
	}
</script> 
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>