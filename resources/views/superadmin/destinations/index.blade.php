@extends('layouts.superadmin') <!-- استخدام التخطيط الخاص بالسوبر أدمين -->

@section('title', 'الوجهات السياحية')

@section('content')
<div class="main-content">
    <h1>إدارة الوجهات السياحية</h1>
    <a href="{{ route('superadmin.destinations.create') }}"   style="display:inline-block;margin-bottom:15px;background:#0d47a1;color:white;padding:8px 16px;border-radius:5px;text-decoration:none;">إضافة وجهة جديدة</a>
    
    @if (session('success'))
    <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
    <div class="alert-error">{{ session('error') }}</div>
    @endif

    <div class="destinations-grid">
        @foreach($destinations as $destination)
            <div class="destination-card">
                <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}" width="150">
                <h3>{{ $destination->name }}</h3>
                <p>{{ Str::limit($destination->description, 100) }}</p>
                <a href="{{ route('superadmin.destinations.show', $destination->id) }}" class="btn btn-info">عرض التفاصيل</a>
                <a href="{{ route('superadmin.destinations.edit', $destination->id) }}" class="btn btn-warning">تعديل</a>
                <form action="{{ route('superadmin.destinations.destroy', $destination->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('هل أنت متأكد من حذف هذه الوجهة؟');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
                
            </div>
        @endforeach
    </div>
</div>
@endsection





{{-- @extends('layouts.app')

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

@section('content')
<h1>مرحبًا بك في وجهات السياحة</h1>
@endsection --}}
