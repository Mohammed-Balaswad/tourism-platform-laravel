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
    // $next: وظيفة مغلقة (Closure) تسمح بتمرير الطلب للمرحلة التالية إذا كانت الشروط مستوفاة.
    // $roles: الدور أو الأدوار المسموح بها، يتم تمريرها من تعريف الـ Route بالشكل:


       if (!Auth::check()) {
           return back()->with('error', 'يجب تسجيل الدخول أولاً');
       }

       $roles = explode(',', $roles);  // يقوم بتحويل سلسلة الأدوار (مثل "1,2,3") إلى مصفوفة: [1, 2, 3]
       $userRoleId = Auth::user()->role_id; 
       /* 
       يستخرج الدور الحالي للمستخدم من الجدول (غالبًا جدول users يحتوي على حقل role_id).
        هذا الدور سيتم مقارنته مع المصفوفة $roles.
       */

       if (!in_array($userRoleId, $roles)) {
        return back()->with('error', 'ليس لديك صلاحية الوصول');
       }
       /*
       يتحقق هل دور المستخدم من ضمن الأدوار المسموح بها.
        إذا لم يكن كذلك، يرجعه للصفحة السابقة (back())، ويعرض رسالة (وهنا يوجد ملاحظة 👇).
        */

       return $next($request);
   }
}
