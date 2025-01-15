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

    <article class="mb-4">
        <h2>{{ $post->title }}</h2>
        <h5>Category: {{ $post->category ? $post->category->name : 'No category' }}</h5>
        <p class="text-muted">Posted {{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }} by
            {{ $post->user->name }}</p>
        <p>{{ $post->content }}</p>
        <a href="{{ url('/') }}" class="btn btn-outline-secondary mt-4">Back to Home</a>
    </article>
    {{-- {{dd($comments)}} --}}
    <section class="comments">
        <h3>Comments</h3>

        <!-- Add Comment Form -->
        <form action="{{ route('storecomment', $post->id) }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <textarea class="form-control" id="comment" name="content" rows="3" placeholder="Write your comment here..."></textarea>
                <label for="comment" class="form-label">Add a Comment</label>
                @error('content')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-outline-primary mb-4">Post Comment</button>
        </form>

        <!-- Existing Comments -->
        <div class="mb-4">
            @foreach ($comments as $comment)
                <div class="border rounded p-3 mb-3">
                    <p>By: <strong>
                            @if ($comment->user_id == $post->user_id)
                                Author
                            @else
                                {{ $comment->user->name }}
                            @endif
                        </strong></p>
                    <p>{{ $comment->content }}</p>
                    <small class="text-muted">{{ \Carbon\Carbon::parse($comment->created_at)->format('F j, Y') }}</small>

                    <!-- Edit and Delete Buttons -->
                    @if (auth()->id() == $comment->user_id)
                        <div class="mt-2">
                            <!-- Edit Button -->
                            <a href="{{ route('editcomment', $comment->id) }}"
                                class="btn btn-sm btn-outline-warning">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('deletecomment', $comment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>

    </section>
@endsection
