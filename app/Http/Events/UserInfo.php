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
		$result = Db::table('user_Info')->where('id','=' , $this->userId)->select('id','username','number','email')->first();
		$level1 = Db::table('user_level')->where('level', '=', $result->id)->select('id')->get();
		echo "<pre>";
		$level1 = (array)$level1;
		foreach ($level1 as $key => $value) $a=$value;
		var_dump($a[0]->id);
		return $result;
	}
}