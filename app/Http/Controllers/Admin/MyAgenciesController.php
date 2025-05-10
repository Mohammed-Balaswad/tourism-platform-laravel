<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Agency;

class MyAgenciesController extends Controller
{
    public function index()
    {
        $admin = Auth::user();

        // جلب جميع الوكالات المرتبطة بوجهات هذا المشرف
        $agencies = Agency::whereHas('destinations', function ($query) use ($admin) {
            $query->where('admin_id', $admin->id);
        })->distinct()->get();

        return view('admin.my_agencies.index', compact('agencies'));
        
    }
}
