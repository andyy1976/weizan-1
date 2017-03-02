<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>


<div class="main">

	<div class="panel panel-default">
		<div class="panel-heading">本模块基本使用说明书</div>
		<div class="panel-body">
			<div>1，需要开通微信支付，需要为认证服务号，可以借用认证服务号的一些参数，但是红包通过该服务号发放，可以起到两个号的宣传效果！</div>

			<div>2，使用前请往商户平台充值金额，否则无法发放红包，活动开始后红包余额不足的时候会提示红包已领完！</div>
		
			<div>3，红包发放金额由基础红包a和加成红包b共同组成，总金额范围为1元-200元，如不满足需求，请向腾讯申请！基础红包a为红包发放的最低金额，总金额还会加上加成红包b范围内的随机金额，最终的金额取值为a~a+b，取哪个由系统随机产生</div>
			
			<div>4，APPID为该公众号的标识，从微信公众平台后台可获得</div>
			
			<div>5，MCHID为商户ID，开通微信支付后可以从腾讯发送的邮件中可获得</div>
		
			<div>6，PARTNERKEY为支付秘钥，从商户平台的安全设置中获取，首次使用时需要先设置秘钥</div>
			
			<div>7，apiclient_cert，apiclient_key，rootca为证书文件，请从商户平台下载证书，打开证书文件全选复制粘贴到输入框，不要做任何修改</div>
		
			<div>8，活动名称等信息会在红包发放后显示在用户端</div>
			
			<div>9，活动开始时间和结束时间设置后，只要该时间范围内可以领取红包，如果不在该时间范围内，hi提示活动未开始或者活动已结束</div>
		
			<div>10，触发关键字为用户回复关键字领取红包的关键字，设置该关键字后，请到本模块规则列表设置规则，如果选择全部托管，则无需设置关键字，反之则必须设置关键字触发，且设置的关键字必须同设置项里填写的关键字一致</div>
			
			<div>11，红包的发放存在概率事件，如果您想百分百发放红包，请将最后的三个参数都设为1</div>
			
			<div>12，假设随机数下界为a,随机数上界为b，则随机数产生后等于区间[a,b]之间的一个整数，假设整数为c，假设红包发放数字的集合为A,A={<?php echo 填写的内容;?>},多个数字由英文逗号分隔,如果c属于集合A，则发放红包，否则提示没有抢到红包，用户再次领取红包时会提示已参与过此活动</div>
		
			<div>13，周边摇一摇和网页摇一摇的设置都是基于以上设置，共用同一数据，三个活动最多只能参加一次</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">周边摇一摇使用说明</div>
		<div class="panel-body">
			<div>1，无论是周边摇一摇还是网页摇一摇都要求先在微信公众平台后台设置网页授权，授权域名为系统访问所在的域名</div>
			
			<div>2，周边摇一摇基于微信官方的摇一摇周边平台，并且需要ibeacon模块支持,同时手机端需要蓝牙4.0支持</div>

			<div>3，进入周边摇一摇菜单获取链接，将该链接填写至周边摇一摇平台上</div>
			
			<div>4，当用户进入ibeacon模块广播范围内，打开微信，进入摇一摇，周边入口即可显示，此时摇一摇，会摇到在周边摇一摇平台设置的页面</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">网页摇一摇使用说明</div>
		<div class="panel-body">
			<div>1，无论是周边摇一摇还是网页摇一摇都要求先在微信公众平台后台设置网页授权，授权域名为系统访问所在的域名</div>
			
			<div>2，进入网页摇一摇菜单，设置投放的广告内容</div>

			<div>3，广告显示的场景是在用户未摇到红包的时候</div>
		</div>
	</div>
</div>

<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>