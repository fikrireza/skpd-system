<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class isSkpd
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
      // 2 untuk SKPD
      if(session('level') == 2)
      {
        return $next($request);
      }

      return new RedirectResponse(url('/'));
    }
}
