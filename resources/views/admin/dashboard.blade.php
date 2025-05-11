@extends('layouts.admin')


@section('title', 'لوحة تحكم المشرف')

@section('content')
<h2 class="dashboard-title"> لوحة تحكم المشرف</h2>


<div class="dashboard-cards">
    <div class="dashboard-card">
        <div class="card-icon" >
                <i class="fa-solid fa-map-location-dot fa-3x" style="color: rgb(0, 119, 166)"></i>
            </div>
            
        <h5>عدد الوجهات الكلي</h5>
        <p>{{ $totalDestinationsCount }}</p>
    </div>
    <div class="dashboard-card">
        <div class="card-icon" >
            <i class="fa-solid fa-location-dot fa-3x" style="color: rgb(253, 59, 59)"></i>
        </div>
        <h5>وجهاتي</h5>
        <p>{{ $myDestinationsCount }}</p>
    </div>
    <div class="dashboard-card">
        <div class="card-icon" >
            <i class="fa-solid fa-building fa-3x"style="color: darkorange"></i>
        </div>
        <h3>عدد وكالات  وجهاتي</h3>
        <p>{{$agenciesCount}}</p>
    </div>
    <div class="dashboard-card">
        <div class="card-icon" >
            <i class="fa-solid fa-star-half-stroke fa-3x" style="color: rgb(212, 212, 0)"></i>
        </div>
        <h5>عدد تقييمات وجهاتي</h5>
        <p>{{ $reviewsCount }}</p>
    </div>
    
</div>
@endsection

@section('styles')
<style>
    .dashboard-title {
        font-size: 24px;
        color: #0d47a1;
        margin-bottom: 20px;
    }

    .dashboard-cards {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .dashboard-card {
        flex: 1;
        min-width: 200px;
        background-color: #f0f4f8;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        text-align: center;
    }

    .dashboard-card h5 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #333;
    }

    .dashboard-card p {
        font-size: 24px;
        font-weight: bold;
        color: #0d47a1;
    }
</style>
@endsection
