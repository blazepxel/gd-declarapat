<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{

  public function handle($request, Closure $next, $guard = null)  /*** Handle an incoming request. ** @param  \Illuminate\Http\Request  $request* @param  \Closure  $next* @param  string|null  $guard @return mixed */
  {
    if (Auth::guard($guard)->check())
    {
      return redirect('/panel');
    }

    return $next($request);
  }
}
