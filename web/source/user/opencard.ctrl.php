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
    if($gd != '') {
        $auth = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx5055a410afd056bd&redirect_uri=http://weixin.artels.cn/web/index.php?c=user&a=updatepwd&response_type=code&scope=snsapi_base&state=OPENCARD#wechat_redirect';

        if (empty($_GET['openid'])) {
            header('Location:' . $auth);
        }
    }
    $openid = $_GET['openid'] ? $_GET['openid'] : $_POST['openid'];
    $bind_msg = $hotel->idBindWechat($openid);
    if(empty($ajaxs)){
        if(!$bind_msg){
            messages('请先将会员卡绑定您的微信再操作',url('user/bandwechat'),'error');
        }
    }
//查询酒店接口 信息
$bind_config = $hotel->hotelApiMsg($bind_msg['card_no']);
if($do == 'open'){

    //开通会员卡
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
        messages('您的会员已经开通成功', url('use/opencard&gd=gd'), 'error');
        exit;
    }else{
        messages('您的会员卡开通失败 失败信息：'. $openCard , url('user/opencard&gd=gd'), 'error');
        exit;
    }
}
template('user/opencard');