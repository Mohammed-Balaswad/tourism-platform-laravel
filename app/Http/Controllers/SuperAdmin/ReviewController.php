<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'destination'])->latest()->get();
        return view('superadmin.reviews.index', compact('reviews'));
    }

    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return redirect()->route('superadmin.reviews.index')->with('success', 'تم حذف التقييم بنجاح');
    }
}
