<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);
        
            if (Auth::attempt($request->only('email', 'password'))) {
                $user = Auth::user();
                /*
                Auth::attempt(...):
                هذه الدالة تحاول تسجيل دخول المستخدم باستخدام البريد الإلكتروني وكلمة المرور المرسلة من النموذج.
                            
                 إذا كانت بيانات الاعتماد صحيحة وتم تسجيل الدخول، true  ترجع attempt()
                إذا لم تكن كذلك.  false أو
                            
               من الريكوست وأرسلها لمحاولة التحقق "email" و"password" يعني: خذ فقط القيمتين $request->only('email', 'password')
                            
                Auth::user():
                $user فهنا يتم الحصول على المستخدم الحالي المسجّل دخوله وتخزينه في المتغير . (true أعادت attempt اي)،إذا تم تسجيل الدخول بنجاح 
                */
        
                switch ($user->role_id) {
                    case 1: // سوبر مشرف
                        return redirect()->route('superadmin.dashboard')->with('welcome', 'مرحبًا بك، سوبر مشرف!');
                    case 2: // مشرف
                        return redirect()->route('admin.dashboard')->with('welcome', 'مرحبًا بك، مشرف!');
                    case 3: // سائح
                    default:
                        return redirect()->route('explore')->with('welcome', 'مرحبًا بك');
                }
            }
        
            return redirect()->route('login.show')->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة.');
        
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'تم تسجيل الخروج بنجاح!');
    }
}
