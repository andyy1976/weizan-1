<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li><a href="<?php  echo $this->createWebUrl('help');?>">说明</a></li>
    <li><a href="<?php  echo $this->createWebUrl('api');?>">接口参数</a></li>
    <li class="active"><a href="<?php  echo $this->createWebUrl('activity');?>">红包设置</a></li> 
    <li><a href="<?php  echo $this->createWebUrl('record');?>">红包记录</a></li>
</ul>
<script>
    require(['angular', 'bootstrap', 'underscore', 'util'], function(angular, $, _, u){
        angular.module('app', []).controller('formPanel', function($scope, $http){
            $scope.activity = <?php  echo json_encode($activity)?>;
            $scope.submit = function() {
                var message = '';
                if($.trim($scope.activity.title) == '') {
                    message += '必须输入活动名称<br>';
                }
                if($.trim($scope.activity.title).length > 10) {
                    message += '活动名称不能大于10个字符<br>';
                }
                if($.trim($scope.activity.provider) == '') {
                    message += '必须输入红包提供商名称<br>';
                }
                if($.trim($scope.activity.wish) == '') {
                    message += '必须输入红包祝福语<br>';
                }
                if($.trim($scope.activity.remark) == '') {
                    message += '必须输入红包说明<br>';
                }
                if($.trim($(':text[name=image]').val()) == '') {
                    message += '必须输入红包分享图片<br>';
                }
                if($.trim($(':text[name=stitle]').val()) == '') {
                    message += '必须输入红包分享标题<br>';
                }
                if($.trim($('textarea[name=content]').val()) == '') {
                    message += '必须输入红包分享文案<br>';
                }
                $scope.activity.fee.downline = parseInt($scope.activity.fee.downline);
                $scope.activity.fee.upline = parseInt($scope.activity.fee.upline);
                if(isNaN($scope.activity.fee.downline) || isNaN($scope.activity.fee.upline) || $scope.activity.fee.downline > $scope.activity.fee.upline || $scope.activity.fee.downline < 1 || $scope.activity.fee.upline > 200) {
                    message += '红包金额应大于1元, 小于200元. 并且最大金额不能小于最少金额<br>';
                }
                if(message) {
                    u.message(message);
                    return false;
                }
                $('#theform')[0].submit();
            }
        });
        angular.bootstrap(document, ['app']);
    });
</script>
<div class="clearfix">
    <form id="theform" class="form form-horizontal ng-cloak" action="" method="post" ng-controller="formPanel">
        <div class="panel panel-default">
            <div class="panel-heading">
                红包设置
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动名称</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="title" class="form-control" ng-model="activity.title">
                        <span class="help-block">这次领红包活动的名称</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">活动时间</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_daterange('time', $activity['time'], true)?>
                        <span class="help-block">活动的时间范围, 其他时间活动将不能访问</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">红包提供商名称</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="provider" class="form-control" ng-model="activity.provider">
                        <span class="help-block">红包提供商名称, 请参考最终效果预览</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">红包祝福语</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="wish" class="form-control" ng-model="activity.wish">
                        <span class="help-block">红包祝福语, 请参考最终效果预览</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">红包说明</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea name="remark" class="form-control" rows="5" ng-model="activity.remark"></textarea>
                        <span class="help-block">红包说明, 请参考最终效果预览</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">红包金额</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="row row-fix">
                            <div class="col-sm-4 col-xs-2">
                                <div class="input-group">
                                    <input type="text" name="fee[downline]" class="form-control" ng-model="activity.fee.downline">
                                    <span class="input-group-addon" style="border-left:none;border-right:none;">至</span>
                                    <input type="text" name="fee[upline]" class="form-control" ng-model="activity.fee.upline">
                                    <span class="input-group-addon">元</span>
                                </div>
                            </div>
                        </div>
                        <span class="help-block">红包金额范围, 最终金额将在金额范围内随机生成. 如果金额固定, 请输入相同的金额</span>
                        <span class="help-block"><strong>根据接口限制, 单个红包最低1元, 最高200元. </strong></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">红包内容预览</label>
                    <div class="col-sm-9 col-xs-12">
                        <div class="alert alert-info">红包消息: 你参加 <mark>抢红包活动</mark>，成功获得 <mark>{{activity.provider}}</mark> 赠送的红包。<mark>{{activity.remark}}</mark></div>
                        <div class="alert alert-info">拆开红包: 你成功领取了 <mark>{{activity.provider}}</mark> 发放的红包。 红包金额：<mark>{{activity.fee.upline}}</mark> 元  <mark>{{activity.wish}}</mark></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                红包分享信息
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享的图片</label>
                    <div class="col-sm-9 col-xs-12">
                        <?php  echo tpl_form_field_image('image', $activity['image'])?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享的标题</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="stitle" class="form-control" ng-model="activity.stitle">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">分享文案</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea name="content" class="form-control" rows="5"><?php  echo $activity['content'];?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
                    <div class="col-md-2 col-lg-1">
                        <input type="button" value="保存" class="btn btn-primary btn-block" ng-click="submit();" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
