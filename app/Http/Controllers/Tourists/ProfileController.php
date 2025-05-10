<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('tourists.profile.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('tourists.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\User $user */

        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->route('tourists.profile.show')->with('success', 'تم تحديث المعلومات بنجاح');
    }
}
