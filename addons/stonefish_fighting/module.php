<?php
defined('IN_IA') or exit('Access Denied');
class Stonefish_fightingModule extends WeModule {
    public function fieldsFormDisplay($rid = 0) {
        global $_W;
        load()->func('tpl');
        $uniacid = $_W['uniacid'];
        $setting = $this->module['config'];
        if (empty($setting)) {
            message('抱歉，系统参数没有填写，请先填写系统参数！', url('profile/module/setting', array(
                'm' => 'stonefish_fighting'
            )) , 'error');
        }
        $modules = uni_modules($enabledOnly = true);
        $modules_arr = array();
        $modules_arr = array_reduce($modules, create_function('$v,$w', '$v[$w["mid"]]=$w["name"];return $v;'));
        if (in_array('stonefish_member', $modules_arr)) {
            $stonefish_member = true;
        }
        if (in_array('stonefish_bigwheel', $modules_arr)) {
            $stonefish_bigwheel = true;
        }
        if (in_array('stonefish_scratch', $modules_arr)) {
            $stonefish_scratch = true;
        }
        if ($stonefish_bigwheel) {
            $bigwheelitems = pdo_fetchall("SELECT rid,title FROM " . tablename('stonefish_bigwheel_reply') . " WHERE uniacid = '{$_W['uniacid']}' and opportunity=3  and starttime<=:time and endtime>:time ORDER BY id DESC", array(
                ':time' => time()
            ) , 'id');
        }
        if ($stonefish_scratch) {
            $scratchitems = pdo_fetchall("SELECT rid,title FROM " . tablename('stonefish_scratch_reply') . " WHERE uniacid = '{$_W['uniacid']}' and opportunity=3  and starttime<=:time and endtime>:time ORDER BY id DESC", array(
                ':time' => time()
            ) , 'id');
        }
        $acid_arr = uni_accounts();
        $ids = array();
        $ids = array_map('array_shift', $acid_arr);
        $ids_num = count($ids);
        $one = current($ids);
        $sys_users = pdo_fetchall("SELECT groupid,title FROM " . tablename('mc_groups') . " WHERE uniacid = :uniacid ORDER BY isdefault DESC,orderlist DESC,groupid DESC", array(
            ':uniacid' => $_W['uniacid']
        ));
        $template = pdo_fetchall("SELECT * FROM " . tablename('stonefish_fighting_template') . " WHERE uniacid = 0 or uniacid = :uniacid ORDER BY `id` asc", array(
            ':uniacid' => $uniacid
        ));
        if (empty($template)) {
            $inserttemplate = array(
                'uniacid' => $uniacid,
                'title' => '默认',
                'thumb' => '../addons/stonefish_fighting/template/images/template.jpg',
                'fontsize' => '12',
                'bgimg' => '../addons/stonefish_fighting/template/images/bgimg.png',
                'bgcolor' => '#fec303',
                'textcolor' => '#666666',
                'textcolorlink' => '#f3f3f3',
                'buttoncolor' => '#ff540a',
                'buttontextcolor' => '#f3f3f3',
                'rulecolor' => '#fff6cd',
                'ruletextcolor' => '#434343',
                'navcolor' => '#fff6cd',
                'navtextcolor' => '#434343',
                'navactioncolor' => '#ff540a',
                'watchcolor' => '#fce5cd',
                'watchtextcolor' => '#cc0000',
                'awardcolor' => '#ff5108',
                'awardtextcolor' => '#ffffff',
                'awardscolor' => '#9fc5e8',
                'awardstextcolor' => '#134f5c',
            );
            pdo_insert('stonefish_fighting_template', $inserttemplate);
            $template = pdo_fetchall("SELECT * FROM " . tablename('stonefish_fighting_template') . " WHERE uniacid = 0 or uniacid = :uniacid ORDER BY `id` asc", array(
                ':uniacid' => $uniacid
            ));
        }
        $tmplmsg = pdo_fetchall("SELECT * FROM " . tablename('stonefish_fighting_tmplmsg') . " WHERE uniacid = :uniacid ORDER BY `id` asc", array(
            ':uniacid' => $uniacid
        ));
        $questiontype = pdo_fetchall("SELECT id,gname FROM " . tablename('stonefish_fighting_questiontype') . " WHERE uniacid=0 Or uniacid = :uniacid ORDER BY parentid, displayorder DESC, id", array(
            ':uniacid' => $uniacid
        ));
        if (empty($questiontype)) {
            message('请先添加问题分类', url('site/entry/questiontype', array(
                'm' => 'stonefish_fighting'
            )) , 'warning');
        }
        if (empty($share)) {
            $share = array();
            foreach ($ids as $acid => $idlists) {
                $share[$acid] = array(
                    "acid" => $acid,
                    "help_url" => $acid_arr[$acid]['subscribeurl'],
                    "share_url" => $acid_arr[$acid]['subscribeurl'],
                    "share_title" => "已有#参与人数#人参与本活动了，你的朋友#粉丝昵称# 还中了大奖：#奖品名称#，请您也来试试吧！",
                    "share_desc" => "亲，欢迎参加活动，祝您好运哦！",
                    "share_img" => "../addons/stonefish_moban/template/images/img_share.png",
                    "share_pic" => "../addons/stonefish_moban/template/images/share.png",
                    "share_confirm" => "分享成功提示语",
                    "share_confirmurl" => "活动首页",
                    "share_fail" => "分享失败提示语",
                    "share_cancel" => "分享中途取消提示语",
                    "sharenumtype" => 0,
                    "sharenum" => 0,
                    "sharetimes" => 1,
                    "sharetype" => 1,
                    "share_open_close" => 1,
                );
            }
        }
        if (!empty($rid)) {
            $reply = pdo_fetch("SELECT * FROM " . tablename('stonefish_fighting_reply') . " WHERE rid = :rid ORDER BY `id` desc", array(
                ':rid' => $rid
            ));
            $exchange = pdo_fetch("SELECT * FROM " . tablename('stonefish_fighting_exchange') . " WHERE rid = :rid ORDER BY `id` desc", array(
                ':rid' => $rid
            ));
            $share = pdo_fetchall("select * from " . tablename('stonefish_fighting_share') . " where rid = :rid order by `id` desc", array(
                ':rid' => $rid
            ));
            $reply['msgadpic'] = (array)iunserializer($reply['msgadpic']);
            $questionlist = pdo_fetchall("SELECT * FROM " . tablename('stonefish_fighting_questionlist') . " WHERE rid=:rid and uniacid = :uniacid ORDER BY id DESC, typeid DESC", array(
                ':uniacid' => $uniacid,
                ':rid' => $rid
            ));
            if (!empty($reply)) {
                $grouparr = $reply['sys_users'] = (array)iunserializer($reply['sys_users']);
                if (!empty($grouparr)) {
                    foreach ($sys_users as & $g) {
                        if (in_array($g['groupid'], $grouparr)) {
                            $g['groupid_select'] = 1;
                        }
                    }
                }
            }
        }
        $reply['starttime'] = empty($reply['starttime']) ? strtotime(date('Y-m-d H:i')) : $reply['starttime'];
        $reply['endtime'] = empty($reply['endtime']) ? strtotime("+1 week") : $reply['endtime'];
        $reply['isshow'] = !isset($reply['isshow']) ? "1" : $reply['isshow'];
        $reply['copyright'] = empty($reply['copyright']) ? $_W['account']['name'] : $reply['copyright'];
        $reply['xuninum'] = !isset($reply['xuninum']) ? "500" : $reply['xuninum'];
        $reply['xuninumtime'] = !isset($reply['xuninumtime']) ? "86400" : $reply['xuninumtime'];
        $reply['xuninuminitial'] = !isset($reply['xuninuminitial']) ? "10" : $reply['xuninuminitial'];
        $reply['xuninumending'] = !isset($reply['xuninumending']) ? "50" : $reply['xuninumending'];
        $reply['music'] = !isset($reply['music']) ? "1" : $reply['music'];
        $reply['musicurl'] = empty($reply['musicurl']) ? "../addons/stonefish_fighting/template/audio/bg.mp3" : $reply['musicurl'];
        $reply['issubscribe'] = !isset($reply['issubscribe']) ? "0" : $reply['issubscribe'];
        $reply['homepictime'] = !isset($reply['homepictime']) ? "0" : $reply['homepictime'];
        $reply['homepictype'] = empty($reply['homepictype']) ? "2" : $reply['homepictype'];
        $reply['questionnum'] = empty($reply['questionnum']) ? "10" : $reply['questionnum'];
        $reply['notquestionnum'] = !isset($reply['notquestionnum']) ? "1" : $reply['notquestionnum'];
        $reply['marking'] = empty($reply['marking']) ? "5" : $reply['marking'];
        $reply['answertime'] = empty($reply['answertime']) ? "10" : $reply['answertime'];
        $reply['number_times'] = !isset($reply['number_times']) ? "10" : $reply['number_times'];
        $reply['number_days'] = !isset($reply['number_days']) ? "１" : $reply['number_days'];
        $reply['viewranknum'] = !isset($reply['viewranknum']) ? "10" : $reply['viewranknum'];
        $reply['power'] = !isset($reply['power']) ? "2" : $reply['power'];
        $reply['poweravatar'] = !isset($reply['poweravatar']) ? "0" : $reply['poweravatar'];
        $reply['helptype'] = !isset($reply['helptype']) ? "1" : $reply['helptype'];
        $reply['limittype'] = !isset($reply['limittype']) ? "0" : $reply['limittype'];
        $reply['question'] = !isset($reply['question']) ? "0" : $reply['question'];
        $reply['helptime'] = !isset($reply['helptime']) ? "60" : $reply['helptime'];
        $reply['prizestype'] = !isset($reply['prizestype']) ? "1" : $reply['prizestype'];
        $reply['premise'] = !isset($reply['premise']) ? "1" : $reply['premise'];
        $reply['prizesnum'] = !isset($reply['prizesnum']) ? "1" : $reply['prizesnum'];
        $exchange['isrealname'] = !isset($exchange['isrealname']) ? "1" : $exchange['isrealname'];
        $exchange['ismobile'] = !isset($exchange['ismobile']) ? "1" : $exchange['ismobile'];
        $exchange['isfans'] = !isset($exchange['isfans']) ? "1" : $exchange['isfans'];
        $exchange['isfansname'] = empty($exchange['isfansname']) ? "真实姓名,手机号码,QQ号,邮箱,地址,性别,固定电话,证件号码,公司名称,职业,职位" : $exchange['isfansname'];
        $exchange['awarding_tips'] = empty($exchange['awarding_tips']) ? "请填写下面的选项" : $exchange['awarding_tips'];
        $reply['msgadpictime'] = !isset($reply['msgadpictime']) ? "5" : $reply['msgadpictime'];
        $reply['sys_users_tips'] = empty($reply['sys_users_tips']) ? "您所在的会员组没有参与权限，请继续关注我们，参与其他活动，赢取积分升级您的会员组，再来参与！" : $reply['sys_users_tips'];
        include $this->template('form');
    }
    public function fieldsFormValidate($rid = 0) {
        return '';
    }
    public function fieldsFormSubmit($rid) {
        global $_GPC, $_W;
        $uniacid = $_W['uniacid'];
        load()->func('communication');
        $id = intval($_GPC['reply_id']);
        $exchangeid = intval($_GPC['exchange_id']);
        if ($_GPC['prizestype'] == 2) {
            $_GPC['urlrid'] = $_GPC['bigwheelrid'];
        }
        if ($_GPC['prizestype'] == 3) {
            $_GPC['urlrid'] = $_GPC['scratchrid'];
        }
        $insert = array(
            'rid' => $rid,
            'uniacid' => $uniacid,
            'templateid' => $_GPC['templateid'],
            'title' => $_GPC['title'],
            'description' => $_GPC['description'],
            'start_picurl' => $_GPC['start_picurl'],
            'end_title' => $_GPC['end_title'],
            'end_description' => $_GPC['end_description'],
            'end_picurl' => $_GPC['end_picurl'],
            'music' => $_GPC['music'],
            'musicurl' => $_GPC['musicurl'],
            'mauto' => $_GPC['mauto'],
            'mloop' => $_GPC['mloop'],
            'starttime' => strtotime($_GPC['datelimit']['start']) ,
            'endtime' => strtotime($_GPC['datelimit']['end']) ,
            'issubscribe' => $_GPC['issubscribe'],
            'visubscribetime' => $_GPC['visubscribetime'],
            'sys_users' => iserializer($_GPC['sys_users']) ,
            'sys_users_tips' => $_GPC['sys_users_tips'],
            'msgadpic' => iserializer($_GPC['msgadpic']) ,
            'copyright' => $_GPC['copyright'],
            'msgadpictime' => $_GPC['msgadpictime'],
            'power' => $_GPC['power'],
            'poweravatar' => $_GPC['poweravatar'],
            'xuninumtime' => $_GPC['xuninumtime'],
            'xuninuminitial' => $_GPC['xuninuminitial'],
            'xuninumending' => $_GPC['xuninumending'],
            'xuninum' => $_GPC['xuninum'],
            'xuninum_time' => strtotime($_GPC['datelimit']['start']) ,
            'homepictype' => $_GPC['homepictype'],
            'homepictime' => $_GPC['homepictime'],
            'homepic' => $_GPC['homepic'],
            'adpic' => $_GPC['adpic'],
            'adpicurl' => $_GPC['adpicurl'],
            'question' => $_GPC['question'],
            'questiontype' => $_GPC['questiontype'],
            'questionnum' => $_GPC['questionnum'],
            'notquestionnum' => $_GPC['notquestionnum'],
            'marking' => $_GPC['marking'],
            'skip' => $_GPC['skip'],
            'answertime' => $_GPC['answertime'],
            'timeout' => $_GPC['timeout'],
            'viewranknum' => $_GPC['viewranknum'],
            'number_times' => $_GPC['number_times'],
            'number_days' => $_GPC['number_days'],
            'ishelp' => $_GPC['ishelp'],
            'helptime' => $_GPC['helptime'],
            'isgroup' => $_GPC['isgroup'],
            'prizestype' => $_GPC['prizestype'],
            'premise' => $_GPC['premise'],
            'prizesnum' => $_GPC['prizesnum'],
            'urlrid' => $_GPC['urlrid'],
            'yanzheng' => $_GPC['yanzheng'],
            'createtime' => time() ,
        );
        $insertexchange = array(
            'rid' => $rid,
            'uniacid' => $uniacid,
            'awarding_tips' => $_GPC['awarding_tips'],
            'isrealname' => $_GPC['isrealname'],
            'ismobile' => $_GPC['ismobile'],
            'isqq' => $_GPC['isqq'],
            'isemail' => $_GPC['isemail'],
            'isaddress' => $_GPC['isaddress'],
            'isgender' => $_GPC['isgender'],
            'istelephone' => $_GPC['istelephone'],
            'isidcard' => $_GPC['isidcard'],
            'iscompany' => $_GPC['iscompany'],
            'isoccupation' => $_GPC['isoccupation'],
            'isposition' => $_GPC['isposition'],
            'isfans' => $_GPC['isfans'],
            'isfansname' => $_GPC['isfansname'],
            'tmplmsg_participate' => $_GPC['tmplmsg_participate'],
            'tmplmsg_winning' => $_GPC['tmplmsg_winning'],
            'tmplmsg_exchange' => $_GPC['tmplmsg_exchange'],
        );
            if (empty($id)) {
                pdo_insert("stonefish_fighting_reply", $insert);
                $id = pdo_insertid();
            } else {
                pdo_update('stonefish_fighting_reply', $insert, array(
                    'id' => $id
                ));
            }
            if (empty($exchangeid)) {
                pdo_insert("stonefish_fighting_exchange", $insertexchange);
            } else {
                pdo_update('stonefish_fighting_exchange', $insertexchange, array(
                    'id' => $exchangeid
                ));
            }

        $acid_arr = uni_accounts();
        $ids = array();
        $ids = array_map('array_shift', $acid_arr);
        foreach ($ids as $acid => $idlists) {
            $insertshare = array(
                'rid' => $rid,
                'acid' => $acid,
                'uniacid' => $uniacid,
                'share_open_close' => $_GPC['share_open_close_' . $acid],
                'help_url' => $_GPC['help_url_' . $acid],
                'share_url' => $_GPC['share_url_' . $acid],
                'share_title' => $_GPC['share_title_' . $acid],
                'share_desc' => $_GPC['share_desc_' . $acid],
                'share_txt' => $_GPC['share_txt_' . $acid],
                'share_img' => $_GPC['share_img_' . $acid],
                'share_pic' => $_GPC['share_pic_' . $acid],
                'share_confirm' => $_GPC['share_confirm_' . $acid],
                'share_confirmurl' => $_GPC['share_confirmurl_' . $acid],
                'share_fail' => $_GPC['share_fail_' . $acid],
                'share_cancel' => $_GPC['share_cancel_' . $acid],
            );

                if (empty($_GPC['acid_' . $acid])) {
                    pdo_insert('stonefish_fighting_share', $insertshare);
                } else {
                    pdo_update('stonefish_fighting_share', $insertshare, array(
                        'id' => $_GPC['acid_' . $acid]
                    ));
                }
            
        }
        if (!empty($_GPC['typeid']) && $_GPC['question'] == 1) {
            foreach ($_GPC['typeid'] as $index => $typeid) {
                if (empty($typeid)) {
                    continue;
                }
                $insertquestionlist = array(
                    'rid' => $rid,
                    'uniacid' => $uniacid,
                    'typeid' => $_GPC['typeid'][$index],
                    'typenum' => $_GPC['typenum'][$index],
                );
                $questionnum = $questionnum + $_GPC['typenum'][$index];
                if ($_GPC['typenum'][$index]) {
                    $tid.= ',' . $_GPC['typeid'][$index];
                }

                    if ($_GPC['listid'][$index]) {
                        pdo_update('stonefish_fighting_questionlist', $insertquestionlist, array(
                            'id' => $_GPC['listid'][$index]
                        ));
                    } else {
                        pdo_insert('stonefish_fighting_questionlist', $insertquestionlist);
                    }
                
            }
            $questionlist = pdo_fetchall("SELECT id,typeid FROM " . tablename('stonefish_fighting_questionlist') . " WHERE uniacid = :uniacid and rid=:rid", array(
                ':uniacid' => $uniacid,
                ':rid' => $rid
            ));
            foreach ($questionlist as $questionlists) {
                $del = pdo_fetch("SELECT id FROM " . tablename('stonefish_fighting_questiontype') . " WHERE id=:id", array(
                    ':id' => $questionlists['typeid']
                ));
                if (empty($del)) {
                    pdo_delete('stonefish_fighting_questionlist', array(
                        'id' => $questionlists['id']
                    ));
                }
            }
            pdo_update('stonefish_fighting_reply', array(
                'questionnum' => $questionnum,
                'tid' => $tid . ','
            ) , array(
                'id' => $id
            ));
        }
        if ($_GPC['question'] == 0) {
            pdo_delete('stonefish_fighting_questionlist', array(
                'rid' => $rid,
                'uniacid' => $uniacid
            ));
            pdo_update('stonefish_fighting_reply', array(
                'tid' => ''
            ) , array(
                'id' => $id
            ));
        }
 
            return true;
    }
    public function ruleDeleted($rid) {
        global $_W;
        pdo_delete('stonefish_fighting_reply', array(
            'rid' => $rid
        ));
        pdo_delete('stonefish_fighting_exchange', array(
            'rid' => $rid
        ));
        pdo_delete('stonefish_fighting_share', array(
            'rid' => $rid
        ));
        pdo_delete('stonefish_fighting_fans', array(
            'rid' => $rid
        ));
        pdo_delete('stonefish_fighting_logs', array(
            'rid' => $rid
        ));
        pdo_delete('stonefish_fighting_sharedata', array(
            'rid' => $rid
        ));
        pdo_delete('stonefish_fighting_questionlist', array(
            'rid' => $rid
        ));
        pdo_delete('stonefish_fighting_prizeslist', array(
            'rid' => $rid
        ));
        pdo_delete('stonefish_fighting_sharelist', array(
            'rid' => $rid
        ));
        pdo_delete('stonefish_fighting_fanstmplmsg', array(
            'rid' => $rid
        ));
        return true;
    }
    public function settingsDisplay($settings) {
        global $_W, $_GPC;
        load()->func('communication');
        $settings['weixinvisit'] = !isset($settings['weixinvisit']) ? "1" : $settings['weixinvisit'];
        $settings['stonefish_oauth_time'] = !isset($settings['stonefish_oauth_time']) ? "7" : $settings['stonefish_oauth_time'];
        if (checksubmit()) {
            if ($_GPC['stonefish_fighting_oauth'] == 2) {
                if (empty($_GPC['appid']) || empty($_GPC['secret'])) {
                    message('请填写借用AppId或借用AppSecret', referer() , 'error');
                }
            }
            if ($_GPC['stonefish_fighting_jssdk'] == 2) {
                if (empty($_GPC['jssdk_appid']) || empty($_GPC['jssdk_secret'])) {
                    message('请填写借用JS分享AppId或借用JS分享AppSecret', referer() , 'error');
                }
            }
            $dat = array(
                'appid' => $_GPC['appid'],
                'secret' => $_GPC['secret'],
                'jssdk_appid' => $_GPC['jssdk_appid'],
                'jssdk_secret' => $_GPC['jssdk_secret'],
                'weixinvisit' => $_GPC['weixinvisit'],
                'stonefish_oauth_time' => $_GPC['stonefish_oauth_time'],
                'stonefish_fighting_oauth' => $_GPC['stonefish_fighting_oauth'],
                'stonefish_fighting_jssdk' => $_GPC['stonefish_fighting_jssdk']
            );
            $this->saveSettings($dat);
            message('配置参数更新成功！', referer() , 'success');
        }
        include $this->template('settings');
    }
}

