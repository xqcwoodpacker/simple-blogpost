@extends('admin.layout')

@section('title', 'Edit Profile')
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

    <div class="d-flex justify-content-center align-items-center min-vh-50">
        <div class="card p-4" style="width: 30rem;" id="center-card">
            <h3 class="text-center mb-4">Edit Admin</h3>
            <form action="{{ route('admin.updateprofile') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder=""
                        value="{{ $user->name }}">
                    <label for="name" class="form-label">Enter your name</label>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" name="email" placeholder=""
                        value="{{ $user->email }}">
                    <label for="email" class="form-label">Enter your email</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary w-100">Update</button>
                <a href="{{route('admin.profile')}}" class="btn btn-outline-outline-info w-100 mt-3">Go Back</a>
            </form>
        </div>
    </div>

@endsection
