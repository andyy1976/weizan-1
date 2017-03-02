
<?php
/**
 * 大家来领券模块微站定义
 *
 */
defined('IN_IA') or exit('Access Denied');

class Jy_couponsModuleSite extends WeModuleSite {

	public function doMobileIndex() {
		//这个操作被定义用来呈现 功能封面
		global $_W, $_GPC;

		$this->checkAuth();

		$from_user=$_W['openid'];

		$weid=$_W['uniacid'];
		$uid = $_W['member']['uid'];

		$member_temp=pdo_fetch("SELECT uid,nickname,follow FROM ".tablename('mc_mapping_fans')." WHERE openid='$from_user' AND uniacid=".$weid);
		if(empty($member_temp['nickname']) || $member_temp['uid']==0)
		{
			unset($uid);
		}
		else
		{
			$uid=$member_temp['uid'];
			$_W['member']['uid']=$uid;
			unset($member_temp);
		}

		if(empty($uid))
		{
			echo "<script>
				window.location.href = '".$this->createMobileUrl('userinfo',array('op'=>'index','member_id'=>$member_id))."';					
			</script>";
		}
		$user=pdo_fetch("SELECT uid FROM ".tablename("jy_coupons_member")." WHERE uid=".$uid." AND weid=".$weid);
		if(!empty($user))
		{
			echo "<script>
				window.location.href = '".$this->createMobileUrl('huodong')."';					
			</script>";
		}

		$item=pdo_fetch("SELECT * FROM ".tablename('jy_coupons_setting')." WHERE weid=".$weid);

		$op=$_GPC['op'];
		if($op=='add')
		{
			$pwd=$_GPC['pwd'];
			if($pwd==$item['pwd'])
			{
				echo 1;
				exit;
			}
			else
			{
				echo 0;
				exit;
			}

		}


		include $this->template('index');
	}
	public function doMobileRule() {
		//规则
		global $_W, $_GPC;
		$this->checkAuth();

		$from_user=$_W['openid'];

		$weid=$_W['uniacid'];
		$uid = $_W['member']['uid'];

		$member_temp=pdo_fetch("SELECT uid,nickname,follow FROM ".tablename('mc_mapping_fans')." WHERE openid='$from_user' AND uniacid=".$weid);
		if(empty($member_temp['nickname']) || $member_temp['uid']==0)
		{
			unset($uid);
		}
		else
		{
			$uid=$member_temp['uid'];
			$_W['member']['uid']=$uid;
			unset($member_temp);
		}

		if(empty($uid))
		{
			echo "<script>
				window.location.href = '".$this->createMobileUrl('userinfo',array('op'=>'rule','member_id'=>$member_id))."';					
			</script>";
		}

		$item=pdo_fetch("SELECT * FROM ".tablename('jy_coupons_setting')." WHERE weid=".$weid);

		include $this->template('rule');
	}
	public function doMobileHuodong() {
		//参与页
		global $_W, $_GPC;

		$this->checkAuth();

		$from_user=$_W['openid'];

		$weid=$_W['uniacid'];
		$uid = $_W['member']['uid'];

		$member_temp=pdo_fetch("SELECT uid,nickname,follow FROM ".tablename('mc_mapping_fans')." WHERE openid='$from_user' AND uniacid=".$weid);
		if(empty($member_temp['nickname']) || $member_temp['uid']==0)
		{
			unset($uid);
		}
		else
		{
			$uid=$member_temp['uid'];
			$_W['member']['uid']=$uid;
			unset($member_temp);
		}

		if(empty($uid))
		{
			echo "<script>
				window.location.href = '".$this->createMobileUrl('userinfo',array('op'=>'huodong','member_id'=>$member_id))."';					
			</script>";
		}
		$user=pdo_fetch("SELECT uid FROM ".tablename("jy_coupons_member")." WHERE uid=".$uid." AND weid=".$weid);
		$item=pdo_fetch("SELECT * FROM ".tablename('jy_coupons_setting')." WHERE weid=".$weid);

		$timu_log=pdo_fetch("SELECT count(id) as num FROM ".tablename('jy_coupons_timu')." WHERE uid=".$uid." AND weid=".$weid);
		if($timu_log['num']>=2)
		{
			$ok=1;
		}

		$op=$_GPC['op'];
		if($op=='add')
		{
			$data=array(
				'weid'=>$_W['uniacid'],
				'from_user'=>$from_user,
				'uid'=>$uid,
				'createtime'=>TIMESTAMP	
			);
			
			if(empty($user))
			{
				pdo_insert('jy_coupons_member',$data);
			}
			
			echo 1;
			exit;
		}
		if($op=='add2')
		{
			$timu=$_GPC['timu'];
			$zhi=$_GPC['zhi'];

			$data=array(
				'weid'=>$_W['uniacid'],
				'from_user'=>$from_user,
				'uid'=>$uid,
				'timu'=>$timu,
				'zhi'=>$zhi,
				'createtime'=>TIMESTAMP	
			);
			
		
			pdo_insert('jy_coupons_timu',$data);
			
			
			echo 1;
			exit;
		}



		include $this->template('huodong');
	}
	public function doMobileFriend() {
		//好友页
		global $_W, $_GPC;
		$this->checkAuth();

		$from_user=$_W['openid'];

		$weid=$_W['uniacid'];
		$uid = $_W['member']['uid'];
		$member_id=$_GPC['member_id'];

		$member_temp=pdo_fetch("SELECT uid,nickname,follow FROM ".tablename('mc_mapping_fans')." WHERE openid='$from_user' AND uniacid=".$weid);
		if(empty($member_temp['nickname']) || $member_temp['uid']==0)
		{
			unset($uid);
		}
		else
		{
			$uid=$member_temp['uid'];
			$_W['member']['uid']=$uid;
			unset($member_temp);
		}

		if(empty($uid))
		{
			echo "<script>
				window.location.href = '".$this->createMobileUrl('userinfo',array('op'=>'friend','member_id'=>$member_id))."';					
			</script>";
		}
		if($uid==$member_id)
		{
			echo "<script>
				window.location.href = '".$this->createMobileUrl('huodong')."';					
			</script>";
		}
		$avatar=pdo_fetch("SELECT avatar,nickname FROM ".tablename('mc_members')." WHERE uid=".$member_id);
		if(empty($avatar['nickname']) || empty($avatar['avatar']))
		{
			echo "<script>
				window.location.href = '".$this->createMobileUrl('userinfo',array('op'=>'friend','member_id'=>$member_id))."';					
			</script>";
		}

		$member_temp['avatar']=$avatar['avatar'];

		$item=pdo_fetch("SELECT * FROM ".tablename('jy_coupons_setting')." WHERE weid=".$weid);
		$log=pdo_fetchall("SELECT id FROM ".tablename("jy_coupons_log")." WHERE weid=".$weid." AND member_id=".$member_id);

		$user_log=pdo_fetch("SELECT id,couponsid,status FROM ".tablename("jy_coupons_log")." WHERE weid=".$weid." AND member_id=".$member_id." AND uid=".$uid);

		if(!empty($user_log))
		{
			$couponsid=$user_log['couponsid'];
			$c_id=$user_log['id'];
			$coupons =pdo_fetch("SELECT * FROM ".tablename('jy_coupons')." WHERE id=".$couponsid);
			$cardid=$coupons['code'];
		    $coupons_pic=$coupons['coupons_pic'];
		   	$coupons_logo=$coupons['coupons_logo'];
		}
		else
		{
			//判断是什么卡券
			$coupons = pdo_fetchall("SELECT * FROM " . tablename('jy_coupons') . " WHERE weid = $weid ORDER BY displayorder DESC,id ASC");

		    $log_c=count($log);
		    $total=0;
		    foreach ($coupons as $key => $value) {
		    	# code...
		    	$total+=$value['num'];
		    	if($value['num']==0)
		    	{
		    		$couponsid=$value['id'];
		    		$cardid=$value['code'];
		    		$coupons_pic=$value['coupons_pic'];
		    		$coupons_logo=$value['coupons_logo'];
		    		break;
		    	}
		    	else
		    	{
		    		if($log_c<$total)
			    	{
			    		$couponsid=$value['id'];
			    		$cardid=$value['code'];
			    		$coupons_pic=$value['coupons_pic'];
		    			$coupons_logo=$value['coupons_logo'];
			    		break;
			    	}
		    	}	    	
		    }
		  
		    if($uid!=$member_id)
		    {
		    	$log=array(
					'weid'=>$_W['uniacid'],
					'from_user'=>$from_user,
					'member_id'=>$member_id,
					'couponsid' =>$couponsid,
					'uid'=>$uid,
					'status'=>0,
					'createtime'=>TIMESTAMP	
				);

			    pdo_insert('jy_coupons_log',$log);
			    $c_id=pdo_insertid();
		    }
		        
		}
		
		$op=$_GPC['op'];
		if($op=="add")
		{
			//echo $c_id;
			pdo_update("jy_coupons_log",array('status'=>1),array('id'=>$c_id));
			echo 1;
			exit;
		}

		if((TIMESTAMP-$item['api_time'])>7000)
		{
			load()->classs('weixin.account');
			$accObj= new WeixinAccount();
			$access_token = $accObj->fetch_available_token();
			$url="https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=".$access_token."&type=wx_card";
			load()->func('communication');
			$response = ihttp_get($url);
			if (!is_error($response)) {

				$api_ticket = array();
				$api_ticket = @json_decode($response['content'], true);
				$api_ticket = $api_ticket['ticket'];
				if(empty($item))
				{
					pdo_insert("jy_coupons_setting",array('weid'=>$weid,'api_ticket'=>$api_ticket,'api_time'=>TIMESTAMP));
				}
				else
				{
					pdo_update("jy_coupons_setting",array('api_ticket'=>$api_ticket,'api_time'=>TIMESTAMP),array('weid'=>$weid));
				}
			}
		}
		else
		{
			$api_ticket=$item['api_ticket'];
		}

		
		$timestamp=TIMESTAMP;
		$card=array(
				'api_ticket'=>$api_ticket,
				'timestamp'=>$timestamp,
				'cardid'=>$cardid,
			);
		$signature=$this->getCardSign($card);

		include $this->template('friend');
	}

	function getCardSign($card){
        sort($card,SORT_STRING);
        $sign = sha1(implode($card));
        if (!$sign)
            return false;
        return $sign;
	}

	function generateNonceStr($length=16){
    // 密码字符集，可任意添加你需要的字符
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    $str = "";
	    for($i = 0; $i < $length; $i++)
	    {
	    $str .= $chars[mt_rand(0, strlen($chars) - 1)];
	    }
	    return $str;
	}

	public function doWebMember() {
		//用户管理
		global $_W, $_GPC;
		$weid=$_W['uniacid'];

		$member=pdo_fetchall("SELECT a.createtime,a.id,b.nickname,b.avatar,a.uid FROM ".tablename('jy_coupons_member')." as a left join ".tablename('mc_members')." as b on a.uid=b.uid WHERE a.weid=".$weid);
		$i=0;
		foreach ($member as $key => $value) {
			$log=pdo_fetchall("SELECT id FROM ".tablename('jy_coupons_log')." WHERE member_id=".$value['uid']);

			$member[$i]['num']=count($log);
			$total+=count($log);
			$i++;
		}
		include $this->template('web/member');
	}

	public function doWebStat() {
		//用户管理
		global $_W, $_GPC;
		$weid=$_W['uniacid'];

		$timu=array(
				'1'=>'你最想和朋友分享哪款原宿社酸奶？',
				'2'=>'右图的原宿社店内区域名称是什么？',
				'3'=>'原宿社目前有多少间分店？',
				'4'=>'以下哪个不是原宿社杯子的主题？',
				'5'=>'以下哪些是原宿社免费提供的服务？',
			);

		$list=pdo_fetchall("SELECT count(id) as num,timu FROM ".tablename('jy_coupons_timu')." WHERE weid=".$weid." GROUP BY timu");

		$timu1=array(
			'1'=>'原宿原味酸奶',
			'2'=>'原桃酸奶',
			'3'=>'原梅酸奶',
			'4'=>'原枣酸奶',
		);

		$list1=pdo_fetchall("SELECT count(id) as num,zhi FROM ".tablename('jy_coupons_timu')." WHERE weid=".$weid." AND timu=1 GROUP BY zhi");
		
		$timu2=array(
			'1'=>'分享说',
			'2'=>'美丽说',
			'3'=>'原宿说',
		);

		$list2=pdo_fetchall("SELECT count(id) as num,zhi FROM ".tablename('jy_coupons_timu')." WHERE weid=".$weid." AND timu=2 GROUP BY zhi");
		
		$timu3=array(
			'1'=>'1间',
			'2'=>'2间',
			'3'=>'更多',
		);

		$list3=pdo_fetchall("SELECT count(id) as num,zhi FROM ".tablename('jy_coupons_timu')." WHERE weid=".$weid." AND timu=3 GROUP BY zhi");
		
		$timu4=array(
			'1'=>'Lover（爱人）',
			'2'=>'Class（同学）',
			'3'=>'Partner（伙伴）',
			'4'=>'Friend（朋友）',
			'5'=>'Family（家庭）',
			'6'=>'原宿社',
		);

		$list4=pdo_fetchall("SELECT count(id) as num,zhi FROM ".tablename('jy_coupons_timu')." WHERE weid=".$weid." AND timu=4 GROUP BY zhi");
		
		$timu5=array(
			'1'=>'充电宝和充电线',
			'2'=>'相片打印',
			'3'=>'外借雨伞',
			'4'=>'按摩椅',
			'5'=>'《秘密花园》涂色',
			'6'=>'以上全是，还有其他未列出',
		);

		$list5=pdo_fetchall("SELECT count(id) as num,zhi FROM ".tablename('jy_coupons_timu')." WHERE weid=".$weid." AND timu=5 GROUP BY zhi");
		
		include $this->template('web/stat');
	}

	public function doWebMingxi() {
		//用户管理
		global $_W, $_GPC;
		$weid=$_W['uniacid'];
		$member_id=$_GPC['member_id'];

		$member=pdo_fetchall("SELECT a.id,b.nickname,b.avatar,a.createtime,c.coupons FROM ".tablename('jy_coupons_log')." as a left join ".tablename('mc_members')." as b on a.uid=b.uid left join ".tablename('jy_coupons')." as c on a.couponsid=c.id WHERE member_id=".$member_id." ORDER BY c.displayorder DESC,c.id ASC");
		$total=count($member);
		include $this->template('web/mingxi');
	}

	public function doWebCoupons() {
		//卡券管理
		global $_W, $_GPC;
		$weid=$_W['uniacid'];
		checklogin();		

		$operation = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
	    if ($operation == 'display') {
	        if (!empty($_GPC['displayorder'])) {
	            foreach ($_GPC['displayorder'] as $id => $displayorder) {
	                pdo_update('jy_coupons', array('displayorder' => $displayorder), array('id' => $id));
	            }
	            message('卡券更新成功！', $this->createWebUrl('coupons', array('op' => 'display')), 'success');
	        }
	        $category = pdo_fetchall("SELECT * FROM " . tablename('jy_coupons') . " WHERE weid = '{$_W['weid']}' ORDER BY displayorder DESC,id ASC");
	        include $this->template('web/coupons');
	    } elseif ($operation == 'post') {
	        $id = intval($_GPC['id']);
	        if (!empty($id)) {
	            $category = pdo_fetch("SELECT * FROM " . tablename('jy_coupons') . " WHERE id = '$id'");
	        } else {
	            $category = array(
	                'displayorder' => 0,
	                'status' =>1,
	            );
	        }

	        load()->func('tpl');
	        if (checksubmit('submit')) {
	            if (empty($_GPC['coupons'])) {
	                message('抱歉，请输入卡券名称！');
	            }
	            $data = array(
	                'weid' => $_W['weid'],
	                'coupons' => $_GPC['coupons'],
	                'code' => $_GPC['code'],
	                'displayorder' => intval($_GPC['displayorder']),
	                'coupons_logo' =>$_GPC['coupons_logo'],
	                'coupons_pic' =>$_GPC['coupons_pic'],
	                'num' => intval($_GPC['num']),
	                'createtime' =>TIMESTAMP,
	            );

	            if (!empty($id)) {
	                pdo_update('jy_coupons', $data, array('id' => $id));
	            } else {
	                pdo_insert('jy_coupons', $data);
	                $id = pdo_insertid();
	            }
	            message('更新卡券成功！', $this->createWebUrl('coupons', array('op' => 'display')), 'success');
	        }
	        include $this->template('web/coupons');
	    } elseif ($operation == 'delete') {
	        $id = intval($_GPC['id']);
	        $category = pdo_fetch("SELECT id FROM " . tablename('jy_coupons') . " WHERE id = '$id'");
	        if (empty($category)) {
	            message('抱歉，卡券不存在或是已经被删除！', $this->createWebUrl('coupons', array('op' => 'display')), 'error');
	        }
	        pdo_delete('jy_coupons', array('id' => $id));
	        message('卡券删除成功！', $this->createWebUrl('coupons', array('op' => 'display')), 'success');
	    }	
	}
	
	public function doWebSetting() {
		//基本设置
		global $_W, $_GPC;
		$weid=$_W['uniacid'];
		load()->func('tpl');

		$item=pdo_fetch("SELECT * FROM ".tablename('jy_coupons_setting')." WHERE weid=".$weid);
 
		if(checksubmit()) {
			$data=array(
					'aname'=>$_GPC['aname'],
					'url'=>$_GPC['url'],
					'rule'=>$_GPC['rule'],
					'rule_bg'=>$_GPC['rule_bg'],

					'index_text'=>$_GPC['index_text'],
					'index_bg'=>$_GPC['index_bg'],
					'index1'=>$_GPC['index1'],
					'index2'=>$_GPC['index2'],
					'index3'=>$_GPC['index3'],
					
					'huodong_bg'=>$_GPC['huodong_bg'],
					'huodong1'=>$_GPC['huodong1'],
					'huodong2'=>$_GPC['huodong2'],
					'huodong3'=>$_GPC['huodong3'],
					'share_bg'=>$_GPC['share_bg'],

					'friend_bg'=>$_GPC['share_bg'],
					'friend'=>$_GPC['friend'],

					'share_title'=>$_GPC['share_title'],
					'share_desc'=>$_GPC['share_desc'],
					'share_logo'=>$_GPC['share_logo'],

					'pwd'=>$_GPC['pwd'],					
					
					'createtime'=>TIMESTAMP,
				);
			if(empty($item))
			{
				$data['weid']=$weid;
				pdo_insert('jy_coupons_setting',$data);
			}
			else
			{
				pdo_update('jy_coupons_setting',$data,array('weid'=>$weid));
			}
			message("设置成功!",$this->CreateWebUrl('setting'),'success');
		}

		include $this->template('web/setting');
	}

	public function doMobileUserinfo() {
		global $_W,$_GPC;

		if (!empty($_W['openid']) && intval($_W['account']['level']) >= 3) {
			$accObj = WeiXinAccount::create($_W['account']);
			$userinfo = $accObj->fansQueryInfo($_W['openid']);
			
		}
		
		// if(empty($_W['oauth_account'])){
		// 	return error(-1, '未指定网页授权公众号, 无法获取用户信息.');
		// }
		// if(empty($_W['oauth_account']['key']) || empty($_W['oauth_account']['secret'])){
		// 	return error(-2, '公众号未设置 appId 或 secret.');
		// }
		// if(intval($_W['oauth_account']['level']) < 4){
		// 	return error(-3, '公众号非认证服务号, 无法获取用户信息.');
		// }


		$state = 'weihezisid-'.$_W['session_id'];

		$_SESSION['dest_url'] = base64_encode($_SERVER['QUERY_STRING']);

		$op=$_GPC['op'];
		$member_id=$_GPC['member_id'];

		$code = $_GET['code'];
		$from_user=$_W['openid'];
		
		if(empty($code)){
			if($userinfo['subscribe']==0)
			{

				$url = $_W['siteroot'] . 'app/' . $this->createMobileUrl('userinfo',array('op'=>$op,'member_id'=>$member_id));
				$callback = urlencode($url);
				$forward = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$_W['oauth_account']['key'].'&redirect_uri='.$callback.'&response_type=code&scope=snsapi_userinfo&state='.$state.'#wechat_redirect';
				
				header("Location: ".$forward);	

			}
			else
			{
				//用户已经关注改公众号了
				$weid=$_W['uniacid'];

				$fan_temp=pdo_fetch("SELECT * FROM ".tablename('mc_mapping_fans')." WHERE openid='$from_user' AND uniacid=".$weid);

				if(!empty($userinfo) && !empty($userinfo['headimgurl']) && !empty($userinfo['nickname']))
				{
					$userinfo['avatar'] = $userinfo['headimgurl'];
					unset($userinfo['headimgurl']);

					//开启了强制注册，自定义注册
					$default_groupid = pdo_fetchcolumn('SELECT groupid FROM ' .tablename('mc_groups') . ' WHERE uniacid = :uniacid AND isdefault = 1', array(':uniacid' => $_W['uniacid']));

					$data = array(
						'uniacid' => $_W['uniacid'],
						'email' => md5($_W['openid']).'@9yetech.com'.$op,
						'salt' => random(8),
						'groupid' => $default_groupid, 
						'createtime' => TIMESTAMP,
						'nickname' 		=> stripslashes($userinfo['nickname']),
						'avatar' 		=> $userinfo['avatar'],
						'gender' 		=> $userinfo['sex'],
						'nationality' 	=> $userinfo['country'],
						'resideprovince'=> $userinfo['province'] . '省',
						'residecity' 	=> $userinfo['city'] . '市',
					);
					$data['password'] = md5($_W['openid'] . $data['salt'] . $_W['config']['setting']['authkey']);

					if(empty($fan_temp))
					{
						pdo_insert('mc_members', $data);
						$uid = pdo_insertid();
					}
					else
					{
						pdo_update('mc_members' ,$data ,array('uid'=>$fan_temp['uid']));
						$uid=$fan_temp['uid'];
					}
					

					$record = array(
						'openid' 		=> $_W['openid'],
						'uid' 			=> $uid,
						'acid' 			=> $_W['acid'],
						'uniacid' 		=> $_W['uniacid'],
						'salt' 			=> random(8),
						'updatetime' 	=> TIMESTAMP,
						'nickname' 		=> stripslashes($userinfo['nickname']),
						'follow' 		=> $userinfo['subscribe'],
						'followtime' 	=> $userinfo['subscribe_time'],
						'unfollowtime' 	=> 0,
						'tag' 			=> base64_encode(iserializer($userinfo))
					);
					$record['uid'] = $uid;
					if(empty($fan_temp))
					{
						pdo_insert('mc_mapping_fans', $record);
					}
					else
					{
						pdo_update('mc_mapping_fans' ,$record ,array('fanid'=>$fan_temp['fanid']));
					}
					
				}
			}
		}
		else
		{
			//未关注，通过网页授权
			$url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$_W['oauth_account']['key']."&secret=".$_W['oauth_account']['secret']."&code=".$code."&grant_type=authorization_code";
			$response = ihttp_get($url);
			$oauth = @json_decode($response['content'], true);

			$url = "https://api.weixin.qq.com/sns/userinfo?access_token={$oauth['access_token']}&openid={$oauth['openid']}&lang=zh_CN";
			$response = ihttp_get($url);

			if (!is_error($response)) {

				$userinfo = array();
				$userinfo = @json_decode($response['content'], true);

				$userinfo['nickname'] = stripcslashes($userinfo['nickname']);
				$userinfo['avatar'] = $userinfo['headimgurl'];
				unset($userinfo['headimgurl']);

				

				$_SESSION['userinfo'] = base64_encode(iserializer($userinfo));
				
				
					if(!empty($userinfo) && !empty($userinfo['avatar']) && !empty($userinfo['nickname']))
					{
						$weid=$_W['uniacid'];
						
						$fan_temp=pdo_fetch("SELECT * FROM ".tablename('mc_mapping_fans')." WHERE openid='$from_user' AND uniacid=".$weid);
						//开启了强制注册，自定义注册
						$default_groupid = pdo_fetchcolumn('SELECT groupid FROM ' .tablename('mc_groups') . ' WHERE uniacid = :uniacid AND isdefault = 1', array(':uniacid' => $_W['uniacid']));
						$data = array(
							'uniacid' => $_W['uniacid'],
							'email' => md5($_W['openid']).'@9yetech.com'.$op,
							'salt' => random(8),
							'groupid' => $default_groupid, 
							'createtime' => TIMESTAMP,
							'nickname' 		=> stripslashes($userinfo['nickname']),
							'avatar' 		=> rtrim($userinfo['avatar'], '0') . 132,
							'gender' 		=> $userinfo['sex'],
							'nationality' 	=> $userinfo['country'],
							'resideprovince'=> $userinfo['province'] . '省',
							'residecity' 	=> $userinfo['city'] . '市',
						);
						$data['password'] = md5($_W['openid'] . $data['salt'] . $_W['config']['setting']['authkey']);

						if(empty($fan_temp))
						{
							pdo_insert('mc_members', $data);
							$uid = pdo_insertid();
						}
						else
						{
							pdo_update('mc_members' ,$data ,array('uid'=>$fan_temp['uid']));
							$uid=$fan_temp['uid'];
						}

						$record = array(
							'openid' 		=> $_W['openid'],
							'uid' 			=> $uid,
							'acid' 			=> $_W['acid'],
							'uniacid' 		=> $_W['uniacid'],
							'salt' 			=> random(8),
							'updatetime' 	=> TIMESTAMP,
							'nickname' 		=> stripslashes($userinfo['nickname']),
							'follow' 		=> $userinfo['subscribe'],
							'followtime' 	=> $userinfo['subscribe_time'],
							'unfollowtime' 	=> 0,
							'tag' 			=> base64_encode(iserializer($userinfo))
						);
						$record['uid'] = $uid;

						if(empty($fan_temp))
						{
							pdo_insert('mc_mapping_fans', $record);
						}
						else
						{
							pdo_update('mc_mapping_fans' ,$record ,array('fanid'=>$fan_temp['fanid']));
						}
						//pdo_insert('mc_mapping_fans', $record);
					}
				
			} else {
				message('微信授权获取用户信息失败,请重新尝试: ' . $response['message']);
			}
		}
		


		echo "<script>
				window.location.href = '".$this->createMobileUrl($op,array('member_id'=>$member_id))."';					
			</script>";				
	}

}
?>