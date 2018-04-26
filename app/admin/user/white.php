<?php
$user_id = intval($_GET['user_id']);
$val = intval($_GET['val']);
if($user_id){
	$sql = "update user set white={$val} where user_id={$user_id}";
	$flag = Model_Db::mydb()->query($sql);
	echo $flag ? json_encode(array("ok"=>1)) : json_encode(array("ok"=>0,"tip"=>"更新失败"));
}