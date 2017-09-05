<?php
namespace app\Http\Middleware;

use Closure;
use Auth;

/**
* 
*/
class UserExit
{
	
public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guest()) {
            if (isset($_COOKIE['User-Session'])) {
                 return $next($request);
            } else {
                 return $next($request);
            }
        }
    }
    
}