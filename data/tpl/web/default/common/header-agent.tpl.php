<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-base', TEMPLATE_INCLUDEPATH)) : (include template('common/header-base', TEMPLATE_INCLUDEPATH));?>
<div class="gw-container">
	<div class="navbar navbar-static-top" role="navigation" style="padding-top:20px;">
		<div class="container-fluid">
			<a class="navbar-brand gw-logo" href="./?refresh" <?php  if(!empty($_W['setting']['copyright']['blogo'])) { ?>style="background:url('<?php  echo tomedia($_W['setting']['copyright']['blogo']);?>') no-repeat;"<?php  } ?>></a>
			<ul class="nav navbar-nav pull-right" style="padding-top:10px;">
				<a href="<?php  echo url('agent/agent_info/info');?>" class="tile img-rounded">
					<i class="fa fa-comments"></i>
					<span>我的账户</span>
				</a>
				<a href="<?php  echo url('agent/agent_user/list');?>" class="tile img-rounded">
					<i class="fa fa-comments"></i>
					<span>用户管理</span>
				</a>
				<a href="<?php  echo url('agent/agent_site/url');?>" class="tile img-rounded">
					<i class="fa fa-sitemap"></i>
					<span>站点管理</span>
				</a>
				<a href="<?php  echo url('agent/logout');?>" class="tile img-rounded">
					<i class="fa fa-sign-out"></i>
					<span>退出</span>
				</a>
			</ul>
		</div>
	</div>
	
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
							<p><b><?php  echo $msg['error']['0'];?> <?php  echo $msg['error']['1'];?>：</b><?php  echo $msg['error']['2'];?></p>
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
							<p>[<a href="javascript:history.go(-1);" class="alert-link">点击这里返回上一页</a>] &nbsp; [<a href="./?refresh" class="alert-link">首页</a>]</p>
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
</script>