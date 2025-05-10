@extends('layouts.superadmin')

@section('title', $destination->name)

@section('content')
<div class="destination-details">
    <div class="destination-header">
        <h2 style="font-size: 44px">{{ $destination->name }}</h2>
        <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" >
    </div>

    <div class="destination-info">
        <p><strong>الوصف:</strong> {{ $destination->description }}</p>
        <p><strong>أفضل وقت للزيارة:</strong> {{ $destination->best_time_to_visit }}</p>
        <p><strong>المشرف:</strong>
            {{ $destination->admin ? $destination->admin->name : 'غير مُسند' }}
        </p>     
        <p><strong>الوكالات المرتبطة:</strong></p>
<ul>
@forelse($destination->agencies as $agency)
    <li style="font-size: 21px">
        {{ $agency->name }} 
    </li>
@empty
    <li>لا توجد وكالات مرتبطة.</li>
@endforelse
</ul>
   
        <p><a href="{{ $agency->website }}" target="_blank" class="booking-btn">احجز الآن</a></p>
    </div>

    <!-- ✅ عرض التقييمات الخاصة بالوجهة -->
    <div class="reviews-section">
        <h3>التقييمات</h3>
        @if($destination->reviews->count() > 0)
            @foreach($destination->reviews as $review)
                <div class="review-card">
                    <p><strong>{{ $review->user->name }}</strong>: ⭐{{ $review->rating }}</p>
                    <p>{{ $review->comment }}</p>
                </div>
            @endforeach
        @else
            <p>لا توجد تقييمات بعد لهذه الوجهة.</p>
        @endif
    {{-- </div>

    <!-- ✅ زر إضافة تقييم جديد -->
    <a href="{{ route('superadmin.reviews.index', $destination->id) }}" class="add-review-btn">أضف تقييمك</a>
</div> --}}
<style>
.destination-details {
    max-width: 1000px;
    margin: 30px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    font-family:Arial, Helvetica, sans-serifTahoma, Geneva, Verdana, sans-serif;
}



.destination-header img {
    width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    margin-top: 20px;
}

.destination-header h2 {
    font-size: 28px;
    color: #0d47a1;
    margin: 0;
    flex: 1;
}

.destination-info {
    font-size: 16px;
    line-height: 1.8;
    color: #333;
}

.destination-info strong {
    color: #0d47a1;
    font-size: 24px;
}
.destination-info p {

    font-size: 22px;
}

.booking-btn {
    display: inline-block;
    margin-top: 10px;
    background-color: #009688;
    color: white;
    padding: 10px 18px;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.booking-btn:hover {
    background-color: #00796b;
}

.reviews-section {
    margin-top: 40px;
}

.reviews-section h3 {
    font-size: 22px;
    color: #0d47a1;
    margin-bottom: 15px;
}

.review-card {
    background-color: #f7f9fc;
    border-left: 5px solid #0d47a1;
    padding: 15px 20px;
    border-radius: 8px;
    margin-bottom: 15px;
}

.review-card strong {
    color: #0d47a1;
}

.add-review-btn {
    display: inline-block;
    margin-top: 20px;
    background-color: #3f51b5;
    color: white;
    padding: 10px 18px;
    border-radius: 6px;
    text-decoration: none;
    transition: background-color 0.3s;
}

.add-review-btn:hover {
    background-color: #303f9f;
}

ul {
    padding-left: 20px;
    margin-top: 5px;
}

ul li {
    margin-bottom: 5px;
}

/* Responsive */
@media (max-width: 768px) {
    .destination-header {
        flex-direction: column;
        align-items: center;
    }

    .destination-header h2 {
        text-align: center;
    }
}
</style>

@endsection