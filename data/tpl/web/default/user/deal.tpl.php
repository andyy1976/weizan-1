<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<style>
    .bandwechat { margin: 50px auto; width:300px;}
    .band-button { width:173px;background:#3190ee; height:25px; line-height: 20px; text-align:  center; font-size:13px; border-radius:3px; color:#fff; border:1px solid #3190ee; margin: 20px 0 0 63px; cursor:pointer;}
    .card_msg { display:none;}
    .select-loading { text-align: center; line-height: 70px; color:#ff0000;}
    .errors{ display:none;}
</style>

<div class="bandwechat">
    <table cellpadding="5">
        <tr >
            <td>会员卡号：</td>
            <td><input type="text" class="card_no" name="card_no" disabled value="213100000026" ></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>开始日期：</td>
            <td><input type="text" class="begDate" name="begDate" onClick="WdatePicker()" placeholder="例：20160501" ></td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td>结束日期：</td>
            <td><input type="text" class="endDate" name="endDate" onClick="WdatePicker()" placeholder="例：20160521" ></td>
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
    <table cellpadding="5" width="400" align="center" class="coupon_table">
        <tr>
            <th>门店名称：<span class="shopname"></span></th>
        </tr>
        <tr>
            <th>门店号码：<span class="shopno"></span></th>
        <tr>
            <th>抵扣金额：<span class="dcamt"></span>元</th>
        </tr>
        <tr class="next_clear">
            <td>会员卡号</td>
            <td>订单号码</td>
            <td>交易金额</td>
            <td>交易日期</td>
        </tr>
    </table>
</div>
<div class="bandwechat errors"></div>

<script>

    $('.band-button').on('click',function(){
        $('.card_msg').css({'display':'none'});
        $('.select-loading').html('正在查询请稍后....');
        var card = $('.card_no').val(),
                begDate  = $('.begDate').val(),
                endDate = $('.endDate').val();
        begDate = begDate.replace(/-/g,'');
        endDate = endDate.replace(/-/g,'');
        $.ajax({
            type : "post",
            url : "<?php  echo url('user/usermsg&do=selectdeal');?>",
            data : "card_no=" + card + "&begDate=" + begDate + '&endDate=' + endDate ,
            dataType : 'json',
            success : function(data){
                var type = typeof(data);
                if(type == 'string'){
                    $('.select-loading').css({ 'display' : 'none' });
                    $('.errors').html(data);
                    $('.errors').css({ 'display' : 'block' });
                }else{
                    console.log(data);
                    $('.next_clear').nextAll().empty();
                    $('.select-loading').css({ 'display' : 'none' });
                    var fct = typeof(data['firstcard']);
                    if(fct == 'object') {
                        for (var i = 0; i < data['firstcard'].length; i++) {
                            var htmls = "<tr><td>" +
                                    data['firstcard'][i] +
                                    "</td><td>" +
                                    data['orderno'][i] +
                                    "</td><td>" +
                                    data['transactionamount'][i] +
                                    "元</td><td>" +
                                    data['transactiondate'][i] +
                                    "</td></tr>";
                            $('.coupon_table').append(htmls);
                        }
                    }else{
                        var htmls = "<tr><td>" +
                                data['firstcard'] +
                                "</td><td>" +
                                data['orderno'] +
                                "</td><td>" +
                                data['transactionamount'] +
                                "元</td><td>" +
                                data['transactiondate'] +
                                "</td></tr>";
                        $('.coupon_table').append(htmls);
                    }
                    var shopname = data['shopname'],
                        shopno = data['shopno'],
                        dcamt = data['dcamt'];
                    if(dcamt = ' '){
                        dcamt = 0;
                    }
                    $('.shopname').html(shopname);
                    $('.shopno').html(shopno);
                    $('.dcamt').html(dcamt);
                    $('.card_msg').css({ 'display' : 'block' });
                    $('.errors').css({ 'display' : 'none' });
                }
            }
        });

    })


</script>