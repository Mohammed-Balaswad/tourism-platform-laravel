@extends('layouts.superadmin') <!-- استخدام التخطيط الخاص بالسوبر أدمين -->

@section('title', 'إضافة وجهة سياحية')

@section('content')
<div class="main-content">
    <h2 class="page-title">إضافة وجهة سياحية جديدة</h2>
    <form action="{{ route('superadmin.destinations.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf

        <div class="form-group">
            <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">اسم الوجهة:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="أدخل اسم الوجهة" required>
        </div>

        <div class="form-group">
            <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">الوصف:</label>
            <textarea name="description" id="description" class="form-control" placeholder="أدخل الوصف" required></textarea>
        </div>

        <div class="form-group">
            <label for="best_time_to_visit" style="display: block; font-weight: bold; margin-bottom: 5px;">أفضل وقت للزيارة:</label>
            <input type="text" name="best_time_to_visit" id="best_time_to_visit" class="form-control" placeholder="أدخل أفضل وقت للزيارة" required>
        </div>

        <label for="agencies" style="display: block; font-weight: bold; margin-bottom: 5px;">اختر وكالة/وكالات:</label>
        <select name="agencies[]" id="agencies" multiple class="form-control" style="margin-bottom: 20px;">
            @foreach($agencies as $agency)
        <option value="{{ $agency->id }}"
                @if(isset($destination) && in_array($agency->id, $destination->agencies->pluck('id')->toArray()))
                    selected
                @endif>
        {{ $agency->name }}
        </option>
    
            {{ $agency->name }}
        </option>
    @endforeach
</select>


        @if($admins->count())
        <div class="form-group">
            <label for="admin_id" style="display: block; font-weight: bold; margin-bottom: 5px ;">إسناد الوجهة إلى مشرف :</label>
            <select name="admin_id" id="admin_id" class="form-control">
                <option value="">-- بدون إسناد --</option>
                @foreach($admins as $admin)
                    <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                @endforeach
            </select>
        </div>
    @endif
    

        

        <div class="form-group">
            <label for="image" style="display: block; font-weight: bold; margin-bottom: 5px;">صورة الوجهة:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-submit">إضافة الوجهة</button>
    </form>
    
</div>
@endsection

@section('styles')
<style>
    .page-title {
        font-size: 24px;
        color: #0d47a1;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .form-container {
        background-color: #ffffff;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        max-width: 800px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        font-size: 16px;
        color: #333;
        margin-bottom: 8px;
        display: block;
    }

    .form-control {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
        color: #333;
        box-sizing: border-box;
    }

    .form-control:focus {
        border-color: #0d47a1;
        outline: none;
        box-shadow: 0 0 5px rgba(13, 71, 161, 0.2);
    }

    .btn-submit {
        display: inline-block;
        background-color: #0d47a1;
        color: white;
        font-size: 16px;
        padding: 12px 24px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s ease;
        width: 100%;
    }

    .btn-submit:hover {
        background-color: #1565c0;
    }
</style>
@endsection
