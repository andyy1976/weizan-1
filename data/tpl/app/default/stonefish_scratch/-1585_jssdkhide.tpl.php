<?php defined('IN_IA') or exit('Access Denied');?><script>var require = { urlArgs: 'v=<?php  echo date('YmdH');?>' };</script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="<?php  echo $_W['siteroot'];?>app/resource/js/require.js"></script>
<script src="<?php  echo $_W['siteroot'];?>app/resource/js/app/config.js"></script>
<script>
	// jssdk config 对象
	jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || { jsApiList:[] };
	
	// 是否启用调试
	// jssdkconfig.debug = true;
	
	// 已经注册了 jssdk 文档中所有的接口
	jssdkconfig.jsApiList = [
		'checkJsApi',
		'closeWindow',
		'hideOptionMenu',		
	];
	
	wx.config(jssdkconfig);

	sharedata = {
		title : "<?php  echo $reply['sharetitle'];?>",
		link : "<?php  echo $shareurl;?>",
		desc : "<?php  echo $reply['sharecontent'];?>",
		imgUrl :"<?php  echo $picture;?>"
	};
	
	wx.ready(function () {
		wx.hideOptionMenu();
	});
	/*倒计时*/
	function djstime(miao,msg,div){
	    var e1=$("#"+div).first();
	    var i=miao;
	    var interval=setInterval(function(){
		    e1.html(i+msg);
	    	i--;
		    if(i<0){						
			    clearInterval(interval);	
		    }
	    },1000);
	}
</script>