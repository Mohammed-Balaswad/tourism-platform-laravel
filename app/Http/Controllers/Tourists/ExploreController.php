<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\Agency;
use \App\Models\Destination;
use App\Models\Review;
class ExploreController extends Controller
{
    public function index()
{
    $destinations = Destination::latest()->get();
    $reviews = Review::with('user', 'destination')->latest()->take(4)->get();
    $agencies = Agency::latest()->get();

    return view('tourists.explore', compact('destinations', 'reviews', 'agencies'));
}

public function show(Destination $destination)
{
    return view('tourists.destinations.show', compact('destination'));
}

}
