<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
.label{cursor:pointer;}
</style>
<div class="main">
	<ul class="nav nav-tabs">
		<li<?php  if($_GPC['do'] == 'manage') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>">管理幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'fansdata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('fansdata',array('rid' => $rid));?>">参与粉丝</a></li>
		<li<?php  if($_GPC['do'] == 'sharedata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('sharedata',array('rid' => $rid));?>">分享数据</a></li>
		<li<?php  if($_GPC['do'] == 'prizedata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('prizedata',array('rid' => $rid));?>">中奖名单</a></li>		
		<li<?php  if($_GPC['do'] == 'rankdata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('rankdata',array('rid' => $rid));?>">粉丝排行</a></li>
		<li<?php  if($_GPC['do'] == 'trend') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('trend',array('rid' => $rid));?>">活动分析</a></li>
		<li<?php  if($_GPC['do'] == 'posttmplmsg') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('posttmplmsg',array('rid' => $rid));?>">消息通知</a></li>
		<?php  if($stonefish_branch) { ?><li<?php  if($_GPC['do'] == 'branch') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('branch',array('rid' => $rid));?>">商家赠送项</a></li><?php  } ?>
		<li><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_scratch', 'rid' => $rid));?>">编辑幸运刮刮卡</a></li>
	</ul>
    <div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="stonefish_scratch" />
        	<input type="hidden" name="do" value="sharedata" />
        	<input type="hidden" name="rid" value="<?php  echo $_GPC['rid'];?>" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">粉丝昵称</label>
				<div class="col-xs-12 col-sm-8 col-lg-9">
					<input class="form-control" name="nickname" id="nickname" type="text" value="<?php  echo $_GPC['nickname'];?>" placeholder="粉丝昵称"> 
				</div>
				<div class=" col-xs-12 col-sm-2 col-lg-2">
					<button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="panel panel-default">
<div class="panel-heading">分享数据 共计：<?php  echo $total;?>条分享记录</div>
<div style="position:relative">
	<div class="panel-body table-responsive">
		<table class="table table-hover" style="position:relative">
			<thead class="navbar-inner">
				<tr>
					<th style="width:30px;">删？</th>
					<th style="width:40px;">头像</th>
					<th style="width:100px;">昵称</th>
					<th style="width:50px;">分享人</th>
					<th style="width:100px;">分享人昵称</th>
					<th style="width:100px;">分享人姓名</th>
					<th style="width:150px;">访问时间</th>
					<th style="width:150px;">访问IP</th>
					<th style="width:80px;">助力值</th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($list)) { foreach($list as $row) { ?>
				<tr>
					<td><input type="checkbox" name="uid[]" value="<?php  echo $row['id'];?>" class=""></td>
					<td><img src="<?php  if(substr($row['avatar'],-1)=='0') { ?><?php  echo rtrim(toimage($row['avatar']), '0').$reply['poweravatar']?><?php  } else { ?><?php  echo toimage($row['avatar'])?><?php  } ?>" width="30"></td>
					<td><?php  echo stripcslashes($row['nickname'])?></td>
					<td><img src="<?php  if(substr($row['favatar'],-1)=='0') { ?><?php  echo rtrim(toimage($row['favatar']), '0').'46'?><?php  } else { ?><?php  echo toimage($row['favatar'])?><?php  } ?>" width="30"></td>					
					<td><?php  echo stripcslashes($row['fnickname'])?></td>
					<td><?php  echo $row['frealname'];?></td>
					<td><?php  echo date('Y/m/d H:i',$row['visitorstime']);?></td>
					<td><?php  echo $row['visitorsip'];?></td>
					<td><?php  echo $row['viewnum'];?></td>
				</tr>
				<?php  } } ?>
				<tr>
					<td><input type="checkbox" name="" onclick="var ck = this.checked;$(':checkbox').each(function(){this.checked = ck});"></td>
					<td colspan="8"><input name="token" type="hidden" value="<?php  echo $_W['token'];?>" /><input type="submit" name="deleteall" class="btn btn-danger" value="删除选中的数据"></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
</div>
<?php  echo $pager;?>
</div>
<div id="guanbi" class="hide">
	<span type="button" class="pull-right btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</span>
</div>
<script>
	require(['jquery', 'util'], function($, u){
		$("input[name=deleteall]").click(function(){
		    if($(":checkbox[name='uid[]']:checked").size() > 0){
			    var check = $(":checkbox[name='uid[]']:checked");
			    //if(confirm("确认要删除选择的粉丝中奖记录?")){
		            var id = new Array();
				    var rid = <?php  echo $rid;?>;
		            check.each(function(i){
			            id[i] = $(this).val();
		            });
		            $.post('<?php  echo $this->createWebUrl('deletesharedata')?>', {idArr:id,rid:rid},function(data){
			        if (data.errno ==0){
						u.message(data.error, '<?php  echo url('site/entry/sharedata',array('m' => 'stonefish_scratch','rid' => $rid))?>', 'warning');
			        }else{
				        u.message(data.error, '', 'error');
			        }
					return false;
		            },'json');
		        //}
		    }else{
		        u.message('没有选择数据', '', 'error');
		        return false;
		    }		    
	    });
	});	
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>