<?php defined('IN_IA') or exit('Access Denied');?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?php  echo $row['title'];?></title>
    <meta name="viewport" content="width=640,target-densitydpi=device-dpi, user-scalable=0" />
    <meta name="mobileoptimized" content="320">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="apple-touch-fullscreen" content="yes" />
    <link href="<?php echo NOW_PATH;?>resource/css/style.css" rel="stylesheet">
    <style type="">
        .index {
            width: 640px;
            height:1136px;
            background:url("<?php echo NOW_PATH;?>resource/images/bg.jpg");
        }
        .gamestate {
            top: 185px;
            left: 0;
            width: 100%;
            height: 120px;
            position: absolute;
            text-align: center;
        }
        .gamestate img {
            max-height: 100%;
        }
        .gametitle {
            top: 330px;
            left: 0;
            width: 100%;
            height: 20px;
            line-height: 20px;
            position: absolute;
            text-align: center;
            color: white;
            font-size: 20px;
        }
        /**/
        .gametab {
            position: absolute;
            top: 380px;
            left: 0;
            width: 100%;
            height: 280px;
            padding: 5px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .gametab div {
            width: 120px;
            height: 283px;
            float: left;
            margin-left: 5px;
            margin-right: 5px;
            position: absolute;
        }
        .gametab div img {
            height: 60px;
        }
        .gametab div span {
            width: 70px;
			height: 28px;
			line-height: 28px;
			display: inline-block;
			font-size: 18px;
			font-weight: bold;
			text-align: center;
			vertical-align: middle;
			position: relative;
			top: -142px;
			left: 37px;
			overflow: hidden;
			color: #5f3dff;
        }
        .gamebottom {
            position: absolute;
            top: 780px;
            left: 0;
            width: 100%;
            height: 100px;
            padding: 5px;
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: center;
        }
        .gamebottom img {
            max-width: 100%;
            max-height: 100%;
        }

        .GameSelect {
            display: none;
            background-image: url("<?php echo NOW_PATH;?>resource/images/GameBJ.png");
            background-repeat: no-repeat;
            background-size: 100%;
            position: absolute;
            width: 640px;
            height: 386px;
            top: 50%;
            left: 0;
            margin-top: -50%;
            z-index: 1000;
        }
        .GameSelect div {
            margin-left: 112px;
            margin-top: 140px;
            width: 102px;
            height: 47px;
            line-height: 47px;
            position: absolute;
            text-align: center;
            vertical-align: middle;
            font-size: 28px;
            font-weight: bold;
            top: 150px;
            left: 164px;
            display: none;
        }
        .GameSelect .MPClass {
            background-image: url("<?php echo NOW_PATH;?>resource/images/dl.png");
            background-repeat: no-repeat;
            background-size: 100%;
            display: block;
            text-align: right;
        }
        .GameSelect img {
            width: 51px;
            margin-top: 10px;
            margin-right: 10px;
            position: relative;
        }
        .game-box {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 500px;
            height: 320px;
            margin-top: -180px;
            margin-left: -250px;
            background: #ffffff;
            z-index: 9999;
        }
        .game-box .game-box-title {
            text-align: right;
        }
        .game-box .game-box-title img {
            margin-top: 10px;
            margin-right: 10px;
        }
        .game-box .game-box-con {
            font-size: 20px;
            text-align: center;
            margin-top: 50px;
            padding:0 20px;
        }
        .game-box .game-box-con > div {
            display: none;
        }
        .game-box .game-box-con > div input {
            height: 50px;
            line-height: 50px;
            padding: 0 10px;
        }
        .game-box .game-box-btn {
            margin-top: 50px;
            text-align: center;
        }
        .game-box .game-box-btn > div {
            display: none;
        }
        .game-box .game-box-btn img {
            max-width: 100%;
            max-height: 60px;
        }
		.game-rule {
			display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 500px;
            height: 480px;
            margin-top: -240px;
            margin-left: -250px;
            background: #ffffff;
            z-index: 9999;
		}
		.game-rule .game-rule-title {
            text-align: right;
        }
        .game-rule .game-rule-title img {
            margin-top: 10px;
            margin-right: 10px;
        }
        .game-rule .game-rule-con {
            font-size: 20px;
            text-align: left;
            margin-top: 10px;
            padding:0 20px;
        }

        .gama-bg {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9998;
            background-color: #000;
            opacity: 0.6;
            filter: alpha(opacity=60);
        }
        .game-share {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #000;
            opacity: 0.6;
            filter: alpha(opacity=60);
            background-image: url("<?php echo NOW_PATH;?>resource/images/guide.png");
            background-repeat: no-repeat;
            background-position: top right;
        }
		.game-r {
			position: absolute;
			top: 900px;
			left: 0;
			width: 100%;
			font-size: 22px;
			color: #2DFF00;
			text-align: center;
		}
        .game-n {
            position: absolute;
            top: 755px;
            left: 0;
            width: 100%;
            font-size: 18px;
            color: #00D8FF;
            text-align: center;
        }
        .gamelogo {
            position: absolute;
            top: 0;
            left: 0;
            text-align: center;
        }
    </style>
    <script type="text/javascript" src="<?php echo NOW_PATH;?>resource/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo NOW_PATH;?>resource/js/jquery.alert.js"></script>
    <script type="text/javascript" src="<?php echo NOW_PATH;?>resource/js/common.js"></script>


</head>
<body>
<?php  $j = intval(rand(0,1))?>
<div class="page index">

    <?php  if($setting['logo']) { ?>
    <div class="gamelogo">
        <img src="<?php  echo toimage($setting['logo'])?>">
    </div>
    <?php  } ?>

    <div class="gamestate">
        <img id="imgjz" src="<?php echo NOW_PATH;?>resource/images/statejz1.png">
        <img class="imgleft" src="<?php echo NOW_PATH;?>resource/images/left.png">
        <img id="imgxy" src="<?php echo NOW_PATH;?>resource/images/statexy2.png">
        <img class="imgleft" src="<?php echo NOW_PATH;?>resource/images/left.png">
        <img id="imghh" src="<?php echo NOW_PATH;?>resource/images/statehh2.png">
    </div>

    <div class="gametitle">
        <span id="spanGameTitle">记住好友的昵称和位置</span>
    </div>

    <div id="divGameSelect" class="GameSelect">
        <div id="divMP1" name="divMP"></div>
        <div id="divMP2" name="divMP" class="MPClass">
            <img id="imgTounch" src="<?php echo NOW_PATH;?>resource/images/tounch.png">
        </div>
    </div>

	<div class="game-rule">
        <div class="game-rule-title">
            <img src="<?php echo NOW_PATH;?>resource/images/close.png" onclick="_closerule();">
        </div>
		<div class="game-rule-con" style="max-height:85%;overflow:auto;">
			<?php  echo $setting['shuoming'];?>
		</div>
	</div>
		
    <div class="game-box">
        <div class="game-box-title">
            <img src="<?php echo NOW_PATH;?>resource/images/close.png" onclick="_closebox();">
        </div>
        <div class="game-box-con">
            <div id="con-1" class="hidd" style="text-align: left; margin-top: -48px;">
                <?php  if($setting['sizhong']) { ?><?php  echo $setting['sizhong'];?><?php  } else { ?>恭喜您!撕中名牌啦，请与我们的客服联系。<?php  } ?>
            </div>
            <div id="con-2" class="hidd">
                关注微信公众账号，还可获得更多撕名牌机会！。
            </div>
            <div id="con-3" class="hidd">
                您的撕名牌次数已经用完啦！转发朋友圈立即获取更多撕名牌机会！
            </div>
            <div id="con-4" class="hidd">
                没有撕中名牌！
            </div>
            <div id="con-5" class="hidd">
                活动已结束，谢谢您的参与！
            </div>
            <div id="con-6" class="hidd" style="margin-top:-25px;">
                <input type="text" id="username" placeholder="请输入设置昵称" value="<?php  echo $user['title'];?>">
                <input type="text" id="usernumber" placeholder="请输入手机号码" value="<?php  echo $user['mobile'];?>">
            </div>
            <div id="con-7" class="hidd" style="margin-top:-25px;">
                <input type="text" id="fullname" placeholder="请输入姓名">
                <input type="text" id="phonenumber" placeholder="请输入手机号码">
            </div>
        </div>
        <div class="game-box-btn">
            <div id="btn-1" class="hidd" data-text="撕中">
                <img src="<?php echo NOW_PATH;?>resource/images/btn-1.png" onclick="_subok();">
            </div>
            <div id="btn-2" class="hidd" data-text="关注">
                <img src="<?php echo NOW_PATH;?>resource/images/btn-2.png" onclick="_attention();">
            </div>
            <div id="btn-3" class="hidd" data-text="转发">
                <img src="<?php echo NOW_PATH;?>resource/images/btn-3.png" onclick="_forwarding();">
            </div>
            <div id="btn-4" class="hidd" data-text="没撕中">
                <img src="<?php echo NOW_PATH;?>resource/images/btn-4.png" onclick="window.location.href='<?php  echo get_link('ttt')?>&ttt=<?php echo SYS_TIME;?>';">
            </div>
            <div id="btn-5" class="hidd" data-text="活动结束">
                <img src="<?php echo NOW_PATH;?>resource/images/btn-3.png" onclick="_sharew();">
            </div>
            <div id="btn-6" class="hidd" data-text="保存设置" style="margin-top:-12px;">
                <img src="<?php echo NOW_PATH;?>resource/images/btn-6.png" onclick="_username();">
            </div>
            <div id="btn-7" class="hidd" data-text="提交中奖" style="margin-top:-12px;">
                <img src="<?php echo NOW_PATH;?>resource/images/btn-7.png" onclick="_subok();">
            </div>
        </div>
    </div>

    <div class="game-share" onclick="$(this).hide();"></div>

    <div class="gametab">
        <div id="div1" postiontop="0" postionleft="240" imgheight="120" style="top: 0px; left: 240px;">
            <img id="imgPerson1" name="imgPerson" num="1" src="<?php echo NOW_PATH;?>resource/images/person1.png" style="height: 120px;">
        </div>
        <div id="div2" postiontop="120" postionleft="260" imgheight="155" style="top: 120px; left: 260px;">
            <img id="imgPerson2" name="imgPerson" num="2" src="<?php echo NOW_PATH;?>resource/images/person2.png" style="height: 155px;">
        </div>
        <div id="div4" postiontop="150" postionleft="120" imgheight="200" style="top: 150px; left: 120px;">
            <img id="imgPerson4" name="imgPerson" num="3" src="<?php echo NOW_PATH;?>resource/images/person3.png" style="height: 200px;">
        </div>
        <div id="div3" postiontop="130" postionleft="370" imgheight="230" style="top: 130px; left: 370px;">
            <img id="imgPerson3" name="imgPerson" num="4" src="<?php echo NOW_PATH;?>resource/images/person4.png" style="height: 230px;">
            <span id="spanName"><?php  echo $uuser['title'];?></span>
        </div>
    </div>

    <div class="gamebottom">
        <img src="<?php echo NOW_PATH;?>resource/images/gamebottom.png" id="btnStart">
    </div>

    <?php  if($setting['shuoming']) { ?>
	<div class="game-r"><span onclick="_closerule(1);">活动规则</span></div>
    <?php  } ?>
    <div class="game-n"><span onclick="_showsett();">设置</span></div>

    <div class="gama-bg"></div>

</div>
</body>
<script type="text/javascript">
    function _closerule(t) {
		if (t==1) {
			$(".gama-bg").show();
			$(".game-rule").show();
		}else{
			$(".gama-bg").hide();
			$(".game-rule").hide();
		}        
	}
    function _showsett() {
        $(".gama-bg").show();
        $(".game-box").show();
        $(".game-box").find(".hidd").hide();
        $(".game-box").find("#con-6").show();
        $(".game-box").find("#btn-6").show();
    }
    function _closebox() {
        $(".gama-bg").hide();
        $(".game-box").hide();
    }
    function _sharew() {
        $(".game-share").show();
    }
    function _attention() {
        $.alert("正在跳转...");
        $.post("<?php  echo urwdo('attention','',1)?>");
        setTimeout(function(){
            window.location.href = "<?php  echo $setting['introduction'];?>";
        }, 800);
    }
    function _forwarding() {
        $.post("<?php  echo urwdo('forwarding','',1)?>");
        _sharew();
    }
    function _username() {
        if (!$("#username").val()) {
            alert("请输入昵称");
            return;
        }
		if (!$("#usernumber").val()) {
            alert("请输入手机号码");
            return;
        }
        $.alert("正在保存...");
        $.post("<?php  echo urwdo('username','',1)?>", {username:$("#username").val(),usernumber:$("#usernumber").val()},function() {
            window.location.href='<?php  echo get_link('ttt')?>&ttt=<?php echo SYS_TIME;?>';
        });
    }
    function _subok() {
        /*if (!$("#fullname").val()) {
            alert("请输入姓名");
            return;
        }
        if (!$("#phonenumber").val()) {
            alert("请输入手机号码");
            return;
        }*/
        $.alert("正在保存...");
        $.post("<?php  echo urwdo('submit','',1)?>", {realname:'<?php  echo $user['title'];?>',mobile:'<?php  echo $user['mobile'];?>'},function() {
            window.location.href='<?php  echo get_link('ttt')?>&ttt=<?php echo SYS_TIME;?>';
        });
    }
    function _boxshow(i) {
        $(".gama-bg").show();
        $(".game-box").show();
        $(".game-box").find(".hidd").hide();
        $(".game-box").find("#con-"+i).show();
        $(".game-box").find("#btn-"+i).show();
    }
    function _numinit() {
        <?php  if($isplus) { ?>
            $(".gama-bg").show();
            $(".game-box").show();
            $(".game-box").find(".hidd").hide();
            $(".game-box").find("#con-1").show();
            $(".game-box").find("#btn-1").show();
            return false;
        <?php  } ?>
        <?php  if(empty($user['title']) || $user['title']=='匿名') { ?>
            $(".gama-bg").show();
            $(".game-box").show();
            $(".game-box").find(".hidd").hide();
            $(".game-box").find("#con-6").show();
            $(".game-box").find("#btn-6").show();
            return false;
        <?php  } ?>

        if (<?php  echo intval($user['val'])?> <= 0) {
            $(".gama-bg").show();
            $(".game-box").show();
            $(".game-box").find(".hidd").hide();
            //
            if (<?php  echo intval($user['one'])?> == 0) {
                $(".game-box").find("#con-2").show();
                $(".game-box").find("#btn-2").show();
            }else if (<?php  echo intval($user['one'])?> == 1) {
                $(".game-box").find("#con-3").show();
                $(".game-box").find("#btn-3").show();
            }else{
                $(".game-box").find("#con-5").show();
                $(".game-box").find("#btn-5").show();
            }
            return false;
        }else{
            return true;
        }
    }

    $(document).ready(function(){
        _numinit();
    });

    var index = 0;
    var IsOver = false;
    var IsGuess;
    var listRandomName = [];
    var SCName = "";

    $("#btnStart").click(function () {
        if (!_numinit()) {
            return false;
        }
        index = 0;
        $("[name='imgPerson']").attr("src", "<?php echo NOW_PATH;?>resource/images/00.gif?11=1122");
        $("#spanName").css("display", "none");
        $("#btnStart").css("visibility", "hidden");
        $("#imgjz").attr("src", "<?php echo NOW_PATH;?>resource/images/statejz2.png");
        $("#imgxy").attr("src", "<?php echo NOW_PATH;?>resource/images/statexy1.png");
        $("#imghh").attr("src", "<?php echo NOW_PATH;?>resource/images/statehh2.png");
        $("#spanGameTitle").html("盯紧奔跑中的好友！");
        //
        Start();
    });
    function Start() {
        if (index >= 20) {
            $("#imgPerson1").attr("src", "<?php echo NOW_PATH;?>resource/images/person5.png");
            $("#imgPerson2").attr("src", "<?php echo NOW_PATH;?>resource/images/person5.png");
            $("#imgPerson3").attr("src", "<?php echo NOW_PATH;?>resource/images/person5.png");
            $("#imgPerson4").attr("src", "<?php echo NOW_PATH;?>resource/images/person5.png");
            $("#imgjz").attr("src", "<?php echo NOW_PATH;?>resource/images/statejz2.png");
            $("#imgxy").attr("src", "<?php echo NOW_PATH;?>resource/images/statexy2.png");
            $("#imghh").attr("src", "<?php echo NOW_PATH;?>resource/images/statehh1.png");
            $("#spanGameTitle").html("撕中好友的名牌！");
            $("[name='imgPerson']").click(function () {
                var tthis = $(this).parent();
                $("#divGameSelect").css("display", "block");
                //
                listRandomName.push("少林强");
                listRandomName.push("大黑牛");
                listRandomName.push("小猎豹");
                listRandomName.push("超哥哥");
                listRandomName.push("捡漏王");
                listRandomName.push("天才赤");
                var num = Math.floor(Math.random() * listRandomName.length);
                if (num >= listRandomName.length) {
                    SCName = listRandomName[listRandomName.length - 1];
                } else if (num <= 0) {
                    SCName = listRandomName[0];
                } else {
                    SCName = listRandomName[num];
                }
                //
                window.setTimeout(function () {
                    $("#imgTounch").animate({ left: -62 }, 500, null, function () {
                        $("#divMP1").css("display", "block");
                        $("#divMP2").css("display", "none");
                        //
                        var spanName = tthis.find("#spanName");
                        var isPok = <?php  echo intval(rand(0,100))?>;
                        var _type = 0;
                        if (spanName.length > 0 && isPok > <?php  echo intval($setting['gailv'])?>) {
                            _type = 1;
                            $("#divMP1").html(spanName.text());
                            setTimeout(function(){
                                $(".gama-bg").show();
                                $(".game-box").show();
                                $(".game-box").find(".hidd").hide();
                                $(".game-box").find("#con-1").show();
                                $(".game-box").find("#btn-1").show();
                            },500);
                        }else{
                            $("#divMP1").html(SCName);
                            setTimeout(function(){
                                $(".gama-bg").show();
                                $(".game-box").show();
                                $(".game-box").find(".hidd").hide();
                                $(".game-box").find("#con-4").show();
                                $(".game-box").find("#btn-4").show();
                            },500);
                        }                        
                        $.post("<?php  echo urwdo('extended','',1)?>&type="+_type, {title:'撕中'});
                    }, 2000);
                });
            });
            return;
        }
        if (IsOver) {
            Start();
            return;
        }
        IsOver = true;
        var extra = 0;
        var i1 = RandomNum(extra);
        var i2 = RandomNum(i1);
        if (i1 == i2) {
            IsOver = false;
            Start();
            return;
        }
        extra = i1;
        var l1 = $("#div" + i1).attr("postionLeft");
        var l2 = $("#div" + i2).attr("postionLeft");
        var t1 = $("#div" + i1).attr("postionTop");
        var t2 = $("#div" + i2).attr("postionTop");
        var h1 = $("#div" + i1).attr("imgHeight");
        var h2 = $("#div" + i2).attr("imgHeight");
        $("#div" + i1).attr("postionLeft", l2);
        $("#div" + i2).attr("postionLeft", l1);
        $("#div" + i1).attr("postionTop", t2);
        $("#div" + i2).attr("postionTop", t1);
        $("#div" + i1).attr("imgHeight", h2);
        $("#div" + i2).attr("imgHeight", h1);
        var nowLeft1 = l2;
        var nowLeft2 = l1;
        var nowTop1 = t2;
        var nowTop2 = t1;
        var nowHeight1 = h2;
        var nowHeight2 = h1;
        $("#div" + i1).css("z-index", "999");
        $("#div" + i1).animate({ left: nowLeft1, top: nowTop1 }, 200, null, function () {
            //$("#div" + i1).animate({ left: nowLeft1, top: 10, height: 60 }, 300);
            $("#div" + i1).css("left", nowLeft1).css("top", nowTop1);
            IsOver = false;
        });
        $("#imgPerson" + i1).animate({ height: nowHeight1 }, 200, null, function () {
            $("#imgPerson" + i1).css("height", nowHeight1);
        });
        $("#div" + i2).css("z-index", "998");
        $("#div" + i2).animate({ left: nowLeft2, top: nowTop2 }, 200, null, function () {
            //$("#div" + i2).animate({ left: nowLeft2, top: 10, height: 60 }, 300);
            $("#div" + i2).css("left", nowLeft2).css("top", nowTop2);
            IsOver = false;
            index++;
            Start();
        });
        $("#imgPerson" + i2).animate({ height: nowHeight2 }, 200, null, function () {
            $("#imgPerson" + i2).css("height", nowHeight2);
        });
    }


    function RandomNum(extra) {
        var num = Math.floor(Math.random() * 4 + 1)
        if (num == extra) {
            RandomNum(extra);
        }
        return num;
    }

    /**************************************************/
    /**************************************************/

    var shareData = {
        "imgUrl" : "<?php  echo toimage($row['share_txt'])?>",
        "link" : "<?php  echo urwdo('index','',1)?>&uid=<?php  echo $user['id'];?>",
        "title" : "<?php  echo $row['share_title'];?>",
        "desc" : "<?php  echo $row['share_desc'];?>"
    };
    var jssdkconfig = <?php echo JSONJSSDKCONFIG;?> || {};
    //
    var upData = {
        "now_path" : "<?php echo NOW_PATH;?>",
        "img" : "<?php  echo toimage($user['img'])?>",
        "index" : "<?php  echo urwdo('index','',1)?>&uid=<?php  echo $user['id'];?>"
    };
</script>
<script type="text/javascript" src="<?php echo NOW_PATH;?>resource/js/share.js"></script>
</html>