@extends('layouts.admin') <!-- استخدام التخطيط الخاص بالمشرف -->

@section('title', 'وجهاتي')

@section('content')
<div class="main-content">
    <h1>وجهاتي</h1>

    @if (session('success'))
    <div class="alert-success">{{ session('success') }}</div>
    @endif
    
    @if (session('error'))
    <div class="alert-error">{{ session('error') }}</div>
    @endif

    <a href="{{ route('admin.my_destinations.create') }}"
       style="display:inline-block; margin-bottom:15px; background:#0d47a1; color:white; padding:8px 16px; border-radius:5px; text-decoration:none;">
       + إضافة وجهة جديدة
    </a>

    <div class="destinations-grid">
        @forelse($destinations as $destination)
            <div class="destination-card">
                @if($destination->image)
                    <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" width="150">
                @else
                    <img src="{{ asset('images/default.jpg') }}" alt="صورة افتراضية" width="150">
                @endif

                <h3>{{ $destination->name }}</h3>
                <p>{{ Str::limit($destination->description, 100) }}</p>

                <a href="{{ route('admin.my_destinations.show', $destination->id) }}" class="btn btn-info">عرض التفاصيل</a>
                <a href="{{ route('admin.my_destinations.edit', $destination->id) }}" class="btn btn-warning">تعديل</a>
                <form action="{{ route('admin.my_destinations.destroy', $destination->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذه الوجهة؟');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        @empty
            <p>لا توجد وجهات مضافة بعد.</p>
        @endforelse
    </div>
</div>

@endsection
