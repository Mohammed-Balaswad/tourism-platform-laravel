@extends('layouts.admin')

@section('title', 'إضافة وجهة سياحية')

@section('content')
<div class="main-content">
    <h2 class="page-title">إضافة وجهة سياحية جديدة</h2>
    <form action="{{ route('admin.my_destinations.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
        @csrf

        <div class="form-group">
            <label for="name">اسم الوجهة:</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="أدخل اسم الوجهة" required>
        </div>

        <div class="form-group">
            <label for="description">الوصف:</label>
            <textarea name="description" id="description" class="form-control" placeholder="أدخل الوصف" required></textarea>
        </div>

        <div class="form-group">
            <label for="best_time_to_visit">أفضل وقت للزيارة:</label>
            <input type="text" name="best_time_to_visit" id="best_time_to_visit" class="form-control" placeholder="أدخل أفضل وقت للزيارة" required>
        </div>

        <div class="form-group">
            <label for="agencies">اختر وكالة/وكالات (اختياري):</label>
            <select name="agencies[]" id="agencies" multiple class="form-control">
                @foreach($agencies as $agency)
                    <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">صورة الوجهة:</label>
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
