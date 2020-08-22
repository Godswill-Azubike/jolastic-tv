<?php

namespace App\Http\Middleware;

use Closure;

class UserRouteGuard
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
        if (auth('user')->check()) {
            return $next($request);
        }else {
            return redirect()->route('validate.account');
        }
    }
}
