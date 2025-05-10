<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{ /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @param  string  $roles
    * @return \Symfony\Component\HttpFoundation\Response
    */
   public function handle(Request $request, Closure $next, $roles): Response
   {
       if (!Auth::check()) {
           return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً');
       }

       $roles = explode(',', $roles);
       $userRoleId = Auth::user()->role_id;

       if (!in_array($userRoleId, $roles)) {
        return redirect('/destinations')->with('error', 'ليس لديك صلاحية الوصول');
       }

       return $next($request);
   }
}
