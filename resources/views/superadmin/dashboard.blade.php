@extends('layouts.superadmin')

@section('content')

@if (session('error'))
<div class="alert-error" style="margin: 0px">{{ session('error') }}</div>
@endif

    <h1 style="margin-bottom: 20px; color: #0d47a1;">لوحة التحكم</h1>
    <div class="dashboard-cards">
        <!-- Card for Destinations -->
        <div class="dashboard-card">
            <div class="card-icon" >
                <i class="fa-solid fa-map-location-dot fa-3x" style="color: rgb(0, 119, 166)"></i>
            </div>
            <h3>عدد الوجهات</h3>
            <p>{{ $destinationsCount }}</p>
        </div>

        <!-- Card for Agencies -->
        <div class="dashboard-card">
            <div class="card-icon" >
                <i class="fa-solid fa-building fa-3x"style="color: darkorange"></i>
            </div>
            <h3>عدد الوكالات</h3>
            <p>{{ $agenciesCount }}</p>
        </div>

        <!-- Card for Admins -->
        <div class="dashboard-card">
            <div class="card-icon" >
                <i class="fa-solid fa-user-tie fa-3x" style="color: darkblue"></i>
            </div>
            <h3>عدد المشرفين</h3>
            <p>{{ $adminsCount }}</p>
        </div>

        <!-- Card for Tourists -->
        <div class="dashboard-card">
            <div class="card-icon">
                <i class="fa-solid fa-users fa-3x" style="color: green"></i>
            </div>
            <h3>عدد السياح</h3>
            <p>{{ $touristsCount }}</p>
        </div>
        <div class="dashboard-card">
            <div class="card-icon" >
                <i class="fa-solid fa-star-half-stroke fa-3x" style="color: rgb(212, 212, 0)"></i>
            </div>
            <h5>عدد التقييمات </h5>
            <p>{{ $reviewsCount }}</p>
        </div>
    </div>
@endsection

@section('style')
    <style>
        /* Styles for the stats section */
       
        
        
    </style>
@endsection
