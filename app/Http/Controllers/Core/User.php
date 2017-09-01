<?php
namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;

class User extends Controller
{
   public function show()
   {
   	  return view('login');
   }

   public function index()
   {
   	echo  '调用index';
   }

}