<?php
   
/**
 * array_Opertion  数组指定下标切换
 * @param  array $array 需要更换的数组
 * @param  array $value 所更换的值
 * @param  boolean $bool  是否去除token令牌
 * @return array        返回结果数组
 */
function array_Opertion($array,$value,$bool='true')
{
	// 判断是否需要去除 _token
    if($bool){unset($array['_token']);}
    // 执行切换
    foreach ($array as $k => $v) {
    	// 判断数组中存在需要判断的文件
    	if(in_array($k, array_keys($value))){
    	    $first =  $value["$k"];
    	    $k = $first;
    	}
    	$Result["$k"]=$v;
    }
    // 返回结果集
    return $Result;
}
  /**
    * 用户uid 加密
    * @return [type] [description]
    */
    function user_Encode($userId)
   {
   		$userId;
   		$time = time()+3600*2;
   		return json_encode(str_split(base_convert($userId, 16, 2)."T".$time,4));
   }

    function user_Decode($value)
   {
        $value = explode("T",implode("",json_decode($value)));
        $value['id'] = base_convert($value[0],2,16);
        $value['time'] = $value[1];
        unset($value[0]);
        unset($value[1]);
       return $value;
   }