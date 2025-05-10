@extends('layouts.admin')

@section('title', 'وكالاتي')

@section('content')
<div class="container">
    <h1>الوكالات المرتبطة بوجهاتك</h1>

    @if($agencies->count() > 0)
    <div class="destinations-grid">
        @foreach($agencies as $agency)
            <div class="destination-card">
                <h3>{{ $agency->name }}</h3>
                <p><strong>الموقع الإلكتروني:</strong> <a href="{{ $agency->website }}" target="_blank">{{ $agency->website }}</a></p>
                <p><strong>معلومات التواصل:</strong> {{ $agency->contact_info }}</p>
    
                <p><strong>الوجهات المرتبطة:</strong></p>
                <ul>
                    @foreach($agency->destinations as $destination)
                        @if($destination->admin_id === auth()->id())
                            <li>
                                <a href="{{ route('admin.my_destinations.show', $destination->id) }}">
                                    {{ $destination->name }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
    
    @else
        <p>لا توجد وكالات مرتبطة بوجهاتك حتى الآن.</p>
    @endif
</div>
<style>
    .container {
        margin-top: 40px;
    }

   

    .destinations-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 25px;
    }

    .destination-card {
        background: linear-gradient(135deg, #f0f4f8, #ffffff);
        border-radius: 12px;
        padding: 25px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .destination-card:hover {
        transform: translateY(-8px);
    }

    .destination-card h3 {
        color: #0d47a1;
        font-size: 22px;
        margin-bottom: 15px;
        border-bottom: 1px solid #ccc;
        padding-bottom: 5px;
    }

    .destination-card p {
        font-size: 16px;
        margin: 8px 0;
        color: #333;
    }

    .destination-card a {
        color: #1565c0;
        text-decoration: none;
    }

    .destination-card a:hover {
        text-decoration: underline;
    }

    .destination-card ul {
        list-style-type: disc;
        padding-left: 20px;
        margin-top: 10px;
    }

    .destination-card ul li {
        font-size: 15px;
        margin-bottom: 6px;
        color: #555;
    }

    .destination-card ul li a {
        font-weight: bold;
    }

    .no-agencies {
        font-size: 18px;
        text-align: center;
        margin-top: 40px;
        color: #777;
    }
</style>
@endsection
