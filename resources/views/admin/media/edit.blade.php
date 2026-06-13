@extends('admin.layouts.app')

@section('page_title', 'Edit Media')

@section('content_title', 'Edit Media')

@section('admin_content')

<div class="card">

    <div class="card-body">

        <form method="POST"
              action="{{ route('admin.media.update', $item->media_id) }}">

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Title</label>

                <input type="text"
                       name="title"
                       class="form-control"
                       value="{{ old('title', $item->title) }}">

            </div>

            <button type="submit"
                    class="btn btn-primary">

                Update

            </button>

        </form>

    </div>

</div>

@endsection