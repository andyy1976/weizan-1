<?php defined('IN_IA') or exit('Access Denied');?>
<!doctype html>
<html>
<head>
    <title><?php  echo $shake['title'];?></title>
    <meta charset="UTF-8">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta content="telephone=no" name="format-detection">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/>
    <link rel="stylesheet" href="<?php echo MON_QMSHAKE_RES;?>css/mobile.common.css?static_version=1533239074692">
    <link rel="stylesheet" type="text/css" href="<?php echo MON_QMSHAKE_RES;?>css/common.css">
    <link rel="stylesheet" type="text/css" href="<?php echo MON_QMSHAKE_RES;?>css/index.css?v=4">
    <link rel="stylesheet" type="text/css" href="<?php echo MON_QMSHAKE_RES;?>css/loading.css?v=4">
    <script src="<?php echo MON_QMSHAKE_RES;?>js/loading.js"></script>
    <script type="text/javascript">
        window.slotData = {};

        var href = window.location.href;
        var userAgent = navigator.userAgent.toLowerCase();
        if(
                href.indexOf('#') > 0 &&
                userAgent.indexOf('micromessenger') === -1 &&
                userAgent.indexOf('weibo') === -1 //&&
        //userAgent.indexOf('qq') === -1
        ) {
            window.location.href = decodeURIComponent(href.split('#')[1]);
        }
        window.iFrameHeight = function(id) {
            var ifm= document.getElementById(id);
            var subWeb = document.frames ? document.frames[id].document : ifm.contentDocument;
            if(ifm != null && subWeb != null) {
                ifm.height = subWeb.body.scrollHeight;
            }
        }
        window.bodyLoading = function() {
            window.isBoayLoaded = true;
            if(window.isApiLoaded) {
                window.loading.hide();
            }
        }

    </script>
    <style>
        .app-guide {
            background-color: rgba(0, 0, 0, .64);
            bottom: 0;
            box-shadow: 0 -1px 1px rgba(0, 0, 0, .1);
            height: 50px;
            left: 0;
            position: fixed;
            width: 100%;
            z-index: 1999;
        }
        .app-guide .guide-cont {
            display: block;
            padding: 4px 0 4px 20px;
            position: relative;
        }
        .app-guide .guide-close {
            height: 20px;
            left: 0;
            line-height: 999em;
            overflow: hidden;
            position: absolute;
            top: 0;
            width: 20px;
        }

        .app-guide .guide-close:before {
            background-color: #262626;
            border-radius: 28px;
            bottom: 2px;
            content: "";
            height: 28px;
            position: absolute;
            right: 3px;
            width: 28px;
        }

        .app-guide .guide-close:after {
            background: url("<?php echo MON_QMSHAKE_RES;?>/images/477096d1jw1esladaxya6j201v01w741.jpg")
            no-repeat scroll 0 0/9px auto rgba(0, 0, 0, 0);
            content: "";
            height: 9px;
            left: 2px;
            position: absolute;
            top: 4px;
            width: 9px;
        }

        .app-guide .guide-slogon, .app-guide .guide-dc {
            color: #fff;
            font-size: 16px;
            line-height: 20px;
            padding-left: 50px;
        }

        .app-guide .guide-logo {
            max-height: 42px;
            max-width: 42px;
            margin-right: 8px;
            vertical-align: top;
            border: 0 none;
            position: absolute;
        }
        img {
            width: auto;
            height: auto;
            max-width: 100%;
            vertical-align: middle;
            border: 0;
            -ms-interpolation-mode: bicubic;
        }

        .shake_area {
            padding-top:1em;
            padding-bottom:2em;
            background: #e4432d url("<?php  echo MonUtil::defaultImg(MonUtil::$IMG_SHAKE_BG,$shake)?>") center no-repeat;
            background-size: 100% auto;
            -moz-background-size: 100% auto;
            -webkit-background-size: 100% auto;
        }

        #mcover {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: none;
            z-index: 20000;
        }
    </style>

    <link rel="stylesheet" type="text/css"
          href="<?php echo MON_QMSHAKE_RES;?>/css/sweet-alert.css">
    <script type="text/javascript" src="<?php echo MON_QMSHAKE_RES;?>/js/sweet-alert.min.js"></script>

</head>
<body onload="bodyLoading();">
<div class="loading tx_pageLoading" id="tx_pageLoading"><center><var id="loading_var">0%</var><sub></sub><p>马上开始摇一摇…</p></center></div>
<div id="body" >
    <dl class="prodoct_box" ng-show="is_has_product_info" style="display:none;">
        <dt>
            <img ng-src="share.goods_img_url">
        </dt>
        <dd>
            <a href="javascript:void(0);" class="close" id="tx_btnCloseProduct"></a>
            <h2>好友正在抢福利</h2>
            <p><span class="name" ng-bind="share.goods_name"></span><span>价值</span><span ng-bind="share.goods_price"></span><span>元</span></p>
        </dd>
    </dl>
    <div class="area_box" >
        <a href="javascript:void(0);" class="current_areat_button">
            <span class="name" id="btn_active_rule">活动规则</span>
            <span class="arrow_right"></span>
        </a>

    </div>

    <div class="shake_area">
        <div class="shake_area_title_box">
            <div  style="display:block;">
                <img class="title" src="<?php  echo MonUtil::defaultImg(MonUtil::$IMG_TITLE_BG,$shake)?>" alt="" >
            </div>
            <div ng-show="title" class="title_text" style="display:none;">
                <span ng-bind="title"></span>
            </div>
        </div>
        <div class="shake_box">
            <img class="bg" src="<?php echo MON_QMSHAKE_RES;?>images/shake_circle_bg.png">
            <img class="bg circle" src="<?php echo MON_QMSHAKE_RES;?>images/shake_circle.png">
            <div id="zoomIn" class="step_1"></div>
            <img id="dotDefault" class="dots" src="<?php echo MON_QMSHAKE_RES;?>images/icon_dots_default.png">
            <img id="dotHighlight" class="dots highlight" src="<?php echo MON_QMSHAKE_RES;?>images/icon_dots.png">

            <div class="inside">
                <img id="gesture" class="gesture" src="<?php echo MON_QMSHAKE_RES;?>images/gesture.png" style="display:none">
                <img id="gesture2" src="<?php echo MON_QMSHAKE_RES;?>images/not_choose.png" style="display:none">
                <div class="mid">
                    <div id="doorR" class="door_r"></div>
                    <div id="doorL" class="door_l"></div>
                </div>
            </div>
        </div>
        <p class="shake_btn"><a id="startBtn" href="javascript:;" class="shake_start">摇摇有惊喜</a></p>

        <div class="shake_tip" ng-bind="near_merchant.conductWord"></div>
    </div> <!-- shake area -->

    <div class="list_box">
        <div class="content">
            <div ng-show="is_show_lucky_guy_list" style="display:none" class="winner_list_box">
                <div class="winner_list">
                    <div class="winner_list_content">
                        <ul>
                            <li ng-repeat="lucky in lucky_guy_list">
                                手机用户<span ng-bind="lucky.phone"></span>摇中价值<b><span ng-bind="lucky.price"></span></b>元的<span ng-bind="lucky.goods_name"></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="line" ng-show="is_show_lucky_guy_list" style="display:none" >

            </div>


            <div class="product_list">
                <h2>
                    <a href="javascript:void(0);" id="my_prize">我的中奖记录</a>
                    <a href="javascript:void(0)" id="prize">奖品</a>
                </h2>
                <ul ng-show="isHasItems" id="ul_prize" style="display:none">
                    <li ng-repeat="item in slot_machine.items">
                        <div class="img">
                            <img ng-src="item.goods_img">
                        </div>
                        <div class="info">
                            <h3 ng-bind="item.goods_name"></h3>
                            <h4><span ng-bind="item.tgs"></span></h4>
                            <h4><span ng-bind="item.summary"></span></h4>
                            <p>
                                <span>
                                   <span></span>
                                    <span class="red">￥</span>
                                    <span ng-bind="item.price" class="prise red"></span>
                                </span>

                                <b ng-bind="item.remain"></b>

                            </p>

                        </div>
                    </li>
                </ul>


                    <ul  id="ul_myprize" style="display:none">
                        <?php  if(!empty($userPrizes)) { ?>
                        <?php  if(is_array($userPrizes)) { foreach($userPrizes as $userp) { ?>
                            <li >
                                <div class="img">
                                    <img src="<?php  echo MonUtil::getpicurl($userp['pimg'])?>">
                                </div>
                                <div class="info">
                                    <h3 ><?php  echo $userp['pname'];?></h3>
                                    <h4>提供商：<a href="<?php  echo $userp['tgs_url'];?>" style='font-size:1em' ><?php  echo $userp['tgs'];?></a></h4>
                                    <h4>
                                        <span >中奖时间:<?php  echo date("Y-m-d H:i", $userp['createtime'])?></span>
                                    </h4>
                                    <p>
                                <span>
                                <span></span>
                                <span class="red">￥</span>
                                <span  class="prise red"><?php  echo $userp['price'];?></span>
                                </span>
                                        <b><?php  if($userp['status']==1) { ?><a href="<?php  echo MonUtil::str_murl($this->createMobileUrl('duihuan',array('rid'=>$userp['id'],'oid'=>$openid,'from'=>$from),true))?>">兑换</a><?php  } ?><?php  if($userp['status']==2) { ?>已兑换<?php  } ?></b>
                                    </p>

                                </div>
                            </li>
                        <?php  } } ?>
                        <?php  } else { ?>
                            <li>暂还没有中奖记录，赶紧加油哦！</li>
                        <?php  } ?>

                    </ul>

                <div  class="product_list_info" style="display:block;"><?php  echo $shake['copyright'];?></div>
                <div class="tx_loading product_list_loading" style="display:none;">正在载入...</div>
            </div>
        </div>
        <div class="bottom">

        </div>
    </div>

    <div class="dialog_cover" id="dialog_cove" style="display:none;"></div>


    <div class="active_rule_box" style="display:none;">
        <div class="title">
            <h2>活动规则</h2>
            <span class="close"></span>
        </div>
        <div class="content" ng-show="!slot_machine_rule" style="display:none;">
            <?php  echo $shake['rule'];?>
        </div>
        <div class="content" ng-show="slot_machine_rule" style="display:none;">
            <p>
                <span ng-bind="slot_machine_rule"></span>
            </p>
        </div>
    </div>


    <div class="error_dialog error_dialog_drop" id="error_dialog" style="display:none">
        <div class="title">哎呀竟然没中！</div>
        <div class="content">
            <div class="img">
                <img src="<?php echo MON_QMSHAKE_RES;?>images/come_late.png">
            </div>
            <div>
                <button  type="button" class="buttonDefault" id="btn_reset">再玩一次</button>
            </div>
        </div>
    </div>

    <div class="error_dialog error_dialog_drop" id="stop_dialog" style="display:none">
        <div class="content">
            <div class="img">
                <img src="<?php echo MON_QMSHAKE_RES;?>images/come_late.png">
            </div>
            <div class="text">活动已经结束了～</div>
            <div>
                <a  href="#" class="buttonDefault" id="btn_reset">看看更多中奖机会</a>
            </div>
        </div>
    </div>
</div>

<div style="height:0px;overflow:hidden;">
    <audio  id="audio_start_shake" controls="controls" preload="auto">
        <source src="<?php echo MON_QMSHAKE_RES;?>images/shake_first_two_frame.mp3" type="audio/mpeg" />
    </audio>
    <audio  id="audio_start_win" controls="controls" preload="auto">
        <source src="<?php echo MON_QMSHAKE_RES;?>images/tiger_win_sound2.mp3" type="audio/mpeg" />
    </audio>
</div>
<?php  if($shake['top_banner_show'] == 1) { ?>
<div id="bannerDowm" class="app-guide"><a class="guide-cont ad_link" href="<?php  echo $shake['top_banner_url'];?>">
    <img class="guide-logo" alt="" src="<?php  echo MonUtil::getpicurl($shake['top_banner'])?>">

    <div class="guide-slogon"><?php  echo $shake['top_banner_title'];?></div>
</a> <span class="guide-close">关闭</span>

</div>
<?php  } ?>

<div id="mcover" onclick="$(this).hide()"><img src="<?php  echo MonUtil::defaultImg(MonUtil::$IMG_SHARE_BG,$shake)?>"></div>

<iframe src="" id="end_error_dialog" scrolling="no" onload="iFrameHeight('end_error_dialog')"></iframe>
<iframe src="" id="success_dialog" scrolling="no" onload="iFrameHeight('success_dialog')"></iframe>

<script src="<?php echo MON_QMSHAKE_RES;?>js/zepto.min.js"></script>
<script src="<?php echo MON_QMSHAKE_RES;?>js/render.js"></script>
<script src="<?php echo MON_QMSHAKE_RES;?>js/scroll_loading.js"></script>
<script src="<?php echo MON_QMSHAKE_RES;?>js/alert_error.js?v=2.0"></script>
<script src="<?php echo MON_QMSHAKE_RES;?>js/list.js"></script>


<script src="<?php echo MON_QMSHAKE_RES;?>js/fx.js"></script>
<script src="<?php echo MON_QMSHAKE_RES;?>js/shake.min.js"></script>
<script src="<?php echo MON_QMSHAKE_RES;?>js/animate.js?v=2.1"></script>
<script src="<?php echo MON_QMSHAKE_RES;?>js/index.js?v=6.2"></script>
</body>
<script>


    var DataUrl="<?php  echo MonUtil::str_murl($this->createMobileUrl('ajaxShake',array('sid'=>$shake['id']),true))?>";

    var PrizeUrl="<?php  echo MonUtil::str_murl($this->createMobileUrl('GetGift',array('sid' => $shake['id'],'from'=>$from,'oid'=>$openid),true))?>";

    var IMG_PRE="<?php  echo $_W['attachurl'];?>";
    var SuccessUrl = "<?php  echo MonUtil::str_murl($this->createMobileUrl('win_prize',array('sid'=>$shake['id'],'from'=>$from,'oid'=>$openid),true))?>";
    $(function(){


        $("#my_prize").click(function(){
            $("#ul_prize").hide();
            $("#ul_myprize").show();
        });

        $("#prize").click(function(){
            $("#ul_prize").show();
            $("#ul_myprize").hide();
        });

        $(".guide-close").click(function(){
            $("#bannerDowm").hide();
        });

       var follow = "<?php  echo $follow;?>";

        if (follow ==1){
            showFollowDialog();
        }

    });

    function showFollowDialog()
    {
        swal({
            title: "提示",
            text: "<?php  echo $shake['follow_dlg_tip'];?>",
            type: "warning",
            showCancelButton: false,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "<?php  echo $shake['follow_btn_name'];?>",
            closeOnConfirm: false },
                function(){

                    window.top.location.href ="<?php  echo $shake['follow_url'];?>";

                });
    }


    function winMsg(msg) {
       alert(msg);
    }


    function shareDialogMsg(msg) {

        swal({
                    title: "提示",
                    text: msg,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "分享",
                    cancelButtonText: "取消",
                    closeOnConfirm: false },
                function(){
                     $("#mcover").show();
                });
        }

    function dialogMsg(msg) {

             swal({
                    title: "提示",
                    text: msg,
                    type: "warning",
                    showCancelButton: false,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                    closeOnConfirm: true },
                function(){

                });
    }
</script>

<?php  echo register_jssdk(false);?>
<script type="text/javascript">



        wx.ready(function () {
            sharedata = {
                title: "<?php  echo $shake['share_title'];?>",
                desc: "<?php  echo $shake['share_content'];?>",
                link: "<?php  if($shake['share_url']) { ?><?php  echo $shake['share_url'];?><?php  } else { ?><?php  echo MonUtil::str_murl($this->createMobileUrl('Index',array('sid'=>$shake['id'],'from'=>$from,'oid'=>$oid),true))?><?php  } ?>",
                imgUrl: "<?php  echo $_W['attachurl'];?><?php  echo $shake['share_icon'];?>",
                success: function(){

                    $.post("<?php  echo MonUtil::str_murl($this->createMobileUrl('userShare',array('sid'=>$shake['id']),true))?>",function(res){
                        $("#mcover").hide();
                        if (res.code==250) {
                               var tipMsg ="";
                            if (res.leftShare !=0) {
                                tipMsg="恭喜您获得了"+res.awardCount+"次抽奖机会，您还有"+tipMsg+"次抽奖机会";
                             } else {
                                tipMsg="恭喜您获得了"+res.awardCount+"次抽奖机会!";
                            }
                            swal({
                                        title: "提示",
                                        text: tipMsg,
                                        type: "success",
                                        showCancelButton: false,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "确定",
                                        closeOnConfirm: true },
                                    function(){
                                        window.location.reload();
                                    });



                        }
                    },'json');
                },
                cancel: function(){

                }
            };
            wx.onMenuShareAppMessage(sharedata);
            wx.onMenuShareTimeline(sharedata);
        });


</script>

</html>
