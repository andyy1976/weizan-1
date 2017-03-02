<?php defined('IN_IA') or exit('Access Denied');?>
<style>
	.red{
		color: red;
	}
</style>
<input type="hidden" name="jid" value="<?php  echo $reply['id'];?>" />

<div class="panel panel-default">
	<div class="panel-heading">
		基本设置
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 活动名称：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="title" class="form-control span7"
					   placeholder="" name="title" value="<?php  echo $reply['title'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>活动开始时间：</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_date('starttime',$reply['starttime'],true)?>
				
			</div>
		</div>



		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>首页相框背景图:</label>

			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('bg',$reply['bg'],'../addons/mon_jgg/images/bg.jpg');?>
				建议宽*高(1274*1424) 不上传为默认
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>活动结束时间：</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_date('endtime',$reply['endtime'],true)?>

			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>每天抽奖次数限制：</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<input type="text" name="day_play_count" id="day_play_count" class="form_time form-control"
						   value="<?php  if($reply['day_play_count']) { ?><?php  echo $reply['day_play_count'];?><?php  } else { ?>1<?php  } ?>">
                                    <span class="input-group-addon">
                                       次/天
                                    </span>
				</div>

			</div>
		</div>



		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>每个用户中奖次数限制：</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<input type="text" name="award_count" id="award_count" class="form_time form-control"
						   value="<?php  if($reply['award_count']) { ?><?php  echo $reply['award_count'];?><?php  } else { ?>0<?php  } ?>">
                                    <span class="input-group-addon">
                                       人/次
                                    </span>


				</div>
				<div class="help-block">限制活动期间每个用户的总的中奖次数</div>
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>每个用户每天中奖次数限制：</label>
			<div class="col-sm-9 col-xs-12">
				<div class="input-group">
					<input type="text" name="day_award_count" id="day_award_count" class="form_time form-control"
						   value="<?php  if($reply['day_award_count']) { ?><?php  echo $reply['day_award_count'];?><?php  } else { ?>0<?php  } ?>">
                                    <span class="input-group-addon">
                                       人/次
                                    </span>


				</div>
				<div class="help-block">限制活动期间每个用户的每天的中奖次数</div>
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>版权：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="copyright" class="form-control span7"
					   placeholder="" name="copyright" value="<?php  echo $reply['copyright'];?>">
				@XX版权所有
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>关注欢迎提示文字：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="follow_welbtn" class="form-control span7"
					   placeholder="" name="follow_welbtn" value="<?php  if(empty($reply['follow_welbtn'])) { ?>欢迎参与微信九宫格抽奖<?php  } else { ?><?php  echo $reply['follow_welbtn'];?><?php  } ?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>关注按钮文字：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="follow_btn" class="form-control span7"
					   placeholder="" name="follow_btn" value="<?php  if(empty($reply['follow_btn'])) { ?>点击参加抽奖活动<?php  } else { ?><?php  echo $reply['follow_btn'];?><?php  } ?>">
			</div>
		</div>





		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>关注图文介绍链接：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="follow_url" class="form-control span7"
					   placeholder="" name="follow_url" value="<?php  echo $reply['follow_url'];?>">
			</div>
		</div>



		<!--<div class="form-group">-->
			<!--<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>参与次数说明：</label>-->
			<!--<div class="col-sm-9 col-xs-12">-->
				<!--<textarea name="join_intro" class="form-control span7 richtext" id="join_intro" cols="70" ><?php  echo $reply['join_intro'];?></textarea>-->
			<!--</div>-->
		<!--</div>-->


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>活动说明：</label>
			<div class="col-sm-9 col-xs-12">
				<textarea name="rule" class="form-control span7 richtext" id="rule" cols="70" ><?php  echo $reply['rule'];?></textarea>
			</div>
		</div>



	</div>

	</div>


	<div class="panel panel-default">
		<div class="panel-heading">
			奖品设置
		</div>
		<div class="panel-body">

			<div class="form-group">
				<label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
				<div class="col-sm-9 col-xs-12">

					<table class="table table-hover">

						<thead>
						<tr>
							<th>奖品级别</th>
							<th>奖品名称</th>
							<th>奖品数量</th>
							<th>中奖概率(概率总和多少，精确度就是多少，如100，精确度1/100)</th>
							<th>奖品图片(大小319*319)</th>
							<th>操作</th>
						</tr>
						</thead>

						<tbody >

							<tr>
								<td>没中奖</td>
								<td><input type="text" name="prize_name_0" class="form-control" value="<?php  if(empty($reply['prize_name_0'])) { ?>谢谢参与<?php  } else { ?><?php  echo $reply['prize_name_0'];?><?php  } ?>"></td>
								<td><input type="text" name="prize_num_0" class="form-control" value="0"></td>

								<td><input type="text" name="prize_p_0" value="<?php  if($reply['prize_p_0']=='') { ?>70<?php  } else { ?><?php  echo $reply['prize_p_0'];?><?php  } ?>" class="form-control"></td>
								<td><div id="img_dv0"><img src="<?php  if(empty($reply['prize_img_0'])) { ?><?php  echo $this->p_img(0);?><?php  } else { ?><?php  echo $_W['attachurl'];?><?php  echo $reply['prize_img_0'];?><?php  } ?>" style="max-width: 80px; max-height: 80px;"><input name="prize_img_0" type="hidden" value="<?php  echo $reply['prize_img_0'];?>" /></div></td>
								<td><span id="up_0" class="btn btn-primary"><i class="fa fa-plus"></i>上传图片</span></td>
							</tr>

							<tr>
								<td><input type="text" name="prize_level_1" class="form-control" value="<?php  if(empty($reply['prize_level_1'])) { ?>一等奖<?php  } else { ?><?php  echo $reply['prize_level_1'];?><?php  } ?>"></td>
								<td><input type="text" name="prize_name_1" value="<?php  if(empty($reply['prize_name_1'])) { ?>笔记本电脑<?php  } else { ?><?php  echo $reply['prize_name_1'];?><?php  } ?>" class="form-control"></td>
								<td><input type="text" name="prize_num_1" class="form-control" value="<?php  echo $reply['prize_num_1'];?>"></td>
								<td><input type="text" value="<?php  if($reply['prize_p_1']=='') { ?>1<?php  } else { ?><?php  echo $reply['prize_p_1'];?><?php  } ?>"  name="prize_p_1" class="form-control"></td>
								<td><div id="img_dv1"><img src="<?php  if(empty($reply['prize_img_1'])) { ?><?php  echo $this->p_img(1);?><?php  } else { ?><?php  echo $_W['attachurl'];?><?php  echo $reply['prize_img_1'];?><?php  } ?>" style="max-width: 80px; max-height: 80px;"><input name="prize_img_1" type="hidden" value="<?php  echo $reply['prize_img_1'];?>" /></div></td>
								<td><span id="up_1" class="btn btn-primary"><i class="fa fa-plus"></i>上传图片</span></td>
							</tr>


							<tr>
								<td><input type="text"  name="prize_level_2" class="form-control" value="<?php  if(empty($reply['prize_level_2'])) { ?>二等奖<?php  } else { ?><?php  echo $reply['prize_level_2'];?><?php  } ?>"></td>
								<td><input type="text" name="prize_name_2" value="<?php  if(empty($reply['prize_name_2'])) { ?>iphone6<?php  } else { ?><?php  echo $reply['prize_name_2'];?><?php  } ?>" class="form-control"></td>
								<td><input type="text" name="prize_num_2" class="form-control" value="<?php  echo $reply['prize_num_2'];?>"></td>
								<td><input type="text" value="<?php  if($reply['prize_p_2']=='') { ?>2<?php  } else { ?><?php  echo $reply['prize_p_2'];?><?php  } ?>"  name="prize_p_2" class="form-control"></td>
								<td><div id="img_dv2"><img src="<?php  if(empty($reply['prize_img_2'])) { ?><?php  echo $this->p_img(2);?><?php  } else { ?><?php  echo $_W['attachurl'];?><?php  echo $reply['prize_img_2'];?><?php  } ?>" style="max-width: 80px; max-height: 80px;"><input name="prize_img_2" type="hidden" value="<?php  echo $reply['prize_img_2'];?>" /></div></td>
								<td><span id="up_2" class="btn btn-primary"><i class="fa fa-plus"></i>上传图片</span></td>
							</tr>


							<tr>
								<td><input type="text"  name="prize_level_3" class="form-control" value="<?php  if(empty($reply['prize_level_3'])) { ?>三等奖<?php  } else { ?><?php  echo $reply['prize_level_3'];?><?php  } ?>"></td>
								<td><input type="text" name="prize_name_3" value="<?php  if(empty($reply['prize_name_3'])) { ?>智能手表<?php  } else { ?><?php  echo $reply['prize_name_3'];?><?php  } ?>" class="form-control"></td>
								<td><input type="text" name="prize_num_3" class="form-control" value="<?php  echo $reply['prize_num_3'];?>"></td>
								<td><input type="text" value="<?php  if($reply['prize_p_3']=='') { ?>3<?php  } else { ?><?php  echo $reply['prize_p_3'];?><?php  } ?>"  name="prize_p_3" class="form-control"></td>
								<td><div id="img_dv3"><img src="<?php  if(empty($reply['prize_img_3'])) { ?><?php  echo $this->p_img(3);?><?php  } else { ?><?php  echo $_W['attachurl'];?><?php  echo $reply['prize_img_3'];?><?php  } ?>" style="max-width: 80px; max-height: 80px;"><input name="prize_img_3" type="hidden" value="<?php  echo $reply['prize_img_3'];?>" /></div></td>
								<td><span id="up_3" class="btn btn-primary"><i class="fa fa-plus"></i>上传图片</span></td>
							</tr>


							<tr>
								<td><input type="text"  name="prize_level_4" class="form-control" value="<?php  if(empty($reply['prize_level_4'])) { ?>四等奖<?php  } else { ?><?php  echo $reply['prize_level_4'];?><?php  } ?>"></td>
								<td><input type="text" name="prize_name_4" value="<?php  if(empty($reply['prize_name_4'])) { ?>平板电脑<?php  } else { ?><?php  echo $reply['prize_name_4'];?><?php  } ?>" class="form-control"></td>
								<td><input type="text" name="prize_num_4" class="form-control" value="<?php  echo $reply['prize_num_4'];?>"></td>
								<td><input type="text" value="<?php  if($reply['prize_p_4']=='') { ?>4<?php  } else { ?><?php  echo $reply['prize_p_4'];?><?php  } ?>"  name="prize_p_4" class="form-control"></td>
								<td><div id="img_dv4"><img src="<?php  if(empty($reply['prize_img_4'])) { ?><?php  echo $this->p_img(4);?><?php  } else { ?><?php  echo $_W['attachurl'];?><?php  echo $reply['prize_img_4'];?><?php  } ?>" style="max-width: 80px; max-height: 80px;"><input name="prize_img_4" type="hidden" value="<?php  echo $reply['prize_img_4'];?>" /></div></td>
								<td><span id="up_4" class="btn btn-primary"><i class="fa fa-plus"></i>上传图片</span></td>
							</tr>

							<tr>
								<td><input type="text"  name="prize_level_5" class="form-control" value="<?php  if(empty($reply['prize_level_5'])) { ?>五等奖<?php  } else { ?><?php  echo $reply['prize_level_5'];?><?php  } ?>"></td>
								<td><input type="text" name="prize_name_5"  class="form-control" value="<?php  if(empty($reply['prize_name_5'])) { ?>手机<?php  } else { ?><?php  echo $reply['prize_name_5'];?><?php  } ?>"></td>
								<td><input type="text" name="prize_num_5" class="form-control" value="<?php  echo $reply['prize_num_5'];?>"></td>
								<td><input type="text" value="<?php  if($reply['prize_p_5']=='') { ?>5<?php  } else { ?><?php  echo $reply['prize_p_5'];?><?php  } ?>" class="form-control"  name="prize_p_5"></td>
								<td><div id="img_dv5"><img src="<?php  if(empty($reply['prize_img_5'])) { ?><?php  echo $this->p_img(5);?><?php  } else { ?><?php  echo $_W['attachurl'];?><?php  echo $reply['prize_img_5'];?><?php  } ?>" style="max-width: 80px; max-height: 80px;"><input name="prize_img_5" type="hidden" value="<?php  echo $reply['prize_img_5'];?>" /></div></td>
								<td><span id="up_5" class="btn btn-primary"><i class="fa fa-plus"></i>上传图片</span></td>
							</tr>

							<tr>
								<td><input type="text"  name="prize_level_6" class="form-control" value="<?php  if(empty($reply['prize_level_6'])) { ?>六等奖<?php  } else { ?><?php  echo $reply['prize_level_6'];?><?php  } ?>"></td>
								<td><input type="text" name="prize_name_6" value="<?php  if(empty($reply['prize_name_6'])) { ?>500金币<?php  } else { ?><?php  echo $reply['prize_name_6'];?><?php  } ?>" class="form-control"></td>
								<td><input type="text" name="prize_num_6" class="form-control" value="<?php  echo $reply['prize_num_6'];?>"></td>
								<td><input type="text" value="<?php  if($reply['prize_p_6']=='') { ?>6<?php  } else { ?><?php  echo $reply['prize_p_6'];?><?php  } ?>" class="form-control"  name="prize_p_6"></td>
								<td><div id="img_dv6"><img src="<?php  if(empty($reply['prize_img_6'])) { ?><?php  echo $this->p_img(6);?><?php  } else { ?><?php  echo $_W['attachurl'];?><?php  echo $reply['prize_img_6'];?><?php  } ?>" style="max-width: 80px; max-height: 80px;"><input name="prize_img_6" type="hidden" value="<?php  echo $reply['prize_img_6'];?>" /></div></td>
								<td><span id="up_6" class="btn btn-primary"><i class="fa fa-plus"></i>上传图片</span></td>
							</tr>
							<tr>
								<td><input type="text"  name="prize_level_7" class="form-control" value="<?php  if(empty($reply['prize_level_7'])) { ?>七等奖<?php  } else { ?><?php  echo $reply['prize_level_7'];?><?php  } ?>"></td>
								<td><input type="text" name="prize_name_7" value="<?php  if(empty($reply['prize_name_7'])) { ?>200金币<?php  } else { ?><?php  echo $reply['prize_name_7'];?><?php  } ?>" class="form-control"></td>
								<td><input type="text" name="prize_num_7" class="form-control" value="<?php  echo $reply['prize_num_7'];?>"></td>
								<td><input type="text" value="<?php  if($reply['prize_p_7']=='') { ?>9<?php  } else { ?><?php  echo $reply['prize_p_7'];?><?php  } ?>" class="form-control"  name="prize_p_7"></td>
								<td><div id="img_dv7"><img src="<?php  if(empty($reply['prize_img_7'])) { ?><?php  echo $this->p_img(7);?><?php  } else { ?><?php  echo $_W['attachurl'];?><?php  echo $reply['prize_img_7'];?><?php  } ?>" style="max-width: 80px; max-height: 80px;"><input name="prize_img_7" type="hidden" value="<?php  echo $reply['prize_img_7'];?>" /></div></td>
								<td><span id="up_7" class="btn btn-primary"><i class="fa fa-plus"></i>上传图片</span></td>
							</tr>


						</tbody>

					</table>


				</div>
			</div>
			</div>

		</div>




<div class="panel panel-default">
	<div class="panel-heading">
		图文设置
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文标题：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="new_title" class="form-control span7" placeholder="" name="new_title" value="<?php  echo $reply['new_title'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享 图标：</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('new_icon',$reply['new_icon']);?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文描述：</label>
			<div class="col-sm-9 col-xs-12">
			<textarea style="height: 60px;" name="new_content"
					  class="form-control span7" cols="60"><?php  echo $reply['new_content'];?></textarea>
			</div>
		</div>


		</div>
	</div>



<div class="panel panel-default">
	<div class="panel-heading">
		 分享设置
	</div>
	<div class="panel-body">

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享标题：</label>
			<div class="col-sm-9 col-xs-12">
				<input type="text" id="share_title" class="form-control span7" placeholder="" name="share_title" value="<?php  echo $reply['share_title'];?>">
			</div>
		</div>


		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享图标：</label>
			<div class="col-sm-9 col-xs-12">
				<?php  echo tpl_form_field_image('share_icon',$reply['share_icon']);?>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享描述：</label>
			<div class="col-sm-9 col-xs-12">
			<textarea style="height: 60px;" name="share_content"
					  class="form-control span7" cols="60"><?php  echo $reply['share_content'];?></textarea>
			</div>
		</div>


	</div>
</div>







<script>


	require(['jquery', 'util'], function($, u){
		$(function(){
			u.editor($('#rule')[0]);
			//u.editor($('#join_intro')[0]);
		});
	});

</script>





	<script type="text/javascript">
	require(['jquery', 'util'], function($, util){
		$(function(){
			// 对象绑定点击事件
			$("#up_0").click(function(){
				util.image('',function(data){
					$('#img_dv0').html('<img src="'+data['url']+'" style="max-width: 80px; max-height: 80px;"><input name="prize_img_0" type="hidden" value="'+data['filename']+'" />');
				});
			});


			$("#up_1").click(function(){
				util.image('',function(data){
					$('#img_dv1').html('<img src="'+data['url']+'" style="max-width: 80px; max-height: 80px;"><input name="prize_img_1" type="hidden" value="'+data['filename']+'" />');
				});
			});


			$("#up_2").click(function(){
				util.image('',function(data){
					$('#img_dv2').html('<img src="'+data['url']+'" style="max-width: 80px; max-height: 80px;"><input name="prize_img_2" type="hidden" value="'+data['filename']+'" />');
				});
			});

			$("#up_3").click(function(){
				util.image('',function(data){
					$('#img_dv3').html('<img src="'+data['url']+'" style="max-width: 80px; max-height: 80px;"><input name="prize_img_3" type="hidden" value="'+data['filename']+'" />');
				});
			});


			$("#up_4").click(function(){
				util.image('',function(data){
					$('#img_dv4').html('<img src="'+data['url']+'" style="max-width: 80px; max-height: 80px;"><input name="prize_img_4" type="hidden" value="'+data['filename']+'" />');
				});
			});

			$("#up_5").click(function(){
				util.image('',function(data){
					$('#img_dv5').html('<img src="'+data['url']+'" style="max-width: 80px; max-height: 80px;"><input name="prize_img_5" type="hidden" value="'+data['filename']+'" />');
				});
			});

			$("#up_6").click(function(){
				util.image('',function(data){
					$('#img_dv6').html('<img src="'+data['url']+'" style="max-width: 80px; max-height: 80px;"><input name="prize_img_6" type="hidden" value="'+data['filename']+'" />');
				});
			});

			$("#up_7").click(function(){
				util.image('',function(data){
					$('#img_dv7').html('<img src="'+data['url']+'" style="max-width: 80px; max-height: 80px;"><input name="prize_img_7" type="hidden" value="'+data['filename']+'" />');
				});
			});




		});
	});
</script>



