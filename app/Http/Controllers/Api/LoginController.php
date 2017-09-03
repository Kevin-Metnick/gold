<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Events\Login as Event;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{

	public function Opertion()
	{
		
		$Event = new Event();
		$userInfo = $Event->Opertion(__ClASS__,__FUNCTION__);
		if ($userInfo['msg']) {
			$url = $_COOKIE['log'];
			setcookie("log", 1, time()-1);
			// 判断成功
			return redirect($url);
		}else{
			//判断失败
			return redirect()->guset('/Login');
		}
	}
	


	public function show()
	{
		return view('Login');
	}

		/**
	 * userAdd 注册新用户
	 * @return [type] [description]
	 */
	public function userAdd()
	{
      $Event = new Event();
      $userAdd = $Event->userAdd();
	}

	/**
	 * 添加下级
	 * @return [type] [description]
	 */
	public function userSubLevel()
	{

	}

}