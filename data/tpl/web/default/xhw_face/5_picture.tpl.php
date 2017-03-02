<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
 <div class="panel panel-info">
    <div class="panel-heading">搜索</div>
    <div class="panel-body">
        <form action="./index.php" method="get" class="form-horizontal" role="form">
            <input type="hidden" name="c" value="site" />
            <input type="hidden" name="a" value="entry" />
            <input type="hidden" name="m" value="xhw_face" />
            <input type="hidden" name="do" value="picture" />
            <div class="form-group">
                <label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">编号</label>
                <div class="col-sm-8 col-lg-9">
                    <input class="form-control" name="keywords" id="" type="text" value="<?php  echo $_GPC['keywords'];?>">
                </div>
                                <div class=" col-xs-12 col-sm-2 col-lg-2">
                    <button class="btn btn-default"><i class="fa fa-search"></i> 搜索</button>
                </div>
            </div>
            <div class="form-group">
            </div>
        </form>
    </div>
 
    </div>
 
  <div class="panel panel-default">
        <div class="panel-body table-responsive">
            <table class="table table-hover">
                <thead class="navbar-inner">
                    <tr>
                        <th style="width:40px;">编号</th>
                        <th style="width:150px;">照片</th>
                        <th style="width:100px;">评分</th>
                        <th style="width:120px; text-align:right;">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  if(is_array($list)) { foreach($list as $row) { ?>
                  <tr> 
                    <td><?php  echo $row['id'];?></td>
                    <td><a href="<?php  echo $this->createmobileUrl('item',array('do'=>'itme', 'id'=>$row['id']))?>" target="_blank"><img src="<?php  echo $row['picurl'];?>" width="100"></a></td>
                    <td><?php  echo $row['grade'];?></td>
                  <td style="text-align:right;">
                  <a class="btn btn-default btn-sm" href="#" onclick="drop_confirm('您确定要删除吗?', '<?php  echo $this->createWebUrl('post',array('op'=>'delete', 'id'=>$row['id']))?>');" title="删除"><i class="icon-remove"></i>删除</a>
                    </td>
                </tr>
                <?php  } } ?>
            </tbody>
            </table>
        </div>
        <?php  echo $pager;?>
    </div>
    </div>

<script type="text/javascript">
    function drop_confirm(msg, url){
        if(confirm(msg)){
            window.location = url;
        }
    }
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>