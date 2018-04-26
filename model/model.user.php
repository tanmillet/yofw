<?php
class Model_User{
	protected static $my = null;
	public static function x(){
        if( !is_object(self::$my) ){
            self::$my = new self();
        }
        return self::$my;
    }
    public function getLoginInfo($base=1){
	    $sessid = $_COOKIE['PHPSESSID'];
		$sign = $_COOKIE['sign'];
		$mysign = md5($sessid.Config_Common::$sign_key);
		if(empty($sessid) || $mysign!=$sign){
			return false;
		}else{
			$cachekey = Config_Common::$uinfo_cache_key_pre.$sessid;
			$uinfo = Model_Redis::mycahe()->get($cachekey);
			if($uinfo){
				if($base){
					unset($uinfo['password'],$uinfo['idcard']);
				}
				setcookie('sign', md5($sessid.Config_Common::$sign_key),time()+3600,'/',Config_Web::$login_cookie_domain);
				setcookie('PHPSESSID', $sessid,time()+3600,'/',Config_Web::$login_cookie_domain);
				Model_Redis::mycahe()->set($cachekey,$uinfo,0,1,3600);
				return $uinfo;
			}
		}
		return false;
    }
    public function updateCacheInfo($username){
    	$sessid = $_COOKIE['PHPSESSID'];
    	if(empty($sessid)){
    		return false;
    	}
    	$uinfo = Model_Db::mydb()->getOne("select * from user where username='$username'");
    	$cachekey = Config_Common::$uinfo_cache_key_pre.$sessid;
		return $flag = Model_Redis::mycahe()->set($cachekey,$uinfo);
    }
    public function getUserInfo($username){
    	if(empty($username)){
    		return false;
    	}
    	$sql = "select * from user where username='$username'";
    	return Model_Db::mydb()->getOne($sql);
    }
}