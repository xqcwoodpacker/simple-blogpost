@extends('admin.layout')

@section('title', 'Profile')

@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('error') }}
            </div>
        @endif

        {{-- Profile Section --}}
        <h1 class="my-4">Admin Profile</h1>
        <div class="card mb-4">
            <div class="card-header">
                <h4>Profile Details</h4>
            </div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <a href="{{ route('admin.editprofile') }}" class="btn btn-outline-primary">Edit Profile</a>
            </div>
        </div>

        {{-- Password Change Section --}}
        <h3 class="my-4">Change Password</h3>
        <div class="card p-4">
            <form action="{{route('admin.updatepassword')}}" method="POST">
                @csrf
                @method('PATCH')
                {{-- Current Password --}}
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="" >
                    <label for="current_password" class="form-label">Current Password</label>
                    @error('current_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- New Password --}}
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="" >
                    <label for="new_password" class="form-label">New Password</label>
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Confirm New Password --}}
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="new_password_confirmation"
                        name="new_password_confirmation" placeholder="">
                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                    @error('new_password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn btn-outline-success">Change Password</button>
            </form>
        </div>

    </div>
@endsection
