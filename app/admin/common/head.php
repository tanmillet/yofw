<?php 
if(!IS_AJAX){
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title><?php echo Config_Web::$platform_name;?>后台登陆</title>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/static/js/jquery-1.8.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/static/bootstrap/js/bootstrap.min.js"></script>
    <!-- Bootstrap -->
    <link href="/static/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="/static/DataTables/extensions/TableTools/css/dataTables.tableTools.min.css" />
	<link rel="stylesheet" href="/static/DataTables/media/css/jquery.dataTables.min.css" />
	<script type="text/javascript" src="/static/DataTables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="/static/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
	<script type="text/javascript" src="/static/My97DatePicker/WdatePicker.js"></script>
	<link href="/static/css/select2.min.css" rel="stylesheet" />
	<script src="/static/js/select2.min.js"></script>
	<script src="/static/js/ajax_form.js"></script>
    <link href="/static/css/public.css" rel="stylesheet">
    <script src="/static/js/public.js"></script>
    <script type="text/javascript" src="/static/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="/static/ueditor/ueditor.all.js"></script>
	<script type="text/javascript" src="/static/js/sso.js"></script>
  </head>
<body>
	<div class="top">
		<div class="logo">
			<img src="static/img/at.png" onclick="dataTable();alert('ok');" width="56">
			<div style="float: right; margin-left: 10px; font-weight: 900; font-size: 40px; color: white;">3595游戏后台</div>
		</div>
		<div class="menu">
			<nav class="navbar navbar-default" role="navigation">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">友情链接<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin.php?m=friendlink&p=add">添加友情链接</a></li>
							<li><a href="/admin.php?m=friendlink&p=list">友情链接列表</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">充值<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin.php?m=pay&p=list">订单查询</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">统计<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin.php?m=stat&p=date">每日数据</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">用户<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin.php?m=user&p=list">用户列表</a></li>
							<li><a href="/admin.php?m=user&p=reset_password">重置密码</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">游戏<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin.php?m=game&p=add">添加游戏</a></li>
							<li><a href="/admin.php?m=game&p=list">游戏列表</a></li>
							<li class="divider"></li>
							<li><a href="/admin.php?m=game_cat&p=add">添加游戏分类</a></li>
							<li><a href="/admin.php?m=game_cat&p=list">游戏分类列表</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">广告<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin.php?m=ad&p=add">添加广告</a></li>
							<li><a href="/admin.php?m=ad&p=list">广告列表</a></li>
							<li class="divider"></li>
							<li><a href="/admin.php?m=ad_position&p=add">添加广告位</a></li>
							<li><a href="/admin.php?m=ad_position&p=list">广告位列表</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">新闻<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin.php?m=news&p=add">添加新闻</a></li>
							<li><a href="/admin.php?m=news&p=list">新闻列表</a></li>
							<li class="divider"></li>
							<li><a href="/admin.php?m=news_cat&p=add">添加新闻分类</a></li>
							<li><a href="/admin.php?m=news_cat&p=list">新闻分类列表</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">消息<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin.php?m=message&p=add">发送消息</a></li>
							<li><a href="/admin.php?m=message&p=list">消息列表</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">视频<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="/admin.php?m=video&p=add"  title="添加账号">添加视频</a></li>
							<li><a href="/admin.php?m=video&p=list">视频列表</a></li>
							
						</ul>
					</li>
					<li><a href="<?php echo Sdk_Sso::get_logout_url();?>">退出登陆(<?php echo $sso_uinfo['user_name'];?>)</a></li>
				</ul>
			</nav>
		</div>
	</div>
  <div class="content">
<?php 
}
?>