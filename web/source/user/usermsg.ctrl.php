<?php
/**
 * [WEIZAN System] Copyright (c) 2015 012WZ.COM
 * WeiZan is NOT a free software, it under the license terms, visited http://www.012wz.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');

load()->classs('webapi');
load()->classs('hotel');

$hotel = new hotel();
$webApi = new webapi();
$do = $_GPC['do'];
$gd = $_GPC['gd'];
$ajaxs = $_GPC['ajaxs'];
if($gd != ''){
    $auth = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5055a410afd056bd&redirect_uri=http://weixin.artels.cn/web/index.php?c=user&a=updatepwd&response_type=code&scope=snsapi_base&state=USERMSG#wechat_redirect';

    if($do == 'balancescore'){
        $auth = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5055a410afd056bd&redirect_uri=http://weixin.artels.cn/web/index.php?c=user&a=updatepwd&response_type=code&scope=snsapi_base&state=BALANCESCORE#wechat_redirect';
    }

    if($do == 'coupon'){
        $auth = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5055a410afd056bd&redirect_uri=http://weixin.artels.cn/web/index.php?c=user&a=updatepwd&response_type=code&scope=snsapi_base&state=COUPON#wechat_redirect';
    }

    if( $do == 'deal') {
        $auth = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5055a410afd056bd&redirect_uri=http://weixin.artels.cn/web/index.php?c=user&a=updatepwd&response_type=code&scope=snsapi_base&state=DEAL#wechat_redirect';
    }

    if(empty($_GET['openid'])){
        header('Location:' . $auth);
    }
}




$openid = $_GET['openid'];
$bind_msg = $hotel->idBindWechat($openid);
if(empty($ajaxs)){
    if(!$bind_msg){
        messages('请先将会员卡绑定您的微信再操作',url('user/bandwechat'),'error');
    }
}




//查询酒店接口 信息
$bind_config = $hotel->hotelApiMsg($bind_msg['card_no']);



if($do == 'balancescore'){
    template('user/balancescore');
    exit;
}elseif($do == 'dobalancescore'){
    $params = array(
        'term_merno' => $bind_config['term_merno'],
        'loginid' => $bind_config['loginid'],
        'loginpwd' => $bind_config['loginpwd'],
        'card' => $_POST['card_no'],
        'pwd' => $_POST['card_pwd']
    );
    $balance = $webApi->selectCardinfo($params);
    if(!$balance){
        echo 1;exit;
    }
    echo json_encode($balance);
    exit;
}elseif($do == 'coupon'){
    template('user/coupon');
    exit;
}elseif($do == 'selectcoupon'){
    $params = array(
        'termMerno' => $bind_config['term_merno'],
        'loginid' => $bind_config['loginid'],
        'loginpwd' => $bind_config['loginpwd'],
        'termNo' => $bind_config['termNo'],
        'cardNo' => $_POST['card_no'],
    );
    $couponMsg = $webApi->queryCardTicket($params);
    echo json_encode($couponMsg);
    exit;
}elseif($do == 'deal'){
    template('user/deals');
    exit;
}elseif($do == 'selectdeal'){
    $params = array(
        'term_merno' => $bind_config['term_merno'],
        'loginid' => $bind_config['loginid'],
        'loginpwd' => $bind_config['loginpwd'],
        'begDate' => $_POST['begDate'],
        'endDate' => $_POST['endDate'],
        'term_no' => '',
        'trans_no' => '',
        'card' => $_POST['card_no'],
        'pwd' => ''
    );

    $dealData = $webApi->selectInfo($params);

    echo json_encode($dealData);
    exit;
}

//查询用户信息
$params = array(
    'term_merno' => $bind_config['term_merno'],
    'loginid' => $bind_config['loginid'],
    'loginpwd' => $bind_config['loginpwd'],
    'card' => $bind_msg['card_no'],
    'cerno' => '',
    'mobile' => '',
    'email' => ''
);

$userInfo = $webApi->selectUserInfo($params);

template('user/usermsg');