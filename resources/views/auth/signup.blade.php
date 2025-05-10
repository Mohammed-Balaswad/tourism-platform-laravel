@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f4f6f9;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 90vh;
    }


    .login-box h2 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 24px;
        color: #222;
    }

    .input-group {
        margin-bottom: 20px;
    }

    .input-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #333;
        font-size: 15px;
        text-align: right;
    }

    .input-group input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 15px;
        text-align: right;
        background-color: #fefefe;
        transition: border-color 0.2s ease-in-out;
    }

    .input-group input:focus {
        border-color: #007bff;
        outline: none;
    }

    .btn-login {
        width: 100%;
        background: linear-gradient(to right, #007bff, #0056b3);
        color: white;
        padding: 14px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    .btn-login:hover {
        background: linear-gradient(to right, #0056b3, #003f7f);
    }

    .login-box p {
        text-align: center;
        margin-top: 20px;
        font-size: 14px;
        color: #444;
    }

    .login-box a {
        color: #007bff;
        text-decoration: none;
    }

    .login-box a:hover {
        text-decoration: underline;
    }
</style>

<div class="login-container">
    <div class="login-box">
        <h2>إنشاء حساب جديد</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="input-group">
                <label for="name">الاسم الكامل</label>
                <input type="text" name="name" id="name" placeholder="محمد صالح بالسود "required>
            </div>

            <div class="input-group">
                <label for="email">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" placeholder="example@gmail.com" required>
            </div>

            <div class="input-group">
                <label for="password">كلمة المرور</label>
                <input type="password" name="password" id="password" placeholder="********" required>
            </div>

            <div class="input-group">
                <label for="password_confirmation">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="********" required>
            </div>

            <button type="submit" class="btn-login">تسجيل</button>
        </form>
        <p>لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a></p>
    </div>
</div>
@endsection
