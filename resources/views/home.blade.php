@extends('layout')

@section('content')

    <!-- Flash Alerts Section -->
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

    <!-- Blog Post Section -->
    <div class="col-md-8">
        @if ($posts->isEmpty())
            <h2>No Posts Found</h2>
        @else
            @foreach ($posts as $post)
                <article class="mb-4">
                    <h2>{{ $post->title }}</h2>
                    <h5>Category: {{ $post->category ? $post->category->name : 'No category' }}</h5>
                    <p class="text-muted">Posted {{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }} by
                        {{ $post->user->name }}</p>
                    <p>{{ Str::limit($post->content, 200) }}</p>
                    <a href="{{ route('post', $post->id) }}" class="btn btn-outline-primary">View</a>
                </article>
            @endforeach
            {{ $posts->appends(['category' => request('category'), 'keyword' => request('keyword')])->links() }}
        @endif
    </div>

    <!-- Sidebar Section -->
    <div class="col-md-4">
        <a href="{{ route('addpost') }}" class="btn btn-outline-primary mb-3">Add post</a>
        <div class="card mb-4">
            <div class="card-header">Search</div>
            <div class="card-body">
                <form action="{{ route('home') }}" method="GET">
                    <div class="input-group">
                        <input type="search" name="keyword" class="form-control" placeholder="Search for...">
                        <button class="btn btn-outline-primary" type="submit">Go!</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                    <!-- Loop through categories -->
                    @foreach ($categories as $category)
                        <a href="{{ request()->fullUrlWithQuery(['category' => $category->id]) }}"
                            class="btn btn-outline-primary text-decoration-none p-2">
                            {{ $category->name }}
                        </a>
                    @endforeach
                    <a href="{{ route('home') }}" class="btn btn-outline-danger">Clear Category Or Keyword</a>
                </div>
            </div>
        </div>

    </div>
@endsection
