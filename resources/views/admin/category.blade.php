@extends('admin.layout')

@section('title', 'Categories')

@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            {{ session('error') }}
        </div>
    @endif

    <div class="container-fluid my-5">
        <!-- Add flex container to position title and button -->
        <div class="d-flex justify-content-between align-items-center">
            <h1>Categories Table</h1>
            <a href="{{ route('admin.addcategory') }}" class="btn btn-outline-primary">Add Category</a>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-striped table-hover w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Post Count</th>
                        <th>Creation Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($categories as $category)
                        <tr scope="row">
                            <td>{{ $categories->firstItem() + $loop->index }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->posts->count() }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td class="action-btn">
                                <form action="{{ route('admin.deletecategory', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $categories->links() }}
        </div>
    </div>
@endsection
