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
    $auth = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5055a410afd056bd&redirect_uri=http://weixin.artels.cn/web/index.php?c=user&a=updatepwd&response_type=code&scope=snsapi_base&state=UPDATEPWD#wechat_redirect';

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

if($do == 'checkbeforpwd'){
    $params = array(
        'termMerno' => $bind_config['term_merno'],
        'loginid' => $bind_config['loginid'],
        'loginpwd' => $bind_config['loginpwd'],
        'card_no' => $_POST['card_no'],
        'termNo' => $bind_config['termNo'],
        'card_mm' => $_POST['card_mm']
    );

    $data = $webApi->checkCardPass($params);
    if($data == '卡密码正确'){
        $result = 'success';
        echo 1;exit;
    }else{
        $result = 'error';
        echo 2;exit;
    }
}elseif( $do == 'save'){
    $params = array(
        'term_merno' => $bind_config['term_merno'],
        'loginid' => $bind_config['loginid'],
        'loginpwd' => $bind_config['loginpwd'],
        'card' => $_POST['card_no'],
        'pwd1' => $_POST['pwd1'],
        'pwd2' => $_POST['pwd2'],
        'pwd3' => $_POST['pwd3']
    );
    $data = $webApi->updatePwd($params);
    if($data == '密码修改成功!'){
        echo 1;exit;
    }else{
        echo 2;exit;
    }
}

template('user/updatepwd');