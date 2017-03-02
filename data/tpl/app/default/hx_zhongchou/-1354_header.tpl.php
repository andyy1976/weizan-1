<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="format-detection" content="email=no">
        <title><?php  echo $title;?></title>
        <meta name="keywords" content="<?php  echo $title;?>" />
        <meta name="description" content="<?php  echo $title;?>" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>style.css" />
        <script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.bgiframe.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.weebox.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>touch.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>juUI.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>plupload/plupload.full.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_PATH;?>script.js"></script>
        <script type='text/javascript' src='<?php echo JS_PATH;?>region.js'></script>
        <?php  echo register_jssdk();?>
        <script>
            function _removeHTMLTag(str) {
                if(typeof str == 'string'){
                    str = str.replace(/<script[^>]*?>[\s\S]*?<\/script>/g,'');
                    str = str.replace(/<style[^>]*?>[\s\S]*?<\/style>/g,'');
                    str = str.replace(/<\/?[^>]*>/g,'');
                    str = str.replace(/\s+/g,'');
                    str = str.replace(/&nbsp;/ig,'');
                }
                return str;
            }
        </script>
    </head>
    <body>
        <div class="navbar theme_color1">
            <div class="nav-wrap-left">
            	<?php  if($_GPC['do'] == 'list') { ?>
                <a href="<?php  echo $this->createMobileUrl('list')?>" class="logo"><img src="<?php  if(!empty($moduleconfig['logo'])) { ?><?php  echo tomedia($moduleconfig['logo'])?><?php  } else { ?><?php echo IMG_PATH;?>logo.png<?php  } ?>"></a>
                <?php  } else { ?>
                <a  onclick="window.history.go(-1);" class="back"><i class="fa fa-chevron-left"></i></a>
                <?php  } ?>
            </div>
            <?php  if(!empty($pagetitle)) { ?><span><?php  echo $pagetitle;?></span><?php  } ?>
            <div class="nav-wrap-right">
                <a class="screen" id="screen" href="javascript:void(0);"><i class="fa fa-search"></i></a>
                <a class="mybtn" href="<?php  echo url('mc/home');?>"><i class="fa fa-user"></i></a>
            </div>
        </div>
    <div class="selectbox1" id="selectbox1">
    <div class="selectbox" id="selectbox"></div>
    <div class="selectbj" id="selectbj">
        <div class="searchbox">
            <form action="<?php  echo $this->createMobileUrl('list2')?>" method="post">
                <div class="search">
                    <div class="seach_text">
                        <input type="text" name="keyword" placeholder="请输入关键字搜索">
                    </div>
                    <div class="blank"></div>
                    <div class="seach_submit pr">
                        <i class="fa fa-search"></i>
                        <input type="submit" value="搜索" class="ps" style="opacity:0;width:100%;height:100%;left:0;">
                         
                            <input type="hidden" name="type" value="0"/>                
                            <input type="hidden" name="redirect" value="1"/>        
                                                                              
                    </div>
                </div>
            </form>
        </div>
        <div id="top_search_bd">
            <ul>
                <li rel="0">
                    <dl>
                        <dt>属性</dt>
                        <dd>
                            <a href="<?php  echo $this->createMobileUrl('list2', array('pcate' => $item['id']))?>">推荐项目</a>
                        </dd>
                        <dd class="c24">
                            <a href="<?php  echo $this->createMobileUrl('list2', array('pcate' => $item['id']))?>">正在预热</a>
                        </dd>
                        <dd class="c23">
                            <a href="<?php  echo $this->createMobileUrl('list2', array('pcate' => $item['id']))?>">最新上线</a>
                        </dd>
                    </dl>
                    <p class="cl"></p>
                    <dl>
                        <dt>分类</dt>
                        <?php  if(is_array($category)) { foreach($category as $item) { ?>
                       	<dd>
                            <a href="<?php  echo $this->createMobileUrl('list2', array('pcate' => $item['id']))?>"  class="c23" ><?php  echo $item['name'];?></a>
                        </dd>
                        <?php  } } ?>
                    </dl>
                </li>
                <li rel="1" style="display:none">
                    <dl>
                        <dt>属性</dt>
                        <dd>
                            <a href="">推荐项目</a>
                        </dd>
                        <dd class="c24">
                            <a href="">正在预热</a>
                        </dd>
                        <dd class="c23">
                            <a href="">最新上线</a>
                        </dd>
                    </dl>
                    <p class="cl"></p>
                    <dl>
                        <dt>分类</dt>
                        <?php  if(is_array($category)) { foreach($category as $item) { ?>
                       	<dd>
                            <a href="<?php  echo $this->createMobileUrl('list2', array('pcate' => $item['id']))?>"  class="c23" ><?php  echo $item['name'];?></a>
                        </dd>
                        <?php  } } ?>
                    </dl>
                </li>
            </ul>
        </div>
    </div>
    <div class="blank"></div>
</div>
<script type="text/javascript">
    $("#top_search_hd .search_cate").bind('click',function(){
        var $obj=$(this);
        var i=$obj.index();
        $obj.attr("checked",true).addClass("cur").siblings().attr("checked",false).removeClass("cur");
        $obj.parent().parent().find("input[name='type']").val($(this).attr("livalue"));
        $("#top_search_bd li").eq(i).fadeIn(300).siblings().hide();
    });
</script>