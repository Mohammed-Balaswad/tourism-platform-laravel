@extends('layouts.superadmin')

@section('title', 'إضافة مشرف جديد')

@section('content')
<div class="add-admin-container" style="max-width: 600px; margin: auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; margin-bottom: 30px; color: #0d47a1;">إضافة مشرف جديد</h2>

    <form method="POST" action="{{ route('superadmin.admins.store') }}">
        @csrf

        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; font-weight: bold; margin-bottom: 5px;">الاسم:</label>
            <input type="text" name="name" id="name" required class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="email" style="display: block; font-weight: bold; margin-bottom: 5px;">البريد الإلكتروني:</label>
            <input type="email" name="email" id="email" required class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="password" style="display: block; font-weight: bold; margin-bottom: 5px;">كلمة المرور:</label>
            <input type="password" name="password" id="password" required class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        </div>

        <div style="margin-bottom: 30px;">
            <label for="password_confirmation" style="display: block; font-weight: bold; margin-bottom: 5px;">تأكيد كلمة المرور:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required class="form-control" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;">
        </div>

        <button type="submit" class="btn btn-primary" style="background: #0d47a1; color: white; padding: 12px 25px; border: none; border-radius: 6px; font-weight: bold; width: 100%;">
            <i class="fa-solid fa-user-plus"></i> إضافة المشرف
        </button>
    </form>
</div>
@endsection
