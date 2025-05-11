<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class TouristController extends Controller
{
    public function index() {
        $tourists = User::where('role_id', 3)->get(); // 3 تعني سائح في role_id
        return view('superadmin.tourists.index', compact('tourists'));
    }
    
    public function destroy($id) {
        User::where('id', $id)->where('role_id', 3)->delete(); // حذف السائح بناءً على role_id
        return redirect()->route('superadmin.tourists.index')->with('error', 'تم حذف السائح بنجاح');
    }
}
