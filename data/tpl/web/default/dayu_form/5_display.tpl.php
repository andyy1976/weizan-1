<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
</style>
<script type="text/javascript">
    $(function() {
        $(".main").delegate("span.switch", "click", function() {
                a.attr("class", "fa fa-play");
</script>
<ul class="nav nav-tabs">
    <li class="active"><a href="<?php  echo $this->createWebUrl('display')?>">表单列表</a></li>
    <li><a href="<?php  echo $this->createWebUrl('post')?>">新建表单</a></li>
</ul>
<div class="main">
            <div class="form-group">
                <?php  } } ?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>