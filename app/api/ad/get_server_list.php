<?php
Ad_Config_Inc::checkSign();
$game_id = intval($_GET['game_id']);
$sql = "select * from game_server where game_id={$game_id} and `status`=1";
$datas = Model_Db::mydb()->getAll($sql);
$server = array();
foreach($datas as $row){
	$server[$row['sid']] = $row['name'];
}
echo json_encode($server);