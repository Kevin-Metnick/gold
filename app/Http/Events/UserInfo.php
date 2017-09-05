<?php
namespace App\Http\Events;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use App\Http\Model\Login as LoginModel;

/**
* 
*/
class UserInfo extends Controller
{
	private $userId;
	function __construct(){
		$id = user_Decode($_COOKIE['User-Session']);	
		$this->userId = $id['id'];
	}


	public function index()
	{
		$result = Db::table('user_Info')->where('id','=' , $this->userId)->select('id','username','phone','email')->first();

		$i = 0;
		$level['next']=$this->userId;
		do{
			if (empty($level['next'])) {
				$level[$i]=0;
			}else{
				// var_dump($level['next']);
				if (is_array($level['next'])) {
					$level[$i] = Db::table('user_level')->whereIn('level', $level['next'])->select('id')->get();
				}else{
					$level[$i] = Db::table('user_level')->where('level', '=',$level['next'])->select('id')->get();
				}
				$level[$i] = array_values((array)$level[$i])[0];
				unset($level['next']);
				$level['next'] = '';
			    foreach ($level[$i] as $key => $value) {
					$level['next'][]= $value->id;
				}
				unset($level[$i]);
				$level[$i]=$level['next'];
			}
			$i++;
		}while($i<5);
	
		if (!empty($level[0])) {
			echo '有东西';
		}
		
		return ['userInf'=>$result,'level'=>$level];
	}
}