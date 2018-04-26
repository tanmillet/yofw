<?php
class Model_Game{
	
	public static function get_api_url($game_id,$server_id){
		$sql = "select * from game_server where game_id='{$game_id}' and sid='{$server_id}'";
		$server_info = Model_Db::mydb()->getOne($sql);
		if(empty($server_info)){
			return false;
		}
		return "http://play2.mhj.3595.com/";
		$mark = (int)substr($server_info['mark'], 1);
		if($mark >= 76 && $mark < 1000){ //76服以上有另外机器
			return $url = "http://play2.mhj.3595.com/";
		}else{
			return "http://play.mhj.3595.com/";
		}
	}
}