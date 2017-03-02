<?php
/**
 * [WEIZAN System] Copyright (c) 2015 012WZ.COM
 * WeiZan is NOT a free software, it under the license terms, visited http://www.012wz.com/ for more details.
 */
defined('IN_IA') or exit('Access Denied');
$band_config = array();
$band_config['appId'] = 'wx5055a410afd056bd';
$band_config['appSecret'] = '16954f1377e2e4341bfece7572bfb6ac';

if($_GET['state'] && $_GET['state'] != 'STATE'){
	$code = $_GET['code'];
	$user_openid ="https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $band_config['appId'] . "&secret=" . $band_config['appSecret'] . "&code=" . $code ."&grant_type=authorization_code";
	$result = file_get_contents($user_openid);
	$user_msg = json_decode($result , true);
	$url = 'index.php?c=user&a=updatepwd&openid'. $user_msg['openid'];
	if($_GET['state'] == 'UPDATEPWD'){
		header('Location:' . url('user/updatepwd&openid='.$user_msg['openid']));
	}else if ($_GET['state'] == 'USERMSG'){
		header('Location:' . url('user/usermsg&openid='.$user_msg['openid']));
	}else if ($_GET['state'] == 'BALANCESCORE'){
		header('Location:' . url('user/usermsg&do=balancescore&openid='.$user_msg['openid']));
	}else if ($_GET['state'] == 'COUPON'){
		header('Location:' . url('user/usermsg&do=coupon&openid='.$user_msg['openid']));
	}else if ($_GET['state'] == 'DEAL'){
		header('Location:' . url('user/usermsg&do=deal&openid='.$user_msg['openid']));
	}else if ($_GET['state'] == 'OPENCARD'){
		header('Location:' . url('user/opencard&openid='.$user_msg['openid']));
	}
	
}

//微信授权
$auth = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=". $band_config['appId'] 
		. "&redirect_uri=http://weixin.artels.cn/web/index.php?c=user&a=bandwechat&response_type=code&scope=snsapi_userinfo&state=STATE";

if(empty($_GET['code'])){
	header('Location:' . $auth);
}
$code = $_GET['code'];

/*获取用户openid*/
$user_openid ="https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . $band_config['appId'] . "&secret=" . $band_config['appSecret'] . "&code=" . $code ."&grant_type=authorization_code";
$result = file_get_contents($user_openid);
$user_msg = json_decode($result , true);


/*获取用户信息*/
$getUserMsg = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $user_msg['access_token'] . '&openid=' . $user_msg['openid'] . '&lang=zh_CN';

$userResult = file_get_contents($getUserMsg);
$userInfo = json_decode($userResult , true);


template('user/bandwechat');