<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function showSignupForm()
    {
        return view('auth.signup');
    }

    public function register(Request $request) {
        $user = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email|max:100',
            'password' => 'required|string'
        ]);
        if(User::where('email',$request->email)->first()) {
            return back()->withErrors("The User With Email : ( $request->email ) is Already Registerd");
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        // return response()->json([
        //     'message' => 'User Registered Succssfully.',
        //     'User' => $user
        // ], 201);
        return redirect('/login')->with('success', 'User Registered Succssfully.');
    }
}
