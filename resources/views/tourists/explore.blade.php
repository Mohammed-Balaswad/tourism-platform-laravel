@extends('layouts.app')

@section('content')
<style>
    .hero {
        background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e');
        background-size: cover;
        background-position: center;
        padding: 80px 20px;
        text-align: center;
        color: white;
    }
    nav {
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 999;
            display: flex;
            justify-content: center;
            padding: 10px 0;
        }

        nav a {
            margin: 0 15px;
            text-decoration: none;
            color: #444;
            font-weight: bold;
            font-size: 16px;
        }

        nav a:hover {
            color: #c72e00;
        }


    .hero h1 {
        font-size: 64px;
        margin-bottom: 20px;
    }
    .hero p {
        font-size: 22px;
        max-width: 800px;
        margin: 0 auto;
        background: linear-gradient(90deg, #007bff, #00337b);
        border-radius: 8px;
        transition: 0.3s ease;
    }
    .section-title {
        color: rgb(0, 87, 137);
        text-align: center;
        margin-bottom: 40px;
        margin-top: 50px;
        font-size: 30px;
        border-radius: 8px;
        transition: 0.3s ease;
        width: 350px;
        margin-right: 750px;
        padding: 5px;

    }
    .section {
        padding: 60px 20px;
    }
    .section h2 {
        text-align: center;
        margin-bottom: 40px;
        font-size: 36px;
    }
    .cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
        margin-left: 10px;
        margin-right: 10px;
    }
    .card {
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
    }
    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .card-body {
        padding: 20px;
        flex: 1;
    }
    .card-body h3 {
        font-size: 24px;
        margin-bottom: 10px;
    }
    .card-body p {
        font-size: 16px;
        color: #666;
        height: 60px;
        overflow: hidden;
    }

    .destinations-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
    margin-top: 30px;
    
}

.destination-card {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 500px; /* أو أي ارتفاع يناسب التنسيق */
    background: #fff;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: 0.3s ease-in-out;
    width: 350px;
    flex-shrink: 0;
    
}



.destination-card:hover {
    transform: translateY(-5px);
}

.destination-card h2 {
    margin-top: 0;
    color:  #0056b3;
}


.destination-card p, .destination-card ul {
    margin: 10px 0;
}

.btn-visit {
    align-self: flex-start;
    margin-top: auto;
    padding: 10px 20px;
    background: linear-gradient(to right, #007bff, #0056b3);
    color: white;
    border-radius: 30px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s ease-in-out;
}


.btn-visit:hover  {
    transform: scale(1.05);
}

.alert-success {
        text-align: center;
        background-color: green;
        padding: 10px;
        border-radius: 5px;
        color: #ffffff;
        margin-bottom: 15px;
        font-weight: bold;
        }
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

@if (session('success'))
<div class="alert-success" style="margin: 0px">{{ session('success') }}</div>
@endif

@if (session('access'))
<div class="alert-error" style="margin: 0px">{{ session('access') }}</div>
@endif

<div class="hero">
    <h1>اكتشف أجمل الوجهات السياحية</h1>
    <p>انطلق في مغامرة لا تُنسى حول العالم مع دليلنا الشامل لأفضل الوجهات والتجارب</p>
</div>
<nav style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px; background: linear-gradient(to right, #007bff, #0056b3);">

    <!-- روابط على اليمين -->
    <div style="display: flex; gap: 20px; ">
        <a  href="#destinations" style="color: white; text-decoration: none; font-weight: bold;">الوجهات</a>
        <a href="#agencies" style="color: white; text-decoration: none; font-weight: bold;">الوكالات</a>
        <a href="#reviews" style="color: white; text-decoration: none; font-weight: bold;">التقييمات</a>
        <a href="#about" style="color: white; text-decoration: none; font-weight: bold;">حول الموقع</a>
   
    </div>

    <!-- زر الحساب وتسجيل الخروج على اليسار -->
    <div style="display: flex; gap: 15px;">
        <a href="{{ route('tourists.profile.show') }}" style="color: white; text-decoration: none; font-weight: bold;">
            <i class="fa-solid fa-user"></i> <samp style="padding: 5px">حسابي</a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background: transparent; border: none; color: white; font-weight: bold; cursor: pointer;">
                <i class="fa-solid fa-right-from-bracket fa-lg"></i> <samp > تسجيل الخروج</samp>
               
            </button>
        </form>
    </div>
</nav>


<section id="destinations">
    <h2 class="section-title">الوجهات السياحية</h2>
    <div class="cards">
        @foreach($destinations as $destination)
        <div class="card">
            <img src="{{ asset('storage/' . $destination->image) }}" alt="صورة الوجهة">
            <div class="card-body">
                <h3>{{ $destination->name }}</h3>
                <p>{{ Str::limit($destination->description, 100) }}</p>
                <a href="{{ route('explore.destinations.show', $destination->id) }}" class="btn-visit">عرض التفاصيل</a>
            </div>
        </div>
        @endforeach
    </div>
</section>

@if($agencies->count() > 0)
<section id="agencies">
    <h2 class="section-title">وكالات السفر الموثوقة</h2>
    <div class="destinations-grid">
        @foreach($agencies as $agency)
            <div class="destination-card">
                <h2>{{ $agency->name }}</h2>

                @if($agency->website)
                <p><strong>الموقع الإلكتروني:</strong> <a href="{{ $agency->website }}" target="_blank">{{ $agency->website }}</a></p>
                @endif

                @if($agency->contact_info)
                <p><strong>معلومات التواصل:</strong> {{ $agency->contact_info }}</p>
                @endif

                @if($agency->destinations->count() > 0)
                <p><strong>الوجهات المتوفرة لديهم:</strong></p>
                <ul>
                    @foreach($agency->destinations as $destination)
                        <li>{{ $destination->name }}</li>
                    @endforeach
                </ul>
                @endif

                <a href="{{ $agency->website }}" class="btn-visit" target="_blank">زيارة موقع الوكالة</a>
            </div>
        @endforeach
    </div>
</section>
@else
    <p class="text-center">لا توجد وكالات سفر متاحة حالياً.</p>
@endif


<section id="reviews">
    <h2 class="section-title">ابرز آراء الزوار</h2>
    <div class="cards">
        @foreach($reviews as $review)
        <div class="card review-card">
            <div class="card-body">
                <h3>الوجهة: {{ $review->destination->name ?? 'غير معروفة' }}</h3>
                <p><strong>المستخدم:</strong> {{ $review->user->name ?? 'مستخدم غير معروف' }}</p>
                <p>"{{ Str::limit($review->comment, 100) }}"</p>
                <span>⭐ {{ $review->rating }}/5</span>
            </div>
        </div>
        @endforeach
    </div>
</section>
<section id="about" style="background: linear-gradient(to right, #3795fa, #00346b); padding: 40px 20px; maragin-top: 200px; border-radius: 12px; margin: 40px 0;">
    <div style="max-width: 1000px; margin: auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 20px;">
        
        <!-- معلومات الإشراف والطلاب (أقصى اليسار) -->
        <div style="flex: 1 1 35%; order: 2; background-color: #fff; padding: 20px; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); text-align: right;">
            <h3 style="color: #009688; font-size: 22px; margin-bottom: 10px;">إشراف المشروع</h3>
            <p style="font-size: 18px; margin-bottom: 20px;"><strong>أ. مروان اللرضي</strong></p>
            
            <h3 style="color: #009688; font-size: 22px; margin-bottom: 10px;">تنفيذ الطلاب</h3>
            <ul style="font-size: 18px; color: #444; line-height: 1.7; list-style: disc; padding-right: 20px;">
                <li>محمد صالح بالسود</li>
                <li>محمد صالح باظبي</li>
                <li>محمد فائز باشامخة</li>
            </ul>
        </div>

        <!-- معلومات المشروع (أقصى اليمين) -->
        <div style="flex: 1 1 60%; order: 1; text-align: right; color: #ffffff;">
            <h2 style="font-size: 28px;">نبذة عن المشروع</h2>
            <p style="font-size: 18px; line-height: 1.8; color: #c8dcff;">
                هذا المشروع هو منصة رقمية لدليل السفر و السياحة، تم تطويره كجزء من متطلبات مادة <strong>Laravel Framework</strong> بجامعة الريان. <br> 
                يهدف المشروع إلى توفير تجربة واقعية وعملية في بناء تطبيق ويب متكامل باستخدام تقنيات Laravel وBlade، مع التركيز على تنظيم الكود، التعامل مع قواعد البيانات، وتصميم واجهات تفاعلية.
            </p>
        </div>

    </div>
</section>


@endsection
