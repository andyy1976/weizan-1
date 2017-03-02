<?php defined('IN_IA') or exit('Access Denied');?><style>
    .red {
        color: red;
    }
</style>
<input type="hidden" name="fid" value="<?php  echo $reply['id'];?>"/>
<!--基本设置-->
<div class="panel panel-default">
    <div class="panel-heading">
        基本设置
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 订单名称：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="title" class="form-control span7"
                       placeholder="" name="oname" value="<?php  echo $reply['oname'];?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 商家名称：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="pname" class="form-control span7"
                       placeholder="" name="pname" value="<?php  echo $reply['pname'];?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span> 商家联系电话：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="p_tel" class="form-control span7"
                       placeholder="" name="p_tel" value="<?php  echo $reply['p_tel'];?>">
            </div>
        </div>



        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>商家详情链接:</label>
            <div class="col-sm-9 col-xs-12">
                <input type="text" id="p_titile_url" class="form-control span7"
                       placeholder="" name="p_titile_url" value="<?php  echo $reply['p_titile_url'];?>">
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span style='color:red'>*</span>首页订单说明：</label>
              <textarea style="height: 60px;" id="odesc" name="odesc"
                        class="form-control span7" cols="60"><?php  echo $reply['odesc'];?></textarea>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>关注引导图文介绍链接：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="follow_url" class="form-control span7"
                       placeholder="" name="follow_url" value="<?php  echo $reply['follow_url'];?>">
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>下单接收通知email</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="email" class="form-control span7"
                       placeholder="" name="email" value="<?php  echo $reply['email'];?>">

            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">下单接收email通知开关</label>

            <div class="col-sm-9 col-xs-12">
                <input type="radio" name="emailenable" value="1" <?php  if($reply['emailenable'] == 1) { ?> checked="checked" <?php  } ?>>开启 &nbsp; <input type="radio" name="emailenable" value="0" <?php  if($reply['emailenable'] == 0) { ?>checked="checked" <?php  } ?> />关闭
                <span class="help-block">开启邮件提醒请到粉丝营销-》通知参数-》邮件通知 中正确设置您的发送邮件配置</span>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>版权</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="copyright" class="form-control span7"
                       placeholder="" name="copyright" value="<?php  echo $reply['copyright'];?>">
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>首页商家头部图片:</label>

            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('p_title_pg',$reply['p_title_pg']);?>
                建议宽*高(510*315)
            </div>
        </div>




        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">商家所在地区</label>

            <div class="col-sm-3">
                <select name="location_p" id="location_p" class="location form-control">
                </select>
            </div>
            <div class="col-sm-3">
                <select name="location_c" id="location_c" class="location form-control">

                </select>
            </div>
            <div class="col-sm-3">
                <select name="location_a" id="location_a" class="location form-control">

                </select>
            </div>
            <script type="text/javascript" src="<?php echo MON_ORDER_RES;?>js/region_select.js"></script>
            <script type="text/javascript">
                var location_p = "<?php  if(!empty($reply['location_p'])) { ?><?php  echo $reply['location_p'];?><?php  } else { ?>广东省<?php  } ?>";
                var location_c = "<?php  if(!empty($reply['location_c'])) { ?><?php  echo $reply['location_c'];?><?php  } else { ?>汕头市<?php  } ?>";
                var location_a = "<?php  if(!empty($reply['location_a'])) { ?><?php  echo $reply['location_a'];?><?php  } else { ?>龙湖区<?php  } ?>";
                new PCAS("location_p", "location_c", "location_a", location_p, location_c, location_a);
            </script>

        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">经纬度</label>

            <div class="col-sm-9">
                <div class="input-append">
                    <input type="text" id="address" class="form-control" style="width: 200px;display: inline"
                           name="address" value="汕头市龙湖区长平路127号" data-rule-required="true">
                    <button class="btn" type="button" id="positioning"
                            onclick="bmap.searchMapByAddress($('#address').val())">搜索
                    </button>
                </div>
                <span class="maroon" style="color: #f30;margin-left: 5px;"><br>注意：这个只是模糊定位，准确位置请地图上标注!</span>

                <div id="l-map"
                     style="overflow: hidden; position: relative; z-index: 0; background-image: url(http://api.map.baidu.com/images/bg.png); width: 500px; height: 300px; margin-top: 10px; color: rgb(0, 0, 0); text-align: left; background-color: rgb(243, 241, 236);">

                </div>
                <div id="r-result">
                    <input type="text" id="lat" name="lat" class="form-control" style="width:200px;display: inline;" value="<?php  echo $reply['lat'];?>">

                    <input type="text" id="lng" name="lng"
                           style="width:200px;display: inline;" class="form-control" value="<?php  echo $reply['lng'];?>">
                </div>
            </div>
        </div>



    </div>

</div>




<!--图文样式设置-->
<div class="panel panel-default">
    <div class="panel-heading">
        图文设置
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文标题：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="new_title" class="form-control span7" placeholder="" name="new_title"
                       value="<?php  echo $reply['new_title'];?>">

            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文 图标：</label>

            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('new_icon',$reply['new_icon']);?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>图文描述：</label>

            <div class="col-sm-9 col-xs-12">
			<textarea style="height: 60px;" name="new_content"
                      class="form-control span7" cols="60"><?php  echo $reply['new_content'];?></textarea>
            </div>
        </div>


    </div>
</div>

<!--分享设置-->
<div class="panel panel-default">
    <div class="panel-heading">
        分享设置
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享标题：</label>

            <div class="col-sm-9 col-xs-12">
                <input type="text" id="share_title" class="form-control span7" placeholder="" name="share_title"
                       value="<?php  echo $reply['share_title'];?>">
                <div class="help-block"></div>
            </div>
        </div>


        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享图标：</label>

            <div class="col-sm-9 col-xs-12">
                <?php  echo tpl_form_field_image('share_icon',$reply['share_icon']);?>
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"><span class='red'>*</span>分享描述：</label>

            <div class="col-sm-9 col-xs-12">
			<textarea style="height: 60px;" name="share_content"
                      class="form-control span7" cols="60"><?php  echo $reply['share_content'];?></textarea>
                <div class="help-block"></div>
            </div>
        </div>


    </div>
</div>
<script>

    $(function(){


    });


    require(['jquery', 'util'], function ($, u) {
        $(function () {
            u.editor($('#odesc')[0]);
           // u.editor($('#p_desc')[0]);
        });
    });


</script>


<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.4"></script>
<script type="text/javascript"
        src="http://api.map.baidu.com/getscript?v=1.4&ak=&services=&t=20140102035142"></script>
<script type="text/javascript">
    $(function () {
        $(".location").change(function () {
            bmap.searchMapByPCD();
        });
    });
    new PCAS("location_p", "location_c", "location_a", location_p, location_c,
            location_a);
    var bmap = {
        'option': {
            'lock': false,
            'container': 'l-map',
            'infoWindow': {
                'width': 250,
                'height': 100,
                'title': ''
            },
            'point': {
                'lng': "<?php  if($item['lng']!='0.0000000000' && !empty($item['lng'])) { ?><?php  echo $item['lng'];?><?php  } else { ?>116.735049<?php  } ?>",
                'lat': "<?php  if($item['lat']!='0.0000000000' && !empty($item['lat'])) { ?><?php  echo $item['lat'];?><?php  } else { ?>23.367896<?php  } ?>"
            }
        },
        'init': function (option) {
            var $this = this;
            $this.option = $.extend({}, $this.option, option);

            $this.option.defaultPoint = new BMap.Point($this.option.point.lng,
                    $this.option.point.lat);
            $this.bgeo = new BMap.Geocoder();
            $this.bmap = new BMap.Map($this.option.container);
            $this.bmap.centerAndZoom($this.option.defaultPoint, 15);
            $this.bmap.enableScrollWheelZoom();
            $this.bmap.enableDragging();
            $this.bmap.enableContinuousZoom();
            $this.bmap.addControl(new BMap.NavigationControl());
            $this.bmap.addControl(new BMap.OverviewMapControl());
            //添加标注
            $this.marker = new BMap.Marker($this.option.defaultPoint);
            $this.marker.setLabel(new BMap.Label('请您移动此标记，选择您的坐标！', {
                'offset': new BMap.Size(10, -20)
            }));
            $this.marker.enableDragging();
            $this.bmap.addOverlay($this.marker);
            //$this.marker.setAnimation(BMAP_ANIMATION_BOUNCE);
            $this.showPointValue($this.marker.getPosition());
            //拖动地图事件
            $this.bmap.addEventListener("dragging", function () {
                $this.setMarkerCenter();
                $this.option.lock = false;
            });
            //缩入地图事件
            $this.bmap.addEventListener("zoomend", function () {
                $this.setMarkerCenter();
                $this.option.lock = false;
            });
            //拖动标记事件
            $this.marker.addEventListener("dragend", function (e) {
                $this.showPointValue();
                $this.showAddress();
                $this.bmap.panTo(new BMap.Point(e.point.lng, e.point.lat));
                $this.option.lock = false;
                $this.marker.setAnimation(null);
            });
        },
        'searchMapByAddress': function (address) {
            var $this = this;
            $this.bgeo.getPoint(address, function (point) {
                if (point) {
                    $this.showPointValue();
                    $this.showAddress();
                    $this.bmap.panTo(point);
                    $this.setMarkerCenter();
                }
            });
        },
        'searchMapByPCD': function (address) {
            //alert($('#location_p').val()+$('#location_c').val()+$('#location_a').val());
            var $this = this;
            $this.option.lock = true;
            $this.searchMapByAddress($('#location_p').val()
            + $('#location_c').val() + $('#location_a').val());
        },
        'setMarkerCenter': function () {
            var $this = this;
            var center = $this.bmap.getCenter();
            $this.marker.setPosition(new BMap.Point(center.lng, center.lat));
            $this.showPointValue();
            $this.showAddress();
        },
        'showPointValue': function () {
            var $this = this;
            var point = $this.marker.getPosition();
            $('#lng').val(point.lng);
            $('#lat').val(point.lat);
        },
        'showAddress': function () {
            var $this = this;
            var point = $this.marker.getPosition();
            $this.bgeo.getLocation(point, function (s) {
                if (s) {
                    $('#address').val(s.address);
                    if (!$this.option.lock) {
                        //cascdeInit(s.addressComponents.province,s.addressComponents.city,s.addressComponents.district);
                        new PCAS("location_p", "location_c", "location_a",
                                s.addressComponents.province,
                                s.addressComponents.city,
                                s.addressComponents.district);
                    }
                }
            });
        }
    };
    $(function () {
        var option = {};
        bmap.init(option);
    });
</script>
