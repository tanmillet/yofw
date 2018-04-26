<table class="table table-bordered table-striped table-hover">
	<tr><td style="width:15%">真实姓名</td><td><?php echo $row['truename'];?></td></tr>
	<tr><td>平台币</td><td><?php echo $row['platform_money'];?></td></tr>
	<tr><td>联系电话</td><td><?php echo $row['tell'];?></td></tr>
	<tr><td>生日</td><td><?php echo $row['birthday'];?></td></tr>
	<tr><td>qq</td><td><?php echo $row['qq'];?></td></tr>
	<tr><td>身份证</td><td><?php echo $row['idcard'];?></td></tr>
	<tr><td>联系地址</td><td><?php echo $row['addr'];?></td></tr>
	<tr><td>积分</td><td><?php echo $row['score'];?></td></tr>
	<tr><td>防沉迷</td><td><?php echo $row['fcm'];?></td></tr>
	<tr><td>性别</td><td><?php if($row['sex'] == 1){echo "男";}elseif($row['sex'] == 2){echo "女";}else{echo "未知";}?></td></tr>
	<tr><td>登录次数</td><td><?php echo $row['login_times'];?></td></tr>
	<tr><td>注册来源</td><td><?php echo Config_Web::$reg_from[$row['reg_from']];?></td></tr>
	<tr><td>注册IP</td><td><?php echo $row['reg_ip'];?></td></tr>
	<tr><td>最后登录IP</td><td><?php echo $row['last_login_ip'];?></td></tr>
	<tr><td>最后登录时间</td><td><?php if(empty($row['last_login_time'])){ echo "未登录";}else{echo date("Y-m-d H:i:s",$row['last_login_time']);}?></td></tr>
	<tr><td>最后登陆游戏</td><td><?php echo $row['last_game_name'];?></td></tr>
	<tr><td>最后登陆区服</td><td><?php echo $row['last_server_name'];?></td></tr>
</table>