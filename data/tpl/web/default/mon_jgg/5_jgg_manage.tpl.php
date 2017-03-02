<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="main">
    <ul class="nav nav-tabs">
        <li
        <?php  if($operation== 'display') { ?> class="active"<?php  } ?>><a
            href="<?php  echo $this->createWebUrl('jggManage');?>">九宫格活动管理</a></li>
        <li
        <?php  if($operation == 'post') { ?> class="active"<?php  } ?>> <a
            href="<?php  echo create_url('platform/reply/post',array('m'=>'mon_jgg'));?>">添加九宫活动</a></li>


    </ul>


    <div class="panel panel-default">
        <div class="table-responsive panel-body">

            <table class="table table-hover">
                <thead class="navbar-inner">
                <tr>
                    <th style="width:180px;">活动名称</th>
                    <th>活动开始时间</th>
                    <th>活动结束时间</th>
                    <th style="width:400px;">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php  if(is_array($list)) { foreach($list as $row) { ?>
                <tr>


                    <td><?php  echo $row['title'];?></td>
                    <td><?php  echo date("Y-m-d H:i", $row['starttime'])?></td>
                    <td><?php  echo date("Y-m-d H:i",$row['endtime'])?></td>

                    <td>


						<a class="btn" rel="tooltip"                           href="<?php  echo $this->createWebUrl('yzmlist', array('jid'=>$row['id']))?>"                           title="编辑"><i class="glyphicon glyphicon-th-list"></i>验证码</a>
                        <a class="btn" rel="tooltip"
                           href="<?php  echo $this->createWebUrl('RecordList', array('jid'=>$row['id']))?>"
                           title="编辑"><i class="glyphicon glyphicon-th-list"></i>抽奖记录</a>

                        <a class="btn" rel="tooltip"
                           href="<?php  echo $this->createWebUrl('play_user', array('jid'=>$row['id']))?>"
                           title="编辑"><i class="glyphicon glyphicon-user"></i>参与用户</a>

                        <a class="btn" rel="tooltip"
                           href="<?php  echo create_url('platform/reply/post', array( 'm' => 'mon_jgg','rid'=>$row['rid']))?>"
                           title="编辑"><i class="glyphicon glyphicon-edit"></i>编辑</a>

                        <a href="<?php  echo $this->createWebUrl('jggManage', array( 'id' => $row['id'], 'op' => 'delete'))?>"
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


<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>