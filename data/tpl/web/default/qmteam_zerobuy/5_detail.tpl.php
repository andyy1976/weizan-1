<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style type="text/css">
.red {float:left;color:red}
.white{float:left;color:#fff}
.tooltipbox {
	background:#fef8dd;border:1px solid #c40808; position:absolute; left:0;top:0; text-align:center;height:20px;
	color:#c40808;padding:2px 5px 1px 5px; border-radius:3px;z-index:1000;
}
.red { float:left;color:red}
</style>

<script language='javascript'>
    require(['jquery'], function(jQuery){

		jQuery(function(){
				jQuery('.nav-tabs li').click(function(){

					  var i=jQuery(this).index();
					  jQuery(this).addClass('active');
					  jQuery(this).siblings().removeClass('active');
					  jQuery('.item').hide();
					  jQuery('.item').eq(i).show();

				  });


				<?php  if(!empty($draw_info)) { ?>
					jQuery('.nav-tabs li').removeClass('active');
					jQuery('.nav-tabs li').eq(2).addClass('active');
					jQuery('.item').hide();
					jQuery('.item').eq(2).show();
				<?php  } else { ?>
					jQuery('.draw_code').css('display','none');
				<?php  } ?>


				<?php  if(!empty($info)) { ?>
					jQuery('.nav-tabs li').removeClass('active');
					jQuery('.nav-tabs li').eq(0).addClass('active');
					jQuery('.item').hide();
					jQuery('.item').eq(0).show();
				<?php  } ?>


				<?php  if($act == 'edit') { ?>
					jQuery("input[name=starttime]").attr("disabled",true);
					jQuery("input[name=endtime]").attr("disabled",true);

					jQuery("input[name=submit]").click(function(){

						jQuery("input[name=starttime]").attr("disabled",false);
						jQuery("input[name=endtime]").attr("disabled",false);

					});
				<?php  } ?> 

			});
    });
</script>

<ul class="nav nav-tabs">
     <li ><a href="javascript:void(0)">添加</a></li>
     <li class="active"><a href="javascript:void(0)">管理</a></li>
	 <li class="draw_code"><a href="javascript:void(0)">开奖</a></li>
</ul>
<div class="main item" style="display:none;">
	<form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
		<div class="panel panel-default">
        	<div class="panel-heading">规则设置</div>
            <div class="panel-body">
            	<div class="form-group">
                	<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动名称</label>
                    <div class="col-sm-9">
                        <input type="text" name="title" class="form-control" value="<?php  echo $info['title'];?>" />
                    </div>
                </div>
                <div class="form-group">
                	<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动商品</label>
                    <div class="col-sm-9">
						<select class="form-control" name="lid">
							<option value="">请选择商品</option>
							<?php  if(is_array($product_list)) { foreach($product_list as $r) { ?>
								<option value="<?php  echo $r['id'];?>" <?php  if($r['id']==$info['lid']) { ?>selected="selected"<?php  } ?>><?php  echo $r['title'];?></option>
							<?php  } } ?>
							</select>						
					</div>
                </div>
                <div class="form-group">
                	<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动规则</label>
                    <div class="col-sm-9">
						<select class="form-control" name="rid">
							<option value="">请选择规则</option>
							<?php  if(is_array($rule_list)) { foreach($rule_list as $r) { ?>
								<option value="<?php  echo $r['id'];?>" <?php  if($r['id']==$info['rid']) { ?>selected="selected"<?php  } ?>><?php  echo $r['title'];?></option>
							<?php  } } ?>
							</select>						
					</div>
                </div>
				<style>
				.form-control[readonly],.form-control {
                  cursor:pointer;
                 }
				</style>
                <div class="form-group">
                	<label  class="col-xs-12 col-sm-3 col-md-2 control-label">开始日期</label>
					<div style="width:14%;"  class="col-sm-9">
                        <?php echo tpl_form_field_date('starttime', !empty($info['starttime']) ? date('Y-m-d H:i',$info['starttime']) : date('Y-m-d H:i'), 1)?>
                    </div>
                	<label style="width:7%;"  class="col-xs-12 col-sm-3 col-md-2 control-label">截止日期</label>
                    <div style="width:14%;"  class="col-sm-9">
                        <?php echo tpl_form_field_date('endtime', !empty($info['endtime']) ? date('Y-m-d H:i',$info['endtime']) : date('Y-m-d H:i'), 1)?>
                    </div>
                </div>
                <!-- 
                <div class="form-group">
                	<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动价格</label>
                    <div class="col-sm-9">
                        <input type="text" name="zerobuy_price" class="form-control" value="0" disabled/>
                    <span class="help-block">设置活动价格，为以后升级优惠购预留</span>
                    </div>
                </div>
                 -->
                <div class="form-group">
                	<label class="col-xs-12 col-sm-3 col-md-2 control-label">积分兑换比例</label>
                    <div class="col-sm-9">
                        <input type="text" name="exchange" class="form-control" value="<?php  echo $info['exchange'];?>" />
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
        	<div class="panel-heading">规则管理</div>
            <div class="panel-body">
            	<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:5%;">ID</th>
					<th style="width:16%;">活动名称</th>
					<th style="width:16%;">商品名称</th>
					<th style="width:12%;">开始时间</th>
					<th style="width:12%;">结束时间</th>
					<th style="width:27%;">开奖信息</th>
					<th style="width:12%;">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php  if(is_array($list)) { foreach($list as $r) { ?>
				<tr>
					<td><?php  echo $r['id'];?></td>
					<td><?php  echo $r['title'];?></td>
					<td><?php  echo $r['goods_title'];?></td>
					<td><?php  echo date('Y-m-d H:i:s',$r['starttime'])?></td>
					<td><?php  echo date('Y-m-d H:i:s',$r['endtime'])?></td>
                    <td>
                    <?php  if($r['status']==4) { ?>
					   	开奖码：<?php  echo $r['draw_code'];?> 中奖码:<?php  echo $r['win_code'];?> mobile：<?php  $member = pdo_fetch("SELECT * FROM " . tablename('mc_members') . " WHERE uid=".$r['winner_uid']);echo $member['mobile'];?></td>
					<?php  } else if($r['status']==5) { ?>
					           开奖码：<?php  echo $r['draw_code'];?> 本期无人中奖
					<?php  } else { ?>
						未开奖
				    <?php  } ?>
                     		
					<td style="text-align:left;">
					<?php  if($r['status']==4 || $r['status']==5) { ?>
					    <a href="javascript:void(0)" class="btn btn-default btn-xs">已开奖</a>
					<?php  } else if($r['status']==3) { ?>
						<a href="<?php  echo $this->createWebUrl('detail', array('act'=>'clear','op' => 'display', 'id' => $r['id']))?>" class="btn btn-primary btn-sm draw">开奖</a>
					<?php  } else { ?>
					    <a href="#" class="btn btn-default btn-xs" disabled>等待开奖</a>
				    <?php  } ?>
						<a href="<?php  echo $this->createWebUrl('detail', array('act'=>'edit','op' => 'display', 'id' => $r['id']))?>" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="修改"><i class="fa fa-pencil"></i></a>
						<a href="<?php  echo $this->createWebUrl('detail', array('act'=>'delete','op' => 'display', 'id' => $r['id']))?>" onclick="return confirm('确认删除吗？');return false;" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="bottom" title="删除"><i class="fa fa-times"></i></a>
					</td>
				</tr>
			<?php  } } ?>
			</tbody>
		</table>
            </div>
        </div>
	</form>
</div>
<div class="main item" style="display:none;">
    <form action="<?php  echo $this->createWebUrl('clear')?>" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">
		<div class="panel panel-default">
        	<div class="panel-heading">开奖</div>
            <div class="panel-body">
            	<div class="form-group">
                	<label class="col-xs-12 col-sm-3 col-md-2 control-label">开奖码</label>
                    <div class="col-sm-9">
                        <input type="text" name="draw_code" class="form-control" />
                    </div>
                    <input type="hidden" name="id" class="form-control" value="<?php  echo $draw_info['id'];?>" />
                </div>
            </div>
        </div>
		<div class="form-group col-sm-12">
			<input type="submit" name="sub_draw" value="提交" class="btn btn-primary col-lg-1" />
		</div>
	</form>
</div>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>