<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use Illuminate\Support\Facades\Auth;
use App\Models\Agency;
class MyDestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::where('admin_id', Auth::id())->get();
        return view('admin.my_destinations.index', compact('destinations'));
    }

    public function create()
    {
    $agencies = Agency::all();
    return view('admin.my_destinations.create'  , compact('agencies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'best_time_to_visit' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('destinations', 'public');

        $destination = Destination::create([
            'name' => $request->name,
            'description' => $request->description,
            'best_time_to_visit' => $request->best_time_to_visit,
            'image' => $imagePath,
            'admin_id' => Auth::id(), // ربط الوجهة بالمشرف الحالي
        ]);

        if ($request->has('agencies')) {
            $destination->agencies()->sync($request->agencies);
        }

        return redirect()->route('admin.my_destinations.index')->with('success', 'تمت إضافة الوجهة بنجاح.');
    }

    public function edit($id)
    {
        $destination = Destination::where('admin_id', Auth::id())->findOrFail($id);
        $agencies = Agency::all();
        return view('admin.my_destinations.edit', compact('destination', 'agencies'));
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::where('admin_id', Auth::id())->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'best_time_to_visit' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('destinations', 'public');
            $destination->image = $imagePath;
        }

        $destination->update([
            'name' => $request->name,
            'description' => $request->description,
            'best_time_to_visit' => $request->best_time_to_visit,
        ]);

        $destination->save();

        if ($request->has('agencies')) {
            $destination->agencies()->sync($request->agencies);
        }

        return redirect()->route('admin.my_destinations.index')->with('success', 'تم تعديل الوجهة بنجاح.');
    }

    public function show(Destination $destination)
    {
        return view('admin.my_destinations.show', compact('destination'));
    }

    public function destroy($id)
    {
        $destination = Destination::where('admin_id', Auth::id())->findOrFail($id);
        $destination->delete();

        return redirect()->route('admin.my_destinations.index')->with('success', 'تم حذف الوجهة بنجاح.');
    }


}
