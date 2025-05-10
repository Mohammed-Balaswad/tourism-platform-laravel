<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>بوابتك السياحية</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Cairo', sans-serif;
        }

        body {
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
            direction: rtl;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }


        .login-box {
            background-color: #ffffff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            width: 500px;
         
        }

        .login-box h2 {
            margin-bottom: 25px;
            font-size: 26px;
            font-weight: 700;
            text-align: center;
            color: #333;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            text-align: right;
            transition: 0.2s ease;
        }

        .input-group input:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 4px rgba(0,123,255,0.25);
        }
        .input-group label {
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
    color: #333;
    font-size: 15px;
    text-align: right;
}


        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #007bff, #0056d2);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .btn-login:hover {
            opacity: 0.95;
        }

        .login-box p {
            text-align: center;
            margin-top: 20px;
            font-size: 15px;
        }

        .login-box p a {
            color: #007bff;
            text-decoration: none;
        }

        .login-box p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
