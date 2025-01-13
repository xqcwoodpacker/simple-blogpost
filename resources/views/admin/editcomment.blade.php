@extends('admin.layout')

@section('title', 'Edit Comment')

@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4" style="width: 30rem;">
            <h3 class="text-center mb-4">Edit Comment</h3>
            <form action="{{ route('admin.updatecomment', $comment->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="content" name="content" rows="3" placeholder="">{{ $comment->content }}</textarea>
                    <label for="content" class="form-label">Enter Comment</label>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary w-100">Update Comment</button>
                <a href="{{ route('admin.comments') }}" class="btn btn-outline-primary w-100 mt-3">Go Back</a>
            </form>
        </div>
    </div>
@endsection
