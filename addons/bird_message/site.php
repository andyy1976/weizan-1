<?php
/**
 * 在线产品采购模块微站定义
 *
 * @author 阳光
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');

class Bird_messageModuleSite extends WeModuleSite {
	public $tableName = 'xc_proapp_list';
	//产品采购封面
	public function doMobileIndex() {
		global $_GPC, $_W;
		
		include $this->template('reserve');
	}
	//通知设置

	public function doWebNotice(){

		$this->__web(__FUNCTION__);

	}
	//新增产品采购
	public function sendtpl($openid,$url,$template_id,$content){

		global $_GPC,$_W;

		load()->classs('weixin.account');

		load()->func('communication');

		$obj = new WeiXinAccount();

		$access_token = $obj->fetch_available_token();

		$data = array(

				'touser' => $openid,

				'template_id' => $template_id,

				'url' => $url,

				'topcolor' => "#FF0000",

				'data' => $content,

			);

		$json = json_encode($data);

		$url = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;

		$ret = ihttp_post($url,$json);
    }
	
	public function sendtplm($kfid,$link,$k_templateid,$body){

		global $_GPC,$_W;

		load()->classs('weixin.account');

		load()->func('communication');

		$obj = new WeiXinAccount();

		$access_token = $obj->fetch_available_token();

		$data = array(

				'touser' => $kfid,

				'template_id' => $k_templateid,

				'link' => $link,

				'topcolor' => "#FF0000",

				'data' => $body,

			);

		$json = json_encode($data);

		$link = 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token='.$access_token;

		$ret = ihttp_post($link,$json);
    }

	public function doMobileAdd(){
		global $_GPC, $_W;
		load()->model('mc');
		load()->func('tpl');
		$info = mc_oauth_userinfo();  //获取粉丝资料
		$acc = WeAccount::create($_W['account']['acid']);
		$data = $_POST['data'];
		$data['addtime'] = time();
		$data['openid'] = $_W['openid'];
		$data['uniacid'] = $_W['uniacid'];
		$pro0=$_POST['pro'];
		$data['pro']=implode(",",$pro0);
		$k_templateid = $_GPC['k_templateid'];
		$kfid = $_GPC['kfid'];
		$m_templateid = $_GPC['m_templateid'];
		$appsecret = $_W['account']['key'];
		$appid = $_W['account']['secret'];
		if (empty($data['name']) || empty($data['tel']) || empty($data['pro'])){
			message('请将信息填写完整');
		}
		
		if(pdo_insert($this->tableName, $data, $replace = false)){
			$openid = $_W['openid'];
					$url = '';
					$template_id = $this->module['config']['m_templateid'];
					$createtime = date('Y-m-d H:i:s', $_W['timestamp']);
					$content = array(
							'first' => array(
									'value' => '您好，您的产品订购提交成功',
								),
							'keyword1' => array(
									'value' => $data['name'],
								),
							'keyword2' => array(
									'value' => $data['tel'],
								),
							'keyword3'    => array(
									'value' => $createtime,
								),
							'keyword4'    => array(
									'value' => $data['pro'],
								),
							'remark'    => array(
								'value' => '有任何问题请随时与我们联系，谢谢。',
							),	
						);
						$kfid =  $this->module['config']['kfid'];
					$link = '';
					$k_templateid = $this->module['config']['k_templateid'];
					
					$body = array(
							'first' => array(
									'value' => '有新的客户提交表单,请及时确认',
								),
							'keyword1' => array(
									'value' => $data['name'],
								),
							'keyword2' => array(
									'value' => $data['tel'],
								),
							'keyword3'    => array(
									'value' => $createtime,
								),
							'keyword4'    => array(
									'value' => $data['pro'],
								),
							'remark'    => array(
								'value' => '有任何问题请随时与我们联系，谢谢。',
							),	
						);
						
					$this->sendtpl($openid,$url,$template_id,$content);
					$this->sendtplm($kfid,$link,$k_templateid,$body);
					message('恭喜您，提交成功！');
			}
	}
	
	
	//管理产品采购
	public function doWebManage() {
		global $_GPC, $_W;
		
		checklogin();
		
		$ops = array('display', 'delete');
		$op = in_array($_GPC['op'], $ops) ? $_GPC['op'] : 'display';
		
		//列表
		if($op == 'display'){
			$pageindex = max(intval($_GPC['page']), 1); // 当前页码
			$pagesize = 10; //设置分页大小
			$where = ' WHERE uniacid=:uniacid';
			$params = array(
				':uniacid'=>$_W['uniacid']
			);
			if (!empty($_GPC['keyword'])){
				$where .= ' and (name Like :name or tel Like :tel or 

pro Like :pro)';
				$params[':name'] = "%{$_GPC['keyword']}%";
				$params[':tel'] = "%{$_GPC['keyword']}%";
				$params[':pro'] = "%{$_GPC['keyword']}%";
			}
			$total = pdo_fetchcolumn('Select count(id) from '.tablename

($this->tableName).$where, $params);
			$pager = pagination($total, $pageindex, $pagesize);
			
			$sql = 'Select * from '.tablename($this->tableName).$where.' 

Order BY id ASC LIMIT '.(($pageindex -1) * $pagesize).','. $pagesize;
			$list = pdo_fetchall($sql, $params, 'id');
			foreach ($list as &$item){
				$item['time'] = date('Y-m-d H:i:s',$item['addtime']);
			}
			include $this->template('manage');
		}
		//删除 选项
		if ($op == 'delete'){
			$id = $_GPC['id'];
			if (is_array($id)){//如果是数组 打散
				$idarr = implode(',',$id);
			} else {
				$idarr = $id;
			}
			
			if(pdo_delete($this->tableName, 'id in ('.$idarr.')')){		

		
				if (is_array($id)){
					echo json_encode(array('errno'=>'1'));
				} else {
					message('删除成功', $this->createWebUrl

('manage'), 'success');
				}
			} else {
				
				if (is_array($id)){
					echo json_encode(array('errno'=>'删除失败'));
				} else {
					message('删除失败');
				}
			}
		}
	}

}