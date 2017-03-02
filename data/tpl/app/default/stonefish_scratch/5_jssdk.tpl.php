<?php defined('IN_IA') or exit('Access Denied');?><div class="panel-box" id="share_box_tip">
    <div class="panel-content" id="panel-content" style="height:120px;">
        <div id="share_tip"></div>
		<hr class="common-hr" />
		<div style="margin-top:10px;" id="share_miao"></div>
    </div>
</div>
<script>var require = { urlArgs: 'v=<?php  echo date('YmdH');?>' };</script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script src="<?php  echo $_W['siteroot'];?>app/resource/js/require.js"></script>
<script src="<?php  echo $_W['siteroot'];?>app/resource/js/app/config.js"></script>
<script type="text/javascript">
	// jssdk config 对象
	jssdkconfig = <?php  echo json_encode($_W['account']['jssdkconfig']);?> || {};
	// 是否启用调试
	jssdkconfig.debug = false;
	
	jssdkconfig.jsApiList = [
		'checkJsApi',
		'onMenuShareTimeline',
		'onMenuShareAppMessage',
		'onMenuShareQQ',
		'onMenuShareWeibo',
		'hideOptionMenu',
		'showOptionMenu'
	];

	wx.config(jssdkconfig);
	require(['jquery', 'util'], function($, util){
		<?php  if($share['share_open_close']==1) { ?>
		var sharedata = {
	        "imgUrl" : "<?php  echo $shareimg;?>",
	        "link" : "<?php  echo $sharelink;?>",
	        "desc" : "<?php  echo $sharedesc;?>",
	        "title" : "<?php  echo $sharetitle;?>"
	    };
		var share_data = {
			title: sharedata.title,
			desc: sharedata.desc,
			link: sharedata.link,
			imgUrl: sharedata.imgUrl,			    
			<?php  if(!empty($share['share_cancel'])) { ?>
				// 分享取消
				cancel: function (res) {
			        $("#share_tip").text("<?php  echo $share['share_cancel'];?>");
			        $("#share_miao").text("3秒后自动关闭本弹出提示框");
					$("#share_box_tip").show();
			        djstime(3,'秒后自动关闭本弹出提示框','share_miao');
			        setTimeout(function () { 
			            $("#share_box_tip").hide();
			        }, 4000);
			    },
			<?php  } ?>
			<?php  if(!empty($share['share_fail'])) { ?>
				// 分享取消
			    fail: function (res) {
			        $("#share_tip").text("<?php  echo $share['share_fail'];?>");
			        $("#share_miao").text("3秒后自动关闭本弹出提示框");
					$("#share_box_tip").show();
			        djstime(3,'秒后自动关闭本弹出提示框','share_miao');
			        setTimeout(function () { 
			            $("#share_box_tip").hide();
			        }, 4000);
			    },
			<?php  } ?>
			
			//分享成功// 分享成功了，我们是不是可以做一些分享统计呢？
			success : function(resp) {
				$.getJSON('<?php  echo $this->createMobileUrl('share_confirm', array('rid' => $rid,'from_user' => $page_from_user))?>', function(data){
			    	<?php  if(!empty($share['share_confirm'])) { ?>
						if(data.success==1) {
                    	    $("#share_tip").text("<?php  echo $share['share_confirm'];?>");
			   	     	}else{
			        	    $("#share_tip").text(data.msg);
			    	    }
			    	    $("#share_miao").text("3秒后自动关闭本弹出提示框");
						$("#share_box_tip").show();
			   	        djstime(3,'秒后自动关闭本弹出提示框','share_miao');
			    	    setTimeout(function () {
                    	    $("#share_box_tip").hide();
							location.reload();
                	    }, 4000);
					<?php  } ?>
				});
			},
		};
		<?php  } ?>
		wx.ready(function () {
			wx.hideOptionMenu();
			<?php  if($share['share_open_close']==1) { ?>
			wx.showOptionMenu();
			wx.onMenuShareAppMessage(share_data);
			wx.onMenuShareTimeline(share_data);
			wx.onMenuShareQQ(share_data);
			wx.onMenuShareWeibo(share_data);
			<?php  } ?>
		});
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