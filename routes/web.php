<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  
    return view('welcome');
});


Route::get('/Login', 'Api\LoginController@show');
Route::post('/Login-Opertion','Api\LoginController@Opertion');
Route::post('/Login-userAdd','Api\LoginController@userAdd');
Route::group(['middleware' => ['login']], function () {
	Route::get('/User', 'Api\UserInfoController@userinfo');
});
   
   Route::get('/User-Exit', 'Api\LoginController@userExit')->middleware("exit");
