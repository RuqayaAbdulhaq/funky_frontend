@extends('admin.layouts.app')

@section('page_title', 'Blogs')

@section('content_title', 'Blogs')

@section('content_actions')

    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">

        <i class="fas fa-plus"></i>
        Add Blog

    </a>

@endsection

@section('admin_content')

    <div class="card">
        <div class="card-body">

            {{-- Search --}}
            <form method="GET" action="{{ route('admin.blog.index') }}" class="mb-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search by title..."
                        value="{{ request('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                        <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>

            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>Thumb</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th width="220">Actions</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($blogs as $blog)

                            <tr>

                                <td>{{ $blog->blog_id }}</td>

                                <td width="100">

                                    @if($blog->thumbImage)

                                        <img src="{{ $blog->thumbImage->url }}" width="80" class="img-fluid rounded">

                                    @endif

                                </td>

                                <td>{{ $blog->title }}</td>

                                <td>

                                    @foreach($blog->categories as $category)

                                        <span class="badge badge-info">
                                            {{ $category->title }}
                                        </span>

                                    @endforeach

                                </td>

                                <td>

                                    <a href="{{ route('admin.blog.show', $blog->blog_id) }}" class="btn btn-sm btn-info">

                                        View

                                    </a>

                                    <a href="{{ route('admin.blog.edit', $blog->blog_id) }}" class="btn btn-sm btn-warning">

                                        Edit

                                    </a>

                                    <form action="{{ route('admin.blog.destroy', $blog->blog_id) }}" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this blog?')">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center">
                                    No blogs found.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            {{ $blogs->appends(request()->query())->links() }}

        </div>
    </div>


@endsection