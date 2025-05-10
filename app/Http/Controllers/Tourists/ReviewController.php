<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Destination $destination)
    {
        $reviews = $destination->reviews;
        return view('tourists.reviews.index', compact('destination', 'reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Destination $destination)
    {
        return view('tourists.reviews.create', compact('destination'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Destination $destination)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'destination_id' => $destination->id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('explore.destinations.show', $destination->id)->with('success', 'تمت إضافة التقييم بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        // التأكد من أن المستخدم هو صاحب التقييم
        if ($review->user_id !== Auth::id()) {
            return redirect()->route('reviews.index', $review->destination_id)->with('error', 'ليس لديك صلاحية لتعديل هذا التقييم.');
        }

        return view('tourists.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        // التأكد من أن المستخدم هو صاحب التقييم
        if ($review->user_id !== Auth::id()) {
            return redirect()->route('reviews.index', $review->destination_id)->with('error', 'ليس لديك صلاحية لتعديل هذا التقييم.');
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
        ]);

        $review->update([
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('tourists.profile.show', $review->destination_id)->with('success', 'تم تعديل التقييم بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        // التأكد من أن المستخدم هو صاحب التقييم
        if ($review->user_id !== Auth::id()) {
            return redirect()->route('reviews.index', $review->destination_id)->with('error', 'ليس لديك صلاحية لحذف هذا التقييم.');
        }

        $review->delete();
        return redirect()->route('tourists.profile.show', $review->destination_id)->with('success', 'تم حذف التقييم بنجاح!');
    }
}
