<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
    <style>
        .bandwechat { margin: 50px auto; width:300px;}
        .band-button { width:173px;background:#3190ee; height:25px; line-height: 20px; text-align:  center; font-size:13px; border-radius:3px; color:#fff; border:1px solid #3190ee; margin: 20px 0 0 63px; curosr:poniter;}
    </style>
<div class="bandwechat">
    <table cellpadding="5">
        <form action="/weilian/web/index.php?c=user&a=opencard&do=open" method="post" >
            <tr class="top10">
                <td>会员卡号：</td>
                <td><input type="text" name="card_no"   value="213100000026" ></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr class="top10">
                <td>会员卡密码：</td>
                <td><input type="password" name="card_pwd" value="888888" ></td>
            </tr>
            <tr><td>&nbsp;</td></tr>
            <tr class="top10">
                <td>身份证号：</td>
                <td><input tyep="text" name="id_no" value="410926199305091231" </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="开通" class="band-button" ></td>
            </tr>
        </form>
    </table>

</div>