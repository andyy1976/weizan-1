<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<style>
    img{max-width:300px!important;}
	.content-black{width:100%;height:100%;position:fixed;z-index:5;background:rgba(0,0,0,0.8);}
	.content-black p{ color:#fff1cb; line-height:35px;}
	.btns{width:300px; height:40px; line-height:40px;background:#FFF; color:#000; border:0; border-radius:5px;MARGIN-RIGHT: auto;MARGIN-LEFT: auto;}
</style>
        <div class="bg-content" id="shareBox" style="background:rgba(0,0,0,0.8);height:100%">
			<div class="content-black word-4" style="padding-top:40px;">
				<div style="text-align:center; font-size:16px; color:#fff;">
					<img src="<?php  echo $_W['account']['qrcode'];?>" alt="<?php  echo $_W['account']['childname'];?>二维码" />
					<p>
						用手机微信扫描二维码关注@<?php  echo $_W['account']['childname'];?>
					</p>
					<p>
						或搜索微信号:<?php  echo $_W['account']['account'];?>关注@<?php  echo $_W['account']['childname'];?> 
					</p>
					<?php  if(!empty($_W['account']['subscribeurl'])) { ?>
					<p>
						<div class="btns"><a href="<?php  echo $_W['account']['subscribeurl'];?>">一键关注@<?php  echo $_W['account']['childname'];?></a></div> 
					</p>
					<?php  } ?>
				</div>
			</div>
		</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('jssdkhide', TEMPLATE_INCLUDEPATH)) : (include template('jssdkhide', TEMPLATE_INCLUDEPATH));?>
</body>
</html>