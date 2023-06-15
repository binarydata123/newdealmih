<?php
/**
 * Created by PhpStorm.
 * User: COMPUTER
 * Date: 3/22/2018
 * Time: 5:43 PM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
       
        if (Auth::guard($guard)->guest() || Auth::user()->role_id !=1) {

            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }

            return redirect()->guest('login');
        }
        return $next($request);
    }
}