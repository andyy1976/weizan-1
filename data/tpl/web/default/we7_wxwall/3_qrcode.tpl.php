<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common', TEMPLATE_INCLUDEPATH)) : (include template('common', TEMPLATE_INCLUDEPATH));?>

<div id="wallMain">
	<div id="topbox" class="topbox">
		<div class="topbox_l">
			<div class="topic">
				<h1 class="msg_tit">搜索公众号 <strong class="red"><?php  echo $wall['account']['name'];?></strong></h1>
				<h1 class="msg_tit" style="display:none;">添加公众号 <strong class="red"><?php  echo $wall['account']['account'];?></strong></h1>
				<span class="addCnt">发送 <?php  if(is_array($wall['keyword'])) { foreach($wall['keyword'] as $row) { ?><span class="red Topic_cnt"><?php  echo $row['content'];?></span>，<?php  } } ?> 登记后发送内容，自动上墙</span>
			</div>
		</div>
	</div>
	<div id="msg_list" class="msg_list">
		<div id="msg_<?php  echo $row['id'];?>" style="margin:50px 0 0 40px;">
			<img src="<?php  echo $_W['attachurl'];?>qrcode_<?php  echo $wall['acid'];?>.jpg" style="width:500px;" />
			<img src="<?php  echo $_W['attachurl'];?>headimg_<?php  echo $wall['acid'];?>.jpg" style="width:420px;" />
		</div>
	</div>
</div>

<div class="side_div">
	<div class="side_item"><a href="<?php  echo $this->createWebUrl('detail', array('id' => $wall['rid']))?>">微信墙</a></div>
	<?php  if($_W['uid']) { ?><div class="side_item"><a href="<?php  echo $this->createWebUrl('lottery', array('id' => $wall['rid']))?>">抽奖</a></div><?php  } ?>
</div>

<script type="text/javascript">
	$(function(){
		//公众号切换
		var mTimer;
		function auto_play() {
			$(".msg_tit").toggle();
		}
		mTimer = setInterval(function(){auto_play()}, 5000);
	});
</script>

</body>
</html>
