<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title><?php  echo $reply['title'];?>--<?php  echo $_W['account']['name'];?></title>
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
<script type="text/javascript" src="../addons/stonefish_scratch/template/js/wScratchPad.js?<?php  echo time()?>"></script>
<style>
html{color:<?php  echo $template['textcolor'];?>;}
html{background-image: url(<?php  echo toimage($template['bgimg'])?>);}
html{background-color: <?php  echo $template['bgcolor'];?>;}
body{font-size:<?php  echo $template['fontsize'];?>px;color:<?php  echo $template['textcolor'];?>;}
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
.rankList .rank_01{height: 90px;margin-bottom: 20px}
.rankList .rank_01 {background: <?php  echo $template['rulecolor'];?>;border-radius: 5px;}
.rankList .rank_01 .avatar{margin: 10px 0 0 10px}
.rankList .rank_01 .name,.rankList .rank_01 .price{line-height: 40px;margin-top:10px;}
/* 排行层CSS */
/* 弹出层CSS */
.panel-box .panel-content{color: <?php  echo $template['watchtextcolor'];?>;	background-color: <?php  echo $template['watchcolor'];?>;}
.panel-box .btn-confirm{background: <?php  echo $template['buttoncolor'];?>;	color: <?php  echo $template['buttontextcolor'];?>;}
/* 弹出层CSS */
</style>
</head>
<body>
<!--刮刮卡-->
<input type="hidden" value="<?php  echo $msg;?>" id="msg"/>
<div>
    <div class="nou">
	    <div style="margin:10px;" class="adpic">
		<?php  if(!empty($reply['adpic'])) { ?><?php  if(!empty($reply['adpicurl'])) { ?><a href="<?php  echo $reply['adpicurl'];?>"><?php  } ?><img id="top_img" style="max-width: 100%;height: auto;width: auto\9;"  src="<?php  echo toimage($reply['adpic'])?>" width="100%" border="0"><?php  if(!empty($reply['adpicurl'])) { ?></a><?php  } ?><?php  } ?>
        </div>       
        <div class="zhuan1" id="lottery">
		    <?php  if($reply['opportunity']==2) { ?>
			<div class="mingdaninfo">
                <div class="Detail">我的<?php  echo $creditnames;?>  <span class="n" id="credit_now"><?php  echo intval($credit[$reply['credit_type']])?></span> 个  每次 <span class="n"><?php  echo $reply['credit_value'];?></span> <?php  echo $creditnames;?></div>
            </div>
			<?php  } ?>
			<?php  if($reply['opportunity']==1) { ?>
			<div class="mingdaninfo">
                <div class="Detail"> 赠送 <span class="n"><?php  echo $reply['number_times'];?></span> 次抽奖机会 剩余 <span class="n" id="number_times"><?php  echo $reply['number_times']-$fans['totalnum']?></span> 次</div>
            </div>
			<?php  } ?>
			<?php  if($reply['opportunity']==0) { ?>
			<div class="mingdaninfo">
				<div class="box">
					<div class="Detail" style="text-align:center;"><?php  echo $reply['tips'];?></div>
				</div>
            </div>
			<?php  } ?>
			<div class="con">
			    <div class="guagua">
			        <div class="guaguabg">
		                <p style="display:table;height:100px;width:100%;">
			                <span style="z-index:999;display:table-cell;vertical-align:middle;font-size:24px;" id="awardname">出来吧奖品！</span>
		                </p>
		                <div class="wipe" id="wipe"></div>
				        <div class="wipestart" id="wipestart"><img src="../addons/stonefish_scratch/template/images/wipestart.png"></div>
	                </div>
			    </div>
			</div>
			<div class="mingdan" style="margin-top:10px;">
                <div class="biaoti">已有 <span class="n"><?php  echo $reply['xuninum']+$reply['fansnum']?></span> 人参与此活动</div>
            </div>
			<?php  if(!empty($award_list)) { ?>
			<!--中奖列表-->
			<div class="mingdaninfo" style="margin-top:10px;">
                <div class="Detail"><marquee behavior="scroll" scrolldelay="200"><?php  echo $award_list;?></marquee></div>
            </div>
			<!--中奖列表-->
			<?php  } ?>
			<?php  if($share['share_open_close']) { ?>
			<!--分享按钮-->
			<div class="mingdan" style="margin-top:10px;">
                <div id="shareimg" class="biaoti"><?php  if(strstr($share['share_anniu'], '/')) { ?><img style="height: 35px;width: auto;" src="<?php  echo toimage($share['share_anniu'])?>"><?php  } else { ?><?php  echo $share['share_anniu'];?><?php  } ?></div>
				<div id="pop_share"><img src="<?php  echo toimage($share['share_pic'])?>" width="100%" alt="分享到朋友圈"/></div>
            </div>
			<?php  if($reply['power']==2) { ?>
			<div class="mingdan" style="margin-top:10px;">
                <a href="<?php  echo $this->createMobileUrl('firend', array('rid' => $rid))?>"><div class="biaoti"><?php  if(strstr($share['share_firend'], '/')) { ?><img src="<?php  echo toimage($share['share_anniu'])?>"><?php  } else { ?><?php  echo $share['share_firend'];?><?php  } ?></div></a>
            </div>
			<?php  } ?>
			<!--分享按钮-->
			<?php  } ?>
        </div>
    </div>
</div>
<!--刮刮卡-->
<!--结果-->
<div class="panel-box" id="panel_box">
    <div class="panel-content" id="panel-content">
        <div class="panel-close" id="panel-close"></div>
        <span class="icon-prize-useless" id="panelimg"></span><br/>
		<div id="cccc"><?php  echo $exchange['awarding_tips'];?></div>
		<div id="result_info" style="display:none">
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
            <div id="result_info_tip"></div>
			<div class="btn-layout">
				<input class="btn-confirm" name="提交资料" id="save-btn" type="button" value="提交资料">
            </div>
        </div>
		<div id="result_info1" style="display:none">
			<div style="margin-top:10px;"><input class="btn-confirm" name="放入百宝箱" id="savebtn" type="button" value="放入百宝箱"> </div>
		</div>
		<div id="result_info2" style="display:none">
			<div style="margin-top:10px;"><input class="btn-confirm" name="关闭" id="closebtn" type="button" value="关闭"> </div>
		</div>
    </div>
</div>
<!--结果-->
<?php  if($reply['music']==1) { ?>
<!--音乐控制-->
<div class="audio-controls on"></div>
<!-- 背景音乐 -->
<audio id="audio" <?php  if($reply['mauto']) { ?>autoplay="autoplay"<?php  } ?> <?php  if($reply['mloop']) { ?>loop="loop"<?php  } ?>>
	<source src="<?php  echo toimage($reply['musicurl'])?>" type="audio/mpeg" />
</audio>
<!-- 背景音乐 -->
<!--音乐控制-->
<?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>
<?php  if($share['share_open_close']) { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdk', TEMPLATE_INCLUDEPATH)) : (include template('jssdk', TEMPLATE_INCLUDEPATH));?>
<?php  } else { ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdkhide', TEMPLATE_INCLUDEPATH)) : (include template('jssdkhide', TEMPLATE_INCLUDEPATH));?>
<?php  } ?>
<script>
    <?php  if($isfans) { ?>
		$("#result_info").show();
		$("#panel_box").show();
	<?php  } ?>
	$("#wipestart").click(function(){
	    if ($("#msg").val()!=''){
		    $("#panelimg").css({"background-image": "url(../addons/stonefish_scratch/template/images/icon_prize_useless.png)"});
			$("#cccc").text($("#msg").val());
			$("#panel-content").css({"height": "220px"});
			$("#panel_box").show();
			$("#result_info1").hide();
			$("#result_info2").show();
		}else{
		    $("#wipestart").hide();
			$('#awardname').html('出来吧奖品！');
		}
	});
	    var baseurl = '../addons/stonefish_scratch/';
		var isplayed = false;
		var datatip;
		$('.wipe').wScratchPad({
			bg: baseurl+'template/images/touming.png',
			fg: baseurl+'template/images/wipe.png',
			scratchDown: function (e, percent) {
			    if(isplayed==false){
				$.ajax({type: "get",dataType:'json',url: '<?php  echo $this->createMobileUrl('get_award', array('rid' => $rid,'avatar' => $firend['headimgurl'],'nickname' => $firend['nickname']))?>',success: function(data){		
					datatip = data;
					if(datatip.isfans==0){
						$("#panel-content").css({"height": "220px"});
					}
					if(datatip.success==2){
						$("#wipestart").show();
						$("#panelimg").css({"background-image": "url(../addons/stonefish_scratch/template/images/icon_prize_useless.png)"});
						$("#cccc").text(datatip.msg);
					    $("#panel_box").show();
						$("#result_info1").hide();						
						$("#result_info2").show();
						$("#msg").val(datatip.msg);
						isplayed = false;
					}else{
						if(datatip.success==1){
							$('#awardname').html(datatip.award['prizerating']+"-"+datatip.award['prizename']);
							$("#panelimg").css({"background-image": "url("+datatip.award['prizepic']+")"});
							$("#cccc").text(datatip.award['prizerating']+"-"+datatip.award['prizename']);
						}else{
							$('#awardname').html(datatip.msg);
						}
						<?php  if($reply['opportunity']==2) { ?>
						if($("#credit_now").length>0){
						    $("#credit_now").text(parseInt($("#credit_now").text())-<?php  echo $reply['credit_value'];?>);
						}
						<?php  } ?>
						if($("#count").length>0){
						    $("#count").text(parseInt($("#count").text())+1);
						}
						if($("#totalcount").length>0){
							$("#totalcount").text(parseInt($("#totalcount").text())+1)
						}
						if($("#lcount").length>0){
							$("#lcount").text(parseInt($("#lcount").text())-1)
						}
						if($("#tcount").length>0){
							$("#tcount").text(parseInt($("#tcount").text())-1)
						}
						if($("#number_times").length>0){
							$("#number_times").text(parseInt($("#number_times").text())-1);
						}
					}
				}
			    });
				isplayed = true;
				}
				if (percent > 50) {
					this.reset();
					if(datatip.success==1){
					    $("#panel_box").show();
						$("#wipestart").show();
					    <?php  if($reply['opportunity']==2) { ?>$("#credit_now").text(datatip.credit_now);<?php  } ?>
						$("#result_info1").show();
						$("#result_info2").hide();
					}else{
					    $("#panelimg").css({"background-image": "url(../addons/stonefish_scratch/template/images/icon_prize_useless.png)"});
						$("#cccc").text(datatip.msg);					   
					    $("#panel_box").show();
						$("#wipestart").show();
					    <?php  if($reply['opportunity']==2) { ?>$("#credit_now").text(datatip.credit_now);<?php  } ?>
						$("#result_info1").hide();
						$("#result_info2").show();
					}
					if(datatip.isfans){
					    $("#result_info").show();
					    $("#result_info1").hide();
						$("#result_info2").hide();
				    }else{
					    $("#result_info").hide();
						$("#panel-content").css({"height": "220px"});
				    }
					if(datatip.award['prizetype']=='spaceprize'){
					    $("#result_info1").hide();
						$("#result_info2").show();
					}
					if(datatip.award['prizetype']=='againprize'){
						if($("#lcount").length>0){
							$("#lcount").text(parseInt($("#lcount").text())+1)
						}
						if($("#tcount").length>0){
							$("#tcount").text(parseInt($("#tcount").text())+1)
						}
						if($("#number_times").length>0){
							$("#number_times").text(parseInt($("#number_times").text())+1);
						}
			        }
				}
			}
		});	
	$("#panel-close").click(function(){
		$("#panel_box").hide();
		$("#wipestart").show();
		isplayed = false;
		percent = 0;		
	});
	$("#savebtn").click(function(){
		$("#panel_box").hide();
		$("#wipestart").show();
		isplayed = false;
		percent = 0;
	});
	$("#closebtn").click(function(){
		$("#panel_box").hide();
		$("#wipestart").show();
		isplayed = false;
		percent = 0;
	});
	$("#share_close").click(function(){
		$("#share_box").hide();
	});
	$("#sharebtn").click(function(){
		$("#share_box").hide();
	});
<?php  if($reply['music']==1) { ?>
<!-- 音频暂停播放 -->
var audioAuto = document.getElementById('audio');
<?php  if($reply['mauto']) { ?>
	audioAuto.play();
<?php  } else { ?>
	$(".audio-controls").removeClass("on");
<?php  } ?>
$(".audio-controls").click(function (){ 
	if (audioAuto.paused) {
		audioAuto.play();
		$(".audio-controls").addClass("on");
    }else{
		audioAuto.pause();
		$(".audio-controls").removeClass("on");
    }
});
<!-- 音频暂停播放 -->
<?php  } ?>
<?php  if($share['share_open_close']==1) { ?>
$("#shareimg").click(function(){
	$("#pop_share").show();
});

$("#pop_share").click(function(){
	$("#pop_share").hide();
});
<?php  } ?>
$("#panel-close").click(function(){
	$("#panel_box").hide();
	$("#wipestart").show();
});
function regfans(){
	$("#panel_box").show();	
}
$("#save-btn").bind("click",function () {
    var btn = $(this);
    <?php  if($exchange['isrealname']) { ?>
	var realname = $("#realname").val();
	if (realname == '') {
	    $("#result_info_tip").text("请输入<?php  echo $isfansname['0'];?>");
	    return;
	}
	var partten = /[\u4e00-\u9fa5]/g;
	if(!partten.test(realname)){
	    $("#result_info_tip").text("请输入正确的<?php  echo $isfansname['0'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['ismobile']) { ?>
	var mobile = $("#mobile").val();
	if (mobile == '') {
	    $("#result_info_tip").text("请输入<?php  echo $isfansname['1'];?>");
	    return;
	}
	var partten = /^1\d{10}$/;
	if(!partten.test(mobile)){
	    $("#result_info_tip").text("请输入正确的<?php  echo $isfansname['1'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isqq']) { ?>
	var qq = $("#qq").val();
	if (qq == '') {
	    $("#result_info_tip").text("请输入<?php  echo $isfansname['2'];?>");
	    return;
	}			
	var partten = /^[1-9]{1}\d{4,11}$/;
	if(!partten.test(qq)){
	    $("#result_info_tip").text("请输入正确的<?php  echo $isfansname['2'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isemail']) { ?>
	var email = $("#email").val();
	if (email == '') {
	    $("#result_info_tip").text("请输入<?php  echo $isfansname['3'];?>");
	    return;
	}
	var partten = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	if(!partten.test(email)){
	    $("#result_info_tip").text("请输入正确的<?php  echo $isfansname['3'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isaddress']) { ?>
	var address = $("#address").val();
	if (address == '') {
	    $("#result_info_tip").text("请输入<?php  echo $isfansname['4'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isgender']) { ?>
	var gender = $("#gender").val();
	if (gender == '0') {
	    $("#result_info_tip").text("请选择<?php  echo $isfansname['5'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['istelephone']) { ?>
	var telephone = $("#telephone").val();
	if (telephone == '') {
	    $("#result_info_tip").text("请输入<?php  echo $isfansname['6'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isidcard']) { ?>
	var idcard = $("#idcard").val();
	if (idcard == '') {
	    $("#result_info_tip").text("请输入<?php  echo $isfansname['7'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['iscompany']) { ?>
	var company = $("#company").val();
	if (company == '') {
	    $("#result_info_tip").text("请输入<?php  echo $isfansname['8'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isoccupation']) { ?>
	var occupation = $("#occupation").val();
	if (occupation == '') {
	    $("#result_info_tip").text("请输入<?php  echo $isfansname['9'];?>");
	    return;
	}
	<?php  } ?>
	<?php  if($exchange['isposition']) { ?>
	var position = $("#position").val();
	if (position == '') {
	    $("#result_info_tip").text("请输入<?php  echo $isfansname['10'];?>");
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
		$("#result_info").text(data.msg);
		setTimeout(function () {
			$("#panel_box").hide();
			location.reload();
		},3000)
		return;
	}else{
		$("#result_info_tip").text(data.msg);
		return;
	}
	},"json")
});	
</script>
</body>		
</html>