<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Core\User;
use App\Http\Events\Login as Event;

class LoginController extends User
{

	public function Opertion()
	{
		// Event::Opertion(__ClASS__,__FUNCTION__);
		$Event = new Event();
		$Event->Opertion(__ClASS__,__FUNCTION__);
	}

}