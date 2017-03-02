<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<script>
	function selectAll(obj, name){
		var isChecked = $(obj).prop('checked');
		$('input[name="'+name+'[]"]:checkbox').each(function() {
			$(this).prop("checked", isChecked);
		});
	}
</script>

<div class="main panel panel-default" id="table-list">
	<div class="sub-title panel-heading">中奖名单</div>
	<div class="panel-body">
		<form action="" method="post" onsubmit="">
			<div class="sub-content table-responsive">
				<table class="table table-hover">
					<thead class="navbar-inner">
					<tr>
						<th>选择</th>
						<th>姓名</th>
						<th>获取时间</th>
						<th>操作</th>
					</tr>
					</thead>
					<tbody>
					<?php  if(is_array($list)) { foreach($list as $row) { ?>
					<tr>
						<td><input type="checkbox" name="select[]" value="<?php  echo $row['id'];?>" /></td>
						<td><?php  echo $row['nickname'];?></td>
						<td>
							<?php  echo date('Y-m-d H:i:s', $row['createtime']);?>
						</td>
						<td><?php  if(empty($row['status'])) { ?>
							<a class="btn btn-primary" href="<?php  echo $this->createWebUrl('awardlist', array('id' => $id, 'wid' => $row['id'], 'status' => 1))?>">标记领奖</a>
							<?php  } else { ?>
							<a class="btn btn-danger" href="<?php  echo $this->createWebUrl('awardlist', array('id' => $id, 'wid' => $row['id'], 'status' => 0))?>">取消领奖</a>
							<?php  } ?>
						</td>
					</tr>
					<?php  } } ?>
					</tbody>
				</table>
				<?php  if(!empty($list)) { ?>
				<table class="table">
					<tr>
						<td style="width:40px;" class="row-first"><input type="checkbox" onclick="selectAll(this, 'select');" /></td>
						<td>
							<input type="submit" name="delete" value="删除" class="btn btn-primary" />
							<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
						</td>
					</tr>
				</table>
				<?php  } ?>
			</div>
		</form>
		<?php  echo $pager;?>
	</div>
</div>

<script type="text/javascript">
	require(['jquery'], function($){
		//详细数据相关操作
		var tdIndex;
		$("#table-list thead").delegate("th", "mouseover", function(){
			if($(this).find("i").hasClass("")) {
				$("#table-list thead th").each(function() {
					if($(this).find("i").hasClass("icon-sort")) $(this).find("i").attr("class", "");
				});
				$("#table-list thead th").eq($(this).index()).find("i").addClass("icon-sort");
			}
		});
		$("#table-list thead th").click(function() {
			if($(this).find("i").length>0) {
				var a = $(this).find("i");
				if(a.hasClass("icon-sort") || a.hasClass("icon-caret-up")) { //递减排序
					/*
					 数据处理代码位置
					 */
					$("#table-list thead th i").attr("class", "");
					a.addClass("icon-caret-down");
				} else if(a.hasClass("icon-caret-down")) { //递增排序
					/*
					 数据处理代码位置
					 */
					$("#table-list thead th i").attr("class", "");
					a.addClass("icon-caret-up");
				}
				$("#table-list thead th,#table-list tbody:eq(0) td").removeClass("row-hover");
				$(this).addClass("row-hover");
				tdIndex = $(this).index();
				$("#table-list tbody:eq(0) tr").each(function() {
					$(this).find("td").eq(tdIndex).addClass("row-hover");
				});
			}
		});
	});
</script>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
