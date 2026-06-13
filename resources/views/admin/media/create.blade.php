@extends('admin.layouts.app')

@section('page_title', 'Upload Media')

@section('content_title', 'Upload Media')

@section('admin_content')

<div class="card">

    <div class="card-body">

        <form method="POST"
              action="{{ route('admin.media.store') }}"
              enctype="multipart/form-data">

            @csrf

            <div class="form-group">

                <label>Title</label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title') }}">

            </div>

            <div class="form-group">

                <label>File</label>

                <input type="file"
                       name="file"
                       class="form-control">

            </div>

            <button type="submit"
                    class="btn btn-success">

                Upload

            </button>

        </form>

    </div>

</div>

@endsection