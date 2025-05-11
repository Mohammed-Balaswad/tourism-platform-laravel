<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use \App\Models\Agency;
use \App\Models\Destination;
use App\Models\Review;

class AdminsController extends Controller
{

public function admins()
{
    $admins = User::where('role_id', 2)->get();

    return view('superadmin.admins.index', compact('admins'));
}

public function createAdmin()
{
    return view('superadmin.admins.create');
}

public function storeAdmin(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ]);

    $admin = new User();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->password = bcrypt($request->password);
    $admin->role_id = 2; // مشرف
    $admin->save();

    return redirect()->route('superadmin.admins')->with('success', 'تم إنشاء المشرف بنجاح.');
}


public function editAdmin($id)
{
    $admin = User::where('role_id', 2)->findOrFail($id);
    return view('superadmin.admins.edit', compact('admin'));
}

public function updateAdmin(Request $request, $id)
{
    $admin = User::where('role_id', 2)->findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $admin->id,
        'password' => 'nullable|min:6|confirmed',
    ]);

    $admin->name = $request->name;
    $admin->email = $request->email;
    if ($request->password) {
        $admin->password = bcrypt($request->password);
    }
    $admin->save();

    return redirect()->route('superadmin.admins')->with('success', 'تم تحديث المشرف بنجاح.');
}

public function destroyAdmin($id)
{
    $admin = User::findOrFail($id);

    // تحقق من أن المستخدم الذي سيتم حذفه ليس هو السوبر مشرف
    if ($admin->role_id == 1) {
        return redirect()->route('superadmin.admins')->with('error', 'لا يمكنك حذف السوبر مشرف.');
    }

    $admin->delete();

    return redirect()->route('superadmin.admins')->with('error', 'تم حذف المشرف بنجاح.');
}




}
