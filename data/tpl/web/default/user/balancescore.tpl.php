<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<style>
    .bandwechat { margin: 50px auto; width:300px;}
    .band-button { width:173px;background:#3190ee; height:25px; line-height: 20px; text-align:  center; font-size:13px; border-radius:3px; color:#fff; border:1px solid #3190ee; margin: 20px 0 0 63px; cursor:pointer;}
    .card_msg , .errors { display:none;}
    .select-loading { text-align: center; line-height: 70px; color:#ff0000;}
</style>
<div class="bandwechat">
    <table cellpadding="5">
        <tr class="top10">
            <td>会员卡号：</td>
            <td><input type="text" class="card_no" name="card_no" disabled value="213100000026" ></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr class="top10">
            <td>会员卡密码：</td>
            <td><input type="password" class="card_pwd" name="card_pwd" value="888888" ></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="查询" class="band-button" ></td>
        </tr>
        </form>
        <tr>
            <td colspan="2" class="select-loading"></td>
        </tr>
    </table>
</div>
<div class="bandwechat card_msg">
    <p class="cardno" ></p>
    <p class="cardbalance" ></p>
    <p class="cardintegral" ></p>
    <p class="cardfreezebalance" ></p>
    <p class="othbala" ></p>
</div>
<dvi class="bandwechat errors"></dvi>
<script>

    $('.band-button').on('click',function(){
        $('.select-loading').html('正在查询请稍后....');
        var card_no  = $('.card_no').val(),
                card_pwd = $('.card_pwd').val();

        $.ajax({
            type : "post",
            url : "<?php  echo url('user/usermsg&do=dobalancescore');?>",
            data : "card_no=" + card_no + "&card_pwd=" + card_pwd,
            dataType : 'json',
            success : function(data){
                var dt = typeof(data);
                console.log(dt);
                if(dt == 'object'){
                    $('.select-loading').css({ 'display' : 'none' });
                    $('.errors').css({ 'display' : 'none' });
                    $('.cardno').html("会员卡号：&nbsp;" + data.cardno);
                    $('.cardbalance').html("会员余额：&nbsp;" + data.cardbalance + "元");
                    $('.cardfreezebalance').html("会员积分：&nbsp;" + data.cardfreezebalance);
                    $('.cardintegral').html("冻结余额：&nbsp;" + data.cardintegral + "元");
                    $('.othbala').html("抵扣余额：&nbsp;" + data.othbala + "元");
                    $('.card_msg').css({ 'display' : 'block' });
                }else if(dt == 'string'){
                    $('.select-loading').css({ 'display' : 'none' });
                    $('.errors').html(data);
                    $('.errors').css({ 'display' : 'block' });
                    $('.card_msg').css({ 'display' : 'none' });
                }else{
                    $('.select-loading').css({ 'display' : 'none' });
                    $('.errors').html('未查到该会员卡的信息');
                    $('.errors').css({ 'display' : 'block' });
                    $('.card_msg').css({ 'display' : 'none' });
                }
            }
        });

    })


</script>