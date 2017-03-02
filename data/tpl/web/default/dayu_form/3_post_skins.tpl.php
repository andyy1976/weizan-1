<?php defined('IN_IA') or exit('Access Denied');?>
		
        <div class="panel panel-default">
            <div class="panel-heading">参数设置</div>
            <div class="panel-body">
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">是否需要关注才可提交预约</label>
            <div class="col-sm-9 col-xs-12">
               <label class='radio-inline' ><input type='radio' name='follow' value='1' <?php  if($activity['follow']==1) { ?>checked<?php  } ?> /> 必须关注</label>
                <label class='radio-inline' ><input type='radio' name='follow' value='0' <?php  if($activity['follow']==0) { ?>checked<?php  } ?> /> 不需要关注</label>
            </div>
        </div>
		<div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">用户是否可以删除表单记录</label>
            <div class="col-sm-9 col-xs-12">
               <label class='radio-inline' ><input type='radio' name='isdel' value='1' <?php  if($activity['isdel']==1) { ?>checked<?php  } ?> /> 开启删除</label>
                <label class='radio-inline' ><input type='radio' name='isdel' value='0' <?php  if($activity['isdel']==0) { ?>checked<?php  } ?> /> 禁止删除</label>
            </div>
        </div>
			</div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">前台列表名称设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">列表名称</label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                    <input type="text" name="mname" class="form-control" value="<?php  echo $activity['mname'];?>" /><span class="input-group-addon">例：我的表单 或是 我的预约、我的报名等</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">上传图片缩略设置</div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">大小限制</label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                    <input type="number" name="filesize" class="form-control" value="<?php  echo $activity['filesize'];?>" /><span class="input-group-addon">M</span>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-12 col-sm-3 col-md-2 control-label">宽</label>
                    <div class="col-xs-12 col-sm-9">
                    <div class="input-group">
                    <input type="number" name="upsize" class="form-control" value="<?php  echo $activity['upsize'];?>" /><span class="input-group-addon">px，存储路径：attachment/dayu_form</span>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">前台模板设置</div>
            <div class="panel-body">
        <div class="form-group" style="color:#ff0000;">
          <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label"></label>
          <div class="col-xs-8 col-md-8">
		请使用 UI2.0模板，其他模板由于定制及版本原因，未必兼容
		</div>
		</div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">选择模板</label>
          <div class="col-xs-2 col-md-2">
            <div class="row row-fix">
  <div class="col-xs-6 col-sm-6 col-md-3 template_picker">
    <div class="thumbnail" style="text-align:center;width:140px;">
      <img  class="imgtip" style="height:100px;overflow:hidden;" src="/addons/dayu_form/template/img/flat.jpg" bigimg="/addons/dayu_form/template/img/flat.jpg">
        <span style="display:block;white-space: nowrap;text-overflow:ellipsis; overflow:hidden">UI2.0</span>
      <div class="radio">
        <label>
          <input type="radio" name="skins" value="flat" <?php  if($activity['skins'] == 'flat' || empty($activity['skins'])) { ?> checked="checked"<?php  } ?>>
          选择
        </label>
      </div>
    </div>
  </div> 
            </div>
          </div>
		  
			<div class="col-xs-8 col-md-8">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">日历开始时间</label>
					<div class="col-sm-5 col-xs-12 input-group">
						<input type="text" name="kaishi" class="form-control" value="<?php  echo $activity['kaishi'];?>" /><span class="input-group-addon">小时后(如1)</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">日历结束时间</label>
					<div class="col-sm-5 col-xs-12 input-group">
						<input type="text" name="jieshu" class="form-control" value="<?php  echo $activity['jieshu'];?>" /><span class="input-group-addon">点结束(如22)</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">最多可选择多少天后</label>
					<div class="col-sm-5 col-xs-12 input-group">
						<input type="text" name="tianshu" class="form-control" value="<?php  echo $activity['tianshu'];?>" /><span class="input-group-addon">天(如15)</span>
					</div>
				</div>
			</div>
			
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">以下不再提供更新</label>
          <div class="col-sm-8 col-xs-12">
            <div class="row row-fix">
              <?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('skins', TEMPLATE_INCLUDEPATH)) : (include template('skins', TEMPLATE_INCLUDEPATH));?>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-xs-12 col-sm-4 col-md-3 col-lg-2 control-label">好人模板</label>
          <div class="col-sm-8 col-xs-12">
            <div class="row row-fix">
			<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('dingzhi', TEMPLATE_INCLUDEPATH)) : (include template('dingzhi', TEMPLATE_INCLUDEPATH));?>
            </div>
          </div>
        </div>
            </div>
        </div>