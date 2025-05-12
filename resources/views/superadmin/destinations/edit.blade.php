@extends('layouts.superadmin')

@section('title', 'تعديل الوجهة السياحية')

@section('content')
<div class="edit-destination-container" style="max-width: 600px; margin: auto;">
    <h2 style="margin-bottom: 20px;">تعديل الوجهة السياحية: {{ $destination->name }}</h2>

    <form action="{{ route('superadmin.destinations.update', $destination->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">اسم الوجهة:</label>
        <input type="text" name="name" id="name" value="{{ $destination->name }}" required class="form-control" style="margin-bottom: 15px;">

        <label for="description">الوصف:</label>
        <textarea name="description" id="description" required class="form-control" style="margin-bottom: 15px;">{{ $destination->description }}</textarea>

        <label for="best_time_to_visit">أفضل وقت للزيارة:</label>
        <input type="text" name="best_time_to_visit" id="best_time_to_visit" value="{{ $destination->best_time_to_visit }}" required class="form-control" style="margin-bottom: 15px;">

        
        @if(isset($agencies) && $agencies->count())
    <label for="agencies">اختر وكالة/وكالات:</label>
    <select name="agencies[]" id="agencies" multiple class="form-control" style="margin-bottom: 20px;">
        @foreach($agencies as $agency)
            <option value="{{ $agency->id }}" {{ in_array($agency->id, $destination->agencies->pluck('id')->toArray()) ? 'selected' : '' }}>
                {{ $agency->name }}
            </option>
        @endforeach
    </select>
@endif

@if(isset($admins) && $admins->count())
    <label for="admin_id">إسناد لمشرف :</label>
    <select name="admin_id" id="admin_id" class="form-control" style="margin-bottom: 20px;">
        <option value="">-- بدون تغيير --</option>
        @foreach($admins as $admin)
            <option value="{{ $admin->id }}" {{ $destination->admin_id == $admin->id ? 'selected' : '' }}>
                {{ $admin->name }}
            </option>
        @endforeach
    </select>
@endif
        @if($destination->image)
            <div style="margin: 15px 0;">
                <p>الصورة الحالية:</p>
                <img src="{{ asset('storage/' . $destination->image) }}" alt="صورة الوجهة" style="max-width: 100%; border: 1px solid #ccc;">
            </div>
        @endif
        

        <label for="image">تغيير الصورة:</label>
        <input type="file" name="image" id="image" class="form-control" style="margin-bottom: 15px;">


        <button type="submit" class="update-btn" style="background: #0d47a1; color: white; padding: 10px 20px; border: none; border-radius: 5px;">
            تحديث البيانات
        </button>
    </form>
</div>
@endsection
