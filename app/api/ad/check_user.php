<?php
Ad_Config_Inc::checkSign();
$username = $_GET['username'];
$sql = "select user_id from user where username='{$username}'";
$row = Model_Db::mydb()->getOne($sql);
echo json_encode(array("uid"=>(int)$row['user_id']));