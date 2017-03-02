<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
    <li><a href="<?php  echo $this->createWebUrl('help');?>">说明</a></li>
    <li><a href="<?php  echo $this->createWebUrl('api');?>">接口参数</a></li>
    <li><a href="<?php  echo $this->createWebUrl('activity');?>">红包设置</a></li> 
    <li class="active"><a href="<?php  echo $this->createWebUrl('record');?>">红包记录</a></li>
</ul>
<div class="clearfix">
    <div class="panel panel-info">
        <div class="panel-heading">筛选</div>
        <div class="panel-body">
            <form action="" method="get" class="form-horizontal" role="form">
                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="m" value="czt_subscribe_redpack" />
                <input type="hidden" name="do" value="record" />
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 control-label">openid</label>
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                        <input class="form-control" name="openid" type="text" value="<?php  echo $_GPC['openid'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 control-label">状态</label>
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                        <label class="radio-inline">
                            <input type="radio" name="status" value="" <?php  if(empty($_GPC['status'])) { ?>checked="checked"<?php  } ?>> 不限
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="1" <?php  if($_GPC['status']===(string)1) { ?>checked="checked"<?php  } ?>> 发放成功
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="status" value="0" <?php  if($_GPC['status']===(string)0) { ?>checked="checked"<?php  } ?>> 未成功
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 control-label"></label>
                    <div class="col-sm-8 col-md-8 col-lg-8 col-xs-12">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            红包领取记录
        </div>
        <div class="table-responsive panel-body">
            <table class="table table-hover">
                <tr>
                   <th style="width:100px;">id</th>
                    <th style="">openid</th>
                    <th style="width:100px;">红包金额</th>
                    <th style="width:200px;">时间</th>
                    <th style="width:100px;">发放状态</th>
                </tr>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td><?php  echo $row['id'];?></td>
                    <td><?php  echo $row['openid'];?></td>
                    <td><?php  echo $row['fee'];?></td>
                     <td><?php  echo date('Y-m-d H:i', $row['create_t']);?></td>
                    <td>
                        <?php  if($row['status'] == 1) { ?>
                        <span class="label label-success">发放成功</span>
                        <?php  } else { ?>
                        <span class="label label-danger">发放失败</span>
                        <?php  } ?>
                    </td>
                </tr>
                <?php  } } ?>
            </table>
        </div>
        <div class="panel-body text-right">
            <?php  echo $pager;?>
        </div>
    </div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
