<?php
$tb = "user";
$user_id = intval($_GET['user_id']);
$sql = "select * from `{$tb}` where user_id='{$user_id}'";
$row = Model_Db::mydb()->getOne($sql);
if($row['last_game_id']){
	$game = Model_Db::mydb()->getOne("select * from game where game_id=".$row['last_game_id']);
	$row['last_game_name'] = $game['game_name'];
}
if($row['last_server_id']){
	$server = Model_Db::mydb()->getOne("select * from game_server where sid=".$row['last_server_id']);
	$row['last_server_name'] = $server['name'];
}
include "tpl/view.php";