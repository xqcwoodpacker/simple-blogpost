@extends('admin.layout')

@section('title', 'Posts')

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
            </button>
        </div>
    @endif

    <div class="container-fluid my-5">
        <div class="table-responsive">
            <h1>Posts Table</h1>
            <table class="table table-striped table-hover w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Comments Count</th>
                        <th>Category</th>
                        <th>Creation Date</th>
                        <th>Last Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($posts as $post)
                        <tr scope="row">
                            <td>{{ $posts->firstItem() + $loop->index }}</td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::limit($post->content, 20) }}</td>
                            <td>{{ $post->comments->count() }}</td>
                            <td>{{ $post->category && $post->category->exists() ? $post->category->name : 'No Category' }}
                            </td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->updated_at }}</td>
                            <td class="action-btn">
                                <a href="{{route('admin.editpost',$post->id)}}" class="btn btn-outline-primary btn-sm me-2">Edit</a>
                                <form action="{{ route('admin.deletepost', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $posts->links() }}
        </div>
    </div>
@endsection
