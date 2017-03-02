<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
    <style>
        .bandwechat { margin: 50px auto; width:400px;}
        .tr { text-align: right;}
        .tl { text-align: left; text-indent: 15px; margin-right: 10px;}
        .band-button { width:173px;background:#3190ee; height:25px; line-height: 20px; text-align:  center; font-size:13px; border-radius:3px; color:#fff; border:1px solid #3190ee; margin: 20px 0 0 63px; curosr:poniter;}
        td { text-indent: 10px; }
    </style>
<div class="bandwechat">
    <table cellpadding="5">
        <form action="/weilian/web/index.php?c=user&a=updatepwd&do=save" method="post">
        <tr>
            <td class="tr">卡号:</td>
            <td class="tl"><input type="text" name="card_no" value="213100000026" class="card_no" ></td>
            <td></td>
        </tr>
            <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="tr">旧密码:</td>
            <td class="tl"><input type="password" name="bepassword" class="bepass" ></td>
            <td class="beforpwd " ></td>
        </tr>
            <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="tr">新密码:</td>
            <td class="tl"><input type="password" name="newpassword" class="newpass" placeholder="请输入6位数字"></td>
            <td class="newpwd" ></td>
        </tr>
            <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="tr">确认新密码:</td>
            <td class="tl"><input type="password" name="repassword" class="repass" ></td>
            <td class="repwd " ></td>
        </tr>
            <tr><td>&nbsp;</td></tr>
        <tr>
            <td colspan="2"><input type="submit" class="band-button" value="修改"></td>
        </tr>
        </form>
    </table>
</div>

<script>

    $('.bepass').on('blur',function(){
        var card_no = $('.card_no').val(),
            card_mm = $('.bepass').val();
        $.ajax({
            type : "post",
            url : "<?php  echo url('user/updatepwd&do=checkbeforpwd');?>",
            data : "card_no=" + card_no + "&card_mm=" + card_mm,
            dateType : 'json',
            success : function(data){
               if(data == 1 ){
                   $('.beforpwd').css({ 'display' : 'block','color' : '#3190ee'});
                   $('.beforpwd').html('旧密码正确');
                   $('.band-button').removeAttr('disabled');
               }else{
                   $('.beforpwd').css({ 'display' : 'block','color' : '#ff0000'});
                   $('.beforpwd').html('旧密码错误');
                   $('.band-button').attr({'disabled' : 'true'});
               }
            }
        });
    });


    $('.newpass').on('blur',function(){
        var card_mm = $('.bepass').val(),
            pwd2 = $('.newpass').val();
        if(card_mm == pwd2){
            $('.newpwd').css({ 'display' : 'block','color' : '#ff0000'});
            $('.newpwd').html('新旧密码相同');
            $('.band-button').attr({'disabled' : 'true'});
        }else if(pwd2.match(/^\d{6}$/) == null){
            $('.newpwd').css({ 'display' : 'block','color' : '#ff0000'});
            $('.newpwd').html('新密码格式错误');
            $('.band-button').attr({'disabled' : 'true'});
        }else{
            $('.newpwd').css({ 'display' : 'block','color' : '#3190ee'});
            $('.newpwd').html('密码正确');
            $('.band-button').removeAttr('disabled');
        }
    });

    $('.repass').on('blur',function(){
        var pwd2 = $('.newpass').val(),
            pwd3 = $('.repass').val();
        if(pwd2 != pwd3){
            $('.repwd').css({ 'display' : 'block','color' : '#ff0000'});
            $('.repwd').html('两次密码输入不符');
            $('.band-button').attr({'disabled' : 'true'});
        }else{
            $('.repwd').css({ 'display' : 'block','color' : '#3190ee'});
            $('.repwd').html('密码正确');
            $('.band-button').removeAttr('disabled');
        }
    });

    $('.band-button').on('click',function(){
        var card_no = $('.card_no').val(),
                pwd1 = $('.bepass').val(),
                pwd2 = $('.newpass').val(),
                pwd3 = $('.repass').val();
        $.ajax({
            type : "post",
            url : "<?php  echo url('user/updatepwd&do=save');?>",
            data : "card_no=" + card_no + "&pwd1=" + pwd1 + "&pwd2=" + pwd2 + "&pwd3=" + pwd3,
            dateType : 'json',
            success : function(data){
                console.log(data);
            }
        });
    });
</script>