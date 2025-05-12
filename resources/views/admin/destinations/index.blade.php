@extends('layouts.admin')

@section('title', 'كل الوجهات')

@section('content')

@if (session('error'))
<div class="alert-error" style="margin: 0px">{{ session('error') }}</div>
@endif

    <h1 class="mb-4 text-center">كل الوجهات السياحية</h1>

    <div class="destinations-grid">
        @foreach ($destinations as $destination)
            <div class="destination-card">
                @if($destination->image)
                    <img src="{{ asset('storage/' . $destination->image) }}" alt="{{ $destination->name }}">
                @endif

                <h3>{{ $destination->name }}</h3>
                <p>{{ Str::limit($destination->description, 100) }}</p>
                
            </div>
        @endforeach
    </div>
@endsection

@section('styles')
<style>
    
</style>
@endsection
