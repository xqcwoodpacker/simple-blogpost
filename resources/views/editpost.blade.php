@extends('layout')
@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4" style="width: 30rem;">
            <h3 class="text-center mb-4">Edit Post</h3>
            <form action="{{ route('updatepost', $post->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Enter the title of the post" value="{{ $post->title }}">
                    <label for="title" class="form-label">Title</label>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter the content of the post">{{ $post->content }}</textarea>
                    <label for="content" class="form-label">Content</label>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary w-100">Update Post</button>
                <a href="{{ URL::previous() }}" class="btn btn-outline-primary w-100 mt-3">Go Back</a>
            </form>
        </div>
    </div>
@endsection
