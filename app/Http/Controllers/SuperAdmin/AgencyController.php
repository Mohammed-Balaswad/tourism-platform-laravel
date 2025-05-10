<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agency;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AgencyController extends Controller
{
    public function index()
    {
        // التحقق من كون المستخدم سوبر مشرف
        if (Auth::user()->role_id !== 1) {
            return redirect()->route('home')->with('error', 'ليس لديك صلاحية للوصول إلى هذه الصفحة');
        }

        // جلب جميع الوكالات
        $agencies = Agency::all();
        return view('superadmin.agencies.index', compact('agencies'));
    }
    // لإضافة وكالة جديدة
    public function create() 
    {
        $admins = User::where('role_id', 2)->get(); // 2 = مشرف
        return view('superadmin.agencies.create', compact('admins'));
    }
    

// لحفظ وكالة جديدة
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'website' => 'nullable|url',
        'contact_info' => 'required|string',
        'admin_id' => 'nullable|exists:users,id',
    ]);

    Agency::create($request->all());

    return redirect()->route('superadmin.agencies.index')->with('success', 'تم إضافة الوكالة بنجاح');
}

// لتعديل وكالة
// لعرض صفحة التعديل
public function edit($id)
{
    $agency = Agency::findOrFail($id);
    $admins = User::where('role_id', 2)->get(); // تأكد من أن المشرفين فقط هم الذين يظهرون
    return view('superadmin.agencies.edit', compact('agency', 'admins'));
}

// لتحديث الوكالة بعد التعديل
public function update(Request $request, $id)
{
    // جلب الوكالة
    $agency = Agency::findOrFail($id);
    
    // التحقق من صحة البيانات المدخلة
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'website' => 'nullable|url',
        'contact_info' => 'required|string',
        'admin_id' => 'nullable|exists:users,id', // التأكد من وجود المستخدم
    ]);
    
    // تحديث البيانات
    $agency->update($validated);
    
    return redirect()->route('superadmin.agencies.index')->with('success', 'تم تحديث الوكالة بنجاح');
}


// لحذف وكالة
public function destroy($id)
{
    $agency = Agency::findOrFail($id);
    $agency->delete();

    return redirect()->route('superadmin.agencies.index')->with('success', 'تم حذف الوكالة بنجاح');
}

}
