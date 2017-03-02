<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"<?php  if($initNG) { ?> ng-app<?php  } ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  echo $title;?></title>
<link type="text/css" rel="stylesheet" href="../addons/we7_wxwall/template/resource/common.css?v=<?php echo TIMESTAMP;?>" />
<script type="text/javascript" src="../addons/we7_wxwall/template/resource/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../addons/we7_wxwall/template/resource/common.js?v=<?php echo TIMESTAMP;?>"></script>
</head>
<body>
<?php  if(!empty($GLOBALS['handlestips'])) { ?>
<div class="alert alert-error" style="margin:0;-webkit-border-radius:0;-moz-border-radius:0;border-radius:0;"><i class="icon-warning-sign"></i> 此模块含有特殊回复处理，请在配置完模块后，去 <a href="<?php  echo create_url('rule/system/message')?>">特殊消息类型处理</a> 页面进行启用配置。</a></div>
<?php  } ?>
<style type="text/css">
<?php  if($wall['background']) { ?>
body {background-image:url(<?php  echo $_W['attachurl'];?><?php  echo $wall['background'];?>); background-repeat: no-repeat; background-size: cover;}
<?php  } ?>
<?php  if($wall['logo']) { ?>
.topbox {background:url('<?php  echo $_W['attachurl'];?><?php  echo $wall['logo'];?>') no-repeat left center; max-height: 140px;}
<?php  } else { ?>
.topbox {background:url('../addons/we7_wxwall/template/resource/top.png') no-repeat left -20px;}
<?php  } ?>
</style>