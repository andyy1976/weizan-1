<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>

<div class="main">
    <ul class="nav nav-tabs">
        <li
         class="active"><a href="<?php  echo $this->createWebUrl('GZ');?>">关注管理</a></li>
        <li> <a href="<?php  echo $this->createWebUrl('GZedit');?>">添加关注</a></li>
        <li><a href="<?php  echo $this->createWebUrl('GZ');?>">关注管理</a></li>
    </ul>

    <div style="padding:15px;">
        <table class="table table-hover">
            <thead class="navbar-inner">
            <tr>
                <th >名称</th>
                <th>链接地址</th>
                <th>创建时间</th>

                <th width="300px" style="text-align: center">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php  if(is_array($list)) { foreach($list as $row) { ?>
            <tr>


                <td><?php  echo $row['title'];?></td>
                <th><input type="text" class="form-control" value="<?php  echo $this->str_murl($this->createMobileUrl('index',array('yid'=>$row['id'])))?>"></th>
                <td><?php  echo date('Y-m-d H:i', $row['createtime'])?></td>



                <td width="300px" style="text-align: center">


                    <a class="btn" rel="tooltip"
                       href="<?php  echo $this->createWebUrl('GZItem',array('yid'=>$row['id']))?>"
                       title="编辑"><i class="glyphicon glyphicon-heart"></i>关注项</a>


                    <a class="btn" rel="tooltip"
                       href="<?php  echo $this->createWebUrl('GZedit',array('id'=>$row['id']))?>" title="编辑"><i class="glyphicon glyphicon-edit"></i>编辑</a>

                    <a href="<?php  echo $this->createWebUrl('Gz', array( 'id' => $row['id'], 'op' => 'delete'))?>"
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

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>