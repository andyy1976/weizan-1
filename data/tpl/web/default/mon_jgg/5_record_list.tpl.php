<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="main">
    <ul class="nav nav-tabs">
        <li ><a href="<?php  echo $this->createWebUrl('jggManage');?>">活动管理</a></li>

        <li > <a href="<?php  echo $this->createWebUrl('play_user',array('jid'=>$jid));?>">参加用户管理</a></li>

        <li class="active" > <a href="<?php  echo $this->createWebUrl('RecordList',array('jid'=>$jid,'uid'=>$uid));?>">抽奖记录</a></li>
        <li > <a href="<?php  echo $this->createWebUrl('AwardList',array('jid'=>$jid,'uid'=>$uid));?>">中奖记录</a></li>

    </ul>





    <div class="panel panel-info">
        <div class="panel-heading"><span class="label label-success"><?php  echo $jgg['title'];?>=>&nbsp;抽奖记录</span></div>
        <div class="panel-body">
            <form action="./index.php" method="get" class="form-horizontal" role="form">

                <input type="hidden" name="a" value="entry" />
                <input type="hidden" name="c" value="site" />
                <input type="hidden" name="m" value="<?php echo MON_JGG;?>" />
                <input type="hidden" name="do" value="RecordList" />
                <input type="hidden" name="jid" value="<?php  echo $jid;?>" />

                <div class="form-group">
                    <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
                    <div class="col-sm-8 col-lg-9">
                        <input class="form-control" name="keywords" id="" type="text" value="<?php  echo $_GPC['keywords'];?>" placeholder="可查询手机号或昵称">
                    </div>

                    <div class=" col-xs-12 col-sm-2 col-lg-2">
                        <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                    </div>

                </div>




            </form>
        </div>




    </div>



    <a class="btn btn-default" href="javascript:exportData()"><i class="icon-download-alt"></i>导出抽奖记录</a>

    <div class="panel panel-default">
        <div class="table-responsive panel-body">


            <table class="table table-hover">
                <thead>
                <tr>

                    <th style="width:100px;">昵称</th>
                    <th style="width:100px;">姓名</th>
                    <th style="width:120px;">电话</th>
                    <th style="width:100px;">奖品名称</th>
                    <th style="width:100px;">奖品级别</th>

                    <th style="width:100px;">抽奖时间</th>

                    <th style="width:110px;">操作</th>
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

                    <td >


                        <a href="<?php  echo $this->createWebUrl('RecordList', array( 'id' => $row['id'], 'op' => 'delete'))?>"
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
            var url="<?php  echo $this->createWebUrl('Rdownload',array('jid'=>$jid,'uid'=>$uid))?>&keywords"+keyword;
         location.href=url;

    }

</script>



<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>