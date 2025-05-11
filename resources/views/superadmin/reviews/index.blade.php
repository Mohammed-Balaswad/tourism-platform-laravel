@extends('layouts.superadmin')

@section('title', 'التقييمات')

@section('content')
<style>
    .table-container {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        margin-top: 20px;
    }

    .alert-success {
        background-color: #d4edda;
        padding: 10px;
        border-radius: 5px;
        color: #155724;
        margin-bottom: 15px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    thead {
        background-color: #f8f8f8;
    }

    th, td {
        padding: 12px 10px;
        border-bottom: 1px solid #e0e0e0;
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

  
</style>

<div class="table-container">
    <h1>قائمة التقييمات</h1>

    @if (session('error'))
    <div class="alert-error">{{ session('error') }}</div>
    @endif

    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden;">
        <thead style="background-color: #0d47a1; color: white; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <tr>
                <th style="padding: 12px;">السائح</th>
                <th style="padding: 12px;">الوجهة</th>
                <th style="padding: 12px;">التقييم</th>
                <th style="padding: 12px;">التعليق</th>
                <th style="padding: 12px;">التاريخ</th>
                <th style="padding: 12px;">العمليات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reviews as $review)
                <tr class="value">
                    <td>{{ $review->user->name ?? 'غير معروف' }}</td>
                    <td>{{ $review->destination->name ?? 'غير معروفة' }}</td>
                    <td>{{ $review->rating }} / 5</td>
                    <td>{{ $review->comment }}</td>
                    <td>{{ $review->created_at->format('Y-m-d') }}</td>
                    <td>
                        <form action="{{ route('superadmin.reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا التقييم؟');">
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
                    <td colspan="6">لا توجد تقييمات حالياً</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
