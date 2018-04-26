<?php
session_start();
define('WEB', true);
define( 'APP', 'admin' );
require_once "common.php";
if(!$sso_uinfo=Sdk_Sso::get_login_info()){
	header("location:".Sdk_Sso::get_logout_url());
	exit;
}
$mod  = trim($_REQUEST['m']) ? trim($_REQUEST['m']) : 'common';
$page = trim($_REQUEST['p']) ? trim($_REQUEST['p']) : 'myinfo';

$op_code = "m={$mod}&p={$page}";
$file =  APP_PATH. "{$mod}". DS ."{$page}".'.php';
if( !is_file($file) ){
    exit($file.' file is not exists...');
}
$free_op_code = Common_Conf_Privilege::$free_op_code;
require_once( APP_PATH . 'common/head.php' );
if(!Sdk_Sso::check_privilege($op_code) && !in_array($op_code,$free_op_code)){
	$tip = "您没有该操作权限";
	if(IS_AJAX){
		echo json_encode(array("success"=>0,"error"=>$tip,"tip"=>$tip));
	}else{
		require_once( APP_PATH . 'common/error.php' );
	}
}else{
	require_once( $file );
}
require_once( APP_PATH . 'common/foot.php' );