<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<script>

</script>
<div class="clearfix">
    <form id="theform" class="form form-horizontal" action="<?php  echo $this->createWebUrl('setting')?>" method="post">
        <div class="panel panel-default">
            <div class="panel-heading">
                发企业现金付款的接口参数
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="alert alert-info">
                            发放企业现金付款需要使用 <br>
                            <span class="label label-info">认证服务号并开通微信支付</span> 
       
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">AppID</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="appid" value="<?php  echo $settings['appid'];?>" class="form-control">
                        <span class="help-block">使用或借用的认证服务号AppID</span>
                        <span class="help-block"><strong>设置好以后请不要更换, 否则会造成重复领取红包</strong></span>
                      
                        <span class="help-block"><strong>appID、AppSecret微信后台查看 <a href="http://mp.weixin.qq.com/" target="_blank">去查看</a></strong></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">AppSecret</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="secret" value="<?php  echo $settings['secret'];?>" class="form-control">
                        <span class="help-block">使用或借用的认证服务号AppSecret, 需要使用高级接口鉴权</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商户号</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="mchid" value="<?php  echo $settings['mchid'];?>" class="form-control">
                        <span class="help-block">使用或借用的微信支付商户号, 开通微信支付才能获得商户号</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商户支付密钥32位</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="password" value="<?php  echo $settings['password'];?>" class="form-control">
                        <span class="help-block">使用或借用的微信支付商户所使用的支付密钥, 开通微信支付才能获得商户号</span>
                    </div>
                </div>

             <!--     <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">授权的域名</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="yuming" value="<?php  echo $settings['yuming'];?>" class="form-control">
                        <span class="help-block">认证服务号绑定的域名</span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">服务器IP</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="ip" value="<?php  echo $settings['ip'];?>" class="form-control">
                        <span class="help-block">发放红包接口需要服务器IP. 程序将自动获取你的服务器IP, 如果获取失败, 请手动指定</span>
                    </div>
                </div> -->
                 <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">公众号搜索关键字</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="gongzhonghao" value="<?php  echo $settings['gongzhonghao'];?>" class="form-control">
                        <span class="help-block">未关注公众号的用户领取红包时会提示的消息，如请关注公众号：<strong>xxxxxxxx</strong>></span>
                       
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">商户支付证书</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea class="form-control" name="cert" rows="8" placeholder="为保证安全性, 不显示证书内容. 若要修改, 请直接输入"></textarea>
                        <span class="help-block">从商户平台上下载支付证书, 解压并取得其中的 <mark>apiclient_cert.pem</mark> 用记事本打开并复制文件内容, 填至此处</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">支付证书私钥</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea class="form-control" name="key" rows="8" placeholder="为保证安全性, 不显示证书内容. 若要修改, 请直接输入"></textarea>
                        <span class="help-block">从商户平台上下载支付证书, 解压并取得其中的 <mark>apiclient_key.pem</mark> 用记事本打开并复制文件内容, 填至此处</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">支付根证书</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea class="form-control" name="ca" rows="8" placeholder="为保证安全性, 不显示证书内容. 若要修改, 请直接输入"></textarea>
                        <span class="help-block">从商户平台上下载支付证书, 解压并取得其中的 <mark>rootca.pem</mark> 用记事本打开并复制文件内容, 填至此处</span>
                    </div>
                </div>
                   <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-md-2 col-lg-1">
                        <input name="submit" type="submit" value="保存" class="btn btn-primary btn-block" />
                        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
                    </div>
                </div>
                 </div>
                   </div>

                </div>
              </form>
    
</div>

   

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>