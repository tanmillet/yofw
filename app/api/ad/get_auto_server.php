<?php
Ad_Config_Inc::checkSign();
$sql = "select * from game_server where `status`=1 order by publish_time desc,sid desc";
$row = Model_Db::mydb()->getOne($sql);
echo json_encode($row);