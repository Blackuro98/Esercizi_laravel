<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Http\Request;
//use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class CheckRole
{
  public function handle($request, Closure $next, ...$roles)
  {
    if (!Auth::check()) {
      return redirect()->route('login');
    }
    $userRole = strtolower(Auth::user()->role);
    $roles = array_map('strtolower', $roles);

    if (!in_array($userRole, $roles, true)) {
      abort(403, 'Accesso non autorizzato');
    }
    return $next($request);
  }
}