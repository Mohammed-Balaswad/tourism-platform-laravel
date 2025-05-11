@extends('layouts.superadmin')

@section('title', 'الوكالات')

@section('content')
<style>
    .table-container {
        background: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        margin-top: 20px;
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .btn-add {
        background-color: #3498db;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        text-decoration: none;
        font-size: 14px;
        transition: background 0.3s;
    }

    .btn-add:hover {
        background-color: #2980b9;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    thead {
        background-color: #f1f1f1;
    }

    th, td {
        padding: 12px 10px;
        border-bottom: 1px solid #ddd;
    }

    

    .text-muted {
        color: #999;
    }

    .alert-success {
        background-color: #d4edda;
        padding: 10px;
        border-radius: 5px;
        color: #155724;
        margin-bottom: 15px;
    }

    .btn-edit, .btn-delete {
        padding: 10px 20px;  /* حجم الحشو مناسب لجميع الأزرار */
        border-radius: 6px;
        color: white;
        font-size: 14px;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center; /* للتأكد من محاذاة النص مع الأيقونة */
        gap: 8px; /* المسافة بين الأيقونة والنص */
        transition: background-color 0.3s ease, transform 0.3s ease;
        margin: 0 5px; /* المسافة بين الأزرار */
        border: none;
    }

    .btn-edit {
        background-color: #3498db;
    }

    .btn-edit:hover {
        background-color: #2980b9;
        transform: scale(1.05);
    }

    .btn-delete {
        background-color: #e74c3c;
    }

    .btn-delete:hover {
        background-color: #c0392b;
        transform: scale(1.05);
    }

    .btn-edit i, .btn-delete i {
        font-size: 16px; /* تحديد حجم الأيقونة بحيث تتناسب مع حجم النص */
    }

    .btn-edit span, .btn-delete span {
        font-size: 14px; /* تأكد من أن النص بحجم مناسب */
    }

    
</style>

<div class="table-container">

        <h1>قائمة الوكالات</h1>
        <a href="{{ route('superadmin.agencies.create') }}" style="display:inline-block;margin-bottom:15px;background:#0d47a1;color:white;padding:8px 16px;border-radius:5px;text-decoration:none;">+ إضافة وكالة جديدة</a>

        @if (session('error'))
        <div class="alert-error">{{ session('error') }}</div>
        @endif

    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden;">
        <thead style="background-color: #0d47a1; color: white; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <tr>
                <th style="padding: 12px;">الاسم</th>
                <th style="padding: 12px;">الموقع الإلكتروني</th>
                <th style="padding: 12px;">معلومات الاتصال</th>
                <th style="padding: 12px;">المشرف</th>
                <th style="padding: 12px;">العمليات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($agencies as $agency)
                <tr class="value">
                    <td>{{ $agency->name }}</td>
                    <td>
                        @if ($agency->website)
                            <a href="{{ $agency->website }}" target="_blank">{{ $agency->website }}</a>
                        @else
                            <span class="text-muted">لا يوجد</span>
                        @endif
                    </td>
                    <td>{{ $agency->contact_info }}</td>
                    <td>{{ $agency->admin ? $agency->admin->name : 'غير محدد' }}</td>
                    <td>
                        <form action="{{ route('superadmin.agencies.destroy', $agency->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE')
                        
                            <a href="{{ route('superadmin.agencies.edit', $agency->id) }}" class="btn-edit">
                                <i class="fa fa-edit"></i><span>تعديل</span>
                            </a>
                        
                            <button type="submit" class="btn-delete">
                                <i class="fa fa-trash"></i><span>حذف</span>
                            </button>
                        </form>
                        
                        <script>
                            function confirmDelete() {
                                return confirm("هل أنت متأكد من حذف هذه الوكالة؟");
                            }
                        </script>
                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">لا توجد وكالات حالياً</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
