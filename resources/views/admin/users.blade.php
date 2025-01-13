@extends('admin.layout')

@section('title', 'Users')

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
            <h1>Users Table</h1>
            <table class="table table-striped table-hover w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Posts</th>
                        <th>Comments</th>
                        <th>IsAdmin</th>
                        <th>Email</th>
                        <th>Creation Date</th>
                        <th>Last Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($users as $user)
                        <tr scope="row">
                            <td>{{ $users->firstItem() + $loop->index }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->posts->count() }}</td>
                            <td>{{ $user->comments->count() }}</td>
                            <td>{{ $user->role == 0 ? 'False' : 'True' }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td class="d-flex justify-content-start align-items-center">
                                <a href="{{ route('admin.edituser', $user->id) }}" class="btn btn-outline-primary me-2">Edit</a>
                                <form action="{{ route('admin.deleteuser', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>                                                      
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection
