<?php defined('IN_IA') or exit('Access Denied');?><?php $modulec = $this->module['config'];$ispublish = isset($modulec['ispublish']) ? $modulec['ispublish'] : 0;?>
<div id="jumphelper" style="display:block;">
 	<a href="" class="investor_btn sizing" style="display:none">
        <i class="fa fa-plus-circle"></i>
    </a>
    <a href="javascript:void(0);" id="gotop" class="gotop">∧</a>
    <a href="javascript:void(0);" id="gobot" class="gotop" style="display:none">∨</a>
</div>
</body>
<script type="text/javascript">
	// 滑动触发
	isTouchDevice();
	// 返回顶部
	init_gotop();
</script>
<script type="text/javascript">
	function check_mobile(){
		var	check_login=$("input[name='check_login']").val();
		var ispublish = <?php  echo $ispublish;?>;
		if(check_login){
			if (ispublish == 0) {
				$.show_tip("本站暂未开放众筹项目发布");
			}else{
				window.location.href="<?php  echo $this->createMobileUrl('publish',array('op'=>'choose'))?>";
			}
		}else{
			$.showErr("请先绑定手机号再进行发起项目",function(){
				window.location.href="<?php  echo url('mc/bond/mobile');?>";
			});
		}
	}
	function check_m(url,status){
		var	check_login=$("input[name='check_login']").val();
		if(check_login){
			if (status != 3) {
				$.show_tip("本众筹项目尚未开始");
			}else{
				window.location.href=url;
			}
		}else{
			$.showErr("请先绑定手机号再进行项目支持",function(){
				window.location.href="<?php  echo url('mc/bond/mobile');?>";
			});
		}
	}
</script>
<?php
	$_share['title'] = !empty($_share['title']) ? $_share['title'] : $modulec['share_title'];
	$_share['imgUrl'] = !empty($_share['imgUrl']) ? $_share['imgUrl'] : tomedia($modulec['share_img']);
	if(isset($_share['content'])){
		$_share['desc'] = $_share['content'];
		unset($_share['content']);
	}
	$_share['desc'] = !empty($_share['desc']) ? $_share['desc'] : $modulec['share_description'];
	$_share['desc'] = preg_replace('/\s/i', '', str_replace('	', '', cutstr(str_replace('&nbsp;', '', ihtmlspecialchars(strip_tags($_share['desc']))), 60)));
	if(empty($_share['link'])) {
		$_share['link'] = '';
		$query_string = $_SERVER['QUERY_STRING'];
		if(!empty($query_string)) {
			parse_str($query_string, $query_arr);
			$query_arr['u'] = $_W['member']['uid'];
			$query_string = http_build_query($query_arr);
			$_share['link'] = $_W['siteroot'].'app/index.php?'. $query_string;
		}
	}
?>
<script type="text/javascript">
	var $_share = <?php  echo json_encode($_share);?>;
	
	if(typeof sharedata == 'undefined'){
		sharedata = $_share;
	} else {
		sharedata['title'] = sharedata['title'] || $_share['title'];
		sharedata['desc'] = sharedata['desc'] || $_share['desc'];
		sharedata['link'] = sharedata['link'] || $_share['link'];
		sharedata['imgUrl'] = sharedata['imgUrl'] || $_share['imgUrl'];
	}

	function tomedia(src) {
		if(typeof src != 'string')
			return '';
		if(src.indexOf('http://') == 0 || src.indexOf('https://') == 0) {
			return src;
		} else if(src.indexOf('../addons') == 0 || src.indexOf('../attachment') == 0) {
			src=src.substr(3);
			return window.sysinfo.siteroot + src;
		} else if(src.indexOf('./resource') == 0) {
			src=src.substr(2);
			return window.sysinfo.siteroot + 'app/' + src;
		} else if(src.indexOf('images/') == 0) {
			return window.sysinfo.attachurl+ src;
		}
	}
	
	if(sharedata.imgUrl == ''){
		var _share_img = $('body img:eq(0)').attr("src");
		if(_share_img == ""){
			sharedata['imgUrl'] = window.sysinfo.attachurl + 'images/global/wechat_share.png';
		} else {
			sharedata['imgUrl'] = tomedia(_share_img);
		}
	}
	
	if(sharedata.desc == ''){
		var _share_content = _removeHTMLTag($('body').html());
		if(typeof _share_content == 'string'){
			sharedata.desc = _share_content.replace($_share['title'], '')
		}
	}
	
	wx.ready(function () {
		wx.onMenuShareAppMessage(sharedata);
		wx.onMenuShareTimeline(sharedata);
		wx.onMenuShareQQ(sharedata);
		wx.onMenuShareWeibo(sharedata);
	});
</script>
</html>