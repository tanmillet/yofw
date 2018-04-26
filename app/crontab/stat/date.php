<?php
//每日统计
$date = $argv[3] ? $argv[3] : date("Y-m-d",strtotime("-1 day"));
$arr = array();
$arr['date'] = $date;
$s = strtotime($date);
$e = $s + 3600*24;
$sql = "select count(*) as num from user where reg_time between {$s} and {$e}";
$reg = Model_Db::mydb()->getOne($sql);
$arr['reg_num'] = $reg['num'];

$sql = "select count(distinct(username)) as num from user_play_log where login_time between {$s} and {$e}";
$login = Model_Db::mydb()->getOne($sql);
$arr['login_num'] = $login['num'];

$sql = "select count(distinct(username)) as num from `order` where create_time between {$s} and {$e} and status!=0";
$pay = Model_Db::mydb()->getOne($sql);
$arr['pay_num'] = $login['pay_num'];

$sql = "select sum(amount) as amount from `order` where create_time between {$s} and {$e} and status!=0";
$pay = Model_Db::mydb()->getOne($sql);
$arr['pay_amount'] = $login['pay_amount'];
		
Model_Db::mydb()->query("delete from stat_date where `date`='{$date}'");
Model_Db::mydb()->insert("stat_date",$arr);
echo "ok\n";