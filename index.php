<?php
define('WEB', true);
define( 'APP', 'front' );
require_once "common.php";

$mod  = trim($_REQUEST['m']) ? trim($_REQUEST['m']) : 'index';
$page = trim($_REQUEST['p']) ? trim($_REQUEST['p']) : 'index';
$file =  APP_PATH. "{$mod}". DS ."{$page}".'.php';
if( !is_file($file) ){
    exit($file.' file is not exists...');
}
ini_set('session.cookie_path', '/');
ini_set('session.cookie_domain', Config_Web::$login_cookie_domain);
ini_set('session.cookie_lifetime', 3600);

ob_start();
require_once( $file ); //先执行接口文件，获得$keywords来设置头部，主要是新闻类的
$ob_content = ob_get_clean(); //取出并清除缓冲区内容
$keywords = $keywords ? $keywords : Config_Web::$keywords;
$description = $description ? $description : Config_Web::$description;

$game_tb = "game";
$sql = "select * from {$game_tb} where is_hide=0";
$games = Model_Db::mydb()->getAll($sql); //游戏


require_once( APP_PATH . 'common/head.php' );
echo $ob_content;
require_once( APP_PATH . 'common/foot.php' );