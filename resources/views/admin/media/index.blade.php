@extends('admin.layouts.app')

@section('page_title', 'Media')

@section('content_title', 'Media Library')

@section('content_actions')

<a href="{{ route('admin.media.create') }}"
   class="btn btn-primary">

    <i class="fas fa-plus"></i>
    Upload Media

</a>

@endsection

@section('admin_content')

<div class="card">

    <div class="card-body">

        <div class="row">

            @forelse($media as $item)

                <div class="col-md-3 mb-4">

                    <div class="card h-100">

                        @if($item->file_type === 'IMAGE')

                            <img src="{{ $item->url }}"
                                 class="card-img-top"
                                 style="height:200px; object-fit:cover;">

                        @else

                            <div class="p-5 text-center">
                                <i class="fas fa-file fa-5x"></i>
                            </div>

                        @endif

                        <div class="card-body">

                            <p class="mb-1">

                                <strong>ID:</strong>
                                {{ $item->media_id }}

                            </p>

                            <p class="mb-1 text-truncate">

                                {{ $item->title ?: $item->file_name }}

                            </p>

                            <p class="small text-muted">

                                {{ $item->mime_type }}

                            </p>

                        </div>

                        <div class="card-footer">

                            <a href="{{ route('admin.media.show', $item->media_id) }}"
                               class="btn btn-sm btn-info">

                                View

                            </a>

                            <a href="{{ route('admin.media.edit', $item->media_id) }}"
                               class="btn btn-sm btn-warning">

                                Edit

                            </a>

                            <form action="{{ route('admin.media.destroy', $item->media_id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this media?')">

                                    Delete

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="col-12 text-center">

                    No media found.

                </div>

            @endforelse

        </div>

        <div class="mt-3">
            {{ $media->links() }}
        </div>

    </div>

</div>

@endsection