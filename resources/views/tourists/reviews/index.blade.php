@extends('layouts.app')

@section('title', 'التقييمات')

@section('content')
<div class="reviews-container">
    <h2>تقييمات الوجهة السياحية: {{ $destination->name }}</h2>

    @if($destination->reviews->count() > 0)
        <div class="reviews-list">
            @foreach($destination->reviews as $review)
                <div class="review-card">
                    <p><strong>{{ $review->user->name }}</strong>: ⭐{{ $review->rating }}</p>
                    <p>{{ $review->comment }}</p>
                    <a href="{{ route('reviews.show', $review->id) }}" class="view-btn">عرض التقييم</a>
                </div>
            @endforeach
        </div>
    @else
        <p>لم يتم إضافة أي تقييمات لهذه الوجهة بعد.</p>
    @endif

    <a href="{{ route('reviews.create', $destination->id) }}" class="add-review-btn">أضف تقييمك</a>
</div>
@endsection