<?php 

$tb = "user";
$where = "";
$position_id = $_GET['position_id'];
$text        = $_GET['text'];

if($text){
	if($position_id == 1) $where .= "  username Like '%".$text."%'"; //用户名
	if($position_id == 2) $where .= "  email Like '%".$text."%'";    //邮箱
}

$where = $where ? $where : "1";

$sql = " SELECT count(*) as num FROM {$tb} where {$where}";
$total = Model_Db::mydb()->getOne($sql);
$pagesize = 100;
$page = new Public_Page($total['num'], $pagesize);
$sql = " SELECT user_id,username,tell,email,reg_time,last_login_time,status,white FROM {$tb} where {$where} ORDER BY user_id DESC LIMIT {$page->offset},{$pagesize}";
$datas = Model_Db::mydb()->getAll($sql);
include "tpl/list.php";