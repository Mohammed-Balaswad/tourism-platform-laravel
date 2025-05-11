<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Agency;


class DestinationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinations = Destination::all();
        return view('superadmin.destinations.index', compact('destinations'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('superadmin.destinations.create');
    // }

    public function create()
{
    $admins = User::where('role_id', 2)->get(); // جلب المشرفين فقط
    $agencies = Agency::all(); // جديد
    return view('superadmin.destinations.create', compact('admins' , 'agencies'));
}

    /**
     * Store a newly created resource in storage.
     */
//     public function store(Request $request)
// {
//     $request->validate([
//         'name' => 'required|string|max:255',
//         'description' => 'required|string',
//         'best_time_to_visit' => 'required|string',
//         'booking_link' => 'required|url',
//         'image' => 'required|image|mimes:jpg,jpeg,png'
//     ]);

//     $path = $request->file('image')->store('destinations', 'public');

//     Destination::create([
//         'name' => $request->name,
//         'description' => $request->description,
//         'best_time_to_visit' => $request->best_time_to_visit,
//         'booking_link' => $request->booking_link,
//         'image' => $path
//     ]);

//     return redirect()->route('superadmin.destinations.index')->with('success', 'تمت إضافة الوجهة بنجاح!');
// }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'best_time_to_visit' => 'nullable|string',
        'booking_link' => 'nullable|url',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'agencies' => 'nullable|array',
        'agencies.*' => 'exists:agencies,id',
        'admin_id' => 'nullable|exists:users,id',
    ]);

    $imagePath = $request->hasFile('image')
        ? $request->file('image')->store('destinations', 'public')
        : null;

    $destination = Destination::create([
        'name' => $request->name,
        'description' => $request->description,
        'best_time_to_visit' => $request->best_time_to_visit,
        'booking_link' => $request->booking_link,
        'image' => $imagePath,
        'admin_id' => $request->admin_id,
    ]);

    // ربط الوكالات
    if ($request->has('agencies')) {
        $destination->agencies()->attach($request->agencies);
    }

    return redirect()->route('superadmin.destinations.index')->with('success', 'تمت إضافة الوجهة بنجاح!');
}


    

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        return view('superadmin.destinations.show', compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        $admins = User::where('role_id', 2)->get();
        $agencies = Agency::all(); // جلب الوكالات
    
        return view('superadmin.destinations.edit', compact('destination', 'admins', 'agencies'));
    }
    
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'best_time_to_visit' => 'nullable|string',
        'booking_link' => 'nullable|url',
        'admin_id' => 'nullable|exists:users,id', // إسناد مشرف اختياري
    ]);
    


    // تجهيز البيانات المحدثة
    $data = [
        'name' => $request->name,
        'description' => $request->description,
        'best_time_to_visit' => $request->best_time_to_visit,
        'booking_link' => $request->booking_link,
    ];

    // تحديث الصورة إذا تم رفع واحدة جديدة
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('destinations', 'public');
    }
    

    // إسناد المشرف إن وُجد في الطلب (سوبر أدمن)
    if ($request->filled('admin_id')) {
        $data['admin_id'] = $request->admin_id;
    }

    $destination->update($data);
    $destination->agencies()->sync($request->input('agencies', []));

    return redirect()->route('superadmin.destinations.index')->with('success', 'تم تعديل الوجهة بنجاح!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();
        return redirect()->route('superadmin.destinations.index')->with('error', 'تم حذف الوجهة بنجاح!');
    }
}
