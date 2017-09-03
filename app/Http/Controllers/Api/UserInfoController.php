<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Core\User;
use App\Http\Events\Login as Event;
use App\Http\Events\UserInfo as UserInfo;
use Illuminate\Support\Facades\Cookie;

class UserInfoController extends User
{

	public function Opertion()
	{
		
		$Event = new Event();
		$userInfo = $Event->Opertion(__ClASS__,__FUNCTION__);
	}


	/**
	 * 获取用户信息
	 * @return [type] [description]
	 */
	public function userInfo()
	{
		$Event = new UserInfo();
		$userInfo = $Event->index();
		var_dump($userInfo);
	}

}