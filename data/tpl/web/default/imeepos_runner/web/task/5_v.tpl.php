<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('web/task/navs', TEMPLATE_INCLUDEPATH)) : (include template('web/task/navs', TEMPLATE_INCLUDEPATH));?>
<style>
.editable-click, a.editable-click {
    color: #000 !important;
    border-bottom:none !important;
    text-decoration: none;
}
.editable-input.editable-has-buttons {
    width: auto;
    max-width: 100px;
}
.st-sort-ascent:before {
    content: '\25B2';
}
</style>
<div class="panel panel-default" ng-app="app" ng-controller="rootCtrl">
	<div class="panel-heading">
		会员管理
	</div>
	<div class="panel-body">
		<table st-table="items" class="table table-striped">
			<thead>
				
				
				<tr>
					<th style="width:50px;" st-sort="uid">会员编号</th>
					<th style="width:140px;" st-sort="nickname">会员昵称</th>
					<th style="width:140px;" st-sort="realname">真实姓名</th>
					<th style="width:140px;" st-sort="mobile">手机号</th>
					<th style="width:80px;" st-sort="avatar">会员头像</th>
					<th style="width:80px;" st-sort="status">状态</th>
					<th style="width:80px;" st-sort="isrunner">是否跑腿</th>
					<th>操作</th>
				</tr>
				<tr>
					<th  colspan="2">
						<input st-search="uid" placeholder="会员uid" class="input-sm form-control" type="search"/>
					</th>
					<th  colspan="2">
						<input st-search="title" placeholder="昵称" class="input-sm form-control" type="search"/>
					</th>
					<th colspan="2">
						<input st-search="mobile" placeholder="手机号" class="input-sm form-control" type="search"/>
					</th>
					<th colspan="2">
						<input st-search="realname" placeholder="真实姓名" class="input-sm form-control" type="search"/>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="item in items">
					<td>
						{{item.uid}}
					</td>
					<td>
						{{ item.nickname || "未获取" }}
					</td>
					<td>
						{{ item.realname || "未完善" }}
					</td>
					<td>
						{{ item.mobile || "未完善" }}
					</td>
					<td>
						<img ng-src="{{item.avatar || '../addons/meepo_voteplatform/icon.jpg'}}" style="width:50px;height:50px;"/>
					</td>
					<td><label class="label {{item.status_label}}" ng-click="status(item)">{{item.statustitle}}</label></td>
					<td><label class="label {{item.isrunner_label}}" ng-click="isrunner(item)">{{item.isrunnertitle}}</label></td>
					
					<td>
						<a class="btn btn-default" ng-mouseenter="tooltip()" data-toggle="tooltip" data-placement="top" title="删除项目" href="#" ng-click="delete(item.id,$index)">
							<i class="fa fa-times"></i>
						</a>
					</td>
				</tr>
			</tbody>
			<tfoot>
				<tr class="text-center">
					<td colspan="9">
						<div st-pagination="" st-items-by-page="itemsByPage" st-displayed-pages="7"></div>
					</td>
				</tr>
			</tfoot>
		</table>
	</div>
	<div class="panel-footer">
	
	</div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo MODULE_URL;?>/public/libs/angular-xeditable/dist/css/xeditable.css"/>
<script src="<?php echo MODULE_URL;?>public/libs/angular.min.js"></script>
<script type="text/javascript" src="<?php echo MODULE_URL;?>/public/libs/smart-table.js"></script>
<script type="text/javascript" src="<?php echo MODULE_URL;?>/public/libs/angular-xeditable/dist/js/xeditable.js"></script>
<script src="<?php echo MODULE_URL;?>/public/libs/ui-bootstrap-tpls.min.js"></script>
<script>
	var app = angular.module('app',['xeditable','smart-table',"ui.bootstrap"]);
	app.run(function(editableOptions) {
		editableOptions.theme = 'bs3';
	});
	app.controller('rootCtrl',function($scope,$http){
		$scope.items = <?php  echo json_encode($list)?>;
		var addurl = "<?php  echo $this->createWebUrl('v',array('act'=>'add'))?>";
		var deleteurl = "<?php  echo $this->createWebUrl('v',array('act'=>'delete'))?>";
		
		$scope.tooltip = function(){
			$scope.tooltip = function(){
				$('[data-toggle="tooltip"]').tooltip();
			}
		}
		
		$scope.delete = function(id,start){
			var truthBeTold = window.confirm("您确定要删除此会员么，单击“确定”继续。单击“取消”停止。");
			if(truthBeTold){
				$http.get(deleteurl+'&id='+id).success(function(data){
					$scope.items.splice(start,1);
				});
			}
		}
		
		$scope.isrunner = function(e){
			if(e.isrunner == 0){
				e.isrunner = 1;
				e.isrunnertitle = '是';
				e.isrunner_label = 'label-info';
			}else{
				e.isrunner = 0;
				e.isrunnertitle = '否';
				
				e.isrunner_label = 'label-danger';
			}
			$http.post(addurl,e).success(function(data){});
		}
		
		$scope.status = function(e){
			if(e.status == 0){
				e.status = 1;
				e.statustitle = '审核通过';
				e.status_label = 'label-info';
			}else{
				e.status = 0;
				e.statustitle = '待审核';
				
				e.status_label = 'label-danger';
			}
			$http.post(addurl,e).success(function(data){});
		}
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>