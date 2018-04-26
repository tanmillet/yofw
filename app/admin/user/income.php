<?php
$tb ="platform_money_log";
if(empty($_GET["user_name"]))
{
	echo("参数错误");
}
else
{
	$username = $_GET["user_name"];
	$sql = "select count(*) as num from {$tb} where username = '{$username}'";
	$total = Model_Db::mydb()->getOne($sql);
	$pagesize = 100;
	$page = new Public_Page($total['num'], $pagesize);
	$sql = "select *from {$tb} where username='{$username}' order by add_time desc limit {$page->offset},{$pagesize}";
	$row = Model_Db::mydb()->getAll($sql);
	
	if($row)
	{
		include "tpl/income.php";
	}
	else
	{

		$row["add_time"]="";
		include "tpl/income.php";
	}
}

?>