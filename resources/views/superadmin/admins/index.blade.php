@extends('layouts.superadmin')

@section('content')
    <h1>إدارة المشرفين</h1>

    <a href="{{ route('superadmin.admins.create') }}" style="display:inline-block;margin-bottom:15px;background:#0d47a1;color:white;padding:8px 16px;border-radius:5px;text-decoration:none;">+ إضافة مشرف</a>
    
    @if (session('success'))
    <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden;">
        <thead style="background-color: #0d47a1; color: white; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            <tr>
                <th style="padding: 12px;">الاسم</th>
                <th style="padding: 12px;">البريد</th>
                <th style="padding: 12px;">الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
            <tr style="text-align: center; border-bottom: 1px solid #ddd;">
                    <td style="padding:10px;border:1px solid #ddd;">{{ $admin->name }}</td>
                    <td style="padding:10px;border:1px solid #ddd;">{{ $admin->email }}</td>
                    <td style="padding:10px;border:1px solid #ddd;">
                        <a href="{{ route('superadmin.admins.edit', $admin->id) }}"  style="background-color: #e6ae06d6; color: black; padding: 6px 15px; border: none; border-radius: 6px; font-size: 14px;  margin: 0px 20px 0px 40px; transition: background-color 0.3s;" >تعديل</a>
                        <form action="{{ route('superadmin.admins.delete', $admin->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')" class="btn btn-danger">حذف</button>
                        </form>
                        
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
