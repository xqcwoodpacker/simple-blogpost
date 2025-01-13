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
        <div class="card p-4" style="width: 25rem;">
            <h3 class="text-center mb-4">Login</h3>
            <form action="{{ route('loginuser') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}"
                        placeholder="" class="form-control @error('name') is-invalid @enderror">
                    <label for="email" class="form-label">Enter your email</label>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password"placeholder=""
                        class="form-control @error('name') is-invalid @enderror">
                    <label for="password" class="form-label">Enter your password</label>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-between align-items-center">
                </div>
                <button type="submit" class="btn btn-outline-primary w-100 mt-3">Login</button>
            </form>
            <p class="text-center mt-3">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </div>
@endsection
