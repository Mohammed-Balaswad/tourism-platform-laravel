@extends('layouts.app')

@section('title', 'تفاصيل التقييم')

@section('content')
<div class="review-details">
    <h2>تفاصيل التقييم</h2>

    <p><strong>الوجهة السياحية:</strong> {{ $review->destination->name }}</p>
    <p><strong>المستخدم:</strong> {{ $review->user->name }}</p>
    <p><strong>التقييم:</strong> ⭐{{ $review->rating }}</p>
    <p><strong>التعليق:</strong> {{ $review->comment }}</p>

    @if(Auth::id() == $review->user_id)
        <a href="{{ route('reviews.edit', $review->id) }}" class="edit-btn">تعديل التقييم</a>
        <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-btn">حذف التقييم</button>
        </form>
    @endif
</div>
@endsection