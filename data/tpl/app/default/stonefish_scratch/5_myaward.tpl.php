<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php  echo $reply['title'];?>奖品情况--<?php  echo $_W['account']['name'];?></title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
<meta name="Description" content="<?php  echo $reply['description'];?>" />
<!-- Mobile Devices Support @begin -->
<meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
<meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
<meta content="no-cache" http-equiv="pragma">
<meta content="0" http-equiv="expires">
<meta content="telephone=no, address=no" name="format-detection">
<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<!-- Mobile Devices Support @end -->
<link href="../addons/stonefish_scratch/template/css/style.css?<?php  echo time()?>" rel="stylesheet" type="text/css" />
<script src="<?php  echo $_W['siteroot'];?>app/resource/js/lib/jquery-1.11.1.min.js?<?php  echo time()?>"></script>
<style>
html{color:<?php  echo $template['textcolor'];?>;}
html{background-image: url(<?php  echo toimage($template['bgimg'])?>);}
html{background-color: <?php  echo $template['bgcolor'];?>;}
body{font-size:<?php  echo $template['fontsize'];?>px; }
a:link, a:visited, a:hover, a:active { color:<?php  echo $template['textcolorlink'];?>; text-decoration:none; } 
.mingdan{background-color:<?php  echo $template['buttoncolor'];?>;}
.biaoti{color:<?php  echo $template['buttontextcolor'];?>;}
.biaoti a{ color:<?php  echo $template['buttontextcolor'];?>;}
.mingdaninfo{background-color:<?php  echo $template['rulecolor'];?>;	border:1px <?php  echo $template['rulecolor'];?> solid ;color:<?php  echo $template['ruletextcolor'];?>;}

/* 排行层CSS */
.rankList {	margin:0px 10px;}
.rankList .ranks {margin-top:10px;color:<?php  echo $template['ruletextcolor'];?>;}
.rankList .ranks .avatar {float: left;width: 40px;height: 40px;	margin: 10px 0 0 0;}
.rankList .ranks .avatar img {display: block;width: 100%;height: 100%;}
.rankList .ranks .name {float: left;margin-left: 5px;}
.rankList .ranks .lihe {margin-left:10px;float: left;margin-top:10px;width:100%;}
.rankList .ranks .price {float: right;margin-right: 10px;}
.rankList .rank_01{height: 60px;margin-bottom: 20px}
.rankList .rank_01 {background: <?php  echo $template['rulecolor'];?>;border-radius: 5px;}
.rankList .rank_01 .avatar{margin: 10px 0 0 10px}
.rankList .rank_01 .name,.rankList .rank_01 .price{line-height: 20px;margin-top:10px;}
/* 排行层CSS */
/* 弹出层CSS */
.panel-box .panel-content{color: <?php  echo $template['watchtextcolor'];?>;	background-color: <?php  echo $template['watchcolor'];?>;}
.panel-box .btn-confirm{background: <?php  echo $template['buttoncolor'];?>;	color: <?php  echo $template['buttontextcolor'];?>;}
/* 弹出层CSS */
/* 兑奖按钮CSS */
.btnduihuan {background: <?php  echo $template['awardcolor'];?>;color: <?php  echo $template['awardtextcolor'];?>;}
.btn_duihuan {background: <?php  echo $template['awardscolor'];?>;color: <?php  echo $template['awardstextcolor'];?>;}
/* 兑奖按钮CSS */
</style>
</head>
<body>
<div>
    <div class="nou">
	    <div style="margin:10px;" class="adpic">
		<?php  if(!empty($reply['adpic'])) { ?><?php  if(!empty($reply['adpicurl'])) { ?><a href="<?php  echo $reply['adpicurl'];?>"><?php  } ?><img id="top_img" style="max-width: 100%;height: auto;width: auto\9;"  src="<?php  echo toimage($reply['adpic'])?>" width="100%" border="0"><?php  if(!empty($reply['adpicurl'])) { ?></a><?php  } ?><?php  } ?>
        </div>
        <div class="zhuan1">
		    <div class="mingdan">
                <h2 class="biaoti">我的奖品</h2>
            </div>
			<?php  if($exchange['beihuo'] && $exchange['awardingstarttime']>time()&& $exchange['awardingtype']==2 && !empty($mylihe)) { ?>
			    <?php  if(!empty($fans['ticketid']) && !empty($fans['ticketname'])) { ?>
				<span class="btnduihuan" style="margin:10px 10px;line-height: 40px;" onclick="beihuo('all','<?php  echo $fans['ticketname'];?>')">修改备货商家</span>
				<?php  } else { ?>
				<span class="btnduihuan" style="margin:10px 10px;line-height: 40px;" onclick="beihuo('all','无')"><?php  echo $exchange['beihuo_tips'];?></span>
				<?php  } ?>
			<?php  } ?>
			<?php  if(!empty($mylihe)) { ?>
            <div class="rankList">
				<?php  if(is_array($mylihe)) { foreach($mylihe as $row) { ?>
			    <div class="ranks rank_01">
                    <div class="avatar"><img src="<?php  echo toimage($row['prizepic'])?>"></div>
                    <div class="name nickname" style="vertical-align: middle;"><?php  echo $row['prizerating'];?>-<?php  echo $row['prizename'];?><br/><?php  if($row['num']) { ?>【未兑X<?php  echo $row['num'];?>】<?php  } ?><?php  if($row['numd']) { ?><span style="color:#999999"> 〖已兑X<?php  echo $row['numd'];?>〗</span><?php  } ?></div>
					<?php  if($row['num'] && $exchange['beihuo'] && $exchange['awardingstarttime']>time() && $exchange['awardingtype']==1) { ?>
					    <?php  if(!empty($row['ticketid']) && !empty($row['ticketname'])) { ?>
					    <div class="price"><span class="btnduihuan" style="width:40px;line-height: 20px;" onclick="beihuo(<?php  echo $row['prizeid'];?>,'<?php  echo $row['ticketname'];?>')">修改<br/>备货</span></div>
						<?php  } else { ?>
						<div class="price"><span class="btnduihuan" style="width:40px;line-height: 20px;" onclick="beihuo(<?php  echo $row['prizeid'];?>,'无')">给我<br/>备货</span></div>
						<?php  } ?>					
					<?php  } ?>
					<?php  if($exchange['awardingstarttime']<=time() && $exchange['awardingendtime']>=time()) { ?>
					<?php  if($exchange['awardingtype']==1) { ?>
					<div class="price">
					<?php  if($exchange['tickettype']==1) { ?>
					<!--展示兑奖统一兑奖显示-->
					<?php  } else if($exchange['tickettype']<4) { ?>
					    <?php  if($row['num']) { ?>
					        <a class="btnduihuan" style="width:40px;line-height: 20px;" onclick="showdiv(<?php  echo $row['prizeid'];?>,<?php  echo $row['ticketid'];?>,'<?php  echo $row['ticketname'];?>')">点击<br>兑换</a>
						<?php  } else { ?>
						    <a class="btn_duihuan" style="width:40px;line-height: 20px;">兑换<br>成功</a>
						<?php  } ?>
					<?php  } else { ?>
					    <?php  if($row['num']) { ?>
					        <a class="btnduihuan" style="width:40px;line-height: 20px;" onclick="showdivpas(<?php  echo $row['prizeid'];?>)">点击<br>兑换</a>
						<?php  } else { ?>
						    <a class="btn_duihuan" style="width:40px;line-height: 20px;">兑换<br>成功</a>
						<?php  } ?>
					<?php  } ?>
					</div>
					<?php  } ?>					
					<?php  } ?>
                </div>
			   <?php  } } ?>
			</div>
			<?php  if($exchange['awardingstarttime']<=time() && $exchange['awardingendtime']>=time()) { ?>
			<?php  if($exchange['awardingtype']==1) { ?>
				    <?php  if($exchange['tickettype']==1) { ?>
					    <?php  if($row['zhongjiang']==1) { ?>
					        <span class="btnduihuan" style="margin:0px 10px;line-height: 40px;">展示兑奖</span>
						<?php  } else if($row['zhongjiang']==2) { ?>
						    <span class="btn_duihuan" style="margin:0px 10px;line-height: 40px;">兑奖成功</span>
						<?php  } ?>
					<?php  } ?>
			<?php  } ?>
			<?php  if($exchange['awardingtype']==2) { ?>
				    <?php  if($exchange['tickettype']==1) { ?>
					    <?php  if($row['zhongjiang']==1) { ?>
					        <span class="btnduihuan" style="margin:0px 10px;line-height: 40px;">展示兑奖</span>
						<?php  } else if($row['zhongjiang']==2) { ?>
						    <span class="btn_duihuan" style="margin:0px 10px;line-height: 40px;">兑奖成功</span>
						<?php  } ?>
					<?php  } else if($exchange['tickettype']<4) { ?>
					    <?php  if($row['zhongjiang']==1) { ?>
					        <a class="btnduihuan" style="margin:0px 10px;line-height: 40px;" onclick="showdiv('all',<?php  echo $row['ticketid'];?>,'<?php  echo $row['ticketname'];?>')">点击兑奖</a>
						<?php  } else if($row['zhongjiang']==2) { ?>
						    <span class="btn_duihuan" style="margin:0px 10px;line-height: 40px;">兑奖成功</span>
						<?php  } ?>
					<?php  } else { ?>
					    <?php  if($row['zhongjiang']==1) { ?>
					        <a class="btnduihuan" style="margin:0px 10px;line-height: 40px;" onclick="showdivpas('all')">点击兑奖</a>
						<?php  } else if($row['zhongjiang']==2) { ?>
						    <span class="btn_duihuan" style="margin:0px 10px;line-height: 40px;">兑奖成功</span>
						<?php  } ?>
					<?php  } ?>
			<?php  } ?>
			<?php  } else { ?>
			    <?php  if($exchange['awardingstarttime']>time()) { ?>
			    <span class="btn_duihuan" style="margin:0px 10px;line-height: 40px;">请于<?php  echo date('Y-m-d H:i',$exchange['awardingstarttime']);?> 至 <?php  echo date('Y-m-d H:i',$exchange['awardingendtime']);?>开始兑奖</span>				
			    <?php  } else { ?>
			    <span class="btn_duihuan" style="margin:0px 10px;line-height: 40px;">兑奖期限已过期，奖品作废！</span>
			    <?php  } ?>
			<?php  } ?>
			<?php  } else { ?>
			<div class="mingdaninfo">
				<div><?php  echo $awardname;?></div>					
            </div>
			<?php  } ?>
			<?php  if($exchange['tickettype']<>3) { ?>
			<?php  if($exchange['awardingaddress']!='') { ?>
			<div class="mingdan" style="margin-top:10px;">
                <a href="<?php  if(!empty($exchange['baidumaplng']) && !empty($exchange['baidumaplat'])) { ?>http://api.map.baidu.com/marker?location=<?php  echo $exchange['baidumaplat'];?>,<?php  echo $exchange['baidumaplng'];?>&title=<?php  echo urlencode('兑奖地点');?>&content=<?php  echo urlencode($exchange['awardingaddress']);?>&output=html<?php  } else { ?>javascript:;<?php  } ?>"><h2 class="biaoti_address"><?php  echo $exchange['awardingaddress'];?></h2></a>
            </div>
			<?php  } ?>
			<?php  if($exchange['awardingtel']!='') { ?>
			<div class="mingdan" style="margin-top:10px;">
                <a href="tel:<?php  echo $exchange['awardingtel'];?>"><h2 class="biaoti_tel"><?php  echo $exchange['awardingtel'];?></h2></a>
            </div>
			<?php  } ?>
			<?php  } ?>
        </div>
    </div>
	<?php  if($exchange['tickettype']>=2) { ?>
	<div class="panel-box" id="panel_box">
        <div class="panel-content" id="panel-content" style="height:280px;">
            <div class="panel-close" id="panel-close"></div>
            <span id="duijiangpng"><img src="../addons/stonefish_bigwheel/template/images/duijiang.png" height="90"></span>
			<?php  if($exchange['tickettype']<4) { ?>
			<div id="result_info" style="display:none">
			<div><span id="ticketname"></span>请输入兑奖密码</div>
			    <hr class="common-hr" />
                <input name="awardid" id="awardid" type="hidden" value="奖品">
				<input name="dianmian" id="dianmian" type="hidden" value="兑奖店面">
				<div style="float: left;width:100%;"><input name="mima" class="px" style="width:100%;" id="mima" type="password" placeholder="请输入兑奖密码"></div>
                <div id="result_info_tip" style=" height:30px;float: left;"></div>
				<div class="btn-layout">
					<input class="btn-confirm" name="确定" id="save-btn" type="button" value="确认兑奖">
                </div>
            </div>
			<?php  } else { ?>
			<div id="result_info" style="display:none">
			<div>请输入兑奖密码</div>
			    <hr class="common-hr" />
                <input name="awardid" id="awardid" type="hidden" value="奖品">
				<div style="float: left;width:100%;"><input name="mima" class="px" style="width:100%;" id="mima" type="password" placeholder="请输入兑奖密码"></div>
                <div id="result_info_tip" style=" height:30px;float: left;"></div>
				<div class="btn-layout">
					<input class="btn-confirm" name="确定" id="save-btn" type="button" value="确认兑奖">
                </div>
            </div>
			<?php  } ?>
			<?php  if($exchange['awardingstarttime']>time()) { ?>
			<div id="result_info_s"  style="display:none">
			<div><?php  echo $exchange['beihuo_tips'];?></div>
			    <hr class="common-hr" />
                <div style="float: left;width:100%;">
				    <input name="award_id" id="award_id" type="hidden" value="奖品ID">
					<select name="input_shangjia" id="input_shangjia" class="px" style="width:100%;">
					    <option value="" selected id="beihuoname">请选择<?php  if($exchange['tickettype']==2) { ?>门店<?php  } else { ?>商家网点<?php  } ?>为我备货</option>
						<?php  if(is_array($shangjia)) { foreach($shangjia as $shangjias) { ?>
						<option value="<?php  echo $shangjias['id'];?>"><?php  echo $shangjias['shangjianame'];?></option>
						<?php  } } ?>
					</select>
				</div>
				<div id="result_info_tip_kehu" style=" height:30px;float: left;"></div>
				<div class="btn-layout">
					<input class="btn-confirm" name="确定" id="savebtn" type="button" value="确认<?php  if($exchange['tickettype']==2) { ?>门店<?php  } else { ?>商家网点<?php  } ?>">
                </div>
            </div>
			<?php  } else { ?>
			<div id="result_info_s" style="display:none">
			<div>请先选择<?php  if($exchange['tickettype']==2) { ?>门店<?php  } else { ?>商家网点<?php  } ?></div>
			    <hr class="common-hr" />
                <div style="float: left;width:100%;">
				    <input name="award_id" id="award_id" type="hidden" value="奖品ID">
					<select name="input_shangjia" id="input_shangjia" class="px" style="width:100%;">
					    <option value="" selected>点击选择<?php  if($exchange['tickettype']==2) { ?>门店<?php  } else { ?>商家网点<?php  } ?></option>
						<?php  if(is_array($shangjia)) { foreach($shangjia as $shangjias) { ?>
						<option value="<?php  echo $shangjias['id'];?>"><?php  echo $shangjias['shangjianame'];?></option>
						<?php  } } ?>
					</select>
				</div>
				<div id="result_info_tip_kehu" style=" height:30px;float: left;"></div>
				<div class="btn-layout">
					<input class="btn-confirm" name="确定" id="savebtn" type="button" value="确认<?php  if($exchange['tickettype']==2) { ?>门店<?php  } else { ?>商家网点<?php  } ?>">
                </div>
            </div>
			<?php  } ?>
        </div>
    </div>
	<?php  } ?>
</div>
<!--结果-->
<div class="panel-box" id="panel_box_fans">
    <div class="panel-content" id="panelcontent">
        <span class="icon-prize-useless"></span><br/>
		<div id="cccc"><?php  echo $exchange['awarding_tips'];?></div>
		<div id="resultinfo">
		    <hr class="common-hr" />
			<div id="isfans">
            <?php  if($exchange['isrealname']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['0'];?></label><input name="realname" class="px" id="realname" value="<?php  echo $profile['realname'];?>" type="text" placeholder="请输入<?php  echo $isfansname['0'];?>"></div><?php  } ?>
			<?php  if($exchange['ismobile']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['1'];?></label><input name="mobile" class="px" id="mobile" value="<?php  echo $profile['mobile'];?>" type="tel" placeholder="请输入<?php  echo $isfansname['1'];?>"></div><?php  } ?>
			<?php  if($exchange['isqq']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['2'];?></label><input name="qq" class="px" id="qq" value="<?php  echo $profile['qq'];?>" type="tel" placeholder="请输入<?php  echo $isfansname['2'];?>"></div><?php  } ?>
			<?php  if($exchange['isemail']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['3'];?></label><input name="email" class="px" id="email" value="<?php  echo $profile['email'];?>" type="email" placeholder="请输入<?php  echo $isfansname['3'];?>"></div><?php  } ?>
			<?php  if($exchange['isaddress']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['4'];?></label><input name="address" class="px" id="address" value="<?php  echo $profile['address'];?>" type="text" placeholder="请输入<?php  echo $isfansname['4'];?>"></div><?php  } ?>
			<?php  if($exchange['isgender']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['5'];?></label><select name="gender" id="gender" class="form-control">
				<option value="0"<?php  if($profile['gender']==0) { ?> selected <?php  } ?>>选择<?php  echo $isfansname['5'];?></option>
				<option value="1"<?php  if($profile['gender']==1) { ?> selected <?php  } ?>>男</option>
				<option value="2"<?php  if($profile['gender']==2) { ?> selected <?php  } ?>>女</option>
			</select></div><?php  } ?>
			<?php  if($exchange['istelephone']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['6'];?></label><input name="telephone" class="px" id="telephone" value="<?php  echo $profile['telephone'];?>" type="tel" placeholder="请输入<?php  echo $isfansname['6'];?>"></div><?php  } ?>
			<?php  if($exchange['isidcard']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['7'];?></label><input name="idcard" class="px" id="idcard" value="<?php  echo $profile['idcard'];?>" type="text" placeholder="请输入<?php  echo $isfansname['7'];?>"></div><?php  } ?>
			<?php  if($exchange['iscompany']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['8'];?></label><input name="company" class="px" id="company" value="<?php  echo $profile['company'];?>" type="text" placeholder="请输入<?php  echo $isfansname['8'];?>"></div><?php  } ?>
			<?php  if($exchange['isoccupation']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['9'];?></label><input name="occupation" class="px" id="occupation" value="<?php  echo $profile['occupation'];?>" type="text" placeholder="请输入<?php  echo $isfansname['9'];?>"></div><?php  } ?>
			<?php  if($exchange['isposition']) { ?><div style="float: left;width:100%;"><label><?php  echo $isfansname['10'];?></label><input name="position" class="px" id="position" value="<?php  echo $profile['position'];?>" type="text" placeholder="请输入<?php  echo $isfansname['10'];?>"></div><?php  } ?>
		    </div>
            <div id="resultinfotip"></div>
			<div class="btn-layout">
				<input class="btn-confirm" name="提交资料" id="savebtnfans" type="button" value="提交资料">
            </div>
        </div>		
    </div>
</div>
<!--结果-->
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdkhide', TEMPLATE_INCLUDEPATH)) : (include template('jssdkhide', TEMPLATE_INCLUDEPATH));?>
<script>
<?php  if($isfans) { ?>
$("#panel_box_fans").show();
$("#savebtnfans").bind("click",function () {
    var btn = $(this);
    <?php  if($exchange['isrealname']) { ?>
	var realname = $("#realname").val();
	if (realname == '') {
	    $("#resultinfotip").text("请输入<?php  echo $isfansname['0'];?>");
	    return;
	}
	var partten = /[\u4e00-\u9fa5]/g;
	if(!partten.test(realname)){
	    $("#resultinfotip").text("请输入正确的<?php  echo $isfansname['0'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['ismobile']) { ?>
	var mobile = $("#mobile").val();
	if (mobile == '') {
	    $("#resultinfotip").text("请输入<?php  echo $isfansname['1'];?>");
	    return;
	}
	var partten = /^1\d{10}$/;
	if(!partten.test(mobile)){
	    $("#resultinfotip").text("请输入正确的<?php  echo $isfansname['1'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isqq']) { ?>
	var qq = $("#qq").val();
	if (qq == '') {
	    $("#resultinfotip").text("请输入<?php  echo $isfansname['2'];?>");
	    return;
	}			
	var partten = /^[1-9]{1}\d{4,11}$/;
	if(!partten.test(qq)){
	    $("#resultinfotip").text("请输入正确的<?php  echo $isfansname['2'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isemail']) { ?>
	var email = $("#email").val();
	if (email == '') {
	    $("#resultinfotip").text("请输入<?php  echo $isfansname['3'];?>");
	    return;
	}
	var partten = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	if(!partten.test(email)){
	    $("#resultinfotip").text("请输入正确的<?php  echo $isfansname['3'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isaddress']) { ?>
	var address = $("#address").val();
	if (address == '') {
	    $("#resultinfotip").text("请输入<?php  echo $isfansname['4'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isgender']) { ?>
	var gender = $("#gender").val();
	if (gender == '0') {
	    $("#resultinfotip").text("请选择<?php  echo $isfansname['5'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['istelephone']) { ?>
	var telephone = $("#telephone").val();
	if (telephone == '') {
	    $("#resultinfotip").text("请输入<?php  echo $isfansname['6'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isidcard']) { ?>
	var idcard = $("#idcard").val();
	if (idcard == '') {
	    $("#resultinfotip").text("请输入<?php  echo $isfansname['7'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['iscompany']) { ?>
	var company = $("#company").val();
	if (company == '') {
	    $("#resultinfotip").text("请输入<?php  echo $isfansname['8'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isoccupation']) { ?>
	var occupation = $("#occupation").val();
	if (occupation == '') {
	    $("#resultinfotip").text("请输入<?php  echo $isfansname['9'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isposition']) { ?>
	var position = $("#position").val();
	if (position == '') {
	    $("#resultinfotip").text("请输入<?php  echo $isfansname['10'];?>");
	    return;
	}
	<?php  } ?>
	var submitData = {
        <?php  if($exchange['isrealname']) { ?>realname: realname,<?php  } ?>
		<?php  if($exchange['ismobile']) { ?>mobile: mobile,<?php  } ?>
		<?php  if($exchange['isqq']) { ?>qq: qq,<?php  } ?>
		<?php  if($exchange['isemail']) { ?>email: email,<?php  } ?>
		<?php  if($exchange['isaddress']) { ?>address: address,<?php  } ?>
		<?php  if($exchange['isgender']) { ?>gender: gender,<?php  } ?>
		<?php  if($exchange['istelephone']) { ?>telephone: telephone,<?php  } ?>
		<?php  if($exchange['isidcard']) { ?>idcard: idcard,<?php  } ?>
		<?php  if($exchange['iscompany']) { ?>company: company,<?php  } ?>
		<?php  if($exchange['isoccupation']) { ?>occupation: occupation,<?php  } ?>
		<?php  if($exchange['isposition']) { ?>position: position,<?php  } ?>
	};
	$.post('<?php  echo $this->createMobileUrl('editfans', array('rid' => $rid,'from_user' => $page_from_user))?>', submitData, function(data) {
	if (data.success == 1) {
		$("#resultinfo").text(data.msg);		
		setTimeout(function () {
			$("#panel_box_fans").hide();
			location.reload();
		},4000)
		return;
	}else{
		$("#resultinfotip").text(data.msg);
		return;
	}
	},"json")
});	
<?php  } ?>
$("#panel-close").click(function(){
	$("#panel_box").hide();
});
<?php  if($exchange['tickettype']==4) { ?>
function showdivpas(id){
	$("#panel_box").show();
	$("#awardid").val(id);
	$("#result_info").show();
	$("#result_info_s").hide();
}
<?php  } ?>
<?php  if($exchange['awardingstarttime']>time()) { ?>
function beihuo(id,ticketname){
	$("#award_id").val(id);
	$("#duijiangpng").html('<img src="../addons/stonefish_bigwheel/template/images/beihuo.png" height="90">');
	$("#result_info_s").show();
	$("#panel_box").show();
	if(ticketname!='无'){
		$("#beihuoname").text('我要更换['+ticketname+']为我备货');
	}
}
<?php  } ?>
<?php  if($exchange['tickettype']>=2) { ?>
function showdiv(id,dianmian,ticketname){
	$("#panel_box").show();
	if(dianmian==0 && ticketname=='没有选择'){
		$("#duijiangpng").html('<img src="../addons/stonefish_bigwheel/template/images/duijiangkehu.png" height="90">');
		$("#award_id").val(id);		
		$("#result_info").hide();
		$("#result_info_s").show();
	}else{
	    $("#awardid").val(id);
	    $("#dianmian").val(dianmian);
	    $("#ticketname").text(ticketname);
		$("#result_info").show();
		$("#result_info_s").hide();
	}	
}
$("#save-btn").bind("click",function () {
    var btn = $(this);
	var mima = $("#mima").val();
    if (mima == '') {
		$("#result_info_tip").text("请输入兑奖密码");
        return
    }
	var awardid = $("#awardid").val();
	var dianmian = $("#dianmian").val();
    var submitData = {
        mima: mima,
		dianmian: dianmian,
		awardid: awardid,
    };
    $.post('<?php  echo $this->createMobileUrl('exchange', array('rid' => $rid,'from_user' => $page_from_user))?>', submitData, function(data) {
		if (data.success == 1) {
			$("#result_info").html("<br/><br/>" + data.msg + "<br/><div id='share_miao'>3秒后自动关闭</div>");
			djstime(3,'秒自动关闭','share_miao');
			setTimeout(function () {
				$("#panel_box").hide();
				location.reload();
			},4000)
			return
		} else {
			$("#result_info_tip").text(data.msg);
			return
		}
	},"json")
});
$("#savebtn").bind("click",function () {
    var btn = $(this);
	var award_id = $("#award_id").val();
	var shangjiaid = $("#input_shangjia").val();
    if (shangjiaid == '') {
		$("#result_info_tip_kehu").text("请选择商家或门店");
        return
    }
	var submitData = {
        award_id: award_id,
		shangjiaid: shangjiaid,
    };
    $.post('<?php  echo $this->createMobileUrl('exchange_shangjia', array('rid' => $rid,'from_user' => $page_from_user))?>', submitData, function(data) {
		if (data.success == 1) {
			$("#result_info_s").html("<br/><br/>" + data.msg + "<br/><div id='share_miao'>3秒后自动关闭</div>");
			djstime(3,'秒自动关闭','share_miao');
			setTimeout(function () {
				$("#panel_box").hide();
				location.reload();
			},4000)
			return
		} else {
			$("#result_info_tip_kehu").text(data.msg);
			return
		}
	},"json")
});
<?php  } ?>
</script>
</body>
</html>