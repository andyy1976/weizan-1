<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php  load()->func('tpl')?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>
<div class="main">
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('hotel');?>">酒店管理</a></li>
	<li><a href="<?php  echo $this->createWebUrl('hotel', array('op'=>'edit','id' => $hotelid));?>">酒店编辑</a></li>
	<li <?php  if($_GPC['op'] == 'edit') { ?>class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('room', array('op'=>'edit','hotelid' => $hotelid));?>">添加房型</a></li>
	<li <?php  if(empty($_GPC['op'])) { ?>class="active"<?php  } ?> ><a href="<?php  echo $this->createWebUrl('room', array('hotelid' => $rid));?>">房型管理</a></li>
</ul>
<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data" onsubmit="return formcheck()">
<input type="hidden" name="id" value="<?php  echo $item['id'];?>">
<div class="panel panel-default">
	<div class="panel-heading">
		<?php  if($_GPC['op'] == 'edit' && $_GPC['id'] != '') { ?>
		编辑房型
		<?php  } else { ?>
		添加房型
		<?php  } ?>
	</div>
	<div class="panel-body">
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">所属酒店</label>
			<div class="col-sm-9 col-xs-12">
				<input type='hidden' id='hotelid' name='hotelid' value="<?php  echo $hotel['id'];?>" />
				<div class='input-group'>
					<input type="text" name="hotel" maxlength="30" value="<?php  echo $hotel['title'];?>" id="hotel" class="form-control" readonly />
					<div class='input-group-btn'>
						<button class="btn btn-default" type="button" onclick="popwin = $('#modal-module-menus').modal();">选择酒店</button>
					</div>
				</div>
				<div id="modal-module-menus"  class="modal fade" tabindex="-1">
					<div class="modal-dialog" style='width: 920px;'>
						<div class="modal-content">
							<div class="modal-header"><button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button><h3>选择酒店</h3></div>
							<div class="modal-body" >
								<div class="row">
									<div class="input-group">
										<input type="text" class="form-control" name="keyword" value="" id="search-kwd" placeholder="请输入酒店名称" />
										<span class='input-group-btn'><button type="button" class="btn btn-default" onclick="search_hotels();">搜索</button></span>
									</div>
								</div>
								<div id="module-menus" style="padding-top:5px;"></div>
							</div>
							<div class="modal-footer"><a href="#" class="btn btn-default" data-dismiss="modal" aria-hidden="true">关闭</a></div>
						</div>

					</div>
				</div>

			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">房型</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="title" id="title" value="<?php  echo $item['title'];?>" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">早餐设置</label>
			<div class="col-sm-9 col-xs-12">
				<label class="radio-inline">
					<input type="radio" value="0" class="change_breakfast" name="breakfast" <?php  if($item['breakfast']==0 || empty($item['breakfast'])) { ?>checked<?php  } ?>/> 无早
				</label>
				<label class="radio-inline">
					<input type="radio" value="1" class="change_breakfast" name="breakfast" <?php  if($item['breakfast']==1) { ?>checked<?php  } ?>/> 单早
				</label>
				<label class="radio-inline">
					<input type="radio" value="2" class="change_breakfast" name="breakfast" <?php  if($item['breakfast']==2) { ?>checked<?php  } ?>/> 双早
				</label>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">前台价(原价)</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="oprice" id="oprice" value="<?php  echo $item['oprice'];?>" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">优惠价(现价)</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="cprice" id="cprice" value="<?php  echo $item['cprice'];?>" class="form-control">
			</div>
		</div>
		<div class="form-group">
			<?php  if($card_status == 1) { ?>
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">会员价</label>
			<?php  if(is_array($usergroup_list)) { foreach($usergroup_list as $group) { ?>
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><?php  echo $group['title'];?></span>
					<input type="text" name="mprice[<?php  echo $group['groupid'];?>]"  value="<?php  echo $item['mprice'][$group['groupid']];?>" class="form-control">
				</div>
				<span class="help-block"></span>
			</div>
			<?php  } } ?>
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-9 col-xs-12">
				<span class="help-block">不填写或填写1为不打折。打几折以小数形式填写。例：打一折填写 0.1</span>
			</div>
			<?php  } ?>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">缩略图</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('thumb',$item['thumb'])?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">房型图片</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_multi_image('thumbs',$piclist)?>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">房间参数</label>
			<div class="col-sm-4">
				<div class="input-group">
                <span class="input-group-addon">
                    <label class='checkbox-inline' style='margin-top:-5px;' > <input type='checkbox' id='area_show' name="area_show" value="1" <?php  if($item['area_show']==1) { ?>checked<?php  } ?> /> 房间面积</label></span>
					<input type="text" name="area" id="area" class="form-control" value="<?php  echo $item['area'];?>" />
					<span class="input-group-addon">平方米</span>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="input-group">
                <span class="input-group-addon">
                    <label class='checkbox-inline' style='margin-top:-5px;' > <input type='checkbox' id='floor_show' name="floor_show" value="1" <?php  if($item['floor_show']==1) { ?>checked<?php  } ?>/> 楼层</label></span>
					<input type="text" name="floor" id="floor" class="form-control" value="<?php  echo $item['floor'];?>" />
					<span class="input-group-addon">楼</span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-4">
				<div class="input-group">
                <span class="input-group-addon">
                    <label class='checkbox-inline' style='margin-top:-5px;' > <input type='checkbox' id='bed_show' name="bed_show" value="1"  <?php  if($item['bed_show']==1) { ?>checked<?php  } ?>/> 床位</label></span>
					<input type="text" name="bed" id="bed" class="form-control" value="<?php  echo $item['bed'];?>" />
					<span class="input-group-addon">例如: 2米大床</span>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="input-group">
                <span class="input-group-addon">
                    <label class='checkbox-inline ' style='margin-top:-5px;' > <input type='checkbox' id='bedadd_show' name="bedadd_show" value="1" <?php  if($item['bedadd_show']==1) { ?>checked<?php  } ?>/> 是否可加床</label></span>
					<input type="text" name="bedadd" id="bedadd" class="form-control" value="<?php  echo $item['bedadd'];?>" placeholder='加床说明' />

				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
			<div class="col-sm-4">
				<div class="input-group">
                <span class="input-group-addon">
                    <label class='checkbox-inline' style='margin-top:-5px;' > <input type='checkbox' id='smoke_show' name="smoke_show" value="1" <?php  if($item['smoke_show']==1) { ?>checked<?php  } ?>/> 无烟房</label></span>
					<input type="text" name="smoke" id="smoke" class="form-control" value="<?php  echo $item['smoke'];?>" />
					<span class="input-group-addon">无烟房说明</span>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="input-group">
                <span class="input-group-addon">
                    <label class='checkbox-inline' style='margin-top:-5px;' > <input type='checkbox' id='persons_show' name="persons_show" value="1" <?php  if($item['persons_show']==1) { ?>checked<?php  } ?>/> 入住人数</label></span>
					<input type="text" name="persons" id="persons" class="form-control" value="<?php  echo $item['persons'];?>" />
					<span class="input-group-addon">人</span>
				</div>
			</div>
		</div>
		<?php  if($card_status == 1) { ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">订房积分</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" name="score" id="score" class="form-control" value="<?php  echo $item['score'];?>" placeholder='此积分为该酒店订房为会员订房时赠送的积分' />
			</div>
		</div>
		<?php  } ?>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">促销信息</label>
			<div class="col-sm-9 col-xs-12">
				<textarea style="height:100px;" id="sales" class="form-control" name="sales" cols="70" id="reply-add-text"><?php  echo $item['sales'];?></textarea>
				<span class="help-block">房间的促销信息（选填）</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">其他说明</label>
			<div class="col-sm-9 col-xs-12">
				<textarea style="height:100px;" id="device" class="form-control" name="device" cols="70" id="reply-add-text1"><?php  echo $item['device'];?></textarea>
				<span class="help-block">房间的特别说明（选填）</span>
			</div>
		</div>
		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
			<div class="col-sm-9 col-xs-12">
				<label class="radio-inline">
					<input type="radio" name="status" value="1" <?php  if($item['status'] == 1) { ?>checked<?php  } ?>/>显示
				</label>
				<label class="radio-inline">
					<input type="radio" name="status" value="0" <?php  if($item['status'] == 0) { ?>checked<?php  } ?>/>隐藏
				</label>
				<span class='help-block'>手机前台是否显示</span>
			</div>
		</div>
	</div>
</div>
<div class="form-group col-sm-12">
	<input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />
	<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
</div>

</form>

<script type="text/javascript">
	// kindeditor($('.richtext-clone'));

	function search_hotels() {
		$("#module-menus").html("正在搜索....")
		$.post('<?php  echo $this->createWebUrl('hotel',array('op'=>'query'));?>', {
			keyword: $.trim($('#search-kwd').val()),
			industry: $.trim($("#industry").val()),
			nature: $.trim($("#nature").val()),
			scale: $.trim($("#scale").val())
		}, function(dat){
			$('#module-menus').html(dat);
		});
	}
	function select_hotel(o) {
		$("#hotelid").val(o.id);
		$("#hotel").val( o.title );
		$(".close").click();
	}

	function formcheck() {
		if ($("#hotel").isEmpty()) {
			Tip.focus("hotel", "请选择所属酒店!", "right");
			return false;
		}
		if ($("#title").isEmpty()) {
			Tip.focus("title", "请填写房型名称!", "right");
			return false;
		}
		return true;
	}
	$(function(){

		$('.change_breakfast').click(function() {
			var value = $(this).val();
			var name = $("#title").val();
			var new_name = name.replace(/\[含早\]/g,'');

			if (value == 0) {
				$("#title").val(new_name);
			} else  {
				$("#title").val(new_name + "[含早]");
			}
		});
	});

</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
