@extends('layouts.superadmin')

@section('content')
    <div style="max-width: 600px; margin: auto;">
        <h2 style="margin-bottom: 20px; color: #0d47a1;">تعديل بيانات المشرف</h2>

        <form method="POST" action="{{ route('superadmin.admins.update', $admin->id) }}" style="background: #f9f9f9; padding: 25px; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
            @csrf
            @method('PUT')

            <label for="name" style="font-weight: bold;">الاسم:</label>
            <input type="text" name="name" id="name" value="{{ $admin->name }}" required class="form-control" style="margin-bottom: 15px;">

            <label for="email" style="font-weight: bold;">البريد الإلكتروني:</label>
            <input type="email" name="email" id="email" value="{{ $admin->email }}" required class="form-control" style="margin-bottom: 15px;">

            <label for="password" style="font-weight: bold;">كلمة المرور (اتركها فارغة إن لم ترد التغيير):</label>
            <input type="password" name="password" id="password" class="form-control" style="margin-bottom: 15px;">

            <label for="password_confirmation" style="font-weight: bold;">تأكيد كلمة المرور:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" style="margin-bottom: 20px;">

            <button type="submit" style="background-color: #0d47a1; color: white; padding: 10px 20px; border: none; border-radius: 6px; font-size: 15px;">
                تحديث البيانات
            </button>
        </form>
    </div>
@endsection
