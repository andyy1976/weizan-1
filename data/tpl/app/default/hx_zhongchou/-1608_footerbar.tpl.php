<?php defined('IN_IA') or exit('Access Denied');?><div class="foot webkit-box" id="foot">
    <a href="<?php  echo $this->createMobileUrl('list')?>" class="webkit-box-flex"><i class="fa fa-home"></i>&nbsp;首页</a>
		<a href="javascript:check_mobile();" class="invest_plus"><i class="icon_plus"></i></a>
		<input type="hidden" name="check_login" value="<?php  echo $_W['openid'];?>">
	 	<a href="<?php  echo $this->createMobileUrl('myorder')?>" class="webkit-box-flex" style="border:none;"><i class="fa fa-user"></i>&nbsp;我的众筹</a>
 	<div class="blank"></div>
</div>
