<?php
/**********************************************************************************************************************
 *
 *  pack类 方法族
 *
 * ********************************************************************************************************************/
/**
 * 打包成 unsign int8
 * @param $data int
 * @return bool|string
 */
function pack_uint8($data)
{
    if ($data === '' || $data === null) {
        return false; #数据结构 不能作为 uint8 打包
    }
    return pack('C', $data);
}

/**
 * 打包成 unsign int 16
 * @param $data int
 * @return bool|string
 */
function pack_uint16($data)
{
    if ($data === '' || $data === null) {
        return false; #数据结构 不能作为 uint16 打包
    }
    if (GM_BINARY_NET_IS_BIG_ENDIAN) {
        return pack('n', $data);
    } else {
        return pack('v', $data);
    }
}

/**
 * 打包成 unsign int 32
 * @param $data int
 * @return bool|string
 */
function pack_uint32($data)
{
    if ($data === '' || $data === null) {
        return false; #数据结构 不能作为 uint32 打包
    }
    if (GM_BINARY_NET_IS_BIG_ENDIAN) {
        return pack('N', $data);
    } else {
        return pack('V', $data);
    }
}

/**
 * 打包成 unsign int 64
 * @param $data int
 * @return bool|string
 */
function pack_uint64($data)
{
    if ($data === '' || $data === null) {
        return false; #数据结构 不能作为 uint64 打包
    }
    if (GM_BINARY_NET_IS_BIG_ENDIAN) {
        return pack('J', $data);
    } else {
        return pack('P', $data);
    }
}


/**
 * 打包成 int8
 * @param $data int
 * @return bool|string
 */
function pack_int8($data)
{
    if ($data === '' || $data === null) {
        return false; #数据结构 不能作为 int8 打包
    }
    return pack('c', $data);
}

/**
 * 打包成 int16
 * @param $data int
 * @return bool|string
 */
function pack_int16($data)
{
    if ($data === '' || $data === null) {
        return false; #数据结构 不能作为 int16 打包
    }
    $binary_data = pack('s', $data);
    if (GM_BINARY_IS_SHOULD_TO_CHANGE) {
        $binary_data = strrev($binary_data);
    }
    return $binary_data;
}

/**
 * 打包成 int32
 * @param $data int
 * @return bool|string
 */
function pack_int32($data)
{
    if ($data === '' || $data === null) {
        return false; #数据结构 不能作为 int32 打包
    }
    $binary_data = pack('L', $data);
    if (GM_BINARY_IS_SHOULD_TO_CHANGE) {
        $binary_data = strrev($binary_data);
    }
    return $binary_data;
}

/**
 * 打包成 int64
 * @param $data int
 * @return bool|string
 */
function pack_int64($data)
{
    if ($data === '' || $data === null) {
        return false; #数据结构 不能作为 int64 打包
    }
    $binary_data = pack('q', $data);
    if (GM_BINARY_IS_SHOULD_TO_CHANGE) {
        $binary_data = strrev($binary_data);
    }
    return $binary_data;
}

/**
 * 打包成 float 类型
 * @param $data float
 * @return bool|string
 */
function pack_float($data)
{
    $data = (float) $data;
    if ($data === '' || $data === null) {
        return false; #数据结构 不正确
    }
    $binary_data = pack('f',$data);
    if (GM_BINARY_IS_SHOULD_TO_CHANGE) {
        $binary_data = strrev($binary_data);
    }
    return $binary_data;
}

/**
 * 打包成 float 类型
 * @param $data float
 * @return bool|string
 */
function pack_bool($data)
{
    if ($data === '' || $data === null) {
        return false; #数据结构 不正确
    }
    if($data){
        $data = 1;
    }else{
        $data = 0;
    }
    $binary_data = pack('c',$data);
    return $binary_data;
}

/**
 * 打包成 string 类型  前面 按照项目需求 修改成 字符字符串长度
 * @param $data string
 * @return bool|string
 */
function pack_string($data)
{
    if ($data === '' || $data === null) {
        return false; #数据结构 不正确
    }
    $pack_string = pack('a*', $data);
    $str_len = strlen($pack_string);
    $pack_len = pack_uint16($str_len);
    $result_string = $pack_len . $pack_string;
    return $result_string;
}
/**********************************************************************************************************************
 *
 *  unpack类 方法族
 *
 * ********************************************************************************************************************/
/**
 * 打包成 unsign int8
 * @param $binary_data
 * @return bool|int
 */
function unpack_uint8($binary_data)
{
    if ($binary_data === '' || $binary_data === null) {
        return false; #数据结构 不能作为 uint8 解包
    }
    $result = unpack('C', $binary_data);
    return $result[0];
}

/**
 * 打包成 unsign int 16
 * @param $binary_data
 * @return bool|int
 */
function unpack_uint16($binary_data)
{
    if ($binary_data === '' || $binary_data === null) {
        return false; #数据结构 不能作为 uint16 解包
    }
    if (GM_BINARY_NET_IS_BIG_ENDIAN) {
        $return = unpack('n', $binary_data);
    } else {
        $return = unpack('v', $binary_data);
    }
    return $return[1];
}

/**
 * 打包成 unsign int 32
 * @param $binary_data
 * @return bool|int
 */
function unpack_uint32($binary_data)
{
    if ($binary_data === '' || $binary_data === null) {
        return false; #数据结构 不能作为 uint32 解包
    }
    if (GM_BINARY_NET_IS_BIG_ENDIAN) {
        $return = unpack('N', $binary_data);
    } else {
        $return = unpack('V', $binary_data);
    }
    return $return[1];
}

/**
 * 打包成 unsign int 64
 * @param $binary_data
 * @return bool|int
 */
function unpack_uint64($binary_data)
{
    if ($binary_data === '' || $binary_data === null) {
        return false; #数据结构 不能作为 uint64 解包
    }
    if (GM_BINARY_NET_IS_BIG_ENDIAN) {
        $return = unpack('J', $binary_data);
    } else {
        $return = unpack('P', $binary_data);
    }
    return $return[1];
}


/**
 * 打包成 int8
 * @param $binary_data
 * @return bool|int
 */
function unpack_int8($binary_data)
{
    if ($binary_data === '' || $binary_data === null) {
        return false; #数据结构 不能作为 int8 解包
    }
    $return = unpack('c', $binary_data);
    return $return[1];
}

/**
 * 打包成 int16
 * @param $binary_data
 * @return bool|int
 */
function unpack_int16($binary_data)
{
    if ($binary_data === '' || $binary_data === null) {
        return false; #数据结构 不能作为 int16 解包
    }
    if (GM_BINARY_IS_SHOULD_TO_CHANGE) {
        $binary_data = strrev($binary_data);
    }
    $return = unpack('s', $binary_data);
    return $return[1];
}

/**
 * 打包成 int32
 * @param $data
 * @return bool|int
 */
function unpack_int32($binary_data)
{
    if ($binary_data === '' || $binary_data === null) {
        return false; #数据结构 不能作为 int32 解包
    }
    if (GM_BINARY_IS_SHOULD_TO_CHANGE) {
        $binary_data = strrev($binary_data);
    }
    $return = unpack('l', $binary_data);
    return $return[1];
}

/**
 * 打包成 int64
 * @param $data
 * @return bool|int
 */
function unpack_int64($binary_data)
{
    if ($binary_data === '' || $binary_data === null) {
        return false; #数据结构 不能作为 int64 解包
    }
    if (GM_BINARY_IS_SHOULD_TO_CHANGE) {
        $binary_data = strrev($binary_data);
    }
    $return = unpack('q', $binary_data);
    return $return[1];
}

/**
 * 解包成 float 类型
 * @param $binary_data string 二进制字符流
 * @return bool|int
 */
function unpack_float($binary_data)
{
    if ($binary_data === '' || $binary_data === null) {
        return false; #数据结构 不正确
    }
    if (GM_BINARY_IS_SHOULD_TO_CHANGE) {
        $binary_data = strrev($binary_data);
    }
    $return = unpack('f', $binary_data);
    return $return[1];
}

/**
 * 解包成 bool 类型
 * @param $binary_data string 二进制字符流
 * @return bool|int
 */
function unpack_bool($binary_data)
{
    if ($binary_data === '' || $binary_data === null) {
        return false; #数据结构 不正确
    }
    $return = unpack('c', $binary_data);
    if($return[1] == 1){
        return true;
    }else{
        return false;
    }
}

/**
 * 打包成 string 类型  前面 按照项目需求 修改成 字符字符串长度
 * @param $data
 * @return bool|string
 */
function unpack_string($binary_data)
{
    if ($binary_data === '' || $binary_data === null) {
        return false; #数据结构 不正确
    }
    $str_len = substr($binary_data, 0, 2);
    $unpack_len = unpack_int16($str_len);
    $pack_string = substr($binary_data, 2, $unpack_len);
    $result_string = unpack('a' . $unpack_len, $pack_string);
    return $result_string[1];
}
Class Model_Action{
	public $protocol = array();
	public $server = array("ip"=>0,"port"=>0);
	public static $my = null;
	public static function x($game_id,$server){
        if( !is_object(self::$my) ){
            self::$my = new self($game_id,$server);
        }
        return self::$my;
    }
	
	public function __construct($game_id,$server){
		$this->protocol = Config_Protocol::$protocol[$game_id];
		$this->server = $server;
	}
    /**
     * 将二进制流 生成 可用命令
     * @param string $binary_data
     * @return bool|string
     */
    protected static function send_message_packer($binary_data){
        if(!$binary_data){
            throw new Exception("生成命令错误!");
        }
        $string_len = strlen($binary_data) + 4 ; #长度
        $msg = pack_uint32($string_len) . $binary_data;      #拼接命令
        return $msg;
    }
    /**
     * 踢人请求
     * @param $server_id
     * @param $character_id
     * @return bool
     * @throws Exception
     */
    public  function KickUser($server_id,$character_id){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID
        $binary_data .= pack_uint32($character_id);                  #角色id
        return $this->TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 禁言或解禁
     * @param $server_id
     * @param $character_name
     * @param int $is_silence 1禁言，0解禁
     * @return bool
     * @throws Exception
     */
    public  function SilenceUser($server_id,$character_name,$is_silence,$minutes  = 0){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号

        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                    #协议号
        $binary_data .= pack_uint32($server_id);               #服务器ID
        $binary_data .= pack_string($character_name);          #角色名称
        $binary_data .= pack_int8($is_silence?1:0);            #true 禁言，flase解禁
        $binary_data .= pack_uint32($minutes?$minutes:0);      #禁言 时间长度
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);

    }
    /**
     * 禁言玩家列表
     * @param $server_id
     * @return array|bool|int
     * @throws Exception
     */
    public  function GetUserSilenceList($server_id){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID
        // 生成命令
        $binary_cmd = self::send_message_packer($binary_data);
        if($binary_cmd){
            //创建TCP SOCKET
            $tcp_socket = new Public_Socket($this->server['ip'],$this->server['port'],GATE_GM_SEND_TIMEOUT, GATE_GM_REV_TIMEOUT);
            // 发送信息
            $sent_cmd_len = $tcp_socket->write($binary_cmd);
            if($sent_cmd_len){
                //反馈协议结果结果长度
                $len = $tcp_socket->read(4);
                //反馈协议 结果类型
                $read_type = unpack_uint32($tcp_socket->read(4));
                //反馈协议 结果类型
                if($read_type == $rsv_type){
                    //反馈协议 - 服务器ID   uint 32
                    $server_id_rev = unpack_uint32($tcp_socket->read(4));
                    //反馈协议 - 数量   uint 16
                    $count_rev = unpack_uint16($tcp_socket->read(2));
                    //反馈协议 - 列表
                    if($count_rev>0){
                        $list_rev =array();
                        for($i=1;$i<=$count_rev;$i++){
                            $len = unpack_int16($tcp_socket->read(2));
                            $list_rev[$i]['character_name_len']=$len ;
                            $content=unpack('a*', $tcp_socket->read($len));
                            $list_rev[$i]['character_name'] =$content[1];
                        }
                    }
                    if($count_rev && $list_rev && $server_id_rev == $server_id){
                        #成功结果
                        return array($count_rev,$list_rev);
                    }else{
                        #失败结果
                        return array();
                    }
                }else{
                    throw new Exception("协议错误！ 反馈{$read_type} !=  定义{$rsv_type}");
                }
            }
        }
        return false;
    }
    /**
     * 锁定帐号
     * @param $server_id
     * @param $account
     * @return bool
     * @throws Exception
     */
    public  function LockAccount($server_id,$account,$minutes  = 0){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);              #服务器ID#名字
        $binary_data .= pack_string($account);
        $binary_data .= pack_uint32($minutes?$minutes:0);      #禁言 时间长度
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 解锁帐号
     * @param $server_id
     * @param $account
     * @return bool
     * @throws Exception
     */
    public  function UnLockAccount($server_id,$account){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号

        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID#名字
        $binary_data .= pack_string($account);
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 锁定账号列表
     * @param $server_id
     * @return array|bool
     * @throws Exception
     */
    public  function GetLockAccountList($server_id){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID
        // 生成命令
        $binary_cmd = self::send_message_packer($binary_data);
        if($binary_cmd){
            //创建TCP SOCKET
            $tcp_socket = new Public_Socket($this->server['ip'],$this->server['port'],GATE_GM_SEND_TIMEOUT, GATE_GM_REV_TIMEOUT);
            // 发送信息
            $sent_cmd_len = $tcp_socket->write($binary_cmd);
            if($sent_cmd_len){
                //反馈协议结果结果长度
                $len = $tcp_socket->read(4);
                //反馈协议 结果类型
                $read_type = unpack_uint32($tcp_socket->read(4));
                //反馈协议 结果类型
                if($read_type == $rsv_type){
                    //反馈协议 - 服务器ID   uint 32
                    $server_id_rev = unpack_uint32($tcp_socket->read(4));
                    //反馈协议 - 数量   uint 16
                    $count_rev = unpack_uint16($tcp_socket->read(2));
                    //反馈协议 - 列表
                    if($count_rev>0){
                        $list_rev =array();
                        for($i=1;$i<=$count_rev;$i++){
                            $len = unpack_int16($tcp_socket->read(2));
                            $list_rev[$i]['account_len']=$len ;
                            $content=unpack('a'.$len, $tcp_socket->read($len));
                            $list_rev[$i]['account'] =$content[1];
                        }
                    }
                    if($count_rev && $list_rev && $server_id_rev == $server_id){
                        #成功结果
                        return array($count_rev,$list_rev);
                    }else{
                        #失败结果
                        return array();
                    }
                }else{
                    throw new Exception("协议错误！ 反馈{$read_type} !=  定义{$rsv_type}");
                }
            }
        }
        return false;
    }
    /**
     * 锁定ip
     * @param $server_id
     * @param $ip
     * @return bool
     * @throws Exception
     */
    public  function LockIp($server_id,$ip){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号

        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID#名字
        $binary_data .= pack_string($ip);
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 解锁帐号
     * @param $server_id
     * @param $ip
     * @return bool
     * @throws Exception
     */
    public  function UnLockIp($server_id,$ip){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号

        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID#名字
        $binary_data .= pack_string($ip);
        // 生成命令
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 锁定ip列表
     * @param $server_id
     * @return array|bool
     * @throws Exception
     */
    public function GetLockIpList($server_id){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号

        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID
        // 生成命令
        $binary_cmd = self::send_message_packer($binary_data);
        if($binary_cmd){
            //创建TCP SOCKET
            $tcp_socket = new Public_Socket($this->server['ip'],$this->server['port'],GATE_GM_SEND_TIMEOUT, GATE_GM_REV_TIMEOUT);
            // 发送信息
            $sent_cmd_len = $tcp_socket->write($binary_cmd);
            if($sent_cmd_len){
                //反馈协议结果结果长度
                $len = $tcp_socket->read(4);
                //反馈协议 结果类型
                $read_type = unpack_uint32($tcp_socket->read(4));
                //反馈协议 结果类型
                if($read_type == $rsv_type){
                    //反馈协议 - 服务器ID   uint 32
                    $server_id_rev = unpack_uint32($tcp_socket->read(4));
                    //反馈协议 - 数量   uint 16
                    $count_rev = unpack_uint16($tcp_socket->read(2));
                    //var_dump($count_rev);exit;
                    //反馈协议 - 列表
                    if($count_rev>0){
                        $list_rev =array();
                        for($i=1;$i<=$count_rev;$i++){
                            $len = unpack_int16($tcp_socket->read(2));
                            $list_rev[$i]['ip_len']=$len ;
                            $content=unpack('a'.$len, $tcp_socket->read($len));
                            $list_rev[$i]['ip'] =$content[1];
                        }
                    }
                    if($count_rev && $list_rev && $server_id_rev == $server_id){
                        #成功结果
                        return array($count_rev,$list_rev);
                    }else{
                        #失败结果
                        return array();
                    }
                }else{
                    throw new Exception("协议错误！ 反馈{$read_type} !=  定义{$rsv_type}");
                }
            }
        }
        return false;
    }
    /**
     * 传送
     * @param $server_id
     * @param $count
     * @param $character
     * @param $scene_id
     * @param $x
     * @param $y
     * @throws Exception
     */
    public  function GMTeleport($server_id,$character,$scene_id,$x,$y){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);
        $count=count($character);#服务器ID#名字
        $binary_data .= pack_uint16( $count);
        for($i=0;$i<$count;$i++){
            $binary_data .=pack_uint32($character[$i]);
        }
        $binary_data .= pack_uint32($scene_id);
        $binary_data .= pack_float($x);
        $binary_data .= pack_float($y);
        // 生成命令
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 邮件
     * @param $server_id
     * @param $character
     * @param $money
     * @param $e_money
     * @param $content
     * @param array $mail
     * @return bool
     * @throws Exception
     */
    public  function GMMail($server_id,$character,$money,$e_money,$content,$mail=array()){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);
        $count=count($character);#服务器ID#名字
        $binary_data .= pack_uint16( $count);
        for($i=0;$i<$count;$i++){
            $binary_data .=pack_uint32($character[$i]);
        }
        $binary_data .= pack_uint32($money);
        $binary_data .= pack_uint32($e_money);
        $binary_data .= pack_string($content);           #内容
        $num=count($mail);#服务器ID#名字
        $binary_data .= pack_uint16(0);
      //  for($i=0;$i<$num;$i++){
           // $binary_data .=pack_uint16($mail[$i]['type']);
      //  }
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 发布即时公告
     * @param $server_id
     * @param $content
     * @throws Exception
     */
    public  function SendAnnounceInstant($server_id,$content){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID#名字
        $binary_data .= pack_string($content);           #内容
        // 生成命令
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 发布循环公告
     * @param $server_id
     * @param $content
     * @param $send_time
     * @param $end_time
     * @param $interval
     * @throws Exception
     */
    public function SendAnnounceLoop($server_id,$content,$send_time,$end_time,$interval){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID#名字
        $binary_data .= pack_string($content);         #内容
        $binary_data .= pack_uint64($send_time);       #发送时间
        $binary_data .= pack_uint64($end_time);#结束时间
        $binary_data .= pack_uint64($interval);#间隔时间
        // 生成命令
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 发布定时公告
     * @param $server_id
     * @param $content
     * @param $send_time
     * @throws Exception
     */
    public function SendAnnounceRegular($server_id,$content,$send_time){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID#名字
        $binary_data .= pack_string($content);        #内容
        $binary_data .= pack_uint64($send_time);       #发送时间
        // 生成命令
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 删除定时公告
     * @param $server_id
     * @param $announce_id
     * @throws Exception
     */
    public function DelAnnounceRegular($server_id,$announce_id){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID#名字
        $binary_data .= pack_uint32($announce_id);
        // 生成命令
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 删除循环公告
     * @param $server_id
     * @param $announce_id
     */
    public function DelAnnounceLoop($server_id,$announce_id){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($server_id);                  #服务器ID#名字
        $binary_data .= pack_uint32($announce_id);
        // 生成命令
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /**
     * 循环公告列表
     * @return array|bool
     * @throws Exception
     */
    public  function GetAnnounceLoopList(){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号

        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        // 生成命令
        $binary_cmd = self::send_message_packer($binary_data);
        //self::Check_Binary_Command('Nlen/Ntype/Nsid',$binary_cmd); #用来检查二进制流
        $arrResource = getGMServer();
        if(is_array($arrResource)){
            $result=array();
            foreach($arrResource as $k=>$v){
                if($binary_cmd){
                    //创建TCP SOCKET
                    $tcp_socket = new Public_Socket($v['ip'],$v['port'],GATE_GM_SEND_TIMEOUT,GATE_GM_REV_TIMEOUT);
                    // 发送信息
                    $sent_cmd_len = $tcp_socket->write($binary_cmd);
                    if($sent_cmd_len){
                        //反馈协议结果结果长度
                        $len = $tcp_socket->read(4);
                        //反馈协议 结果类型
                        $read_type = unpack_uint32($tcp_socket->read(4));
                        if($read_type == $rsv_type){
                            //反馈协议 - 数量   uint 16
                            $count_rev = unpack_uint16($tcp_socket->read(2));
                            //反馈协议 - 列表
                            if($count_rev>0) {
                                $list_rev = array();
                                for ($i = 1; $i <= $count_rev; $i++) {
                                    $list_rev[$i]['server_id'] = unpack_uint32($tcp_socket->read(4));
                                    $list_rev[$i]['announce_id'] = unpack_uint32($tcp_socket->read(4));
                                    $content_len = unpack_int16($tcp_socket->read(2));
                                    $list_rev[$i]['content_len'] = $content_len;
                                    $content = unpack('a' . $content_len, $tcp_socket->read($content_len));
                                    $list_rev[$i]['content'] = $content[1];
                                    $list_rev[$i]['send_time'] = unpack_uint64($tcp_socket->read(8));
                                    $list_rev[$i]['end_time'] = unpack_uint64($tcp_socket->read(8));
                                    $list_rev[$i]['interval'] = unpack_uint64($tcp_socket->read(8));
                                }
                            }
                            if($count_rev && $list_rev){
                                #成功结果
                                $list=$list_rev;
                            }else{
                                #失败结果
                                $list=array();
                            }
                        }else{
                            throw new Exception("协议错误！ 反馈{$read_type} !=  定义{$rsv_type}");
                        }
                    }
                }
                $result=array_merge($result,$list);
            }
        }
        return $result;
    }
    /**
     * 定时公告列表
     * @return array|bool
     * @throws Exception
     */
    public  function GetAnnounceRegularList(){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号

        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        // 生成命令
        $binary_cmd = self::send_message_packer($binary_data);
        $arrResource = getGMServer();
        if(is_array($arrResource)){
            $result=array();
            foreach($arrResource as $k=>$v){
                if($binary_cmd){
                    //创建TCP SOCKET
                    $tcp_socket = new Public_Socket($v['ip'],$v['port'],GATE_GM_SEND_TIMEOUT,GATE_GM_REV_TIMEOUT);
                    // 发送信息
                    $sent_cmd_len = $tcp_socket->write($binary_cmd);
                    if($sent_cmd_len){
                        //反馈协议结果结果长度
                        $len = $tcp_socket->read(4);
                        //反馈协议 结果类型
                        $read_type = unpack_uint32($tcp_socket->read(4));
                        //反馈协议 结果类型
                        if($read_type == $rsv_type){
                            //反馈协议 - 数量   uint 16
                            $count_rev = unpack_uint16($tcp_socket->read(2));
                            if($count_rev>0) {
                                //反馈协议 - 列表
                                $list_rev = array();
                                for ($i = 0; $i < $count_rev; $i++) {
                                    $list_rev[$i]['server_id'] = unpack_uint32($tcp_socket->read(4));
                                    $list_rev[$i]['announce_id'] = unpack_uint32($tcp_socket->read(4));
                                    $content_len = unpack_int16($tcp_socket->read(2));
                                    $list_rev[$i]['content_len'] = $content_len;
                                    $content = unpack('a' . $content_len, $tcp_socket->read($content_len));
                                    $list_rev[$i]['content'] = $content[1];
                                    $list_rev[$i]['send_time'] = unpack_uint64($tcp_socket->read(8));
                                }
                            }
                            if($count_rev && $list_rev){
                                #成功结果
                                $list=$list_rev;
                            }else{
                                #失败结果
                                $list=array();
                            }
                        }else{
                            throw new Exception("协议错误！ 反馈{$read_type} !=  定义{$rsv_type}");
                        }
                    }
                }
                $result=array_merge($result,$list);
            }
        }
        return $result;
    }
    /***********************************************申请管理接口***********************************************/
    /**
     * 装备信息
     * @param $equipid 装备id
     * @param $num 装备数量
     * @param $isBind 是否绑定
     * @param $realm
     * @param $stage
     * @param $equiplev
     * @param $attrNum 附加属性数量
     * @param $AttrInfo 属性类型字符串 0,1,2,3
     * @return bool|string
     */
    protected function EquipData($param)
    {
        $str = pack_uint32($param['equipid']);
        $str .= pack_uint32($param['num']);
        $str .= pack_int8($param['isBind']);
        $str .= pack_uint16($param['realm']);
        $str .= pack_uint16($param['stage']);
        $str .= pack_uint32($param['equiplev']);
        $str .= pack_uint16($param['attrNum']);
        if( $param['attrNum'] > 0 ){
            $AttrInfo = explode(',', $param['AttrInfo']);
            if( $param['attrNum'] != count($param['AttrInfo']) ) return false;
            foreach ( $AttrInfo as $val ) {
                $str .= AttrInfo($val);
            }
        }
        return $str;
    }

    /**
     * 附加属性信息
     * @param $attrType 属性类型（0无，1攻击，2防御，3生命，4命中，5闪避，6暴击，7韧性，11攻击百分比，12防御百分比，13生命百分比，14命中百分比，15闪避百分比，16暴击百分比，17韧性百分比）
     * @return bool|string
     */
    protected function AttrInfo($attrType)
    {
        return pack_uint32($attrType);
    }

    /**
     * 物品信息
     * @param $param[id] 物品ID
     * @param $param[num] 物品数量
     * @param $param[isBind] 是否绑定（0绑定，1未绑定）
     * @return bool | string
     */
    protected function ItemData($param)
    {
        if( is_array($param) ){
            $binary_data = '';
            $binary_data .= pack_uint16($param['type']);
            $binary_data .= pack_uint32($param['itemid']);
            $binary_data .= pack_uint32($param['num']);
            $binary_data .= pack_int8($param['isBind']);
            return $binary_data;
        } else {
            return false;
        }
    }

    /**
     * 附件内容
     * @param $type 0物品，1装备
     * @param $param array
     * @return string
     */
    protected function MailThing($param){
        if( !is_array($param) ) return false;
        $binary_data = '';
        foreach($param as $k=>$v ){
            if( $v['type'] == 0 ) {
                $binary_data .= self::ItemData($v);
            } else {
                $binary_data .= self::EquipData($v);
            }
        }
        return $binary_data;
    }

    /**
     * 发送邮件请求
     * @param $Type
     * @param $Sid
     * @param int $CharacterAmount
     * @param $Character
     * @param $Money
     * @param $Emoney
     * @param $Content
     * @param int $MailThingNum
     * @param string $MailThing
     * @return string
     */
    public function GM_Mail($server_id, $characterids, $money, $emoney, $content, $mailThing='')
    {
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data  = pack_uint32($type);
        $binary_data .= pack_uint32($server_id);
        $char_data = '';
        if( $characterids != '' ){
            $Characters = explode(',',$characterids);
            $characterAmount = count($Characters);
            foreach($Characters as $val) {
                $char_data .= pack_uint32($val);
            }
        } else {
            $characterAmount = 0;
        }
        $binary_data .= pack_uint16($characterAmount);
        $binary_data .= $char_data;
        $binary_data .= pack_uint32($money);
        $binary_data .= pack_uint32($emoney);
        $binary_data .= pack_string($content);
        $mailThingNum = $mailThing == '' ? 0 : count($mailThing);
        $binary_data .= pack_uint16($mailThingNum);
        if( $mailThingNum != 0 ) $binary_data .= self::MailThing($mailThing);
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }

    /**
     * GM充值请求（需要角色在线）
     * @param $type         8546
     * @param $sid          服务器ID
     * @param $characterid  角色ID
     * @param $unEmoney     充值金额
     */
    public function GM_Charge($server_id, $characterid, $unEmoney)
    {
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号
        $binary_data  = pack_uint32($type);
        $binary_data .= pack_uint32($server_id);
        $binary_data .= pack_uint32($characterid);
        $binary_data .= pack_uint32($unEmoney);
        return self::TCPSocketCommand($server_id,$rsv_type,$binary_data);
    }
    /***********************************************申请管理接口 END***************************************/

    /***********************************************通用部分***********************************************/
    /**
     * Socket请求列表通用部分
     * @param $server_id
     * @param $rsv_type
     * @param $binary_data
     * @return array|bool
     * @throws Exception
     */
    public static function TCPSocketList($server_id,$rsv_type,$binary_data){
        // 生成命令
        $binary_cmd = self::send_message_packer($binary_data);
        if($binary_cmd){
            //创建TCP SOCKET
//            $tcp_socket = new Public_Socket($this->server['ip'],$this->server['port'],GATE_GM_SEND_TIMEOUT, GATE_GM_REV_TIMEOUT);
            $tcp_socket =  '';
            // 发送信息
            // 发送信息
            $sent_cmd_len = $tcp_socket->write($binary_cmd);
            if($sent_cmd_len){
                //反馈协议结果结果长度
                $len = $tcp_socket->read(4);
                //反馈协议 结果类型
                $read_type = unpack_uint32($tcp_socket->read(4));
                //反馈协议 结果类型
                if($read_type == $rsv_type){
                    //反馈协议 - 服务器ID   uint 32
                    $server_id_rev = unpack_uint32($tcp_socket->read(4));
                    //反馈协议 - 数量   uint 16
                    $count_rev = unpack_uint16($tcp_socket->read(2));
                    //反馈协议 - 列表
                    $unpack_len =unpack_int16($tcp_socket->read(2));
                    $list_rev =array();
                    for($i=1;$i<=$count_rev;$i++){
                        $unpack_len =unpack_int16($tcp_socket->read(2));
                        $list_rev[$i]['content_len'] = unpack_int16($tcp_socket->read(4));
                        $list_rev[$i]['content'] = unpack('a' . $list_rev['content_len'], $tcp_socket->read($list_rev['content_len']));
                    }
                    if($count_rev && $list_rev && $server_id_rev == $server_id){
                        #成功结果
                        return array($count_rev,$list_rev);
                    }else{
                        #失败结果
                        return array();
                    }
                }else{
                    throw new Exception("协议错误！ 反馈{$read_type} !=  定义{$rsv_type}");
                }
            }
        }
        return false;
    }

    /**
     *  Socket 发送命令通用部分
     * @param $server_id
     * @param $rsv_type
     * @param $binary_data
     * @return bool
     * @throws Exception
     */
    public function TCPSocketCommand($server_id,$rsv_type,$binary_data){
        // 生成命令
        $binary_cmd = self::send_message_packer($binary_data);
        if($binary_cmd){
            //创建TCP SOCKET
            $tcp_socket = new Public_Socket($this->server['ip'],$this->server['port'],GATE_GM_SEND_TIMEOUT, GATE_GM_REV_TIMEOUT);
            // 发送信息
            $sent_cmd_len = $tcp_socket->write($binary_cmd);
            if($sent_cmd_len){
                //反馈协议结果结果长度
                $len = $tcp_socket->read(4);
                //反馈协议 结果类型
                $read_type = unpack_uint32($tcp_socket->read(4));
                //反馈协议 结果类型
                if($read_type == $rsv_type){
                    //反馈协议 - 服务器ID   uint 32
                    $server_id_rev = unpack_uint32($tcp_socket->read(4));
                    //反馈协议 - 返回码（0成功，1失败）   uint 32
                    $code_rev = unpack_uint32($tcp_socket->read(4));
                    //print($code_rev);
                    if($code_rev===0 && $server_id_rev == $server_id){
                        #成功
                        return true;
                    }else{
                        #失败
                        return false;
                    }
                }else{
                    throw new Exception("协议错误！ 反馈{$read_type} !=  定义{$rsv_type}");
                }
            }
        }
        return false;
    }
    /*********************************************** 通用部分 end***********************************************/
    /**
     *  查询在线人数
     * @param $sid                  int 服务器ID
     * @return int
     * @throws Exception
     * @notice 方法被闲置，需要 页游后端 协助
     */
    public function GetReportOnline($sid){
		$type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号

        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($sid);                  #服务器ID

        // 生成命令
        $binary_cmd = self::send_message_packer($binary_data);
        self::Check_Binary_Command('Nlen/Ntype/Nsid',$binary_cmd); #用来检查二进制流

        if($binary_cmd){
            //创建TCP SOCKET
            $tcp_socket = new Public_Socket($this->server['ip'],$this->server['port'],GATE_GM_SEND_TIMEOUT, GATE_GM_REV_TIMEOUT);
            // 发送信息
            $sent_cmd_len = $tcp_socket->write($binary_cmd);
            if($sent_cmd_len){
                //反馈协议结果结果长度
                $len = $tcp_socket->read(4);
                //反馈协议 结果类型
                $read_type = unpack_uint32($tcp_socket->read(4));
                //反馈协议 结果类型
                if($read_type == $rsv_type){
                    //反馈协议 - 服务器ID   uint 32
                    $sid_rev = unpack_uint32($tcp_socket->read(4));
                    //反馈协议 - 在线人数   uint 16
                    $count = unpack_uint16($tcp_socket->read(2));
                    if($count && $sid_rev == $sid){
                        #在线人数查询成功
                        return $count;
                    }else{
                        #在线人数查询失败
                        return 0;
                    }
                }else{
                    throw new Exception("协议错误！ 反馈{$read_type} !=  定义{$rsv_type}");
                }
            }
        }
        return false;
    }
    /**
     *  平台向游戏充值服务器请求发货(平台层)
     * @param $sid                  int 服务器ID
     * @param $character_id         int 角色ID
     * @param $charge_time          int 充值时间（UNIX时间戳）
     * @param $money                int 对应真实世界价值的元宝
     * @param $ex_money             int 因为折扣或者赠送的元宝
     * @param $platform_id          int 平台来源
     * @param $ip                   string 充值IP
     * @param $account              string 账号
     * @param $bill_no              string 订单号
     * @return                      bool 充值成功 是(true) 否(false)
     * @throws Exception
     */
    public  function SendMsgCallBackShip($sid,$character_id,$charge_time,$money,$ex_money,$platform_id,$ip,$account,$bill_no){
        $type = $this->protocol[__FUNCTION__]['type']; #协议号
        $rsv_type = $this->protocol[__FUNCTION__]['rsv_type']; # 反馈 协议号

        $binary_data = ''; #空字符
        $binary_data .= pack_uint32($type);                 #协议号
        $binary_data .= pack_uint32($sid);                  #服务器ID
        $binary_data .= pack_uint32($character_id);         #角色ID
        $binary_data .= pack_uint64($charge_time);          #充值时间（UNIX时间戳）
        $binary_data .= pack_uint32($money);                #对应真实世界价值的元宝
        $binary_data .= pack_uint32($ex_money);             #因为折扣或者赠送的元宝
        $binary_data .= pack_uint32($platform_id);          #平台来源
        $binary_data .= pack_string($ip);                   #IP，上限64
        $binary_data .= pack_string($account);              #账号，上限64
        $binary_data .= pack_string($bill_no);              #订单号，上限256
        // 生成命令
        $binary_cmd = self::send_message_packer($binary_data);

        $arrResource = self::SocketResourceBySid($sid);
        if($binary_cmd){
            //创建TCP SOCKET
            $tcp_socket = new Public_Socket($this->server['ip'],$this->server['port'],GATE_GM_SEND_TIMEOUT, GATE_GM_REV_TIMEOUT);
            // 发送信息
            $sent_cmd_len = $tcp_socket->write($binary_cmd);
            if($sent_cmd_len){
                //反馈协议结果结果长度
                $len = $tcp_socket->read(4);
                //反馈协议 结果类型
                $read_type = unpack_uint32($tcp_socket->read(4));
                //反馈协议 结果类型
                if($read_type == $rsv_type){
                    //反馈协议结果成功  是(1) 否(0)  uint 16
                    $code = unpack_uint16($tcp_socket->read(2));
                    //反馈协议充值角色ID             uint 32
                    $chid = unpack_uint32($tcp_socket->read(4));
                    if($code === 0 && $chid === $character_id){
                        #充值成功
                        return true;
                    }else{
                        #充值失败
                        return false;
                    }
                }else{
                    throw new Exception("协议错误！ 反馈{$read_type} !=  定义{$rsv_type}");
                }
            }
        }
        return false;
    }
    /**
     * 根据服务器资源 获取 TCP 连接地址信息
     * @param $sid   int 服务器ID
     * @return array
     */
    public static function SocketResourceBySid($sid){
        return array(GATE_CHARGE_IP,GATE_CHARGE_PORT,GATE_CHARGE_SEND_TIMEOUT,GATE_CHARGE_REV_TIMEOUT);
    }
    /***
     * 打印 二进制流 的 长度 和 数据
     * @param $format
     * @param $binary_cmd
     */
    public static function Check_Binary_Command($format,$binary_cmd){
        return ;
        var_dump(unpack($format,$binary_cmd));
        var_dump('binary_cmd \'s length : '.strlen($binary_cmd));
        var_dump(bin2hex($binary_cmd));
        echo(bin2hex($binary_cmd));
    }
}