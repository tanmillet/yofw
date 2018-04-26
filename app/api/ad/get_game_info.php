<?php
Ad_Config_Inc::checkSign();
$game_id = intval($_GET['game_id']);
$sql = "select * from game where game_id={$game_id}";
$row = Model_Db::mydb()->getOne($sql);
echo json_encode($row);