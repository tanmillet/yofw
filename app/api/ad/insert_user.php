<?php
Ad_Config_Inc::checkSign();
$data['username'] = $_GET['username'];
$data['password'] = $_GET['password'];
$data['reg_from'] = 1;
$data['reg_time'] = $_GET['reg_time'];
$data['reg_ip'] = $_GET['reg_ip'];
$flag = Model_Db::mydb()->insert("user",$data);
echo json_encode(array("uid"=>$flag));