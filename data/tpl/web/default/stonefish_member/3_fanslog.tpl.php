<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li><a href="<?php  echo $this->createWebUrl('level');?>">等级头衔</a></li>
	<li><a href="<?php  echo $this->createWebUrl('sms');?>">短信中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('signin');?>">签到中心</a></li>	
	<li><a href="<?php  echo $this->createWebUrl('message');?>">消息中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('feedback');?>">留言中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('task');?>">任务中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('member');?>">会员中心</a></li>
	<li><a href="<?php  echo $this->createWebUrl('template');?>">会员模板</a></li>
	<li class="active"><a href="<?php  echo $this->createWebUrl('fanslog');?>">粉丝统计</a></li>
	<li><a href="<?php  echo $this->createWebUrl('memberlog');?>">会员统计</a></li>
</ul>
<?php  if($ids_num>1) { ?>
<div class="alert alert-info">
	<a href="<?php  echo $this->createWebUrl('fanslog');?>" title="粉丝统计" class="btn btn-<?php  if(empty($acid)) { ?>danger<?php  } else { ?>primary<?php  } ?>"><i class="fa fa-bar-chart-o"></i> 总粉丝统计</a>
	<?php  if(is_array($ids)) { foreach($ids as $idsname) { ?>
	<a href="<?php  echo $this->createWebUrl('fanslog',array('acid' => $idsname['id']));?>" title="<?php  echo $acid_arr[$idsname]['name'];?>之粉丝统计" style="margin-left:15px;" class="btn btn-<?php  if($acid==$idsname['id']) { ?>danger<?php  } else { ?>primary<?php  } ?>"><i class="fa fa-bar-chart-o"></i> <?php  echo $acid_arr[$idsname]['name'];?></a>
	<?php  } } ?>
</div>
<?php  } ?>
<style>
.account-basicinformation span{font-weight:700;}
.account-stat-num > div{width:25%; float:left; font-size:16px; text-align:center;}
.account-stat-num > div span{display:block; font-size:30px; font-weight:bold;}
</style>
<div class="panel panel-default">
	<div class="panel-heading">
		<?php  echo $uncount['name'];?>基本信息
	</div>
	<div class="panel-body account-basicinformation">
		<?php  if($acid) { ?>
		<div class="row">
			<div class="col-md-6"><span>公众号名称 : </span><?php  echo $account['name'];?>（<?php  if($account['type'] == 1) { ?>微信<?php  } else { ?>易信<?php  } ?>）</div>
			<div class="col-md-6"><span>接入状态 : </span><?php  if($account['isconnect'] == 1) { ?>接入成功<?php  } else { ?>未接入<?php  } ?></div>
		</div>
		<?php  } else { ?>
		<div class="row">
			<div class="col-md-6"><span>公众号名称 : </span><?php  echo $uncount['name'];?></div>
			<div class="col-md-6"><span>子公众号 : </span><?php  echo $ids_num;?></div>
		</div>
		<?php  } ?>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		昨日关键指标
	</div>
	<div class="panel-body">
		<div class="account-stat-num row">
			<div>新关注人数<span><?php  echo $add_num;?></span></div>
			<div>取消关注人数<span><?php  echo $cancel_num;?></span></div>
			<div>净增关注人数<span><?php  echo $jing_num;?></span></div>
			<div>累积关注人数<span><?php  echo $total_num;?></span></div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		今日关键指标
	</div>
	<div class="panel-body">
		<div class="account-stat-num row">
			<div>新关注人数<span><?php  echo $today_add_num;?></span></div>
			<div>取消关注人数<span><?php  echo $today_cancel_num;?></span></div>
			<div>净增关注人数<span><?php  echo $today_jing_num;?></span></div>
			<div>累积关注人数<span><?php  echo $today_total_num;?></span></div>
		</div>
	</div>
</div>

<div class="panel panel-default">
	<div class="panel-heading">
		关键指标详解
	</div>
	<div class="panel-body" id="scroll">
		<div class="pull-left">
			<form action="" id="form1">
				<input name="c" value="site" type="hidden" />
				<input name="a" value="entry" type="hidden" />
				<input name="do" value="fanslog" type="hidden" />
				<input type="hidden" name="m" value="stonefish_member" />
				<input name="acid" value="<?php  echo $acid;?>" type="hidden" />
				<input name="uniacid" value="<?php  echo $uniacid;?>" type="hidden" />
				<?php  echo tpl_form_field_daterange('datelimit', array('start' => date('Y-m-d', $starttime),'end' => date('Y-m-d', $endtime)), '')?>
				<input type="hidden" value="" name="scroll">
			</form>
		</div>
		<div class="pull-right">
			<div class="checkbox">
				<label style="color:#57B9E6;"><input checked type="checkbox"> 新关注人数</label>&nbsp;
				<label style="color:rgba(203,48,48,1)"><input checked type="checkbox"> 取消关注人数</label>&nbsp;
				<label style="color:rgba(149,192,0,1);;"><input checked type="checkbox"> 净增关注人数</label>&nbsp;
				<label style="color:#e7a017;"><input checked type="checkbox"> 累积关注人数</label>
			</div>
		</div>
		<div style="margin-top:20px">
			<canvas id="myChart" width="1200" height="300"></canvas>
		</div>
	</div>
</div>
	<script>
		require(['chart', 'jquery', 'daterangepicker'], function(c, $) {
			$('.daterange').on('apply.daterangepicker', function(ev, picker) {
				$('input[name="scroll"]').val($(document).scrollTop());
				$('#form1')[0].submit();
			});
			<?php  if($scroll) { ?> 
				var scroll = "<?php  echo $scroll;?>";
				$("html,body").animate({scrollTop: scroll}, 300);
			<?php  } ?>
			var chart = null;
			var chartDatasets = null;
			var templates = {
				flow1: {
					label: '新关注人数',
					fillColor : "rgba(36,165,222,0.1)",
					strokeColor : "rgba(36,165,222,1)",
					pointColor : "rgba(36,165,222,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(36,165,222,1)",
				},
				flow2: {
					label: '取消关注人数',
					fillColor : "rgba(203,48,48,0.1)",
					strokeColor : "rgba(203,48,48,1)",
					pointColor : "rgba(203,48,48,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(203,48,48,1)",
				},
				flow3: {
					label: '净增关注人数',
					fillColor : "rgba(149,192,0,0.1)",
					strokeColor : "rgba(149,192,0,1)",
					pointColor : "rgba(149,192,0,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(149,192,0,1)",
				},
				flow4: {
					label: '累计关注人数',
					fillColor : "rgba(231,160,23,0.1)",
					strokeColor : "rgba(231,160,23,1)",
					pointColor : "rgba(231,160,23,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(231,160,23,1)",
				}
			};

			function refreshData() {
				if(!chart || !chartDatasets) {
					return;
				}
				var visables = [];
				var i = 0;
				$('.checkbox input[type="checkbox"]').each(function(){
					if($(this).attr('checked')) {
						visables.push(i);
					}
					i++;
				});
				var ds = [];
				$.each(visables, function(){
					var o = chartDatasets[this];
					ds.push(o);
				});
				chart.datasets = ds;
				chart.update();
			}

			var url = location.href + '&#aaaa';
			$.post(url, function(data){
				var data = $.parseJSON(data)
				var datasets = data.datasets;

				if(!chart) {
					var label = data.label;
					var ds = $.extend(true, {}, templates);
					ds.flow1.data = datasets.flow1;
					ds.flow2.data = datasets.flow2;
					ds.flow3.data = datasets.flow3;
					ds.flow4.data = datasets.flow4;
					var lineChartData = {
						labels : label,
						datasets : [ds.flow1, ds.flow2, ds.flow3, ds.flow4]
					};

					var ctx = document.getElementById("myChart").getContext("2d");
					chart = new Chart(ctx).Line(lineChartData, {
						responsive: true
					});
					chartDatasets = $.extend(true, {}, chart.datasets);
				}
				refreshData();
			});

			$('.checkbox input[type="checkbox"]').on('click', function(){
				$(this).attr('checked', !$(this).attr('checked'))
				refreshData();
			});
 		});
	</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>