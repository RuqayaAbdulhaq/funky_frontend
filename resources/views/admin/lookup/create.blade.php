@extends('admin.layouts.app')

@section('page_title', 'Create lookup')

@section('content_title', 'Create lookup')

@section('admin_content')

    <div class="card">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.lookup.store') }}">
                @csrf

                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" rows="6" class="form-control">{{ old('description') }}</textarea>
                </div>

                <div class="form-group">
                    <label>Type</label>
                    <input type="text" name="type" class="form-control" value="{{ old('type') }}">
                </div>


                <div class="form-group">
                    <label>Image</label>

                    <input type="hidden" name="img_id" id="img_id" value="{{ old('img_id') }}">

                    <button type="button" class="btn btn-secondary open-media-modal" data-target-input="img_id"
                        data-preview="thumb_preview">
                        Select Media
                    </button>

                    <div class="mt-2">
                        <img id="thumb_preview" src="" class="img-thumbnail" style="max-width:250px; display:none;">

                        <small id="thumb_preview_name" class="d-block text-muted mt-1"></small>
                    </div>
                </div>




                <button type="submit" class="btn btn-success">
                    Save
                </button>

            </form>

        </div>
    </div>

   

@endsection

@section('page_js')

 @include('admin.layouts.partials.media-modal')
    

@endsection