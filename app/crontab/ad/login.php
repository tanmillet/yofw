<?php
//同步登陆数据到广告系统，计划任务，每分钟执行一次
$ad_cache_key = Config_Common::$ad_login_cache_key;
$size = Model_Redis::mycahe()->lSize($ad_cache_key);
if($size){
	for($i=1;$i<=$size;$i++){
		$arr = Model_Redis::mycahe()->rPop($ad_cache_key);
		if(!$arr){
			break;
		}
		$ad_login_url = Config_Common::$ad_login_returl;
		$query = http_build_query($arr);
		file_get_contents($ad_login_url."&".$query);
	}
}
echo $size." ok\n";