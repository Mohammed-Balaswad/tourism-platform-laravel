@extends('layouts.superadmin')

@section('title', 'السياح')

@section('content')
<div class="main-content">
    <h1>قائمة السياح</h1>

    @if(session('success'))
        <div style="background: #d4edda; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden;">
        <thead style="background-color: #0d47a1; color: white;">
            <tr>
                <th style="padding: 12px;">#</th>
                <th style="padding: 12px;">الاسم</th>
                <th style="padding: 12px;">البريد الإلكتروني</th>
                <th style="padding: 12px;">تاريخ التسجيل</th>
                <th style="padding: 12px;">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tourists as $index => $tourist)
                <tr style="text-align: center; border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px;">{{ $index + 1 }}</td>
                    <td style="padding: 10px;">{{ $tourist->name }}</td>
                    <td style="padding: 10px;">{{ $tourist->email }}</td>
                    <td style="padding: 10px;">{{ $tourist->created_at->format('Y-m-d') }}</td>
                    <td style="padding: 10px;">
                        <form action="{{ route('superadmin.tourists.destroy', $tourist->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا السائح؟');" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="padding: 15px;">لا يوجد سياح مسجلين حالياً.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<style>
    .btn-danger
    {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        text-decoration: none;
        border-radius: 5px;
        border: none;
        font-size: 14px;
        background-color: #dc3545;
        color: white;
    }
</style>
@endsection
