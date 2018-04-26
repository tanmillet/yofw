<?php
Ad_Config_Inc::checkSign();
$data['username'] = $_GET['username'];
$data['game_id'] = $_GET['game_id'];
$data['server_id'] = $_GET['server_id'];
$data['from'] = $_GET['from'];
$data['login_time'] = $_GET['login_time'];
$flag = Model_Db::mydb()->insert("user_play_log",$data);
echo json_encode(array("id"=>$flag));