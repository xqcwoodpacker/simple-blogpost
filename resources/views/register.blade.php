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

    <div class="container d-flex justify-content-center align-items-center">
        <div class="card p-4" style="width: 30rem;">
            <h3 class="text-center mb-4">Register</h3>
            <form action="{{ route('registeruser') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder=""
                        value="{{ old('name') }}">
                    <label for="name" class="form-label">Enter your name</label>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" name="email" placeholder=""
                        value="{{ old('email') }}">
                    <label for="email" class="form-label">Enter your email</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="">
                    <label for="password" class="form-label">Create a password</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="">
                    <label for="password_confirmation" class="form-label">Confirm your password</label>
                    @error('confirm_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-outline-primary w-100">Register</button>
            </form>
            <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}">Login</a></p>
        </div>
    </div>
@endsection
