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
        
                switch ($user->role_id) {
                    case 1: // سوبر مشرف
                        return redirect()->route('superadmin.dashboard')->with('success', 'مرحبًا بك، سوبر مشرف!');
                    case 2: // مشرف
                        return redirect()->route('admin.dashboard')->with('success', 'مرحبًا بك، مشرف!');
                    case 3: // سائح
                    default:
                        return redirect()->route('explore')->with('success', 'مرحبًا بك');
                }
            }
        
            return redirect()->route('login.show')->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة.');
        
        


        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required|string|min:6',
        // ]);

        // if (Auth::attempt($request->only('email', 'password'))) {
        //     return redirect('/dashboard')->with('success', 'تم تسجيل الدخول بنجاح!');
        // }

        // return redirect()->route('login.show')->with('error', 'البريد الإلكتروني أو كلمة المرور غير صحيحة.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'تم تسجيل الخروج بنجاح!');
    }
}
