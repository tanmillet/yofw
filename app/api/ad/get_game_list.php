<?php
Ad_Config_Inc::checkSign();
$sql = "select * from game where is_hide=0";
$datas = Model_Db::mydb()->getAll($sql);
$game = array();
foreach($datas as $row){
	$game[$row['game_id']] = $row['game_name'];
}
echo json_encode($game);