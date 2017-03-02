<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('mc/header', TEMPLATE_INCLUDEPATH)) : (include template('mc/header', TEMPLATE_INCLUDEPATH));?>
<style>
.btn.btn-primary{background:#56c6d6; color:#FFF; border:0;}
.nav-tabs{border-bottom:1px solid #56c6d6;}
.nav-tabs>li.active>a, .nav-tabs>li.active>a:hover, .nav-tabs>li.active>a:focus{border:1px solid #56c6d6; border-bottom-color:transparent;}
</style>
<div class="profile clearfix">
	<div class="tabbable">
		<ul class="nav nav-tabs">
			<li class="active"><a href="javascript:;">完善资料</a></li>
			<li><a href="<?php  echo url('mc/profile', array('name' => 'fans', 'uniacid' => $_W['uniacid']))?>#qq.com#wechat_redirect">完整资料</a></li>
		</ul>
		<form action="" method="post" enctype="multipart/form-data">
		<div class="tab-content" style="margin-top:10px;">
			<div class="tab-pane active">
				<div style="padding:0 10px;">
					<div class="alert alert-warning" style="padding:10px">
						<p><span><i class="fa fa-info-circle"></i>&nbsp;&nbsp;</span>当前系统须完善以下资料才能继续操作 <?php  if(!empty($pre)) { ?>- <?php  echo $pre;?><?php  } ?></p>
					</div>
				</div>
				<table class="form-table">
					<?php  if(isset($profile['avatar'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['avatar']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('avatar',$profile['avatar'] );?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['nickname'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['nickname']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('nickname',$profile['nickname'] );?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['realname'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['realname']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('realname',$profile['realname'] );?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['gender'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['gender']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('gender',$profile['gender']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['birthyear'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['birthyear']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('birth',array('year' => $profile['birthyear'],'month' => $profile['birthmonth'],'day' => $profile['birthday']));?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['resideprovince'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['resideprovince']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('reside',array('province' => $profile['resideprovince'],'city' => $profile['residecity'],'district' => $profile['residedist']));?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['address'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['address']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('address',$profile['address']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['mobile'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['mobile']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  if($profile['mobile']) { ?> 
									<input type="text" readonly name="mobile" value="<?php  echo $profile['mobile'];?>" class="form-control">
								<?php  } else { ?>
									<?php  echo tpl_fans_form('mobile',$profile['mobile']);?>
								<?php  } ?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['qq'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['qq']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('qq',$profile['qq']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['email'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['email']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  if($profile['email']) { ?> 
									<input type="text" readonly name="email" value="<?php  echo $profile['email'];?>" class="form-control">
								<?php  } else { ?>
									<?php  echo tpl_fans_form('email',$profile['email']);?>
								<?php  } ?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['telephone'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['telephone']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('telephone',$profile['telephone']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['msn'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['msn']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('msn',$profile['msn']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['taobao'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['taobao']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('taobao',$profile['taobao']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['alipay'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['alipay']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('alipay',$profile['alipay']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['studentid'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['studentid']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('studentid',$profile['studentid']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['grade'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['grade']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('grade',$profile['grade']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['graduateschool'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['graduateschool']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('graduateschool',$profile['graduateschool']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['education'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['education']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('education',$profile['education']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['company'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['company']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('company',$profile['company']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['occupation'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['occupation']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('occupation',$profile['occupation']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['position'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['position']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('position',$profile['position']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['revenue'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['revenue']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('revenue',$profile['revenue']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['constellation'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['constellation']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('constellation',$profile['constellation']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['zodiac'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['zodiac']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('zodiac',$profile['zodiac']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['nationality'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['nationality']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('nationality',$profile['nationality']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['height'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['height']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('height',$profile['height']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['weight'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['weight']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('weight',$profile['weight']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['bloodtype'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['bloodtype']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('bloodtype',$profile['bloodtype']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['idcard'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['idcard']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('idcard',$profile['idcard']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['zipcode'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['zipcode']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('zipcode',$profile['zipcode']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['site'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['site']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('site',$profile['site']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['affectivestatus'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['affectivestatus']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('affectivestatus',$profile['affectivestatus']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['lookingfor'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['lookingfor']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('lookingfor',$profile['lookingfor']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['bio'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['bio']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('bio',$profile['bio']);?>
							</div>
						</div>
					<?php  } ?>
					<?php  if(isset($profile['interest'])) { ?>
						<div class="form-group">
							<label class="col-xs-12 col-sm-12 control-label"><?php  echo $system_fields['interest']['title'];?></label>
							<div class="col-sm-12 col-xs-12">
								<?php  echo tpl_fans_form('interest',$profile['interest']);?>
							</div>
						</div>
					<?php  } ?>
				</table>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-12 control-label"></label>
				<div class="col-sm-12 col-xs-12" style="text-align:center">
					<button type="submit" class="btn btn-primary btn-block" name="submit" value="提交">提交</button>
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</div>
			</div>
		</div>
	</form>
	</div>
</div>

<script>
	$(function(){
		$('form').submit(function(){
			var msg = '请认真填写您的';
<?php  if(isset($profile['avatar'])) { ?>
			if($(this).find('input[name="avatart"]').val() == ''){
				util.message(msg+'<?php  echo $titles['avatart'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['nickname'])) { ?>
			if($(this).find('input[name="nickname"]').val() == ''){
				util.message(msg+'<?php  echo $titles['nickname'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['realname'])) { ?>
			if($(this).find('input[name="realname"]').val() == ''){
				util.message(msg+'<?php  echo $titles['realname'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['gender'])) { ?>
			if($(this).find('input[name="gender"]').val() == ''){
				util.message(msg+'<?php  echo $titles['gender'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['birthyear'])) { ?>
			if($(this).find('select[name="birth[year]"]').val() == ''){
				util.message(msg+'<?php  echo $titles['birth'];?>'+"年份");
				return false;
			}
			if($(this).find('select[name="birth[month]"]').val() == ''){
				util.message(msg+'<?php  echo $titles['birth'];?>'+"月份");
				return false;
			}
			if($(this).find('select[name="birth[day]"]').val() == '0'){
				util.message(msg+'<?php  echo $titles['birth'];?>'+"日期");
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['resideprovince'])) { ?>
			if($(this).find('select[name="reside[province]"]').val() == ''){
				util.message(msg+'<?php  echo $titles['reside'];?>'+"省份");
				return false;
			}
			if($(this).find('select[name="reside[city]"]').val() == ''){
				util.message(msg+'<?php  echo $titles['reside'];?>'+"市");
				return false;
			}
			if($(this).find('select[name="reside[district]"]').val() == ''){
				util.message(msg+'<?php  echo $titles['reside'];?>'+"县区");
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['address'])) { ?>
			if($(this).find('input[name="address"]').val() == ''){
				util.message(msg+'<?php  echo $titles['address'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['mobile'])) { ?>
			if($(this).find('input[name="mobile"]').val() == ''){
				util.message(msg+'<?php  echo $titles['mobile'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['qq'])) { ?>
			if($(this).find('input[name="qq"]').val() == ''){
				util.message(msg+'<?php  echo $titles['qq'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['email'])) { ?>
			if($(this).find('input[name="email"]').val() == ''){
				util.message(msg+'<?php  echo $titles['email'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['telephone'])) { ?>
			if($(this).find('input[name="telephone"]').val() == ''){
				util.message(msg+'<?php  echo $titles['telephone'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['msn'])) { ?>
			if($(this).find('input[name="msn"]').val() == ''){
				util.message(msg+'<?php  echo $titles['msn'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['taobao'])) { ?>
			if($(this).find('input[name="taobao"]').val() == ''){
				util.message(msg+'<?php  echo $titles['taobao'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['alipay'])) { ?>
			if($(this).find('input[name="alipay"]').val() == ''){
				util.message(msg+'<?php  echo $titles['alipay'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['studentid'])) { ?>
			if($(this).find('input[name="studentid"]').val() == ''){
				util.message(msg+'<?php  echo $titles['studentid'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['grade'])) { ?>
			if($(this).find('input[name="grade"]').val() == ''){
				util.message(msg+'<?php  echo $titles['grade'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['graduateschool'])) { ?>
			if($(this).find('input[name="graduateschool"]').val() == ''){
				util.message(msg+'<?php  echo $titles['graduateschool'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['education'])) { ?>
			if($(this).find('input[name="education"]').val() == ''){
				util.message(msg+'<?php  echo $titles['education'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['company'])) { ?>
			if($(this).find('input[name="company"]').val() == ''){
				util.message(msg+'<?php  echo $titles['company'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['occupation'])) { ?>
			if($(this).find('input[name="occupation"]').val() == ''){
				util.message(msg+'<?php  echo $titles['occupation'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['position'])) { ?>
			if($(this).find('input[name="position"]').val() == ''){
				util.message(msg+'<?php  echo $titles['position'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['revenue'])) { ?>
			var revenue = parseFloat($(this).find('input[name="revenue"]').val())
			if(isNaN(revenue)){
				util.message(msg+'<?php  echo $titles['revenue'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['constellation'])) { ?>
			if($(this).find('input[name="constellation"]').val() == ''){
				util.message(msg+'<?php  echo $titles['constellation'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['zodiac'])) { ?>
			if($(this).find('input[name="zodiac"]').val() == ''){
				util.message(msg+'<?php  echo $titles['zodiac'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['nationality'])) { ?>
			if($(this).find('input[name="nationality"]').val() == ''){
				util.message(msg+'<?php  echo $titles['nationality'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['height'])) { ?>
			var height = parseFloat($(this).find('input[name="height"]').val())
			if(isNaN(height)){
				util.message(msg+'<?php  echo $titles['height'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['weight'])) { ?>
			var weight = parseFloat($(this).find('input[name="weight"]').val())
			if(isNaN(weight)){
				util.message(msg+'<?php  echo $titles['weight'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['bloodtype'])) { ?>
			if($(this).find('input[name="bloodtype"]').val() == ''){
				util.message(msg+'<?php  echo $titles['bloodtype'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['idcard'])) { ?>
			if(/(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/.test($(this).find('input[name="idcard"]').val()) === false) {
				util.message(msg+'<?php  echo $titles['idcard'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['zipcode'])) { ?>
			if(/^\d{6}$/.test($(this).find('input[name="zipcode"]').val()) === false) {
				util.message(msg+'<?php  echo $titles['zipcode'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['site'])) { ?>
			if($(this).find('input[name="site"]').val() == ''){
				util.message(msg+'<?php  echo $titles['site'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['affectivestatus'])) { ?>
			if($(this).find('input[name="affectivestatus"]').val() == ''){
				util.message(msg+'<?php  echo $titles['affectivestatus'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['lookingfor'])) { ?>
			if($(this).find('input[name="lookingfor"]').val() == ''){
				util.message(msg+'<?php  echo $titles['lookingfor'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['bio'])) { ?>
			if($(this).find('textarea[name="bio"]').val() == ''){
				util.message(msg+'<?php  echo $titles['bio'];?>');
				return false;
			}
<?php  } ?>
<?php  if(isset($profile['interest'])) { ?>
			if($(this).find('textarea[name="interest"]').val() == ''){
				util.message(msg+'<?php  echo $titles['interest'];?>');
				return false;
			}
<?php  } ?>
			return true;
		});
	});
</script>

<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('mc/footer', TEMPLATE_INCLUDEPATH)) : (include template('mc/footer', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
