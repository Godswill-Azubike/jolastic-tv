<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateAccount
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth('admin')->check()) {
            return $next($request);
        }elseif (auth('user')->check()) {
            return $next($request);
        }
        else {
            return redirect()->route('authenticate')->with('error', 'Unauthorized Account access, Please login to continue');
        }
    }
}
