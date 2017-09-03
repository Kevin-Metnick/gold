<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class User extends Controller
{ 
	function __construct()
	{
		// 获取cookie
	
	}

   public function show()
   {
   	  return view('login');

   }

   public function index()
   {
   	echo  '调用index';
   }

}