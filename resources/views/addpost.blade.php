@extends('layout')
@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4" style="width: 30rem;">
            <h3 class="text-center mb-4">Add Post</h3>
            <form action="{{ route('storepost') }}" method="POST">
                @csrf
                <!-- Title -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Enter the title of the post">
                    <label for="title" class="form-label">Title</label>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Content -->
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="content" name="content" rows="3" placeholder="Enter the content of the post"></textarea>
                    <label for="content" class="form-label">Content</label>
                    @error('content')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Category Dropdown -->
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label><small> (Optional)</small>
                    <select class="form-select" id="category" name="category_id">
                        <option value="" selected>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-outline-primary w-100">Add Post</button>
            </form>
        </div>
    </div>
@endsection
