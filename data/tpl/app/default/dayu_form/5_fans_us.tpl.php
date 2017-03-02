<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('headers', TEMPLATE_INCLUDEPATH)) : (include template('headers', TEMPLATE_INCLUDEPATH));?>
    
    <!-- 头部 -->
    <header class="am-topbar am-topbar-inverse am-topbar-fixed-top">
        <ul class="am-avg-sm-3">
             <li class="am-text-center" style="padding-top:10px">关注<?php  echo $_W['uniaccount']['name'];?></li>
        </ul>
    </header>
    
    <div class="am-g" style="margin-top:15px">
        <div class="am-u-sm-12 am-text-center">
            <img src="<?php  echo $qrcodesrc;?>" class="img-rounded">
        </div>
       <div class="am-u-sm-12 am-text-center am-text-sm" style="margin-top:15px">
       	（长按二维码，选择“<font color="red">识别二维码</font>”关注）
         <p><?php  echo $message;?></p>
       </div>
    </div>
    

    
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footers', TEMPLATE_INCLUDEPATH)) : (include template('footers', TEMPLATE_INCLUDEPATH));?>