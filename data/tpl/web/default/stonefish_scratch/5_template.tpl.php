<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
/*listShow-模板列表*/
.u-listShow { width: 222px; border-radius:6px; overflow: hidden; }
.u-listShow .item-top { position: relative; height: 240px; width: 222px; overflow: hidden; }
.u-listShow .item-top img { height: 240px; width: 222px;}
.u-listShow .item-top span { display: none; position: absolute; top: 0; left: 0; z-index: 4; width: 100%; height: 100%; background: rgba(255,255,255,0.35); }
.u-listShow .item-top p { position: absolute; top: 100%; left: 0; z-index: 5; width: 202px; height: 202px; padding: 10px; 
	-webkit-transition: top .2s;
	   -moz-transition: top .2s;
	    -ms-transition: top .2s;
	     -0-transition: top .2s;
	        transition: top .2s;
}
.u-listShow .item-top p.show { top: 0; }
.u-listShow .item-top p img { width: 100%; }
.u-listShow .item-bottom { position: relative; }
.u-listShow .item-bottom .tit { position: relative; height: auto; padding:10px 10px 0; }
.u-listShow .item-bottom .tit h4 { width: 170px; height: 20px; line-height: 20px; padding-bottom: 0px; overflow: hidden; margin-top: 8px;}
.u-listShow .item-bottom .tit h4 a { font-size: 16px; color: #333; }
.u-listShow .item-bottom .tit p { color: #999; }
.u-listShow .item-bottom .tit p a { color: #666; }
.u-listShow .item-bottom .tit .icon-qr { position: absolute; right: 12px; top: 12px; width: 32px; height: 32px; cursor: pointer; }
.u-listShow .item-bottom .con { position: relative; width: 100%; height: 40px; overflow: hidden; border-top: 1px solid #f4f4f4; }
.u-listShow .item-bottom .con p { width: 140px; padding-left: 10px; padding-top: 12px; line-height: 14px; }
.u-listShow .item-bottom .con p a,
.u-listShow .item-bottom .con p em { display: inline-block; min-width: 5px; height: 14px; margin-bottom: 14px; color: #999; line-height: 100%; }
.u-listShow .item-bottom .con strong { position: absolute; top: 12px; right: 10px; display: block; width: 175px; text-align: right; }
.u-listShow .item-bottom .con strong a { color: #333; }
.u-listShow .item-bottom .con strong a:hover,
.u-listShow .item-bottom .con p a:hover,
.u-listShow .item-bottom .tit h4 a:hover,
.u-listShow .item-bottom .tit p a:hover { color: #5fb336; }
.u-listShow:hover .item-top span { display: inline-block; }
@media screen and (max-width: 496px) {
	.u-listShow .item-top,
	.u-listShow .item-bottom  { float: left; width: 50%; height: auto; }
	.u-listShow.item-top p { display: none; }
	.u-listShow .item-bottom { background: #fff; }
	.u-listShow .item-bottom .tit .icon-qr { display: none; }
	.u-listShow .item-bottom .con strong { display: none; }
}
.f-card { box-shadow:0 1px 3px rgba(127, 127, 127, 0.4); }
.f-card:hover { box-shadow:0 1px 1px rgba(127, 127, 127, 0.4); }
</style>
<div class="main">
	<ul class="nav nav-tabs">
		<li<?php  if($_GPC['do'] == 'manage') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>"> 管理幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'template' || $_GPC['do'] == '' ) { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('template');?>"> 管理活动模板</a></li>
        <li<?php  if($_GPC['do'] == 'templatepost') { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/templatepost',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加活动模板</a></li>
		<li<?php  if($_GPC['do'] == 'tmplmsg') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('tmplmsg');?>"> 管理消息模板</a></li>
        <li<?php  if($_GPC['do'] == 'tmplmsgpost') { ?> class="active"<?php  } ?>><a href="<?php  echo url('site/entry/tmplmsgpost',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加消息模板</a></li>
	</ul>    
    <div class="panel panel-info">
	<div class="panel-heading">筛选</div>
	<div class="panel-body">
		<form action="./index.php" method="get" class="form-horizontal" role="form">
			<input type="hidden" name="c" value="site" />
			<input type="hidden" name="a" value="entry" />
        	<input type="hidden" name="m" value="stonefish_scratch" />
        	<input type="hidden" name="do" value="template" />
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-1 control-label">关键字</label>
				<div class="col-xs-12 col-sm-8 col-lg-9">
					<input class="form-control" name="keyword" id="" type="text" value="<?php  echo $_GPC['keyword'];?>">
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
	<div>
		<div id="ListBox">
		<?php  if(is_array($list)) { foreach($list as $row) { ?>
			<div class="item">
				<div class="u-listShow f-card">
					<div class="item-top">
						<a href="<?php  echo $this->createWeburl('templatepost',array('id'=>$row['id']))?>" style="color: #000;"><img alt="<?php  echo $row['title'];?>" src="<?php  echo toimage($row['thumb'])?>"></a>
					</div>
					<div class="item-bottom s-bg-fff" style="">
						<div class="tit">
							<h4 title="<?php  echo $row['title'];?>"><a href="<?php  echo $this->createWeburl('templatepost',array('id'=>$row['id']))?>"><?php  echo cutstr($row['title'],8)?></a></h4>
						</div>
						<div class="con">
						<p>by stonefish</p>
						<strong class="f-tr"><a href="<?php  echo $this->createWeburl('templatedel',array('id'=>$row['id']))?>">【删除】</a></strong>
						</div>
					</div>
				</div>
			</div>
		<?php  } } ?>
		</div>
		<?php  echo $pager;?>		
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>