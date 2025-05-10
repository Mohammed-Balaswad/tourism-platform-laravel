<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Review;
use App\Models\Agency;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $adminId = Auth::id();
    
        $myDestinationsCount = Destination::where('admin_id', $adminId)->count();
        $totalDestinationsCount = Destination::count();
        $agenciesCount = Agency::whereHas('destinations', function ($query) use ($adminId) {
            $query->where('admin_id', $adminId);
        })->count();
        $reviewsCount = Review::whereHas('destination', function ($query) use ($adminId) {
            $query->where('admin_id', $adminId);
        })->count();
    
        return view('admin.dashboard', compact('myDestinationsCount', 'totalDestinationsCount', 'reviewsCount'  , 'agenciesCount'));
    }
    
}
