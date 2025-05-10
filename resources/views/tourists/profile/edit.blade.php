@extends('layouts.app')

@section('title', 'تعديل الحساب')

@section('content')
<div style="max-width: 600px; margin: auto; padding: 30px; background: #f8f8f8; border-radius: 12px; box-shadow: 0 0 10px rgba(0,0,0,0.05);">

    <h2 style="margin-bottom: 20px; color: #333;">تعديل معلومات الحساب</h2>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 8px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('tourists.profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">الاسم:</label>
        <input type="text" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required
               style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 6px; border: 1px solid #ccc;">

        <label for="email">البريد الإلكتروني:</label>
        <input type="email" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
               style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 6px; border: 1px solid #ccc;">

        <label for="password">كلمة المرور الجديدة (اختياري):</label>
        <input type="password" id="password" name="password"
               style="width: 100%; padding: 10px; margin-bottom: 15px; border-radius: 6px; border: 1px solid #ccc;">

        <label for="password_confirmation">تأكيد كلمة المرور:</label>
        <input type="password" id="password_confirmation" name="password_confirmation"
               style="width: 100%; padding: 10px; margin-bottom: 20px; border-radius: 6px; border: 1px solid #ccc;">

        <button type="submit" style="background-color: #3795fa; color: white; padding: 12px 20px; border: none; border-radius: 8px; font-size: 16px;">
            حفظ التعديلات
        </button>
    </form>
</div>
@endsection
