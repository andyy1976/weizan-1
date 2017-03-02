<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<title></title>
<!-- 样式引用，必选 -->
<link rel="stylesheet" type="text/css" href="../addons/hc_ffk/style/css/muzhi.css" />

<style>
	body{background-color:#FFF;margin:0;padding:0;overflow:hidden;background-size:100%;width:100%;height:100%;}
	#game{margin:auto;position:absolute;left:50%;top:0;width:640px;height:100%;}
	#container{position:relative;width:100%;background-size:100%;margin:auto;height:100%;}
	.gameBg{background:#8C0919;background-image:none!important;}
	.homeBg{background:url() center top no-repeat;}
	
	.dialog{position:absolute;top:0;left:0;width:100%;height:100%;display:none;z-index:101;}
	.dialogBg{position:absolute;top:0;left:0;width:100%;height:100%;background:#000;opacity:0.6;}
	.dialogBlock{position:relative;width:15em;margin:auto;z-index:100;text-align:center;padding-top:8em;}
	.dialogBlock a,.dialog-box-footer a{display:inline-block;width:13.125em;height:2.1875em;line-height:2.1875em;text-align:center;background:#FFF;border-radius:1.1em;font-size:1.2em;text-decoration:none;color:#ED1C43;margin-bottom:1.4em;}
	.dialogBlock a.btnRed,.dialog-box-footer a.btnRed{background:#ED1C43;color:#FFF;}
	.dialog-box-footer a{font-size:1em;width:6em;margin-top:.5em;background-color:#ffc82f;color:#FFF;border-radius:.9em;margin-bottom:1em;}
	
	.dialog-box-out{position:absolute;top:0;left:0;width:100%;height:100%;z-index:101;display:none;}
	.dialog-box-bg{position:absolute;top:0;left:0;width:100%;height:100%;background:#000;opacity:0.6;}
	.dialog-box{position:relative;margin:3em 20px 0 20px;z-index:100;text-align:center;background:#FFF;border-radius:5px;}
	.dialog-box-footer{border-top:1px solid #DDD;width:100%;position:relative;}
	.dialog-box-content p{color:#5d2703;}
	.dialog-box-title{background:#ffc82f;color:#5d2703;border-top-left-radius:5px;border-top-right-radius:5px;font-size:2em;padding:.5em 0;}

	.dialog-box-share{
		top:0;left:0;
		width:100%;
		height:100%;
		background-image: url(../addons/hc_ffk/style/images/share.png);
		background-size:cover;
		position: absolute;
		z-index: -2000;
		display: none;
	}
	
	.Tida-enter-header{position:absolute;top:0;left:0;width:100%;background:url(images/logo.png) no-repeat 10px 7px #ec1c43;background-size:107px 50px;z-index:99;padding:10px 0;}
	.Tida-enter-header span{background:url(images/logo.png) no-repeat left -34px;background-size:107px 50px;margin-right:15px;}		
	.log{position:fixed;bottom:0;left:0;font-size:1em;color:#000;}
</style>

<script src="../addons/hc_ffk/style/js/jquery-1.11.1.min.js"></script>
<script src="../addons/hc_ffk/style/js/muzhi.js"></script>
</head>
<body>
	<div style="display:none;"><img id="shareImg" src="../addons/hc_ffk/style/images/showimg.png"></div>
	<div class="dialog">  
		<div class="dialogBg"></div>
		<div class="dialogBlock">
			<a href="javascript:" id="btnContinue" class="btnRed">继续游戏</a>
			<a href="javascript:" id="btnReplay" >重新开始</a>
			<a href="javascript:" id="btnHome">返回首页</a>
		</div>		
	</div>
	<div class="dialog-box-out">
		<div class="dialog-box-bg"></div>
		<div class="dialog-box">
			<div class="dialog-box-title" id="scoreLast">0分</div>
			<div class="dialog-box-content">
				<img src="../addons/hc_ffk/style/images/end.jpg" style="width:150px;">
			</div>
			<div class="dialog-box-footer">
				<a href="javascript:" id="btnToReplay" class="btnRed">重新开始</a>&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="javascript:" id="btnToHome">返回首页</a>
			</div>
		</div>
	</div>

	<div id="container" class="homeBg">
		<div><canvas id="game">您的浏览器不支持HTML5</canvas></div>
	</div>
	<div class="dialog-box-share" >

	</div>
	<div class="log">

	</div>

	<!-- easy normal hard-->
	<div id="settings" data-id="1" data-path="" data-time="<?php  echo $item['gametime'];?>" data-isv="0" data-type="<?php  echo $level[$item['level']];?>" style="display:none;"
		data-img1 = ""
		data-img2 = ""
		data-img3 = ""
		data-img4 = ""
		data-img5 = ""
		data-bac1k = ""
		data-back = ""
	></div>
	<script>
	function gametype(){
		if(<?php  echo $item['level'];?>==0){
			return <?php  echo $item['easycredit'];?>;
		}
		if(<?php  echo $item['level'];?>==1){
			return <?php  echo $item['normalcredit'];?>;
		}
		if(<?php  echo $item['level'];?>==2){
			return <?php  echo $item['hardcredit'];?>;
		}
		return 0;
	}
	function gametimes(){
		$.ajax({
			type: "POST",
			url: "<?php  echo $this->createMobileurl('index', array('op'=>'gametimes'))?>",
			dataType: "text",
			success: function (d) {
				if(d!=0){
					Game.countDown = Game.time;
					Game.score = 0;
					Game.gv.clearCard();
					Game.view.ready(function () {
						Game.replay();
						Game.interval = setInterval(function () {
							if(Game.wait){
								return;
							}
							setTimeout(function(){					
								Game.countDown -= 1;
								Game.countDown == 0 && (clearInterval(Game.interval),Game.gameover());
							},1000)
							
						}, 1000);
					});
				}
				if(d==0){
					alert('游戏次数已用完，请明天再来玩！');
					location.href = "<?php  echo $this->createMobileurl('index')?>";
				}
			},
			
			error: function (xml, text, thrown){
				TopBox.alert("出错啦!");
			}
		});
		return <?php  echo $profile['ffktimes'];?>;
	}
	
	function sendscore(score){
		$.ajax({
			type: "POST",
			url: "<?php  echo $this->createMobileurl('fangfangkan',array('op'=>'addcredit'))?>",
			data: {credit: score},
			dataType: "text",
			
			success: function (d) {
				if(d!=0){
				}
			},
			
			error: function (xml, text, thrown){
				TopBox.alert("出错啦!");
			}
		});
	}
	
	function showtime(){
		return <?php  echo $item['showtime'];?>;
	}
	var $$Client = {};
	var ffpic = "<?php  echo $_W['attachurl'].$item['ffpicture']?>";
	if('<?php  echo $item['ffpicture'];?>' == ''){
		ffpic = '../addons/hc_ffk/style/images/back.jpg';
	}
	var pic1 = "<?php  echo $_W['attachurl'].$item['picture1']?>";
	if('<?php  echo $item['picture1'];?>' == ''){
		pic1 = '../addons/hc_ffk/style/images/1.jpg';
	}
	var pic2 = "<?php  echo $_W['attachurl'].$item['picture2']?>";
	if('<?php  echo $item['picture2'];?>' == ''){
		pic2 = '../addons/hc_ffk/style/images/2.jpg';
	}
	var pic3 = "<?php  echo $_W['attachurl'].$item['picture3']?>";
	if('<?php  echo $item['picture3'];?>' == ''){
		pic3 = '../addons/hc_ffk/style/images/3.jpg';
	}
	var pic4 = "<?php  echo $_W['attachurl'].$item['picture4']?>";
	if('<?php  echo $item['picture4'];?>' == ''){
		pic4 = '../addons/hc_ffk/style/images/4.jpg';
	}
	var pic5 = "<?php  echo $_W['attachurl'].$item['picture5']?>";
	if('<?php  echo $item['picture5'];?>' == ''){
		pic5 = '../addons/hc_ffk/style/images/5.jpg';
	}
	var _cfgGame = {		
		img: {
			manifest: [
			{src:pic1, id:"1"}, 
			{src:pic2, id:"2"}, 
			{src:pic3, id:"3"}, 
			{src:pic4, id:"4"}, 
			{src:pic5, id:"5"}, 
			{src:ffpic, id:"back"}, 
			{src:"../addons/hc_ffk/style/images/ready.png", id:"ready"},
			{src:"../addons/hc_ffk/style/images/go.png", id:"go"},
			{src:"../addons/hc_ffk/style/images/gamebg.jpg", id:"gameBg"},
			{src:"../addons/hc_ffk/style/images/timebar.png", id:"timebar"}]
		}
	};
	function getResource(){
		 console.log('MUZHI getResource');
		 MUZHI.get().done(function(rows){
			MUZHI.setGameDetail(rows);
			$('.homeBg').css('background-image','url('+MUZHI.getGameImg("homeBg","images/home-bg.jpg")+')');
			_cfgGame.img.manifest[0].src = MUZHI.getGameImg("img1",pic1);
			_cfgGame.img.manifest[1].src = MUZHI.getGameImg("img2",pic2);
			_cfgGame.img.manifest[2].src = MUZHI.getGameImg("img3",pic3);
			_cfgGame.img.manifest[3].src = MUZHI.getGameImg("img4",pic4);
			_cfgGame.img.manifest[4].src = MUZHI.getGameImg("img5",pic5);
			_cfgGame.img.manifest[5].src = MUZHI.getGameImg("back",ffpic);	
			_cfgGame.img.manifest[6].src = MUZHI.getGameImg("ready","../addons/hc_ffk/style/images/ready.png");	
			_cfgGame.img.manifest[7].src = MUZHI.getGameImg("go","../addons/hc_ffk/style/images/go.png");	
			_cfgGame.img.manifest[8].src = MUZHI.getGameImg("gameBg","../addons/hc_ffk/style/images/gamebg.jpg");
			
			//加载首页资源
			loadResource();					
		 }).fail(function(){			
			loadResource();	
			$('.homeBg').css('background-image','url(../addons/hc_ffk/style/images/home-bg.jpg)');			
		 });
	 }	
	</script>
	<script type="text/javascript" src="../addons/hc_ffk/style/js/zepto.js"></script>
	<script type="text/javascript" src="../addons/hc_ffk/style/js/createjs-2013.12.12.min.js"></script>
	<script type="text/javascript" src="../addons/hc_ffk/style/js/base.js"></script>
	<script type="text/javascript" src="../addons/hc_ffk/style/js/main.js"></script>
</script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<?php  $signPackage=$_W['account']['jssdkconfig'];?>	
<script>
wx.config({
	debug: false,   
	appId: '<?php  echo $signPackage["appId"];?>',
	timestamp: '<?php  echo $signPackage["timestamp"];?>',
	nonceStr: '<?php  echo $signPackage["nonceStr"];?>',
	signature: '<?php  echo $signPackage["signature"];?>',
	jsApiList: ['checkJsApi','onMenuShareTimeline','onMenuShareAppMessage','onMenuShareQQ','onMenuShareWeibo',]
});

wx.ready(function () {
	var shareData = {
		title: "翻翻看",
		desc: "翻翻看，看谁翻的快！！！",
		link: "<?php  echo $_W['siteroot'].'app/'.$this->createMobileUrl('fangfangkan')?>",
		imgUrl: "<?php  echo $_W['siteroot'];?>addons/hc_ffk/style/images/end.jpg",
		trigger: function (res) {},
		complete: function (res) {},
		success: function (res) {
		},
		cancel: function (res) {
		},
		fail: function (res) {}
	};
	wx.onMenuShareAppMessage(shareData);
	wx.onMenuShareQQ(shareData);
	wx.onMenuShareWeibo(shareData);
	wx.onMenuShareTimeline(shareData);
});
</script>
</body>
</html>