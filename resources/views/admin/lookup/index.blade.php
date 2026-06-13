@extends('admin.layouts.app')

@section('page_title', 'lookups')

@section('content_title', 'lookups')

@section('content_actions')

    <a href="{{ route('admin.lookup.create') }}" class="btn btn-primary">

        <i class="fas fa-plus"></i>
        Add lookup

    </a>

@endsection

@section('admin_content')

    <div class="card">

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th width="220">Actions</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($lookups as $lookup)

                        <tr>

                            <td>{{ $lookup->id }}</td>

                            <td width="100">

                                @if($lookup->image)

                                    <img src="{{ $lookup->image->url }}" width="80" class="img-fluid rounded">

                                @endif

                            </td>

                            <td>{{ $lookup->type }}</td>

                            <td>{{ $lookup->title }}</td>

                            <td>


                                <a href="{{ route('admin.lookup.edit', $lookup->id) }}" class="btn btn-sm btn-warning">

                                    Edit

                                </a>

                                <form action="{{ route('admin.lookup.destroy', $lookup->id) }}" method="POST" class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete this lookup?')">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="text-center">
                                No lookups found.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection