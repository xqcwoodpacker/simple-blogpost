@extends('admin.layout')

@section('title', 'Add Category')

@section('content')
    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4" style="width: 30rem;">
            <h3 class="text-center mb-4">Add Category</h3>
            <form action="{{ route('admin.storecategory') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" name="name"
                        placeholder="Enter the title of the post">
                    <label for="title" class="form-label">Add Category</label>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary w-100">Add Post</button>
                <a href="{{route('admin.categories')}}" class="btn btn-outline-primary w-100 mt-3">Go Back</a>
            </form>
        </div>
    </div>
@endsection
