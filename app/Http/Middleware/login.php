<?php
namespace app\Http\Middleware;

use Closure;
use Auth;

/**
* 
*/
class login
{
	
	public function handle($request, Closure $next, $guard = null)
    {
    	if (Auth::guest()) {
            if (isset($_COOKIE['User-Session'])) {
            	 return $next($request);
            } else {
            	setcookie("log",request()->url(),time()+3600);
                return redirect()->guest('Login');
            }
        }
    }
    
}