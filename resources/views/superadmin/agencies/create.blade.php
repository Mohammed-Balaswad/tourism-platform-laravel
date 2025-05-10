@extends('layouts.superadmin')

@section('title', 'إضافة وكالة جديدة')

@section('content')
<style>
    .form-container {
        background: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin-top: 20px;
        max-width: 700px;
    }

    .form-container h2 {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 6px;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .btn-submit {
        background-color: #3498db;
        color: white;
        padding: 10px 18px;
        border: none;
        border-radius: 6px;
        font-size: 15px;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #2980b9;
    }
</style>

<div class="form-container">
    <h2>إضافة وكالة جديدة</h2>

    <form action="{{ route('superadmin.agencies.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">اسم الوكالة:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="website">الموقع الإلكتروني (اختياري):</label>
            <input type="url" name="website" id="website" class="form-control">
        </div>

        <div class="form-group">
            <label for="contact_info">معلومات الاتصال:</label>
            <textarea name="contact_info" id="contact_info" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="admin_id">اختيار المشرف المسؤول (اختياري):</label>
            <select name="admin_id" id="admin_id" class="form-control">
                <option value="">-- بدون تحديد --</option>
                @foreach ($admins as $admin)
                    <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-submit">حفظ الوكالة</button>
    </form>
</div>
@endsection
