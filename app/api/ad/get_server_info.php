<?php
Ad_Config_Inc::checkSign();
$server_id = intval($_GET['server_id']);
$mark = $_GET['mark'];
if($server_id){
	$where = "sid={$server_id}";
}elseif($mark){
	$where = "mark='{$mark}'";
}else{
	exit;
}
$sql = "select * from game_server where {$where}";
$row = Model_Db::mydb()->getOne($sql);
echo json_encode($row);