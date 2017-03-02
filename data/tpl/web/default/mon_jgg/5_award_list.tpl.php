<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="main">
    <ul class="nav nav-tabs">
        <li ><a href="<?php  echo $this->createWebUrl('jggManage');?>">活动管理</a></li>

        <li > <a href="<?php  echo $this->createWebUrl('play_user',array('jid'=>$jid));?>">参加用户管理</a></li>

        <li > <a href="<?php  echo $this->createWebUrl('RecordList',array('jid'=>$jid,'uid'=>$uid));?>">抽奖记录</a></li>
        <li class="active" > <a href="<?php  echo $this->createWebUrl('AwardList',array('jid'=>$jid,'uid'=>$uid));?>">中奖记录</a></li>

    </ul>





    <div class="panel panel-info">
        <div class="panel-heading"><span class="label label-success"><?php  echo $jgg['title'];?>=><?php  echo $user['nickname'];?> 中奖记录</span></div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">

                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="m" value="<?php echo MON_JGG;?>" />
                <input type="hidden" name="do" value="AwardList" />
                <input type="hidden" name="jid" value="<?php  echo $jid;?>" />


                <div class="form-group">

                    <label class="col-xs-2col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
                    <div class="col-sm-3 col-lg-3">
                        <input class="form-control" name="keywords" id="" type="text" value="<?php  echo $_GPC['keywords'];?>" placeholder="可查询手机号或昵称">
                    </div>



                    <label class="col-xs-1 col-sm-1 col-md-1 control-label">状态</label>
                    <div class="col-xs-2 col-sm-2 col-md-2 control-label">
                        <select name="status" class="form-control input-small"
                                style="float: left">
                            <option value="0" <?php  if($stauts==0) { ?>selected="selected" <?php  } ?>>全部</option>
                            <option value="1" <?php  if($stauts==1) { ?>selected="selected" <?php  } ?>>未处理</option>
                            <option value="2" <?php  if($stauts==2) { ?>selected="selected" <?php  } ?>>申请领奖</option>
                            <option value="3" <?php  if($stauts==3) { ?>selected="selected" <?php  } ?>>已发奖</option>
                            <option value="4" <?php  if($stauts==4) { ?>selected="selected" <?php  } ?>>领奖完成</option>
                        </select>

                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2 control-label">
                        <button class="btn btn-primary pull-left span2"
                                style='margin-left: 95px;'>
                            <i class="icon-search icon-large"></i> 搜索
                        </button>
                    </div>

                </div>


            </form>
        </div>




    </div>



    <a class="btn btn-default" href="javascript:exportData()"><i class="icon-download-alt"></i>导出中奖记录</a>


    <div class="panel panel-default">
        <div class="table-responsive panel-body">


            <table class="table table-hover">
                <thead>
                <tr>

                    <th style="width:100px;">昵称</th>
                    <th style="width:80px;">姓名</th>
                    <th style="width:120px;">电话</th>
                    <th style="width:100px;">奖品名称</th>
                    <th style="width:80px;">奖品级别</th>

                    <th style="width:100px;">抽奖时间</th>
                    <th style="width:150px;">状态</th>
                    <th style="width:130px;">操作</th>
                </tr>
                </thead>
                <tbody>


                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>
                    <td><?php  echo $row['nickname'];?></td>
                    <td><?php  echo $row['uname'];?></td>
                    <td><?php  echo $row['tel'];?></td>
                    <td><?php  if($row['award_name']) { ?><?php  echo $row['award_name'];?><?php  } else { ?>未中奖<?php  } ?></td>
                    <td><?php  if($row['award_level']) { ?><?php  echo $row['award_level'];?><?php  } else { ?>未中奖<?php  } ?></td>

                    <td><?php  echo date("Y-m-d H:i",$row['createtime'])?></td>
                    <td><?php  echo $this->statusText($row['status']);?></td>
                    <td >


                        <?php  if($row['status']==Mon_JggModuleSite::$STATUS_APPLY) { ?>

                                 <a href="<?php  echo $this->createWebUrl('AwardList', array( 'id' => $row['id'], 'op' => 'fj'))?>" class="btn btn-success" role="button">发奖完毕</a>
                        <?php  } ?>

                        <a href="<?php  echo $this->createWebUrl('AwardList', array( 'id' => $row['id'], 'op' => 'delete'))?>"
                           onclick="return confirm('此操作不可恢复，确认删除？');return false;" title="删除"
                           class="btn btn-small"><i class="glyphicon glyphicon-remove"></i>删除</a>
                    </td>
                </tr>
                <?php  } } ?>


                </tbody>


            </table>
            <?php  echo $pager;?>
        </div>
    </div>










</div>


<script>

    function exportData(){

        var keyword=$("#keywords").val();
        var status=$("#status").val();
        var url="<?php  echo $this->createWebUrl('Adownload',array('jid'=>$jid,'uid'=>$uid))?>&keywords"+keyword+"&status="+status;
        location.href=url;

    }

</script>


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>