@extends('layouts.admin')

@section('title', 'تقييمات وجهاتي')

@section('content')
<style>
    .table-container {
        background: #fff;
        padding: 25px;
        border-radius: 16px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.08);
        margin-top: 30px;
        direction: rtl;
    }

   

    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
    }

    thead {
        background-color:  #0d47a1;
    }

    th, td {
        
        padding: 14px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }
    .tr{
        color: white
    }

  

    .no-data {
        text-align: center;
        color: #7f8c8d;
        font-size: 18px;
        padding: 20px;
    }
    .btn-delete {
        background-color: #e74c3c;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
    }

    .btn-delete:hover {
        background-color: #c0392b;
    }
</style>

<div class="table-container">
    <h1>تقييمات وجهاتي</h1>

   
    @if (session('error'))
    <div class="alert-error">{{ session('error') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th class="tr">السائح</th>
                <th class="tr">الوجهة</th>
                <th class="tr">التقييم</th>
                <th class="tr">التعليق</th>
                <th class="tr">التاريخ</th>
                <th class="tr">العمليات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reviews as $review)
                <tr class="value">
                    <td>{{ $review->user->name ?? 'غير معروف' }}</td>
                    <td>{{ $review->destination->name ?? 'غير معروفة' }}</td>
                    <td>⭐ {{ $review->rating }} / 5</td>
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->created_at->format('Y-m-d') }}</td>
                    <td>
                        <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا التقييم؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">
                                <i class="fa fa-trash"></i> حذف
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="no-data">لا توجد تقييمات حتى الآن</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
