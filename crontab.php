<?php
define('WEB', true);
define( 'APP', 'crontab' );
require_once "common.php";

if ( isset($_SERVER['_']) && substr($_SERVER['_'],strrpos($_SERVER['_'],"/")) == '/php' ){
	$mod  = $_SERVER['argv']['1'] ? $_SERVER['argv']['1'] : 'index' ;
	$page = $_SERVER['argv']['2'] ? $_SERVER['argv']['2'] : 'index';
}
$file =  ROOT_PATH . APP_PATH. "{$mod}". DS ."{$page}".'.php';
if( !is_file($file) ){
    exit($file.' file is not exists...');
}
require_once( $file );