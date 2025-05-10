@extends('layouts.app')

@section('title', 'تعديل التقييم')

@section('content')
<section style="padding: 40px 20px; background: #f3f4f6; min-height: 100vh;">
    <div style="max-width: 600px; margin: auto;">

        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
            <h2 style="font-size: 24px; margin-bottom: 20px; color: #333;">تعديل التقييم</h2>

            <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- الوجهة --}}
                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold;">الوجهة</label>
                    <input type="text" value="{{ $review->destination->name }}" disabled style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; background-color: #f9f9f9;">
                </div>

                {{-- نص التقييم --}}
                <div style="margin-bottom: 20px;">
                    <label for="comment" style="display: block; margin-bottom: 8px; font-weight: bold;">نص التقييم</label>
                    <textarea name="comment" id="comment" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">{{ old('comment', $review->comment) }}</textarea>
                    @error('comment')
                        <p style="color: red; font-size: 14px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- تقييم النجوم --}}
                <div style="margin-bottom: 20px;">
                    <label for="rating" style="display: block; margin-bottom: 8px; font-weight: bold;">التقييم بالنجوم</label>
                    <select name="rating" id="rating" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px;">
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" {{ $review->rating == $i ? 'selected' : '' }}>{{ $i }} نجوم</option>
                        @endfor
                    </select>
                    @error('rating')
                        <p style="color: red; font-size: 14px;">{{ $message }}</p>
                    @enderror
                </div>

                {{-- الأزرار --}}
                <div style="display: flex; justify-content: space-between; margin-top: 30px;">
                    <button type="submit" style="background: #28a745; color: white; padding: 10px 20px; border-radius: 6px; border: none;">حفظ التغييرات</button>
                    <a href="{{ route('tourists.profile.show') }}" style="background: #6c757d; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none;">رجوع</a>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection
