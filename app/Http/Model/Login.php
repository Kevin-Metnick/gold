<?php
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
	protected $tabName ; //数据库名称
	protected $array=['get'] ; 
	protected $static=['table']; 

	/**
	 * 操作数据 判断能否登录
	 */
	public function Opertion($value)
	{
	   $mod = new Db();
	   $sql = '$Result = ';
	    // var_dump($value);
	 	foreach ($value as $k => $v) {
	 		if (in_array($k,$this->static)) {
	 	        $sql .= '$mod::'.$k.'('.$v.')';
	 		}else{
	 	        $sql .= '->'.$k."($v)";	
	 		}
	 	}
	 	$sql .=';'; 
	 	// echo $sql;
	 	eval( $sql);
	 	return $Result;
	}

}