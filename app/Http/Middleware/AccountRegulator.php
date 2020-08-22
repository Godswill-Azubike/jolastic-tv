<?php

namespace App\Http\Middleware;

use Closure;

class AccountRegulator
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
        if (auth('user')->check() || auth('admin')->check()) {
            return redirect()->route('validate.account')->with('error', 'You\'re already logged in, sign out of your current session to continue');
        } else {
            return $next($request);
        }
    }
}
