<?php
/**
 * 在线产品采购模块定义
 *
 * @author 阳光
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');

class Bird_messageModule extends WeModule {
  public function settingsDisplay($settings) {

        global $_GPC, $_W;

        if (checksubmit()) {

            $cfg = array(

                'noticeemail' => $_GPC['noticeemail'],

                'k_templateid' => $_GPC['k_templateid'],

                'kfid' => $_GPC['kfid'],

                'm_templateid' => $_GPC['m_templateid'],

                'mobile' => $_GPC['mobile'],

                'accountsid' => $_GPC['accountsid'],

                'tokenid' => $_GPC['tokenid'],

                'appId' => $_GPC['appId'],

                'templateId' => $_GPC['templateId'],

            );

            if ($this->saveSettings($cfg)) {

                message('保存成功', 'refresh');

            }

        }

        include $this->template('setting');

    }
}