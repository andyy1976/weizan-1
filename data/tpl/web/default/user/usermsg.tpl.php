<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
    <style>
        .bandwechat { margin: 50px auto; width:300px;}
        .tr { text-align: right;}
        .tl { text-align: left; text-indent: 15px;}
    </style>
<div class="bandwechat">
    <table cellpadding="5">
        <tr>
            <td class="tr">姓名:</td>
            <td class="tl"><?php  echo $userInfo['name'];?></td>
        </tr>
        <tr>
            <td class="tr">性别:</td>
            <td class="tl"><?php  echo $userInfo['sex'];?></td>
        </tr>
        <tr>
            <td class="tr">出生日期:</td>
            <td class="tl"><?php  echo $userInfo['birth'];?></td>
        </tr>
        <tr>
            <td class="tr">公司名称:</td>
            <td class="tl"><?php  echo $userInfo['company'];?></td>
        </tr>
        <tr>
            <td class="tr">电话号码:</td>
            <td class="tl"><?php  echo $userInfo['phone'];?></td>
        </tr>
        <tr>
            <td class="tr">手机号码:</td>
            <td class="tl"><?php  echo $userInfo['moblie'];?></td>
        </tr>
        <tr>
            <td class="tr">通信地址:</td>
            <td class="tl"><?php  echo $userInfo['address'];?></td>
        </tr>
        <tr>
            <td class="tr">邮箱地址:</td>
            <td class="tl"><?php  echo $userInfo['email'];?></td>
        </tr>
        <tr>
            <td class="tr">邮编号码:</td>
            <td class="tl"><?php  echo $userInfo['postcode'];?></td>
        </tr>
        <tr>
            <td class="tr">会员卡号:</td>
            <td class="tl"><?php  echo $userInfo['cardno'];?></td>
        </tr>
    </table>

</div>