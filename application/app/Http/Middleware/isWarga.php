<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;

class isWarga
{

  /**
   * Menangani request dari warga
   *
   *  @param \Illuminate\Http\Request request
   *  @param \Closure $next
   *  @return mixed
   */
  public function handle($request, Closure $next)
  {
    if(session('level') === 1)
    {
      return $next($request);
    }
    return new RedirectResponse(url('/'));
  }
}
