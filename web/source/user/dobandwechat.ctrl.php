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


//查询酒店接口 信息
$bind_config = $hotel->hotelApiMsg($_POST['card_no']);

//查询会员卡信息
$params = array(
    'term_merno' => $bind_config['term_merno'],
    'loginid' => $bind_config['loginid'],
    'loginpwd' => $bind_config['loginpwd'],
    'card' => $_POST['card_no'],
    'pwd' => $_POST['card_pwd']
);
$cardInfo = $webApi->selectCardinfo($params);
if(!$cardInfo){
    $params = array(
            'termMerno' => $bind_config['term_merno'],
            'loginid' => $bind_config['loginid'],
            'loginpwd' => $bind_config['loginpwd'],
            'termNo' => $bind_config['termNo'],
            'card_no' => $_POST['card_no'],
            'card_pwd' => $_POST['card_pwd'],
            'id_no' => $_POST['id_no']
    );

    $openCard = $webApi->issueCard($params);
    if($openCard == '交易成功'){
        messages('您的会员卡刚刚为您开通，请返回重新绑定', url('user/bandwechat&gd=gd'), 'success');
        exit;
    }else{
        messages('您的会员卡暂未开通，请先开通会员卡再绑定', url('user/opencard&gd=gd'), 'error');
        exit;
    }
}

//查询是否已经绑定
$sql = 'SELECT * FROM ' . tablename('bind_card_wechat') . ' WHERE `openid` = :openid AND `card_no` = :card_no';
$params = array(
        ':openid' => $_POST['openid'],
        ':card_no' => $_POST['card_no']
    );
$bindMsg = pdo_fetch($sql, $params);
if($bindMsg){
    messages('您已经绑定过会员卡信息，无需再次绑定', url('user/usermsg&gd=gd'), 'error');
    exit;
}

//插入绑定信息
$insertData = array(
        'openid' => $_POST['openid'],
        'card_no' => $_POST['card_no'],
        'card_pwd' => md5($_POST['card_pwd']),
        'id_no' => $_POST['id_no'],
        'nickname' => $_POST['nickname'],
        'sex' => $_POST['sex'],
        'headimgurl' => $_POST['headimgurl'],
        'term_merno' => substr($_POST['cards'],0,4)
    );
if(!$insertData['openid']){
    messages('微信获取信息失败', url('user/bandwechat') , 'error');
}
pdo_insert('bind_card_wechat',$insertData);
$bindId = pdo_insertid();
if($bindId){
    messages('会员卡绑定成功', url('user/usermsg&gd=gd'), 'success');
}
template('user/bandwechat');