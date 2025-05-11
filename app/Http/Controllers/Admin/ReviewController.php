<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $adminId = Auth::id();

        // استرجاع التقييمات المرتبطة بوجهات هذا المشرف فقط
        $reviews = Review::whereHas('destination', function ($query) use ($adminId) {
            $query->where('admin_id', $adminId);
        })->with(['user', 'destination'])->latest()->get();

        return view('admin.reviews.index', compact('reviews'));
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return redirect()->route('admin.reviews.index')->with('error', 'تم حذف التقييم بنجاح');
    }
}
