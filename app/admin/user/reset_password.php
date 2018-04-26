<?php

if(empty($_POST)){
	include 'tpl/reset_password.php';
}else{
	$username = $_POST['username']; //获取用户名
	
	if(empty($username)){
		echo json_encode(array('status'=>0,'msg'=>'用户名不能为空'));exit;
	}else{
		//先判断用户名是否存在
		$sql = " SELECT count(*) AS num FROM user WHERE username = '{$username}'";
		$password_row = Model_Db::mydb()->getOne($sql);
		if(empty($password_row['num'])){
			echo json_encode(array('status'=>0,'msg'=>'用户名不存在'));exit;
		}else{
			//如果用户名存在 
			$sql = " UPDATE user SET password = md5('123456') WHERE username = '{$username}'";
			$row = Model_Db::mydb()->query($sql);
			if($row){
				echo json_encode(array('status'=>1,'msg'=>'用户密码修改成功'));exit;
			}else{
				echo json_encode(array('status'=>0,'msg'=>'用户密码修改失败'));exit;
			}
		}
	}
}






