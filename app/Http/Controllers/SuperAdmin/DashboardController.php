<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use \App\Models\Agency;
use \App\Models\Destination;
use App\Models\Review;

class DashboardController extends Controller
{
    public function index()
    {
        
        return view('superadmin.dashboard', [
            'destinationsCount' => Destination::count(),
            'agenciesCount' =>Agency ::count(),
            'reviewsCount' =>Review ::count(),
            'adminsCount' => User::where('role_id', 2)->count(),
            'touristsCount' => User::where('role_id', 3)->count(),
        ]);

    }
}
