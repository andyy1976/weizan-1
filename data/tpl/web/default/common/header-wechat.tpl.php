<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-wechat-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-wechat-base', TEMPLATE_INCLUDEPATH));?>
<meta charset="utf-8"/>
<div class="">
    <div class="container-fluid">
        <?php  if(defined('IN_MESSAGE')) { ?>
        <div>
            <div class="jumbotron clearfix alert alert-<?php  echo $label;?>">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2">
                        <i class="fa fa-5x fa-<?php  if($label=='success') { ?>check-circle<?php  } ?><?php  if($label=='danger') { ?>times-circle<?php  } ?><?php  if($label=='info') { ?>info-circle<?php  } ?><?php  if($label=='warning') { ?>exclamation-triangle<?php  } ?>"></i>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10">
                        <?php  if(is_array($msg)) { ?>
                        <h2>MYSQL 错误：</h2>
                        <p><?php  echo cutstr($msg['sql'], 300, 1);?></p>
                        <p><b><?php  echo $msg['error']['0'];?> <?php  echo $msg['error']['1'];?></b><?php  echo $msg['error']['2'];?></p>
                        <?php  } else { ?>
                        <h2><?php  echo $caption;?></h2>
                        <p><?php  echo $msg;?></p>
                        <?php  } ?>
                        <?php  if($redirect) { ?>
                        <p><a href="<?php  echo $redirect;?>" class="alert-link">如果你的浏览器没有自动跳转，请点击此链接</a></p>
                        <script type="text/javascript">
                            setTimeout(function () {
                                location.href = "<?php  echo $redirect;?>";
                            }, 3000);
                        </script>
                        <?php  } else { ?>
                        <p>[<a href="javascript:history.go(-1);" class="alert-link">点击这里返回上一页</a>] &nbsp; [<a href="./?refresh" class="alert-link">��ҳ</a>]</p>
                        <?php  } ?>
                    </div>
                </div>
            </div>
            <?php  } else { ?>
            <div class="well">
                <?php  } ?>
<script>
	var h = document.documentElement.clientHeight;
	$(".gw-container").css('min-height',h);
	<?php  echo site_profile_perfect_tips();?>
</script>