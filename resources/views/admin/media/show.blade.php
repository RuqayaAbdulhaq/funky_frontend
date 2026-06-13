@extends('admin.layouts.app')

@section('page_title', 'Media Details')

@section('content_title', 'Media Details')

@section('admin_content')

<div class="card">

    <div class="card-body">

        @if($item->file_type === 'IMAGE')

            <img src="{{ $item->url }}"
                 class="img-fluid rounded mb-4">

        @endif

        <table class="table table-bordered">

            <tr>
                <th>ID</th>
                <td>{{ $item->media_id }}</td>
            </tr>

            <tr>
                <th>Title</th>
                <td>{{ $item->title }}</td>
            </tr>

            <tr>
                <th>File Name</th>
                <td>{{ $item->file_name }}</td>
            </tr>

            <tr>
                <th>MIME Type</th>
                <td>{{ $item->mime_type }}</td>
            </tr>

            <tr>
                <th>File Size</th>
                <td>{{ number_format($item->file_size / 1024, 2) }} KB</td>
            </tr>

            <tr>
                <th>URL</th>
                <td>
                    <a href="{{ $item->url }}"
                       target="_blank">

                        Open File

                    </a>
                </td>
            </tr>

        </table>

    </div>

</div>

@endsection