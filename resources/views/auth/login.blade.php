@extends('layouts.app')
@if (session('success'))
<div class="alert-success" style="text-align: center; color: rgb(255, 255, 255); font-weight: bold;  background-color: red; padding: 15px; font-size: larger;">{{ session('success') }}</div>
@endif

@section('content')
<div class="login-container">
    <div class="login-box">
        <h2>تسجيل الدخول</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="input-group">
                <label for="">البريد الإلكتروني</label>
                <input type="email" name="email" placeholder="example@gmail.com" required>
            </div>
            <div class="input-group">
                <label for="">كلمة المرور</label>
                <input type="password" name="password" placeholder="********" required>
            </div>

            <button type="submit" class="btn-login">دخول</button>
        </form>
        <p>ليس لديك حساب؟ <a href="{{ route('signup.show') }}">إنشاء حساب جديد</a></p>
    </div>
</div>
@endsection
