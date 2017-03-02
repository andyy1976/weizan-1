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
            <td>会员卡卡号:</td>
            <td><input type="text" class="cardNo" name="cardNo" disabled value="213100000026" ></td>
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
    <table cellpadding="5" width="350" align="center" class="coupon_table">
        <tr class="next_clear">
            <th>卡券编号</th>
            <th>卡券名称</th>
            <th>开始日期</th>
            <th>结束日期</th>
        </tr>
    </table>
</div>
<div class="bandwechat errors"></div>
<script>

    $('.band-button').on('click',function(){
        $('.select-loading').html('正在查询请稍后....');
        var cardNo  = $('.cardNo').val();

        $.ajax({
            type : "post",
            url : "<?php  echo url('user/usermsg&do=selectcoupon');?>",
            data : "cardNo=" + cardNo ,
            dataType : 'json',
            success : function(data){
                $('.select-loading').html();
                var type = typeof(data);
                if(type == 'string'){
                    $('.select-loading').css({ 'display' : 'none' });
                    $('.errors').html(data);
                    $('.errors').css({ 'display' : 'block' });
                    $('.card_msg').css({ 'display' : 'none' });
                }else{
                    console.log(data);
                    $('.errors').css({ 'display' : 'none' });
                    $('.next_clear').nextAll().empty();
                    $('.select-loading').css({ 'display' : 'none' });
                    for(var i= 0; i<data.length; i++){
                        var htmls = "<tr><td>" +
                                data[i][0] +
                                "</td><td>" +
                                data[i][1] +
                                "</td><td>" +
                                data[i][2] +
                                "</td><td>" +
                                data[i][3] +
                                "</td></tr>" ;
                        $('.coupon_table').append(htmls);
                    }
                    $('.card_msg').css({ 'display' : 'block' });
                }
            }
        });

    })


</script>