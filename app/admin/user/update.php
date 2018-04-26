<?php
$tb = 'user';
$id     = intval($_GET['id']); //用户ID
$status = intval($_GET['status']); //用户状态
if($status == 1){
	//将正常用户给封号
	$sql = " UPDATE `{$tb}` SET  status = '0' WHERE user_id = '{$id}'";
	$flag = Model_Db::mydb()->query($sql);
	if($flag){
		echo json_encode(array("ok"=>1,"tip"=>"封号","status"=>0,"msg"=>"正常"));
		exit;
	}else{
		echo json_encode(array("ok"=>0,"tip"=>"解封失败"));
		exit;
	}
}else{
	//将封禁用户解封
	$sql = " UPDATE `{$tb}` SET  status = '1' WHERE user_id = '{$id}'";
	$flag = Model_Db::mydb()->query($sql);
	if($flag){
		echo json_encode(array("ok"=>1,"tip"=>"解封","status"=>1,"msg"=>"禁止登录"));
		exit;
	}else{
		echo json_encode(array("ok"=>0,"tip"=>"封号失败"));
		exit;
	}
	
}
