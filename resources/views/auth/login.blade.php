@extends('layouts.app')

<style>
     .alert-error {
        text-align: center;
        background-color: red;
        padding: 10px;
        border-radius: 5px;
        color: rgb(255, 255, 255);
        margin-bottom: 15px;
        font-weight: bold;   
        }
</style>



@section('content')
<div class="login-container">
    
    <div class="login-box">
        @if (session('error'))
<div class="alert-error">{{ session('error') }}</div>
@endif
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
