<!-- Profile Page Template -->
@extends('layout')

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

    <div class="container my-5">
        <div class="row">
            <!-- Profile Information -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header">Profile Information</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                    </div>
                </div>

                <!-- Change Password -->
                <div class="card mt-4">
                    <div class="card-header">Change Password</div>
                    <div class="card-body">
                        <form action="{{ route('changepassword') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-floating mb-3">
                                <input type="password" name="current_password" id="current_password" class="form-control" placeholder="">
                                <label for="current_password" class="form-label">Current Password</label>
                                @error('current_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="new_password" id="new_password" class="form-control" placeholder="">
                                <label for="new_password" class="form-label">New Password</label>
                                @error('new_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="password" name="new_password_confirmation" id="new_confirm_password"
                                class="form-control" placeholder="">
                                <label for="new_confirm_password" class="form-label">Confirm New Password</label>
                                    @error('new_confirm_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-outline-primary">Update Password</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- User Posts -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Your Posts</div>
                    <div class="card-body">
                        @if ($posts->isEmpty())
                            <p>You haven't posted anything yet.</p>
                        @else
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}</td>
                                            <td>
                                                <a href="{{ route('post', $post->id) }}"
                                                    class="btn btn-sm btn-outline-info">View</a>
                                                <a href="{{ route('editpost', $post->id) }}"
                                                    class="btn btn-sm btn-outline-warning">Edit</a>
                                                <form action="{{ route('deletepost', $post->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="card mt-4">
                    <div class="card-header">Your Comments</div>
                    <div class="card-body">
                        @if ($comments->isEmpty())
                            <p>You haven't made any comments yet.</p>
                        @else
                            <ul class="list-group">
                                @foreach ($comments as $comment)
                                    <li class="list-group-item">
                                        <p><strong>On Post:</strong>
                                            <a
                                                href="{{ route('post', $comment->post_id) }}">{{ $comment->post->title }}</a>
                                        </p>
                                        <p>{{ $comment->body }}</p>
                                        <p class="text-muted">Commented on {{ \Carbon\Carbon::parse($comment->created_at)->format('F j, Y') }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
                <form action="{{ route('deleteuser') }}" method="POST" class="mt-4">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-outline-danger btn-block" value="Delete User">
                </form>
            </div>
        </div>
    </div>
@endsection
