<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<ul class="nav nav-tabs">
	<li<?php  if($_GPC['do'] == 'manage') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('manage');?>">管理幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'post') { ?> class="active"<?php  } ?>><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_scratch'));?>"><i class="fa fa-plus"></i> 添加幸运刮刮卡</a></li>
		<li<?php  if($_GPC['do'] == 'fansdata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('fansdata',array('rid' => $rid));?>">参与粉丝</a></li>
		<li<?php  if($_GPC['do'] == 'sharedata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('sharedata',array('rid' => $rid));?>">分享数据</a></li>
		<li<?php  if($_GPC['do'] == 'prizedata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('prizedata',array('rid' => $rid));?>">中奖名单</a></li>		
		<li<?php  if($_GPC['do'] == 'rankdata') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('rankdata',array('rid' => $rid));?>">粉丝排行</a></li>
		<li<?php  if($_GPC['do'] == 'trend') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('trend',array('rid' => $rid));?>">活动分析</a></li>
		<li<?php  if($_GPC['do'] == 'posttmplmsg') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('posttmplmsg',array('rid' => $rid));?>">消息通知</a></li>
	<?php  if($stonefish_branch) { ?><li<?php  if($_GPC['do'] == 'branch') { ?> class="active"<?php  } ?>><a href="<?php  echo $this->createWebUrl('branch',array('rid' => $rid));?>">商家赠送项</a></li><?php  } ?>
	<li><a href="<?php  echo url('platform/reply/post',array('m'=>'stonefish_scratch', 'rid' => $rid));?>">编辑幸运刮刮卡</a></li>
</ul>
<style>
.account-basicinformation span{font-weight:700;}
.account-stat-num > div{width:33%; float:left; font-size:16px; text-align:center;}
.account-stat-num > div span{display:block; font-size:30px; font-weight:bold;}
</style>
<div class="panel panel-default">
	<div class="panel-heading">
		基本数据信息
	</div>
	<div class="panel-body account-basicinformation">
		<div class="row">
			<div class="col-md-2"><span>参与人数 : </span><?php  echo $reply['fansnum'];?></div>
			<div class="col-md-2"><span>浏览人数 : </span><?php  echo $reply['viewnum'];?></div>
			<div class="col-md-2"><span>奖品数量 : </span><?php  echo $reply['prize_num'];?></div>
			<div class="col-md-2"><span>中奖数量 : </span><?php  echo $reply['zhongjiangnum'];?></div>
			<div class="col-md-2"><span>刮奖数量 : </span><?php  echo $reply['lingqunum'];?></div>
			<div class="col-md-2"><span>助力人数 : </span><?php  echo $reply['helpnum'];?></div>
		</div>		
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		奖品发放情况
	</div>
	<div class="panel-body account-basicinformation">
		<div class="row">
			<div class="col-md-12" style="font-size:16px;">
				<?php  if(is_array($award)) { foreach($award as $awardt) { ?>
		            <?php  echo $awardt['prizerating'];?>:<?php  echo $awardt['prizetotal'];?>/<?php  echo $awardt['prizedraw'];?>　　
		        <?php  } } ?>
			</div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		昨日关键指标
	</div>
	<div class="panel-body">
		<div class="account-stat-num row">
			<div>参与人数<span><?php  echo $fansnum;?></span></div>
			<div>助力人数<span><?php  echo $helpnum;?></span></div>
			<div>中奖数量<span><?php  echo $zhongjiangnum;?></span></div>
		</div>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
		今日关键指标
	</div>
	<div class="panel-body">
		<div class="account-stat-num row">
			<div>参与人数<span><?php  echo $today_fansnum;?></span></div>
			<div>助力人数<span><?php  echo $today_helpnum;?></span></div>
			<div>中奖数量<span><?php  echo $today_zhongjiangnum;?></span></div>
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
				<input name="do" value="trend" type="hidden" />
				<input type="hidden" name="m" value="stonefish_scratch" />
				<input name="rid" value="<?php  echo $rid;?>" type="hidden" />
				<?php  echo tpl_form_field_daterange('datelimit', array('start' => date('Y-m-d', $starttime),'end' => date('Y-m-d', $endtime)), '')?>
				<input type="hidden" value="" name="scroll">
			</form>
		</div>
		<div class="pull-right">
			<div class="checkbox">
				<label style="color:#57B9E6;"><input checked type="checkbox"> 参与人数</label>&nbsp;
				<label style="color:rgba(149,192,0,1);;"><input checked type="checkbox"> 助力人数</label>&nbsp;
				<label style="color:#e7a017;"><input checked type="checkbox"> 中奖数量</label>
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
					label: '参与人数',
					fillColor : "rgba(36,165,222,0.1)",
					strokeColor : "rgba(36,165,222,1)",
					pointColor : "rgba(36,165,222,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(36,165,222,1)",
				},				
				flow3: {
					label: '助力人数',
					fillColor : "rgba(149,192,0,0.1)",
					strokeColor : "rgba(149,192,0,1)",
					pointColor : "rgba(149,192,0,1)",
					pointStrokeColor : "#fff",
					pointHighlightFill : "#fff",
					pointHighlightStroke : "rgba(149,192,0,1)",
				},
				flow4: {
					label: '中奖数量',
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
					ds.flow3.data = datasets.flow3;
					ds.flow4.data = datasets.flow4;
					var lineChartData = {
						labels : label,
						datasets : [ds.flow1, ds.flow3, ds.flow4]
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