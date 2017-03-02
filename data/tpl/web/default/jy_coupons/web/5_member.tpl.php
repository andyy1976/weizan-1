<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li  class="active"><a href="<?php  echo $this->createWebUrl('member');?>">用户管理</a></li>
    <li><a href="<?php  echo $this->createWebUrl('coupons');?>">卡券管理</a></li>
    <li><a href="<?php  echo $this->createWebUrl('setting');?>">基本设置</a></li>
    <li><a href="<?php  echo $this->createWebUrl('stat');?>">统计分析</a></li>
</ul>

	<div class="panel panel-default">

		<div class="panel-heading">用户详细数据  |  总数:<?php  echo $total;?> </div>

		<div class="panel-body table-responsive">

		    <form action="" method="post" onsubmit="">

			<table class="table table-hover">

				<thead class="navbar-inner">

					<tr>

						<th style="width:30px;" class="row-first">选择</td>

						<th style="width:80px;">昵称</th>

						<th style="width:100px;">头像</th>

						<th style="width:80px;" class="row-hover">参与人数</th>

						<th style="width:120px;">活动发起时间</th>

						<th style="width:80px;">操作</th>

					</tr>

				</thead>

				<tbody id="main">

				<?php  $i=1;?>

					<?php  if(is_array($member)) { foreach($member as $row) { ?>

					<tr>

					    <td><input type="checkbox" name="select[]" value="<?php  echo $row['id'];?>" /></td>

					    <td><?php  echo $row['nickname'];?></td>

						<td><img style="width:70px" src="<?php  echo $_W['attach_url'];?><?php  echo $row['avatar'];?>"></td>

						<td><?php  echo $row['num'];?></td>

						<td><?php  echo date('m-d H:i:s', $row['createtime']);?></td>

						<td><a href="<?php  echo $this->CreateWebUrl('mingxi',array('member_id'=>$row['uid']))?>"><div class="btn btn-danger">参与名单</div></a></td>  

					</tr>

					<?php  $i++;?>

					<?php  } } ?>

				</tbody>

			</table>


			</form>			

	    </div>

	</div>

	<?php  echo $pager;?>
	<!--
	<a id="needCopy" href="javascript:">点击复制我吧</a>
	-->

</div>

<script type="text/javascript">
require(['jquery', 'util'], function($, util){
	$(function(){
		util.clip($('#needCopy')[0], $('#needCopy').text());
	});
});
</script>

<script>

$(function(){   

    $(".check_all").click(function(){

       var checked = $(this).get(0).checked;

       $("input[type=checkbox]").attr("checked",checked);

    });	

});

</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>