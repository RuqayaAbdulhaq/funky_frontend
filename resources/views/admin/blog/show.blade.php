@extends('admin.layouts.app')

@section('page_title', 'Blog Details')

@section('content_title', 'Blog Details')

@section('admin_content')

<div class="card">

    <div class="card-body">

        <h3>{{ $blog->title }}</h3>

        <hr>

        @if($blog->mainImage)

            <img src="{{ $blog->mainImage->url }}"
                 class="img-fluid rounded mb-3">

        @endif

        <p>
            {!! nl2br(e($blog->text)) !!}
        </p>

        <hr>

        <h5>Categories</h5>

        @foreach($blog->categories as $category)

            <span class="badge badge-info">
                {{ $category->title }}
            </span>

        @endforeach

    </div>

</div>

@endsection