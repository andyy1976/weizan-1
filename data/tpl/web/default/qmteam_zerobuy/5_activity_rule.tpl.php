<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<script type='text/javascript' src='resource/js/lib/jquery-1.11.1.min.js'></script>
<style type="text/css">
.red {float:left;color:red}
.white{float:left;color:#fff}
.tooltipbox {
	background:#fef8dd;border:1px solid #c40808; position:absolute; left:0;top:0; text-align:center;height:20px;
	color:#c40808;padding:2px 5px 1px 5px; border-radius:3px;z-index:1000;
}
.red { float:left;color:red}
</style>
<script>
$(function(){
$('.nav-tabs li').click(function(){
  var i=$(this).index();
  $(this).addClass('active');
  $(this).siblings().removeClass('active');
  $('.item').hide();
  $('.item').eq(i).show();
  })
  <?php  if(!empty($info)) { ?>
	$('.nav-tabs li').removeClass('active');
	$('.nav-tabs li').eq(0).addClass('active');
	$('.item').hide();
	$('.item').eq(0).show();
 <?php  } ?>
});
</script>
<ul class="nav nav-tabs">
     <li ><a href="javascript:void">添加</a></li>
     <li class="active"><a href="javascript:void">管理</a></li>
</ul>
<div class="main item" style="display:none;">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
		<div class="panel panel-default">
        	<div class="panel-heading">添加活动规则</div>
            <div class="panel-body">
            	<div class="form-group">
                	<label class="col-xs-12 col-sm-3 col-md-2 control-label">规则标题</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" value="<?php  echo $info['title'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">规则内容</label>
                    <div class="col-sm-9">
                        <textarea name="rule" class="form-control richtext" cols="70"><?php  echo $info['rule'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">规则定位</label>
                    <div class="col-sm-9">
                        <input type="radio" name="rule_draw" value="0" <?php  if($info['rule_draw']==0) { ?>checked<?php  } ?> />相对规则
                        <input type="radio" name="rule_draw" value="1" <?php  if($info['rule_draw']==1) { ?>checked<?php  } ?> />绝对规则
					    <span class="help-block">相对规则：中将号码为与开奖号码最近的号码，每期必有一个中奖；绝对规则：中将号码为开奖号码，若没有则本期无人中奖。</span>
                    </div>
                </div>
            </div>
        </div>
		<div class="form-group col-sm-12">
		    <input type="hidden" name="act" value="<?php  echo $act;?>" />
		    <input type="hidden" name="id" value="<?php  echo $info['id'];?>" />
			<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
			<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		</div>
	</form>
</div>
<div class="main item" >
    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
		<div class="panel panel-default">
        	<div class="panel-heading">规则添加</div>
            <div class="panel-body">
            	<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:5%;">ID</th>
					<th style="width:85%;">规则标题</th>
					<th style="width:10%;">操作</th>

				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($list)) { foreach($list as $r) { ?>
				<tr>
					<td><?php  echo $r['id'];?></td>
					<td><?php  echo $r['title'];?></td>
					<td style="text-align:left;">
						<a href="<?php  echo $this->createWebUrl('activity_rule', array('act'=>'edit','op' => 'display', 'id' => $r['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="修改"><i class="fa fa-pencil"></i></a>
						<a href="<?php  echo $this->createWebUrl('activity_rule', array('act'=>'delete','op' => 'display', 'id' => $r['id']))?>" onclick="return confirm('确认删除吗？');return false;" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="删除"><i class="fa fa-times"></i></a>
					</td>
				</tr>
			<?php  } } ?>
			</tbody>
		</table>
            </div>
        </div>
	</form>
</div>
<script language='javascript'>
    require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('.richtext')[0]);
		});
    });
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>