<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="panel panel-default">
	 <div class="panel-heading">
     	用户参数说明<label style="float:right;" class="bg-success">#***#为一个整体，不能任何改动！</label>
     </div>
     <div class="panel-body">
		<table class="table">
			<thead>
				<th>参数</th>
				<th>字段</th>
			</thead>
			
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $li) { ?>
					<tr>
						<td><?php  echo $li['replace'];?></td>
						<td><?php  echo $li['name'];?></td>
					</tr>
				<?php  } } ?>
			</tbody>
			
		</table>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>				