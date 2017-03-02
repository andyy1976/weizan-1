<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
.table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
  white-space: inherit;
  overflow: hidden;
  text-overflow: clip;
}
#function ul li {list-style: none;width: 33%; float: left;    text-align: center; padding: 10px;}
#function ul li a{padding: 35px; font-size: 18px;}
#function .modal-header{border-bottom: 0;}
</style>

	
    <div class="main">
		<div class="panel panel-default">
		<div class="panel-heading">	
			<div class="row-fluid">
				<div class="span8 control-group">
					<a class="btn btn-primary" href="<?php  echo url('platform/reply/post',array('m'=>'fm_photosvote'));?>"><i class="fa fa-edit"></i> 添加活动</a>
				</div>
			</div>
		</div>
		
		
		<div class="panel-body table-responsive">
		<table class="table table-hover">
			<thead class="navbar-inner">
				<tr>
					<th style="width:80px;" class="row-first">活动ID</th>					
					<th style="width:200px;" class="row-first">活动名称</th>					
					<th style="width:100px;" class="row-first">活动链接</th>					
					<th style="width:100px;" class="row-first">活动数据</th>	
					<th style="width:60px;" class="row-first">状态</th>
					<th style="width:150px;">活动时间<i></i></th>
					<th class="row-first" style="width:230px;">管理</th>
					<th class="row-first"  style="width:150px;"><?php  if($r['uniacid'] == $uniacid) { ?>操作<?php  } else { ?>主账号<?php  } ?></th>
				</tr>
			</thead>
			<tbody>
				<?php  if(is_array($fm_list)) { foreach($fm_list as $row) { ?>
				<tr >
					<td class="row-first"><?php  echo $row['rid'];?></td>
					<td class="row-first" style="  word-wrap: break-word;"><a href="<?php  echo $this->createWebUrl('members', array('rid' => $row['rid']))?>"  data-toggle="tooltip" data-placement="top" title="<?php  echo $row['title'];?>"><?php  echo cutstr($row['title'],'120')?></a></td>
					<td class="row-first row-hover" style="  word-wrap: break-word;"><a class="btn btn-default" href="javascript:;"  data-toggle="tooltip" data-placement="top" title="活动链接" onclick="hdurl('<?php  echo $row['rid'];?>');">活动链接</a></td>
					<td class="row-first row-hover" style="  word-wrap: break-word;"><a class="btn btn-default" href="javascript:;"  data-toggle="tooltip" data-placement="top" title="活动数据" onclick="sj('<?php  echo $row['rid'];?>', '<?php  echo $row['user_ysh'];?>', '<?php  echo $row['user_wsh'];?>' ,'<?php  echo $row['user_tprc'];?>' ,'<?php  echo $row['user_cyrs'];?>' , '<?php  echo $row['user_share'];?>' , '<?php  echo $row['user_hits'];?>', '<?php  echo $row['user_qxps'];?>');">活动数据</a></td>
					<td class="row-first"><?php  if($row['status'] == 1) { ?><span class="label label-info">开启</span><?php  } else { ?><span class="label label-danger">暂停</span><?php  } ?></td>
					<td><?php  echo date('Y-m-d H:i', $row['start_time']);?></br><?php  echo date('Y-m-d H:i', $row['end_time']);?></td>
					<td class="row-first" style="    overflow: inherit;">
					<?php  if($row['uniacid'] == $uniacid) { ?>
						<button type="button" class="btn btn-primary"  title="模板选择" data-toggle="modal" data-target="#ListStyle" onclick="$('#stylerid').val(<?php  echo $row['rid'];?>);$('#ctm_<?php  if(empty($row['templates'])) { ?>default<?php  } else { ?><?php  echo $row['templates'];?><?php  } ?>').addClass('active');$('.ctm_moban').text('模板风格列表【当前默认模板：<?php  if(empty($row['templates'])) { ?>default<?php  } else { ?><?php  echo $row['templates'];?><?php  } ?>】');"><i class="fa fa-paper-plane"></i>模板选择</button>
						<div class="dropdown btn  btn-default btn-danger  btn-sm manage"  data-toggle="tooltip" data-placement="top" title="选择底部导航">
							<a href="javascript:;" id="limitsd_<?php  echo $row['rid'];?>" class="dropdown-toggle " data-toggle="dropdown" style="display:block; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; color:#fff; " aria-expanded="true"><i class="fa fa-paper-plane"></i> <?php  if(empty($row['menuid'])) { ?>底部导航<?php  } else { ?><?php  echo cutstr($this->GetMenuname($row['menuid']), '4')?><?php  } ?> <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<?php  if(is_array($menus)) { foreach($menus as $menu) { ?>
								<li><a data="<?php  echo $menu['id'];?>" href="javascript:;" <?php  if($row['menuid'] == $menu['id']) { ?> class="label label-info" style="color:#fff" <?php  } ?> onclick="setProperty(this,<?php  echo $row['rid'];?>,'menu')"><i class="fa fa-paper-plane"></i> <?php  echo $menu['menuname'];?></a></li>
							<?php  } } ?>
								<li role="separator" class="divider"></li>
								<li><a href="<?php  echo $this->createWebUrl('templates', array('op' => 'menu','rid' => $rid))?>" ><i class="fa fa-paper-plane"></i> 添加新的底部导航</a></li>
								<li><a data="0" href="javascript:;"  onclick="setProperty(this,<?php  echo $row['rid'];?>,'menu')"><i class="fa fa-paper-plane"></i> 取消自定义底部导航</a></li>
								
							</ul>
						</div>
					<?php  } ?>
						<a href="<?php  echo $this->createWebUrl('members', array('rid' => $row['rid']))?>" class="btn  btn-default" data-toggle="tooltip" data-placement="top"  title="活动数据管理"><i class="fa fa-users"></i>活动管理</a>
					</td>
					<td>
						<?php  if($row['uniacid'] == $uniacid) { ?>
							<!--<a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="<?php  echo url('platform/reply/post',array('m'=>'fm_photosvote','rid'=>$row['rid']));?>" title="编辑"><i class="fa fa-edit"></i></a>-->
							<a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="javascript:;" title="功能管理" onclick="getfunction('<?php  echo $row['rid'];?>');"><i class="fa fa-edit"></i></a>
							<?php  if($row['status']==0) { ?>
								<a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="#" onclick="drop_confirm('您确定要开始吗，设置中途可以随时修改', '<?php  echo $this->createWebUrl('status', array('status' => '1', 'rid' => $row['rid']))?>');" title="开始活动" ><i class="fa fa-play"></i></a>
							<?php  } else if($row['status']==1) { ?>
								<a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="#" onclick="drop_confirm('您确定要暂停吗，设置中途可以随时修改', '<?php  echo $this->createWebUrl('status', array('status' => '0', 'rid' => $row['rid']))?>');" title="暂停活动" ><i class="fa fa-stop"></i></a>
							<?php  } ?>
							<?php  if($_W['role']=='founder') { ?><a class="btn btn-default" data-toggle="tooltip" data-placement="top" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('delete',array('rid'=>$row['rid'], 'id'=>$row['id']))?>');" title="删除"><i class="fa fa-times"></i></a><?php  } ?>
						<?php  } else { ?>
							<?php  $acc  = account_fetch($row['uniacid'])?>
							<a class="btn btn-success" data-toggle="tooltip" data-placement="top" title="请在主公众号 <?php  echo $acc['name'];?> 里面进行编辑活动"><i class="fa fa-star"></i><?php  echo $acc['name'];?></a>
						<?php  } ?>
                  	</td>
				</tr>
				<?php  } } ?>
			</tbody>
		</table>
	</div>
	</div>
	<?php  echo $pager;?>

    </div>
<!-- 风格列表 -->
<input type="hidden" name="rid" id="stylerid" value="" />

<style>
	.template .item{position:relative;display:block;float:left;border:1px #ddd solid;border-radius:5px;background-color:#fff;padding:5px;width:190px;margin:0 20px 20px 0; overflow:hidden;}
	.template .title{margin:5px auto;line-height:2em;}
	.template .title a{text-decoration:none;}
	.template .item img{width:178px;height:270px; cursor:pointer;}
	.template .active.item-style img, .template .item-style:hover img{width:178px;height:270px;border:3px #009cd6 solid;padding:1px; }
	.template .title .fa{display:none}
	.template .active .fa.fa-check{display:inline-block;position:absolute;bottom:33px;right:6px;color:#FFF;background:#009CD6;padding:5px;font-size:14px;border-radius:0 0 6px 0;}
	.template .fa.fa-times{cursor:pointer;display:inline-block;position:absolute;top:10px;right:6px;color:#D9534F;background:#ffffff;padding:5px;font-size:14px;text-decoration:none;}
	.template .fa.fa-times:hover{color:red;}
	.template .item-bg{width:100%; height:342px; background:#000; position:absolute; z-index:1; opacity:0.5; margin:-5px 0 0 -5px;}
	.template .item-build-div1{position:absolute; z-index:2; margin:-5px 10px 0 5px; width:168px;}
	.template .item-build-div2{text-align:center; line-height:30px; padding-top:150px;}
	@media screen and (min-width:992px){#ListStyle{width:890px; margin:100px auto;}}
</style>
<div class="modal fade" id="ListStyle" aria-hidden="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
			<h4 class="modal-title ctm_moban">模板风格列表(当前默认模板： )</h4>
		</div>
		<div class="modal-body template clearfix" style="width:100%;float:none;">
			<?php  if(is_array($styles)) { foreach($styles as $si => $style) { ?>
				<div id="ctm_<?php  echo $style['name'];?>" class="item item-style">
						<div class="title">
							<div style="overflow:hidden; height:28px;" id="styleid"><?php  echo $style['title'];?> (<?php  echo $style['name'];?>)</div>
								<a href="javascript:;" onclick="ctemplatespost('<?php  echo $style['name'];?>');">
								<img src="<?php  if(!empty($style['thumb'])) { ?><?php  echo toimage($style['thumb'])?><?php  } else { ?>../addons/fm_photosvote/template/mobile/templates/<?php  echo $style['name'];?>/preview.jpg<?php  } ?>" class="img-rounded">
								</a>
							<span class="fa fa-check"></span>
						</div>
						<div class="btn-group  btn-group-justified">
							<a href="javascript:;" onclick="ctemplatespost('<?php  echo $style['name'];?>');" class="btn btn-default btn-xs" >设置为默认模板</a>
						</div>
				</div>
			<?php  } } ?>
		</div>
			<div class="modal-footer">
				<!--<input type="submit" name="tijiao" id="tijiao" class="btn btn-success" value="开始上传">-->
				<button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
			</div>
	</div>
</div>		
<div class="modal fade" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="  margin-top: 60px;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">活动数据</h4>
			</div>
			<style>.modal-body {width: 50%;float: left;  border-bottom: 1px solid #F1F3F5;border-right: 1px solid #F1F3F5;}</style>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-5 control-label">已审核人数</label>
					<div class="col-sm-3 col-xs-5">
						<a  href="javascript:;"  target="_blank" class="label label-success user_ysh"></a>	
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-5 control-label">未审核人数</label>
					<div class="col-sm-3 col-xs-5">
						<a  href="javascript:;"  target="_blank" class="label label-success user_wsh"></a>	
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-5 control-label">投票总数</label>
					<div class="col-sm-3 col-xs-5">
						<a href="javascript:;" target="_blank" class="label label-success user_tprc"></a>	
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-5 control-label">无效票数</label>
					<div class="col-sm-3 col-xs-5">
						<a href="javascript:;" target="_blank" class="label label-success user_qxps"></a>	
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-5 control-label">参与总数</label>
					<div class="col-sm-3 col-xs-5">
						<span class="label label-success user_cyrs"></span>	
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-5 control-label">分享总数</label>
					<div class="col-sm-3 col-xs-5">
						<span class="label label-success user_share"></span>	
					</div>
				</div>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-5 control-label">点击总数</label>
					<div class="col-sm-3 col-xs-5">
						<span class="label label-success user_hits"></span>	
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!--<input type="submit" name="tijiao" id="tijiao" class="btn btn-success" value="开始上传">-->
				<button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
			</div>
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->			

<div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="  margin-top: 60px;">
	<div class="modal-dialog" style="  width: 800px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">活动链接</h4>
			</div>
			<style>.modal-body { border-bottom: 1px solid #F1F3F5;}</style>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">活动首页链接</label>
					<div class="col-sm-3 col-xs-5">
						<span id="tpindex" class="label label-success " style="  word-wrap: break-word;"></span>	

					</div>
				</div>
			</div>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">排行榜链接</label>
					<div class="col-sm-3 col-xs-5">
						<span  id="tppaihang" class="label label-success "></span>	
					</div>
				</div>
			</div>
			<div class="modal-body" style="width: 100%;float: none;">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">报名链接</label>
					<div class="col-sm-3 col-xs-5">
						<span  id="tpbaoming" class="label label-success "></span>	
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<!--<input type="submit" name="tijiao" id="tijiao" class="btn btn-success" value="开始上传">-->
				<button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
			</div>
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->	
<div class="modal fade" id="function" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="  margin-top: 60px;">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">功能列表</h4>
			</div>
			<div class="modal-body" style="width: 100%;">
				<ul style="padding: 0 5px 0 15px;">
					<li class="rbasic"></li>
					<li class="rshare"></li>
					<li class="rhuihua"></li>
					<li class="rdisplay"></li>
					<li class="rvote"></li>
					<li class="rbody"></li>
					<li class="rupload"></li>
					<li class="rjifen"></li>
					<li class="rstar"></li>
				</ul>
			</div>
			<div class="modal-footer">
				<!--<input type="submit" name="tijiao" id="tijiao" class="btn btn-success" value="开始上传">-->
				<button type="button" class="btn btn-danger" data-dismiss="modal">关闭</button>
			</div>
			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->	
<script type="text/javascript">
function ctemplatespost(templatesname) {
	var submitData = {
		rid : $('#stylerid').val(),
		templatesname: templatesname,
	};
	$.post("<?php  echo $this->createWebUrl('templates', array('op' => 'default'))?>", submitData, function(data) {
		if (data.success == true) {
			$('#ListStyle').modal('hide');
			setTimeout(function () {								
				window.location.reload();
			},3)
		}else{
			alert(data.msg);
		}
	},"json")
	
	return false;
}
	
				
function sj(rid,user_ysh,user_wsh,user_tprc,user_cyrs,user_share,user_hits,user_qxps){
	 $('#Modal1').modal('toggle');
	 $('.user_ysh').text(user_ysh);
	 $('.user_wsh').text(user_wsh);
	 $('.user_tprc').text(user_tprc);
	 $('.user_cyrs').text(user_cyrs);
	 $('.user_share').text(user_share);
	 $('.user_hits').text(user_hits);
	 $('.user_qxps').text(user_qxps);
}
function hdurl(rid){
	 $('#Modal2').modal('toggle');
	
	 $('#tpindex').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&rid=' + rid + '&do=photosvote&m=fm_photosvote');
	 $('#tppaihang').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&rid=' + rid + '&do=paihang&m=fm_photosvote');
	 $('#tpbaoming').html('<?php  echo $_W['siteroot'];?>app/index.php?i=<?php  echo $_W['uniacid'];?>&j=<?php  echo $_W['uniacid'];?>&c=entry&rid=' + rid + '&do=reg&m=fm_photosvote');
}
function getfunction(rid){
	 $('#function').modal('toggle');
	 $('.rbasic').html('<a href="<?php  echo url('platform/reply/post',array('m'=>'fm_photosvote'));?>&rid='+rid+'" target="_blank" class="btn btn-info"><i class="fa fa-home"></i><p>基本设置</p></a>');
	 $('.rshare').html('<a href="<?php  echo $this->createWebUrl('system', array('op'=>'rshare'))?>&rid='+rid+'" target="_blank" class="btn btn-info"><i class="fa fa-share-square-o"></i><p>关注分享</p></a>');
	 $('.rhuihua').html('<a href="<?php  echo $this->createWebUrl('system', array('op'=>'rhuihua'))?>&rid='+rid+'" target="_blank" class="btn btn-info"><i class="fa fa-wechat"></i><p>会话设置</p></a>');
	 $('.rdisplay').html('<a href="<?php  echo $this->createWebUrl('system', array('op'=>'rdisplay'))?>&rid='+rid+'" target="_blank" class="btn btn-info"><i class="fa fa-desktop"></i><p>显示设置</p></a>');
	 $('.rvote').html('<a href="<?php  echo $this->createWebUrl('system', array('op'=>'rvote'))?>&rid='+rid+'" target="_blank" class="btn btn-info"><i class="fa fa-tencent-weibo"></i><p>投票设置</p></a>');
	 $('.rbody').html('<a href="<?php  echo $this->createWebUrl('system', array('op'=>'rbody'))?>&rid='+rid+'" target="_blank" class="btn btn-info"><i class="fa fa-tablet"></i><p>页面设置</p></a>');
	 $('.rupload').html('<a href="<?php  echo $this->createWebUrl('system', array('op'=>'rupload'))?>&rid='+rid+'" target="_blank" class="btn btn-info"><i class="fa fa-cloud-upload"></i><p>存储设置</p></a>');
	 $('.rjifen').html('<a href="<?php  echo $this->createWebUrl('system', array('op'=>'rjifen'))?>&rid='+rid+'" target="_blank" class="btn btn-info"><i class="fa fa-heart"></i><p>积分奖品</p></a>');
	 $('.rstar').html('<a href="<?php  echo $this->createWebUrl('system', array('op'=>'rstar'))?>&rid='+rid+'" target="_blank" class="btn btn-info"><i class="fa fa-star"></i><p>抢幸运星</p></a>');
}
function setProperty(obj,id,type){
 		if (type == 'limitsd' || type == 'menu') {
 			$("#limitsd_"+id).html($("#limitsd_"+id).html() + "...");
 		}
		$(obj).html($(obj).html() + "...");
		$.post("<?php  echo $this->createWebUrl('settuijian')?>"
			,{id:id,type:type, data: obj.getAttribute("data")}
			,function(d){
				
				if(type=='tuijian'){
					$(obj).html($(obj).html().replace("...",""));
					$(obj).html( d.data=='1'?'<i class="fa fa-star"></i>取消推荐':'<i class="fa fa-star-o"></i>设为推荐');
					$(obj).attr("data",d.data);
					if(d.result==1){
						$(obj).toggleClass("btn-info");
					}
				}
				if(type=='limitsd'){
					$("#limitsd_"+id).html($("#limitsd_"+id).html().replace("...",""));
					$("#limitsd_"+id).html( d.data=='0'?'<i class="fa fa-ban"></i>开始限速':'<i class="fa fa-ban"></i>限速中');

				}
				if(type=='menu'){
					$("#limitsd_"+id).html($("#limitsd_"+id).html().replace("...",""));
					$("#limitsd_"+id).html( d.data=='0'?'<i class="fa fa-paper-plane"></i> 底部导航 <b class="caret"></b>':'<i class="fa fa-paper-plane"></i> ' + d.menuname + ' <b class="caret"></b>');

				}
				
				
			}
			,"json"
		);
	}

require(['bootstrap'],function($){
		$('.btn').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
function drop_confirm(msg, url){
	if(confirm(msg)){
		window.location = url;
	}
}
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/_footer', TEMPLATE_INCLUDEPATH)) : (include template('web/_footer', TEMPLATE_INCLUDEPATH));?>