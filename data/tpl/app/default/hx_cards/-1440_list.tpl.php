<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<style>
	body{background:#d2e6e9; padding-bottom:63px; font-family:Helvetica, Arial, sans-serif;}
	.panel{margin-bottom:0px; border:none;}
	.panel.panel-default{color:#606366;}
	.panel>.list-group:last-child .list-group-item:last-child{border-bottom:1px solid #dddddd;}
	.panel.panel-default ul{background:-webkit-gradient(linear,0 0, 0 10%,from(rgba(90,197,212,1)), to(rgba(90,197,212,1))) center top; border-top:10px solid #e4e9e8; -webkit-background-size:100% 2px; padding-top:2px; background-repeat:no-repeat;}
	.panel.panel-default:first-child ul{background:none; border-top:0; padding-top:0;}
	.panel.panel-default ul .list-group-item{background-color:#e1ecee; height:48px; overflow:hidden;}
	.panel.panel-default ul .list-group-item i{font-size:20px; display:inline-block; width:25px; margin-right:10px; color:#8dd1db; text-align:center; position:relative; top:3px;}
	.panel.panel-default ul .list-group-item > .pull-right i{display:inline-block; font-size:22px; color:#888; position:absolute; right:0px; top:12px;}
	.panel.panel-default ul .list-group-item > .pull-right .btn{background:#56c6d6; color:#FFF; border:0; border-radius:1px; margin-top:-5px; width:100px; height:32px; font-size:17px; white-space:pre-line;}
	.btn-group-top-box{padding:10px 0; border-bottom:1px solid #a5d7de;}
	.btn-group-top{margin:0 auto; overflow:hidden; width:200px; display:block;text-align:center;}
	.btn-group-top .btn{width:100px; -webkit-box-shadow:none; box-shadow:none; border-color:#5ac5d4; color:#5ac5d4; background:#d1e5e9;}
	.btn-group-top .btn:hover{color:#FFF; background:#addbe1;}
	.btn-group-top .btn.active{color:#FFF; background:#5ac5d4;}
	.btn.use{background:#56c6d6; color:#FFF; border:0; border-radius:4px;}
	.pagination>li>a:hover, .pagination>li>span:hover, .pagination>li>a:focus, .pagination>li>span:focus {color: #5ac5d4; background-color: #eee; border-color: #a5d7de;}
	.pagination>.active>a, .pagination>.active>span, .pagination>.active>a:hover, .pagination>.active>span:hover, .pagination>.active>a:focus, .pagination>.active>span:focus{background-color:#5ac5d4; border-color:#5ac5d4;}
	.pagination>li>a, .pagination>li>span{color:#5ac5d4; border:1px solid #a5d7de;}
	/*消费记录*/
	.consume .record-head{width:100%; height:100px; border-bottom:1px solid #a5d7de;margin-bottom:1px;}
	.consume .record-head ul{margin:0 auto; list-style:none; padding:0px; }
	.consume .record-head li{height:50px; line-height:50px; background-color:#ffffff;}
	.consume .record-head .date{padding:0px 5px; text-align:center; }
	.consume .record-head .money{width:46%; float:left; color:#999; height:50px; padding:0 4%; line-height:50px;}
	.consume .record-head .income{margin-right:20px;}
	.consume .record-head .money span{color:#333;}
	.consume .record-box{background:transparent url('resource/images/home-bg.jpg') no-repeat; background-size:100% 100%;}
	.consume .list-item{height:70px; padding:10px 5px; border-bottom:1px solid #dddddd;}
	.consume .list-item>div{float:left;}
	.consume .record-box .member-detail{width:15%; text-align:center;}
	.consume .record-box .member-detail .img-rounded{width:30px; height:30px; line-height:30px; overflow:hidden; background:#5ac5d4; margin:0 auto; text-align:center;}
	.consume .record-box .member-detail .img-rounded i{font-size:20px; margin-top:4px; display:inline-block; color:#FFF;}
	.consume .record-box .member-detail .img-rounded img{width:20px;}
	.consume .record-box .member-detail span{display:block; width:100%; text-align:center; font-size:12px; color:#999; margin-top:3px;}
	.consume .record-box .record-detail{width:70%;}
	.consume .record-box .record-detail > div{margin-top:4px; border-left:1px #DDD solid; padding-left:10px;}
	.consume .record-box .record-detail > div span{display:block;}
	.consume .record-box .record-detail > div .name{font-size:15px; width:160px; text-overflow:ellipsis; white-space:nowrap; overflow:hidden;}
	.consume .record-box .record-detail > div .date{font-size:13px; margin-top:5px; color:#999;}
	.consume .record-box .pay-detail{width:23%; text-align:right; margin-right:2%;}
	.consume .record-box .pay-detail > div{margin-top:4px;}
	.consume .record-box .pay-detail > div span{display:block; text-align:right;}
	.consume .record-box .pay-detail > div .money{font-size:15px; font-weight:bold;}
	.consume .record-box .pay-detail > div .state{font-size:13px; margin-top:5px; color:#999;}
	.consume .list-group-item{background-color:#e1ecee;}
	/*收货地址*/
	.address,.address-edit{background:#FFF; padding:10px 15px;}
	.address > a{text-decoration:none; margin-bottom:5px; border-bottom:1px #DDD solid; padding-bottom:5px; display:block;}
	.address > a:last-child{border-bottom:0; margin-bottom:0;}
	.address div{padding:0px; margin:0px;}
	/*@media screen and (max-width: 767px) {.tpl-calendar div,.tpl-district-container div{margin-bottom:10px;}*/
</style>
<script>
	require(['jquery'],function($){
		$(".list-coupon").delegate("li","click",function(){
			$(this).find(".list-coupon-ft > div").slideToggle();
		});
	});
</script>
	<div class="consume">
		<div class="record-box list clearfix">
			<?php  if(is_array($list)) { foreach($list as $item) { ?>
			<div class="list-item">
				<div class="record-detail">
					<div>
						<span class="name"><?php  echo $item['name'];?></span>
						<span class="date"><?php  echo date('Y-m-d',$item['createtime'])?>[<?php  echo $this->getreplyname($item['reply_id'])?>]</span>
					</div>
				</div>
				<div class="pay-detail">
					<div>
						<span class="money">奖品<?php  echo $item['level'];?></span>
						<span class="state"><?php  if($item['status'] == 1) { ?>操作成功<?php  } ?></span>
					</div>
				</div>
			</div>
			<?php  } } ?>
		</div>
			<div class="btn-group-top-box">
				<div class="btn-group btn-group-top" style="width:320px;">
					<?php  echo $pager;?>
				</div>
			</div>
		</div>
	<script type="text/javascript">
		require(['daterangepicker'], function($){
			$('.daterange').on('apply.daterangepicker', function(ev, picker) {
				$('#form1')[0].submit();
			});
		});
	</script>
<ul class="nav nav-bardown nav-justified" style="z-index:10;">
	<li><a href="<?php  echo $this->createMobileUrl('detail',array('id'=>$reply_id))?>"><i class="fa fa-credit-card"></i> <span>返回抽奖</span></a></li>
	<li><a href="<?php  echo url('mc');?>"><i class="fa fa-user"></i> <span>个人中心</span></a></li>
</ul>
<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
