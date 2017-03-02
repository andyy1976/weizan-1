<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<div class="wraper"> 
<!-- 中间 开始 -->
<div class="article_cate_index">
	<!-- 新闻分类 开始 -->
	<nav class="site" id="article_cate">
		<?php  if(is_array($category)) { foreach($category as $row) { ?>
			<a href="<?php  echo $this->createMobileUrl('news',array('cateid'=>$row['id']))?>" <?php  if($cateid == $row['id']) { ?>class="cur"<?php  } ?>><?php  echo $row['title'];?></a>
		<?php  } } ?>
	</nav>
	<!-- 新闻分类 结束 -->
	<div class="clear"></div>
	<div class="mod_main" style="padding-top:0">
		<!-- 文章列表 开始 -->
		<section class="ls">
		<?php  if(is_array($news)) { foreach($news as $row) { ?>
		<div class="it">    
		    <a href="<?php  echo $this->createMobileUrl('news_detail',array('id'=>$row['id']))?>" class="h4 h4Spot">
		       	<div class="des">
		    		<h4 class="ttl">【<?php  echo $this->getnewscategory($row['cateid'])?>】<?php  echo $row['title'];?></h4>
		        	<time class="muted"><?php  echo date('Y-m-d H:i:s',$row['createtime'])?></time>
		        </div>
		    </a>
		</div>
		<?php  } } ?>
		</section>
		<!-- 文章列表 结束 -->	
		<div class="blank15"></div>
		<div class="pages"><?php  echo $pager;?></div>
		<div class="blank15"></div>
	</div>
</div>	
<!-- 中间 结束 $(this).addClass("cur");-->
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footerbar', TEMPLATE_INCLUDEPATH)) : (include template('footerbar', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>