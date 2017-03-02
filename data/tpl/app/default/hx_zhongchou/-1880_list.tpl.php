<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('header', TEMPLATE_INCLUDEPATH)) : (include template('header', TEMPLATE_INCLUDEPATH));?>
<div class="wraper"> 
<script type="text/javascript" src="<?php echo JS_PATH;?>TouchSlide.1.1.js"></script>
<!--banner 开始 -->
<style type="text/css">
body{background: #f0f0f0;}
</style>
<section class="index">
    <div class="oComment_height">
        <nav class="index_nav">
            <ul class="webkit-box">
                <li class="curr webkit-box-flex"><a href="<?php  echo $this->createMobileUrl('list2')?>">产品众筹</a></li>
                <li class="webkit-box-flex"><a href="<?php  echo $this->createMobileUrl('news')?>">新闻资讯</a></li>
                <li class="nav_last webkit-box-flex"><a href="<?php  echo $this->createMobileUrl('category')?>">全部分类</a></li>  
            </ul>
            <i id="nav_line"></i>
        </nav>
        <div class="oComment_1" style="padding-top:49px;">
             <!--banner 开始 -->
             <div id="slideBox" class="banner">
                <div class="bd">
                    <ul>
                    <?php  if(is_array($advs)) { foreach($advs as $adv) { ?>
                        <li>
                            <a href="<?php  if(empty($adv['link'])) { ?>#<?php  } else { ?><?php  echo $adv['link'];?><?php  } ?>"><img src="<?php  echo tomedia($adv['thumb']);?>"></a>
                        </li>
                    <?php  } } ?>
                    </ul>
                </div>
                <div class="hd">
                    <ul></ul>
                </div>
            </div>
            <script type="text/javascript">
                if($("#slideBox .bd ul").find('li').length>1){
                    TouchSlide({ 
                        slideCell:"#slideBox",
                        titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
                        mainCell:".bd ul", 
                        effect:"leftLoop", 
                        autoPage:true,//自动分页
                        autoPlay:true //自动播放
                    });
                }
                if($("#slideBox > .hd").find("li").length <=1){
                    $("#slideBox > .hd").hide();
                }
            </script>
                        <!--banner 结束 -->
            <!-- 首页分类 开始 -->
            <div class="index_category sizing" id="category_slidebox">
                <div class="bd">
                    <ul>
                    	<li class="itemss">
                    		<?php  $i = 1;?>
                    		<?php  if(is_array($category)) { foreach($category as $item) { ?>
                    		<div class="items">
                                <div class="item bg<?php  echo ($i - 6*floor($i/6))?>">
                                    <a href="<?php  echo $this->createMobileUrl('list2', array('pcate' => $item['id']))?>" class="">
                                        <span><?php  echo $item['name'];?></span>
                                    </a>
                                </div>
                            </div>
                            <?php  $i ++;?>
                            <?php  } } ?>
                        </li>
                    </ul>
                </div>
                <div class="hd">
                    <ul></ul>
                </div>
            </div>
            <script type="text/javascript">
                if($("#category_slidebox .bd ul").find('li').length>1){
                    TouchSlide({ 
                        slideCell:"#category_slidebox",
                        titCell:"#category_slidebox .hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
                        mainCell:"#category_slidebox .bd ul", 
                        effect:"leftLoop", 
                        autoPage:true,//自动分页
                        autoPlay:false //自动播放
                    });
                }
                if($("#category_slidebox .hd").find("li").length <=1){
                    $("#category_slidebox .hd").hide();
                }
            </script>
            <!-- 首页分类 结束 -->
            <!--list 开始 -->
            <div class="blank10"></div>
            <h2 class="h2-title bdl sizing">
                最新创意
                <span class="f_r">
                	<a href="<?php  echo $this->createMobileUrl('list2')?>">更多产品项目&nbsp;<i class="fa fa-angle-right"></i></a>
                </span>
            </h2>
            <div class="tabul-box">
                <a name="classify"></a>
                <div class="tabul-div">
                    <ul class="tab-ul">
                        <li>
                            <a class="current">综合推荐</a>
                        </li>
                        <li>
                            <a href="<?php  echo $this->createMobileUrl('list2', array('ishot'=>1))?>">推荐项目</a>
                        </li>
                        <li>
                            <a href="<?php  echo $this->createMobileUrl('list2', array('isyure' => 1))?>">正在预热</a>
                        </li>
                        <li>
                            <a href="<?php  echo $this->createMobileUrl('list2', array('isnew' => 1))?>">最新上线</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php  if(is_array($rlist)) { foreach($rlist as $item) { ?>
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
                    已筹资：<span class="symbol">¥</span><span class="f_money"><?php  echo $this->getFinishPrice($item['id'])?></span>&nbsp;&nbsp; 
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
                    <?php  if(floor($this->getFinishPrice($item['id'])*100/$item['limit_price']) >= 100) { ?>
                    <span class="common-success" style="width:100%;"></span>
                    <?php  } else { ?>
                	<span class="progress" style="width:<?php  echo floor($this->getFinishPrice($item['id'])*100/$item['limit_price'])?>%;"></span>
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
                    <span class="num"><?php  echo floor($this->getFinishPrice($item['id'])*100/$item['limit_price'])?>%</span><br />
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
   
        <div class="readall">
            <a href="<?php  echo $this->createMobileUrl('list2')?>"><span class="f_l ck">更多产品众筹</span><span class="f_r jh"><i class="fa fa-angle-right"></i></span></a>
        </div>
            <div class="blank5"></div>
</section>
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
</div>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footerbar', TEMPLATE_INCLUDEPATH)) : (include template('footerbar', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('footer', TEMPLATE_INCLUDEPATH)) : (include template('footer', TEMPLATE_INCLUDEPATH));?>
