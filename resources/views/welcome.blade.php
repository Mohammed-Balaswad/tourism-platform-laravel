<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحبًا بك في منصتك السياحية</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Tajawal';
    text-align: center;
    background-color: #f8f9fa;
}

.hero {
    background: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e') no-repeat center center;
    background-size: cover;
            height: 300px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-shadow: 1px 1px 4px #000;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}
.hero h1 {
    padding-top: 50px;
    padding-bottom: 15px;
            font-size: 3.5rem;
            font-weight: bold;
        }

.hero p {
  
            font-size: 1.5rem;
            margin-top: 20px;
            background: linear-gradient(to right, #007bff, #0056b3);
            border-radius: 50px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
           
        }


.hero img {
  
    width: 100%;
    height: 500px;
    object-fit: cover;

}



.action-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 100px;
}

.action-buttons a {
    padding-bottom: 10px
    height: 70px;
    width: 200px;
    position: relative;
    padding: 15px 35px;
    font-size: 32px;
    font-weight: bold;
    text-transform: uppercase;
    text-decoration: none;
    color: white;
    background: linear-gradient(to right, #007bff, #0056b3);
    border-radius: 50px;
    overflow: hidden;
    transition: all 0.3s ease-in-out;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
}

.action-buttons a:hover {
    transform: scale(1.05);
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.3);
}

.action-buttons a::before {
    content: '';
    position: absolute;
    top: -100%;
    left: -100%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.3) 10%, transparent 80%);
    transition: all 0.5s ease-in-out;
}

.action-buttons a:hover::before {
    top: 0;
    left: 0;
}



.card {
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    transition: 0.3s;
}
.card-wrapper:hover .card {
    filter: blur(2px) brightness(0.9);
    transform: scale(0.95);
    transition: 0.4s ease;
    z-index: 0;
}

.card-wrapper .card:hover {
    filter: none;
    transform: scale(1.08);
    z-index: 10;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
}


.card:hover {
    transform: scale(1.1);
    filter: none;
    z-index: 10;
    
}

.card-img-top {
    height: 250px;
    object-fit: cover;
}
.card-title {
    font-size: 1.5rem;
    font-weight: bold;
}
.card-text {
    text-align:right;

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
</head>
<body>
    <!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مرحبًا بك في منصتنا السياحية</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @if (session('error'))
<div class="alert-error" style="margin: 0px">{{ session('error') }}</div>
@endif
    <div class="hero">
        
       
        <div class="hero-text">
            <h1>اكـتشـف أجمل الوجهات السياحية</h1>
            <p>انضم إلى منصتنا لاستكشاف الأماكن الأكثر روعة في العالم</p> 
        </div>
    </div>

    
    <div class="container mt-5">
        <div class="row card-wrapper">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/maldives.jpg') }}" class="card-img-top" alt="روما">
                    <div class="card-body">
                        <h5 class="card-title">جزر المالديف</h5>
                        <p class="card-text">جزر المالديف، الفردوس الاستوائي
                            وجهة ساحرة بمياهها الفيروزية ورمالها البيضاء، حيث تنتظرك المنتجعات الفاخرة وتجارب الغوص بين الشعاب المرجانية الخلابة
                            </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/Roma.jpg') }}" class="card-img-top" alt="روما">
                    <div class="card-body">
                        <h5 class="card-title">روما</h5>
                        <p class="card-text">روما، المدينة الخالدة حيث يروي كل حجر فيها قصة! استمتع بجولة ساحرة بين المعالم, عش أجواء الفن والثقافة التي تجعلها وجهة لا تُنسى</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('images/London.jpg')}}" class="card-img-top" alt="لندن">
                    <div class="card-body">
                        <h5 class="card-title">لندن</h5>
                        <p class="card-text">لندن، مدينة الضباب والجمال
                        عاصمة بريطانيا النابضة بالحياة، حيث يمتزج التاريخ العريق بالحداثة المبهرة. استكشف معالمها الشهيرة مثل برج لندن وعين لندن 
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="action-buttons">
        <a href="{{ route('login.show') }}">ابدأ الآن</a>
    </div>

</body>
</html>
</body>
</html>