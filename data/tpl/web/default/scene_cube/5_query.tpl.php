<?php defined('IN_IA') or exit('Access Denied');?><table class="table table-hover" style="min-width: inherit;">
	<tbody>
		<?php  if(empty($ds)) { ?>
		<tr>
			<td>暂时无场景，<a href="<?php  echo $this->createWeburl('manager')?>">添加场景</a></td>
		</tr>
		<?php  } else { ?>
		<?php  if(is_array($ds)) { foreach($ds as $item) { ?>
		<tr>
			<td title="<?php  echo $item['reply_description'];?>"><?php  echo $item['reply_title'];?></td>
			<td style="width:80px;text-align:center;"><a href="javascript:;" onclick='select_entry(<?php  echo json_encode($item['entry']);?>)'>添加</a></td>
		</tr>
		<?php  } ?>
		<?php  } } ?>
	</tbody>
</table>
