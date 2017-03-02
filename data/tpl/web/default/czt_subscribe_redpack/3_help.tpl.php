<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li class="active"><a href="<?php  echo $this->createWebUrl('help');?>">说明</a></li>
    <li><a href="<?php  echo $this->createWebUrl('api');?>">接口参数</a></li>
    <li><a href="<?php  echo $this->createWebUrl('activity');?>">红包设置</a></li> 
    <li><a href="<?php  echo $this->createWebUrl('record');?>">红包记录</a></li>
</ul>
<div class="clearfix">
    <div class="alert alert-danger">
        <h4>模块使用前需要注意</h4>
        <p><strong>为了让粉丝关注后能发红包，先要去基础设置——特殊回复里去设置欢迎信息关键字，然后在本模块也设置一条关键字相同的回复规则</strong>&nbsp;&nbsp;<a href="/web/index.php?c=platform&a=special&">去设置</a></p>
        <p><strong>注意: 如果发现设置之后还是无效，可能是你装了其他模块也处理了关注消息，导致跟本模块冲突，请自行排查，并暂时卸载相应模块</strong> </p>
        <p><strong>注意: 微信红包接口生效时间为每天 08:00 - 23:59, 不在这个时间段, 将无法领取红包。</strong></p>
		<p><strong>如还有疑问，请发邮件联系178714614@qq.com</strong></p>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
