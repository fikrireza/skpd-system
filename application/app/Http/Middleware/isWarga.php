<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
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
    // Seharusnya gak pake Auth, Nanti ganti cuii
    if(Auth::user()->level == 1)
    {
      return $next($request);
    }
    return new RedirectResponse(url('/'));
  }
}
