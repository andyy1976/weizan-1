<?php defined('IN_IA') or exit('Access Denied');?><?php  if($_GPC['ishot']==1) { ?><?php  $pagetitle = "热门项目";?><?php  } ?>
<?php  if(!empty($_GPC['keyword'])) { ?><?php  $pagetitle = "搜索结果";?><?php  } ?>
<?php  if($_GPC['pcate']) { ?><?php  $pagetitle = $category[$_GPC['pcate']]['name'];$catname = $pagetitle;?><?php  } ?>
<?php  if($_GPC['ccate']) { ?><?php  $pagetitle = $category[$_GPC['pcate']]['name'] . ' - ' . $children[$_GPC['pcate']][$_GPC['ccate']]['name'];$catname = $pagetitle;?><?php  } ?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<div class="wraper"> 
<style type="text/css">
	body{background:#f0f0f0;}
</style>
<div class="deals_index">
	<div class="hide_list">
	  	<div class="abbr">
	  	   	<div class="first_list webkit-box-flex" id="first_list">
	  	   	    <ul>
	  	   	    	<?php  if(is_array($category)) { foreach($category as $item) { ?>
					<li class="directory"><?php  echo $item['name'];?></li>
					<?php  } } ?>
				</ul>
	  	   	</div>
		   	<div class="second_list webkit-box-flex" id="second_list">
		   		<?php  if(is_array($category)) { foreach($category as $item) { ?>
		   		<ul>
		   	    	<li class="two_directory"><a href="<?php  echo $this->createMobileUrl('list2', array('pcate' => $item['id']))?>">全部</a></li>
		   	    	<?php  if(is_array($children[$item['id']])) { foreach($children[$item['id']] as $child) { ?>
		   	    	<li class="two_directory"><a href="<?php  echo $this->createMobileUrl('list2', array('ccate' => $child['id']))?>"><?php  echo $child['name'];?></a></li>
		   	    	<?php  } } ?>
	  	   	    </ul>
	  	   	    <?php  } } ?>
			</div>
	  	</div>
	</div>
 	<div class="main_list">
 	   <ul class="mall-cate webkit-box">
 	   	   	<li class="webkit-box-flex"><?php  if(!empty($catname)) { ?><?php  echo $catname;?><?php  } else { ?>全部分类<?php  } ?> <i class="fa fa-sort-desc ml5"></i></li>
 	   </ul>
 	</div>
<?php  if(is_array($list)) { foreach($list as $item) { ?>
<section class="deal_item_list">
    <a href="<?php  echo $this->createMobileUrl('detail', array('id' => $item['id']))?>" title="项目名称：<?php  echo $item['title'];?>">
        <div class="deal_item_box">
            <!--1-->
            <div class="imgbox">
                <img src="<?php  echo tomedia($item['thumb'])?>" alt="项目名称：<?php  echo $item['title'];?>">
            </div>
            <div class="clear"></div>
            <h3 class="deal_title sizing">项目名称：<?php  echo $item['title'];?></h3>
            <div class="clear"></div>
            <!--2-->
            <div class="paiduan">
                <span class="caption-title">
                    已筹资：<span class="symbol">¥</span><span class="f_money"><?php  echo $item['finish_price'];?></span>&nbsp;&nbsp; 
                    目标：<span class="symbol" style="color:#333">¥</span><span class="f_money" style="color:#333"><?php  echo $item['limit_price'];?></span>
                </span>
                <span class="f_r ">
                	<span class="common common-sprite">
                        <?php  if($item['status'] == 2) { ?>
                            <span class="common common-fail">即将开始</span>
                        <?php  } else { ?>
                            <?php  if($item['finish_price'] >= $item['limit_price']) { ?>
                                <span class="common common-success">已成功</span>
                            <?php  } else { ?>
                                <span class="common common-sprite">筹资中</span>
                            <?php  } ?>
                        <?php  } ?>
                    </span>
                </span>
            </div>
            <div class="clear"></div>
            <!--3-->
            <div class="deal_content_box pd">
                <div class="ui">
                    <?php  if(floor($item['finish_price']*100/$item['limit_price']) >= 100) { ?>
                    <span class="common-success" style="width:100%;"></span>
                    <?php  } else { ?>
                	<span class="progress" style="width:<?php  echo floor($item['finish_price']*100/$item['limit_price'])?>%;"></span>
                    <?php  } ?>
                </div>
                <div class="blank">
                </div>
                <?php  if(time() <= $item['starttime']) { ?>
                <div class="div_dt" style="width:100%;border-right:0">
                    <div class="f_999">离项目开始还有</div>
                    <div class="left_time" data="<?php  echo $item['starttime'] - time()?>">
                        <em class="s day">--</em>
                        <em class="l">天</em>
                        <em class="s hour">--</em>
                        <em class="l">时</em>
                        <em class="s min">--</em>
                        <em class="l">分</em>
                        <em class="s sec">--</em>
                        <em class="l">秒</em>
                    </div>
                </div>
                <?php  } else { ?>
                <div class="div_dt">
                    <span class="num"><?php  echo floor($item['finish_price']*100/$item['limit_price'])?>%</span><br />
                    <span class="til">已达</span>
                </div>
                <div class="div_dt">
                    <?php  $endtime = $item['starttime'] + $item['deal_days'] * 86400?>
                    <?php  if(time() < $endtime) { ?>
                    <span class="num"><?php  echo $item['deal_days'] - floor((time() - $item['starttime'])/86400)?>天</span><br />
                    <span class="til">剩余时间</span>
                    <?php  } else { ?>
                    <span class="num"><?php  echo date('Y-m-d',$endtime)?></span><br />
                    <span class="til">结束时间</span>
                    <?php  } ?>                
                </div>
                <div class="div_dt" style="border:none;">
                    <span class="num"><?php  echo $this->getprojectorder($item['id'])?></span><br />
                    <span class="til">支持者</span>
                </div>
                <?php  } ?>
                <div class="blank"></div>
            </div>
        </div>
    </a>
</section>
<?php  } } ?>	  	
	<div class="pages"><?php  echo $pager;?></div>
	<div class="blank15"></div>
</div>
<div class="blank15"></div>
<script type="text/javascript">
	if($(".left_time").length){
		leftTimeAct(".left_time");
	}
	// 未开始项目倒计时
    function leftTimeAct(left_time){
    	var leftTimeActInv = null;
		clearTimeout(leftTimeActInv);
		$(left_time).each(function(){
			var leftTime = parseInt($(this).attr("data"));
			if(leftTime > 0)
			{
				var day  =  parseInt(leftTime / 24 /3600);
				var hour = parseInt((leftTime % (24 *3600)) / 3600);
				var min = parseInt((leftTime % 3600) / 60);
				var sec = parseInt((leftTime % 3600) % 60);
				$(this).find(".day").html((day<10?"0"+day:day));
				$(this).find(".hour").html((hour<10?"0"+hour:hour));
				$(this).find(".min").html((min<10?"0"+min:min));
				$(this).find(".sec").html((sec<10?"0"+sec:sec));
				leftTime = leftTime-1;
				$(this).attr("data",leftTime);
			}
			else{
				$(this).parent(".div_dt").hide();
				$(this).parent().next().show();
				return false;
			}
		});
		leftTimeActInv = setTimeout(function(){
			leftTimeAct(left_time);
		},1000);
	}
</script>
<script type="text/javascript">
    //筛选分类 
	$(function(){
		var hideList_height = $(document).height();
		$(".hide_list").css("height",hideList_height+"px");
		
		$(".mall-cate>li").each(function(index){
			var $this = $(this);
			$this.bind({
				click:function(e){
					e.stopPropagation();
					// 初始化
					$(".abbr").removeClass("webkit-box");
					$(".hide_list").hide()
					$("#second_list>ul").hide();
					if(!($this.hasClass("cur"))){
						$this.addClass("cur").siblings().removeClass("cur");
						$(".hide_list").show().find(".abbr").eq(index).addClass("webkit-box").find("#second_list>ul").eq(index).show();
						$("#first_list li").each(function(index){
							var $this = $(this);
							$this.click(function(e){
								e.stopPropagation();
								$(".second_list>ul").hide();
								$this.addClass("select").siblings().removeClass("select");
								$(".second_list>ul").eq(index).show();
							})
						})
					}
					else{
						$this.removeClass("cur");
						$(".abbr").eq(index).removeClass("webkit-box");
					}
				} ,
				change:function(){
					
				}
			});
		});
		$(".abbr").bind("click",function(e){
			e.stopPropagation();
		});
		$(document).click(function(){
			$(".mall-cate>li").removeClass("cur");
			$(".abbr").removeClass("webkit-box");
			$(".hide_list").hide();
			$("#second_list>ul").hide();
		})
	})
</script>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footerbar', TEMPLATE_INCLUDEPATH)) : (include template('footerbar', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>