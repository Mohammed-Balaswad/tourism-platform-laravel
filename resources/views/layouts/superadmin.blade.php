<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>لوحة التحكم - سوبر مشرف</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Cairo', sans-serif;
            background: #f4f6f8;
            direction: rtl;
        }

        .sidebar {
            width: 220px;
            background-color: #0d47a1;
            color: white;
            position: fixed;
            height: 100vh;
            padding: 20px;
        }

        .sidebar h2 {
            font-size: 20px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            color: white;
            text-decoration: none;
            margin: 12px 0;
            transition: 0.3s;
            padding: 8px;
            border-radius: 6px;
            font-size: 15px;
        }

        .sidebar a i {
            margin-left: 10px;
            width: 20px;
            text-align: center;
        }

        .sidebar a:hover {
            background-color: #1565c0;
        }

        .main {
            margin-right: 240px;
            padding: 20px;
        }

        .header {
            background-color: white;
            padding: 15px 20px;
            border-bottom: 1px solid #ccc;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .header div {
            font-weight: bold;
            color: #333;
        }

        .header button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .header button:hover {
            background-color: #c82333;
        }

        .main-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);

        }
        .alert-success {
        background-color: #d4edda;
        padding: 10px;
        border-radius: 5px;
        color: #155724;
        margin-bottom: 15px;
        }

        /* .destinations-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .destination-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }

        .destination-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .destination-card h3 {
            font-size: 18px;
            color: #333;
        }

        .destination-card p {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        
        
        
        .destination-card .btn-danger {
            background-color: #dc3545;
            color: white;
            } */
            .destination-card .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            border: none;
            font-size: 14px;
        }

        .destination-card .btn-info {
            background-color: #007bff;
            color: white;
        }

        .destination-card .btn-warning {
            background-color: #ffc107;
            color: white;
        }

        .destination-card .btn-danger {
            background-color: #dc3545;
            color: white;
        }
         .page-title {
        text-align: center;
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
    /* .dashboard-title {
        font-size: 24px;
        color: #0d47a1;
        margin-bottom: 20px;
    }

    .dashboard-cards {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .dashboard-card {
        flex: 1;
        min-width: 200px;
        background-color: #f0f4f8;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        text-align: center;
    }

    .dashboard-card h5 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #333;
    }

    .dashboard-card p {
        font-size: 24px;
        font-weight: bold;
        color: #0d47a1;
    } */
    .dashboard-title {
        font-size: 24px;
        color: #0d47a1;
        margin-bottom: 20px;
    }

    .dashboard-cards {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .dashboard-card {
        flex: 1;
        min-width: 200px;
        background-color: #f0f4f8;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        text-align: center;
    }

    .dashboard-card h5 {
        font-size: 18px;
        margin-bottom: 10px;
        color: #333;
    }

    .dashboard-card p {
        font-size: 24px;
        font-weight: bold;
        color: #0d47a1;
    } 
     .destinations-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
    }

    .destination-card {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s ease;
    }

    .destination-card:hover {
        transform: translateY(-20px);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.2);
        
    }

    .destination-card img {
        width: 100%;
        height: 50%;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .destination-card h3 {
        font-size: 20px;
        color: #0d47a1;
        margin-bottom: 10px;
    }

    .destination-card p {
        color: #444;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .country-label {
        font-size: 13px;
        color: #777;
    }
    

        /* Card icon style */
        


    </style>
</head>
<body>

<div class="sidebar">
    <h2><i class="fa-solid fa-user-shield"></i> سوبر مشرف</h2>
    <a href="{{ route('superadmin.dashboard') }}"><i class="fa-solid fa-chart-line"></i> لوحة التحكم</a>
    <a href="{{ route('superadmin.admins') }}"><i class="fa-solid fa-user-tie"></i> المشرفين</a>
    <a href="{{ route('superadmin.tourists.index') }}"><i class="fa-solid fa-users"></i> السياح</a>
    <a href="{{ route('superadmin.destinations.index') }}"><i class="fa-solid fa-map-location-dot"></i> الوجهات</a>
    <a href="{{ route('superadmin.agencies.index') }}"><i class="fa-solid fa-building"></i> الوكالات</a>
    <a href="{{ route('superadmin.reviews.index') }}"><i class="fa-solid fa-star-half-stroke"></i> التقييمات</a>
</div>

<div class="main">
    <div class="header">
        <div>مرحبًا، {{ Auth::user()->name }}</div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"><i class="fa-solid fa-right-from-bracket"></i> تسجيل خروج</button>
        </form>
    </div>

    <div class="main-content">
        @yield('content')
    </div>
</div>

</body>
</html>
