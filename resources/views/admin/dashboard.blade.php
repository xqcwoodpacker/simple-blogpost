@extends('admin.layout')

@section('title', 'Dashboard')
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

    <div class="container mt-5">
        <div class="row">
            <!-- Number of Posts -->
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Posts</h5>
                        <h3 class="card-text">{{ $postCount }}</h3>
                        <a href="{{route('admin.posts')}}" class="btn btn-outline-primary">Manage Posts</a>
                    </div>
                </div>
            </div>

            <!-- Number of Users -->
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <h3 class="card-text">{{ $userCount }}</h3>
                        <a href="{{route('admin.users')}}" class="btn btn-outline-primary">Manage Users</a>
                    </div>
                </div>
            </div>

            <!-- Number of Comments -->
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Comments</h5>
                        <h3 class="card-text">{{ $commentCount }}</h3>
                        <a href="{{route('admin.comments')}}" class="btn btn-outline-primary">Manage Comments</a>
                    </div>
                </div>
            </div>

            <!-- Number of Categories -->
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Categories</h5>
                        <h3 class="card-text">{{ $categoryCount }}</h3>
                        <a href="{{route('admin.categories')}}" class="btn btn-outline-primary">Manage Categories</a>
                    </div>
                </div>
            </div>
            {{-- logs --}}
            <div class="col-md-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Logs</h5>
                        <h3 class="card-text">{{ $logs }}</h3>
                        <a href="{{route('admin.logs')}}" class="btn btn-outline-primary">View Logs</a>
                    </div>
                </div>
            </div>
        </div>

    @endsection
