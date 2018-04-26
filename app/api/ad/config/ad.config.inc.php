<?php
class Ad_Config_Inc{
	public static $signkey = "mediasys";
	public static function checkSign(){
		if(empty($_GET['req_time']) || empty($_GET['sign'])){
            die("param empty");
        }
        if(md5($_GET['req_time'].self::$signkey) != $_GET['sign']){
            die("sign error");
        }
        if(time() - $_GET['req_time'] > 300){
            die("time error");
        }
        return true;
	}
}