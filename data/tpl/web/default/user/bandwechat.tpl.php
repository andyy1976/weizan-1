<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>绑定微信账号</title>
    <style>
        .bandwechat { margin: 200px auto; width:300px;}
        .band-button { width:173px;background:#3190ee; height:25px; line-height: 20px; text-align:  center; font-size:13px; border-radius:3px; color:#fff; border:1px solid #3190ee; margin: 20px 0 0 63px; curosr:poniter;}
    </style>
</head>
<body>
<div class="bandwechat">
    <table cellpadding="5">
        <form action="/weilian/web/index.php?c=user&a=dobandwechat" method="post" >
            <tr>
                <td>会员卡号：</td>
                <td><input type="text" name="card_no" value="213100000026" ></td>
            </tr>
            <tr>
                <td>会员卡密码：</td>
                <td><input type="password" name="card_pwd" value="888888" ></td>
            </tr>
            <tr>
                <td>身份证号：</td>
                <td><input tyep="text" name="id_no" value="410926199305091231" </td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="绑定" class="band-button" ></td>
            </tr>
            <input type="hidden" name="openid" value="<?php  echo $userInfo['openid'];?>" >
            <input type="hidden" name="nickname" value="<?php  echo $userInfo['nickname'];?>" >
            <input type="hidden" name="sex" value="<?php  echo $userInfo['sex'];?>" >
            <input type="hidden" name="province" value="<?php  echo $userInfo['province'];?>" >
            <input type="hidden" name="city" value="<?php  echo $userInfo['city'];?>" >
            <input type="hidden" name="country" value="<?php  echo $userInfo['country'];?>" >
            <input type="hidden" name="headimgurl" value="<?php  echo $userInfo['headimgurl'];?>" >
        </form>
    </table>

</div>
</body>
</html>