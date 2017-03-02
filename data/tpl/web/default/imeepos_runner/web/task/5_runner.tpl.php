<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/task/navs', TEMPLATE_INCLUDEPATH)) : (include template('web/task/navs', TEMPLATE_INCLUDEPATH));?>
<?php  load()->func('tpl')?>
<style>
.map{
	width:100%;
	height:800px;
}
</style>
<div class="panel">
	<div class="panel-heading">
		地图监控
	</div>
	<div class="panel-body">
		<div class="form-controll">
			<div class="col-sm-10 col-xs-12">
				<?php  echo tpl_form_field_district('city',array())?>
			</div>
		</div>
		<div class="map" id="map"></div>
	</div>
</div>

<script>
require(['jquery','map','district'],function($,BMap,district){
	district.render('city');
	var val = {};
	if(!val.lng) {
		val.lng = 116.403851;
	}
	if(!val.lat) {
		val.lat = 39.915177;
	}
	var point = new BMap.Point(val.lng, val.lat);
	
	map = util.map.instance = new BMap.Map('map');
	map.centerAndZoom(point, 12);
	map.enableScrollWheelZoom();
	map.enableDragging();
	map.enableContinuousZoom();
	map.addControl(new BMap.NavigationControl());
	map.addControl(new BMap.OverviewMapControl());
	
});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>