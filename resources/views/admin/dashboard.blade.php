@extends('admin.layouts.app')

@section('page_title', 'Dashboard')

@section('content_title', 'Dashboard')

@section('admin_content')

    <div class="row">

        <div class="col-lg-3 col-6">

            <div class="small-box bg-info">

                <div class="inner">
                    <h3>{{ $blogCount }}</h3>
                    <p>Blogs</p>
                </div>

                <div class="icon">
                    <i class="fas fa-blog"></i>
                </div>

            </div>

        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">

                <div class="inner">
                      <h3>{{ $lookupCount }}</h3>
                    <p>Lookups</p>
                </div>

                <div class="icon">
                    <i class="fas fa-search"></i>
                </div>

            </div>
        </div>

    </div>

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">
                Welcome
            </h3>
        </div>

        <div class="card-body">
            Welcome to your admin dashboard.
        </div>

    </div>

@endsection