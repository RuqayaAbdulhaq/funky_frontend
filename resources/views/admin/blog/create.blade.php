@extends('admin.layouts.app')

@section('plugins.Select2', true)

@section('page_title', 'Create Blog')

@section('content_title', 'Create Blog')

@section('admin_content')

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.blog.store') }}">
                @csrf

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label>Text</label>
                    <textarea name="text" rows="6" class="form-control">{{ old('text') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Thumb Image</label>

                    <input type="hidden" name="thumb_img_id" id="thumb_img_id" value="{{ old('thumb_img_id') }}">

                    <button type="button" class="btn btn-secondary open-media-modal" data-target-input="thumb_img_id"
                        data-preview="thumb_preview">
                        Select Media
                    </button>

                    <div class="mt-2">
                        <img id="thumb_preview" src="" class="img-thumbnail" style="max-width:250px; display:none;">

                        <small id="thumb_preview_name" class="d-block text-muted mt-1"></small>
                    </div>
                </div>

                <div class="form-group">
                    <label>Main Image</label>

                    <input type="hidden" name="main_img_id" id="main_img_id" value="{{ old('main_img_id') }}">

                    <button type="button" class="btn btn-secondary open-media-modal" data-target-input="main_img_id"
                        data-preview="main_preview">
                        Select Media
                    </button>

                    <div class="mt-2">
                        <img id="main_preview" src="" class="img-thumbnail" style="max-width:250px; display:none;">

                        <small id="main_preview_name" class="d-block text-muted mt-1"></small>
                    </div>
                </div>

                <div class="form-group">
                        <label>Categories</label>

                        <select name="categories[]" class="form-control select2" multiple="multiple"
                            data-placeholder="Select categories" style="width: 100%;">

                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ in_array($category->id, old('categories', [])) ? 'selected' : '' }}>
                                    {{ $category->title }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                <button type="submit" class="btn btn-success">
                    Save
                </button>

            </form>

        </div>
    </div>


@endsection

@section('page_js')

    @include('admin.layouts.partials.media-modal') {{-- first --}}

    <script>
        $(function () {
            $('.select2').select2({
                theme: 'bootstrap4',
                placeholder: 'Select categories',
                width: '100%'
            });
        });
    </script>

@endsection