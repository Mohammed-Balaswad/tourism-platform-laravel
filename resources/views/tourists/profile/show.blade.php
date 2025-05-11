@extends('layouts.app')

@section('title', 'حسابي')

@section('content')

<section style="padding: 40px 20px; background: #f3f4f6; min-height: 100vh;">

   

    <div style="max-width: 600px; margin: auto; display: flex; flex-direction: column; gap: 30px;">
 @if (session('success'))
    <div class="alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
    <div class="alert-error">{{ session('error') }}</div>
    @endif
        {{-- معلومات الحساب --}}
        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
            <h2 style="font-size: 24px; margin-bottom: 20px; color: #333;">معلومات الحساب</h2>

            <div style="margin-bottom: 25px;">
                <strong>الاسم:</strong>
                <p style="margin: 5px 0 0; color: #555;">{{ $user->name }}</p>
            </div>

            <div style="margin-bottom: 25px;">
                <strong>البريد الإلكتروني:</strong>
                <p style="margin: 5px 0 0; color: #555;">{{ $user->email }}</p>
            </div>

            <div style="display: flex; justify-content: space-between; margin-top: 30px;">
                <a href="{{ route('tourists.profile.edit') }}" style="background: #007bff; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none;">تعديل المعلومات</a>
                <a href="{{ route('explore') }}" style="background: #6c757d; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none;">العودة للقائمة الرئيسية</a>
            </div>
        </div>

        {{-- كارد التقييمات --}}
        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
        <h2 style="font-size: 24px; margin-bottom: 20px; color: #333;">تقييماتي</h2>

            @forelse ($user->reviews as $review)
    <div style="border-bottom: 1px solid #eee; padding: 10px 0;">
        <p style="margin-bottom: 15px; margin-top: 0px; color: #000000;"><strong>الوجهة: </strong> {{ $review->destination->name }}</p>
        <p style="margin-bottom: 15px; color: #000000;"><strong>التقييم: </strong>{{ $review->comment }}</p>

        {{-- عرض النجوم بأيقونات --}}
        <p style="margin: 5px 0; color: #000000;">
            <strong>عدد النجوم: </strong>
            @for ($i = 1; $i <= 5; $i++)
                @if ($i <= $review->rating)
                    <i class="fas fa-star" style="color: #ffc107;"></i>
                @else
                    <i class="far fa-star" style="color: #ccc;"></i>
                @endif
            @endfor
        </p>

        <div style="display: flex; gap: 10px; margin-top: 5px;">
            <a href="{{ route('reviews.edit', $review->id) }}" style="background: #007bff; color: white; padding: 3px 25px; margin-top: 30px; border-radius: 6px; text-decoration: none; border: none;">تعديل</a>
            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف التقييم؟');">
                @csrf
                @method('DELETE')
                <button type="submit" style="background: #dc3545; color: white; padding: 5px 25px; margin-top: 30px; border-radius: 6px; text-decoration: none; border: none;">حذف</button>
            </form>
        </div>
    </div>
@empty
    <p style="color: #777;">لا توجد تقييمات حالياً.</p>
@endforelse

        </div>

    </div>
</section>
@endsection
