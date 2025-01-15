@extends('admin.layout')

@section('title', 'Comments')

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
            <h1>Comments Table</h1>
            <table class="table table-striped table-hover w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Post Title</th>
                        <th>comment</th>
                        <th>Creation Date</th>
                        <th>Last Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($comments as $comment)
                        <tr scope="row">
                            <td>{{ $comments->firstItem() + $loop->index }}</td>
                            <td>{{ $comment->user->name }}</td>
                            <td>{{ $comment->post->title }}</td>
                            <td>{{ Str::limit($comment->content, 20) }}</td>
                            <td>{{ $comment->created_at }}</td>
                            <td>{{ $comment->updated_at }}</td>
                            <td class="action-btn">
                                <a href="{{ route('admin.editcomment', $comment->id) }}"
                                    class="btn btn-outline-primary btn-sm me-2">Edit</a>
                                <form action="{{ route('admin.deletecomment', $comment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $comments->links() }}
        </div>
    </div>
@endsection
