<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>


<div class="main">


    <form action="" method="post" class="form-horizontal form" enctype="multipart/form-data" id="form1">


        <div class="panel panel-default">

            <div class="panel-heading">邮件通知设置</div>
            <div class="panel-body">
                <div class="form-group">

                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提醒接收邮箱</label>

                    <div class="col-xs-12 col-sm-5">

                        <input type="text" name="noticeemail" class="form-control" value="<?php  echo $settings['noticeemail'];?>" />

                    </div>
					<div class="col-xs-12 col-sm-4"><a href="./index.php?c=profile&a=notify&">邮件参数设置</a></div>

                </div>

            </div>

        </div>
        <div class="panel panel-default">
            <div class="panel-heading">模板消息设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">客服模板消息ID</label>
                    <div class="col-xs-12 col-sm-5">
                    	<input type="text" name="k_templateid" class="form-control" value="<?php  echo $settings['k_templateid'];?>" />
                    </div>
					<div class="col-xs-12 col-sm-4">参考模板消息ID：TM204158711</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">接收消息客服ID</label>
                    <div class="col-xs-12 col-sm-5">
                    	<input type="text" name="kfid" class="form-control" value="<?php  echo $settings['kfid'];?>" />
                    </div>
					<div class="col-xs-12 col-sm-4">openid：粉丝管理中的粉丝编号</div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户模板消息ID</label>
                    <div class="col-xs-12 col-sm-5">
                    	<input type="text" name="m_templateid" class="form-control" value="<?php  echo $settings['m_templateid'];?>" />
                    </div>
					<div class="col-xs-12 col-sm-4">参考模板消息ID：TM204158711</div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">短信通知设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">提醒接收手机</label>
                    <div class="col-xs-12 col-sm-9">
                        <input type="text" name="mobile" class="form-control" value="<?php  echo $settings['mobile'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信accountsid</label>
                    <div class="col-xs-12 col-sm-9">
                        <input type="text" name="accountsid" class="form-control" value="<?php  echo $settings['accountsid'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信token</label>
                    <div class="col-xs-12 col-sm-9">
                        <input type="text" name="tokenid" class="form-control" value="<?php  echo $settings['tokenid'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信appId</label>
                    <div class="col-xs-12 col-sm-9">
                        <input type="text" name="appId" class="form-control" value="<?php  echo $settings['appId'];?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">短信模板ID</label>
                    <div class="col-xs-12 col-sm-2">
                        <input type="text" name="templateId" class="form-control" value="<?php  echo $settings['templateId'];?>" />
                    </div>
					<div class="col-xs-12 col-sm-5"><a href="http://www.ucpaas.com/" target="_blank">短信API接口是云之讯，5分一条，无套餐</a></div>
                </div>
            </div>
        </div>


        <div class="form-group col-sm-12">


            <input type="submit" name="submit" value="提交" class="btn btn-primary col-lg-1" />


            <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />


        </div>


    </form>


</div>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>