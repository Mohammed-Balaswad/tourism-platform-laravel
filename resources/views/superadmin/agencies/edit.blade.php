@extends('layouts.superadmin')

@section('title', 'تعديل الوكالة')

@section('content')
    <div class="main-content">
        <h2>تعديل الوكالة</h2>
        <form action="{{ route('superadmin.agencies.update', $agency->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">اسم الوكالة:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $agency->name) }}" required>
            </div>

            <div class="form-group">
                <label for="website">الموقع الإلكتروني:</label>
                <input type="url" name="website" id="website" class="form-control" value="{{ old('website', $agency->website) }}">
            </div>

            <div class="form-group">
                <label for="contact_info">معلومات الاتصال:</label>
                <textarea name="contact_info" id="contact_info" class="form-control" required>{{ old('contact_info', $agency->contact_info) }}</textarea>
            </div>

            <div class="form-group">
                <label for="admin_id">المشرف:</label>
                <select name="admin_id" id="admin_id" class="form-control">
                    <option value="">لا يوجد مشرف</option>
                    @foreach($admins as $admin)
                        <option value="{{ $admin->id }}" {{ $agency->admin_id == $admin->id ? 'selected' : '' }}>
                            {{ $admin->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">تحديث الوكالة</button>
        </form>
    </div>
@endsection
