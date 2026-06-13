@extends('adminlte::page')

@section('title')
    @yield('page_title', 'Admin Panel')
@endsection

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="m-0">
            @yield('content_title')
        </h1>

        <div>
            @yield('content_actions')
        </div>
    </div>
@endsection

@section('content')

    @include('admin.layouts.partials.alerts')

    @yield('admin_content')

@endsection

@section('css')

    @vite([
        'resources/admin/css/admin.css',
        'resources/admin/js/admin.js'
    ])

    @yield('page_css')

@endsection

@section('js')
    @yield('page_js')
@endsection